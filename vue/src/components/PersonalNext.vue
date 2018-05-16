<template>
  <div class="PersonalNext">

    <div class="PersonalContent"><!-- 个人中心内容div-->
        <div class="PersonalData">    <!-- PersonalData 个人资料 -->
            <div class="HeadPortrait" @click="tochangeHeadimg">  <!-- headportrait 头像 -->
              <img :src="src">
            </div>
            <div class="Data">
                <div class="data-div1">
                    <div class="username-div1">用户名：</div>
                    <div class="username-div2">{{data.u_name}}</div>
                </div>
                <div class="data-div2">
                    <div class="zhuxiaoDiv" @click="godie">注销</div>
                    <div class="update" @click="updatafun">修改资料</div>
                </div>
            </div>
            <div style="height:150px"></div><!-- 空div 用来撑起PersonalData -->
        </div>
        <div class="cat-data">
            <div class="no-cat" v-if="this.catdata.length <= 0">
              您还没有完善宠物信息<div class="now-add" @click="toIPetI">立即添加</div>
            </div>
            <div class="have-cat" v-if="this.catdata.length > 0">
              哇！！你居然有猫！！！<div class="now-add" @click="toIPetI">立即添加</div>
            </div>
        </div>
        <div class="cat-list">
            <div class="cat-list-next" v-for="(catdatas,index) in catdata">   
                <div class="cat-list-next_style cat-list-catname">名字:</br>{{catdatas.cat_name}}</div>
                <div class="cat-list-next_style cat-list-catage">年龄:</br>{{catdatas.cat_age}}</div>
                <div class="cat-list-next_style cat-list-catvarieties">品种:</br>{{catdatas.cat_varieties}}</div>
                <div class="cat-list-next_style cat-list-select">
                      <div class="cat-list-select-updata" :data-catid="catdatas.cat_id" @click="catUpdata(index)">修改</div>
                      <div class="cat-list-select-delete" :data-catid="catdatas.cat_id" @click="catDelete(index)">删除</div>
                </div>

            </div>
       </div>
    </div>
  </div>
</template>

<script>
  import Axios from "axios";
