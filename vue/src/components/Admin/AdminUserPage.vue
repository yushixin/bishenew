<template>
  <div class="flexjz admin-user-page">
	<admin-header></admin-header>
	<div style="height:0.7rem;"></div>
	<div class="flexjz admin-user-page-content">
		<div class="flexjz admin-user-page-content-up">
			<div class="admin-user-page-content-up_left">
				<div class="flexjz admin-user-page-content-up_left-div1"><input @click="allselect" id="allselect"  type="checkbox" title="全选"></div>
				<div class="admin-user-page-content-up_left-div2" >全选</div>
			</div>
			<div class="admin-user-page-content-up_middle"></div>
			<div class="admin-user-page-content-up_right">
				<div class="flexjz" @click="deleteall">批量删除</div>
			</div>
		</div>
		<div class="flexjz admin-user-page-content-down">
			<div class="flexjz a-u-p-content-down-header">
				<div class="flexjz flex05"></div>
				<div class="flexjz flex1">ID</div>
				<div class="flexjz flex1">NAME</div>
				<div class="flexjz flex1">AGE</div>
				<div class="flexjz flex1">GENDER</div>
				<div class="flexjz flex05"></div>
			</div>
			<div class="a-u-p-content-down-content">
				<div class="flexjz a-u-p-content-down-content-next" v-for="(userdatas,index) in userdata">
					<div class="flexjz aupcdcn-ck flex05"><input type="checkbox" name="fxk" :data-catid="userdatas.u_id"></div>
					<div class="flexjz aupcdcn-id flex1">{{userdatas.u_id}}</div>
					<div class="flexjz aupcdcn-name flex1">{{userdatas.u_name}}</div>
					<div class="flexjz aupcdcn-age flex1">{{userdatas.u_age}}</div>
					<div class="flexjz aupcdcn-gender flex1">{{userdatas.u_gender}}</div>
					<div class="flexjz aupcdcn-message flex05" @click="openMessageBox(index)"><span class="glyphicon glyphicon-send"></span></div>
				</div>
			</div>
		</div>
		<div style="height:6rem"></div>
	</div>
	<div class="flexjz admin-user-page-message" v-if="messageflag==2"><!-- messageflag 等于2 的时候 显示  -->
		<div class="flexjz message">
			<div class="flex1 message-close"><div class="flexjz" @click="closeMessageBox"><span class="flexjz glyphicon glyphicon-menu-left"></span></div></div>

			<div class="flexjz flex1 message-showaim" v-if="messageflag2==3"><div class="flexjz flex05" >to:</div><p class="flexjz flex1">{{aimusername}}</p><div class=" flexjz flex2" ></div></div>
			<div class="flexjz flex1 message-input" v-if="messageflag2==3"><input type="text" name="message" placeholder="请输入信息"></div>
			<div class="flexjz flex1 message-submit" v-if="messageflag2==3"><div class="flexjz" @click="messageSubmit">提交</div></div>
			<div class="flexjz flex3 message-ojbk" v-if="messageflag2==4">OJBK</div>
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
					userdata:[],
					aim:"",
					aimusername:"",
					messageflag:"1",
					messageflag2:"3"
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
						var value=JSON.parse(res.data);
						if(value==true){
							location.reload();
						}
					});
 				},	
				openMessageBox:function(index){
					console.log(this.userdata[index].u_id);
					this.aim=this.userdata[index].u_id;
					this.aimusername=this.userdata[index].u_name;
					console.log(this.aim);
					console.log(this.aimusername);
					this.messageflag = 2;
				},
				closeMessageBox:function(){
					this.aim = "";
					this.aimusername ="";
					this.messageflag2 = 3;
					this.messageflag = 1;
				},
				messageSubmit:function(){
					var _this=this;
					var message = $(":input[name=message]").val();
					var a = parseInt(this.aim)
					Axios.get('http://localhost:3000/insertMessage',{//showInformation 输出信息
						params:{
							message:message,
							aim:a,
						}
					}).then((res)=>{
						var value=JSON.parse(res.data);
						if(value == true){
							this.messageflag2 = 4;
						}
					});
				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['用户管理','ddd','#66FFFF']);
				this.getData();
			}
		}
</script>


<style scoped>
p{
	margin:0;
}
	a{
		text-decoration:none;
		out-line:none;
		color: #fff;
	}
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
	.flex3{
		flex: 3;
	}
	.admin-user-page{
		width: 1024px;	
		/*height: 1366px;*/
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

	.admin-user-page-message{
		position: fixed;
		top: 0.7rem;
		background: rgba(34, 34, 34, 0.7);
		color: #fff;
		width: 100%;
		height: 8rem;
		padding-left: 1rem;
		padding-right: 1rem;
	}
	.message{
		height: 3rem;
		width: 100%;
		flex-direction: column;
		font-size: 0.4rem;

	}
	.message-close{
		display: flex;
		width: 90%;
		flex-direction: row-reverse;
	}
	.message-close div{
		height: 100%;
		width: 0.8rem;
		background: #FE1D45;
		color: #000;

	}
	.message-close div span{
		height: 100%;
		width: 100%;
		font-size: 0.8rem;
		color: #222;

	}
	.message-showaim{
		width: 90%;

	}
	.message-showaim p{
		color: #66FFFF;
		font-size: 0.7rem;
	}
	.message-input{
		width: 90%;
	}
	.message-input input{
		width: 100%;
		color: #000;
		padding-left:10px;
	}
	.message-submit{
		width: 90%;
	}
	.message-submit div{
		width: 100%;
		background: #66FFFF;
		color: #000;
	}
	.message-ojbk{
		width: 90%;
		font-size: 1rem;
		color:#000;
		background: #66FFFF;

	}

</style>
