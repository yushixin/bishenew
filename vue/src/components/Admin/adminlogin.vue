<template>
  <div id="admin-login">
		
  		<div class="adminindexcenter admin-login-outbox">
  			<div class="adminindexcenter admin-login-inbox">
	  			<div class="adminindexcenter admin-login-inbox-name"><input type="text" v-model="adminname"></div>
				<div class="adminindexcenter admin-login-inbox-password"><input type="password"  v-model="adminpaw"></div>
				<div class="adminindexcenter admin-login-inbox-loginbutton" @click="adminlogin">登录</div>
  			</div>
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
					adminpaw:""
				}
			},
			components:{

 			},
 			methods:{
 				adminlogin:function(){
 					console.log(this.adminname);
 					console.log(this.adminpaw);
 					Axios.get("http://localhost:3000/adminlogin",{
						params:{
							adminname:this.adminname,
							adminpaw:this.adminpaw
						}
					}).then((res)=>{
						var token = JSON.parse(res.data);
						console.log(token);
					})
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
	}
	.admin-login-outbox{
		position:absolute;
        left:50%;    /* 定位父级的50% */
        top:50%;
        transform: translate(-50%,-50%); /*自己的50% */

		width: 2rem;
		height: 1rem;
	}
	.admin-login-inbox{
		width: 70%;
		height: 70%;
		flex-direction: column;
		font-size: 0.1rem;
	}
	.admin-login-inbox-name{
		width: 100%;
		height: 100%;
		flex: 1;
		background: red;
	}
	.admin-login-inbox-name input{
		width: 100%;
		height: 100%;
	}
	.admin-login-inbox-password{
		width: 100%;
		height: 100%;
		background: blue;
		flex: 1;
	}
	.admin-login-inbox-password input{
		width: 100%;
		height: 100%;
	}
	.admin-login-inbox-loginbutton{
		flex: 1;
		width: 100%;
		height: 100%;
		background: #33CC66;
		color: #fff;
	}
</style>
