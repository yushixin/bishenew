<template>
  <div id="index">
	<common-header :title="title"></common-header>
	<index-next></index-next>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
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
				 this.$store.dispatch('changeTitle',['首页']);
			}
		}
</script>


<style scoped>
  @import "../assets/css/reset.css";

</style>
