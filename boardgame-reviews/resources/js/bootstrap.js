import { getCookieValue } from "./util";

window.axios = require("axios");

// Ajaxリクエストのヘッダを付与
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.axios.interceptors.request.use(config => {
    // クッキーからトークンを取り出してヘッダーに付与する
    config.headers["X-XSRF-TOKEN"] = getCookieValue("XSRF-TOKEN");

    return config;
});
