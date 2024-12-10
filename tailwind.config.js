import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'kogeka-cyan': '#0C505D',
                'kogeka-zinc': '#A7A8AA',
                'kogeka-sky': '#0090C1',
                'kogeka-lime': '#8B8D24',
                'kogeka-yellow': '#C5B300',
                'light-background': '#f3f4f6',
                'sidebar-dark': '#11101d',
                'sidebar-hover': '#4a5568',
                'topbar-background': 'rgba(255, 255, 255, 0.8)',
                'footer-background': '#2d3748',
                secondary: {
                    DEFAULT: '#00A7B5', // kogeka-lightgreen
                    500: '#00A7B5',
                    100: '#A4DBE1', // Lighter shade for secondary
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
