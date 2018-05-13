<template>
  <div class="adminindexcenter admin-index">
  		<div class="adminindexcenter admin-index-header">
	  		<div class="adminindexcenter admin-index-header_left"><img src="../../assets/img/adminindexheader.jpg"></div>
	  		<div class="adminindexcenter admin-index-header_middle">喵喵喵后台</div>
	  		<div class="adminindexcenter admin-index-header_right" @click="godie">注销</div>
  		</div>
  		<div class="admin-index-content">
  			<div class="adminindexcenter admin-index-content_Children-style admin-index-content-user" @click="touser">用户管理</div>
  			<div class="adminindexcenter admin-index-content_Children-style admin-index-content-article" @click="toarticle">动态管理</div>
  			<div class="adminindexcenter admin-index-content_Children-style admin-index-content-commodity" @click="tocommodity">商品管理</div>
  		</div>
  </div>
</template>

<script>
  import Axios from "axios";

		export default {
		  	name: 'index',
			data () {
				return {
				}
			},
			components:{
 			},
 			methods:{
 				youcan_or_yot_youcan_this_is_a_question:function(){
					var nowGodu_id = sessionStorage.getItem("godu_id");//在页面加载的时候获取当前有效sessionsStotage
					if(nowGodu_id){
						console.log("当前是管理员："+ nowGodu_id);
					}else if(nowGodu_id == null){
						// this.$router.push({path:"/WillDie"});
					}
				},
 				godie:function(){
		          sessionStorage.removeItem('godu_id');
		          sessionStorage.removeItem('godu_name');
		          this.$router.push({path:"/WillDie2"});
		      	},
		      	touser:function(){
		          this.$router.push({path:"/AdminUserPage"});
		      	},
		      	toarticle:function(){
		          this.$router.push({path:"/AdminArticlePage"});
		      	},
		      	tocommodity:function(){
		          this.$router.push({path:"/AdminCommodityPage"});
		      	}
 			},
			mounted(){
				this.youcan_or_yot_youcan_this_is_a_question();	
			}
		}
</script>


<style scoped>
	.adminindexcenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.admin-index{
		width: 1024px;	
		height: 1366px;	
		background: #222;
		flex-direction: column;
	}
	.admin-index-header{
		width: 100%;
		height: 1rem;
		background: #FE1D45;
	}
	.admin-index-header_left{
		width: 1rem;
		height: 100%;
		color: #fff;
		font-size: 1rem;
	}
	.admin-index-header_left img{
		width: 100%;
		height: 100%;
	}
	.admin-index-header_middle{
		height: 100%;
		flex: 1;
		color: #fff;
		font-size: 0.5rem;
	}	
	.admin-index-header_right{
		width: 1rem;
		height: 100%;
		color: #fff;
		font-size: 0.4rem;
	}
	.admin-index-content{

		flex: 1;
		flex-direction: column;
		width: 100%;
		font-size: 0.3rem;
		color: #000;
		padding-left: 40px;
		padding-right: 40px;
		display: flex;
		align-items: center;
	}
	.admin-index-content-user{
		width: 100%;
		height: 1rem;
		background: #66FFFF;

	}
	.admin-index-content-article{
		/*flex: 1;*/
		width: 100%;
		height: 1rem;
		background: #66FFCC;

		
	}
	.admin-index-content-commodity{
		width: 100%;
		height: 1rem;
		background: #66FF99;
	}
	.admin-index-content_Children-style{
		margin-top: 0.2rem;
		margin-left: 20px;
		margin-right: 20px;
		border:2px solid;
		border-radius:25px;
	}
</style>
