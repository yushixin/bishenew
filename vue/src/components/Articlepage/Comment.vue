<template>
  <div class="Comment">
      <common-header></common-header>
      <div style="height:1rem"></div>
      <comment-next></comment-next>
      <common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader from '../common/CommonHeader'
  import CommonFooter from '../common/CommonFooter'
  import CommentNext from './CommentNext'



export default {
  data() {
    return {
        title:'回复'

    }
  },
  components:{
        CommonHeader,
        CommonFooter,
        CommentNext
  },
  methods:{
  	
  },
  mounted(){

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import "../assets/css/reset.css";*/

  

</style>
