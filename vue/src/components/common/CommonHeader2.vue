<template>
	<div class="header">
    <div class="header_left"><div class="article-page-center header_left-div" ><span :class="$store.state.nav"></span></div></div>
    <div class="header_middle"><h2>{{$store.state.title}}header2</h2></div>
    <div class="header_right"></div>
		<!-- @click="aa" -->
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
      }
  },
  mounted(){
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

  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>

  @import "../../assets/css/reset.css";	

  .headddder{

  }
  .displaynone{
    display: none;
  }
  .article-page-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .header{
    position: fixed;
    top: 0;
    width: 100%;
    background:#b8f1cc;
    color: #f55066;
    height: 1rem;
    z-index:1;
    display:flex;
    flex-direction: row;

  }
  .header h2{
    flex: 1;
    text-align: center;
    /*text-indent: -1rem;*/
    line-height: 1rem;
  }
  .header_left{
    flex: 1;
    font-size:0.5rem;
    display: flex;
    align-items: center;
  }
  .header_left div {
    width: 50px;
    height: 50px;
  }

  .header_middle{
    flex: 2
  }
  .header_right{
    flex: 1
  }

</style>
