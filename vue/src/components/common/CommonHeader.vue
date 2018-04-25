<template>
	<div class="header">
		<h2>{{title}}</h2>
	</div>
</template>

<script>

export default {
  data() {
    return {
    }
  },
  props:['title']
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  @import "../../assets/css/reset.css";	



  .header{
    position: fixed;
    top: 0;
    width: 100%;
    background:#b8f1cc;
    color: #f55066;
    height: 1rem;
    z-index:1;
  }
    .header h2{
    flex: 1;
    text-align: center;
    /*text-indent: -1rem;*/
    line-height: 1rem;
  }

</style>
