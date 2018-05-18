<template>
  <div class="shoppingcart-page">
      <common-header2></common-header2>
      <div style="height:1rem;"></div>
      <div class="flexJZ shoppingcart-content">
          <div class="flexJZ shoppingcart-content-box" v-for="(shoppingcartDatas,index) in shoppingcartData">
            <div class="flexJZ shoppingcart-content-box-row">
                <div class="flexJZ row-next row-ck"><input type="checkbox" name="xuanzhong" :value="shoppingcartDatas.sc_commodityid" @click="sum"></div>
                <div class="flexJZ flex2 row-next row-nameprice">
                    <div class="flexJZ flex2 row-nameprice-name">
                        <div class="row-nameprice-name-up">商品名：</div>
                        <div class="flex1 row-nameprice-name-down"><p>{{shoppingcartDatas.sc_commodityname}}</p></div>
                    </div>
                    <div class="flexJZ flex05 row-nameprice-price">
                        <div class="">单价：{{shoppingcartDatas.sc_price}}</div>
                    </div>
                </div>
                <div class="flexJZ flex1 row-next row-number">
                    <div class="row-number-up">数目：</div>
                    <div class="flexJZ flex1 row-number-down">
                      <div class="flexJZ flex1 h100 row-number-down-reduce" @click="reduce"><span class="glyphicon glyphicon-menu-left"></span></div>
                      <div class="flexJZ flex1 h100 row-number-down-num"><input type="text" name="buynumber" onkeyup="value=value.replace(/[^\d]/g,'')"  :value="shoppingcartDatas.sc_number"></div>
                      <div class="flexJZ flex1 h100 row-number-down-plus" @click="plus"><span class="glyphicon glyphicon-menu-right"></span></div>
                    </div>
                </div>
                <div class="flexJZ row-next row-delete" @click="nowdelete(index)">
                  <div>删</div>
                  <div>除</div>
                </div>
            </div>
          </div>
      </div>
      <div class="flexJZ ClearingWindow">
        <div class="flexJZ flex1 ClearingWindow-up">
          <div class="flexJZ flex1 upstyle ClearingWindow-up_left"><input id="allselect" type="checkbox" @click="allselect">全选</div>
          <div class="flexJZ flex2 upstyle ClearingWindow-up_right">总价：<input type="text" v-model="Totalprice" ></div>
        </div>
        <div class="flexJZ flex1 ClearingWindow-down">
          <div class="flexJZ flex1 ClearingWindow-down-button"><div class="flexJZ" v-if="deleteflag==1">批量删除</div></div>
          <div class="flexJZ flex1 ClearingWindow-down-button"><div class="flexJZ" @click="Settlement">结算</div></div>
        </div>
      </div>
      <div style="height:2rem;"></div><!-- 空div 用来占位 -->
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader2 from './common/CommonHeader2'

