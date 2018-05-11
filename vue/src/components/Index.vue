<template>
  <div id="index">
	<common-header></common-header>
	<!-- <index-assembly-popup></index-assembly-popup> -->
	<router-view></router-view>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader from './common/CommonHeader'
  import CommonFooter from './common/CommonFooter'
  import IndexNext from './IndexNext'
  import IndexAssemblyPopup from './IndexAssemblyPopup'


		export default {
		  	name: 'index',
			data () {
				return {
				}
			},
			components:{
    			CommonHeader,
    			CommonFooter,
    			IndexAssemblyPopup
 			},
 			methods:{
 				gameover:function(){
 					var a = this.$route.path;
 					console.log(a);
 					var b = "/index";
					// console.log(a);
					if(a == b){
						console.log("aaa");
					}
 				}

 			},
			mounted(){
				this.$store.dispatch('changeTitle',['首页','','#c20c2c']);



			}
		}
</script>


<style scoped>
  @import "../assets/css/reset.css";

</style>
