<template>
  <div class="admin-article-page">
  	<admin-header></admin-header>
		<div style="height:0.7rem;"></div>
	<div class="flexjuzhong admin-article-page-content">
		<div class="flexjuzhong admin-article-page-content-up">
			<div class="admin-article-page-content-up_left">
				<div class="flexjuzhong admin-article-page-content-up_left-div1"><input @click="allselect" id="allselect"  type="checkbox" title="全选"></div>
				<div class="admin-article-page-content-up_left-div2" >全选</div>
			</div>
			<div class="admin-article-page-content-up_middle"></div>
			<div class="admin-article-page-content-up_right">
				<div class="flexjuzhong" @click="deleteArticle">批量删除</div>
				<div class="flexjuzhong" @click="Recommend" v-if="this.RecommendFlag==1">推荐文章</div>
				<div class="flexjuzhong" @click="Recommend" v-if="this.RecommendFlag==2">确认</div>
			</div>
		</div>
		<div class="flexjuzhong admin-article-page-content-down">
			<div class="flexjuzhong a-a-p-content-down-header">
				<div class="flexjuzhong flex05"></div>
				<div class="flexjuzhong flex05">ID</div>
				<div class="flexjuzhong flex2">标题</div>
				<div class="flexjuzhong flex05">内容</div>
				<div class="flexjuzhong flex1">发布者</div>
				<div class="flexjuzhong flex05">热度</div>
				<div class="flexjuzhong flex05"></div>

			</div>
			<div class="flexjuzhong a-a-p-content-down-content">
				<div class="flexjuzhong a-a-p-content-down-content-next" v-for="articdatas in articdata">	
					<div class="flexjuzhong flex05 aapcdcn-ck"><input type="checkbox" name="fxk"></div>
					<div class="flexjuzhong flex05 aapcdcn-id">{{articdatas.a_id}}</div>
					<div class=" flex2 aapcdcn-title"><p>{{articdatas.a_title}}</p></div>

					
					<div class="flexjuzhong flex1 aapcdcn-content">
						<router-link :to="'/ArticleDetails/'+articdatas.a_id">查看</router-link>
					</div>
					

					<div class="flexjuzhong flex1 aapcdcn-author">{{articdatas.u_name}}</div>
					<div class="flexjuzhong flex05 aapcdcn-hot">{{articdatas.a_hot}}</div>
					<div class="flexjuzhong flex05 aapcdcn-tjarticle" >
						<input type="checkbox" name="tuijian" v-if="RecommendFlag==2" :checked="articdatas.a_articlepush">

					</div>

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
		  	name: 'admin-article-page',
			data () {
				return {
					articdata:[],
					RecommendFlag:"1"
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				getData:function(){
					Axios.get('http://localhost:3000/showAllArticleData')
					.then((res)=>{
						this.articdata = JSON.parse(res.data);
						for (var i = 0 ; i < this.articdata.length; i++) {
							if(this.articdata[i].a_articlepush == 0){
								this.articdata[i].a_articlepush = true;
							}else if(this.articdata[i].a_articlepush == 1){
								this.articdata[i].a_articlepush = false;
							}
						}
						console.log(this.articdata);
					});
 				},
 				allselect:function(){
					// $("#allselect").prop('checked',true);
					var is_check = $("#allselect").prop('checked');
    				if(is_check==true){
						$(".aapcdcn-ck input:checkbox").prop('checked',true);
					}else{
						$(".aapcdcn-ck input:checkbox").prop('checked',false);
					}
 				},
 				deleteArticle:function(){
					var checkBoxArr  = $(":input[name=fxk]");
					console.log(checkBoxArr);
					var arr = new Array()
					for (var i = 0 ; i < checkBoxArr.length ; i++) {
						if(checkBoxArr[i].checked == true){
							arr.push(this.articdata[i].a_id);
						}
					}
 					console.log(arr);
					Axios.get('http://localhost:3000/deleteArticle',{
						params:{
							deleteid:arr
						}
					}).then((res)=>{
						var value = JSON.parse(res.data);
						console.log(value);
						if(value == true){
							location.reload();
						}
					});
 				},
 				Recommend:function(){
 					if(this.RecommendFlag==1){
 						this.RecommendFlag = 2;
 					}else if(this.RecommendFlag==2){
 						var checkBoxArr  = $(":input[name=tuijian]");
						var tuijianArr = new Array()
						for (var i = 0 ; i < checkBoxArr.length ; i++) {
							if(checkBoxArr[i].checked == true){
								tuijianArr.push(this.articdata[i].a_id);
							}
						}
						console.log(tuijianArr);
						Axios.get('http://localhost:3000/updataRecommend',{
							params:{
								updataid:tuijianArr
							}
						}).then((res)=>{
							var value = JSON.parse(res.data);
							console.log(value);
							if (value == true) {
							location.reload();
								
							}
						});
 						this.RecommendFlag = 1;
 					}
 				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['动态管理','ddd','#66FFCC']);
				this.getData();
			}
		}
