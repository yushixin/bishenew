<template>
  <div class="article-page">
      <common-header :title="title"></common-header>

      <div style="height:1rem;"></div><!-- 空div 用来占位 -->

      <div class="article-page-center article-page-article">
          <div class="article-page-center article-page-article-title"><b>{{data.a_title}}</b></div>
          <div class="article-page-article-middle">
              <div class="article-page-article-middle_left">
                <div class="article-page-article-middle_left-author">作者: {{author}}</div>
                <div class="article-page-article-middle_left-time">{{data.a_time}}</div>
              </div>
              <div class="article-page-article-middle_right">
                aaaa
              </div>
          </div>
          <div class="article-page-article-article"><p>{{data.a_article}}</p></div>
      </div>
      <hr>
      <div class="article-page-comment">
          pinglun
      </div>

      <common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import jQuery from "../../assets/js/jquery-1.12.4.min.js"
  import CommonHeader from '../common/CommonHeader'
  import CommonFooter from '../common/CommonFooter'

export default {
  data() {
    return {
      title:"文章详情",
      data:[],
      author:''
    }
  },
  components:{
          CommonHeader,
          CommonFooter
  },
  methods:{
    
  },
  mounted() {
    var aid=this.$route.params.id;
    Axios.get('http://localhost:3000/showArticleData',{
      params:{
        aid:aid
      }
    }).then((res)=>{
          this.data = JSON.parse(res.data);
          console.log(this.data.u_id);
          var value = this.data.u_id;  
          Axios.get('http://localhost:3000/showInformation',{
            params:{
              value:value
            }
          }).then((res)=>{
                var userdata=JSON.parse(res.data);
                this.author = userdata.u_name;
          });
    });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  p,h2{
    margin:0;
  }
  .article-page-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .article-page{
    
  }
  .article-page-article{
    flex-direction: column;
    font-size: 0.4rem;
  }
  .article-page-article-title{
    width: 100%;
    flex: 1.5;
    height: 1rem;
    font-size: 0.5rem;
    flex-direction: row;


  }
  .article-page-article-middle{
    width: 100%;
    font-size: 0.25rem;
    flex: 0.5;
    height: 0.5rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding-left: 20px;
    padding-right: 20px;
  }
  .article-page-article-middle_left{
    flex: 9;
    display: flex;
    flex-direction: row;
  }
  .article-page-article-middle_left-author{
    height: 100%;
    flex: 3;
  }
  .article-page-article-middle_left-time{
    height: 100%;
    flex: 7;

    
  }
  .article-page-article-middle_right{
    flex: 1;
  }
  .article-page-article-article{
    flex: 1;
    padding: 20px; 
  }
</style>
