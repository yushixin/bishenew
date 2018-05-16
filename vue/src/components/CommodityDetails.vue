<template>
  <div class="commodity-page">
      <common-header2></common-header2>
      <div style="height:1rem;"></div>
      <div class="flexJZ commodity-content">
          <div class="flexJZ commodity-content-img">
              <img src="../assets/img/adminindexheader.jpg" alt="">
          </div>
          <div class="flexJZ  commodity-content-information">
              <div class="flexJZ flex1 information-name">
                  <div class="information-name_left">商品名：</div>
                  <div class="flex1 information-name_right"><p>{{data.commodity_name}}</p></div>
              </div>
              <div class="flexJZ flex1 information-other">
                  <div class="flexJZ flex1 information-other-next">
                      <div class="flex1 information-other-next-next_left">售价:</div>
                      <div class="flex1 information-other-next-next_right">{{data.commodity_price}}￥</div>
                  </div>
                  <div class="flexJZ flex1 information-other-next">
                      <div class="flex1 information-other-next-next_left">库存:</div>
                      <div class="flex1 information-other-next-next_right">{{data.commodity_stock}}</div>
                  </div>
                  <div class="flexJZ flex1 information-other-next">
                      <div class="flex1 information-other-next-next_left">品类:</div>
                      <div class="flex1 information-other-next-next_right">{{data.commodity_category}}</div>
                  </div>
              </div>
              <div class="flexJZ flex1 information-submit">添加至购物车</div>
          </div>
      </div>
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
    }
  },
  components:{
          CommonHeader2,
  },
  methods:{
      youcan_or_yot_youcan_this_is_a_question:function(){
        var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage
        if(nowUserid){
          console.log("youcan_or_yot_youcan_this_is_a_question函数 当前用户id："+ nowUserid);
          this.nowuserid = nowUserid;

        }else if(nowUserid == null){
          this.$router.push({path:"/WillDie"});
        }
      },
      getData:function(){
        var commodityid=this.$route.params.id;
        console.log("commodityid:"+commodityid);
        Axios.get('http://localhost:3000/showOneCommodity',{
          params:{
            commodityid:commodityid
          }
        }).then((res)=>{
          this.data = JSON.parse(res.data);
          console.log(this.data);
        });

      }
  },
  mounted() {
    this.$store.dispatch('changeTitle',['商品页面']);
    this.youcan_or_yot_youcan_this_is_a_question();
    this.getData();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .flexJZ{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flex1{
    flex: 1;
  }
  .flex05{
    flex: 0.5;
  }
  .commodity-content{
    width: 100%;
    flex-direction: column;
  }
  .commodity-content-img{
    width: 100%;
  }
  .commodity-content-img img{
    width: 6rem;
    height: 6rem;
  }
  .commodity-content-information{
    width: 100%;
    height: 3rem;
    padding-left: 10px;
    padding-right: 10px;
    flex-direction: column;
  }
  .information-name{
    width: 100%;
    height: 1rem;
    font-size: 0.5rem;
    flex-direction: row;
  }
  .information-name_left{
    width: 2rem;
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 0.4rem;
  }
  .information-name_right{
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 0.4rem;
  }
  .information-name_right p{
      text-overflow:ellipsis;
      overflow:hidden;
      white-space:nowrap;
      width:4rem;
  }
  .information-other{
    width: 100%;
    font-size: 0.25rem;
    flex-direction: row;
  }
  .information-other-next{
    height: 100%;
  }
  .information-other-next-next_left{
    height: 100%;
    display: flex;
    align-items: center;
  }
  .information-other-next-next_right{
    height: 100%;
        display: flex;
    align-items: center;
  }
  .information-submit{
    width: 100%;
    font-size: 0.5rem;
    background: #3366FF;
    color: #fff;
  }
</style>
