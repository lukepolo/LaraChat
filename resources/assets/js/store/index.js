import Vue from 'vue'
import Vuex from 'vuex'

// Vue.action = action
import userStore from './modules/UserStore'
import messageStore from './modules/MessageStore'
import channelStore from './modules/ChannelStore'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    userStore,
    messageStore,
    channelStore
  }
})
