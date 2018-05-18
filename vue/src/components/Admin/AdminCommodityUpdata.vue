<template>
  <div class="admin-commodity-page">
	<admin-header></admin-header>
	<div style="height:0.7rem;"></div>

	<div class="flexjz commodity-content">
		<div class="flexjz cc-style cc-name">
				<div class="flexjz cc-style-text">商品名：</div>
				<div class="flexjz cc-style-input"><div><input type="text" name="cc-input-name" placeholder="请输入商品名"></div></div>
		</div>
		<div class="flexjz cc-style cc-num">
				<div class="flexjz cc-style-text">商品编号：</div>
				<div class="flexjz cc-style-input"><div><input type="text" name="cc-input-num" placeholder="请输入商品编号（数字）" onkeyup="value=value.replace(/[^\d]/g,'')"></div></div>
		</div>
		<div class="flexjz cc-style cc-price">
				<div class="flexjz cc-style-text">商品价格：</div>
				<div class="flexjz cc-style-input"><div><input type="text" name="cc-input-price" placeholder="请输入价格（数字）" onkeyup="value=value.replace(/[^\d]/g,'')"></div></div>
		</div>
		<div class="flexjz cc-style cc-category">
				<div class="flexjz cc-style-text">商品品类：</div>
				<div class="flexjz cc-style-input"><div><input type="text" name="cc-input-category" placeholder="请输入品类"></div></div>
		</div>
		<div class="flexjz cc-style cc-stock">
				<div class="flexjz cc-style-text">库存：</div>
				<div class="flexjz cc-style-input"><div><input type="text" name="cc-input-stock" placeholder="请输入库存（数字）" onkeyup="value=value.replace(/[^\d]/g,'')"></div></div>
		</div>
		<div class="flexjz cc-submit">
			<div class="flexjz cc-submit-style cc-submit-ok" @click="commoditySubmit">提交</div>
		</div>
		<div class="flexjz cc-style cc-news">
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
		  	name: 'admin-commodity-page',
			data () {
				return {
					shownewsflag:"1",
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				commoditySubmit:function(){
 					var _this=this;
 					var ccname = $(":input[name=cc-input-name]").val();
 					var ccnum = $(":input[name=cc-input-num]").val();
 					var ccprice = $(":input[name=cc-input-price]").val();
 					var cccategory = $(":input[name=cc-input-category]").val();
 					var stock = $(":input[name=cc-input-stock]").val();
 					Axios.get('http://localhost:3000/insertCommodity',{
						params:{
							ccname:ccname,
							ccnum:ccnum,
							ccprice:ccprice,
							cccategory:cccategory,
							stock:stock
						}
					}).then((res)=>{
						var value=JSON.parse(res.data);
						console.log(value);
						if(value == true){
							this.shownewsflag = 2;

						}else if(value == false){
							this.shownewsflag = 3;
						}
					});
					var life = setTimeout(function(){
						_this.$router.push({path:"/AdminCommodityPage"});
					},1000);
 				}
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


		background: #66FF99;
	}


</style>
