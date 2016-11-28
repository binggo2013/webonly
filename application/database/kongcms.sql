-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 年 07 月 07 日 11:32
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kongcms`
--
CREATE DATABASE `kongcms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kongcms`;

-- --------------------------------------------------------

--
-- 表的结构 `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `ad`
--

INSERT INTO `ad` (`id`, `title`, `link`, `thumbnail`, `description`, `type`, `state`, `date`) VALUES
(12, '新banner2222', 'http://www.baidu.com', '20141112112154977.jpg', '阿斯顿', 2, 1, '2014-09-11 11:41:43'),
(14, 'slider的示例数据', 'slider的示例数据', '20141112112120198.jpg', 'slider的示例数据', 3, 1, '2014-09-11 11:42:15'),
(15, 'sidebar', 'ad ', '20141205194248660.gif', 'asd ', 4, 1, '2014-09-11 11:42:30'),
(17, '冬天到了', '雾霾严重了。', '20141112112040599.jpg', '', 3, 1, '2014-09-11 13:16:49'),
(18, '开学了', 'http://www.baidu.com', '20141112112003308.jpg', '开学必买的数码产品', 3, 1, '2014-09-11 13:17:04'),
(19, '新的slider', 'http://www.baidu.comDD', '20141112111939804.jpg', '新的slider新的slider', 3, 1, '2014-09-16 14:51:24'),
(21, 'new fullcolumn ad', 'http://www.baidu.com', '20141112112235363.jpg', 'new fullcolumn adnew fullcolumn adnew fullcolumn ad', 1, 1, '2014-09-16 16:32:40');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `last_ip` varchar(250) NOT NULL,
  `last_time` datetime NOT NULL,
  `login_num` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `reg_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`, `last_ip`, `last_time`, `login_num`, `level_id`, `reg_time`) VALUES
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', '127.0.0.1', '2015-06-16 11:32:12', 2, 3, '2015-06-16 11:32:02');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `attr` varchar(50) NOT NULL,
  `nid` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `pageview` int(10) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` int(1) NOT NULL,
  `lead` text NOT NULL,
  `content` text NOT NULL,
  `cid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `pid` int(11) NOT NULL,
  `content` text NOT NULL,
  `icon` varchar(200) NOT NULL,
  `up` int(11) NOT NULL,
  `down` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `state`, `aid`, `uid`, `pid`, `content`, `icon`, `up`, `down`, `date`) VALUES
(1, 1, 3, 'only<i class="caret"></i>', 0, 'hello\n', '', 0, 0, '2014-11-16 07:11:36'),
(2, 1, 3, 'only', 0, 'dd', 'default.jpg', 0, 0, '2014-11-16 07:11:58'),
(3, 1, 3, 'only', 0, 'hello', 'default.jpg', 0, 0, '2014-11-16 07:12:31'),
(4, 1, 3, 'only', 0, 'hello', 'default.jpg', 0, 0, '2014-11-16 07:12:32'),
(5, 1, 3, 'only', 0, 'hello', 'default.jpg', 0, 0, '2014-11-16 07:12:33'),
(6, 1, 3, 'only', 0, 'hello', 'default.jpg', 0, 0, '2014-11-16 07:12:34'),
(7, 1, 3, 'only', 0, 'hello', 'default.jpg', 0, 0, '2014-11-16 07:12:34'),
(8, 1, 3, 'only<i class="caret"></i>', 0, 'ddd', '', 0, 0, '2014-11-16 21:10:27'),
(9, 1, 3, 'only<i class="caret"></i>', 0, '3', '', 0, 0, '2014-12-02 22:43:18'),
(10, 1, 3, 'only', 0, 'd', '20141116071219947.jpg', 0, 0, '2014-12-02 22:43:29'),
(11, 1, 3, 'only<i class="caret"></i>', 0, 'ddd', '20141116071219947.jpg', 0, 0, '2014-12-02 22:45:18'),
(12, 1, 3, 'only<i class="caret"></i>', 0, 'ddd333', '20141116071219947.jpg', 0, 0, '2014-12-02 22:45:24');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `permission` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `permission`, `date`) VALUES
(1, 'HTML', '只能管理评论', '2', '2014-10-14 11:48:48'),
(2, 'CSS', '可以控制等级管理投票管理文章管理广告管理', '10,8,7,4,2', '2014-10-14 11:49:51'),
(3, 'JavaScript', '可以进行任何操作，具有最高权限。', '13,12,11,10,9,8,7,4,3,2', '2014-10-14 11:50:36'),
(4, 'jQuery', '除了评论管理，其余的都不能操作。', '2', '2014-10-14 13:12:48'),
(5, 'Bootstrap', '等级demo', '12', '2014-10-16 10:13:47');

