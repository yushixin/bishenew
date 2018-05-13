<!-- 
    WillDie2.vue 20180513
    这个页面出现在后台sessionstorage不存在的时候 
                                  -->
<template>
  <div class="willdie">
    请您先登录
  </div>
</template>

<script>

export default {
  data() {
    return {
    }
  },
  methods:{
    newbaby:function(){
      var _this = this;
      var life = setTimeout(function(){
        _this.$router.push({path:"/adminlogin"});
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
.willdie{
    width: 1024px;  
    height: 1366px; 
    background: #222;
    color: #fff;
    font-size: 0.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
