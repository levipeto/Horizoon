module.exports = {
    purge: [],
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            screens: {
                adaptable: { min: "0px", max: "1000px" },
                mobile: { min: "200px", max: "640px" },
                large: { min: "1000px" },
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