-- --------------------------------------------------------

--
-- 表的结构 `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `entry`
--

INSERT INTO `entry` (`id`, `title`, `description`, `amount`, `state`, `pid`, `date`) VALUES
(3, '最主流的购物网站', 'b2b,b2c,c2c', 0, 1, 0, '2014-09-16 18:07:00'),
(10, '四大恶人', 'v1,v2', 3, 1, 0, '2014-09-18 10:02:17'),
(11, '易迅', '数码产品', 0, 1, 3, '2014-09-18 10:03:48'),
(12, '万表网', 'www.wanbiao.com', 1, 1, 3, '2014-09-18 10:05:26'),
(22, '丁春秋2', '丁春秋2', 150005, 1, 10, '2014-09-18 11:03:11'),
(23, '柯镇恶', '柯镇恶', 5, 1, 10, '2014-09-18 11:03:30'),
(28, '王重阳', '王重阳', 57, 1, 10, '2014-09-18 15:07:02'),
(29, '周伯通', '周伯通', 1206, 1, 10, '2014-09-18 15:07:13'),
(33, 'K_Frame', 'ddd', 0, 1, 4, '2014-09-23 15:28:45'),
(34, '京东商城', '京东商城', 0, 1, 3, '2014-10-09 11:40:57'),
(35, '天猫商城', '天猫商城', 0, 1, 3, '2014-10-09 11:41:16');

-- --------------------------------------------------------

--
-- 表的结构 `examination`
--

CREATE TABLE IF NOT EXISTS `examination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(300) NOT NULL,
  `total` int(11) NOT NULL,
  `ticked` int(11) NOT NULL,
  `rightNum` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `createdTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `examination`
--

INSERT INTO `examination` (`id`, `studentName`, `total`, `ticked`, `rightNum`, `score`, `createdTime`) VALUES
(4, 'demo', 8, 2, 2, 20, '2015-06-15 11:35:16'),
(5, 'demo', 8, 2, 2, 20, '2015-06-15 11:35:33'),
(6, 'demo', 8, 7, 5, 50, '2015-06-15 11:35:49'),
(7, 'demo', 8, 7, 5, 50, '2015-06-15 11:36:12'),
(8, 'demo', 7, 1, 0, 0, '2015-06-16 09:38:10'),
(9, 'demo', 7, 1, 0, 0, '2015-06-16 09:38:20'),
(10, 'demo', 7, 1, 1, 10, '2015-06-16 09:38:28'),
(11, 'demo', 7, 1, 1, 10, '2015-06-16 10:36:24'),
(12, 'demo', 8, 2, 2, 20, '2015-06-15 11:35:16'),
(13, 'demo', 8, 2, 2, 20, '2015-06-15 11:35:16'),
(14, 'demo', 8, 2, 2, 100, '2015-06-15 11:35:16'),
(15, 'demo', 7, 0, 0, 0, '2015-07-01 10:21:45'),
(16, 'demo', 7, 2, 1, 10, '2015-07-01 22:17:24'),
(17, 'demo', 10, 9, 3, 30, '2015-07-03 10:11:16'),
(18, 'demo', 10, 9, 3, 30, '2015-07-03 10:11:37'),
(19, 'demo', 10, 4, 4, 40, '2015-07-03 10:11:47'),
(20, 'demo', 10, 8, 3, 30, '2015-07-06 11:31:27'),
(21, 'demo', 10, 7, 3, 30, '2015-07-06 11:32:04'),
(22, 'demo', 10, 7, 4, 40, '2015-07-06 11:32:39'),
(23, 'demo', 10, 0, 0, 0, '2015-07-07 10:55:35');

-- --------------------------------------------------------

--
-- 表的结构 `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `permission` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `level`
--

