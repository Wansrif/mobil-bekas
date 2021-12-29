const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './app/Views/*.php',
    './app/Views/**/*.php',
    './app/Views/**/**/*.php',
    './app/Views/**/**/**/*.php',
  ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      screens: {
        'sm': '576px',
      },
      spacing: {
        128: '32rem',
        130: '37.5rem',
      },
      fontFamily: {
        'viga': "'Viga'",
        'roboto': "'Roboto'",
      },
      colors: {
        // Build your palette here
        neutral: colors.neutral,
        amber: colors.amber,
        indigo: colors.indigo,
        violet: colors.violet,
        rose: colors.rose,
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ["checked"],
      borderColor: ["checked"],
      inset: ["checked"],
      zIndex: ["hover", "active"],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
