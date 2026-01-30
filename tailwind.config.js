import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

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
                sans: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
                mono: ['JetBrains Mono', 'Fira Code', 'Consolas', 'monospace'],
                heading: ['JetBrains Mono', 'monospace'], // Mono for headings
                code: ['JetBrains Mono', 'monospace'],
            },
            colors: {
                // Deep Slate Base (easier on eyes than pure black)
                'slate': {
                    950: '#020617',
                    975: '#010410',
                },
                // Syntax Highlighting Palette
                'syntax': {
                    'keyword': '#3b82f6',    // Blue - keywords
                    'string': '#10b981',     // Emerald - strings/success
                    'method': '#f59e0b',     // Amber - methods/warnings
                    'variable': '#8b5cf6',   // Violet - variables
                    'comment': '#64748b',    // Slate - comments
                    'error': '#ef4444',      // Red - errors
                },
                // Cyber-Minimalist Dark Theme Palette
                'cyber': {
                    'black': '#020617',      // Deep slate instead of pure black
                    'dark': '#0f172a',       // Slate-900
                    'gray': '#1e293b',       // Slate-800
                    'light': '#f5f5f5',
                    'accent': '#10b981',     // emerald-500 (syntax.string)
                    'blue': '#3b82f6',       // blue-500 (syntax.keyword)
                    'purple': '#8b5cf6',     // violet-500 (syntax.variable)
                    'amber': '#f59e0b',      // amber-500 (syntax.method)
                },
                // Keep legacy colors for backward compatibility (can be removed later)
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
            },
            animation: {
                'float': 'float 20s ease-in-out infinite',
                'float-reverse': 'float 25s ease-in-out infinite reverse',
                'slide-up': 'slideUp 0.3s ease-out',
                'fade-in': 'fadeIn 0.5s ease-in',
                'glow': 'glow 2s ease-in-out infinite alternate',
                'glow-pulse': 'glowPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'gradient-shift': 'gradientShift 8s ease infinite',
                'tilt': 'tilt 10s infinite linear',
                'typing': 'typing 3.5s steps(40, end)',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
                    '25%': { transform: 'translate(30px, -30px) scale(1.1)' },
                    '50%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                    '75%': { transform: 'translate(20px, 30px) scale(1.05)' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                glow: {
                    '0%': { boxShadow: '0 0 5px rgba(16, 185, 129, 0.5), 0 0 10px rgba(16, 185, 129, 0.3)' },
                    '100%': { boxShadow: '0 0 10px rgba(16, 185, 129, 0.8), 0 0 20px rgba(16, 185, 129, 0.5)' },
                },
                glowPulse: {
                    '0%, 100%': { boxShadow: '0 0 20px rgba(16, 185, 129, 0.3)' },
                    '50%': { boxShadow: '0 0 30px rgba(16, 185, 129, 0.6), 0 0 40px rgba(16, 185, 129, 0.3)' },
                },
                gradientShift: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
                tilt: {
                    '0%, 50%, 100%': { transform: 'rotate(0deg)' },
                    '25%': { transform: 'rotate(1deg)' },
                    '75%': { transform: 'rotate(-1deg)' },
                },
                typing: {
                    'from': { width: '0' },
                    'to': { width: '100%' },
                },
            },
            backgroundImage: {
                'gradient-orb-emerald': 'radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%)',
                'gradient-orb-violet': 'radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%)',
                'gradient-orb-purple': 'radial-gradient(circle, rgba(168, 85, 247, 0.15) 0%, transparent 70%)',
            },
            backdropBlur: {
                xs: '2px',
            },
        },
    },
    plugins: [
        forms, 
        typography,
        require('daisyui'),
    ],
    daisyui: {
        themes: ["dark"], // Only use dark theme for cyber-minimalist design
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        logs: false,
    },
};