INSERT INTO `level` (`id`, `name`, `description`, `permission`, `date`) VALUES
(1, '初级管理员', '只能管理评论', '2', '2014-10-14 11:48:48'),
(2, '中级管理员', '可以控制等级管理投票管理文章管理广告管理', '10,8,7,4,2', '2014-10-14 11:49:51'),
(3, '超级管理员', '可以进行任何操作，具有最高权限。', '13,12,11,10,9,8,7,4,3,2', '2014-10-14 11:50:36'),
(4, '游客', '除了评论管理，其余的都不能操作。', '2', '2014-10-14 13:12:48'),
(5, '等级demo', '等级demo', '12', '2014-10-16 10:13:47');

-- --------------------------------------------------------

--
-- 表的结构 `nav`
--

CREATE TABLE IF NOT EXISTS `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `state` tinyint(1) NOT NULL,
  `picked` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- 转存表中的数据 `nav`
--

INSERT INTO `nav` (`id`, `name`, `description`, `state`, `picked`, `pid`, `sort`, `date`) VALUES
(1, '前端开发', '前端开发', 1, 1, 0, 5, '2014-09-25 09:40:52'),
(35, 'html', 'html', 1, 1, 1, 6, '2014-09-25 15:02:46'),
(36, 'CSS', 'CSS', 1, 1, 1, 1, '2014-09-25 15:03:25'),
(39, 'PHP后台', 'PHP后台', 1, 1, 0, 49, '2014-09-25 15:15:27'),
(40, 'PHP面向对象', 'PHP面向对象', 1, 1, 39, 40, '2014-09-25 15:29:45'),
(41, 'PHP面向过程', 'PHP面向过程', 1, 1, 39, 41, '2014-09-25 15:29:52'),
(42, 'jQuery', 'jQuery', 1, 1, 1, 1, '2014-09-25 15:49:53'),
(43, 'JavaScript', 'JavaScript', 1, 1, 1, 1, '2014-09-25 15:50:08'),
(44, 'Smarty', 'Smarty', 1, 1, 39, 44, '2014-09-25 15:51:17'),
(45, '学员中心', '学员中心', 1, 1, 0, 45, '2014-10-09 09:17:38'),
(46, '源码下载', '源码下载', 1, 1, 0, 46, '2014-10-09 09:17:54'),
(47, '论坛', '论坛', 1, 1, 0, 47, '2014-10-09 09:18:09'),
(48, '在线课堂', '在线课堂', 1, 1, 0, 48, '2014-10-09 09:18:33'),
(49, '面试试题', '面试试题', 1, 1, 0, 49, '2014-10-09 09:18:55');

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(100) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `orderTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `orderId`, `productName`, `total`, `orderTime`) VALUES
(5, 'order20140727092652753', 'yifuf,lg,', '277', '2014-07-27 15:26:52'),
(6, 'order20140727092813515', 'yifuf,lg,衣服1', '327', '2014-07-27 15:28:13'),
(7, 'order20140727093229730', 'yifuf,lg,衣服2', '545', '2014-07-27 15:32:29'),
(8, 'order20140727095620919', 'yifuf,lg,衣服2,衣服1', '595', '2014-07-27 15:56:20'),
(9, 'order20140727110928594', 'yifuf,孔子像', '333', '2014-07-27 17:09:28'),
(10, 'order20150615025707339', 'd', '0', '2015-06-15 14:57:07'),
(11, 'order20150615025708760', 'd', '0', '2015-06-15 14:57:08'),
(12, '', '', '24', '2015-06-15 15:53:58'),
(13, '', '', '24', '2015-06-15 15:53:58'),
(14, '', '', '24', '2015-06-15 15:54:32'),
(15, 'order20150615040634627', 'd,4', '48', '2015-06-15 16:06:34'),
(16, 'order20150615040634121', 'd,4', '48', '2015-06-15 16:06:34'),
(17, 'order20150616094635450', 'd,4', '16', '2015-06-16 09:46:35'),
(18, 'order20150616094635504', 'd,4', '16', '2015-06-16 09:46:35'),
(19, 'order20150616101306130', 'd', '30', '2015-06-16 10:13:06'),
(20, 'order20150616101306877', 'd', '30', '2015-06-16 10:13:06'),
(21, 'order20150616103606149', 'd', '40', '2015-06-16 10:36:06'),
(22, 'order20150616103606429', 'd', '40', '2015-06-16 10:36:06'),
(23, 'order20150701102649366', 'd', '5', '2015-07-01 10:26:49');

