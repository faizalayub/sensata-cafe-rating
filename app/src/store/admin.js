const state = {
    token: null
};

const mutations = {
    doAdminLogin: function(state, value) {
        state.token = value;
    }
};

const getters = {
    adminToken: function({ token }){
        return token;
    }
};

export default { state, mutations, getters };