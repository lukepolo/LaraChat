export default {
  state: {
    channels: null
  },
  actions: {
    getChannels: ({ commit }) => {
        // console.info();
        // Vue.http.get(laroute.action('ChannelsController@index'))
    }
  },
  mutations: {
    SET_CHANNELS: (state, channels) => {
      state.channels = channels
    }
  }
}
