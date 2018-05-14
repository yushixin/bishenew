<template>
  <div class="flexjuzhong admin-user-page">
	<admin-header></admin-header>
	<div style="height:0.7rem;"></div>
	<div class="flexjuzhong admin-user-page-content">
		<div class="flexjuzhong admin-user-page-content-up">
			<div class="admin-user-page-content-up_left">
				<div class="flexjuzhong admin-user-page-content-up_left-div1"><input @click="allselect" id="allselect"  type="checkbox" title="全选"></div>
				<div class="admin-user-page-content-up_left-div2" >全选</div>
			</div>
			<div class="admin-user-page-content-up_middle"></div>
			<div class="admin-user-page-content-up_right">
				<div class="flexjuzhong" @click="deleteall">批量删除</div>
			</div>
		</div>
		<div class="flexjuzhong admin-user-page-content-down">
			<div class="flexjuzhong a-u-p-content-down-header">
				<div class="flexjuzhong flex05"></div>
				<div class="flexjuzhong flex1">ID</div>
				<div class="flexjuzhong flex1">NAME</div>
				<div class="flexjuzhong flex1">AGE</div>
				<div class="flexjuzhong flex1">GENDER</div>
				<div class="flexjuzhong flex05"></div>
			</div>
			<div class="a-u-p-content-down-content">
				<div class="flexjuzhong a-u-p-content-down-content-next" v-for="(userdatas,index) in userdata">
					<div class="flexjuzhong aupcdcn-ck flex05"><input type="checkbox" name="fxk" :data-catid="userdatas.u_id"></div>
					<div class="flexjuzhong aupcdcn-id flex1">{{userdatas.u_id}}</div>
					<div class="flexjuzhong aupcdcn-name flex1">{{userdatas.u_name}}</div>
					<div class="flexjuzhong aupcdcn-age flex1">{{userdatas.u_age}}</div>
					<div class="flexjuzhong aupcdcn-gender flex1">{{userdatas.u_gender}}</div>
					<div class="flexjuzhong aupcdcn-message flex05"><span class="glyphicon glyphicon-send"></span></div>
				</div>
			</div>

		</div>
	</div>
  </div>
</template>

<script>
  import Axios from "axios";
  import AdminHeader from './AdminHeader'

		export default {
		  	name: 'admin-user-page',
			data () {
				return {
					userdata:[]
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				getData:function(){
	 				Axios.get('http://localhost:3000/showAllUserData')
					.then((res)=>{
						this.userdata = JSON.parse(res.data);
						console.log(this.userdata);
					});
 				},
 				allselect:function(){
					// $("#allselect").prop('checked',true);
					var is_check = $("#allselect").prop('checked');
    				if(is_check==true){
						$(".aupcdcn-ck input:checkbox").prop('checked',true);
					}else{
						$(".aupcdcn-ck input:checkbox").prop('checked',false);
					}
 				},
 				deleteall:function(){
 					var checkBoxArr  = $(":input[name=fxk]");
 					console.log(checkBoxArr );

 					var arr = new Array()
 					for (var i = 0 ; i < checkBoxArr.length ; i++) {
 						if(checkBoxArr[i].checked == true){
 							arr.push(this.userdata[i].u_id);
 						}
 					}
			        Axios.get('http://localhost:3000/deleteuser',{//showInformation 输出信息
			          params:{
			            deleteid:arr
			          }
			        }).then((res)=>{
			            // console.log(res.data);
			          var value=JSON.parse(res.data);
			          console.log(value);
			          if(value==true){
			          	location.reload();
			          }
			        });
 				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['用户管理','ddd','#66FFFF']);
				// if(!confirm("确定要删除这些图书吗？")){
				// 	return ;
				// }
				this.getData();
			}
		}
</script>


<style scoped>
	.flexjuzhong{
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
	.admin-user-page{
		width: 1024px;	
		height: 1366px;	
		background: #222;
		flex-direction: column;
	}
	.admin-user-page-content{
		flex: 1;
		padding: 40px;
		width: 100%;
		flex-direction: column;
	}
	.admin-user-page-content-up{
		width: 100%;
		height: 0.5rem;
		flex-direction: row;
		border-bottom:2px solid #66FFFF;
	}
	.admin-user-page-content-up_left{
		flex: 1;
		height: 100%;
		display: flex;
		align-items: center;
		flex-direction: row;
	}
	.admin-user-page-content-up_left-div1{
		width: 0.5rem;
		height: 100%;
	}
	.admin-user-page-content-up_left-div1 input{
		width: 50%;
		height: 50%;
		margin:0;
	}
	.admin-user-page-content-up_left-div2{
		width: 1rem;
		height: 100%;
		font-size: 0.2rem;
		color: #fff;
		display: flex;
		align-items: center;
	}
	.admin-user-page-content-up_middle{
		flex: 1;
		height: 100%;	

	}
	.admin-user-page-content-up_right{
		flex: 1;
		height: 100%;
		display: flex;
		flex-direction: row-reverse;
	}
	.admin-user-page-content-up_right div{
		width: 50%;	
		height: 100%;
		background: #66FFFF;
		font-size: 0.2rem;
		border:2px solid;
		border-radius:50px;
	}
	.admin-user-page-content-down{
		flex: 1;
		height: 100%;
		width: 100%;
		flex-direction: column;
	}
	.a-u-p-content-down-header{
		flex-direction: row;
		width: 100%;	
		height: 0.5rem;
		color: #FFF;
		font-size: 0.2rem;
		flex-direction: row;
		border-bottom:1px solid #66FFFF;
	}
	.a-u-p-content-down-header-ck{
		flex: 0.5;
	}	
	.a-u-p-content-down-header-message{
		flex: 0.5;
	}
	.a-u-p-content-down-content{
		flex: 1;
		width: 100%;
		display: flex;
		align-items: center;
		flex-direction: column;
	}
	.a-u-p-content-down-content-next{
		height: 0.5rem;	
		width: 100%;	
		flex-direction:row;
		color: #fff;
		font-size: 0.2rem;
	}
	.aupcdcn-ck{
		height: 100%;
	}
	.aupcdcn-ck input{
		width: 40%;	
		height: 40%;
	}
	.aupcdcn-id{
		height: 100%;

	}
	.aupcdcn-name{
		height: 100%;

	}
	.aupcdcn-age{
		height: 100%;

	}
	.aupcdcn-gender{
		height: 100%;

	}
	.aupcdcn-message{
		height: 100%;

	}
</style>
