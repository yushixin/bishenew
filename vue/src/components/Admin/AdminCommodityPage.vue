<template>
  <div class="admin-commodity-page">
	<admin-header></admin-header>
commodity

  </div>
</template>

<script>
  import Axios from "axios";
  import AdminHeader from './AdminHeader'
		export default {
		  	name: 'admin-commodity-page',
			data () {
				return {
				}
			},
			components:{
				AdminHeader,
 			},
 			methods:{
 				
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['商品管理','ddd','#66FF99']);

			}
		}
</script>


<style scoped>
	.adminindexcenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.admin-commodity-page{
		width: 1024px;	
		height: 1366px;	
		background: #222;
	}
	
</style>
