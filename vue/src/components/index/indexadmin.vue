<template>
  <div class="index-center IndexNext">

      <div class="index-center index-article-list" v-for="datas in data">
        <router-link :to="'/ArticleDetails/'+datas.a_id">

          <div class="index-article-list-tittle"><p>{{datas.a_title}}</p></div>
          <div class="index-article-list-content"><p>{{datas.a_article}}</p></div>
          <div class="index-center index-article-list-bottom">
              <div class="index-article-list-bottom_left">{{datas.u_name}}</div>
              <div class="index-article-list-bottom_middle">{{datas.a_time}}</div>
              <div class="index-article-list-bottom_right">{{datas.a_hot}}</div>
          </div>
        </router-link>

      </div>


      <div class="index-next-release" @click="toNewArticle"><div class="index-next-release-div"><span class="glyphicon glyphicon-plus"></span></div></div>
      <div style="height:1rem"></div>
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
    Axios.get('http://localhost:3000/showcontainertuijian')
      .then((res)=>{
          this.data = JSON.parse(res.data);
          console.log(this.data);
       });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  /*@import "../assets/css/reset.css";*/
  h3{
    margin:0;
  }
  p{
    margin:0;
  }
  .index-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .IndexNext{
    flex-direction: column;
    position: absolute;
    top: 1rem;
    width: 100%;
  }
  .index-article-list{
    width:90%;
    height: 2rem;
    margin: 10px;
    box-shadow: 0 1px 0 #757575;
    flex-direction: column;
  }
  .index-article-list-tittle{
    flex: 1;
    width: 100%;
    padding-left: 0.25rem;
    padding-right: 0.25rem;
    color: #222; font-size: 0.5rem;
    display: flex;
    align-items: center;
  }
  .index-article-list-tittle p{
    text-overflow:ellipsis;
    overflow:hidden;
    white-space:nowrap;
    width:300px;
  }
  .index-article-list-content{
    flex: 0.7;
    width: 100%;
    padding-left: 0.25rem;
    padding-right: 0.25rem;
    color: #757575; font-size: 0.3rem;
    display: flex;
    align-items: center;
  }
  .index-article-list-content p{
    text-overflow:ellipsis;
    overflow:hidden;
    white-space:nowrap;
    width:300px;
  }
  .index-article-list-bottom{
    flex: 0.5;
    width: 100%;    
    padding-left: 0.25rem;
    padding-right: 0.25rem;
    color: #757575; font-size: 0.2rem;
    flex-direction: row;
  }
  .index-article-list-bottom_left{
    flex: 1;
  }
  .index-article-list-bottom_middle{
    flex: 2;
    
  }
  .index-article-list-bottom_right{
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
    flex: 1;
    
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