window.laroute = require('./laroute')

window.$ = window.jQuery = require('jquery')
window._ = require('lodash')

require('bootstrap-sass')

window.Vue = require('vue')
window.VueRouter = require('vue-router')

// noinspection ES6ModulesDependencies
Vue.use(VueRouter)

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

require('vue-resource')
Vue.http.interceptors.push((request, next) => {
  request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken)

  next()
})

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: Laravel.pusherKey
})
