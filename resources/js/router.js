import Vue from 'vue'

import Router from 'vue-router'

import HomeComponent from './components/pages/Home'

Vue.use(Router)

const routes = [

{
    path : "/home",

    component : HomeComponent


}

];

export default new Router({

    mode : "history",

    routes
})
