记录一下路由
截至目前2018年5月8日，本项目中产生了两种路由
1. Laravel自带的路由
2. 项目加载的vue-router路由

计划采用vue-router支配前端路由，保持静态页面无加载，内容全部采用模块化

用Laravel的路由作为Api，与数据库交互，处理并返回结果

案例：
`web.php`中定义路由
```
Route::get ('/' , function () {
       return view ('index/index');
   });
```
项目访问`http://host.com/laravel/public/#/`时，访问的时Index/index模板

在以上模板中，有一个H5标签`<router-view></router-view>`，这个为`vue-router`的展示标签。因为在app.js中引入了`import routes from './routes'`，其中`routes.js`配置如下
```
import Home from './components/Hello.vue'
 import Novel from './components/Novel.vue'
 import NovelList from './components/NovelList.vue'
 
 
 const routes = [
     {
         path: '/',
         component: NovelList
     },
     {
         path: '/novel',
         component: Novel
     },
     {
         path: '/novel:id',
         component: Novel
     }
 ]
 
 export default routes
 ```
 
 可以看到，访问路径如下
 1. 访问`http://host.com/laravel/public/#/`
 2. 找到`Index/index.blade.php`,并展现
 3. 如果在模板中找到`<router-view></router-view>`，去查找`Vue`实例化中的`router`（在本项目中找到`routes.js`），去匹配`js`文件中的`routes`(整个叙述过程中`routes`之类的比较多，需要仔细看)。
    在本案例中，匹配到根目录`/`，然后去找对应的`NovelList`模板，展现在`<router-view></router-view>`中。
    
 注意：
 `http://host.com/laravel/public/#/novel?id=4`可以自动定位到laravel模板及Vue模板，并正常展现
 `http://host.com/laravel/public/novel?id=4`  会提示找不到路径