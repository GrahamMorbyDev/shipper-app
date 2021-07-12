import Vue from 'vue';
import Vuex from 'vuex';

import shippers  from './storage/shippers';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        shippers
    }
});
