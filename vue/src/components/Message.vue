<template>
  <div class="message-page">
    <common-header2></common-header2>
    <div style="height:1rem;"></div>
    <div class="flexJZ message-content-box" v-for="datas in data">
      <div class="flexJZ message-content-box-row">
        <div class=" flex1 row-next row-next-name">{{datas.message_time}}</div>
        <div class=" flex1 row-next row-next-content"><p>{{datas.message_message}}</p></div>
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
        Axios.get('http://localhost:3000/showMessage',{
          params:{
            nowuserid:this.nowuserid,
        }
        }).
        then((res)=>{
          this.data = JSON.parse(res.data);
          console.log(this.data);
        });

      }
    },
    mounted() {
      this.$store.dispatch('changeTitle',['站内信']);
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
  .message-content-box{
    width: 100%;
    flex-direction: column;
    padding: 20px;
  }
  .message-content-box-row{
    width: 100%;
    height: 2rem;
    flex-direction: column;
    border-width: 1px;
    border-color: #0f9ae0;
    border-style: solid;
  }
  .row-next{
    width: 100%;

  }
  .row-next-name{
    font-size: 0.4rem;
    flex-direction: row;
    display: flex;
    align-items: center;
    padding-left: 20px;
  }
  .row-next-name div{
    height: 100%;
    font-size: 0.6rem;
    color: #00B7FF;
  }
  .row-next-content{
    font-size: 0.4rem;
    display: flex;
    align-items: center;
    padding-left: 20px;
  }
</style>
