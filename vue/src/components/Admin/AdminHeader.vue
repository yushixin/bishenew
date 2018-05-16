<template>
  <div class="adminindexcenter admin-header">
	<div class="adminindexcenter admin-header_left" @click="aa">
		<span class="adminindexcenter glyphicon glyphicon-menu-left"></span>
	</div>
	<div class="adminindexcenter admin-header_right" :style="{background:$store.state.bgcolor}">{{$store.state.title}}</div>
	<div class="adminindexcenter admin-header_rightright" :style="{background:$store.state.bgcolor}" @click="toindex"><img src="../../assets/img/adminindexheader.jpg" alt=""></div>
  </div>
</template>

<script>
  import Axios from "axios";

		export default {
		  	name: 'admin-header',
			data () {
				return {
				}
			},
			components:{
 			},
 			methods:{
				aa:function(){
					history.go(-1);
				},
				toindex:function(){
					this.$router.push({path:"/adminindex"});
				}
 			},
			mounted(){

			}
		}
</script>


<style scoped>
	.adminindexcenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.admin-header{
		width: 100%;	
		height: 0.7rem;	
		position: fixed;
		top: 0;
		left: 0;
		flex-direction: row;
	}
	.admin-header_left{
		width: 0.7rem;
		height: 0.7rem;
		background: #FE1D45;

	}
	.admin-header_left span{
		width: 100%;
		height: 100%;
		font-size: 0.7rem;
	}
	.admin-header_right{

		flex: 1;
		height: 100%;
		font-size: 0.4rem;
		color: #000;
	}
	.admin-header_rightright{
		width: 0.7rem;
		height: 0.7rem;
	}
		.admin-header_rightright img{
		width: 100%;
		height: 100%;
	}
	
</style>
