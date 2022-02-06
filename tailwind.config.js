// font-family: 'Bitter', serif;
// font-family: 'Poppins', sans-serif;
// font-family: 'Righteous', cursive;
// font-family: 'Work Sans', sans-serif;
const colors = require('tailwindcss/colors');
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.css',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    safelist: [
        'sm:max-w-sm',
        'sm:max-w-md',
        'sm:max-w-lg',
        'sm:max-w-xl',
        'sm:max-w-2xl',
        'sm:max-w-3xl',
        'sm:max-w-4xl',
        'sm:max-w-5xl',
        'sm:max-w-6xl',
        'sm:max-w-7xl',
        'h-10',
        'h-20',
        'h-30',
        'h-40',
    ],
    darkMode: 'class',
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            dark: colors.gray,
            primary: colors.blue,
            blue: colors.blue,
            secondary: colors.indigo,
            indigo: colors.indigo,
            danger: colors.red,
            red: colors.red,
            success: colors.emerald,
            green: colors.emerald,
            yellow: colors.amber,
            warning: colors.amber,
        },
        fontFamily: {
            'display': ['"Righteous", sans-serif'],
            'serif': ['"Bitter", serif'],
            'body': ['"Work Sans", sans-serif'],
            'sans': ['"Poppins",  sans-serif'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require('tailwindcss-tables')(),
    ],
};

