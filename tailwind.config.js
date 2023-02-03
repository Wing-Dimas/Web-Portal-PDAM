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
        body: "#EAE9F7",
        sidebar: "#FFF",
        toggle: "#DDD",
        text: "#707070",
      },
      transitionDuration: {
        400: "400ms",
      },
    },
  },
  plugins: [require("tw-elements/dist/plugin")],
};
