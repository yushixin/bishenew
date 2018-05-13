<template>
  <div class="admin-article-page">
  	<admin-header></admin-header>
	
  </div>
</template>

<script>
  import Axios from "axios";
  import AdminHeader from './AdminHeader'

		export default {
		  	name: 'admin-article-page',
			data () {
				return {
					data:[]
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{

 			},
			mounted(){

				this.$store.dispatch('changeTitle',['动态管理','ddd','#66FFCC']);
				Axios.get('http://localhost:3000/showAllArticleData')
				.then((res)=>{
					this.data = JSON.parse(res.data);
					console.log(this.data);
				});
			}
		}
</script>


<style scoped>
	.adminindexcenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.admin-article-page{
		width: 1024px;	
		height: 1366px;	
		background: #222;
	}
	
</style>
