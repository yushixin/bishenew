<template>
  <div class="NewArticleNext">
		<div>标题：</div>
		<div><input class="biaoti" type="text" placeholder="请输入标题" v-model="articletitle"></div>
		<div>正文：</div>
		<div id="textarea-div"><textarea name="" id="" placeholder="请输入正文" v-model="articletext"></textarea></div>
		<div id="send-out" @click="sendOut">发送</div>

  </div>
</template>

<script>
  import Axios from "axios";
  import jQuery from "../../assets/js/jquery-1.12.4.min.js"
export default {
  data() {
    return {
    	articletitle: '',
		  articletext:'',
      articleauthor:'',

    }
  },
  methods:{
  	sendOut:function(){
      var uid = sessionStorage.getItem("u_id");
  		Axios.get("http://localhost:3000/sendout",{
  			params:{
  				articletitle:this.articletitle,
          articletext:this.articletext,
  				uname:this.articleauthor,
  				uid:uid
  			}
  		}).then((res)=>{
        var data = JSON.parse(res.data);
        console.log(data);
        if(data == true){
          this.$router.push({path:"/index"});
        }else{
          console.log("奥 发生错误了老伙计");
        }


  		});

  	}
      
  },
  mounted(){
      var value = sessionStorage.getItem("u_id");
      // 这个Axios用来输出用户信息
      Axios.get('http://localhost:3000/showInformation',{//showInformation 输出信息
        params:{
          value:value
        }
      }).then((res)=>{
        var value2=JSON.parse(res.data);
        console.log(value2);
        this.articleauthor = value2.u_name;
        console.log(this.articleauthor);

      });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import "../assets/css/reset.css";*/

  .NewArticleNext{
    position: fixed;
    top: 1rem;
    width: 100%;
    height: 100%;
    font-size: 0.4rem;
  }
  .NewArticleNext div{
  	width: 100%;
  	height: 1rem;
  	line-height: 1rem;
  	font-size: 0.7rem;
  }
  .NewArticleNext input{
  	height: 0.8rem;
  	width: 90%;
  	margin-left: 15px;
  	font-size: 0.5rem;
  }
  .NewArticleNext textarea{
  	width: 90%;
  	height: 3rem;
  	margin-left: 15px;
  	font-size:0.4rem;
  }
  #textarea-div{
  	width: 100%;
  	height: 4rem;
  }
  #send-out{
  	text-align: center;
  	background: #f55066;
  	width: 60%;
  	margin-left: 78px;
	border-radius:50px 50px 50px 50px;
	border:2px solid #f55066;

  }

</style>