export default {
  data() {
    return {
        shoppingcartData:[],
        userData:[],
        nowUserid:"",
        number:"",
        deleteflag:"0",
        Totalprice:0
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
        Axios.get('http://localhost:3000/ShoppingCart',{
          params:{
            nowUserid:this.nowUserid
          }
        }).then((res)=>{
            this.shoppingcartData = JSON.parse(res.data);
        });
        var value=this.nowUserid;
        Axios.get('http://localhost:3000/showInformation',{//showInformation 输出信息
          params:{
            value:value
          }
        }).then((res)=>{
          var value2=JSON.parse(res.data);
          this.userData = value2;
        });
      },
      Settlement:function(){
        var orderuid = this.nowUserid;
        var ordersubmitter = this.userData.u_name;
        console.log("orderuid:"+orderuid);
        console.log("ordersubmitter:"+ordersubmitter);
        var checkBoxArr  = $(":input[name=xuanzhong]");
        var list = "";
        var arr = new Array();
        for (var i = 0 ; i < checkBoxArr.length ; i++) {
            if(checkBoxArr[i].checked == true){
             list = list + this.shoppingcartData[i].sc_commodityname+" ";
              arr.push(this.shoppingcartData[i].sc_id);
            }
        }
        Axios.get('http://localhost:3000/submitorder',{//showInformation 输出信息
          params:{
            orderuid:orderuid,
            ordersubmitter:ordersubmitter,
            list:list,
          }
        }).then((res)=>{
          var value = JSON.parse(res.data);
          console.log(value);
          if(value == true){
              Axios.get('http://localhost:3000/submitorderOKdelete',{
              params:{
                aimidarr:arr
              }
              }).then((res)=>{
              var data = JSON.parse(res.data);
              if(data == true){
                location.reload();

              }
              });
          }

        });
      },
      sum:function(){
           var checkBoxArr  = $(":input[name=xuanzhong]");
           var a = 0;
          for (var i = 0 ; i < checkBoxArr.length ; i++) {
            if(checkBoxArr[i].checked == true){
              // arr.push(checkBoxArr[i].value);
              a = a + this.shoppingcartData[i].sc_price * this.shoppingcartData[i].sc_number;
              this.Totalprice = a;
            }
          }
      },
      reduce:function(){

      },
      plus:function(){

      },
      nowdelete:function(index){
        var aimid = this.shoppingcartData[index].sc_id;
        console.log("aimid:"+aimid);
        Axios.get('http://localhost:3000/shoppdingcartDelete',{
          params:{
            aimid:aimid
          }
        }).then((res)=>{
            var data = JSON.parse(res.data);
            if(data == true){
              location.reload();

            }
        });
      },        
      allselect:function(){
          // $("#allselect").prop('checked',true);
          var is_check = $("#allselect").prop('checked');
          if(is_check==true){
            $(".row-ck input:checkbox").prop('checked',true);
            this.sum();
          }else{
            $(".row-ck input:checkbox").prop('checked',false);
            this.Totalprice = 0;
          }
        }
  },
  mounted() {
    this.$store.dispatch('changeTitle',['购物车']);
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
  .shoppingcart-content{
    width: 100%;
    padding: 10px;
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  }
  .shoppingcart-content-box{
    width: 100%;
    height: 2rem;
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  } 
  .shoppingcart-content-box-row{
    width: 100%;
    height: 100%;
    margin-top: 10px;
    border-width:1px;
    border-style:solid;
    border-color:#222;

    -webkit-flex-wrap: wrap-reverse;
    -moz-flex-wrap: wrap-reverse;
    -ms-flex-wrap: wrap-reverse;
    -o-flex-wrap: wrap-reverse;
    flex-wrap: wrap-reverse;
  }
  .row-next{
    width: 100%;
    height: 100%;
  }
  .row-ck{
    width: 0.5rem;
    height: 100%;
/*    border-width:1px;
    border-style:solid;
    border-color:#222;*/
  }
    .row-ck input{
    width: 100%;
    height: 0.3rem;

  }
  .row-nameprice{
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  }
  .row-nameprice-name{
    width: 100%;
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  }
  .row-nameprice-name-up{
    height: 0.6rem;width: 100%;font-size: 0.3rem;
    display: flex;
    align-items: center;
  }
  .row-nameprice-name-down{
    width: 100%;
    font-size: 0.5rem;
    display: flex;
    align-items: center;
  }
  .row-nameprice-name-down p{
      text-overflow:ellipsis;
      overflow:hidden;
      white-space:nowrap;
      width:3rem;
  }
  .row-nameprice-price{
    width: 100%;
  }
  .row-nameprice-price div{
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
  }
  .row-number{
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  }
  .row-number-up{
    height: 0.6rem;width: 100%;font-size: 0.3rem;
    display: flex;
    align-items: center;  
  }
  .row-number-down{
    width: 100%;
    -webkit-flex-direction: row;
    -moz-flex-direction: row;
    -ms-flex-direction: row;
    -o-flex-direction: row;
    flex-direction: row;
  }
  .row-number-down-reduce{
    
  }
  .row-number-down-num{

  }
  .row-number-down-num input{
    width: 100%;
    height: 50%;
  }
  .row-number-down-plus{
    
  }
  .row-delete{
    width: 0.5rem;
    height: 100%;
    background: red;
    font-size:0.3rem;
    color: #fff;
      /*border-radius:25px;*/
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;

  }


  .ClearingWindow{
    position: fixed;
    bottom:0;
    width: 100%;
    height: 2rem;
    background: #fff;

  }
  .ClearingWindow{
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column;
  }
  .ClearingWindow-up{ 
    width: 100%;
    -webkit-flex-direction: row;
    -moz-flex-direction: row;
    -ms-flex-direction: row;
    -o-flex-direction: row;
    flex-direction: row;
    }
  .upstyle{
    height: 100%;
  }
  .ClearingWindow-up_left{
    font-size: 0.3rem;
  }
  .ClearingWindow-up_left input{
    height: 0.4rem;
    width: 0.4rem;
  } 
  .ClearingWindow-up_right{
    font-size: 0.3rem;
    
  }  
  .ClearingWindow-up_right input{
    height: 50%;
    width: 70%;
    border: 0;
    
  }
  .ClearingWindow-down{
    width: 100%;
    -webkit-flex-direction: row;
    -moz-flex-direction: row;
    -ms-flex-direction: row;
    -o-flex-direction: row;
    flex-direction: row;
  }
  .ClearingWindow-down-button{
    height: 100%;
    font-size: 0.5rem;
  }
  .ClearingWindow-down-button div{
    width: 70%;
    height: 70%;
    background: #00FF99;
      border-radius:25px;

  }
</style>