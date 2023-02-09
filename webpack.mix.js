const mix = require("laravel-mix");

require("mix-tailwindcss");

mix.webpackConfig({
    resolve: {
        alias: {
            "@": __dirname + "/resources/js",
        },
    },
});

mix.browserSync( {
    proxy: "localhost:8000",
    host: "localhost:8000",
    open: "external",
});


mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .tailwind()
    .version();
