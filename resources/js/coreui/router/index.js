import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '@/containers/Full'

// Views
import Dashboard from '@/views/pages/Dashboard'
import Forms from '@/views/functions/Forms'
import Tables from '@/views/functions/Tables'


// Views - Pages
import Page404 from '@/views/pages/Page404'
import Page500 from '@/views/pages/Page500'
import Login from '@/views/pages/Login'
import Register from '@/views/pages/Register'

// Sample route
import sample from './sample'

Vue.use(Router)

export default new Router({
  mode           : 'history',
  linkActiveClass: 'open active',
  scrollBehavior : () => ({ y: 0 }),
  routes         : [
    {
      path     : '/mypage/',
      redirect : '/mypage/',
      name     : 'Home',
      component: Full,
      children : [
        {
          path     : '/',
          name     : '',
          component: Dashboard,
        },
        {
          path     : 'resist',
          name     : 'Resist',
          component: Forms,
        },
        {
          path     : 'list',
          name     : 'List',
          component: Tables ,
        },
      ],
    },
    {
      path     : '/mypage/pages',
      redirect : '/mypage/pages/404',
      name     : 'Pages',
      component: { render (c) { return c('router-view') } },
      children : [
        {
          path     : '404',
          name     : 'Page404',
          component: Page404,
        },
        {
          path     : '500',
          name     : 'Page500',
          component: Page500,
        },
        {
          path     : 'login',
          name     : 'Login',
          component: Login,
        },
        {
          path     : 'register',
          name     : 'Register',
          component: Register,
        },
      ],
    },
    {
      path     : '/mypage/*',
      name     : '404',
      component: Page404,
    },
  ],
})
