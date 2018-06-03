import Home from './components/Hello.vue'
import Novel from './components/Novel.vue'
import NovelList from './components/NovelList_MyBlog.vue'
import MarkDownVueEdit from './components/MarkDownVueEdit.vue'
import MarkDownVue from './components/MarkDownVue.vue'
import TagController from './components/TagController.vue'



const routes = [
    {
        path: '/',
        component: NovelList
    },
    {
        path: '/novel',
        component: Novel
    },
    //{
    //    path: '/novel:id',
    //    component: Novel
    //},
    {
        path: '/myBlog',
        component: NovelList
    },
    //{
    //    path: '/markDown',
    //    component: MarkDown
    //},
    {
        path: '/markDownVue',
        component: MarkDownVue
    },
    {
        path: '/markDownEdit',
        component: MarkDownVueEdit
    },
    {
        path: '/tagController',
        component: TagController
    }

]

export default routes