export default {
    data() {
      return {
        data:[],
        src:'',
        catdata:[],
        click:'a'
      }
    },
    methods:{
      godie:function(){
          sessionStorage.removeItem('u_id');
          this.$router.push({path:"/willvue"});
      },
      updatafun:function(){
          this.$router.push({path:"/updatapage"});
      },
      toIPetI:function(){
          this.$router.push({path:"/IPetI"});//跳转到添加宠物信息
      },
      tochangeHeadimg:function(){
          this.$router.push({path:"/changeHeadimg"});
      },
      catUpdata:function(index){
          console.log(index);
          var catid = catdata[index].cat_id;
      },
      catDelete:function(index){
        var catid = this.catdata[index].cat_id;
        
        Axios.get('http://localhost:3000/catDelete',{//showInformation 输出信息
          params:{
            catid:catid
          }
        }).then((res)=>{
          var value=JSON.parse(res.data);
          console.log("sssss");
          console.log(value);
          this.$router.push({path:"/willvue2"});
        });
        
      }
    },
    mounted() {
        var value = sessionStorage.getItem("u_id");
        var _this = this;
        // 这个Axios用来输出用户信息
        Axios.get('http://localhost:3000/showInformation',{//showInformation 输出信息
          params:{
            value:value
          }
        }).then((res)=>{
          var value2=JSON.parse(res.data);
          console.log(value2);
          _this.data = value2;
          console.log(_this.data.u_img);

          if(_this.data.u_img == null){
            _this.src = 'http://127.0.0.1/img/TX/mr.jpg'

          }else if(_this.data.u_img){
            _this.src = 'http://127.0.0.1/img/TX/' + _this.data.u_img;

          }
        });
        // 这个Axios用来输出宠物信息
        Axios.get('http://localhost:3000/haveCatORnot',{//haveCatORnot 是否有宠物 
          params:{
            value:value
          }
        }).then((res)=>{
            this.catdata = JSON.parse(res.data);
        });
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  /*@import "../assets/css/reset.css";*/

    .PersonalNext{
      position: fixed;
      top: 1rem;
      position: relative;
    }
    .PersonalData{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 150px;
    }
    .PersonalContent{
      position: absolute;
      top: 0;
      width: 100%;
      height: 549px;
    }

    .HeadPortrait{
      position: absolute;
      top: 0;
      left: 0;
      width: 150px;
      height: 150px;
    }
    .HeadPortrait img{
      width: 100%;
      height: 100%;
    }
    .Data{
      position: absolute;
      top:30px;
      left: 150px;
      width: 225px;
      height: 120px;
    }
    .data-div1{
      position: absolute;
      top:0;
      left:0;
      height: 1rem; 
      width: 100%;
      border-bottom-style: solid;
      border-width: 1px;
      border-color: block;
    }
    .username-div1{
      position: absolute;
      top: 0;
      left: 0;
      font-size:0.4rem;
      width: 110px; 
      height: 1rem;
      text-align: center;
      line-height:1rem;
    }
    .username-div2{
      position: absolute;
      top: 0px;   
      left: 110px;
      width: 110px; 
      height: 1rem; 
      font-size: 0.4rem;
      text-align:center;
      line-height: 1rem;
    }
    .usernameDiv2 span{
      font-size: 0.4rem;
    }
   .data-div2{
      position: absolute;
      top: 1rem;
      left: 0;
      width: 100%;
      height: 1rem;
      border-bottom-style: solid;
      border-width: 1px;
      border-color: block;
    }
    .zhuxiaoDiv{
      position: absolute;
      top: 0;
      left: 0;
      font-size:0.4rem;
      width: 110px; 
      height: 1rem;
      text-align: center;
      line-height:1rem;
      border-right-style: solid;
      border-width: 1px;
      border-color: block;
      z-index: 99;
    }
    .update{
      position: absolute;
      top: 0px;
      right: 0px;

      font-size:0.4rem;
      width: 110px; 
      height: 1rem;
      text-align: center;
      line-height:1rem;
      z-index: 99;
    }
    

    /*下面是cat-data 部分css样式*/
    .cat-data{
      position: absolute;
      top: 160px;
      left: 0;
      /*background: red;*/
      width: 100%;
      /*height: 10px;*/
      text-align: center;
    }
    .no-cat{
      width: 100%;
      height: 1rem;
      font-size: 0.4rem;
      line-height: 1rem;
      position: absolute;
      top: 0;
    }
    .have-cat{
      width: 100%;
      height: 1rem;
      font-size: 0.4rem;
      line-height: 1rem;
            position: absolute;
      top: 0;
    }
    .now-add{
      display: inline;
      border-style: solid;
      border-width: 1px;
      border-color: block;
    }
    .displaynone{
      display: none;
    }


    /*catlist样式*/
    .cat-list{
      width: 100%;
      font-size: 0.3rem;
      position: absolute;
      top: 220px;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .cat-list-next{
      width: 100%;
      height: 1rem;
      margin-top: 10px; 

      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }
    .cat-list-next_style{
      flex : 1;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      border-bottom: 1px solid #D3D3D3;
    }
    .cat-list-catname{
    }
    .cat-list-catage{
      border-left:1px solid #D3D3D3;
    }
    .cat-list-catvarieties{
      border-left:1px solid #D3D3D3;
    }
    .cat-list-select{
      flex:0.5;
      display: flex;
      flex-direction: column;
    }
    .cat-list-select div{
      width: 100%;
      text-align: center;
      color: #fff;
      font-size: 0.3rem;
      border-radius:25px;
    }
    .cat-list-select-updata{
      background: #FF3333;
    }
    .cat-list-select-delete{
      background: #3299cc;
    }

</style>
