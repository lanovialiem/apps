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
        primary: '#F97316', // orange modern (Tailwind orange-500)
        primaryDark: '#EA580C',
        primaryLight: '#FDBA74',
        dark: '#1E1E1E',
      },
      screens: {
        '2xl': '1320px',
      },
    },
  },
  plugins: [],
}

