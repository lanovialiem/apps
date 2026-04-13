/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: '#FF6A2A',
        dark: '#1E1E1E',
      },
    },
  },
  plugins: [],
}

