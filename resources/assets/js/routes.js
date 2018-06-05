import Home from './components/Hello.vue'
import Novel from './components/Novel.vue'
import NovelList from './components/NovelList.vue'
import NovelList2 from './components/NovelList_List.vue'


const routes = [
    {
        path: '/',
        name: 'NovelList',
        component: NovelList
    },
    {
        path: '/novel',
        component: Novel
    },
    {
        path: '/novel:id',
        component: Novel
    },
    {
        path: '/list/:id',
        name: 'NovelList2',
        component: NovelList2
    }
]

export default routes