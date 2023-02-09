module.exports = {
    purge: ["./**/*.html", "./**/*.blade.php", "./**/*.vue"],
    theme: {
        fontFamily: {
            sans: ["Lato", "Helvetica", "Arial", "sans-serif"],
            mono: ["Roboto Mono"]
        },
        extend: {}
    },
    variants: {},
    plugins: [require("@tailwindcss/ui")]
};
