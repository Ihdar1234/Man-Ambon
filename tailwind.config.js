/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {},
    },
    plugins: [require('daisyui')],
    daisyui: {
        themes: ["light", "dark"], // bisa diganti tema lain sesuai kebutuhan
        styled: true,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
    },
};
