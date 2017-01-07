import Vue from 'vue'
import Vuex from 'vuex'

import userStore from './modules/UserStore'
import messageStore from './modules/MessageStore'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    userStore,
    messageStore
  }
})
