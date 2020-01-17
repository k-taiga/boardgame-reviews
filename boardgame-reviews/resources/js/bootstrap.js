import { getCookieValue } from "./util";

window.axios = require("axios");

// Ajaxリクエストであることを示すヘッダーを付与する
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.axios.interceptors.request.use(config => {
    // クッキーからトークンを取り出してヘッダーに添付する
    config.headers["X-XSRF-TOKEN"] = getCookieValue("XSRF-TOKEN");

    return config;
});

// interceptorはレスポンスを受けた後の処理を上書きする
// 第一引数が成功時、第二引数が失敗時のエラーを返す
window.axios.interceptors.response.use(
    response => response,
    error => error.response || error
);
