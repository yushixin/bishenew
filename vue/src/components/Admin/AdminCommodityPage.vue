<template>
  <div class="admin-commodity-page">
	<admin-header></admin-header>
	<div style="height:0.7rem;"></div>
	<div class="flexjz content">
		<div class="flexjz content-up">

			<div class="flexjz Unified-style content-up_one">
				<div class="flexjz content-up_one-ohno" @click="toCommodityUpdata">上架商品</div>
			</div>
			<div class="flexjz Unified-style content-up_two">
				<div class="flexjz content-up_one-ohno">审核订单</div>
			</div>
			<div class="flexjz Unified-style content-up_three">
				<div class="flexjz content-up_one-ohno">查看库存</div>
			</div>
			<div class="flexjz Unified-style content-up_three">
				<div class="flexjz content-up_one-ohno">敬请期待？</div>
			</div>

		</div>
		<div class="flexjz content-down">
			
		</div>
	</div>

  </div>
</template>

<script>
  import Axios from "axios";
  import AdminHeader from './AdminHeader'
		export default {
		  	name: 'admin-commodity-page',
			data () {
				return {
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				toCommodityUpdata:function(){
		          this.$router.push({path:"/AdminCommodityUpdata"});

 				},
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['商品管理','ddd','#66FF99']);

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
	.admin-commodity-page{
		width: 1024px;	
		height: 1366px;	
		background: #222;
		flex-direction: column;
	}
	.content{
		flex: 1;
		padding: 40px;
		width: 100%;
		flex-direction: column;
	}
	.content-up{
		width: 100%;
		height: 0.5rem;
		flex-direction: row;
	}
	.content-up_one{
		flex: 1;
		display: flex;
		align-items: center;
		flex-direction: row;
	}
	.content-up_one-ohno{
		width: 98%;
		height: 100%;
		font-size: 0.25rem;
		border:2px solid;
		border-radius:50px;
		background: #66FF99;
	}
	.content-up_two{
		flex: 1;
	}
	.content-up_three{
		flex: 1;
	}
	.content-up_three{
		flex: 1;
	}	
	.content-up_four{
		flex: 1;
	}
	.content-down{
		flex: 1;
		flex-direction: column;
	}
	.Unified-style{
		width: 100%;
		height: 100%;
		padding-left: 10px;
		padding-right: 10px;
	}

	
</style>
