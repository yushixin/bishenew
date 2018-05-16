<template>
  <div class="admin-message-page">
	<admin-header></admin-header>
	<div style="height:0.7rem;"></div>

	<div class="flexjz message-content">
		<div class="flexjz mc-style mc-name">
				<div class="flexjz mc-style-text">站内信：</div>
				<div class="flexjz mc-style-input"><div><input type="text" name="mc-input-message" placeholder="请输入..."></div></div>
		</div>
		<div class="flexjz mc-submit">
			<div class="flexjz mc-submit-style mc-submit-ok" @click="messageSubmit">提交</div>
		</div>
		<div class="flexjz mc-style mc-news">
			<div v-if="shownewsflag ==1"></div>
			<div v-if="shownewsflag ==2">添加成功,即将跳转商品管理页面</div>
			<div v-if="shownewsflag ==3">添加失败，请重试</div>
		</div>
	</div>


  </div>
</template>

<script>
  import Axios from "axios";
  import AdminHeader from './AdminHeader'
		export default {
		  	name: 'admin-message-page',
			data () {
				return {
					shownewsflag:"1",
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				messageSubmit:function(){
 					var aim = this.$route.params.id;
 					var _this=this;
 					var message = $(":input[name=mc-input-message]").val();
 					console.log("aim:"+aim);
 					console.log("message:"+message);
 					Axios.get('http://localhost:3000/insertMessage',{
						params:{
							message:message,
							aim:aim
						}
					}).then((res)=>{
						var value=JSON.parse(res.data);
						console.log(value);
					});
 				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['站内信','ddd','#66FFFF']);

			}
		}
</script>


<style scoped>
	.flexjz{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.flex1{
		flex:1;
	}
	.flex05{
		flex:0.5;
	}
	.admin-message-page{
		width: 1024px;	
		height: 1366px;	
		background: #222;
		flex-direction: column;
	}
	.message-content{
		width: 100%;
		padding: 40px;
		flex-direction: column;
	}
	.mc-style{
		width: 100%;
		height: 1rem;
		flex-direction: row;
		color: #fff;
		font-size: 0.3rem;
	}
	.mc-style-text{
		width: 1.5rem;
	}
	.mc-style-input{
		flex: 1;
		height: 100%;
	}
	.mc-style-input div{
		width: 100%;
		height: 60%;
	}
	.mc-style-input input{
		width: 100%;
		height: 100%;
		color: #000;
		padding-left:20px; 
	}
	.mc-submit{
		flex-direction: row;
		width: 100%;
		height: 1rem;
		font-size: 0.5rem;
	}
	.mc-submit-style{
		flex: 1;
		height: 60%;

		background: #66FFFF;

	}

	
</style>
