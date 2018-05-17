<template>
  <div class="shoppingcart-page">
      <common-header2></common-header2>
      <div style="height:1rem;"></div>
      
      <div style="height:1rem;"></div><!-- 空div 用来占位 -->
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader2 from './common/CommonHeader2'

export default {
  data() {
    return {
        data:[],
        nowUserid:"",
    }
  },
  components:{
    CommonHeader2,
  },
  methods:{
      youcan_or_yot_youcan_this_is_a_question:function(){
        var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage
        this.nowUserid = nowUserid;
        if(nowUserid){
          console.log("youcan_or_yot_youcan_this_is_a_question函数 this.nowUserid:"+ this.nowUserid);
          this.nowuserid = nowUserid;
        }else if(nowUserid == null){
          this.$router.push({path:"/WillDie"});
        }
      },
      getData:function(){
        Axios.get('http://localhost:3000/showOneCommodity',{
          params:{
            commodityid:this.commodityid,
          }
        }).then((res)=>{
          this.data = JSON.parse(res.data);
        });
      },
  },
  mounted() {
    this.$store.dispatch('changeTitle',['购物车']);
    this.youcan_or_yot_youcan_this_is_a_question();
    // this.getData();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  input:focus { outline: none; } 

  .flexJZ{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flex1{
    flex: 1;
  }
  .flex05{
    flex: 0.6;
  }
  
</style>
