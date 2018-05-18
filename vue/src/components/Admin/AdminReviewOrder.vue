<template>
  <div class="review-order-page">
    <admin-header></admin-header>
    <div style="height:0.7rem;"></div>
    <div class="flexjz order-content">
      <div class="flexjz box" v-for="(datas,index) in data">
        <div class="flexjz row">
          <div class="flexjz  row-next row-next-left-left">

          </div>
          <div class="flexjz flex1 row-next row-next-left">
            <div class="flex1 row-next-left-up">
              <div class="flex1">订单号:{{datas.order_num}}</div>
              <div class="flex05">用户：<p class="flexjz">{{datas.order_submitter}}</p></div>
            </div>
            <div class="flex1 row-next-left-down">下单时间:{{datas.order_time}}</div>
          </div>
          <div class="flexjz row-next row-next-right" @click="OKOK(index)">
            <div>审</div>
            <div>核</div>
            <div>通</div>
            <div>过</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  import Axios from "axios";
  import AdminHeader from './AdminHeader'
  export default {
    name: 'review-order-page',
    data () {
      return {
        data:[],
      }
    },
    components:{
      AdminHeader,
    },
    methods:{
      OKOK:function(index){
        var orderid = this.data[index].order_id;
        console.log(orderid);
        Axios.get('http://localhost:3000/okokorder',{
          params:{
            orderid:orderid
          }
        }).then((res)=>{
          var value =JSON.parse(res.data);
          console.log("value"+value);
          if(value ==true){
            location.reload();

          }
        });
      },
      getDate:function(){
        Axios.get('http://localhost:3000/shownoReview'

        ).then((res)=>{
          this.data =JSON.parse(res.data);
          console.log("this.data"+this.data);
        });
      },
      commoditySubmit:function(){
        //
        // var life = setTimeout(function(){
        //   _this.$router.push({path:"/AdminCommodityPage"});
        // },1000);
      }
    },
    mounted(){
      this.$store.dispatch('changeTitle',['审核订单状态','ddd','#66FF99']);
      this.getDate();
    }
  }
</script>


<style scoped>
  p{
    margin: 0;
  }
  .flexjz{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flex1{
    flex:1;
  }
  .flex05{
    flex:0.7;
  }
  .review-order-page{
    width: 1024px;
    height: 1366px;
    background: #222;
    flex-direction: column;
  }
  .order-content{
    width: 100%;
    flex-direction: column;
    padding: 40px;
    color: #FFFFFF;
  }
  .box{
    width: 100%;
    height: 1.5rem;
    margin-bottom: 20px;
    flex-direction: column;
  }
  .row{
    width: 100%;
    height: 100%;
    flex-direction: row;
  }
  .row-next{
    height: 100%;
  }
  .row-next-left-left{
    height: 100%;
    width: 0.1rem;
    background: #66FF99;
    border-radius: 25px;

  }
  .row-next-left{
    width: 100%;
    height: 100%;
    flex-direction: column;
  }
  .row-next-left div{
    width: 100%;
    display: flex;
    align-items: center;
    font-size: 0.3rem;
  }
  .row-next-left-up p{
    color: #66ff99;
    font-size: 0.5rem;
  }
  .row-next-right{
    width: 0.5rem;
    height: 100%;
    font-size: 0.2rem;
    background: #66FF99;
    color: #000000;
    border-radius: 25px;
    flex-direction: column;
  }


</style>
