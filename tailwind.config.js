/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: '16px'
    },
    extend: {
      width: {
        '13': '4.5rem',
        '14': '6rem',
      },
      fontFamily: {
        inter: ['Inter', 'sans-serif'],
      },
      animation: {
        'infinite-scroll-left': 'scroll-left 25s linear infinite',
        'infinite-scroll-right': 'scroll-right 25s linear infinite',
      },
      keyframes: {
        'scroll-left': {
          from: { transform: 'translateX(0%)' },
          to: { transform: 'translateX(-100%)' },
        },
        'scroll-right': {
          from: { transform: 'translateX(-100%)' },
          to: { transform: 'translateX(0%)' },
        },
        background: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
      },
      colors: {
        primary: '#01004E',
        dark: '#0f172a',
        secondary: '#64748b',
        default: '#810505'

      },
      screens: {
        '2xl': '1320px'
      }
    },
  },
  plugins: [
    require('tailwind-scrollbar'),
    // require('@tailwindcss/forms'),
  ],
}

