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
						<div class="flexjz edit-edit" @click="openUpdataBox(index)">更新</div>
						<div class="flexjz edit-delete" @click="deleteCommodity(index)">下架</div>

					</div>
					<div class="flexjz content-down-content-box-next-style content-down-content-box-next-stock" v-if="flag==2">{{commoditydatas.commodity_stock}}</div>
				</div>
				<div style="height:6rem"></div>
				
			</div>
		</div>
	</div>
	<div class="news">
		<div class="flexjz news-ok" v-if="flag2 == 1">删除成功</div>
		<div class="flexjz news-nook" v-if="flag2 == 2">出现错误，请重试</div>
	</div>
	<div class="flexjz admin-commodity-page-updata" v-if="updataflag==2"><!-- updataflag 等于2 的时候 显示  -->
		<div class="flexjz updata">
			<div class="flex1 updata-close"><div class="flexjz" @click="closeUpdataBox"><span class="flexjz glyphicon glyphicon-menu-left"></span></div></div>

			<div class="flexjz flex1 updata-input" v-if="updataflag2==3">
				<div class="flexjz flex05 updata-input-div">价格</div>
				<div class="flexjz flex1 updata-input-inputdiv"><input type="text" name="updataprice" placeholder="请输入信息" v-model="nowprice"></div>
				
			</div>
			<div class="flexjz flex1 updata-input" v-if="updataflag2==3">
				<div class="flexjz flex05 updata-input-div">库存</div>
				<div class="flexjz flex1 updata-input-inputdiv"><input type="text" name="updatastock" placeholder="请输入信息" v-model="nowstock"></div>
				
			</div>
			<div class="flexjz flex1 updata-submit" v-if="updataflag2==3"><div class="flexjz" @click="updataSubmit">提交</div></div>
			<div class="flexjz flex3 updata-ojbk" v-if="updataflag2==4">OJBK</div>
			<div class="flexjz flex3 updata-ojbk" v-if="updataflag2==5">出错了！</div>
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
					commoditydata:[],
					flag:"1",
					flag2:"0",
					updataflag:"1",
					updataflag2:"3",
					nowprice:"",
					nowstock:"",
					aimcommodityid:""
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
 				},
 				openUpdataBox:function(index){
					this.updataflag = 2;
					this.nowstock		= this.commoditydata[index].commodity_stock;
					this.nowprice		= this.commoditydata[index].commodity_price;
					this.aimcommodityid	= this.commoditydata[index].commodity_id;
					console.log("nowstock:"+this.nowstock);
					console.log("nowprice:"+this.nowprice);
					console.log("aimcommodityid:"+this.aimcommodityid);

 				},
 				closeUpdataBox:function(){
 					this.updataflag2 = 3;
					this.updataflag = 1;
 				},
 				updataSubmit:function(){
 					var updataprice  = $(":input[name=updataprice]").val();
 					var updatastock  = $(":input[name=updatastock]").val();
 					var updataid = this.aimcommodityid;
 					Axios.get('http://localhost:3000/updataCommodity',{
 						params:{
							updataid:updataid,
							updataprice:updataprice,
							updatastock:updatastock,
						}
 					})
					.then((res)=>{
						var value = JSON.parse(res.data);
						if(value == true){
 							this.updataflag2 = 4;
						}else if(value == false){
							this.updataflag2 = 5;
						}
						// if (value == true) {
						// 	this.flag2 = 1;
						// } else {
						// 	this.flag2 = 2;
						// }
						// var life = setTimeout(function(){
						// 	location.reload();
						// },1000);
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
	.flex3{
		flex: 3;
	}
	.admin-commodity-page{
		width: 1024px;	
		/*height: 1366px;*/
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
	.admin-commodity-page-updata{
		position: fixed;
		top: 0.7rem;
		background: rgba(34, 34, 34, 0.7);
		color: #fff;
		width: 100%;
		height: 8rem;
		padding-left: 1rem;
		padding-right: 1rem;
	}
	.updata{
		height: 3rem;
		width: 100%;
		flex-direction: column;
		font-size: 0.4rem;
	}
	.updata-close{
		display: flex;
		width: 90%;
		flex-direction: row-reverse;
	}
	.updata-close div{
		height: 100%;
		width: 0.8rem;
		background: #FE1D45;
		color: #000;
		border-right-style: solid;
		border-right-width: 3px;
		border-right-color: #66FF99;
	}
	.updata-close div span{
		height: 100%;
		width: 100%;
		font-size: 0.8rem;
		color: #222;

	}
	.updata-showaim{
		width: 90%;

	}
	.updata-showaim p{
		color: #66FFFF;
		font-size: 0.7rem;
	}
	.updata-input{
		width: 90%;
		flex-direction: row;
	}
	.updata-input-div{
		width: 100%;
		height: 100%;
		background: #222;
		border-left-style: solid;
		border-left-width: 3px;
		border-left-color: #66FF99;
	}
	.updata-input-inputdiv{
		width: 100%;
		height: 100%;
		border-right-style: solid;
		border-right-width: 3px;
		border-right-color: #66FF99;
	}
	.updata-input-inputdiv input{
		width: 100%;
		height: 100%;
		color: #000;
		padding-left:10px;
	}
	.updata-submit{
		width: 90%;
		border-left-style: solid;
		border-left-width: 3px;
		border-left-color: #66FF99;
		border-right-style: solid;
		border-right-width: 3px;
		border-right-color: #66FF99;

	}
	.updata-submit div{
		width: 100%;
		height: 100%;
		background: #66FF99;
		color: #000;
	}
	.updata-ojbk{
		width: 90%;
		font-size: 0.5rem;
		color:#000;
		background: #66FF99;
	}




</style>
