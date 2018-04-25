<template>
  <div id="loginForm">
  	<transition name="el-fade-in-linear">

    <div id="remindDiv"class="displaynone" style= "text-align:center">
      <span style="display:block">账号不存在</span>
      <span style="display:block">或密码错误</span>
    </div>
	</transition>

  	<div id="imgDiv">
	  	<img id="loginImg" src="../assets/img/tupian1.png">	
  	</div>

  	<div id="inputDiv">
		<div><el-input type="text" v-model="username" placeholder="请输入账号"></el-input></div>
        <div><el-input type="password" v-model="password" placeholder="请输入密码"></el-input>
</div>
		<el-button class="regbutton" type="primary" style="width:100%" @click="login">登录</el-button>
        <el-button type="text" @click="toreg"  >立即注册</el-button>

  	</div>
  </div>
</template>

<script>
  import Axios from "axios";
  // import jQuery from "../assets/js/jquery-1.12.4.min.js"

		export default {
			name: 'login',
			data () {
				return {
					username: '',
					password:'',
					show: true
				}
			},
			methods:{
		    	login:function(){
					var _this = this;

					Axios.get("http://localhost:3000/logintest",{
						params:{
							username:this.username,
							password:this.password
						}
					}).then(function (res) {

						var token = JSON.parse(res.data);
						console.log(token);
						if(token == null){
							$("#remindDiv").removeClass("displaynone");
						}else{
							$("#remindDiv").addClass("displaynone");
							var u_name = token.u_name;
							var u_id = token.u_id;
							sessionStorage.setItem('u_id',u_id);
							sessionStorage.setItem('u_name',u_name);
							_this.$router.push({path:"/index"});
						}
			    	})
			    },
			    toreg:function(){
			    	this.$router.push({path:"/reg"});
			    }
			},
			mounted() {
			}
		}
</script>

<style scoped>
	/*
	 *使用iphone7尺寸
	 *375px 667px
	 */
	input, button, select, textarea {
		outline: none;
		-webkit-appearance: none;
		border-radius: 0;
		}
	  h1, h2 {
    font-weight: normal;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }

  a {
    color: #42b983;
  }
  input{
    border:none;
    outline:medium;
  }
	#loginForm{
		position: relative;
		height: 700px;
		background: #b8f1ed;

	}
	#remindDiv{
    	position: absolute;
	    top: 0;
	    left: 37px;

	    width: 80%;
	    height: 2rem;
	    background: #b8f1ed;
	    z-index: 99;
	    font-size: 0.7rem;
	    /*opacity:0.8;*/

	    border-radius:50px 50px 50px 50px;

  	}

	#imgDiv{
		position: absolute;
		left: 0px;
		top: 0px;
		width: 375px;
		height: 375px;
	}
	#loginImg{
		width: 100%;
		height: 100%;
	}
	#inputDiv{
		position: absolute;
		top: 375px;

		width: 375px;
		height: 200px;
		margin: 0 auto;
	}
	.input{
		width: 100%;
		height: 1rem;
		/*margin-top: 35px;*/
		font-size: 0.5rem;
		line-height:1rem;
		/*border:10px solid block;*/
	}
	.displaynone{
		display: none;
	}



</style>
