module.exports = {
  darkMode: 'false',
  content: [
    "./*.php",
    "./templates/**/*.php",
    "./template-parts/**/*.php",
    "./assets/js/**/*.js",
    "./includes/popups/**/*.php",
    "./includes/acf-fields/**/*.php",
    "./resources/blocks/*.php",
    "./resources/blocks/**/*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter','Segoe UI','sans-serif !important'],
        serif: ['Lora', 'serif']
      },
      colors: {
        primary: {"50":"#FEF2F2","100":"#FEE2E2","200":"#FECACA","300":"#FCA5A5","400":"#F87171","500":"#EF4444","600":"#DC2626","700":"#D71116","800":"#991B1B","900":"#7F1D1D","950":"#450A0A"},
        secondary: {"50":"#F0F4F8","100":"#E1EAF1","200":"#C3D5E3","300":"#A5C0D5","400":"#87ABC7","500":"#6996B9","600":"#4B81AB","700":"#1E3A5F","800":"#182E4B","900":"#122237","950":"#0C1623"},
        background: "#F2F9FF"
      }
    },

  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
};