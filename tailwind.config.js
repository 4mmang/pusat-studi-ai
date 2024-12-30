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
      },
      fontFamily: {
        inter: ['Inter', 'sans-serif'],
      },
      animation: {
        'infinite-scroll': 'infinite-scroll 25s linear infinite',
        border: 'background ease infinite',
      },
      keyframes: {
        'infinite-scroll': {
          from: { transform: 'translateX(0)' },
          to: { transform: 'translateX(-100%)' },
        },
        background: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
      },
      colors: {
        primary: '#3b82f6',
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

