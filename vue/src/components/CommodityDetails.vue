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
              <div class="flexJZ flex1 information-submit" @click="insertShoppingCart" v-if="flag == 0">添加至购物车</div>
              <div class="flexJZ select-buy-number"  v-if="flag == 1">
                <div class="flexJZ flex1 select-buy-number_left">
                    <div class="flexJZ flex1 select-buy-number-reduce" @click="reduce"><span class="glyphicon glyphicon-menu-left"></span></div>
                    <div class="flexJZ flex2 select-buy-number-input"><input type="text" name="buynumber" onkeyup="value=value.replace(/[^\d]/g,'')" v-model="buynumber"></div>
                    <div class="flexJZ flex1 select-buy-number-plus" @click="plus"><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
                <div class="flexJZ flex1 select-buy-number_right" @click="selectwanle">确定</div>
              </div>
          </div>
          <div  class="flexJZ select-buy-number-Prompt" v-if="showPromptFlag2 == 1">想要多少</div>
          <div  class="flexJZ select-buy-number-Prompt" v-if="showPromptFlag2 == 2">到底买不买</div>
          <div  class="flexJZ select-buy-number-Prompt" v-if="showPromptFlag2 == 3">没货了</div>
          <div  class="flexJZ select-buy-number-Prompt" v-if="showPromptFlag2 == 4">没那么多啊</div>
      <div class="flexJZ commodity-detais-mask" v-if="msakflag == 1">
          <div class="flexJZ mask">
              <div class="flexJZ flex1 mask-up"><b>where are you going?</b></div>
              <div class="flexJZ flex1 mask-down">
                  <div class="flexJZ flex1 mask-down_tomall"><div class="flexJZ" @click="tomall">继续看看？</div></div>
                  <div class="flexJZ flex1 mask-down_toshaoppingcart"><div class="flexJZ" @click="toshaopingcart">去购物车？</div></div>
              </div>
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
        commodityid:"",
        nowUserid:"",
        flag:"0",
        showPromptFlag2:"0",
        msakflag:"0",
        // number:0,
        buynumber:0,
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
        this.commodityid=this.$route.params.id;
        Axios.get('http://localhost:3000/showOneCommodity',{
          params:{
            commodityid:this.commodityid,
          }
        }).then((res)=>{
          this.data = JSON.parse(res.data);
          console.log(this.data);
        });

      },
      insertShoppingCart:function(){
          if(this.data.commodity_stock==0){
            this.showPromptFlag2=3;
          }else{
            this.flag=1;
            this.showPromptFlag2=1;
          }
      },
      selectwanle:function(){
        // this.buynumber = $("input[name=buynumber]").val();
              console.log(this.buynumber);

        if(this.buynumber > 0){
            if(this.buynumber > this.data.commodity_stock){
              console.log(this.buynumber);
              console.log(this.data.commodity_stock);

              console.log(this.buynumber > this.data.commodity_stock);
              this.showPromptFlag2 = 4;
            }else{
                Axios.get('http://localhost:3000/selecthaveornot',{
                  params:{
                    commodityid:this.commodityid,
                    nowUserid:this.nowUserid,
                  }
                }).then((res)=>{
                  var value = JSON.parse(res.data);
                  // console.log(data.length);
                  if(value.length >= 1){
                       Axios.get('http://localhost:3000/updataShoppingCart',{
                        params:{
                          buynumber:this.buynumber,
                          commodityid:this.data.commodity_id,
                        }
                      }).then((res)=>{
                        this.data = JSON.parse(res.data);
                        if(this.data == true){
                            this.msakflag =1;
                        }
                      });
                  }else if(value.length == 0){
                      console.log("buynumber:"+this.buynumber);
                      console.log("this.commodityid:"+this.commodityid);
                      console.log("this.nowUserid:"+this.nowUserid);
                      Axios.get('http://localhost:3000/insertShoppingCart',{
                        params:{
                          buynumber:this.buynumber,
                          commodityid:this.commodityid,
                          nowUserid:this.nowUserid,
                          commodityname:this.data.commodity_name,
                          price:this.data.commodity_price,
                        }
                      }).then((res)=>{
                        this.data = JSON.parse(res.data);
                        if(this.data == true){
                            this.msakflag =1;
                        }
                      });
                  }
                });
            }
        }else if(this.buynumber <= 0){
          this.showPromptFlag2 = 2;
        }

      },
      tomall:function(){
          this.$router.push({path:"/ShoppingMall"});

      },
      toshaopingcart:function(){
          this.$router.push({path:"/ShoppingCart"});

      },
      reduce:function(){
        if(this.buynumber == 0){

        }else if (this.buynumber > 0){
          this.buynumber -= 1;
        }
        
      },
      plus:function(){
        if(this.buynumber >= this.data.commodity_stock){

        }else if (this.buynumber < this.data.commodity_stock){
          this.buynumber += 1;
        }
        
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
  input:focus { outline: none; } 

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
  /*2018 - 05 - 17*/
  .select-buy-number{
    width: 100%;
    height: 1rem;
    font-size: 0.4rem;
    flex-direction: row;
  }
  .select-buy-number_left{
    height: 100%;
  }
  .select-buy-number-reduce{
    height: 100%;
    
  }  
  .select-buy-number-input{
    height: 100%;
    
  }
 .select-buy-number-input input{
    width: 80%;
    height: 80%;
    padding: 5px;
  }  
  .select-buy-number-plus{
    height: 100%;
  }
  .select-buy-number_right{
    height: 100%;
    font-size: 0.5rem;
    background: #3366FF;
    color: #fff;
  }
  .select-buy-number-Prompt{
    font-size: 0.5rem;
    height: 1rem;
    width: 100%;
    color: #000;
  }
  .mailejige{
    font-size: 0.5rem;
    height: 1rem;
    width: 100%;
    color: #000;
  }
  .commodity-detais-mask{
    position: fixed;
    top:1rem;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);

    /*background: red;*/

  }
  .mask{
    width: 100% ;
    height: 3rem;
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  }
  .mask-up{
    width: 100% ;
    font-size: 0.5rem;
  }
  .mask-down{
    width: 100%;
    flex-direction: row;
  }
  .mask-down_tomall{
    height: 100%;
  }
  .mask-down_toshaoppingcart{
    height: 100%;

  }
  .mask-down_tomall div{
    width: 70%;
    height: 50%;
    font-size: 0.4rem;
    background: #66FFFF;
    border-radius:25px;
  }
  .mask-down_toshaoppingcart div{
    width: 70%;
    height: 50%;
    font-size: 0.4rem;
    background: #66FFFF;
    border-radius:25px;
  }
</style>
