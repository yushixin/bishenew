<template>
	<div class="search">
    <div class="search-page-center search-header">
        <div class="search-page-center search-header-return" @click="returnfunction"><span class="glyphicon glyphicon-menu-left"></span></div>
        <div class="search-page-center search-header-input"><input type="text"  v-model="searchvalue" placeholder="请输入搜索内容"></div>
        <div class="search-page-center search-header-button" @click="search"><span class="glyphicon glyphicon-search"></span></div>

    </div>

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

	</div>
</template>

<script>
  import Axios from "axios";

export default {
  data() {
    return {
      searchvalue:'',
      data:[]
    }
  },
  // props:['title'],
  methods : {
    returnfunction:function(){
      history.go(-1);
    },
    search:function(){
      console.log(this.searchvalue);
      Axios.get("http://localhost:3000/indexsearch",{
        params:{
          searchvalue:this.searchvalue,
        }
      }).then((res)=>{
        this.data = JSON.parse(res.data);
        console.log(this.data);

      });
    }
     
  },
  mounted(){
        
  }
}

</script>

<style>
  input{
    outline: none;

  }
  .index-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .search-page-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .search{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;

  }
  .search-header{
    width: 100%;
    height: 1rem;
    flex-direction: row;
    box-shadow:  0 1px 0 #ccc;

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
  .search-header-return{
    width: 1rem;
    height: 100%;
    font-size: 0.4rem;
   }
  .search-header-input{
    flex: 1;
    width: 100%;
    height:100%;
    border: 1px solid block;
  }
  .search-header-button{
    width: 1rem;
    font-size: 0.5rem;
    color: #757575;
  }
  .search-header-input input{
    width: 80%;
    height: 70%;
    font-size: 0.4rem;
    border-left-width:0px;
    border-top-width:0px;
    border-right-width:0px;
    border-bottom-width:1px;

    border-bottom-color: #ccc;
  }
  
</style>