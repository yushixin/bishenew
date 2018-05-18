<template>
  <div class="order-page">
      <common-header2></common-header2>
      <div style="height:1rem;"></div>
      <div class="flexJZ order-content-box" v-for="datas in data">
        <div class="flexJZ order-content-box-row">
          <div class="flexJZ flex1 row-left">
            <div class="flexJZ flex1 row-left-ordernum">
              <div class="row-left-up">订单号</div>
              <div class="row-left-down">{{datas.order_num}}</div>
            </div>
            <div class="flexJZ flex1 row-left-time">
              <div class="row-left-up">订单提交时间</div>
              <div class="row-left-down">{{datas.order_time}}</div>
            </div>
          </div>
          <div class="flexJZ row-right tg" v-if="datas.order_flag == 1">
            <div>通</div>
            <div>过</div>
          </div>
          <div class="flexJZ row-right sb" v-if="datas.order_flag == 0">
            <div>未</div>
            <div>审</div>
            <div>核</div>
          </div>
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
        nowUserid:"",
      rightflag:"1"

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
        Axios.get('http://localhost:3000/showOrder',{
          params:{
            nowUserid:this.nowUserid
          }
        }).
        then((res)=>{
            this.data = JSON.parse(res.data);
            console.log(this.data);
        });

      }
  },
  mounted() {
    this.$store.dispatch('changeTitle',['订单状态']);
    this.youcan_or_yot_youcan_this_is_a_question();
    this.getData();
  }
}
</script>

<style scoped>
  input:focus { outline: none; }
  input{
    margin:0;
  }

  .flexJZ{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flex1{
    flex: 1;
  }
  .flex2{
    flex: 2;
  }
  .flex05{
    flex: 0.6;
  }
  .h100{
    height: 100%;
  }
  .w100{
    width: 100%;
  }
  .order-content-box{
    width: 100%;
    flex-direction: column;
    padding: 20px;
  }
  .order-content-box-row{
    flex-direction: row;
    height: 2rem;
    width: 100%;
    border-bottom-color: #000000;
    border-bottom-style: solid;
    border-bottom-width: 1px;
  }
  .row-left{
    height: 100%;
    flex-direction: column;
  }
  .row-left-ordernum{
    width: 100%;
    flex-direction: column;
  }
  .row-left-time{
    width: 100%;
    flex-direction: column;

  }
  .row-right{
    width: 1rem;
    height: 100%;
    flex-direction: column;
    font-size: 0.4rem;
  }
  .row-left-up{
    width: 100%;
  }
  .row-left-down{
    width: 100%;
  }
  .tg{
    background: #66FF99;
  }
  .sb{
    background: #FF3333;
    color: #FFFFFF;
  }

</style>
