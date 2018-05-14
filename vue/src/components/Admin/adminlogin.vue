<template>
  <div id="admin-login">
		
  		<div class=" admin-login-outbox">
			<div class="adminindexcenter admin-login-inbox-name"><input type="text" v-model="adminname" placeholder="账号"></div>
			<div class="adminindexcenter admin-login-inbox-password"><input type="password"  v-model="adminpaw" placeholder="密码"></div>
			<div class="adminindexcenter admin-login-inbox-loginbutton" @click="adminlogin">登录</div>	
  			<div class="adminindexcenter admin-login-inbox-prompt" v-if="this.flag == 2">账号密码不能为空</div>
  			<div class="adminindexcenter admin-login-inbox-prompt" v-if="this.flag == 3">账号密码错误</div>
  			<div class="" v-if="this.flag == 1"></div>

  		</div>


  </div>
</template>

<script>
  import Axios from "axios";
		export default {
		  	name: 'index',
			data () {
				return {
					adminname:"",
					adminpaw:"",
					flag:"1"
				}
			},
			components:{

 			},
 			methods:{
 				adminlogin:function(){
 					if(this.adminname.length>0&&this.adminpaw.length>0){
 						console.log("账号密码不为空");
 						this.flag = 1;
 						Axios.get("http://localhost:3000/adminlogin",{
							params:{
								adminname:this.adminname,
								adminpaw:this.adminpaw
							}
						}).then((res)=>{
							var token = JSON.parse(res.data);
							if(token == null){
 								this.flag = 3;
								console.log("godu_id is null")
							}else{
								console.log("godu_id is ："+token.godu_id.length)
								var godu_id = token.godu_id;
								var godu_name = token.godu_name;
								sessionStorage.setItem('godu_id',godu_id);
								sessionStorage.setItem('godu_name',godu_name);
								this.$router.push({path:"/adminindex"});
							}
						})
 					}else{
 						console.log("账号密码为空");
 						this.flag = 2;
 					}

 				}
 				
 			},
			mounted(){


			}
		}
</script>


<style scoped>
	input:focus { outline: none; } 
	body{
		background: black;
	}
	.adminindexcenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	#admin-login{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		width: 1024px;	
		height: 1366px;	
		background: #222;
	}
	.admin-login-outbox{
		position:absolute;
        left:50%;    /* 定位父级的50% */
        top:50%;
        transform: translate(-50%,-50%); /*自己的50% */

		width: 3rem;
		height: 2rem;
		font-size: 0.3rem;
		display: flex;
		align-items: center;
		flex-direction: column;
	}
	.admin-login-inbox{
		/*flex: 3;*/
		width: 100%;
		height: 1.5rem;
		flex-direction: column;
		font-size: 0.3rem;
	}
	.admin-login-inbox-name{
		width: 100%;
		/*height: 100%;*/
		height: 0.5rem;	
		/*flex: 1;*/
		background: red;
	}
	.admin-login-inbox-name input{
		width: 100%;
		height: 100%;
	}
	.admin-login-inbox-password{
		width: 100%;
		height: 0.5rem;	
		background: blue;
		/*flex: 1;*/
	}
	.admin-login-inbox-password input{
		width: 100%;
		height: 100%;
	}
	.admin-login-inbox-loginbutton{
		/*flex: 1;*/
		width: 100%;
		height: 0.5rem;	
		background: #33CC66;
		color: #fff;
	}
	.admin-login-inbox-prompt{

		flex: 1;
		width: 100%;
		height: 100%;	
		background: #FF0033;
		color:#fff;
	}
</style>
