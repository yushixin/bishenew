<template>
  <div class="admin-user-page">
	<admin-header></admin-header>
	
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
	.adminindexcenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.admin-user-page{
		width: 1024px;	
		height: 1366px;	
		background: #222;
	}
	
</style>
