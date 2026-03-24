document.addEventListener('DOMContentLoaded', () => {
    // 1. Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', function(event) {
            const href = this.getAttribute('href');
            if (!href || href.length < 2) return;
            const target = document.querySelector(href);
            if (!target) return;
            event.preventDefault();
            window.scrollTo({
                top: target.getBoundingClientRect().top + window.scrollY - 80,
                behavior: 'smooth',
            });
        });
    });

    // 2. UTM Parameter Capture & Injection
    function captureUTMs() {
        const params = new URLSearchParams(window.location.search);
        const source = params.get('utm_source');
        const campaign = params.get('utm_campaign');
        
        if (source) sessionStorage.setItem('zyrus_utm_source', source);
        if (campaign) sessionStorage.setItem('zyrus_utm_campaign', campaign);
    }
    
    function injectUTMs() {
        const sourceField = document.getElementById('utm_source');
        const campaignField = document.getElementById('utm_campaign');
        
        const storedSource = sessionStorage.getItem('zyrus_utm_source');
        const storedCampaign = sessionStorage.getItem('zyrus_utm_campaign');
        
        if (sourceField && storedSource) sourceField.value = storedSource;
        if (campaignField && storedCampaign) campaignField.value = storedCampaign;
    }

    captureUTMs();
    injectUTMs();

    // 3. WhatsApp Tracking
    const trackingConfig = window.zyrusTheme || {};
    
    document.querySelectorAll('a[data-whatsapp-track="1"], a[href^="https://wa.me"]').forEach((button) => {
        button.addEventListener('click', function() {
            if (!trackingConfig.ajaxUrl || !trackingConfig.whatsappTrackNonce) return;
            
            const payload = new URLSearchParams();
            payload.append('action', 'zyrus_track_whatsapp_click');
            payload.append('nonce', trackingConfig.whatsappTrackNonce);
            payload.append('source', this.dataset.whatsappSource || 'boton_whatsapp_general');
            payload.append('target_url', this.getAttribute('href') || '');
            payload.append('page_url', window.location.href);

            if (navigator.sendBeacon) {
                const beaconData = new Blob([payload.toString()], { type: 'application/x-www-form-urlencoded; charset=UTF-8' });
                navigator.sendBeacon(trackingConfig.ajaxUrl, beaconData);
                return;
            }

            fetch(trackingConfig.ajaxUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
                body: payload.toString(),
                keepalive: true,
            }).catch(() => {});
        });
    });

    // 4. Main Contact Form Submission
    const contactForm = document.getElementById('zyrus-contact-form');
    if (contactForm && trackingConfig.ajaxUrl) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const errorBox = document.getElementById('zyrus-form-error');
            const submitBtn = document.getElementById('zyrus-form-submit-btn');
            const nameVal = document.getElementById('fx_name').value.trim();
            const phoneVal = document.getElementById('fx_phone').value.trim();
            const timingVal = document.getElementById('fx_timing').value;
            
            if (!nameVal || !phoneVal || !timingVal) {
                errorBox.textContent = 'Por favor, completa todos los campos requeridos.';
                errorBox.classList.remove('hidden');
                return;
            }
            
            errorBox.classList.add('hidden');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Procesando...';
            submitBtn.classList.add('opacity-70');
            
            const formData = new FormData(contactForm);
            formData.append('action', 'zyrus_ajax_contact_form');
            
            try {
                const resp = await fetch(trackingConfig.ajaxUrl, { method: 'POST', body: formData });
                const result = await resp.json();
                
                if (result.success) {
                    // Fire Meta Pixel Event
                    if (typeof fbq === 'function') {
                        fbq('track', 'Lead', {
                            content_name: 'Diagnostico_Sonrisa',
                            content_category: 'Diseno_Sonrisa'
                        });
                    }
                    
                    // Fire Google Analytics 4 Event
                    if (typeof gtag === 'function') {
                        gtag('event', 'generate_lead', {
                            event_category: 'formulario_landing',
                            event_label: 'diagnostico_sonrisa',
                            value: 1
                        });
                    }
                    
                    // Show success state
                    contactForm.style.display = 'none';
                    const successDiv = document.getElementById('zyrus-form-success');
                    if(successDiv) {
                        successDiv.classList.remove('hidden');
                    }
                } else {
                    errorBox.textContent = (result.data && result.data.message) ? result.data.message : 'Ocurrió un error. Intenta de nuevo.';
                    errorBox.classList.remove('hidden');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.classList.remove('opacity-70');
                }
            } catch (err) {
                errorBox.textContent = 'Error de red. Verifica tu conexión e intenta de nuevo.';
                errorBox.classList.remove('hidden');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                submitBtn.classList.remove('opacity-70');
            }
        });
    }
});
