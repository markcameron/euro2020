const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'euro-lighest': '#126F7E',
                'euro-light': '#2BA5B7',
                'euro': '#1AA0B3',
                'euro-dark': '#2199A9',
                'euro-darkest': '#126F7E',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            borderWidth: ['last', 'first'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
