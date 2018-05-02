<template>
	<div class="header1-page-center header_1">
    <div class="header1-page-center header_1_left">
        <div class="header1-page-center header_1_left-div"><span class="header1-page-center glyphicon glyphicon-align-justify"></span></div>
    </div>

    <div class="header1-page-center header_1_middle">
        <div class="dropdown">
            <button class="button-all btn btn-default dropdown-toggle header_1_middle-button" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              全部
              <span class="caret"></span>
            </button>
            <button class="button-top displaynone btn btn-default dropdown-toggle header_1_middle-button" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              热门
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li @click="toindexall"><router-link to="/index/indexall">全部</router-link></li>
              <li @click="toindextop"><router-link to="/index/indextop">热门</router-link></li>
            </ul>
        </div>
    </div>

    <div class="header1-page-center header_1_right">
      <div class="header_1_right-input"><div class="header_1_right-input-div"><div><input type="text" name="" id=""></div></div></div>
      <div class="header_1_right-icon" @click="to_SearchPage">
        <div><span class="glyphicon glyphicon-search"></span></div>
      </div>
    </div>
	</div>
</template>

<script>

export default {
  data() {
    return {
    }
  },
  // props:['title'],
  methods : {
      aa:function(){
          history.go(-1);
      },
      fitstfunction:function(){
        var a = this.$route.path;
        console.log(a);
        var b = "/index";
        if(a == b){
            console.log("aaa");
            $(".header_left-div").click(function(){
            });
        }else{
          console.log("bbb");
          $(".header_left-div").click(function(){
             history.go(-1);
            });
        }
      },
      showinput:function(){
        $(".header_1_right-input-div").css("width", "100%");
      },
      to_SearchPage:function(){
        this.$router.push({path:"/search"});
      },
      toindexall:function(){
        $(".button-all").removeClass("displaynone");
        $(".button-top").addClass("displaynone");

      },
      toindextop:function(){
        $(".button-top").removeClass("displaynone");
        $(".button-all").addClass("displaynone");
      }
  },
  mounted(){
        
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>

  @import "../../assets/css/reset.css";	

  .zzz{
    /*不知道这是什么鬼问题*/

  }
  input{
    outline: none;
  }
  .displaynone{
    display: none;
  }
  .header1-page-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .header_1{
    position: fixed;
    top: 0;
    width: 100%;
    height: 1rem;
    z-index:1;
    background: #fff;
    box-shadow: 0 1px 0 #ccc;


    flex-direction: row;
  }

  .header_1_left{

    width: 1rem;
    height: 100%;
  }
  .header_1_left-div{
    width: 60%;
    height: 60%;
    font-size: 0.4rem;
  }
  .header_1_left-div span{
    width: 100%;
    height: 100%;

  }
  .header_1_middle{
    width: 1.5rem;
    height: 100%;
    
  }
  .header_1_middle-button{
    width: 100%;
    height: 100%;
    border: 0;
  }
  .header_1_right{
    flex:2;
    flex-direction: row;

    width: 100%;
    height: 100%;
  }
  .header_1_right-input{
    flex: 1;
    height: 100%;
    padding:10px 0;
  }
  .header_1_right-input-div{
    width: 0;
    height: 100%;
    overflow: hidden;
    transition: all 0.3s;
  }
  .header_1_right-input-div div{
    width: 100%;
    height: 100%;
    border:1px solid;
    border-radius: 25px;
    padding: 7px;

  }
  .header_1_right-input-div div input{
    width: 100%;
    height: 100%;
    border: 0;

    font-size: 0.3rem;
  }
  .header_1_right-icon{
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
    width: 1rem;
    height: 100%;

  }
  .header_1_right-icon div{
    width: 60%;
    height: 60%;
    font-size: 0.4rem;
  }
  .header_1_right-icon span{
    width: 100%;
    height: 100%;
  }
  .dropdown{
    font-size: 0.5rem;
  }
  .dropdown-menu{
    top: 135%;
  }
  .btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    color: #333;
    background-color: #fff;
    border-color: #8c8c8c;
}
</style>
