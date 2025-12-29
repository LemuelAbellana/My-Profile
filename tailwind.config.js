import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                mono: ['Fira Code', 'monospace'],
                heading: ['Rajdhani', 'Unbounded', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Technical Blueprint Palette
                'porcelain': {
                    50: '#fafafa',
                    100: '#f5f5f5',
                    200: '#eeeeee',
                    DEFAULT: '#f8f8f8',
                },
                'blueprint': {
                    100: '#e3f2fd',
                    200: '#bbdefb',
                    300: '#90caf9',
                    400: '#42a5f5',
                    500: '#2196f3',
                    600: '#1976d2',
                    DEFAULT: '#1976d2',
                },
                'slate-deep': {
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                    DEFAULT: '#334155',
                },
                'safety-orange': {
                    400: '#ff9800',
                    500: '#ff6f00',
                    600: '#e65100',
                    DEFAULT: '#ff6f00',
                },
                'electric-blue': {
                    400: '#29b6f6',
                    500: '#03a9f4',
                    600: '#0288d1',
                    DEFAULT: '#03a9f4',
                },
                'emerald': {
                    400: '#66bb6a',
                    500: '#4caf50',
                    600: '#43a047',
                    DEFAULT: '#4caf50',
                },
            },
            animation: {
                'explode': 'explode 0.8s cubic-bezier(0.34, 1.56, 0.64, 1)',
                'slide-up': 'slideUp 0.3s ease-out',
                'fade-in': 'fadeIn 0.5s ease-in',
                'test-pass': 'testPass 0.3s ease-out',
                'float': 'float 3s ease-in-out infinite',
            },
            keyframes: {
                explode: {
                    '0%': { transform: 'translateZ(0) scale(1)', opacity: '1' },
                    '100%': { transform: 'translateZ(200px) scale(1.1)', opacity: '0.9' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                testPass: {
                    '0%': { transform: 'scale(0.8)', opacity: '0' },
                    '50%': { transform: 'scale(1.1)' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
            },
            backgroundImage: {
                'blueprint-grid': 'linear-gradient(to right, rgba(25, 118, 210, 0.1) 1px, transparent 1px), linear-gradient(to bottom, rgba(25, 118, 210, 0.1) 1px, transparent 1px)',
            },
            backgroundSize: {
                'grid': '100px 100px',
            },
        },
    },
    plugins: [forms],
};
