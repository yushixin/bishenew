<template>
  <div class="flexjz adminindex">
  		<div class="flexjz adminindex-header">
	  		<div class="flexjz adminindex-header_left"><img src="../../assets/img/adminindexheader.jpg"></div>
	  		<div class="flexjz adminindex-header_middle">喵喵喵后台</div>
	  		<div class="flexjz adminindex-header_right" @click="godie">注销</div>
  		</div>
  		<div class="adminindex-content">
  			<div class="flexjz unifier-style adminindex-content-user" @click="touser">用户管理</div>
  			<div class="flexjz unifier-style adminindex-content-article" @click="toarticle">动态管理</div>
  			<div class="flexjz unifier-style adminindex-content-commodity" @click="tocommodity">商品管理</div>
  			<div class="flexjz unifier-style adminindex-content-data">
				<div class="flexjz adminindex-content-data-up">
					<div class="flexjz adminindex-content-data-user">
						<div class="flexjz unifier-style2 unifier-style3">{{user}}</div>
						<div class="flexjz unifier-style2 unifier-style4">注册用户</div>
					</div>
					<div class="flexjz adminindex-content-data-article">
						<div class="flexjz unifier-style2 unifier-style3">{{article}}</div>
						<div class="flexjz unifier-style2 unifier-style4">动态</div>
					</div>
				</div>
				<div class="flexjz adminindex-content-data-down">
					<div class="flexjz adminindex-content-data-user">
						<div class="flexjz unifier-style2 unifier-style3">23</div>
						<div class="flexjz unifier-style2 unifier-style4">商品缺货</div>
					</div>
					<div class="flexjz adminindex-content-data-article">
						<div class="flexjz unifier-style2 unifier-style3">1</div>
						<div class="flexjz unifier-style2 unifier-style4">未处理订单</div>
					</div>
				</div>

  			</div>

  		</div>
  </div>
</template>

<script>
  import Axios from "axios";

		export default {
		  	name: 'index',
			data () {
				return {
					user:"",
					article:""
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
		      	},
		      	getdata:function(){
		      		Axios.get('http://localhost:3000/showAllUserData')
					.then((res)=>{
						var userdata = JSON.parse(res.data);
						this.user = userdata.length;
					});
					Axios.get('http://localhost:3000/showAllArticleData')
					.then((res)=>{
						var articledata = JSON.parse(res.data);
						this.article = articledata.length;
					});
		      	}
 			},
			mounted(){
				this.youcan_or_yot_youcan_this_is_a_question();	
				this.getdata();
			}
		}
</script>


<style scoped>
	.flexjz{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.flexjz{
		display: flex;
		align-items: center;

	}

	.adminindex{
		width: 1024px;	
		height: 1366px;
		background: #222;
		flex-direction: column;
	}
	.adminindex-header{
		width: 100%;
		height: 1rem;
		background: #FE1D45;
	}
	.adminindex-header_left{
		width: 1rem;
		height: 100%;
		color: #fff;
		font-size: 1rem;
	}
	.adminindex-header_left img{
		width: 100%;
		height: 100%;
	}
	.adminindex-header_middle{
		height: 100%;
		flex: 1;
		color: #fff;
		font-size: 0.5rem;
	}	
	.adminindex-header_right{
		width: 1rem;
		height: 100%;
		color: #fff;
		font-size: 0.4rem;
	}
	.adminindex-content{

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
	.adminindex-content-user{
		width: 100%;
		height: 1rem;
		background: #66FFFF;

	}
	.adminindex-content-article{
		/*flex: 1;*/
		width: 100%;
		height: 1rem;
		background: #66FFCC;

		
	}
	.adminindex-content-commodity{
		width: 100%;
		height: 1rem;
		background: #66FF99;
	}
	.adminindex-content-data{
		width: 100%;
		height: 2rem;
		background: #66FF66;
		flex-direction: column;
		padding: 0.1rem;
	}
	.unifier-style{
		margin-top: 0.2rem;
		margin-left: 20px;
		margin-right: 20px;
		border:2px solid;
		border-radius:50px;
	}
	.adminindex-content-data-up{
		flex: 1;
		width: 100%;
		flex-direction: row;
	}
	.adminindex-content-data-down{
		flex: 1;
		width: 100%;
		flex-direction: row;
	}
	.adminindex-content-data-user{
		flex: 1;
		height: 100%;
	}
	.adminindex-content-data-article{
		flex: 1;
		height: 100%;
	}
	.unifier-style2{
		flex-direction: column-reverse;

		width: 100%;
		height: 100%;
		flex: 1;

	}
	.unifier-style3{
		flex-direction: row-reverse;
		color: red;
		font-size: 0.5rem;
	}
	.unifier-style4{
		flex-direction: row;
		font-size: 0.25rem;
	}
</style>
