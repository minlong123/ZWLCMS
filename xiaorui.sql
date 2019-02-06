-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-02-06 12:05:00
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiaorui`
--

-- --------------------------------------------------------

--
-- 表的结构 `rr_admins`
--

CREATE TABLE `rr_admins` (
  `id` int(11) NOT NULL,
  `adminuser` varchar(500) DEFAULT NULL COMMENT '管理员用户名',
  `adminpwd` varchar(500) DEFAULT NULL COMMENT '管理员密码',
  `lastmap` varchar(200) DEFAULT NULL COMMENT '上一次登录地址',
  `lastip` varchar(200) DEFAULT NULL COMMENT '上一次登录时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_admins`
--

INSERT INTO `rr_admins` (`id`, `adminuser`, `adminpwd`, `lastmap`, `lastip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1549453386', '0.0.0.0'),
(6, '闵龙', 'e10adc3949ba59abbe56e057f20f883e', '1549453296', '0.0.0.0');

-- --------------------------------------------------------

--
-- 表的结构 `rr_arts`
--

CREATE TABLE `rr_arts` (
  `id` int(11) NOT NULL,
  `timess` varchar(200) DEFAULT NULL,
  `autos` varchar(200) DEFAULT NULL,
  `shot` varchar(400) DEFAULT NULL,
  `lart` varchar(500) DEFAULT NULL,
  `kws` varchar(500) DEFAULT NULL,
  `desccc` varchar(500) DEFAULT NULL,
  `artimg` varchar(300) DEFAULT NULL,
  `cons` text,
  `bors` int(11) DEFAULT NULL,
  `catid` mediumint(9) DEFAULT NULL,
  `updas` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_arts`
--

INSERT INTO `rr_arts` (`id`, `timess`, `autos`, `shot`, `lart`, `kws`, `desccc`, `artimg`, `cons`, `bors`, `catid`, `updas`) VALUES
(8, '1547450840', 'admin', 'mongoose图片上传', 'mongoose图片上传先放入缓存文件在写入放入静态文件夹中', 'mongoose图片上传先放入缓存文件在写入放入静态文件夹中', 'mongoose图片上传先放入缓存文件在写入放入静态文件夹中', 'Public/Uploads/1547452507.jpg', '&lt;p&gt;multer 图片上传&lt;/p&gt;&lt;p&gt;引用静态文件：&lt;/p&gt;&lt;p&gt;//静态文件夹//前一个是路由，后一个相对本文件的路径用来存放图片&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;//app.use(&amp;#39;&amp;#39;,express.static(path.join(__dirname,&amp;#39;./static&amp;#39;)))&amp;nbsp;&lt;/p&gt;&lt;p&gt;app.use(express.static(path.join(__dirname,&amp;#39;./static&amp;#39;)))&amp;nbsp;&lt;/p&gt;&lt;p&gt;1&lt;/p&gt;&lt;p&gt;2&lt;/p&gt;&lt;p&gt;安装multer&lt;/p&gt;&lt;p&gt;npm install --save multer&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;html：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;js：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;const routerUrl=&amp;#39;http://localhost:3000&amp;#39;&amp;nbsp; //&amp;nbsp; 3000端口&lt;/p&gt;&lt;p&gt;$(&amp;#39;.photobtn&amp;#39;).click(function(){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;var formData = new FormData();&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;formData.append(&amp;#39;test&amp;#39;,$(&amp;#39;.photo&amp;#39;)[0].files[0]);&amp;nbsp; //将图片内容放入formData中&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;//console.log($(&amp;#39;.photo&amp;#39;)[0].files[0])&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;var Url=routerUrl+&amp;quot;/user/photo&amp;quot;;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;$.ajax({&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;type:&amp;quot;post&amp;quot;,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;url:Url,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;data:formData,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;cache:false,//格式解析&amp;nbsp; &amp;nbsp; &amp;nbsp;可以解析图片格式&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;contentType:false,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;processData:false,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;success:function(res){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;console.log(res)&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;if(res.err==0)&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;{&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;alert(res.msg);&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;}else{&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;alert(res.msg);&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;},&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;error:function(err){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;console.log(err)&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;});&lt;/p&gt;&lt;p&gt;})&lt;/p&gt;&lt;p&gt;1&lt;/p&gt;&lt;p&gt;2&lt;/p&gt;&lt;p&gt;3&lt;/p&gt;&lt;p&gt;4&lt;/p&gt;&lt;p&gt;5&lt;/p&gt;&lt;p&gt;6&lt;/p&gt;&lt;p&gt;7&lt;/p&gt;&lt;p&gt;8&lt;/p&gt;&lt;p&gt;9&lt;/p&gt;&lt;p&gt;10&lt;/p&gt;&lt;p&gt;11&lt;/p&gt;&lt;p&gt;12&lt;/p&gt;&lt;p&gt;13&lt;/p&gt;&lt;p&gt;14&lt;/p&gt;&lt;p&gt;15&lt;/p&gt;&lt;p&gt;16&lt;/p&gt;&lt;p&gt;17&lt;/p&gt;&lt;p&gt;18&lt;/p&gt;&lt;p&gt;19&lt;/p&gt;&lt;p&gt;20&lt;/p&gt;&lt;p&gt;21&lt;/p&gt;&lt;p&gt;22&lt;/p&gt;&lt;p&gt;23&lt;/p&gt;&lt;p&gt;24&lt;/p&gt;&lt;p&gt;25&lt;/p&gt;&lt;p&gt;26&lt;/p&gt;&lt;p&gt;27&lt;/p&gt;&lt;p&gt;后台处理：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;router.post(&amp;#39;/photo&amp;#39;, upload.single(&amp;#39;test&amp;#39;), function (req, res) {&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;//test和前端form一致:formData.append(&amp;#39;test&amp;#39;,$(&amp;#39;.photo&amp;#39;)[0].files[0]);&lt;/p&gt;&lt;p&gt;var filename1=newDate().getTime()+&lt;/p&gt;&lt;p&gt;parseInt(Math.random()*9999)+&amp;#39;.&amp;#39;+req.file.originalname;//图片名(避免重复)&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;var des_file=&amp;#39;./static/imgs/&amp;#39;+filename1;//写入路径&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;//console.log(des_file);&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;var dir=&amp;#39;img/&amp;#39;+filename1;//读取文件路径&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;//console.log(dir);&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;fs.readFile(req.file.path,(err,data)=&amp;gt;{//读取上传文件&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;//console.log(data);&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;fs.writeFile(des_file,data,(err,datas)=&amp;gt;{&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;if(err){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;//console.log(err)&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;return res.send({err:-2,msg:&amp;quot;上传错误&amp;quot;})}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;spimg.insertMany({src:dir,type:1},(err,res1)=&amp;gt;{&amp;nbsp; //将图片路径插入数据库&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;if(err){return res.send({err:-3,msg:&amp;quot;上传失败&amp;quot;})}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;if(res1.length==1){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;res.send({err:0,msg:&amp;quot;上传成功&amp;quot;,data1:res1[0].src});&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; fs.unlinkSync(req.file.path,(err)=&amp;gt;{//删除临时文件中照片&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if (err) {return res.send({err:-4,msg:&amp;quot;删除缓存失败&amp;quot;})}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;})&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;})&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;})&lt;/p&gt;&lt;p&gt;})&lt;/p&gt;&lt;p&gt;1&lt;/p&gt;&lt;p&gt;2&lt;/p&gt;&lt;p&gt;3&lt;/p&gt;&lt;p&gt;4&lt;/p&gt;&lt;p&gt;5&lt;/p&gt;&lt;p&gt;6&lt;/p&gt;&lt;p&gt;7&lt;/p&gt;&lt;p&gt;8&lt;/p&gt;&lt;p&gt;9&lt;/p&gt;&lt;p&gt;10&lt;/p&gt;&lt;p&gt;11&lt;/p&gt;&lt;p&gt;12&lt;/p&gt;&lt;p&gt;13&lt;/p&gt;&lt;p&gt;14&lt;/p&gt;&lt;p&gt;15&lt;/p&gt;&lt;p&gt;16&lt;/p&gt;&lt;p&gt;17&lt;/p&gt;&lt;p&gt;18&lt;/p&gt;&lt;p&gt;19&lt;/p&gt;&lt;p&gt;20&lt;/p&gt;&lt;p&gt;21&lt;/p&gt;&lt;p&gt;22&lt;/p&gt;&lt;p&gt;23&lt;/p&gt;&lt;p&gt;24&lt;/p&gt;&lt;p&gt;25&lt;/p&gt;&lt;p&gt;26&lt;/p&gt;&lt;p&gt;文件目录：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;---------------------&amp;nbsp;&lt;/p&gt;&lt;p&gt;作者：zhp961203&amp;nbsp;&lt;/p&gt;&lt;p&gt;来源：CSDN&amp;nbsp;&lt;/p&gt;&lt;p&gt;原文：https://blog.csdn.net/qq_33327325/article/details/82802469&amp;nbsp;&lt;/p&gt;&lt;p&gt;版权声明：本文为博主原创文章，转载请附上博文链接！&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 44, 35, '1547513076'),
(11, '1547452659', 'admin', '每上传一张图片服务器PHP缓存就会产生一个临时文件', '舒服舒服舒服舒服', '我们网站是用PHP做的，每上传一张图片服务器PHP缓存就会产生一个临时文件，这样子一个月下来有1G多,最多达', '我们网站是用PHP做的，每上传一张图片服务器PHP缓存就会产生一个临时文件，这样子一个月下来有1G多,最多达', 'Public/Uploads/1547452655.jpg', '&lt;p&gt;我们网站是用PHP做的，每上传一张图片服务器PHP缓存就会产生一个临时文件，这样子一个月下来有1G多,最多达&lt;/p&gt;', 99, 35, '1548510389'),
(9, '1547450865', 'admin', '从页面上传的图片怎么保存在工程目录下呢？？', '从页面上传的图片怎么保存在工程目录下呢？？', '从页面上传的图片怎么保存在工程目录下呢？？', '从页面上传的图片怎么保存在工程目录下呢？？', 'Public/Uploads/1547452669.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; background-color: rgb(255, 255, 255);&quot;&gt;request.getSession().getServletContext().getRealPath(&amp;quot;/&amp;quot;)+&amp;nbsp;&amp;quot;images/usermsg/&amp;quot;;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; background-color: rgb(255, 255, 255);&quot;&gt;我这样获取的路径打印出来是tomcat的webapps下的路径。。&amp;nbsp;一旦tomcat重启了&amp;nbsp;图片就没有了。。&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; background-color: rgb(255, 255, 255);&quot;&gt;我想把图片保存在工程目录下应该怎么做呢？我tomcat在F盘，工程在D盘。。。但是不要手动直接设置D：/../../&amp;nbsp;&amp;nbsp;这样的路径&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;color: rgb(79, 79, 79); font-family: &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;SF Pro Display&amp;quot;, Roboto, Noto, Arial, &amp;quot;PingFang SC&amp;quot;, sans-serif; background-color: rgb(255, 255, 255);&quot;&gt;求大神帮忙！！&lt;/span&gt;&lt;/p&gt;', 558, 35, '1547513065'),
(12, '1547513615', 'admin', '用substr()函数对中文字符串截取时的乱码', ' 如何解决用substr()函数对中文字符串截取时的乱码', '用substr()函数对中文字符串截取时的乱码', '用substr()函数对中文字符串截取时的乱码', 'Public/Uploads/1547513571.jpg', '&lt;p dir=&quot;ltr&quot;&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;2019-01-26&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0006.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0014.gif&quot;/&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin     video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/ueditor/php/upload/video/20190126/1548511825100014.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/ueditor/php/upload/video/20190126/1548511825100014.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;ensions里拷入Windows/&lt;/span&gt;&lt;a href=&quot;https://www.baidu.com/s?wd=system32&amp;tn=SE_PcZhidaonwhc_ngpagmjz&amp;rsv_dl=gh_pc_zhidao&quot; target=&quot;_blank&quot; class=&quot;baidu-highlight&quot; style=&quot;color: rgb(63, 136, 191); text-decoration-line: none; font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;system32&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;里面。&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;2.在windows目录下找到&lt;/span&gt;&lt;a href=&quot;https://www.baidu.com/s?wd=php.ini&amp;tn=SE_PcZhidaonwhc_ngpagmjz&amp;rsv_dl=gh_pc_zhidao&quot; target=&quot;_blank&quot; class=&quot;baidu-highlight&quot; style=&quot;color: rgb(63, 136, 191); text-decoration-line: none; font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;php.ini&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;打开编辑，搜索mbstring.dll，找到&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;;extension=php_mbstring.dll把前面的;号去掉，这样&lt;/span&gt;&lt;a href=&quot;https://www.baidu.com/s?wd=mb_substr&amp;tn=SE_PcZhidaonwhc_ngpagmjz&amp;rsv_dl=gh_pc_zhidao&quot; target=&quot;_blank&quot; class=&quot;baidu-highlight&quot; style=&quot;color: rgb(63, 136, 191); text-decoration-line: none; font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;mb_substr&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;函数就可以生效了&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma; background-color: rgb(255, 255, 255);&quot;&gt;mb_strcut函数功能也可以截取字符串长度，下面实例具体看看区别在哪：&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 333, 35, '1548512273');

-- --------------------------------------------------------

--
-- 表的结构 `rr_auth_group`
--

CREATE TABLE `rr_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(500) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_auth_group`
--

INSERT INTO `rr_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(11, '闵龙组', 1, '8,27,28,12');

-- --------------------------------------------------------

--
-- 表的结构 `rr_auth_group_access`
--

CREATE TABLE `rr_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` varchar(200) DEFAULT NULL,
  `group_tit` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_auth_group_access`
--

INSERT INTO `rr_auth_group_access` (`uid`, `group_id`, `group_tit`) VALUES
(6, '11', '闵龙组');

-- --------------------------------------------------------

--
-- 表的结构 `rr_auth_rule`
--

CREATE TABLE `rr_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_auth_rule`
--

INSERT INTO `rr_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `pid`) VALUES
(1, 'Cat/index', '分类显示', 1, 1, '', 7),
(2, 'Cat/add', '分类添加', 1, 1, '', 7),
(3, 'Cat/delete', '分类删除', 1, 1, '', 7),
(4, 'Cat/edit', '分类修改', 1, 1, '', 7),
(5, 'Arts', '文章管理', 1, 1, '', 0),
(6, 'Caross', '轮播图管理', 1, 1, '', 0),
(7, 'Cat', '分类管理', 1, 1, '', 0),
(8, 'Emais', '邮箱配置管理', 1, 1, '', 0),
(9, 'Jurisdiction', '权限管理', 1, 1, '', 0),
(10, 'Mesgs', '留言管理', 1, 1, '', 0),
(11, 'Roll', '滚动消息管理', 1, 1, '', 0),
(12, 'Tels', '手机接口配置', 1, 1, '', 0),
(13, 'Cat/lists', '分类数据接口', 1, 1, '', 7),
(14, 'Cat/editCell', '分类表格可编辑', 1, 1, '', 7),
(15, 'Arts/index', '文章显示', 1, 1, '', 5),
(16, 'Arts/add', '文章添加', 1, 1, '', 5),
(17, 'Arts/lists', '文章数据接口', 1, 1, '', 5),
(18, 'Arts/edit', '文章修改', 1, 1, '', 5),
(19, 'Arts/delete', '文章删除', 1, 1, '', 5),
(20, 'Arts/deleteRow', '多文章删除', 1, 1, '', 5),
(21, 'Caross/index', '轮播图显示', 1, 1, '', 6),
(22, 'Caross/add', '轮播图添加', 1, 1, '', 6),
(23, 'Caross/lists', '轮播图数据接口', 1, 1, '', 6),
(24, 'Caross/edit', '轮播图修改', 1, 1, '', 6),
(25, 'Caross/delete', '轮播图删除', 1, 1, '', 6),
(26, 'Caross/deleteRow', '多轮播图删除', 1, 1, '', 6),
(27, 'Emais/index', '邮箱配置显示', 1, 1, '', 8),
(28, 'Emais/emaiest', '邮箱测试接口', 1, 1, '', 8),
(29, 'Jurisdiction/index', '管理员显示', 1, 1, '', 9),
(30, 'Jurisdiction/lists', '管理员数据接口', 1, 1, '', 9),
(31, 'Jurisdiction/delete', '管理员删除', 1, 1, '', 9),
(32, 'Jurisdiction/divide', '用户组划分', 1, 1, '', 9),
(33, 'Jurisdiction/groups', '用户组管理', 1, 1, '', 9),
(34, 'Jurisdiction/listss', '用户组数据接口', 1, 1, '', 9),
(35, 'Jurisdiction/deletes', '用户组删除', 1, 1, '', 9),
(36, 'Jurisdiction/AssignAuthority', '用户权分配权限', 1, 1, '', 9),
(37, 'Mesgs/index', '留言板显示', 1, 1, '', 10),
(38, 'Mesgs/lists', '留言数据接口', 1, 1, '', 10),
(39, 'Mesgs/delete', '留言删除', 1, 1, '', 10),
(40, 'Mesgs/deleteRow', '多留言删除', 1, 1, '', 10),
(41, 'Mesgs/switcEmail', '留言邮件提醒', 1, 1, '', 10),
(42, 'Roll/index', '滚动消息显示', 1, 1, '', 11),
(43, 'Roll/add', '滚动数据添加', 1, 1, '', 11),
(44, 'Roll/lists', '滚动数据接口', 1, 1, '', 11),
(45, 'Roll/deleteRow', '滚动数据删除', 1, 1, '', 11),
(46, 'Arts/uploads', '文章图片上传', 1, 1, '', 5),
(47, 'Caross/uploads', '轮播图上传', 1, 1, '', 6);

-- --------------------------------------------------------

--
-- 表的结构 `rr_caross`
--

CREATE TABLE `rr_caross` (
  `id` int(11) NOT NULL,
  `titless` varchar(300) DEFAULT NULL,
  `ahref` varchar(300) DEFAULT NULL,
  `sorts` mediumint(9) DEFAULT NULL,
  `imgaddr` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_caross`
--

INSERT INTO `rr_caross` (`id`, `titless`, `ahref`, `sorts`, `imgaddr`) VALUES
(9, '策划一', 'http://localhost:85/index.php/Admin/Caross/add', 0, 'Public/Uploads/1547517882.jpg'),
(10, '策划二', 'http://localhost:85/index.php/Admin/Caross/add', 2, 'Public/Uploads/1547517901.jpg'),
(11, '策划3', 'http://localhost:85/index.php/Admin/Caross/add', 3, 'Public/Uploads/1547517918.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `rr_cateart`
--

CREATE TABLE `rr_cateart` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `catena` varchar(200) DEFAULT NULL,
  `uls` varchar(300) DEFAULT NULL,
  `sors` int(6) DEFAULT NULL,
  `tits` varchar(200) DEFAULT NULL,
  `descc` varchar(400) DEFAULT NULL,
  `kws` varchar(400) DEFAULT NULL,
  `typs` tinyint(4) DEFAULT NULL,
  `arttem` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_cateart`
--

INSERT INTO `rr_cateart` (`id`, `pid`, `catena`, `uls`, `sors`, `tits`, `descc`, `kws`, `typs`, `arttem`) VALUES
(35, 0, '专家顾问', 'List/export', 5, '专家顾问', '专家顾问', '专家顾问', 2, 'Artic/export'),
(36, 0, '新闻动态', 'List_case1.html', 6, '新闻动态', '新闻动态', '新闻动态', 1, ''),
(34, 30, '会务活动策划', 'Index_brand.html', 4, '会务活动策划', '会务活动策划', '会务活动策划', 1, ''),
(30, 0, '策划服务', '', 5, '策划服务', '策划服务', '策划服务', 1, ''),
(31, 30, '品牌营销策划', 'Index/brand', 1, '品牌营销策划', '品牌营销策划', '品牌营销策划', 1, ''),
(32, 30, '营销全案策划', 'Index_extension.html', 2, '营销全案策划', '营销全案策划', '营销全案策划', 1, ''),
(33, 30, '营销推广策划', 'Index_extension.html', 3, '营销推广策划', '营销推广策划', '营销推广策划', 1, ''),
(25, 0, '首页', 'Index/index', 0, '首页', '首页uyu', '首页', 1, ''),
(26, 0, '企业营销', '', 25, '企业营销', '企业营销', '企业营销', 1, ''),
(27, 26, '网站开发', 'Index_website.html', 1, '网站开发', '网站开发', '网站开发', 1, ''),
(28, 26, '小程序建设', 'Index_marketing.html', 2, '小程序建设', '小程序建设', '小程序建设', 1, ''),
(29, 26, '电商运营', 'Index_extension.html', 3, '电商运营', '电商运营', '电商运营', 1, ''),
(37, 36, '行业动态', 'List_case3.html', 1, '行业动态', '行业动态', '行业动态', 2, 'Artic_article.html'),
(38, 36, '公司动态', 'List_case3.html', 5, '公司动态', '公司动态', '公司动态', 2, 'Artic_article.html'),
(39, 0, '客户案例', 'Index_active.html', 44, '客户案例', '客户案例', '客户案例', 1, ''),
(40, 39, '营销策划案例', 'Index_map.html', 1, '营销策划案例', '营销策划案例', '营销策划案例', 2, 'Artic_article.html'),
(41, 39, '网站建设案例', 'Index_marketing.html', 2, '网站建设案例', '网站建设案例', '网站建设案例', 2, 'Artic_article.html'),
(42, 39, '小程序开发案例', 'Index_active.html', 3, '小程序开发案例', '小程序开发案例', '小程序开发案例', 2, 'Artic_export.html'),
(43, 39, '电商运营案例', 'Index_map.html', 4, '电商运营案例', '电商运营案例', '电商运营案例', 2, 'Artic_article.html'),
(44, 0, '关于世宗', 'Index/about', 55, '关于世宗', '关于世宗', '关于世宗', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `rr_configs`
--

CREATE TABLE `rr_configs` (
  `id` int(11) NOT NULL,
  `sendemil` varchar(200) DEFAULT NULL,
  `sendpass` varchar(200) DEFAULT NULL,
  `sendrena` varchar(200) DEFAULT NULL,
  `shouemil` varchar(200) DEFAULT NULL,
  `swiemai` varchar(200) DEFAULT NULL COMMENT '开关'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_configs`
--

INSERT INTO `rr_configs` (`id`, `sendemil`, `sendpass`, `sendrena`, `shouemil`, `swiemai`) VALUES
(2, '13545774974@163.com', 'itbull2017', 'CMS管理系统测试', '249650419@qq.com', 'contru');

-- --------------------------------------------------------

--
-- 表的结构 `rr_msg`
--

CREATE TABLE `rr_msg` (
  `id` int(11) NOT NULL,
  `messname` varchar(300) DEFAULT NULL,
  `mestim` varchar(100) DEFAULT NULL,
  `mesip` varchar(100) DEFAULT NULL,
  `mescon` varchar(500) DEFAULT NULL,
  `mestel` varchar(200) DEFAULT NULL,
  `mesemai` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_msg`
--

INSERT INTO `rr_msg` (`id`, `messname`, `mestim`, `mesip`, `mescon`, `mestel`, `mesemai`) VALUES
(14, '闵龙', '1548494460', '0.0.0.0', '放松放松的方式是', '放松放松的方式是', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rr_roll`
--

CREATE TABLE `rr_roll` (
  `id` int(11) NOT NULL,
  `rotim` varchar(200) DEFAULT NULL,
  `rocon` varchar(500) DEFAULT NULL,
  `rosor` mediumint(9) DEFAULT NULL,
  `rohref` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `rr_tels`
--

CREATE TABLE `rr_tels` (
  `id` int(11) NOT NULL,
  `telss` varchar(300) DEFAULT NULL,
  `switel` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rr_tels`
--

INSERT INTO `rr_tels` (`id`, `telss`, `switel`) VALUES
(1, '13545774974', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rr_admins`
--
ALTER TABLE `rr_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_arts`
--
ALTER TABLE `rr_arts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_auth_group`
--
ALTER TABLE `rr_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_auth_group_access`
--
ALTER TABLE `rr_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `rr_auth_rule`
--
ALTER TABLE `rr_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rr_caross`
--
ALTER TABLE `rr_caross`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_cateart`
--
ALTER TABLE `rr_cateart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_configs`
--
ALTER TABLE `rr_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_msg`
--
ALTER TABLE `rr_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_roll`
--
ALTER TABLE `rr_roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rr_tels`
--
ALTER TABLE `rr_tels`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `rr_admins`
--
ALTER TABLE `rr_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `rr_arts`
--
ALTER TABLE `rr_arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `rr_auth_group`
--
ALTER TABLE `rr_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `rr_auth_rule`
--
ALTER TABLE `rr_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- 使用表AUTO_INCREMENT `rr_caross`
--
ALTER TABLE `rr_caross`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `rr_cateart`
--
ALTER TABLE `rr_cateart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- 使用表AUTO_INCREMENT `rr_configs`
--
ALTER TABLE `rr_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `rr_msg`
--
ALTER TABLE `rr_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `rr_roll`
--
ALTER TABLE `rr_roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `rr_tels`
--
ALTER TABLE `rr_tels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
