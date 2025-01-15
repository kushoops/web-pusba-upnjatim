import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // 'primary': '#528664',
                // 'primary-variant': '#2c4c37',
                // 'secondary': '#f2e324',
                // 'secondary-variant': '#d7c90c',

                // 'primary': '#367df3',
                // 'primary-variant': '#15317e',
                // 'secondary': '#ffe985',
                // 'secondary-variant': '#ffe985',
                
                'primary': '#7091e6',
                'primary-variant': '#3d52a0',
                'secondary': '#ede8f5',
                'secondary-variant': '#adbbda',
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
    ],
};
