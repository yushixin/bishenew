<template>
  <div class="displayflex mallnext">
    <div class="displayflex mall-centent">
      <div class="displayflex mall-centent-row" v-for="(data,index) in commoditydata">
              <router-link tag="div" :to="'/CommodityDetails/'+data.commodity_id">
                  <div class="row-leftimg">
                    <img src="../assets/img/adminindexheader.jpg">
                  </div>
                  <div class="displayflex flex1 row-right">
                    <div class="flex1 row-right-name"><p>{{data.commodity_name}}</p></div>
                    <div class="displayflex flex1 row-right-other">
                        <div class="flex1 row-right-other-style other-price">
                            <span class="glyphicon glyphicon-yen"></span>{{data.commodity_price}}
                        </div>
                        <div class=" flex1 row-right-other-style other-stock">
                            <span class="glyphicon glyphicon-th-large"></span>{{data.commodity_stock}}
                        </div>
                        <div class="flex1 row-right-other-style other-category">
                            <span class="glyphicon glyphicon-tags"></span>{{data.commodity_category}}
                        </div>
                    </div>
                  </div>
                  <div class="row-rightright" v-if="data.commodity_stock==0"></div>
                  <div class="row-rightright2" v-else></div>
                </router-link>
            </div>

      <div style="height:1rem;"></div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
  export default {
      data() {
        return {
          commoditydata:[]
        }
      },
      methods:{
        getData:function(){
          Axios.get('http://localhost:3000/showAllCommodity')
          .then((res)=>{
            this.commoditydata = JSON.parse(res.data);
            console.log(this.commoditydata);
          });
        },
      },
      mounted(){
        this.getData();
      }
  }
</script>
<style scoped>
  p{
   margin:0;
  }

  .displayflex{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flex1{
    flex:1;
  }
  .mallnext{
    width: 100%;
  }
  .mall-centent{
    width: 100%;
    padding: 10px;
    flex-direction: column;
  }
  .mall-centent-row{
    width: 100%;
    height: 1.5rem;
    margin-bottom: 10px;
/*    border-right-style: solid;
    border-right-width: 4px;
    border-right-color: #66FF99;*/
    flex-direction: row;
  }
  .mall-centent-row div{
    display: flex;

    /*flex-direction: row;*/
  }
  .row-leftimg{
    width: 1.5rem;
    height: 100%;
  }
  .row-leftimg img{
    width: 100%;
    height: 100%;
  }
  .row-right{
    display: flex;
    justify-content: center;
    flex-direction: column;
  }
  .row-right-name{
    width: 100%;
    font-size: 0.5rem;
    padding-left:10px;
    display: flex;
    align-items: center;
  }
  .row-right-name p{
      text-overflow:ellipsis;
      overflow:hidden;
      white-space:nowrap;
      width:4rem;
  }
  .row-right-other{
    width: 100%;
    height: 100%;
    color: #777;
    flex-direction: row;
  }
  .row-right-other-style{
    height: 100%;
  }
  .other-price{
    height: 100%;
        display: flex;
    align-items: center;
  }
  .other-stock{
    height: 100%;
    display: flex;
    align-items: center;
  }
  .other-category{
    height: 100%;
    display: flex;
    align-items: center;  
  }
  .row-rightright{
    width: 3px;
    height: 100%;
    background: #FF0033;
  }
  .row-rightright2{
    width: 3px;
    height: 100%;
    background: #66FF99;
  }
</style>
