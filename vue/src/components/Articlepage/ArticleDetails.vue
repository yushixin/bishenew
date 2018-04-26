<template>
  <div class="article-page">
      <common-header></common-header>

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
      <div class="article-page-center article-page-comment">
          <div class="article-page-center article-page-comment-header">
              <div class="article-page-center article-page-comment-header_left">评论</div>
              <div class="article-page-comment-header_middle"></div>
              <div class="article-page-center article-page-comment-header_right" @click="reply">回复</div>
          </div>
          <div class="article-page-center article-page-comment-content">
              <div class="article-page-comment-contentrow" v-for="(commentdatas,index) in commentdata">
                  <div class="article-page-comment-contentrow-NT"><!-- NT:name&time -->
                      <div class="article-page-comment-contentrow-t">{{index+1}}楼 发布于：{{commentdatas.c_time}}</div>
                      <div class="article-page-comment-contentrow-n">来自：{{commentdatas.c_sendername}}</div>
                  </div>
                  <div class="article-page-comment-contentrow-TEXT">{{commentdatas.c_comment}}
                  </div>
              </div>
          </div>
      </div>
      <div class="article-page-center article-page-reply">
          <div class="article-page-center article-page-reply-input">
            <input type="text" class="" style="outline:none;">
          </div>
          <div class="article-page-center article-page-reply-button">
            <div class="article-page-center" @click="send">发送</div>
          </div>

      </div>

      <div style="height:1rem;"></div><!-- 空div 用来占位 -->

      <common-footer></common-footer>
  </div>
</template>

<script>
  import Axios from "axios";
  import CommonHeader from '../common/CommonHeader'
  import CommonFooter from '../common/CommonFooter'

export default {
  data() {
    return {
      title:"文章详情",
      data:[],
      author:'',
      nowuserid:'',
      commentdata:[],
      sendername:''
    }
  },
  components:{
          CommonHeader,
          CommonFooter
  },
  methods:{
    reply:function(){
      this.youcan_or_yot_youcan_this_is_a_question();
      $(".article-page-reply").css("height", "3rem");
    },
    send:function(){
      var value = $(".article-page-reply-input input").val();
      var articleid=this.$route.params.id;
      console.log("send函数 nowuserid"+ this.nowuserid);
      Axios.get('http://localhost:3000/showInformation',{
        params:{
          value:this.nowuserid
        }
      }).then((res)=>{
            var userdata=JSON.parse(res.data);
            var sendername = userdata.u_name;
            Axios.get('http://localhost:3000/commentsend',{ 
                params:{
                  value:value,
                  nowuserid:this.nowuserid,
                  articleid:articleid,
                  sendername:sendername
                }
            }).then((res)=>{
                var value = JSON.parse(res.data);
                console.log("send函数axios返回值："+value);
                if(value == true){
                    $(".article-page-reply").css("height", "0");
                    location.reload();
                }
            });
      });



    },
    youcan_or_yot_youcan_this_is_a_question:function(){
      var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage      
      if(nowUserid){
        console.log("youcan_or_yot_youcan_this_is_a_question函数 当前用户id："+ nowUserid);
        this.nowuserid = nowUserid;

      }else if(nowUserid == null){
        this.$router.push({path:"/WillDie"});
      }

    }
    
  },
  mounted() {
      this.$store.dispatch('changeTitle',['文章详情']);

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
      // 下面这个axios用来更新 commentdata
      Axios.get('http://localhost:3000/showCommentdata',{
        params:{
          aid:aid
        }
      }).then((res)=>{
          this.commentdata=JSON.parse(res.data);
          console.log(this.commentdata);

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

  .hide{
    height: 0; overflow: hidden;
  }
  .article-page-article{
    width: 100%;
    flex-direction: column;
    font-size: 0.4rem;

  }
  .article-page-article-title{
    width: 90%;
    flex: 1.5;
    height: 1rem;
    font-size: 0.5rem;
    flex-direction: row;
    border-bottom: 2px ridge;
  }
  .article-page-article-middle{
    width: 90%;
    font-size: 0.25rem;
    flex: 0.5;
    height: 0.5rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding-left: 20px;
    padding-right: 20px;
    border-bottom: 2px ridge;

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
    width: 90%;
    flex: 1;
    padding: 20px; 
  }

  .article-page-comment{
    display: flex;
    flex-direction: column;
  }
  .article-page-comment-header{
    height: 1rem;
    width: 90%;
    display: flex;
    flex-direction: row;
    font-size: 0.4rem;
    border-bottom: 2px ridge;

  }
  .article-page-comment-header_left{
    flex: 1;
    border-bottom: 2px ridge;


  }
  .article-page-comment-header_middle{
    flex: 2;
  }
  .article-page-comment-header_right{
    flex: 1;
    border:1px solid;
    border-radius:25px;
  }
  .article-page-comment-content{
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .article-page-comment-contentrow{
    margin-top: 10px;
    width: 100%;
    height: 1rem;
    font-size: 0.3rem;

    background: linear-gradient(to left, #FF3399, #FF3399) left top no-repeat, 
                linear-gradient(to bottom, #FF3399, #FF3399) left top no-repeat, 
                linear-gradient(to left, #FF3399, #FF3399) right top no-repeat,
                linear-gradient(to bottom, #FF3399, #FF3399) right top no-repeat, 
                linear-gradient(to left, #FF3399, #FF3399) left bottom no-repeat,
                linear-gradient(to bottom, #FF3399, #FF3399) left bottom no-repeat,
                linear-gradient(to left, #FF3399, #FF3399) right bottom no-repeat,
                linear-gradient(to left, #FF3399, #FF3399) right bottom no-repeat;
    background-size: 1px 20px, 20px 1px, 1px 20px, 20px 1px;
    padding: 5px;
    display: flex;
    flex-direction: column;
  }
  .article-page-comment-contentrow-NT{
    flex: 1;
    display: flex;
    flex-direction: row;
    font-size: 0.2rem;

  }
  .article-page-comment-contentrow-t{
    flex: 2;
    display: flex;
    flex-direction: row;
    align-items: center;
  }
  .article-page-comment-contentrow-n{
    flex: 1;
    display: flex;
    flex-direction: row-reverse;
    border-left: 1px solid black;
    align-items: center;

  }

  .article-page-comment-contentrow-TEXT{
    flex: 1;
    text-overflow:ellipsis;
    overflow:hidden;
    white-space:nowrap;
    width:300px;
  }

  .article-page-reply{
    position: fixed;
    bottom: 1.1rem;
    font-size: 0.4rem;

    height: 0; 
    overflow: hidden;/*隐藏页面元素的一种方式*/

    width: 100%;
    background: #CCCCCC;
    border:1px;
    border-radius:25px;
    /*opacity:0.9;*/

    display: flex;
    flex-direction: column;

    transition: all 0.3s;
    /*animation: myfirst 0.2s;*/
  }
 /* @keyframes myfirst
  {
    0%   {height:  0;}
    25%  {height: 1rem;}
    50%  {height: 2rem;}
    100% {height: 3rem;}
  }*/
  .article-page-reply-input{
    width: 70%;
    flex: 1;
  }
  .article-page-reply-input input{
    width: 100%;
  }
  .article-page-reply-button{
    flex: 1;
  }
  .article-page-reply-button div{
    height: 0.7rem;
    width: 2rem;
    border:1px;
    border-radius:25px;
    background: #99CCFF;
  }
</style>
