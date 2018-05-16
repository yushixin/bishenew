<template>
  <div id="mall">
	<common-header2></common-header2>
	<div style="height:1rem;"></div>
	<shopping-mall-next></shopping-mall-next>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader2 from './common/CommonHeader2'
  import CommonFooter from './common/CommonFooter'
  import ShoppingMallNext from './ShoppingMallNext'


		export default {
		  	name: 'PersonalCenter',
			data () {
				return {
				}
			},
			components:{
    			CommonHeader2,
    			CommonFooter,
    			ShoppingMallNext

 			},
 			methods:{
				youcan_or_yot_youcan_this_is_a_question:function(){
					var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage
					if(nowUserid){
						console.log("当前是用户"+ nowUserid +"修改头像页面");
					}else if(nowUserid == null){
						this.$router.push({path:"/WillDie"});
					}
				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['商城']);

				this.youcan_or_yot_youcan_this_is_a_question();
				// this.$store.dispatch('changeTitle',['movie']);
			}
		}
</script>

<style scoped>

</style>
