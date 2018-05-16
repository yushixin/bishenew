var express = require('express');
var router = express.Router();
var request = require('request');

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});
router.get('/reg',function(req,res,next){
    var username = req.query.username;
    var password = req.query.password;
    console.log(username);
    console.log(password);
    request.get('http://127.0.0.1/bishegogogo/CI/user/reg?username='+username+"&password="+password,function(error, response, body){
        if (!error && response.statusCode == 200) {
            // 
            res.json(body);
        }
    });
});
router.get('/usernameTesting',function(req,res,next){
    var username = req.query.username;
    var password = req.query.password;
    // console.log(username);
    // console.log(password);
    request.get('http://127.0.0.1/bishegogogo/CI/user/usernameTesting?username='+username+"&password="+password,function(error, response, body){
        if (!error && response.statusCode == 200) {
                res.json(body);
        }
    });
});
router.get('/logintest',function(req,res,next){
    var username = req.query.username;
    var password = req.query.password;
    console.log(username);
    console.log(password);
    request.get('http://127.0.0.1/bishegogogo/CI/user/loginTest?username='+username+"&password="+password,function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
        }
    });
});

router.get('/showusername',function(req,res,next){
    var uid = req.query.value; 
    // console.log(uid);
    request.get('http://127.0.0.1/bishegogogo/CI/user/showUsername?uid='+uid,function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
        }
    });
})
router.get('/showInformation',function(req,res,next){
    var uid = req.query.value; 
    request.get('http://127.0.0.1/bishegogogo/CI/user/showInformation?uid='+uid,function(error, response, body){
        if (!error && response.statusCode == 200) {
            console.log("######showInformation 返回值");
            res.json(body);
        }
    });
})
router.get('/changeInformation',function(req,res,next){
    var uid = req.query.uid;
    var ugender = req.query.gender;
    var uage = req.query.age;
    var ucatname = req.query.catname;

    //遇到汉字跨域变值得问题 使用request.post可以避免    
    request.post({url:'http://127.0.0.1/bishegogogo/CI/user/changeInformation',form:{uid:uid,ugender:ugender,uage:uage,ucatname:ucatname}},function(error,response,body){
        if (!error && response.statusCode == 200) {
            res.json(body);
        }
    });
})

router.get('/sendout',function(req,res,next){
    console.log("########## sendout Run ##########");

    var articletitle = req.query.articletitle;
    var articletext = req.query.articletext;
    var uname = req.query.uname;
    var uid = req.query.uid;
    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/sendOut',form:{articletitle:articletitle,articletext:articletext,uname:uname,uid:uid}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            res.json(body);
            console.log("########## sendout 返回值 ##########");
            comsole.log(body);


        }
    });
})

router.get('/showcontainer',function(req,res,next){
    request.get('http://127.0.0.1/bishegogogo/CI/article/showcontainer',function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            
        }
    });
})
router.get('/showcontainertop',function(req,res,next){
    request.get('http://127.0.0.1/bishegogogo/CI/article/showcontainertop',function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            
        }
    });
})

router.get('/showArticleData',function(req,res,next){
    var aid = req.query.aid;
    request.get('http://127.0.0.1/bishegogogo/CI/article/showArticleData?aid='+aid,function(error,response,body){
        res.json(body);
    })
})
router.get('/haveCatORnot',function(req,res,next){
    var catmaster = req.query.value;
    request.get('http://127.0.0.1/bishegogogo/CI/user/haveCatORnot?catmaster='+catmaster,function(error,response,body){
        res.json(body);
    })
})
router.get('/CreatePetInf',function(req,res,next){
    var catName = req.query.catName;
    var varieties = req.query.varieties;
    var uid = req.query.uid;
    var catAge = req.query.catAge;
    console.log("tian jia chong wu");
    request.post({url:'http://127.0.0.1/bishegogogo/CI/Cat/CreatePetInf',form:{catName:catName,varieties:varieties,uid:uid,catAge:catAge}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            res.json(body);
        }
    });
})
router.get('/catDelete',function(req,res,next){
    var catid = req.query.catid;
    console.log("catDelete");
    request.post({url:'http://127.0.0.1/bishegogogo/CI/Cat/catDelete',form:{catid:catid}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****");
            
            res.json(body);
        }
    });
})
router.get('/commentsend',function(req,res,next){
    var value = req.query.value;
    var nowuserid = req.query.nowuserid;
    var articleid = req.query.articleid;
    var sendername = req.query.sendername;
    console.log("########## commentsend Run ##########");
    console.log(value);
    console.log(nowuserid);
    console.log(articleid);
    console.log(sendername);
    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/commentsend',form:{value:value,nowuserid:nowuserid,articleid:articleid,sendername:sendername}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****返回值");
            
            res.json(body);
        }
    });
})

