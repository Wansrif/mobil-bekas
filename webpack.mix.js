// webpack.mix.js
// npx mix

let mix = require('laravel-mix');

mix.js('src/js/app.js', 'public/asset/js').postCss("src/css/app.css", "public/asset/css", [
  require("tailwindcss"),
]);