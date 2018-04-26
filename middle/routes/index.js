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
            // console.log(body);
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
    var articletitle = req.query.articletitle;
    var articletext = req.query.articletext;
    var uid = req.query.uid;
    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/sendOut',form:{articletitle:articletitle,articletext:articletext,uid:uid}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            res.json(body);
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
            console.log(body);
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
            console.log(body);
            res.json(body);
        }
    });
})

router.get('/showCommentdata',function(req,res,next){
    console.log("########## showCommentdata Run ##########");
    var aid = req.query.aid;

    request.post({url:'http://127.0.0.1/bishegogogo/CI/article/showCommentdata',form:{aid:aid}},function(error,response,body){ 
        if (!error && response.statusCode == 200) {
            console.log("*****返回值");
            console.log(body);
            res.json(body);
        }
    });
})

module.exports = router;
