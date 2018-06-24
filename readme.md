
### 下面详细介绍一下本篇博客的构成。

### [Demo请点击](https://www.ohh.ink)
#### [博客地址](https://www.ohh.ink/#/novel?id=33)
#### [Github](https://github.com/ouhaohan8023/laravel)

#### 框架构成：
> 1. Laravel 5.6
> 2. VueJs 2.0

#### 生产环境：
>1. Centos 7+
>2. Php 7.1.7
>3. Mysql 5.5+
>4. Nginx 1.12+

#### 插件扩展：
>1. [ElementUI](https://element.eleme.io/#/zh-CN)
>2. ~~基于[Editor.md](https://github.com/pandao/editor.md)改版的[laravel5-markdown-editor](https://github.com/ichenhua/laravel5-markdown-editor)~~ (2018-06-03弃用，改用mavonEditor)
>3. [VueRouter](https://router.vuejs.org/zh/)
>4. ~~VueResource~~(2018-06-04弃用,改用axios)
>5. 基于[markdown-it](https://github.com/markdown-it/markdown-it)改版的[mavonEditor](https://github.com/hinesboy/mavonEditor)
>6. [Axios](https://github.com/axios/axios)

#### VPS：
>1. [Vultr 日本节点 1核1G](https://www.vultr.com/?ref=7384945)

####目前的实现的功能
>1. 登陆注册
>2. 文章发布（包括分类，标签）
>3. 文章展示

#### 使用本项目
>1. git clone https://github.com/ouhaohan8023/laravel.git
>2. composer update
>3. npm install
>4. ~~php artisan vendor:publish --tag=markdown~~
>5. 复制`.env.example`，在相同路径下粘贴`.env`
>6. 导入根目录下的`sql`文件，并修改`.env`中的数据库相关配置
>7. npm run dev


#### 定时任务
```
要启用定时任务，需要在crontab中加入
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1

```

#### ToDoList 下一步要实现的功能
>1. ~~文章编辑修改~~ (2018-06-02)
>2. 管理员删除文章
>3. 私密文章和公众文章的区分
>4. 增加swap到2G
>5. ~~对此项目写readme~~
>6. 增加emoji标签
>7. ~~标签增加，修改功能~~(2018-06-04)
>8. 使用max版本控制
>9. ~~列表页增加阅读量，点赞数~~(2018-06-04)
>10. ~~记录点赞ip及时间~~(2018-06-10)
>11. 分类增加修改功能
>12. ~~引入友盟站长统计，增加footer~~(2018-06-04)
>13. ~~修改md展示样式~~(2018-06-04)
>14. ~~将菜单做成动态的~~(2018-06-12)
>15. ~~由于首页进入特变慢，希望加入动态加载页面~~(2018-06-10)
>16. markdown和七牛云的对接，上传图片
>17. ~~增加返回顶部按钮(2018-06-14)(被萌的不要不要的。。)~~
>18. ~~首页增加js时钟效果(2018-06-22)~~
>19. ~~黑洞效果登陆页面(2018-06-22)~~
>20. ~~点击事件js动效(2018-06-22)~~
>21. 首页右栏加心情功能(发表废话用)
>22. ~~文章列表上划加载(2018-06-23)~~