-- --------------------------------------------------------

--
-- 表的结构 `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `permission`
--

INSERT INTO `permission` (`id`, `name`, `description`, `pid`, `date`) VALUES
(2, '评论管理', '评论管理', 2, '2014-10-14 09:40:08'),
(3, '导航管理', '主导航，子导航', 3, '2014-10-14 09:41:23'),
(4, '广告管理', '包括banner通栏侧栏slider的广告管理', 4, '2014-10-14 09:42:06'),
(7, '文章管理', '发布修改删除文章', 7, '2014-10-14 11:05:24'),
(8, '投票管理', '投票管理', 8, '2014-10-14 11:06:08'),
(9, '权限管理', '权限管理', 9, '2014-10-14 11:06:23'),
(10, '等级管理', '等级管理', 10, '2014-10-14 11:06:32'),
(11, '管理员管理', '管理员管理', 11, '2014-10-14 11:06:45'),
(12, '权限demo', '权限demo', 12, '2014-10-16 10:13:19'),
(13, '网站配置', '网站的基本信息，数据库信息', 13, '2014-10-23 10:06:22');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `pix` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `addTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `amount`, `inventory`, `pix`, `description`, `addTime`) VALUES
(41, 'd', 5, 6, 10, '20140809225820649.jpg', 'd', '2014-07-28 16:08:40'),
(43, '4', 4, 0, 4, '20140809225805498.jpg', '444', '2014-07-28 16:11:49');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `email` varchar(200) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `login_num` int(11) NOT NULL,
  `last_ip` varchar(200) NOT NULL,
  `last_time` datetime NOT NULL,
  `regTime` datetime NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `pwd`, `email`, `icon`, `login_num`, `last_ip`, `last_time`, `regTime`, `state`) VALUES
(52, 'only', 'e10adc3949ba59abbe56e057f20f883e', '', '20141116071219947.jpg', 19, '127.0.0.1', '2014-12-02 22:45:12', '2014-11-12 09:53:50', 1),
(53, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'default.jpg', 2, '127.0.0.1', '2015-07-01 14:41:45', '2015-07-01 10:27:17', 0),
(54, 'kong', 'e10adc3949ba59abbe56e057f20f883e', '', 'default.jpg', 2, '127.0.0.1', '2015-07-01 10:28:54', '2015-07-01 10:28:30', 0);

-- --------------------------------------------------------

--
-- 表的结构 `veling_exam_choice`
--

CREATE TABLE IF NOT EXISTS `veling_exam_choice` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `easycount` int(255) unsigned NOT NULL DEFAULT '0',
  `heardcount` int(20) unsigned NOT NULL DEFAULT '0',
  `operater` varchar(20) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `rank` int(20) unsigned NOT NULL DEFAULT '0',
  `typeid` int(20) unsigned NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- 转存表中的数据 `veling_exam_choice`
--

