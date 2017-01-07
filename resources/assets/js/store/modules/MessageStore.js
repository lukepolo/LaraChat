export default {
  state: {
    messages: []
  },
  actions: {
    getMessages: ({ commit }) => {
      Vue.http.get(laroute.action('MessagesController@store')).then((response) => {
        commit('SET_MESSAGES', response.data)
      })
    },
    sendMessage: ({ commit }, message) => {
      return Vue.http.post(laroute.action('MessagesController@store'), {
        message: message
      }).then((response) => {
        commit('ADD_MESSAGE', response.data)
        return response.data
      })
    }
  },
  mutations: {
    SET_MESSAGES: (state, messages) => {
      state.messages = messages;
    },
    ADD_MESSAGE: (state, message) => {
      state.messages.push(message)
    }
  }
}
