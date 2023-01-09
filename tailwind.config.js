/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        sea: "#2D499C",
        aqua: "#59C9EF",
        matcha: "#BDD855",
      },
    },
  },
  plugins: [],
};
