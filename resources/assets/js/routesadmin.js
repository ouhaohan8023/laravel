import Home from './components/Hello.vue'
import Novel from './components/Novel.vue'
import NovelList from './components/NovelList_MyBlog.vue'
import MarkDown from './components/MarkDown.vue'
import MarkDownEdit from './components/MarkDownEdit.vue'

const routes = [
    {
        path: '/',
        component: MarkDown
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
        path: '/myBlog',
        component: NovelList
    },
    {
        path: '/markDown',
        component: MarkDown
    },
    {
        path: '/markDownEdit',
        component: MarkDownEdit
    }

]

export default routes