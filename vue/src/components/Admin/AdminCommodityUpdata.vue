<template>
  <div class="admin-commodity-page">
	<admin-header></admin-header>
	<div style="height:0.7rem;"></div>

	<div class="flexjz commodity-content">
		<div class="flexjz cc-style cc-name">
				<div class="flexjz cc-style-text">商品名：</div>
				<div class="flexjz cc-style-input"><div><input type="text" placeholder="请输入商品名（汉字）"></div></div>
		</div>
		<div class="flexjz cc-style cc-num">
				<div class="flexjz cc-style-text">商品编号：</div>
				<div class="flexjz cc-style-input"><div><input type="text" placeholder="请输入商品编号（六位数字）"></div></div>
		</div>
		<div class="flexjz cc-style cc-price">
				<div class="flexjz cc-style-text">价格：</div>
				<div class="flexjz cc-style-input"><div><input type="text" placeholder="请输入价格（数字）"></div></div>
		</div>
		<div class="flexjz cc-style cc-category">
				<div class="flexjz cc-style-text">品类：</div>
				<div class="flexjz cc-style-input"><div><input type="text" placeholder="请输入品类（汉字）"></div></div>
		</div>
		<div class="flexjz cc-submit">
			<div class="flexjz cc-submit-style cc-submit-commodityimg">商品图片</div>
			<div class="flexjz cc-submit-style cc-submit-ok">提交</div>
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
 				
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['请填写商品信息','ddd','#66FF99']);

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
	.commodity-content{
		width: 100%;
		padding: 40px;
		flex-direction: column;
	}
	.cc-style{
		width: 100%;
		height: 1rem;
		flex-direction: row;
		color: #fff;
		font-size: 0.3rem;
	}
	.cc-style-text{
		width: 1.5rem;
	}
	.cc-style-input{
		flex: 1;
		height: 100%;
	}
	.cc-style-input div{
		width: 100%;
		height: 60%;
	}
	.cc-style-input input{
		width: 100%;
		height: 100%;
		color: #000;
		padding-left:20px; 
	}
	.cc-submit{
		flex-direction: row;
		width: 100%;
		height: 1rem;
		font-size: 0.5rem;
	}
	.cc-submit-style{
		flex: 1;
		height: 60%;
		border:2px solid;
		border-radius:50px;
		background: #66FF99;

	}

	
</style>
