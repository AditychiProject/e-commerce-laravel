module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                primary: "#19376D",
                secondary: "#0B2447",
                dark: "#1f2937",
                success: "#16a34a",
                danger: "#dc2626",
                warning: "#fb923c",
            },
            screens: {
                "2xl": "1320px",
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
};
