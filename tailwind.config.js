/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./storage/framework/views/*.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      'bg-sky-500' : 'background-color: rgb(14 165 233);',
      'bg-sky-300' : 'background-color: rgb(125 211 252)',
      'bg-amber-300	' : 'background-color: rgb(252 211 77);'
    },
  },
  plugins: [],
}
