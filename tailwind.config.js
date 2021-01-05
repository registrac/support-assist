const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'media',
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],


    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        backgroundColor: ['dark', 'responsive', 'hover', 'focus', 'disabled'],
        textColor: ['dark', 'responsive', 'hover', 'focus', 'disabled'],
        divideColor: ['dark', 'responsive'],
    },

    plugins: [require('@tailwindcss/ui')],
    plugins: [require('@tailwindcss/forms')],
};
