import Vue                      from 'vue'
import Router                   from 'vue-router'
import reg                      from '@/components/reg'
import PersonalCenter           from '@/components/PersonalCenter'
import login                    from '@/components/login'
import index                    from '@/components/Index'
import indexall                 from '@/components/index/indexall'
import indextop                 from '@/components/index/indextop'
import search                   from '@/components/search'
import WillDie                  from '@/components/WaitPage/WillDie'
import WillDie2                 from '@/components/WaitPage/WillDie2'
import willvue                  from '@/components/WaitPage/willvue'
import willvue2                 from '@/components/WaitPage/willvue2'
import updatapage               from '@/components/updatapage/updatapage'
import changeHeadimg            from '@/components/updatapage/changeHeadimg'
import NewArticle               from '@/components/Articlepage/NewArticle'
import ArticleDetails           from '@/components/Articlepage/ArticleDetails'
import Comment                  from '@/components/Articlepage/Comment'
import ImprovingPetInformation  from '@/components/Cat/ImprovingPetInformation'
import imgup                    from '@/components/imgup'
import adminindex               from '@/components/Admin/adminindex'
import adminlogin               from '@/components/Admin/adminlogin'
import AdminArticlePage         from '@/components/Admin/AdminArticlePage'
import AdminCommodityPage       from '@/components/Admin/AdminCommodityPage'
import AdminUserPage            from '@/components/Admin/AdminUserPage'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path:'/index',
      redirect:'/index/indexall'
    },
    {
      path: '/index',
      component: index,
      children: [
        { path: "/index/indexall", component: indexall },
        { path: "/index/indextop", component: indextop }

      ]
    },
    {
      path: '/',
      redirect:'/index/indexall'
    },
    {
      path: '/reg',
      name: 'reg',
      component: reg
    },
    {
      path: '/login',
      name: 'login',
      component: login
    },
    {
      path: '/PersonalCenter',
      name: 'PersonalCenter',
      component: PersonalCenter
    },
    {
      path: '/WillDie',
      name: 'WillDie',
      component: WillDie
    },
    {
      path: '/WillDie2',
      name: 'WillDie2',
      component: WillDie2
    },
        {
      path: '/willvue',
      name: 'willvue',
      component: willvue
    },
    {
      path: '/willvue2',
      name: 'willvue2',
      component: willvue2
    },
    {
      path: '/updatapage',
      name: 'updatapage',
      component: updatapage
    },
    {
      path: '/NewArticle',
      name: 'NewArticle',
      component: NewArticle
    },
    {
      path: '/ArticleDetails/:id',
      name: 'ArticleDetails',
      component: ArticleDetails
    },
    {
      path: '/IPetI',
      name: 'ImprovingPetInformation',
      component: ImprovingPetInformation
    },
    {
      path: '/imgup',
      name: 'imgup',
      component: imgup
    },
    {
      path: '/changeHeadimg',
      name: 'changeHeadimg',
      component:changeHeadimg
    },
    {
      path: '/Comment',
      name: 'Comment',
      component:Comment
    },
    {
      path: '/search',
      name: 'search',
      component: search
    },
    {
      path : '/adminindex',
      name : 'adminindex',
      component: adminindex
    },    
    {
      path : '/adminlogin',
      name : 'adminlogin',
      component: adminlogin
    },    
    {
      path : '/AdminArticlePage',
      name : 'AdminArticlePage',
      component: AdminArticlePage
    },    
    {
      path : '/AdminCommodityPage',
      name : 'AdminCommodityPage',
      component: AdminCommodityPage
    },    
    {
      path : '/AdminUserPage',
      name : 'AdminUserPage',
      component: AdminUserPage
    }
  ]
})