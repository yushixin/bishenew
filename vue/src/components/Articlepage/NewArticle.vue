<template>
  <div id="PersonalCenter">
	<common-header></common-header>
	<new-article-next></new-article-next>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import jQuery from "../../assets/js/jquery-1.12.4.min.js"
  import CommonHeader from '../common/CommonHeader'
  import CommonFooter from '../common/CommonFooter'
  import NewArticleNext from './NewArticleNext'

//youcan_or_yot_youcan_this_is_a_question

		export default {
		  	name: 'NewArticle',
			data () {
				return {
				}
			},
			components:{
    			CommonHeader,
    			CommonFooter,
    			NewArticleNext
 			},
 			methods:{
				youcan_or_yot_youcan_this_is_a_question:function(){
					var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage
					if(nowUserid){
						console.log("当前是用户"+ nowUserid +"发布动态页面");
					}else if(nowUserid == null){
						this.$router.push({path:"/WillDie"});
					}
				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['发布动态']);
				this.youcan_or_yot_youcan_this_is_a_question();

			}
		}
</script>

<style scoped>

</style>
