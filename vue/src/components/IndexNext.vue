<template>
  <div class="IndexNext">
      <div class="container-div" v-for="datas in data">
        <router-link :to="'/ArticleDetails/'+datas.a_id">
          <div class="title-div"><div>标题：</div><h3>{{datas.a_title}}</h3></div>
          <div class="text-div"><p>{{datas.a_article}}</p></div>
        </router-link>
      </div>
      <div class="index-next-release" @click="toNewArticle"><div class="index-next-release-div"><span class="glyphicon glyphicon-ok"></span></div></div>

  </div>
</template>

<script>
  import Axios from "axios";
export default {
  data() {
    return {
      data:[]
    }
  },
  methods:{
    toNewArticle:function(){
          this.$router.push({path:"/NewArticle"});
    },

  },
  mounted(){
    Axios.get('http://localhost:3000/showcontainer')
      .then((res)=>{
          this.data = JSON.parse(res.data);
       });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import "../assets/css/reset.css";*/
  h3{
    margin:0;
  }
  p{
    margin:0;
  }
  .IndexNext{
    position: absolute;
    top: 1rem;
    width: 100%;
    text-align: center;
  }
  .container-div{
    width: 90%;
    height: 2rem;
    background: #f1ccb8;
    /*margin-top: 20px;*/
    border: 3px solid block;
    margin:20px auto;
    clear: both;
  }
  .title-div{
    width: 100%;
    height: 1rem;
    font-size: 0.4rem;
    line-height: 1rem;
    border-bottom-style: solid;
    border-width: 3px;
    border-color: block; 
    text-align: center;
    margin: 0 auto;
  }
  .title-div h3{
    float: left;
    font-size: 0.4rem;
  }
  .title-div div{
    float: left;
  }
  .text-div{
    width: 100%;
    height: 1rem;
    font-size: 0.5rem;
  }
  .text-div p{
    text-overflow:ellipsis;
    overflow:hidden;
    white-space:nowrap;
    width:300px;
  }
  .index-next-release{
    position: fixed;
    bottom: 1.1rem;
    right: 0.1rem;
    height: 1rem;
    width: 1rem;
    background: #c20c2c;
    border-radius:30px;

    display: flex;
    justify-content: center;
    align-items: center;
  }
  .index-next-release-div{
    width: 0.6rem;
    height: 0.6rem;
    color: #fff;

  }
  .index-next-release-div span{
    width: 100%;
    height: 100%;
    font-size: 0.6rem;

  }
</style>
