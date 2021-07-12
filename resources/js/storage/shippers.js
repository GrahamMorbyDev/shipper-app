// import dependency to handle HTTP request to our back end
import axios from 'axios';

//to handle state
const state = {
    shippers: []
}

//to handle state
const getters = {
    shippersList: state => state.shippers
}

//to handle actions
const actions = {
    getShippers({commit}) {
        axios.get('/api/shippers/get')
            .then(response => {
                commit('SET_SHIPPERS', response.data.data)
            })
    }
}

//to handle mutations
const mutations = {
    SET_SHIPPERS(state, payload) {
        state.shippers = payload
    }
}

//export storage module
export default {
    state,
    getters,
    actions,
    mutations
}
