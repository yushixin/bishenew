<template>
  <div class="footer">
      <ul class="commonfooter">

          <li><router-link to="/index">
              <div class="commonfooter-page-center commonfooter-style commonfooter-index xuanzhongcolor">
                <div class="commonfooter-page-center commonfooter-style-next">
                    <div class="commonfooter-page-center commonfooter-style-next-icon"><div class="commonfooter-page-center"><span class="glyphicon glyphicon-home"></span></div></div>
                    <div class="commonfooter-page-center commonfooter-style-next-word"><div><p>首页</p></div></div>
                </div>
              </div>
          </router-link></li>

          <li><router-link to="/">
              <div class="commonfooter-page-center commonfooter-style commonfooter-mall">
                <div class="commonfooter-page-center commonfooter-style-next">
                    <div class="commonfooter-page-center commonfooter-style-next-icon"><div class="commonfooter-page-center"><span class="glyphicon glyphicon-folder-close"></span></div></div>
                    <div class="commonfooter-page-center commonfooter-style-next-word"><div><p>商城</p></div></div>
                </div>
              </div>
          </router-link></li>

          <li><router-link to="/PersonalCenter">
              <div class="commonfooter-page-center commonfooter-style commonfooter-me">
                <div class="commonfooter-page-center commonfooter-style-next">
                    <div class="commonfooter-page-center commonfooter-style-next-icon"><div class="commonfooter-page-center"><span class="glyphicon glyphicon-user"></span></div></div>
                    <div class="commonfooter-page-center commonfooter-style-next-word"><div><p>我</p></div></div>
                </div>
              </div>
          </router-link></li>

      </ul>
  </div>
</template>

<script>
  import Axios from "axios"
export default {
    name: 'hello',
    data () {
        return {

        }
    },
    methods:{

    },
    mounted(){
      var nowpath = this.$route.path;
      var index = "/index";
      var me = "/PersonalCenter";
      if(nowpath == index){
          $(".commonfooter-index").addClass("xuanzhongcolor");
          $(".commonfooter-mall").removeClass("xuanzhongcolor");
          $(".commonfooter-me").removeClass("xuanzhongcolor");
      }
      else if(nowpath == me){
          $(".commonfooter-index").removeClass("xuanzhongcolor");
          $(".commonfooter-mall").removeClass("xuanzhongcolor");
          $(".commonfooter-me").addClass("xuanzhongcolor");
      }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  @import "../../assets/css/reset.css";
  .commonfooter-page-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #fatie{
    font-size: 1rem;
  }
  .footer{
    height: 1rem;
    position: fixed;
    bottom:0;
    width: 100%;
    background: #fff;
    box-shadow: 0 -1px 0 #ccc;
  }
  .commonfooter{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .commonfooter li{
    flex: 1;
    height: 1rem;
    line-height: 1rem;
    display:inline-block;
    font-size: 0.4rem;
    text-align: center;
  }
  .commonfooter a{
    color: #CCCCCC;
    outline: none;
  }

  .commonfooter-style{
    width: 100%;
    height: 100%;
  }
  .commonfooter-style::selection { 
    background:lightblue;
  }
  .commonfooter-style-next{
    width: 80%;
    height: 80%;
    flex-direction: column;

  }
  .commonfooter-style-next-icon{
    flex: 1.5;
    width: 100%;

  }
  .commonfooter-style-next-icon div{
  }
  .commonfooter-style-next-icon div span{
    font-size: 0.4rem;
  }
  .commonfooter-style-next-word{
    flex: 1;
    width: 100%;
    font-size: 0.2rem;
  }



  .commonfooter_middle-mall{

  }
  .commonfooter_right-me{

  }
  .xuanzhongcolor{
    color: #c20c2c;
  }
</style>
