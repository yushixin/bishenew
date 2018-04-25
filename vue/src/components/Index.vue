<template>
  <div id="index">
	<common-header :title="title"></common-header>
	<index-next></index-next>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import jQuery from "../assets/js/jquery-1.12.4.min.js"
  import CommonHeader from './common/CommonHeader'
  import CommonFooter from './common/CommonFooter'
  import IndexNext from './IndexNext'


		export default {
		  	name: 'index',
			data () {
				return {
					title: '首页'
				}
			},
			components:{
    			CommonHeader,
    			CommonFooter,
    			IndexNext
 			},
 			methods:{

 			},
			mounted(){

			}
		}
</script>


<style scoped>
  @import "../assets/css/reset.css";

</style>
