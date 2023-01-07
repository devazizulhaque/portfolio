const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js",
        'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}',
        'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
    ],

    theme: {
        fontFamily: {
            primary: "Playfair Display",
            body: "work Sans",
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                lg: '3rem',
            },
        },
        extend: {
            color: {
                "light-primary": "#FAF1E6",
                "light-secondary": "#FDFAF6",
                "light-tail-100": "#A9DED2",
                "light-tail-500": "#54BAB9",
                "dark-primary": "#050402",
                "dark-secondary": "#1C1D24",
                "dark-navy-100": "#07567D",
                "dark-navy-500": "#292D42",
                accent: {
                    DEFAULT: "#ac6b34",
                    hover: "#925a2b",
                },
                paragraph: "#878e99",
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red,
            }        
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],
};
