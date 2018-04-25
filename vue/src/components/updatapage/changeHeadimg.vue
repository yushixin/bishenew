<template>
  <div id="changeHeadimg">
	<common-header :title="title"></common-header>
	<div id="changeHeadimg-nextdiv">
		<div class="flex1 changeHeadimg-imgdiv">
			<div class="flex3"><div>当前头像</div></div>
			<div class="flex4">
				<img :src="src" alt="">
			</div>
		</div>
		<div class="flex2 changeHeadimg-formdiv center">
			<div class="changeHeadimg-formdiv-form">
				<form name="form1" id="form1">
					<a href="javascript:;" id="changeHeadimg-inputfile-css">
						<input type="file" name="photo" id="photo">点击这里上传图片
					</a>
					<input type="text" name="uid" :value="uid" readonly="readonly" style="display:none"/>
				</form>
			</div>
			<p class="showFileName center"></p>
			<p class="showFileName-zhanwei"></p>
	        <div class="changeHeadimg-formdiv-submitbutton center" @click="changeHeadimgSubmit" >提交</div>
		</div>
 	</div>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader from '../common/CommonHeader'
  import CommonFooter from '../common/CommonFooter'

//youcan_or_yot_youcan_this_is_a_question

		export default {
		  	name: 'updatapage',
			data () {
				return {
					title:'修改头像',
					src:'',
					uid:''
				}
			},
			components:{
    			CommonHeader,
    			CommonFooter,
 			},
 			methods:{
				youcan_or_yot_youcan_this_is_a_question:function(){
					var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage
					this.uid = nowUserid;
					if(nowUserid){
						console.log("当前是用户"+ this.uid +"修改头像页面");
					}else if(nowUserid == null){
						this.$router.push({path:"/WillDie"});
					}
				},
				changeHeadimgSubmit:function(){
					// var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage

					var form=document.getElementById("form1");
					var fd =new FormData(form);
					$.ajax({
			             url: "http://127.0.0.1/bishegogogo/CI/User/changeHeadimg",
			             type: "POST",
			             data: fd,
			             processData: false,  // 告诉jQuery不要去处理发送的数据
			             contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
			             success: function(response,status,xhr){
			             	console.log(response);
			                var json=$.parseJSON(response);
			                var imgsrc = 'http://127.0.0.1/img/TX/' + json['photo'];
			                $("img").attr("src",imgsrc);
			             }
					});
					return false;
				},
				showNowimg:function(){
					var value = sessionStorage.getItem("u_id");//获取当前用户id

			        Axios.get('http://localhost:3000/showInformation',{//Axios向中间层提交请求
			          params:{
			            value:value
			          }
			        }).then((res)=>{
			          var value2=JSON.parse(res.data);
			          // console.log(value2);
			          this.data = value2;
			          // console.log(this.data.u_img);
			          if(this.data.u_img){
			            this.src = 'http://127.0.0.1/img/TX/' + this.data.u_img;
			          }else if(this.data.u_img == null){
			            this.src = 'http://127.0.0.1/img/TX/mrxianshi.jpg';
			          }
			        });
				},

 			},
			mounted(){
				this.youcan_or_yot_youcan_this_is_a_question();
				this.showNowimg();
				$(".showFileName").html("").hide();
				$(".showFileName-zhanwei").html("").show();


				$("#changeHeadimg-inputfile-css").on("change","input[type='file']",function(){
					var filePath=$(this).val();
					var arr = filePath.split('\\');
			    	var filename =arr[arr.length-1];
					$(".showFileName-zhanwei").html("").hide();
				    $(".showFileName").html(filename).show();

				});

			}
		}
</script>

<style scoped>
	img{
		width: 100%;
		height: 100%;
	}
	p{
		margin:0;
	}

	#changeHeadimg{
		position: absolute;
		font-size: 0.4rem;
		width: 100%;
		height: 100%;
	}
	#changeHeadimg-nextdiv{
		position: relative;
		top: 1rem;
		width: 100%;
		height: 60%;

		display: flex;
		flex-direction: column;
		top: 1rem;
	}

	.changeHeadimg-imgdiv{
		flex: 0.6;

		display: flex;
		flex-direction: row;
	}
	.changeHeadimg-formdiv{
		flex: 0.4;	

		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	.flex3{
		flex: 0.3;
		width: 100%;
		height: 100%;

		display: flex;
		align-items:flex-end;

	}
	.flex4{
		flex: 0.7;
		width: 100%;
		height: 100%;

	}
	.changeHeadimg-formdiv-form{
		width: 100%;
		flex:1;
	}
	.changeHeadimg-formdiv-submitbutton{
		flex: 1;
	    border-radius: 50px;
		background: #0ABAB5;
		width: 50%;
	}
	#changeHeadimg-inputfile-css{
		/*padding: 4px 10px;*/
	    position: relative;
	    display: inline-block;
	    background: #D0EEFF;
	    border: 1px solid #99D3F5;
	    border-radius: 4px;
	    padding: 4px 12px;
	    overflow: hidden;
	    color: #1E88C7;
	    text-decoration: none;
	    text-indent: 0;
	    /*line-height: 40px;*/
	}
	#changeHeadimg-inputfile-css input{
	    position: absolute;
	    font-size: 100px;
	    right: 0;
	    top: 0;
	    opacity: 0;
	    filter: alpha(opacity=0);
	    cursor: pointer
	}
	#changeHeadimg-inputfile-css:hover {
	    color: #444;
	    background: #eee;
	    border-color: #ccc;
	    text-decoration: none
	}
	.showFileName{
		flex: 1;
		height: 50px;
		width: 100%;
	}
	.showFileName-zhanwei{
		height: 50px;
		width: 100%;
		flex: 1;

	}
	.center{
		display: flex;
		justify-content: center;
		align-items:center;
	}

</style>