router.get('/showCommentdata',function(req,res,next){
    console.log("########## showCommentdata Run ##########");
    var aid = req.query.aid;

    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/showCommentdata',form:{aid:aid}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            res.json(body);
        }
    });
})
router.get('/hotadd1',function(req,res,next){
    console.log("########## hotadd1 Run ##########");
    var aid = req.query.aid;

    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/hotadd1',form:{aid:aid}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****hotadd1 返回值");
            res.json(body);
            

        }
    });
})

router.get('/indexsearch',function(req,res,next){
    console.log("########## indexsearch Run ##########");
    var searchvalue = req.query.searchvalue;
    console.log("searchvalue: "+searchvalue);
    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/indexsearch',form:{searchvalue:searchvalue}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****indexsearch 返回值");
            res.json(body);
            

        }
    });
})



// 管理员部分
// 
router.get('/adminlogin',function(req,res,next){
    console.log("########## adminlogin Run ##########");
    var adminname = req.query.adminname;
    var adminpaw = req.query.adminpaw;
    
    console.log("adminname: "+adminname);
    request.post({url:'http://127.0.0.1/bishegogogo/CI/admin/adminlogin',form:{adminname:adminname,adminpaw:adminpaw}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****adminlogin 返回值");
            res.json(body);
            

        }
    });
})
router.get('/showAllArticleData',function(req,res,next){
    request.get('http://127.0.0.1/bishegogogo/CI/admin/showAllArticleData',function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            
        }
    });
})
router.get('/showAllUserData',function(req,res,next){
    request.get('http://127.0.0.1/bishegogogo/CI/admin/showAllUserData',function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            
        }
    });
})
router.get('/showAllCommodity',function(req,res,next){
    console.log("########## showAllCommodity Run ##########");

    request.get('http://127.0.0.1/bishegogogo/CI/admin/showAllCommodity',function(error, response, body){
        if (!error && response.statusCode == 200) {
            console.log("########## showAllCommodity 返回值 ##########");

            res.json(body);
        }
    });
})
router.get('/showquehuo',function(req,res,next){
    console.log("########## showquehuo Run ##########");

    request.get('http://127.0.0.1/bishegogogo/CI/admin/showquehuo',function(error, response, body){
        if (!error && response.statusCode == 200) {
            console.log("########## showquehuo 返回值 ##########");
            res.json(body);
            console.log(body);
        }
    });
})
router.get('/deleteuser',function(req,res,next){
    var deleteid = req.query.deleteid;
    console.log("########## deleteuser Run ##########");
    console.log(deleteid);
    request.get('http://127.0.0.1/bishegogogo/CI/admin/deleteuser?deleteid='+deleteid,function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            console.log("########## 返回值 Run ##########");
            
        }
    });
})
router.get('/deleteArticle',function(req,res,next){
    var deleteid = req.query.deleteid;
    console.log("########## deleteArticle Run ##########");
    console.log(deleteid);
    request.get('http://127.0.0.1/bishegogogo/CI/admin/deleteArticle?deleteid='+deleteid,function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            console.log("########## 返回值 Run ##########");
            
        }
    });
})
router.get('/deleteCommodity',function(req,res,next){
    var commodityid = req.query.commodityid;
    console.log("########## deleteCommodity Run ##########");
    console.log(commodityid);
    request.get('http://127.0.0.1/bishegogogo/CI/admin/deleteCommodity?commodityid='+commodityid,function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            console.log("########## deleteCommodity 返回值 ##########");
            
        }
    });
})

router.get('/updataRecommend',function(req,res,next){
    var updataid = req.query.updataid;
    console.log("########## updataRecommend Run ##########");
    console.log(updataid);
    request.get('http://127.0.0.1/bishegogogo/CI/admin/updataRecommend?updataid='+updataid,function(error, response, body){
        if (!error && response.statusCode == 200) {
            res.json(body);
            console.log("########## 返回值 Run ##########");
            
        }
    });
})
router.get('/insertCommodity',function(req,res,next){
    var ccname = req.query.ccname;
    var ccnum = req.query.ccnum;
    var ccprice = req.query.ccprice;
    var cccategory = req.query.cccategory;
    var stock = req.query.stock;
    console.log("########## insertCommondity Run ##########");
    console.log("ccname:"+ccname);
    console.log("ccnum:"+ccnum);
    console.log("ccprice:"+ccprice);
    console.log("cccategory:"+cccategory);
    console.log("stock:"+stock);
    request.post({url:'http://127.0.0.1/bishegogogo/CI/admin/insertCommodity',form:{ccname:ccname,ccnum:ccnum,ccprice:ccprice,cccategory:cccategory,stock:stock}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****insertCommondity 返回值");
            res.json(body);
            
        }    
    });
})
module.exports = router;
