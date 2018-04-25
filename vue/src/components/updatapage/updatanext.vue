<template>
  <div class="UpdataNext">
    <div id="head-img">
      <img class="img-class" :src="headsrc" >
    </div>
    <div class="class1 zhanghao">账号：
      <input id="Username" type="text" v-model="Username" readonly="readonly">
    </div>
    <div class="class1 xingbie">
          <div class="xingbie-next xingbie-next1"><input type="radio" name="gender" value="man"  @click="fxkclick"/>男  </div>
          <div class="xingbie-next xingbie-next2"><input type="radio" name="gender" value="women"@click="fxkclick2" />女</div>
          <div class="xingbie-next xingbie-now"  ><input type="text" v-model="Gender" readonly="readonly"> </div>
    </div>


    <div class="class1 nianling">年龄：
      <input id="Age" type="text" v-model="Age">
    </div>
    <el-button class="tijiao" type="primary" style="width:100%" @click="nowupdata">提交</el-button>
    <div style="height:600px"></div>
  </div>
</template>

<script>
  import Axios from "axios";
export default {
  data() {
    return {
      Username:'',
      Gender:'',
      Age:'',
      Catname:'',
      headsrc:''
    }
  },
  methods:{

      showInformation:function(){//information 信息
                                  //这个function 用来在页面加载的时候从数据库获得信息
          var value = sessionStorage.getItem("u_id");
          Axios.get("http://localhost:3000/showInformation",{
              params:{
                value:value
              }
            }).then((res)=>{
                var value2=JSON.parse(res.data);
                console.log(value2);
                this.Username=value2.u_name;
                this.Gender=value2.u_gender;
                this.Age=value2.u_age;
                this.Catname=value2.u_catname;
                console.log(value2.u_img);
                if(value2.u_img){
                  this.headsrc= 'http://127.0.0.1/img/TX/'+value2.u_img;
                }
            });
      },
      nowupdata:function(){//这个function用来更改数据中的个人信息
        var uid = sessionStorage.getItem("u_id");
        var gender = this.Gender;
        var age = $("#Age").val();
        var catname = $("#Catname").val();

        Axios.get("http://localhost:3000/changeInformation",{
          params:{
            uid:uid,
            gender:gender,
            age:age,
            catname:catname
          }
        }).then((res)=>{

        })
      },
      fxkclick:function(){
        this.Gender=$("input[name='gender']:checked").val();
      },
      fxkclick2:function(){
        this.Gender=$("input[name='gender']:checked").val();
      }
  },
  mounted(){
    var nowUserid = sessionStorage.getItem("u_id");//在页面加载的时候获取当前有效sessionsStotage
    if(nowUserid){
      console.log("当前是用户"+ nowUserid +"修改头像页面");
    }else if(nowUserid == null){
      this.$router.push({path:"/WillDie"});
    }
    this.showInformation();

    //79-81行这段代码用来实现【input checkbox复选框只能选中一个】这个需求
    // $('#test').find('input[type=checkbox]').bind('click', function(){  
    //   $('#test').find('input[type=checkbox]').not(this).attr("checked", false);
    // });  
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  @import "../../assets/css/reset.css";
  p{
    margin: 0;
  }

  .UpdataNext{
    position: fixed;
    top: 1rem;
    position: relative;
    width: 100%;

    font-size: 20px;
  }
  .UpdataNext input {
    width: 75%;
    height: 100%;
  }

  
  #head-img{
    position: absolute;
    width: 100%;
    height: 200px;
  }
  .img-class{
    width: 200px;
    height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .class1{
    width: 100%;
    height: 50px;
    line-height: 50px;
    z-index: 99;
  }
  .zhanghao{
    position: absolute;
    top: 210px;
  }
  .xingbie{
    position: absolute;
    top: 270px;
    /*height: 100px;*/

    display: -webkit-flex;
    display: flex;
  }
  .xingbie div{
    height: 50px;
  }
  .xingbie-next{
    width: 100px;
    height: 50px;
    margin-right: auto;
  }
/*  .xingbie-next1{
    position: absolute;
    top: 50px;
    left: 100px;
  }
  .xingbie-next2{
    position: absolute;
    top: 50px;
    right: 100px;
  }*/

  .nianling{
    position: absolute;
    top: 330px;
  }
  .chongwu{
    position: absolute;
    top: 390px;
  }
  .tijiao{
    position: absolute;
    bottom: 1rem;
  }
  


</style>
