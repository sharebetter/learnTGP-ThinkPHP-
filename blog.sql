/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-05-28 10:07:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4,
  `banner_id` int(50) DEFAULT NULL,
  `time` int(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `comment_times` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '10',
  `good_times` int(11) DEFAULT '0',
  `has_goods_userid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('4', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;“博客”一词是从英文单词Blog音译（不是翻译）而来。Blog是Weblog的简称，而Weblog则是由Web和Log两个英文单词组合而成。log有以下几种解释：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;1. A record of a ship&amp;#39;s speed, its progress, and any shipboard eventsof navigational importance. 航海记录：对船速、船程以及船上发生的所有对航海有意义的事件的记载。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;2. The book in which this record is kept. 航海日志：保有这种记载的本子。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;3. A record of a vehicle&amp;#39;s performance, as the flight record of an aircraft. 飞行日志：对交通工具工作情况的记载，如飞机的飞行记录。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;4. A record, as of the performance of a machine or the progress of an undertaking:&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;日志：对某种机器工作情况或某项任务进展情况的记载。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;博客最初的名称是Weblog，由web和log两个单词组成，按字面意思就为网络日记，后来喜欢新名词的人把这个词的发音故意改了一下，读成we blog，由此，blog这个词被创造出来。中文意思即&lt;span style=&quot;font-weight: 700;&quot;&gt;网志&lt;/span&gt;或&lt;span style=&quot;font-weight: 700;&quot;&gt;网络日志&lt;/span&gt;，不过，在中国大陆有人往往也将&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Blog&lt;/span&gt;本身和&lt;span style=&quot;font-weight: 700;&quot;&gt;blogger&lt;/span&gt;（即博客作者）均音译为“博客”。“博客”有较深的涵义：“博”为“广博”；“客”不单是“blogger”更有“好客”之意。看Blog的人都是“客”。而在台湾，则分别音译成“部落格”（或“部落阁”）及“部落客”，认为Blog本身有社群群组的意含在内，借由Blog可以将网络上网友集结成一个大博客，成为另一个具有影响力的自由媒体。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;① blog = Web log = 部落格 = 网络日志= 网志=网络日记本&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;② blogger = 写blog的人=博主&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;Weblog就是在网络上发布和阅读的流水记录，通常称为“网络日志”，简称为“网志”。博客（BLOGGER）概念解释为网络出版（Web Publishing）、发表和张贴（Post-这个字当名词用时就是指张贴的文章）文章，是个急速成长的网络活动，现在甚至出现了一个用来指称这种网络出版和发表文章的专有名词——Weblog，或Blog。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial,sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;Blogger即指撰写Blog的人。Blogger在很多时候也被翻译成为“博客”一词，而撰写Blog这种行为，有时候也被翻译成“博客”。因而，中文“博客”一词，既可作为名词，分别指代两种意思Blog（网志）和Blogger（撰写网志的人），也可作为动词，意思为撰写网志这种行为，只是在不同的场合分别表示不同的意思罢了。&lt;/p&gt;', '1', '1511694421', '博客是什么？', '17', '3', '10', '3', ',23,32,22');
INSERT INTO `article` VALUES ('5', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0036.gif&quot;/&gt;dfasfasfdafasdfgasgdgasdgaga&lt;/p&gt;', '1', '1511694417', '123', '5', '3', '86', '1', ',86');
INSERT INTO `article` VALUES ('6', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0001.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0002.gif&quot;/&gt;dsfafas&lt;br/&gt;&lt;/p&gt;', '1', '1511770380', 'asdfasdf', '27', '4', '10', '2', ',71');
INSERT INTO `article` VALUES ('8', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0001.gif&quot;/&gt;从前有一座山，山里有一座庙，庙里有。。。。。。。&lt;br/&gt;&lt;/p&gt;', '4', '1511694437', '这是神墨?_?', '18', '7', '86', '0', '');
INSERT INTO `article` VALUES ('15', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;“博客”一词是从英文单词Blog音译（不是翻译）而来。Blog是Weblog的简称，而Weblog则是由Web和Log两个英文单词组合而成。log有以下几种解释：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;1. A record of a ship&amp;#39;s speed, its progress, and any shipboard eventsof navigational importance. 航海记录：对船速、船程以及船上发生的所有对航海有意义的事件的记载。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;2. The book in which this record is kept. 航海日志：保有这种记载的本子。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;3. A record of a vehicle&amp;#39;s performance, as the flight record of an aircraft. 飞行日志：对交通工具工作情况的记载，如飞机的飞行记录。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;4. A record, as of the performance of a machine or the progress of an undertaking:&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;日志：对某种机器工作情况或某项任务进展情况的记载。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;博客最初的名称是Weblog，由web和log两个单词组成，按字面意思就为网络日记，后来喜欢新名词的人把这个词的发音故意改了一下，读成we blog，由此，blog这个词被创造出来。中文意思即&lt;span style=&quot;font-weight: 700;&quot;&gt;网志&lt;/span&gt;或&lt;span style=&quot;font-weight: 700;&quot;&gt;网络日志&lt;/span&gt;，不过，在中国大陆有人往往也将&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Blog&lt;/span&gt;本身和&lt;span style=&quot;font-weight: 700;&quot;&gt;blogger&lt;/span&gt;（即博客作者）均音译为“博客”。“博客”有较深的涵义：“博”为“广博”；“客”不单是“blogger”更有“好客”之意。看Blog的人都是“客”。而在台湾，则分别音译成“部落格”（或“部落阁”）及“部落客”，认为Blog本身有社群群组的意含在内，借由Blog可以将网络上网友集结成一个大博客，成为另一个具有影响力的自由媒体。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;① blog = Web log = 部落格 = 网络日志= 网志=网络日记本&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;② blogger = 写blog的人=博主&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;Weblog就是在网络上发布和阅读的流水记录，通常称为“网络日志”，简称为“网志”。博客（BLOGGER）概念解释为网络出版（Web Publishing）、发表和张贴（Post-这个字当名词用时就是指张贴的文章）文章，是个急速成长的网络活动，现在甚至出现了一个用来指称这种网络出版和发表文章的专有名词——Weblog，或Blog。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; white-space: normal; padding: 0px; line-height: 24px; text-indent: 2em; zoom: 1; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; widows: 1; background-color: rgb(255, 255, 255);&quot;&gt;Blogger即指撰写Blog的人。Blogger在很多时候也被翻译成为“博客”一词，而撰写Blog这种行为，有时候也被翻译成“博客”。因而，中文“博客”一词，既可作为名词，分别指代两种意思Blog（网志）和Blogger（撰写网志的人），也可作为动词，意思为撰写网志这种行为，只是在不同的场合分别表示不同的意思罢了。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '3', '1511694432', '这就是Blog', '83', '4', '10', '0', '');
INSERT INTO `article` VALUES ('31', '&lt;p&gt;珏哥说：我想瘦下来！&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;/p&gt;', '2', '1511694426', '我咔咔咔卡卡的笑', '22', '3', '10', '0', '');
INSERT INTO `article` VALUES ('32', '&lt;p&gt;好累啊 好累啊 好累啊！&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0012.gif&quot;/&gt;&lt;/p&gt;', '3', '1511694428', '终于快把东西写完了', '13', '4', '71', '0', '');
INSERT INTO `article` VALUES ('33', '&lt;p&gt;php是一款不错的语言&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0011.gif&quot;/&gt;&lt;/p&gt;', '2', '1511694424', 'php在后端的地位', '7', '4', '10', '0', '');
INSERT INTO `article` VALUES ('35', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0002.gif&quot;/&gt;看看行不行&lt;/p&gt;&lt;p&gt;…哈哈哈哈哈哈！&lt;/p&gt;', '3', '1517969405', '这是测试', '14', '5', '87', '0', '');
INSERT INTO `article` VALUES ('36', '&lt;p&gt;321&lt;/p&gt;', '2', '1517969402', '3214', '9', '5', '87', '0', '');
INSERT INTO `article` VALUES ('40', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20171127/1511754108307548.png&quot; title=&quot;1511754108307548.png&quot; alt=&quot;1.png&quot;/&gt;&lt;/p&gt;', '1', '1517969398', 'javascript', '36', '7', '10', '1', ',86');
INSERT INTO `article` VALUES ('41', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0003.gif&quot;/&gt;噔噔噔噔。。。。&lt;/p&gt;', '2', '1517969391', '这是用户发的贴哦', '88', '6', '87', '2', ',86,71');
INSERT INTO `article` VALUES ('42', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0084.gif&quot;/&gt;&lt;/p&gt;&lt;pre class=&quot;brush:cpp;toolbar:false&quot;&gt;&amp;lt;!doctype&amp;nbsp;html&amp;gt;\r\n&amp;lt;html&amp;gt;\r\n&amp;lt;head&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;meta&amp;nbsp;charset=&amp;quot;UTF-8&amp;quot;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;title&amp;gt;交流平台后台&amp;lt;/title&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;link&amp;nbsp;rel=&amp;quot;apple-touch-icon-precomposed&amp;quot;&amp;nbsp;href=&amp;quot;__STATIC__/public/bs/images/icon/icon.png&amp;quot;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;link&amp;nbsp;rel=&amp;quot;shortcut&amp;nbsp;icon&amp;quot;&amp;nbsp;href=&amp;quot;__STATIC__/public/bs/images/icon/favicon.ico&amp;quot;&amp;gt;\r\n&amp;lt;/head&amp;gt;\r\n&amp;lt;frameset&amp;nbsp;rows=&amp;#39;90,*&amp;#39;&amp;nbsp;frameborder=&amp;#39;0&amp;#39;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;frame&amp;nbsp;src=&amp;#39;top.html&amp;#39;&amp;nbsp;name=&amp;#39;top&amp;#39;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;frameset&amp;nbsp;cols=&amp;#39;14%,*&amp;#39;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;frame&amp;nbsp;src=&amp;#39;left.html&amp;#39;&amp;nbsp;name=&amp;#39;left&amp;#39;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;frame&amp;nbsp;src=&amp;#39;right.html&amp;#39;&amp;nbsp;name=&amp;#39;right&amp;#39;&amp;gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;/frameset&amp;gt;\r\n&amp;lt;/frameset&amp;gt;\r\n&amp;lt;/html&amp;gt;&lt;/pre&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '3', '1518251324', '哇卡卡卡', '5', '3', '10', '3', ',86,71,87');
INSERT INTO `article` VALUES ('45', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0002.gif&quot;/&gt;cliclicli&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0076.gif&quot;/&gt;&lt;/p&gt;', '4', '1518251268', 'cliclicli', '32', '6', '87', '2', ',71,10');
INSERT INTO `article` VALUES ('46', '&lt;p&gt;fgdgfd&lt;br/&gt;&lt;/p&gt;', '2', '1526374192', 'fgdg', '0', '0', '87', '0', null);

-- ----------------------------
-- Table structure for article_check
-- ----------------------------
DROP TABLE IF EXISTS `article_check`;
CREATE TABLE `article_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `banner_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of article_check
-- ----------------------------
INSERT INTO `article_check` VALUES ('3', '&lt;p&gt;sdgsdf&lt;br/&gt;&lt;/p&gt;', '3', '1518245055', '87', 'dfgs');
INSERT INTO `article_check` VALUES ('4', '&lt;p&gt;gjgfd&lt;br/&gt;&lt;/p&gt;', '4', '1518245081', '87', 'bxcvbxc');

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '前端技术');
INSERT INTO `banner` VALUES ('2', '后端程序');
INSERT INTO `banner` VALUES ('3', '程序人生');
INSERT INTO `banner` VALUES ('4', '授人以渔');
INSERT INTO `banner` VALUES ('5', '我要发帖');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_comment` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `article_id` int(50) DEFAULT NULL,
  `comment_time` int(50) DEFAULT NULL,
  `reply_times` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('34', '可', '71', '6', '1694421', '0');
INSERT INTO `comment` VALUES ('41', '我听不到你的声音。。。', '71', '15', '1694421', '0');
INSERT INTO `comment` VALUES ('42', '444', '71', '15', '1511694417', '0');
INSERT INTO `comment` VALUES ('53', '666', '87', '8', '1511770380', '1');
INSERT INTO `comment` VALUES ('54', '哇哇哇', '87', '31', '1511694437', '0');
INSERT INTO `comment` VALUES ('55', '凋逼', '87', '35', '1511694432', '0');
INSERT INTO `comment` VALUES ('56', '哈哈哈哈', '87', '36', '1511694426', '0');
INSERT INTO `comment` VALUES ('57', '可以可以', '87', '35', '1511694428', '0');
INSERT INTO `comment` VALUES ('60', '456', '87', '41', '1511694424', '5');
INSERT INTO `comment` VALUES ('79', 'ajax请求成功', '87', '40', '1517969405', '2');
INSERT INTO `comment` VALUES ('80', '哦哦哦哦', '87', '15', '1517969402', '0');
INSERT INTO `comment` VALUES ('87', 'ajax之再测试！', '87', '40', '1517969398', '1');
INSERT INTO `comment` VALUES ('98', '11', '87', '35', '1517969391', '0');
INSERT INTO `comment` VALUES ('99', '234', '87', '33', '1518251324', '0');
INSERT INTO `comment` VALUES ('100', '测试哈哈', '87', '32', '1511694417', '0');
INSERT INTO `comment` VALUES ('101', '233！', '87', '32', '1511770380', '0');
INSERT INTO `comment` VALUES ('106', '测试~', '87', '41', '1511694437', '2');
INSERT INTO `comment` VALUES ('108', '点击提交测试', '87', '36', '1511694432', '0');
INSERT INTO `comment` VALUES ('109', '回车测试', '87', '36', '1511694426', '0');
INSERT INTO `comment` VALUES ('110', '按钮测试', '87', '36', '1511694428', '3');
INSERT INTO `comment` VALUES ('111', '回车再测试！', '87', '36', '1511694424', '0');
INSERT INTO `comment` VALUES ('112', '点击按钮提交', '87', '33', '1517969405', '0');
INSERT INTO `comment` VALUES ('113', '回车提交', '87', '33', '1517969402', '0');
INSERT INTO `comment` VALUES ('118', '开玩笑。。。', '87', '31', '1517969398', '0');
INSERT INTO `comment` VALUES ('119', '模块测试~', '87', '32', '1517969391', '1');
INSERT INTO `comment` VALUES ('120', '999', '87', '8', '1518251324', '0');
INSERT INTO `comment` VALUES ('121', '2333', '87', '8', '1518251268', '0');
INSERT INTO `comment` VALUES ('122', '用户评论测试~', '87', '35', '1694421', '0');
INSERT INTO `comment` VALUES ('123', '评论一波', '90', '8', '1694421', '0');
INSERT INTO `comment` VALUES ('124', '哇哈哈哈哈！哈哈哈哈哈哈哈哈！', '90', '8', '1694421', '0');
INSERT INTO `comment` VALUES ('125', '3222~', '90', '8', '1511694417', '0');
INSERT INTO `comment` VALUES ('126', '有点强', '90', '6', '1511770380', '0');
INSERT INTO `comment` VALUES ('130', '呵呵呵哒', '86', '31', '1511694437', '0');
INSERT INTO `comment` VALUES ('132', '???????', '87', '4', '1511694432', '2');
INSERT INTO `comment` VALUES ('133', '??????????', '87', '40', '1511694426', '0');
INSERT INTO `comment` VALUES ('134', 'fdgsf', '87', '40', '1511694428', '3');
INSERT INTO `comment` VALUES ('135', 'have a try', '87', '41', '1511694424', '3');
INSERT INTO `comment` VALUES ('136', 'hahaha', '87', '35', '1511694417', '0');
INSERT INTO `comment` VALUES ('137', '搞笑', '86', '4', '1511770380', '0');
INSERT INTO `comment` VALUES ('138', '6969', '87', '15', '1511694437', '0');
INSERT INTO `comment` VALUES ('139', '自言自语。。。。', '99', '4', '1511694432', '0');
INSERT INTO `comment` VALUES ('140', '我真的无所谓，寂寞却一直掉眼泪', '10', '8', '1525349243', '0');
INSERT INTO `comment` VALUES ('141', 'hahah', '10', '41', '1525353755', '5');
INSERT INTO `comment` VALUES ('142', 'aa', '10', '41', '1525353777', '2');
INSERT INTO `comment` VALUES ('143', '22', '10', '32', '1525354023', '0');
INSERT INTO `comment` VALUES ('144', '围观沙发！', '10', '6', '1525355120', '0');
INSERT INTO `comment` VALUES ('145', '嘎嘎嘎', '10', '5', '1525355143', '0');
INSERT INTO `comment` VALUES ('146', 'soga', '10', '5', '1525398551', '0');
INSERT INTO `comment` VALUES ('147', '好啊', '10', '33', '1525490381', '0');
INSERT INTO `comment` VALUES ('148', '可以', '10', '45', '1525490453', '3');
INSERT INTO `comment` VALUES ('149', '233', '10', '42', '1525490613', '10');
INSERT INTO `comment` VALUES ('150', '222', '10', '45', '1525490631', '1');
INSERT INTO `comment` VALUES ('151', '333', '10', '45', '1525490650', '2');
INSERT INTO `comment` VALUES ('152', '评了个论', '10', '5', '1525499375', '0');
INSERT INTO `comment` VALUES ('153', '开头难', '10', '45', '1525499480', '1');
INSERT INTO `comment` VALUES ('154', '开始', '10', '45', '1525499592', '0');
INSERT INTO `comment` VALUES ('155', '开始', '10', '40', '1525499602', '1');
INSERT INTO `comment` VALUES ('156', '让', '10', '40', '1525499794', '2');
INSERT INTO `comment` VALUES ('157', '的', '10', '40', '1525499797', '1');
INSERT INTO `comment` VALUES ('158', '????????????123', '86', '42', '1526029661', '0');
INSERT INTO `comment` VALUES ('159', '2333', '86', '42', '1526029941', '0');
INSERT INTO `comment` VALUES ('160', '啥', '86', '6', '1526029982', '0');
INSERT INTO `comment` VALUES ('161', '第三方三四', '86', '45', '1526374042', '1');

-- ----------------------------
-- Table structure for daily_talk
-- ----------------------------
DROP TABLE IF EXISTS `daily_talk`;
CREATE TABLE `daily_talk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of daily_talk
-- ----------------------------
INSERT INTO `daily_talk` VALUES ('1', 'Do not let what you cannot do interfere with what you can do.&lt;/br&gt;\r\n 别让你不能做的事妨碍到你能做的事。（John Wooden）', '1511694884');
INSERT INTO `daily_talk` VALUES ('3', 'Do not let what you cannot do interfere with what you can do.\r\n 别让你不能做的事妨碍到你能做的事。（John Wooden.....）', '1517197168');

-- ----------------------------
-- Table structure for good_talk
-- ----------------------------
DROP TABLE IF EXISTS `good_talk`;
CREATE TABLE `good_talk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `title` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of good_talk
-- ----------------------------
INSERT INTO `good_talk` VALUES ('2', '<p>一次我下载几部电影，发现如果同时下载多部要等上几个小时，然后我把最想看的做个先后排序，去设置同时只能下载一部，结果是不到一杯茶功夫我就能看到最想看的电影。 这就像我们一段时间内想干成很多事情，是同时干还是有选择有顺序的干，结果很不一样。同时...</p>', '从下载看我们该如何做事', '1517217102');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_content` varchar(255) DEFAULT NULL,
  `send_userid` int(10) NOT NULL,
  `receive_userid` int(10) NOT NULL,
  `is_read` int(2) DEFAULT '0',
  `message_sendtime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', 'sdfa', '86', '87', '0', '1517969402');
INSERT INTO `message` VALUES ('2', 'hahah哈哈哈哈\n哈哈哈', '86', '87', '1', '1517969398');
INSERT INTO `message` VALUES ('3', '金刚金刚金港国际！！！', '86', '10', '0', '1517969391');
INSERT INTO `message` VALUES ('4', '可以可以', '86', '10', '0', '1518251324');
INSERT INTO `message` VALUES ('5', '波波波', '86', '71', '0', '1518251268');
INSERT INTO `message` VALUES ('6', '实打实地方', '86', '71', '0', '1525747459');
INSERT INTO `message` VALUES ('7', 'ok', '87', '10', '0', '1525771316');

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('2', '欢迎访问学习交流平台！', '1512286919');
INSERT INTO `notice` VALUES ('3', '在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！', '1512286911');
INSERT INTO `notice` VALUES ('4', '在这个小工具中最多可以调用五条', '1512286908');
INSERT INTO `notice` VALUES ('5', '表示由一端滚动到另一端,会重复,缺陷是不能无缝滚动。', '1512286907');
INSERT INTO `notice` VALUES ('6', '页面的自动滚动效果，可由javascript来实现，但是今天无意中发现了一个html标签', '1512286904');

-- ----------------------------
-- Table structure for reply_comment
-- ----------------------------
DROP TABLE IF EXISTS `reply_comment`;
CREATE TABLE `reply_comment` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `comment_id` int(50) NOT NULL,
  `reply_content` varchar(255) DEFAULT NULL,
  `reply_time` int(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of reply_comment
-- ----------------------------
INSERT INTO `reply_comment` VALUES ('2', '141', '1', '1525402483', '10');
INSERT INTO `reply_comment` VALUES ('3', '141', '22', '1525402657', '10');
INSERT INTO `reply_comment` VALUES ('4', '135', 'try try try', '1525418906', '10');
INSERT INTO `reply_comment` VALUES ('8', '141', 'ssss', '1525422993', '10');
INSERT INTO `reply_comment` VALUES ('9', '87', 'test', '1525429871', '10');
INSERT INTO `reply_comment` VALUES ('10', '134', 's2', '1525429949', '10');
INSERT INTO `reply_comment` VALUES ('11', '134', '33', '1525429956', '10');
INSERT INTO `reply_comment` VALUES ('12', '142', 'Hh', '1525430361', '10');
INSERT INTO `reply_comment` VALUES ('13', '142', 'hah', '1525430570', '10');
INSERT INTO `reply_comment` VALUES ('14', '135', '搞神墨', '1525485997', '10');
INSERT INTO `reply_comment` VALUES ('15', '135', '咔咔咔', '1525486038', '10');
INSERT INTO `reply_comment` VALUES ('16', '141', 'gg', '1525486193', '10');
INSERT INTO `reply_comment` VALUES ('17', '141', 'test', '1525486250', '10');
INSERT INTO `reply_comment` VALUES ('18', '106', '111', '1525487183', '10');
INSERT INTO `reply_comment` VALUES ('19', '106', '233', '1525487255', '10');
INSERT INTO `reply_comment` VALUES ('20', '110', '333', '1525492372', '10');
INSERT INTO `reply_comment` VALUES ('21', '110', '555', '1525492377', '10');
INSERT INTO `reply_comment` VALUES ('22', '110', 'yyy', '1525492383', '10');
INSERT INTO `reply_comment` VALUES ('23', '151', 'r', '1525492473', '10');
INSERT INTO `reply_comment` VALUES ('24', '60', 'd', '1525494657', '10');
INSERT INTO `reply_comment` VALUES ('25', '60', 'eee', '1525494722', '10');
INSERT INTO `reply_comment` VALUES ('26', '60', 'e', '1525494725', '10');
INSERT INTO `reply_comment` VALUES ('27', '60', 'e', '1525494733', '10');
INSERT INTO `reply_comment` VALUES ('28', '149', 'd', '1525494900', '10');
INSERT INTO `reply_comment` VALUES ('29', '149', 'f', '1525494979', '10');
INSERT INTO `reply_comment` VALUES ('30', '149', 'f', '1525494989', '10');
INSERT INTO `reply_comment` VALUES ('31', '149', '2', '1525495229', '10');
INSERT INTO `reply_comment` VALUES ('32', '0', 'd', '1525495618', '10');
INSERT INTO `reply_comment` VALUES ('33', '149', 'd', '1525495645', '10');
INSERT INTO `reply_comment` VALUES ('34', '0', 'f', '1525495651', '10');
INSERT INTO `reply_comment` VALUES ('35', '149', 's', '1525495658', '10');
INSERT INTO `reply_comment` VALUES ('36', '149', 'gg', '1525495663', '10');
INSERT INTO `reply_comment` VALUES ('37', '149', 'd', '1525495747', '10');
INSERT INTO `reply_comment` VALUES ('38', '149', 'f', '1525495949', '10');
INSERT INTO `reply_comment` VALUES ('39', '132', 'keyi', '1525499348', '10');
INSERT INTO `reply_comment` VALUES ('40', '0', '我也是', '1525499382', '10');
INSERT INTO `reply_comment` VALUES ('41', '132', '谷歌好啊', '1525499393', '10');
INSERT INTO `reply_comment` VALUES ('42', '0', '难', '1525499494', '10');
INSERT INTO `reply_comment` VALUES ('43', '53', '难', '1525499504', '10');
INSERT INTO `reply_comment` VALUES ('44', '0', 'v', '1525499804', '10');
INSERT INTO `reply_comment` VALUES ('45', '155', '的', '1525499812', '10');
INSERT INTO `reply_comment` VALUES ('46', '60', '的', '1525499886', '10');
INSERT INTO `reply_comment` VALUES ('47', '157', '发', '1525500789', '10');
INSERT INTO `reply_comment` VALUES ('48', '79', '的', '1525501639', '10');
INSERT INTO `reply_comment` VALUES ('49', '79', '到', '1525501743', '10');
INSERT INTO `reply_comment` VALUES ('50', '134', 'a', '1525502302', '10');
INSERT INTO `reply_comment` VALUES ('51', '156', 'kai', '1525502310', '10');
INSERT INTO `reply_comment` VALUES ('52', '156', '开', '1525502334', '10');
INSERT INTO `reply_comment` VALUES ('53', '148', '哦豁 完蛋', '1525573722', '86');
INSERT INTO `reply_comment` VALUES ('54', '148', 'www', '1525573801', '86');
INSERT INTO `reply_comment` VALUES ('55', '151', '人无完人，但会完蛋！', '1525573845', '86');
INSERT INTO `reply_comment` VALUES ('56', '148', 'hoho', '1525602468', '86');
INSERT INTO `reply_comment` VALUES ('57', '150', 'hooo', '1525602476', '86');
INSERT INTO `reply_comment` VALUES ('58', '149', '55', '1525682153', '86');
INSERT INTO `reply_comment` VALUES ('59', '119', '谷歌', '1525697438', '71');
INSERT INTO `reply_comment` VALUES ('60', '153', 'nan', '1525771760', '10');
INSERT INTO `reply_comment` VALUES ('61', '161', 'dddd', '1526374456', '86');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `following` varchar(255) DEFAULT NULL,
  `articlePubnum` int(11) DEFAULT '0',
  `article_collection` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('10', 'admin', '202cb962ac59075b964b07152d234b70', '1', 'uploads/2018-05-05/15254801111312967308.jpg', null, '0', ',45');
INSERT INTO `user` VALUES ('71', '于波', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2018-02-08/15180937651587840914.jpg', ',87', '0', '6,41,42,45');
INSERT INTO `user` VALUES ('86', '王珏', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2017-12-03/15122654091538994379.jpg', ',90,10,87', '0', ',40,41,42,50,5');
INSERT INTO `user` VALUES ('87', '曾海明', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2018-02-08/15180937651587840914.jpg', ',10,86', '1', ',42');
INSERT INTO `user` VALUES ('88', '周雅静', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2017-12-03/15122654091538994379.png', null, '0', null);
INSERT INTO `user` VALUES ('90', '叶赐红', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2018-02-08/15180937651587840915.jpg', null, '0', null);
INSERT INTO `user` VALUES ('99', '曾海跃', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2018-02-10/15182698811257825412.jpg', null, '0', null);
INSERT INTO `user` VALUES ('100', '曾明明', '202cb962ac59075b964b07152d234b70', '0', 'uploads/2018-02-10/15182678241518456002.jpg', null, '0', null);
INSERT INTO `user` VALUES ('101', '3333', '343d9040a671c45832ee5381860e2996', '0', 'uploads/2018-02-10/15182681971024473440.jpg', null, '0', null);
