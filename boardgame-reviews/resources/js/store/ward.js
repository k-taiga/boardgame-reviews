const state = {
    id: null
};

const getters = {
    id: state => state.id
};

const mutations = {
    setId(state, id) {
        state.id = id;
    }
};

export default {
    namespaced: true,
    state,
    mutations
};