</script>


<style scoped>
	a{
		text-decoration:none;
		out-line:none;
		color: #fff;
	}
	p{
		margin:0;
	}
	.flexjuzhong{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.flex2{
		flex:2;
	}
	.flex1{
		flex:1;
	}
	.flex05{
		flex:0.5;
	}
	.admin-article-page{
		width: 1024px;
		height: 1366px;	
		background: #222;
		flex-direction: column;
	}
	
	.admin-article-page-content{
		flex: 1;
		padding: 40px;
		width: 100%;
		flex-direction: column;
	}
	.admin-article-page-content-up{
		width: 100%;
		height: 0.5rem;
		flex-direction: row;
		border-bottom:2px solid #66FFCC;
	}
	.admin-article-page-content-up_left{
		flex: 1;
		height: 100%;
		display: flex;
		align-items: center;
		flex-direction: row;
	}
	.admin-article-page-content-up_left-div1{
		width: 0.5rem;
		height: 100%;
	}
	.admin-article-page-content-up_left-div1 input{
		width: 50%;
		height: 50%;
		margin:0;
	}
	.admin-article-page-content-up_left-div2{
		width: 1rem;
		height: 100%;
		font-size: 0.2rem;
		color: #fff;
		display: flex;
		align-items: center;
	}
	.admin-article-page-content-up_middle{
		flex: 1;
		height: 100%;	

	}
	.admin-article-page-content-up_right{
		flex: 1;
		height: 100%;
		display: flex;
		flex-direction: row-reverse;
	}
	.admin-article-page-content-up_right div{
		width: 50%;	
		height: 100%;
		background: #66FFCC;
		font-size: 0.2rem;
		border:2px solid;
		border-radius:50px;
	}
	.admin-article-page-content-down{
		flex: 1;
		height: 100%;
		width: 100%;
		flex-direction: column;
	}
	.a-a-p-content-down-header{
		flex-direction: row;
		width: 100%;	
		height: 0.5rem;
		color: #FFF;
		font-size: 0.2rem;
		flex-direction: row;
		border-bottom:1px solid #66FFCC;
	}
	.a-a-p-content-down-header-ck{
		flex: 0.5;
	}	

	.a-a-p-content-down-content{
		flex: 1;
		width: 100%;
		display: flex;
		align-items: center;
		flex-direction: column;
	}
	.a-a-p-content-down-content-next{
		height: 0.5rem;	
		width: 100%;	
		flex-direction:row;
		color: #fff;
		font-size: 0.2rem;
	}
	.aapcdcn-ck{
		height: 100%;
	}
	.aapcdcn-ck input{
		width: 40%;	
		height: 40%;
	}
	.aapcdcn-id{
		height: 100%;

	}
	.aapcdcn-title{
		height: 100%;
		display: flex;
		align-items: center;
	}
	.aapcdcn-title p{
	    text-overflow:ellipsis;
	    overflow:hidden;
	    white-space:nowrap;
	    width:2rem;
	}
	.aapcdcn-content{
		height: 100%;

	}
	.aapcdcn-author{
		height: 100%;
	}
	.aapcdcn-hot{
		height: 100%;
	}
	.aapcdcn-tjarticle{
		height: 100%;
	}
	.aapcdcn-tjarticle input{
		width: 40%;
		height: 40%;
	}
</style>
