<template>
	<div class="search">
    <div class="search-page-center search-header">
        <div class="search-page-center search-header-return" @click="returnfunction"><span class="glyphicon glyphicon-menu-left"></span></div>
        <div class="search-page-center search-header-input"><input type="text" placeholder="请输入搜索内容"></div>
    </div>
    <div class="search-list">
      
    </div>

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
    returnfunction:function(){
          history.go(-1);
      },
     
  },
  mounted(){
        
  }
}

</script>

<style>
  input{
    outline: none;

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
  .search-list{
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