import Vue from 'vue'
import Vuex from 'vuex'

import messageStore from './modules/MessageStore'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    messageStore
  }
})
