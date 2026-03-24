/*
 * Script para conectar el tema Zyrus a Google Sheets
 * 
 * INSTRUCCIONES:
 * 1. Abre tu Google Sheet (https://docs.google.com/spreadsheets/d/1vCT5DZz20GZ0lPiE60w4zqn1FLipPxlfP3o_h2jJpIo/edit)
 * 2. En el menú superior, ve a: Extensiones > Apps Script
 * 3. Se abrirá una nueva pestaña. Borra todo el código que aparezca ahí.
 * 4. Pega todo este código (desde la línea 1 hasta el final).
 * 5. Haz clic en el icono de Guardar (el disquete).
 * 6. Arriba a la derecha, haz clic en el botón azul "Implementar" (Deploy) > "Nueva implementación" (New deployment).
 * 7. Haz clic en el icono del engranaje junto a "Seleccionar tipo" y elige "Aplicación web" (Web app).
 * 8. Configura:
 *    - Descripción: (ej. "Webhook Zyrus")
 *    - Ejecutar como: "Yo" (tu correo)
 *    - Quién tiene acceso: "Cualquier persona" (Anyone) - ¡ESTO ES MUY IMPORTANTE!
 * 9. Haz clic en "Implementar". (Google te pedirá autorizar el acceso, haz clic en Autorizar, selecciona tu cuenta, luego en Avanzado > Ir a proyecto).
 * 10. Copia la "URL de la aplicación web" que te da al final.
 * 11. Ve a tu WordPress > Leads Web > Registro CSV. Pega esa URL en el nuevo campo "Webhook Web App URL" y guarda.
 */

function doPost(e) {
  try {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getActiveSheet();
    
    // Configura los encabezados si la hoja está vacía
    if (sheet.getLastRow() === 0) {
      sheet.appendRow([
        'fecha_hora', 
        'tipo', 
        'nombre', 
        'correo', 
        'telefono', 
        'mensaje', 
        'origen_visita', 
        'url_origen', 
        'ip'
      ]);
      // Congelar la primera fila y ponerla en negrita
      sheet.setFrozenRows(1);
      sheet.getRange("A1:I1").setFontWeight("bold").setBackground("#f3f4f6");
    }

    // Recoger los datos enviados por WordPress
    var data = [];
    data.push(e.parameter.fecha_hora || new Date());
    data.push(e.parameter.tipo || '');
    data.push(e.parameter.nombre || '');
    data.push(e.parameter.correo || '');
    data.push(e.parameter.telefono || '');
    data.push(e.parameter.mensaje || '');
    data.push(e.parameter.origen_visita || '');
    data.push(e.parameter.url_origen || '');
    data.push(e.parameter.ip || '');

    // Insertar la fila
    sheet.appendRow(data);
    
    return ContentService.createTextOutput(JSON.stringify({"status": "success"})).setMimeType(ContentService.MimeType.JSON);
  } catch(error) {
    return ContentService.createTextOutput(JSON.stringify({"status": "error", "message": error.toString()})).setMimeType(ContentService.MimeType.JSON);
  }
}
