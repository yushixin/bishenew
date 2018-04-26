// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue 			from 'vue'
import App 			from './App'
import router		from './router'
import Vuex from 'vuex'
import store from './vuex/store'
import ElementUI 	from 'element-ui';//引入ElementUI
	
import $ from 'jquery'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'element-ui/lib/theme-chalk/index.css';//引入ElementUI



Vue.use(ElementUI)
Vue.use(Vuex)

require('./assets/js/rem.js')

Vue.config.productionTip = false


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
