/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./site/templates/**/*.php",
    "./site/snippets/**/*.php",
    "./content/**/*.txt"
  ],
  theme: {
    extend: {
      colors: {
        'node-bg': '#222',
        'node-text': '#c8c8c8',
        'node-border': '#444',
        'node-code': '#1f1f1f',
      },
      fontFamily: {
        'mono': ['"Share Tech Mono"', 'Monospace', 'Courier', 'monospace'],
      },
      maxWidth: {
        'node': '900px',
      },
      fontSize: {
        'base': '17px',
      },
      letterSpacing: {
        'node': '0.1px',
      }
    },
  },
  plugins: [],
}
