<!-- 
    willvue2.vue 20180425
    这是在PersonalCenter.vue页面中
    点击宠物删除按钮后短暂停留的界面 
                                  -->
<template>
  <div class="willdie">
    <div id="PersonalContent">
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
  },
  mounted(){
    var _this = this;
        _this.$router.push({path:"/PersonalCenter"});
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
}

</style>
