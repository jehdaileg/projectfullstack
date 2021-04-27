import Vue from 'vue'

import Router from 'vue-router'

import mainapp from './components/MainApp.vue'

import home from './components/pages/home.vue'

import Tags from './components/pages/Tags.vue'



Vue.use(Router)

const routes = [

{
    path : "/",

    component : home

},

{

    path : "/tags",

    component : Tags

},

{
   path : "/main",

   component : mainapp


},


];

export default new Router({

    mode : "history",

    routes
})
