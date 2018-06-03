
### 下面详细介绍一下本篇博客的构成。

### [Demo请点击](https://www.ohh.ink)

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

#### ToDoList 下一步要实现的功能
>1. ~~文章编辑修改~~ (2018-06-02)
>2. 管理员删除文章
>3. 私密文章和公众文章的区分
>4. 增加swap到2G
>5. ~~对此项目写readme~~
>6. 增加emoji标签
>7. 标签增加，修改功能
>8. 使用max版本控制
>9. 列表页增加阅读量，点赞数
>10. 记录点赞ip及时间
>11. 分类增加修改功能
