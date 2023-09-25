/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                cream: '#f8f9f1',
                red: '#de3844',
                darkred: '#73050f',
                blue: '#789a99',
                black: '#131224'
            },
            fontFamily: {
                'raleway': [ 'Raleway', 'sans-serif' ],
            }
        },
    },
    plugins: [],
}
