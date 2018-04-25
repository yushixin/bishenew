import Vue            from 'vue'
import Router         from 'vue-router'
import reg            from '@/components/reg'
import PersonalCenter from '@/components/PersonalCenter'
import login          from '@/components/login'
import Index          from '@/components/Index'
// import IndexNext      from '@/components/IndexNext'

import WillDie        from '@/components/WaitPage/WillDie'
import willvue        from '@/components/WaitPage/willvue'
import willvue2        from '@/components/WaitPage/willvue2'

import updatapage     from '@/components/updatapage/updatapage'
import changeHeadimg     from '@/components/updatapage/changeHeadimg'

import NewArticle     from '@/components/Articlepage/NewArticle'
import ArticleDetails from '@/components/Articlepage/ArticleDetails'
import ImprovingPetInformation from '@/components/Cat/ImprovingPetInformation'

import imgup          from '@/components/imgup'




Vue.use(Router)

export default new Router({
  routes: [
  	{
  		path: '/',
  		redirect: '/index'
  	},
  	{
  		path: '/index',
  		component: Index
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
    }
    
  ]
})
