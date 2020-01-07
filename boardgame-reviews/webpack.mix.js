const mix = require("laravel-mix");

mix.browserSync({
    proxy: "0.0.0.0:8000", // アプリの起動アドレス
    open: false // ブラウザを自動で開かない
})
    .js("resources/js/app.js", "public/js")
    .version();
