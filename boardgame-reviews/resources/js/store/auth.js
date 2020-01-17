import Axios from "axios";
import { OK, CREATED, UNPROCESSABLE_ENTITY } from "../util";

const state = {
    user: null,
    apiStatus: null,
    loginErrorMessages: null,
    registerErrorMessages: null
};

const getters = {
    check: state => !!state.user,
    user: state => state.user,
    username: state => (state.user ? state.user.name : "")
};

const mutations = {
    setUser(state, user) {
        state.user = user;
    },
    setApiStatus(state, status) {
        state.apiStatus = status;
    },
    setLoginErrorMessages(state, msg) {
        state.loginErrorMessages = msg;
    },
    setRegisterErrorMessages(state, msg) {
        state.registerErrorMessages = msg;
    }
};

const actions = {
    async register(context, data) {
        context.commit("setApiStatus", null);
        const response = await axios.post("/api/register", data);

        // response.statusが201だったら
        if (response.status === CREATED) {
            context.commit("setApiStatus", true);
            context.commit("setUser", response.data);
            return false;
        }

        context.commit("setApiStatus", false);
        if (response.status === UNPROCESSABLE_ENTITY) {
            context.commit("setRegisterErrorMessages", response.data.errors);
        } else {
            context.commit("error/setCode", response.status, { root: true });
        }
    },
    async login(context, data) {
        context.commit("setApiStatus", null);
        const response = await axios
            .post("/api/login", data)
            .catch(err => err.response || err);

        // response.statusが200だったら
        if (response.status === OK) {
            context.commit("setApiStatus", true);
            context.commit("setUser", response.data);
            return false;
        }

        context.commit("setApiStatus", false);
        if (response.status === UNPROCESSABLE_ENTITY) {
            context.commit("setLoginErrorMessages", response.data.errors);
        } else {
            // 別のモジュールのミューテーションを commit する場合は第三引数に { root: true } を追加
            context.commit("error/setCode", response.status, { root: true });
        }
    },
    async logout(context, data) {
        context.commit("setApiStatus", null);
        const response = await axios.post("/api/logout");

        // response.statusが200だったら
        if (response.status === OK) {
            context.commit("setApiStatus", true);
            context.commit("setUser", null);
            return false;
        }

        context.commit("setApiStatus", false);
        context.commit("error/setCode", response.status, { root: true });
    },
    // ログインしているかどうかチェック
    async currentUser(context) {
        const response = await axios.get("/api/user");
        // ログインしていなければnull
        const user = response.data || null;
        context.commit("setUser", user);

        if (response.status === OK) {
            context.commit("setApiStatus", true);
            context.commit("setUser", user);
            return false;
        }

        context.commit("setApiStatus", false);
        context.commit("error/setCode", response.status, { root: true });
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
