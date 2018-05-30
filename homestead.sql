/*
 Navicat Premium Data Transfer

 Source Server         : Laravel
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : 192.168.10.10:3306
 Source Schema         : homestead

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 30/05/2018 19:05:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for la_classify
-- ----------------------------
DROP TABLE IF EXISTS `la_classify`;
CREATE TABLE `la_classify` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '分类名称',
  `c_pid` int(11) DEFAULT NULL COMMENT '上级对应id',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='分类表';

-- ----------------------------
-- Records of la_classify
-- ----------------------------
BEGIN;
INSERT INTO `la_classify` VALUES (1, '程序相关', 0);
INSERT INTO `la_classify` VALUES (2, 'PHP', 1);
INSERT INTO `la_classify` VALUES (3, '浮生杂谈', 0);
INSERT INTO `la_classify` VALUES (4, '2018年6月', 3);
COMMIT;

-- ----------------------------
-- Table structure for la_icon_link
-- ----------------------------
DROP TABLE IF EXISTS `la_icon_link`;
CREATE TABLE `la_icon_link` (
  `ic_id` int(11) NOT NULL AUTO_INCREMENT,
  `ic_icon` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '对应的icon',
  PRIMARY KEY (`ic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='icon（原创，转载，翻译）的对应icon类，为了方便变更图标';

-- ----------------------------
-- Records of la_icon_link
-- ----------------------------
BEGIN;
INSERT INTO `la_icon_link` VALUES (1, 'icon-emoji-1');
INSERT INTO `la_icon_link` VALUES (2, 'icon-emoji-2');
INSERT INTO `la_icon_link` VALUES (3, 'icon-emoji-');
COMMIT;

-- ----------------------------
-- Table structure for la_novels
-- ----------------------------
DROP TABLE IF EXISTS `la_novels`;
CREATE TABLE `la_novels` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_mainname` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '文章主标题',
  `n_content` text COLLATE utf8mb4_bin COMMENT '文章内容html格式',
  `n_md` text COLLATE utf8mb4_bin NOT NULL COMMENT 'md格式',
  `n_tags` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '文章标签对应的id',
  `n_subtitle` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '文章副标题',
  `n_overview` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '文章概述',
  `n_one` int(11) DEFAULT NULL COMMENT '一级分类',
  `n_two` int(11) DEFAULT NULL COMMENT '二级分类',
  `n_uid` int(11) DEFAULT NULL COMMENT '归属用户id',
  `n_love` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `n_read` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `n_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0原创1转载2翻译',
  `n_buildtime` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '生成时间',
  `n_changetime` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='文章表';

-- ----------------------------
-- Records of la_novels
-- ----------------------------
BEGIN;
INSERT INTO `la_novels` VALUES (1, '测试文章', '<div class=\"RichContent-inner\"><span class=\"RichText ztext CopyrightRichText-richText\" itemprop=\"text\"><p>分享给你一个我做的《如何写出有体温的散文》笔记吧。</p><p>整理/anne</p><p>王国维曾经说过了，散文是一种易守难攻的文体。</p><p>对于我们很多普通人而言，也会觉得散文是不太好驾驭的，很多人会觉得她又无章法可循，也没有什么经典结构可以谈，那么我们到底应该怎么样开始写好一篇散文？</p><p>我们这里选取了散文家汪曾祺作为分析对象，引出写好散文所要具备的几个点。</p><p>首先简单的介绍了汪曾祺这个人，他文章的特点呢，就是平和冲淡，但是又不会去让人觉得很生硬或者是枯瘦，就是自然而然，却又具备一种热情在里面。</p><p>为什么会选取他呢？因为他的散文。有人物风景，也有文化，并且有典故，草木虫鱼，瓜果食物，他都可以写。这就比较接近我们的生活，所以是一个非常好的学习对象。</p><p>而老师的课通过四个方面来讲，第一个方面就是素材收集；第二个方面应该是感情的酝酿；第三个方面就是我们说就是厚积薄发，形成属于自己独一无二的笔调；第四最重要的就是你要去发现好的素材，能够引起自己的一个灵感。</p><p>我们说处处留心皆文章，第一个方面就说，在生活中你要有发现美的眼睛。不要觉得小，你的视角一定和别人的风景不一样，关键在于你怎么用这些素材。</p><p>汪曾祺先生的散文，如果同学看过的话，会知道，他散文里有很大一部分是描写吃的，汪先生可以说是一位吃的作家：东西南北都有可能有四川云南新疆内蒙，也有家乡野菜，酸甜苦辣，五味俱全。</p><p>所以不要害怕它小，它不够阳春白雪。你应该考虑到你是否真的，能把所有的东西为我所用，那么最重要的一个点是，你是否真的了解你想写的这个东西。</p><p>第一个得到的一个经验之谈，就是善于发现生活中小的事物。但是一定要是你足够了解的你亲身经历的，因为只有你经历过，你才能把它写得活灵活现。</p><p>要善于发现素材，第二点我就想讲王老另一个例子，也就是一种收集积累素材。收集的素材，不见得你真正的身体力行地，去做了这件事情，包括你听到别人的生活经历都可以。</p><p>汪曾祺先生自己也说，美多少是包含一点偶然的。你要去发现这些偶然，这就要求我们一定要具备对美的欣赏能力。老师认为虽然说美是包含偶然，但是对美的鉴赏力绝对不是偶然。</p><p>还有要有审美力，老师说记得朱光潜先生有一本书是《谈美》，他就说人心之坏在于不能免俗。而这个俗就是缺乏美感，我们现在说的是说我们要写好一篇文章，需要我们去发现素材。</p><p>那么我们要有发现美的眼睛，而发现美的眼睛，实际上是在生活当中。如果你具备一种就是对生活的审美能力的话，你的生活品质也会提高，包括我们社会其实真的也会和谐很多。</p><p>而想要自己能够收集，到更多更好的素材，跟别人有不一样的视角，就需要你本人有一个对美的鉴赏力。</p><p>老师认为美的鉴赏力应该是你，有一些正常的爱好，具备了一些文明的素养之后，并且你会经常去亲近些自然，去接触一些自己，不能接触到的一些领域。你自然而然的就会去玩味一首诗，看一幅画啊，甚至是走一段路，你都会有自己的不一样的视角，你也就能写出不一样的文章。</p><p>所以老师套用了朱光潜先生，在《谈美》里说的一句话，“慢慢走欣赏吧，把脚步放慢一点，把眼睛放远一点。”</p><p>第二大部分关于阅读。像汪先生说的应该多读名家读经典，现在的一些青年作家，他不太愿意读中国古典作品，他的作品就会形成一种语言不太美，讲一个现象原因，究其原因就是因为它的文化积淀太少，几乎都是普通的大白话，所以作家不读书是不行的。</p><p>汪老受儒家影响很深的，他在我是一个中国人里面，就写老师很喜欢论语子路，就是暮春者那篇文章。汪老当时就说，他认为那是一种很美的生活状态，他也非常欣赏孟子的大人者，不失其赤子之心。所以并且他后来在结合的时候，他认为陶渊明是真正的儒家。造成他的一个文学创作上面，也是追求一种淳朴之美，这是儒家给他带来的一个影响。</p><p>包括儒家里面说仁者爱人，所以他文章写不好的东西很少，就是有一些比较不好的方面，他都是在沉静平和的语调里面，给人体现一种厚德之美。老师说这个东西一定是历史积淀和阅读给你带来的，而不是你单纯的过日子可以过出来的。</p><p>老师说这和走过的路，看过的书，包括爱过的人有关。所以，你一定要做到就是尽量的耐下心来看一些经典。</p><p>因为散文确实是一个慢工出细活的东西，在一种比较烦躁和焦躁的情绪下面，是不可能形成一篇好的散文的。一定要有自己的一个积淀。</p><p>最后老师总结，多积累一些生活经历，不管什么都要尝一尝，很多东西，也许你一开始(吃)不惯，后来慢慢就(吃)出味儿了，对食物如此对文化也是如此，这是生活的道理，也是对待文学和文学创作的正确态度。我们要多读一些书，多走些路，这样一定可以有好的东西写进文章中。</p><p>第二个大部分老师讲了感情的酝酿，就是关于动笔之前先动情。好的散文一定是动了情。因为感动自己才能感动他人。</p><p>老师谈了汪曾琪的散文特点虽然是冲淡平和，但是他的感情其实是非常充沛的。汪老用三生有幸来概括自己被划为右派，就是20多年的一个坎坷经历，最后他用随遇而安的心态来对待这些不幸。其实本身是一种心力交瘁的一个经历，但在他看来却是一种幸事，他用一种极其平淡，轻松的语气描写出来的。</p><p>感情不见得要用大起大伏的文字写出来，但是一定要有。汪先生他每一篇文章都是有感情的，包括写那个葡萄月令。它对葡萄都有爱，更不要说对人世间各种事物。</p><p>老师又提到了余秋雨，他是另一个派系了，属历史性散文。他情感的冲突感，才出了一个好作品。</p><p>所以谈到冲突感，还有就是情绪逻辑上面，大家一定要注意去培养。因为你自己有情感冲击的话，文章就成功了一半。</p><p>关于内容加。叙事要简厄，不要太冗长；文字一定要雕琢，不要很粗鄙；细节一定要考就；不要大而泛。</p><p>就是对于一个作品来说语言是非常重要的，文学绝对不像是漆墙一样一块一块地堆砌。而应该像树一样长在一起，枝干之间它的枝叶是流转。而我们现在大家都会强调，感情的重要。感情固然是非常重要的，但是，你如果不知道如何遣词造句，你的散文也不会很好，因为很多人来看散文，也是想得到一种就是文字美的熏陶。</p><p>文字的锤炼，真的就只能是靠日常多阅读经典。对于我们一个写作者来说，没有病句，没有错字，只是非常基础的一个点。</p><p>老师建议大家可以读一读张爱玲。张爱玲她自己也说，没有自己写不出来的一种感觉和感官状态，所以老师个人比较欣赏她的文字。当然大家有自己喜欢的作者，好好去研究一下，别人怎么用字的，然后运用到我们自己的文章中来提出，可以是模仿，自然而然他就深入你的骨髓里写东西，自然会有一种文风在里面。</p><p>首先要抓重点，比如说我们显然就可以抓人的眼睛。沈从文是如何在编制里写翠翠；到鲁迅的那个祝福里面写祥林嫂的眼睛；汪曾祺也是这么写的，他两个女儿长得跟她娘一个模子里脱出来的眼睛，尤其像白眼珠鸭蛋青，黑眼珠棋子黑，定神时如清水，闪动时如星星。</p><p>如果说你从正面描写不能够写出，你想写的一个对象的具体特点的话，那么我们还有个办法，就是从侧面入手。</p><p>文字的魅力就在于你能够，把别人视觉上，像传达室等收集了一个东西，变成一种感官，那么你的文字就像了，所以就建议大家一定一定要注意细节上的打磨。</p><p>最后一个方面，老师讲厚积薄发，形成自己独一无二的风格笔调。其实汪曾祺先生的散文，他也不去追求题旨的那种玄奥东西，他绝对不是一个就是耍花枪的人。</p><p>但他非常就是喜欢描写凡人小事，并且他对生活，但是那种深切的感受，看起来都是非常平淡质朴味道来的，但是却非常深得人心。这是京派散文，在当代的一个传承和延续。“闲话”作家他没有就是那种涩味，也没有那种苦味，反倒是一种和谐温暖。</p><p>所以我们也能够像汪老那样，多读一些书，多多练习，然后一定要多多观察。也不见得就是说能够从大处着手，写出什么惊心动魄的东西。</p><p>但是你从小处着手，从父母，从家人，从甚至是一只刚出生的狗狗喂了一只鸟，你都能写出自己独特的东西啦，并且会有你自己的文风，而且会有让别人过目不忘的东西。</p><p>最后希望你也能够写出有体温的散文。<br>END<br>谢谢你看完了我的文字，希望对你有所启发。<br>添加我个人VX(简介上有)→备注“知乎”</p>即免费获得业内最好写作资源或邀请你加入“知乎大v写作计划群”。</span></div>', '', '1,2,3,', '', '这是一段简述', 1, 2, 1, 5, 71, 1, '2018-05-16 11:29:00', '2018-05-16 11:29:00');
INSERT INTO `la_novels` VALUES (2, '计划表', '<div>下一步，1:完善点赞模块，做到记录2.做个人中心模块</div>', '', '1,', NULL, NULL, NULL, 2, NULL, 9, 19, 1, NULL, NULL);
INSERT INTO `la_novels` VALUES (19, '转载', '<h3 id=\"h3-u4E0Au53D1u552Eu5B54\"><a name=\"上发售孔\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>上发售孔</h3>', '###上发售孔', '3,', NULL, NULL, 3, 4, 1, 2, 16, 2, '2018-05-21 18:40:42', '2018-05-21 18:40:42');
INSERT INTO `la_novels` VALUES (20, 'ShadowSocksR(SSR) 从零开始部署-安装-使用教程', '<h1 id=\"h1-shadowsocksr-ssr-\"><a name=\"ShadowSocksR(SSR) 从零开始部署-安装-使用教程\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>ShadowSocksR(SSR) 从零开始部署-安装-使用教程</h1><h2 id=\"h2-1-sspanel-\"><a name=\"1. 部署SSPanel后台\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>1. 部署SSPanel后台</h2><h3 id=\"h3--\"><a name=\"环境要求：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>环境要求：</h3><blockquote>\n<p>CentOs6+<br>PHP 7.1+<br>MySQL 5.6+<br>内存 1G+<br>磁盘空间 10G+<br>PHP 需要开启 Curl,gd,fileInfo,openssl,mbString等组件</p>\n</blockquote>\n<h3 id=\"h3--\"><a name=\"正式步骤：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>正式步骤：</h3><ul>\n<li><p>安装LNMP1.4环境</p>\n<pre><code>  yum install screen\n  screen -S lnmp\n  yum install wget\n  wget -c http://soft.vpser.net/lnmp/lnmp1.4.tar.gz &amp;&amp; tar zxf lnmp1.4.tar.gz &amp;&amp; cd lnmp1.4 &amp;&amp; ./install.sh\n</code></pre></li></ul>\n<p>请参考LNMP作者的<a href=\"https://lnmp.org/install.html\">官方教程</a></p>\n<ul>\n<li><p>安装git</p>\n<pre><code>  yum install git\n</code></pre></li><li><p>拉取代码</p>\n<pre><code>  cd /home/wwwroot\n  git clone https://github.com/ssrpanel/ssrpanel.git\n</code></pre></li><li><p>安装面板</p>\n<pre><code>  cd ssrpanel/\n  php composer.phar install\n  php artisan key:generate\n  chown -R www:www storage/\n  chmod -R 777 storage/\n</code></pre></li><li><p>配置数据库</p>\n<pre><code>  1.创建一个utf8mb4的数据库\n  2.编辑config/database.php，编辑mysql选项中如下配置值：host、port、database、username、password\n</code></pre></li><li><p>自动部署或者手动部署</p>\n<pre><code>  自动部署\n  php artisan migrate\n  php artisan db:seed --class=ConfigTableSeeder\n  php artisan db:seed --class=CountryTableSeeder\n  php artisan db:seed --class=LevelTableSeeder\n  php artisan db:seed --class=SsConfigTableSeeder\n  php artisan db:seed --class=UserTableSeeder\n  手动部署\n  迁移未经完整测试，存在BUG，可以手动将sql/db.sql导入到创建好的数据库\n</code></pre></li><li><p>配置Nginx</p>\n<pre><code>  1.添加站点域名\n      lnmp vhost add\n      终端命令行展示如下：\n          [root<a href=\"https://github.com/localhost\" title=\"&#64;localhost\" class=\"at-link\">@localhost</a> wwwroot]# lnmp vhost add\n          +-------------------------------------------+\n          |    Manager for LNMP, Written by Licess    |\n          +-------------------------------------------+\n          |              https://lnmp.org             |\n          +-------------------------------------------+\n          Please enter domain(example: www.lnmp.org): test.com\n          Your domain: test.com\n          Enter more domain name(example: lnmp.org *.lnmp.org): \n          Please enter the directory for the domain: test.com\n          Default directory: /home/wwwroot/test.com: \n          Virtual Host Directory: /home/wwwroot/test.com\n          Allow Rewrite rule? (y/n) \n          You choose rewrite: none\n          Allow access log? (y/n) \n          Disable access log.\n          Create database and MySQL user with same name (y/n) \n          Add SSL Certificate (y/n) \n\n          Press any key to start create virtul host...\n      在第一步输入想要配置的域名，例如：test.com,之后一路回车即可\n  2.配置conf文件重写规则\n      cd /usr/local/nginx/conf/vhost\n      vi test.com.conf\n      #在打开的文件中，在server内，加入一条\n          location /\n          {\n              try_files $uri $uri/ /index.php$is_args$args;\n          }\n</code></pre></li><li><p>编辑php.ini文件</p>\n<pre><code>  vi /usr/local/php/etc/php.ini\n  /disable_function\n  #在上一条命令找到的字符串中，删除proc_开头的所有函数\n</code></pre></li><li><p>重启lnmp</p>\n<pre><code>  lnmp reload\n</code></pre></li><li><p>定时任务设置</p>\n<pre><code>  #先运行下面这条命令进行尝试\n      php /home/wwwroot/shadow3.com/artisan schedule:run &gt;&gt; /dev/null 2&gt;&amp;1 \n  #如果没有报错\n      crontab -e\n      * * * * * php /home/wwwroot/shadow3.com/artisan schedule:run &gt;&gt; /dev/null 2&gt;&amp;1\n  #如果报错了？\n      自己改啊！php路径，项目路径，权限，报什么错改什么\n</code></pre></li><li><p>设置hosts文件</p>\n<pre><code>  vi /etc/hosts\n  #添加域名\n      127.0.0.1      test.com\n  #保存退出\n      :wq\n</code></pre></li><li><p>在本地浏览器中打开</p>\n<pre><code>  http://test.com\n  #初始账号密码：admin   123456\n</code></pre></li><li><p>如果是在服务器上布置的，要在本地打开，需要在本地hosts中做上述hosts配置，ip改为服务器公网ip</p>\n</li><li><p>至此，SSPanel布置完毕</p>\n</li><li><p>在浏览器打开的后台中，进行节点的配置，先配置一个节点，用于服务器端安装时的<code>nodeid</code>配置</p>\n</li></ul>\n<h2 id=\"h2--shadowsocksr-\"><a name=\"布置ShadowSocksR服务端\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>布置ShadowSocksR服务端</h2><h3 id=\"h3--\"><a name=\"环境：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>环境：</h3><blockquote>\n<p>CentOs7</p>\n</blockquote>\n<h3 id=\"h3--\"><a name=\"正式步骤：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>正式步骤：</h3><ul>\n<li><p>手动部署（基于SSR）（?_?我按照这个安装失败了，无法上网）</p>\n<pre><code>   git clone https://github.com/ssrpanel/shadowsocksr.git\n   cd shadowsocksr\n   sh initcfg.sh\n   配置 usermysql.json 里的数据库链接，NODE_ID就是节点ID，对应面板后台里添加的节点的自增ID，所以请先把面板搭好，搭好后进后台添加节点\n</code></pre></li><li><p>自动部署（基于SSR3.4）（推荐）</p>\n<pre><code>   wget -N --no-check-certificate https://raw.githubusercontent.com/ssrpanel/ssrpanel/master/server/deploy_ssr.sh;chmod +x deploy_ssr.sh;./deploy_ssr.sh\n</code></pre></li><li><p>按照步骤走，安装完毕，执行</p>\n<pre><code>   cd /root/shadowsocksr\n   python server.py\n   #查看错误并进行调试\n</code></pre></li></ul>\n<h2 id=\"h2--shadowsocksr-\"><a name=\"安装ShadowSocksR客户端\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>安装ShadowSocksR客户端</h2><h3 id=\"h3--\"><a name=\"环境：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>环境：</h3><blockquote>\n<p>Windows10</p>\n</blockquote>\n<h3 id=\"h3--\"><a name=\"正式步骤：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>正式步骤：</h3><ul>\n<li>解压SSR安装包，运行ShadowsocksR-dotnet4.0</li><li>将浏览器上对应用户的二维码，或者ss链接，给到用户，用户扫码或者复制链接进行服务器配置</li><li>选择服务器，系统代理模式使用<code>全局</code>，代理规则使用<code>绕过局域网</code>， 可以查看服务器链接统计查看有无数据产生</li></ul>\n<h2 id=\"h2-u4F7Fu7528u8C37u6B4Cu6D4Fu89C8u5668u63D2u4EF6\"><a name=\"使用谷歌浏览器插件\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>使用谷歌浏览器插件</h2><h3 id=\"h3--\"><a name=\"插件：\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>插件：</h3><blockquote>\n<p>SwitchyOmega</p>\n</blockquote>\n<ul>\n<li>新建情景模式</li><li>代理协议SOCKS5，代理伺服器127.0.0.1，代理端口1080</li><li>点击应用选项</li></ul>', 'ShadowSocksR(SSR) 从零开始部署-安装-使用教程\n===========\n\n##1. 部署SSPanel后台\n\n###环境要求：\n&gt; CentOs6+  \nPHP 7.1+  \nMySQL 5.6+  \n内存 1G+  \n磁盘空间 10G+  \nPHP 需要开启 Curl,gd,fileInfo,openssl,mbString等组件\n\n###正式步骤：\n* 安装LNMP1.4环境\n        \n        yum install screen\n        screen -S lnmp\n        yum install wget\n        wget -c http://soft.vpser.net/lnmp/lnmp1.4.tar.gz &amp;&amp; tar zxf lnmp1.4.tar.gz &amp;&amp; cd lnmp1.4 &amp;&amp; ./install.sh\n\n请参考LNMP作者的[官方教程](https://lnmp.org/install.html)\n\n* 安装git\n           \n        yum install git\n* 拉取代码\n        \n        cd /home/wwwroot\n        git clone https://github.com/ssrpanel/ssrpanel.git\n* 安装面板\n        \n        cd ssrpanel/\n        php composer.phar install\n        php artisan key:generate\n        chown -R www:www storage/\n        chmod -R 777 storage/\n* 配置数据库\n        \n        1.创建一个utf8mb4的数据库\n        2.编辑config/database.php，编辑mysql选项中如下配置值：host、port、database、username、password\n* 自动部署或者手动部署\n        \n        自动部署\n        php artisan migrate\n        php artisan db:seed --class=ConfigTableSeeder\n        php artisan db:seed --class=CountryTableSeeder\n        php artisan db:seed --class=LevelTableSeeder\n        php artisan db:seed --class=SsConfigTableSeeder\n        php artisan db:seed --class=UserTableSeeder\n        手动部署\n        迁移未经完整测试，存在BUG，可以手动将sql/db.sql导入到创建好的数据库\n* 配置Nginx\n        \n        1.添加站点域名\n            lnmp vhost add\n            终端命令行展示如下：\n                [root@localhost wwwroot]# lnmp vhost add\n                +-------------------------------------------+\n                |    Manager for LNMP, Written by Licess    |\n                +-------------------------------------------+\n                |              https://lnmp.org             |\n                +-------------------------------------------+\n                Please enter domain(example: www.lnmp.org): test.com\n                Your domain: test.com\n                Enter more domain name(example: lnmp.org *.lnmp.org): \n                Please enter the directory for the domain: test.com\n                Default directory: /home/wwwroot/test.com: \n                Virtual Host Directory: /home/wwwroot/test.com\n                Allow Rewrite rule? (y/n) \n                You choose rewrite: none\n                Allow access log? (y/n) \n                Disable access log.\n                Create database and MySQL user with same name (y/n) \n                Add SSL Certificate (y/n) \n                \n                Press any key to start create virtul host...\n            在第一步输入想要配置的域名，例如：test.com,之后一路回车即可\n        2.配置conf文件重写规则\n            cd /usr/local/nginx/conf/vhost\n            vi test.com.conf\n            #在打开的文件中，在server内，加入一条\n                location /\n                {\n                    try_files $uri $uri/ /index.php$is_args$args;\n                }\n* 编辑php.ini文件\n        \n        vi /usr/local/php/etc/php.ini\n        /disable_function\n        #在上一条命令找到的字符串中，删除proc_开头的所有函数\n* 重启lnmp\n        \n        lnmp reload\n* 定时任务设置\n             \n        #先运行下面这条命令进行尝试\n            php /home/wwwroot/shadow3.com/artisan schedule:run &gt;&gt; /dev/null 2&gt;&amp;1 \n        #如果没有报错\n            crontab -e\n            * * * * * php /home/wwwroot/shadow3.com/artisan schedule:run &gt;&gt; /dev/null 2&gt;&amp;1\n        #如果报错了？\n            自己改啊！php路径，项目路径，权限，报什么错改什么\n* 设置hosts文件\n        \n        vi /etc/hosts\n        #添加域名\n            127.0.0.1      test.com\n        #保存退出\n            :wq\n* 在本地浏览器中打开\n        \n        http://test.com\n        #初始账号密码：admin   123456\n* 如果是在服务器上布置的，要在本地打开，需要在本地hosts中做上述hosts配置，ip改为服务器公网ip\n\n* 至此，SSPanel布置完毕\n\n* 在浏览器打开的后台中，进行节点的配置，先配置一个节点，用于服务器端安装时的`nodeid`配置\n\n## 布置ShadowSocksR服务端\n###环境：\n&gt;CentOs7\n\n###正式步骤：\n        \n* 手动部署（基于SSR）（?_?我按照这个安装失败了，无法上网）\n         \n         git clone https://github.com/ssrpanel/shadowsocksr.git\n         cd shadowsocksr\n         sh initcfg.sh\n         配置 usermysql.json 里的数据库链接，NODE_ID就是节点ID，对应面板后台里添加的节点的自增ID，所以请先把面板搭好，搭好后进后台添加节点\n* 自动部署（基于SSR3.4）（推荐）\n         \n         wget -N --no-check-certificate https://raw.githubusercontent.com/ssrpanel/ssrpanel/master/server/deploy_ssr.sh;chmod +x deploy_ssr.sh;./deploy_ssr.sh\n* 按照步骤走，安装完毕，执行\n         \n         cd /root/shadowsocksr\n         python server.py\n         #查看错误并进行调试\n\n##  安装ShadowSocksR客户端\n###环境：\n&gt;Windows10\n\n### 正式步骤：\n* 解压SSR安装包，运行ShadowsocksR-dotnet4.0\n* 将浏览器上对应用户的二维码，或者ss链接，给到用户，用户扫码或者复制链接进行服务器配置\n* 选择服务器，系统代理模式使用`全局`，代理规则使用`绕过局域网`， 可以查看服务器链接统计查看有无数据产生\n\n##  使用谷歌浏览器插件\n###插件：\n&gt;SwitchyOmega\n\n* 新建情景模式\n* 代理协议SOCKS5，代理伺服器127.0.0.1，代理端口1080\n* 点击应用选项', '3,', NULL, NULL, 1, 2, 1, 2, 73, 1, '2018-05-21 23:05:09', '2018-05-21 23:05:09');
INSERT INTO `la_novels` VALUES (21, '测试', '<h3 id=\"h3-u5F81u6587\"><a name=\"征文\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>征文</h3><blockquote>\n<p>aksda<br>skdjfhaks </p>\n</blockquote>', '###征文\n\n&gt;aksda\nskdjfhaks', '1,', NULL, NULL, 3, 4, 1, 0, 1, 1, '2018-05-22 12:15:23', '2018-05-22 12:15:23');
INSERT INTO `la_novels` VALUES (22, 'pppp', '<p>正文！！！</p>', '正文！！！', '1,', NULL, NULL, 3, 4, 1, 0, 0, 1, '2018-05-22 12:18:18', '2018-05-22 12:18:18');
INSERT INTO `la_novels` VALUES (23, '是看看', '<p>阿斯顿</p>', '阿斯顿', '2,', NULL, 'pppp', 3, 4, 1, 0, 0, 1, '2018-05-22 12:23:48', '2018-05-22 12:23:48');
COMMIT;

-- ----------------------------
-- Table structure for la_tags
-- ----------------------------
DROP TABLE IF EXISTS `la_tags`;
CREATE TABLE `la_tags` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '标签名称',
  `t_u_id` int(11) NOT NULL DEFAULT '1' COMMENT '用户id',
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of la_tags
-- ----------------------------
BEGIN;
INSERT INTO `la_tags` VALUES (1, 'PHP', 1);
INSERT INTO `la_tags` VALUES (2, 'Laravel', 1);
INSERT INTO `la_tags` VALUES (3, '标签3', 1);
COMMIT;

-- ----------------------------
-- Table structure for la_tags_novels
-- ----------------------------
DROP TABLE IF EXISTS `la_tags_novels`;
CREATE TABLE `la_tags_novels` (
  `tl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tl_n_id` int(11) DEFAULT NULL COMMENT '文章对应id',
  `tl_t_id` int(11) DEFAULT NULL COMMENT '标签对应id',
  PRIMARY KEY (`tl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of la_tags_novels
-- ----------------------------
BEGIN;
INSERT INTO `la_tags_novels` VALUES (1, 1, 1);
INSERT INTO `la_tags_novels` VALUES (2, 1, 2);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
INSERT INTO `password_resets` VALUES ('137454534@qq.com', '$2y$10$7jfGW29sDYZektOQEBssturjHGIJ2G9CLV3PMVnW/.gwk0.peRJLy', '2018-05-07 12:03:07');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'oscar', '137454534@qq.com', '$2y$10$LG0FTcgpaRQRa91O3u3aY.BnFmaGXKwAs1r1PUtIrUKx.1cBq4bbu', 'GU7slMedZoCa4MicufYEB8Sybof8eV1OtUjYLqACfGgmhwOG3Hd8nPnPMGzc', '2018-05-06 08:55:36', '2018-05-06 08:55:36');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
