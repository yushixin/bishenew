<template>
  <div id="imgup">
	<div id="result"></div>
	<form name="form1" id="form1">  
        <p>photo:<input type="file" name="photo" id="photo"></p>  
        <p><input type="button" name="b1" value="submit"  @click="fsubmit"/></p>  
	</form>  
  </div>
</template>

<script>
  import Axios from "axios";

		export default {
		  	name: 'index',
			data () {
				return {
					file:'',
					src:''
				}
			},
			components:{

 			},
 			methods:{
				fsubmit:function(){
					var form=document.getElementById("form1");
					var fd =new FormData(form);
					console.log(fd);
					$.ajax({
			             url: "http://127.0.0.1/bishegogogo/CI/img/test",
			             type: "POST",
			             data: fd,
			             processData: false,  // 告诉jQuery不要去处理发送的数据
			             contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
			             success: function(response,status,xhr){
			                console.log(response);
			                var json=$.parseJSON(response);
							// console.log(json['imgurl']);
			                var result = '';
			                // result +="个人信息：<br/>name:"+json['name']+"<br/>gender:"+json['gender']+"<br/>number:"+json['number'];
			                 result += '<br/>头像：<img src="http://127.0.0.1/img/TX/'+json['photo']+'" height="100" style="border-radius: 50%;"/>';
			                 $('#result').html(result);
			             }
					});
					return false;
				}

 			},
			mounted(){

			}
		}
</script>


<style scoped>
  @import "../assets/css/reset.css";
	.file{
		font-size: 20px;
	}
	#form1{
		/*height: 1rem;*/
		font-size: 0.5rem;
	}
</style>