INSERT INTO `veling_exam_choice` (`id`, `question`, `pic`, `a`, `b`, `c`, `d`, `answer`, `easycount`, `heardcount`, `operater`, `addtime`, `rank`, `typeid`, `course_id`) VALUES
(1, 'r u ok?CSS', '', 'ok', 'no', 'not ok', 'not no', 'A', 0, 0, 'veling', '2015-06-10 14:06:56', 0, 0, 2),
(2, '以下不属于道路交通信号是_____。HTML', '', '警灯', '交通标志', '交通警察的指挥', '交通标线', 'A', 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0, 1),
(3, '以下不属于道路交通信号是_____。HTML', '', '警灯', '交通标志', '交通警察的指挥', '交通标线', 'A', 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0, 1),
(104, 'asdasdHTML', '', 'tom', 'b', 'c', 'ASDF', 'A', 0, 0, 'jane doe', '2015-06-11 15:00:22', 0, 0, 1),
(105, '最伟大的名著', '', '西游', '三国', '水浒', '儒林外史', 'A', 0, 0, 'jane doe', '2015-06-11 15:01:35', 0, 0, 5),
(106, '哪个季节最热', '', '春', '夏', '秋', '冬', 'B', 0, 0, 'jane doe', '2015-06-12 14:07:41', 0, 0, 4),
(107, 'HTML的全称是什么？', '', 'tom', 'peter', 'mary', 'mike', 'A', 0, 0, 'jane doe', '2015-06-15 10:26:49', 0, 0, 3),
(108, 'CSS的全称是什么？', '', 'Hypertext markup learning', 'Hypertext madeline language', 'Hypertext markup language', 'Hyperlink markup language', 'C', 0, 0, 'jane doe', '2015-06-15 10:33:30', 0, 0, 2),
(109, 'HTML的全称是什么？', '', 'Hypertext markup learning', 'Hypertext madeline language', 'Hypertext markup language', 'Hyperlink markup language', 'C', 0, 0, 'jane doe', '2015-06-15 10:41:01', 0, 0, 1),
(110, 'CSS的作用', '', '美化页面', '页面交互', 'ajax', '后台数据', 'A', 0, 0, 'jane doe', '2015-06-15 11:19:41', 0, 0, 2),
(111, 'jQuery之父是谁？', '', 'tom', 'peter', 'mary', 'John Resig', 'D', 0, 0, 'jane doe', '2015-06-15 11:34:43', 0, 0, 4);

-- --------------------------------------------------------

--
-- 表的结构 `veling_exam_judge`
--

CREATE TABLE IF NOT EXISTS `veling_exam_judge` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `answer` int(10) DEFAULT NULL,
  `easycount` int(20) unsigned NOT NULL DEFAULT '0',
  `heardcount` int(20) unsigned NOT NULL DEFAULT '0',
  `operater` varchar(20) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `rank` int(20) unsigned NOT NULL DEFAULT '0',
  `typeid` int(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `veling_exam_judge`
--

INSERT INTO `veling_exam_judge` (`id`, `question`, `pic`, `answer`, `easycount`, `heardcount`, `operater`, `addtime`, `rank`, `typeid`) VALUES
(1, '扑救易散发腐蚀性蒸气或有毒气体的火灾时，扑救人员应穿戴防毒面具和相应的防护用品，站在上风处施救。', '', 1, 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0),
(2, '该跑吗', '', 0, 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0),
(3, '应该吃早餐吗', '', 1, 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0),
(4, '下雨吗', '', 1, 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0),
(5, '努力吗？', '', 0, 0, 0, 'veling.cn', '2009-01-21 00:00:00', 0, 0),
(6, '可以上去吗？', '', 1, 0, 0, 'jane doe', '2015-06-12 14:21:37', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `vote`
--

INSERT INTO `vote` (`id`, `title`, `description`, `amount`, `state`, `pid`, `date`) VALUES
(3, '最主流的购物网站', 'b2b,b2c,c2c', 0, 1, 0, '2014-09-16 18:07:00'),
(10, 'Zend Framework', 'v1,v2', 3, 1, 4, '2014-09-18 10:02:17'),
(11, '易迅', '数码产品', 0, 1, 3, '2014-09-18 10:03:48'),
(12, '万表网', 'www.wanbiao.com', 1, 1, 3, '2014-09-18 10:05:26'),
(22, '丁春秋2', '丁春秋2', 150005, 1, 21, '2014-09-18 11:03:11'),
(23, '柯镇恶', '柯镇恶', 5, 1, 21, '2014-09-18 11:03:30'),
(28, '王重阳', '王重阳', 57, 1, 21, '2014-09-18 15:07:02'),
(29, '周伯通', '周伯通', 1206, 1, 21, '2014-09-18 15:07:13'),
(33, 'K_Frame', 'ddd', 0, 1, 4, '2014-09-23 15:28:45'),
(34, '京东商城', '京东商城', 0, 1, 3, '2014-10-09 11:40:57'),
(35, '天猫商城', '天猫商城', 0, 1, 3, '2014-10-09 11:41:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
