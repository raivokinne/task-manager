/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./web/view/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        kanit: ["Kanit", "sans-serif"],
        playfair: ["Playfair Display", "serif"],
      },
    },
  },
  plugins: [],
};
