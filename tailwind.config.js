/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily :{
        'nunito' : ['Nunito Sans ', 'verdana'],
        'open-sans' : ['open sans', 'verdana'],
        'mtrph' : ['Metrophobic'],
        'tt-web' : ['Titillium Web'],
        'inter' : ['inter'],
      },
      gridColumn: {
        'span-14': 'span 14 / span 14',
      }
    },
  },
  plugins: [],
}