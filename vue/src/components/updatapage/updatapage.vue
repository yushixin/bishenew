<template>
  <div id="PersonalCenter">
    <common-header2></common-header2>
    <updata-next></updata-next>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader2 from '../common/CommonHeader2'
  import CommonFooter from '../common/CommonFooter'
  import UpdataNext from './UpdataNext'

//youcan_or_yot_youcan_this_is_a_question

		export default {
		  	name: 'updatapage',
			data () {
				return {
					title:'修改资料'
				}
			},
			components:{
    			CommonHeader2,
    			CommonFooter,
    			UpdataNext
 			},
 			methods:{
				youcan_or_yot_youcan_this_is_a_question:function(){
					var value = sessionStorage.getItem("u_id");
					if(value == null){
						this.$router.push({path:"/WillDie"});
					}else if(value){
					}
				}
 			},
			mounted(){
				this.$store.dispatch('changeTitle',['修改资料','glyphicon glyphicon-triangle-left']);
				this.youcan_or_yot_youcan_this_is_a_question();
			}
		}
</script>

<style scoped>

</style>
