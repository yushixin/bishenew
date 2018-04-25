<!-- 
    willvue.vue 20180321
    这是在PersonalCenter.vue页面中
    点击注销后短暂停留的界面 
                                  -->
<template>
  <div class="willdie">
    <div id="PersonalContent">
        <span> 您已注销即将返回登录页面 </span>
    </div>
  </div>
</template>

<script>
  import jQuery from "../../assets/js/jquery-1.12.4.min.js"


export default {
  data() {
    return {
    }
  },
  methods:{
    newbaby:function(){
      var _this = this;
      
      var life = setTimeout(function(){
        _this.$router.push({path:"/login"});
      },1000);
    }
  },
  mounted(){
    this.newbaby();
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  @import "../../assets/css/reset.css";
#PersonalContent{
  width: 375px;
  height: 667px; 
  background: #b8f1ed;
  /*margin: 0 auto;*/
}
#PersonalContent span{
    display:block;
    position: relative;
    top:50%;
    transform:translateY(-50%);
}

</style>
