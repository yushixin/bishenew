<template>
  <div id="PersonalCenter">
	<common-header :title="title"></common-header>
	<personal-next :username="username"></personal-next>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader from './common/CommonHeader'
  import CommonFooter from './common/CommonFooter'
  import PersonalNext from './PersonalNext'

//youcan_or_yot_youcan_this_is_a_question

		export default {
		  	name: 'PersonalCenter',
			data () {
				return {
			  		title: '个人中心',
			  		username:''
				}
			},
			components:{
    			CommonHeader,
    			CommonFooter,
    			PersonalNext
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
				this.youcan_or_yot_youcan_this_is_a_question();
				// this.$store.dispatch('changeTitle',['movie']);
			}
		}
</script>

<style scoped>

</style>
