<template>
  <div id="ImprovingPetInformation">
	<common-header2></common-header2>
		<div class="cat-content">
			<div class="cat-name">
				<div>名字</div>
				<div>
					<input type="text" class="form-control" id="form-control1" placeholder="请输入patname" aria-describedby="basic-addon1">
				</div>
			</div>
			<div class="cat-age">
				<div>年龄</div>
				<div>
					<input type="text" class="form-control" id="form-control2"placeholder="请输入age" aria-describedby="basic-addon1">
				</div>
			</div>
			<div class="cat-varieties">
				<div>物种</div>
				<div>
					<select id="select1">
						<option value ="">请选择</option>
						<option value ="猫猫">cat</option>
						<option value="狗狗">dog</option>
						<option value="鱼鱼">fish</option>
					</select>
				</div>

			</div>
			<div class="button" @click="qrclick">确认</div>
			<!-- 用来撑起cat-content -->
			<div class="aaa"></div>
		</div>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader2 from '../common/CommonHeader2'
  import CommonFooter from '../common/CommonFooter'
  // import IndexNext from './IndexNext'


		export default {
		  	name: 'index',
			data () {
				return {
				}
			},
			components:{
    			CommonHeader2,
    			CommonFooter,

 			},
 			methods:{
 				qrclick:function(){
					var catName = $("#form-control1").val();
					var catAge = $("#form-control2").val();
					var varieties = $("#select1").val();
    				var uid = sessionStorage.getItem("u_id");
					Axios.get("http://localhost:3000/CreatePetInf",{
						params:{
							catName:catName,
							varieties:varieties,
							uid:uid,
							catAge:catAge
						}
					}).then((res)=>{

					});
        			this.$router.push({path:"/PersonalCenter"});

 				}

 			},
			mounted(){
				 this.$store.dispatch('changeTitle',['完善宠物资料','glyphicon glyphicon-triangle-left']);

			}
		}
</script>


<style scoped>
  @import "../../assets/css/reset.css";
  	.aaa{
  		height: 600px;
  		z-index: -99;
  	}
  	.ImprovingPetInformation{
  		position: relative;
  	}
	.cat-content{
		position: absolute;
		top: 1rem;
		width: 100%;
	}
	.cat-name{
		position: absolute;
		top: 10px;
		width: 100%;
		height: 1rem;
		font-size: 0.7rem;

	}
	.cat-name div:nth-child(1) {
		/*float: left;*/
		position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100px;
	}
	.cat-name div:nth-child(2) {
		/*float: right;*/
		width: 70%;
		position: absolute;
        top: 50%;
        left: 100px;
        transform: translateY(-50%);
	}


	.cat-varieties{
		position: absolute;
		top: 80px;
		width: 100%;
		height: 1rem;
		font-size: 0.7rem;

	}
	.cat-varieties select{
		width: 100%;
		height: 100%;
		font-size: 0.7rem;
	}
	#form-control2{
		height: 100%;
	}
	.cat-varieties div:nth-child(1) {
		/*float: left;*/
		position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100px;
	}
	.cat-varieties div:nth-child(2) {
		/*float: right;*/
		width: 70%;
		position: absolute;
        top: 50%;
        left: 100px;
        transform: translateY(-50%);
	}
	.cat-age{
		position: absolute;
		top: 2.5rem;
		width: 100%;
		height: 1rem;
		font-size: 0.7rem;

	}
	.cat-age div:nth-child(1) {
		/*float: left;*/
		position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100px;
	}
	.cat-age div:nth-child(2) {
		/*float: right;*/
		width: 70%;
		position: absolute;
        top: 50%;
        left: 100px;
        transform: translateY(-50%);
	}
	.buttonn{
		width: 100%;
		height: 1rem;
		position: absolute;
		top: 3rem;
	}
	.buttonn a{
		width: 100%;
		height: 100%;
	}
	.button{
		position: absolute;
		bottom: 1rem;
		width: 100%;
		height: 1rem;
		background: #ffe543;
		font-size: 0.8rem;
		line-height: 1rem;
		text-align: center;
	}
</style>
