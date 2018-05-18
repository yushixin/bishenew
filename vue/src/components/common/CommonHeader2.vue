<template>
	<div class="header">
    <div class="header_left"><div class="article-page-center header_left-div" @click="aa"><span class="glyphicon glyphicon-menu-left"></span></div></div>
    <div class="header_middle"><h2>{{$store.state.title}}</h2></div>
    <div class="header_right" @click="toMessage"><div><span class="glyphicon glyphicon-leaf"></span></div></div>
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
      },
    toMessage:function () {
      this.$router.push({path:"/Message"});

    }
  },
  mounted(){

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
    background: #fff;
    color: #000;
    height: 1rem;
    z-index:1;
    display:flex;
    flex-direction: row;
    box-shadow: 0 1px 0 #ccc;

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
    flex: 1;
    display:flex;
    align-items: center;
    flex-direction: row-reverse;
  }
  .header_right div{
    height: 50px;
    width: 50px;
    display:flex;
    align-items: center;
    justify-content: center;
    font-size: 0.4rem;
  }

</style>
