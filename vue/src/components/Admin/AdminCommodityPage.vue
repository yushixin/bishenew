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
				<div class="flexjz content-up_one-ohno" @click="seestock" v-if="flag==1">查看库存</div>
				<div class="flexjz content-up_one-ohno" @click="seestock" v-if="flag==2">返回</div>
			</div>
			<div class="flexjz Unified-style content-up_three">
				<div class="flexjz content-up_one-ohno" @click="CommodityInformation" v-if="flag==1">管理</div>
				<div class="flexjz content-up_one-ohno" @click="CommodityInformation" v-if="flag==3">返回</div>
			</div>
		</div>
		<div class="flexjz content-down">
			<div class="flexjz content-down-list">
				<div class="flexjz content-down-list-next-style flex05">ID</div>
				<div class="flexjz content-down-list-next-style flex2" >NAME</div>
				<div class="flexjz content-down-list-next-style flex1">NUM</div>
				<div class="flexjz content-down-list-next-style flex1" v-if="flag==1">PRICE</div>
				<div class="flexjz content-down-list-next-style flex1" v-if="flag==1">PINLEI</div>
				<div class="flexjz content-down-list-next-style content-down-list-next-edit" v-if="flag==3">编辑</div>
				<div class="flexjz content-down-list-next-style content-down-list-next-stock" v-if="flag==2">库存</div>
			</div>
			<div class="flexjz content-down-content">
				<div class="flexjz content-down-content-box" v-for="(commoditydatas,index) in commoditydata">
					<div class="flexjz content-down-content-box-next-style flex05">
						{{commoditydatas.commodity_id}}
					</div>
					<div class="flexjz content-down-content-box-next-style flex2 commodityname">
						<p>{{commoditydatas.commodity_name}}</p>
					</div>
					<div class="flexjz content-down-content-box-next-style flex1">
						{{commoditydatas.commodity_num}}
					</div>
					<div class="flexjz content-down-content-box-next-style flex1" v-if="flag==1">
						{{commoditydatas.commodity_price}}
					</div>
					<div class="flexjz content-down-content-box-next-style flex1" v-if="flag==1">
						{{commoditydatas.commodity_category}}
					</div>
					<div class="flexjz content-down-content-box-next-style
					content-down-content-box-next-edit" v-if="flag==3">
						<div class="flexjz edit-imgup">图片</div>
						<div class="flexjz edit-edit">更新</div>
						<div class="flexjz edit-delete" @click="deleteCommodity(index)">下架</div>

					</div>
					<div class="flexjz content-down-content-box-next-style content-down-content-box-next-stock" v-if="flag==2">{{commoditydatas.commodity_stock}}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="news">
		<div class="flexjz news-ok" v-if="flag2 == 1">删除成功</div>
		<div class="flexjz news-nook" v-if="flag2 == 2">出现错误，请重试</div>
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
					commoditydata:[],
					flag:"1",
					flag2:"0"
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				getData:function(){
	 				Axios.get('http://localhost:3000/showAllCommodity')
					.then((res)=>{
						this.commoditydata = JSON.parse(res.data);
						console.log(this.commoditydata);
					});
 				},
 				toCommodityUpdata:function(){
					this.$router.push({path:"/AdminCommodityUpdata"});

 				},
 				seestock:function(){
 					if (this.flag == 1) {
 						this.flag = 2;
 					}else if(this.flag == 2){
 						this.flag = 1;
 					}
 				},
 				CommodityInformation:function(){
 					if (this.flag == 1) {
 						this.flag = 3;
 					}else if(this.flag == 3){
 						this.flag = 1;
 					}
 				},
 				deleteCommodity:function(index){
 					var commodityid = this.commoditydata[index].commodity_id;
 					Axios.get('http://localhost:3000/deleteCommodity',{
 						params:{
							commodityid:commodityid,
						}
 					})
					.then((res)=>{
						var value = JSON.parse(res.data);
						if (value == true) {
							this.flag2 = 1;
						} else {
							this.flag2 = 2;
						}
						var life = setTimeout(function(){
							location.reload();
						},1000);
					});
 				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['商品管理','ddd','#66FF99']);
				this.getData();
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
	.flex2{
		flex: 2;
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
	.content-up_four{
		flex: 1;
	}


	.Unified-style{
		width: 100%;
		height: 100%;
		padding-left: 10px;
		padding-right: 10px;
	}
	.content-down{
		flex: 1;
		width: 100%;
		flex-direction: column;

	}
	.content-down-list{
		width: 100%;
		height: 0.5rem;
		flex-direction: row;

		margin-top: 10px;
		border-bottom: 2px solid #66FF99;
	}
	.content-down-list-next-style{
		height: 100%;
		width: 100%;
		color: #fff;
		font-size: 0.25rem;
	}
	.content-down-list-next-stock{
		flex: 2;
		height: 100%;
		width: 100%;
		color: #fff;
		font-size: 0.25rem;
	}
	.content-down-list-next-edit{
		flex: 2;
		height: 100%;
		width: 100%;
		color: #fff;
		font-size: 0.25rem;
		flex-direction: row;
	}
	.edit-imgup{
		flex: 1;
		width: 100%;
		height: 60%;
		border:2px solid;
		border-radius:50px;
		background: #66FF99;
		color: #000;
		font-size: 0.2rem;

	}
	.edit-edit{
		flex: 1;
		width: 100%;
		height: 60%;
		border:2px solid;
		border-radius:50px;
		background: #66FF99;
		color: #000;
		font-size: 0.2rem;
	}
	.edit-delete{
				flex: 1;
		width: 100%;
		height: 60%;
		border:2px solid;
		border-radius:50px;
		background: #66FF99;
		color: #000;
		font-size: 0.2rem;
	}
	.content-down-content{
		flex:1;
		width: 100%;
		flex-direction: column;
	}
	.content-down-content-box{
		width: 100%;
		height: 0.5rem;
		flex-direction: row;
	}
	.content-down-content-box-next-style{
		height: 100%;
		width: 100%;
		color: #fff;
		font-size: 0.2rem;
	}
	.content-down-content-box-next-stock{
		flex:2;
		height: 100%;
		width: 100%;
		color: #fff;
		font-size: 0.25rem;
	}
	.content-down-content-box-next-edit{
		flex:2;
		height: 100%;
		width: 100%;
		color: #fff;
		font-size: 0.25rem;
	}
	
	.commodityname p{
	    text-overflow:ellipsis;
	    overflow:hidden;
	    white-space:nowrap;
	    width:2rem;
	}
	.news{
		position: fixed;
		top:7.53rem;
		width: 100%;
		height: 1rem;
	}
	.news-ok{
		width: 100%;
		height: 100%;
		background: #66FF99;
		font-size: 0.5rem;
	}
	.news-nook{
		width: 100%;
		height: 100%;
		background: #66FF99;
		font-size: 0.5rem;
	}


</style>
