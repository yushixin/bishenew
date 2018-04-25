<template>
  <div id="PersonalCenter">
	<common-header :title="title"></common-header>
	<updata-next></updata-next>
	<common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import jQuery from "../../assets/js/jquery-1.12.4.min.js"
  import CommonHeader from '../common/CommonHeader'
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
    			CommonHeader,
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
				this.youcan_or_yot_youcan_this_is_a_question();

			}
		}
</script>

<style scoped>

</style>
