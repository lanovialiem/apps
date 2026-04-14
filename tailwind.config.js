/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
        primary: '#FF6A2A',
        dark: '#1E1E1E',
      },
      screens: {
        '2xl': '1320px',
      },
    },
  },
  plugins: [],
}

