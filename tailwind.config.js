module.exports = {
  content: [
    "./*.php",
    "./assets/js/*.js",
  ],
  theme: {
    extend: {
      colors: {
        zyrus: {
          dark: "#0D1B2A",
          primary: "#1A3A5C",
          ice: "#C8D8E8",
          accent: "#C9A96E",
          light: "#F5F0EB",
        },
      },
      fontFamily: {
        sans: ["Montserrat", "ui-sans-serif", "system-ui", "sans-serif"],
        serif: ["Cormorant Garamond", "ui-serif", "Georgia", "serif"],
      },
    },
  },
};
