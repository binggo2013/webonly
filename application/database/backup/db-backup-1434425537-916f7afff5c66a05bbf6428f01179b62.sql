DROP TABLE ad;

CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO ad VALUES("12","?banner2222","http://www.baidu.com","20141112112154977.jpg","???","2","1","2014-09-11 11:41:43");
INSERT INTO ad VALUES("14","slider?????","slider?????","20141112112120198.jpg","slider?????","3","1","2014-09-11 11:42:15");
INSERT INTO ad VALUES("15","sidebar","ad ","20141205194248660.gif","asd ","4","1","2014-09-11 11:42:30");
INSERT INTO ad VALUES("17","????","??????","20141112112040599.jpg","","3","1","2014-09-11 13:16:49");
INSERT INTO ad VALUES("18","???","http://www.baidu.com","20141112112003308.jpg","?????????","3","1","2014-09-11 13:17:04");
INSERT INTO ad VALUES("19","??slider","http://www.baidu.comDD","20141112111939804.jpg","??slider??slider","3","1","2014-09-16 14:51:24");
INSERT INTO ad VALUES("21","new fullcolumn ad","http://www.baidu.com","20141112112235363.jpg","new fullcolumn adnew fullcolumn adnew fullcolumn ad","1","1","2014-09-16 16:32:40");



DROP TABLE admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `last_ip` varchar(250) NOT NULL,
  `last_time` datetime NOT NULL,
  `login_num` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `reg_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO admin VALUES("10","admin","21232f297a57a5a743894a0e4a801fc3","127.0.0.1","2015-06-16 11:32:12","2","3","2015-06-16 11:32:02");



DROP TABLE article;

CREATE TABLE `article` (
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;




DROP TABLE comment;

CREATE TABLE `comment` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO comment VALUES("1","1","3","only<i class=\"caret\"></i>","0","hello\n","","0","0","2014-11-16 07:11:36");
INSERT INTO comment VALUES("2","1","3","only","0","dd","default.jpg","0","0","2014-11-16 07:11:58");
INSERT INTO comment VALUES("3","1","3","only","0","hello","default.jpg","0","0","2014-11-16 07:12:31");
INSERT INTO comment VALUES("4","1","3","only","0","hello","default.jpg","0","0","2014-11-16 07:12:32");
INSERT INTO comment VALUES("5","1","3","only","0","hello","default.jpg","0","0","2014-11-16 07:12:33");
INSERT INTO comment VALUES("6","1","3","only","0","hello","default.jpg","0","0","2014-11-16 07:12:34");
INSERT INTO comment VALUES("7","1","3","only","0","hello","default.jpg","0","0","2014-11-16 07:12:34");
INSERT INTO comment VALUES("8","1","3","only<i class=\"caret\"></i>","0","ddd","","0","0","2014-11-16 21:10:27");
INSERT INTO comment VALUES("9","1","3","only<i class=\"caret\"></i>","0","3","","0","0","2014-12-02 22:43:18");
INSERT INTO comment VALUES("10","1","3","only","0","d","20141116071219947.jpg","0","0","2014-12-02 22:43:29");
INSERT INTO comment VALUES("11","1","3","only<i class=\"caret\"></i>","0","ddd","20141116071219947.jpg","0","0","2014-12-02 22:45:18");
INSERT INTO comment VALUES("12","1","3","only<i class=\"caret\"></i>","0","ddd333","20141116071219947.jpg","0","0","2014-12-02 22:45:24");



DROP TABLE course;

CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `permission` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO course VALUES("1","HTML","??????","2","2014-10-14 11:48:48");
INSERT INTO course VALUES("2","CSS","????????????????????","10,8,7,4,2","2014-10-14 11:49:51");
INSERT INTO course VALUES("3","JavaScript","????????????????","13,12,11,10,9,8,7,4,3,2","2014-10-14 11:50:36");
INSERT INTO course VALUES("4","jQuery","????????????????","2","2014-10-14 13:12:48");
INSERT INTO course VALUES("5","Bootstrap","??demo","12","2014-10-16 10:13:47");



DROP TABLE entry;

CREATE TABLE `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO entry VALUES("3","????????","b2b,b2c,c2c","0","1","0","2014-09-16 18:07:00");
INSERT INTO entry VALUES("10","????","v1,v2","3","1","0","2014-09-18 10:02:17");
INSERT INTO entry VALUES("11","??","????","0","1","3","2014-09-18 10:03:48");
INSERT INTO entry VALUES("12","???","www.wanbiao.com","1","1","3","2014-09-18 10:05:26");
INSERT INTO entry VALUES("22","???2","???2","150005","1","10","2014-09-18 11:03:11");
INSERT INTO entry VALUES("23","???","???","5","1","10","2014-09-18 11:03:30");
INSERT INTO entry VALUES("28","???","???","57","1","10","2014-09-18 15:07:02");
INSERT INTO entry VALUES("29","???","???","1206","1","10","2014-09-18 15:07:13");
INSERT INTO entry VALUES("33","K_Frame","ddd","0","1","4","2014-09-23 15:28:45");
INSERT INTO entry VALUES("34","????","????","0","1","3","2014-10-09 11:40:57");
INSERT INTO entry VALUES("35","????","????","0","1","3","2014-10-09 11:41:16");



DROP TABLE examination;

CREATE TABLE `examination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(300) NOT NULL,
  `total` int(11) NOT NULL,
  `ticked` int(11) NOT NULL,
  `rightNum` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `createdTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO examination VALUES("1","demo","10","10","7","70","2015-06-12 14:04:11");
INSERT INTO examination VALUES("2","demo","12","0","0","0","2015-06-12 14:21:55");
INSERT INTO examination VALUES("3","demo","14","1","1","10","2015-06-15 10:33:45");
INSERT INTO examination VALUES("4","demo","8","2","2","20","2015-06-15 11:35:16");
INSERT INTO examination VALUES("5","demo","8","2","2","20","2015-06-15 11:35:33");
INSERT INTO examination VALUES("6","demo","8","7","5","50","2015-06-15 11:35:49");
INSERT INTO examination VALUES("7","demo","8","7","5","50","2015-06-15 11:36:12");
INSERT INTO examination VALUES("8","demo","7","1","0","0","2015-06-16 09:38:10");
INSERT INTO examination VALUES("9","demo","7","1","0","0","2015-06-16 09:38:20");
INSERT INTO examination VALUES("10","demo","7","1","1","10","2015-06-16 09:38:28");
INSERT INTO examination VALUES("11","demo","7","1","1","10","2015-06-16 10:36:24");



DROP TABLE level;

CREATE TABLE `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `permission` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO level VALUES("1","?????","??????","2","2014-10-14 11:48:48");
INSERT INTO level VALUES("2","?????","????????????????????","10,8,7,4,2","2014-10-14 11:49:51");
INSERT INTO level VALUES("3","?????","????????????????","13,12,11,10,9,8,7,4,3,2","2014-10-14 11:50:36");
INSERT INTO level VALUES("4","??","????????????????","2","2014-10-14 13:12:48");
INSERT INTO level VALUES("5","??demo","??demo","12","2014-10-16 10:13:47");



DROP TABLE nav;

CREATE TABLE `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `state` tinyint(1) NOT NULL,
  `picked` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO nav VALUES("1","????","????","1","1","0","5","2014-09-25 09:40:52");
INSERT INTO nav VALUES("35","html","html","1","1","1","6","2014-09-25 15:02:46");
INSERT INTO nav VALUES("36","CSS","CSS","1","1","1","1","2014-09-25 15:03:25");
INSERT INTO nav VALUES("39","PHP??","PHP??","1","1","0","49","2014-09-25 15:15:27");
INSERT INTO nav VALUES("40","PHP????","PHP????","1","1","39","40","2014-09-25 15:29:45");
INSERT INTO nav VALUES("41","PHP????","PHP????","1","1","39","41","2014-09-25 15:29:52");
INSERT INTO nav VALUES("42","jQuery","jQuery","1","1","1","1","2014-09-25 15:49:53");
INSERT INTO nav VALUES("43","JavaScript","JavaScript","1","1","1","1","2014-09-25 15:50:08");
INSERT INTO nav VALUES("44","Smarty","Smarty","1","1","39","44","2014-09-25 15:51:17");
INSERT INTO nav VALUES("45","????","????","1","1","0","45","2014-10-09 09:17:38");
INSERT INTO nav VALUES("46","????","????","1","1","0","46","2014-10-09 09:17:54");
INSERT INTO nav VALUES("47","??","??","1","1","0","47","2014-10-09 09:18:09");
INSERT INTO nav VALUES("48","????","????","1","1","0","48","2014-10-09 09:18:33");
INSERT INTO nav VALUES("49","????","????","1","1","0","49","2014-10-09 09:18:55");



DROP TABLE order;

;




DROP TABLE permission;

CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO permission VALUES("2","????","????","2","2014-10-14 09:40:08");
INSERT INTO permission VALUES("3","????","???????","3","2014-10-14 09:41:23");
INSERT INTO permission VALUES("4","????","??banner????slider?????","4","2014-10-14 09:42:06");
INSERT INTO permission VALUES("7","????","????????","7","2014-10-14 11:05:24");
INSERT INTO permission VALUES("8","????","????","8","2014-10-14 11:06:08");
INSERT INTO permission VALUES("9","????","????","9","2014-10-14 11:06:23");
INSERT INTO permission VALUES("10","????","????","10","2014-10-14 11:06:32");
INSERT INTO permission VALUES("11","?????","?????","11","2014-10-14 11:06:45");
INSERT INTO permission VALUES("12","??demo","??demo","12","2014-10-16 10:13:19");
INSERT INTO permission VALUES("13","????","?????????????","13","2014-10-23 10:06:22");



DROP TABLE products;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `pix` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `addTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

INSERT INTO products VALUES("41","d","5","6","10","20140809225820649.jpg","d","2014-07-28 16:08:40");
INSERT INTO products VALUES("43","4","4","0","4","20140809225805498.jpg","444","2014-07-28 16:11:49");



DROP TABLE user;

CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO user VALUES("52","only","e10adc3949ba59abbe56e057f20f883e","","20141116071219947.jpg","19","127.0.0.1","2014-12-02 22:45:12","2014-11-12 09:53:50","1");



DROP TABLE veling_exam_choice;

CREATE TABLE `veling_exam_choice` (
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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

INSERT INTO veling_exam_choice VALUES("1","r u ok?CSS","","ok","no","not ok","not no","A","0","0","veling","2015-06-10 14:06:56","0","0","2");
INSERT INTO veling_exam_choice VALUES("2","????????????_____?HTML","","??","????","???????","????","A","0","0","veling.cn","2009-01-21 00:00:00","0","0","1");
INSERT INTO veling_exam_choice VALUES("3","????????????_____?HTML","","??","????","???????","????","A","0","0","veling.cn","2009-01-21 00:00:00","0","0","1");
INSERT INTO veling_exam_choice VALUES("104","asdasdHTML","","tom","b","c","ASDF","A","0","0","jane doe","2015-06-11 15:00:22","0","0","1");
INSERT INTO veling_exam_choice VALUES("105","??????","","??","??","??","????","A","0","0","jane doe","2015-06-11 15:01:35","0","0","5");
INSERT INTO veling_exam_choice VALUES("106","??????","","?","?","?","?","B","0","0","jane doe","2015-06-12 14:07:41","0","0","4");
INSERT INTO veling_exam_choice VALUES("107","HTML???????","","tom","peter","mary","mike","A","0","0","jane doe","2015-06-15 10:26:49","0","0","3");
INSERT INTO veling_exam_choice VALUES("108","CSS???????","","Hypertext markup learning","Hypertext madeline language","Hypertext markup language","Hyperlink markup language","C","0","0","jane doe","2015-06-15 10:33:30","0","0","2");
INSERT INTO veling_exam_choice VALUES("109","HTML???????","","Hypertext markup learning","Hypertext madeline language","Hypertext markup language","Hyperlink markup language","C","0","0","jane doe","2015-06-15 10:41:01","0","0","1");
INSERT INTO veling_exam_choice VALUES("110","CSS???","","????","????","ajax","????","A","0","0","jane doe","2015-06-15 11:19:41","0","0","2");
INSERT INTO veling_exam_choice VALUES("111","jQuery?????","","tom","peter","mary","John Resig","D","0","0","jane doe","2015-06-15 11:34:43","0","0","4");



DROP TABLE veling_exam_judge;

CREATE TABLE `veling_exam_judge` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO veling_exam_judge VALUES("1","????????????????????????????????????????????????","","1","0","0","veling.cn","2009-01-21 00:00:00","0","0");
INSERT INTO veling_exam_judge VALUES("2","???","","0","0","0","veling.cn","2009-01-21 00:00:00","0","0");
INSERT INTO veling_exam_judge VALUES("3","??????","","1","0","0","veling.cn","2009-01-21 00:00:00","0","0");
INSERT INTO veling_exam_judge VALUES("4","???","","1","0","0","veling.cn","2009-01-21 00:00:00","0","0");
INSERT INTO veling_exam_judge VALUES("5","????","","0","0","0","veling.cn","2009-01-21 00:00:00","0","0");
INSERT INTO veling_exam_judge VALUES("6","??????","","1","0","0","jane doe","2015-06-12 14:21:37","0","0");



DROP TABLE vote;

CREATE TABLE `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO vote VALUES("3","????????","b2b,b2c,c2c","0","1","0","2014-09-16 18:07:00");
INSERT INTO vote VALUES("10","Zend Framework","v1,v2","3","1","4","2014-09-18 10:02:17");
INSERT INTO vote VALUES("11","??","????","0","1","3","2014-09-18 10:03:48");
INSERT INTO vote VALUES("12","???","www.wanbiao.com","1","1","3","2014-09-18 10:05:26");
INSERT INTO vote VALUES("22","???2","???2","150005","1","21","2014-09-18 11:03:11");
INSERT INTO vote VALUES("23","???","???","5","1","21","2014-09-18 11:03:30");
INSERT INTO vote VALUES("28","???","???","57","1","21","2014-09-18 15:07:02");
INSERT INTO vote VALUES("29","???","???","1206","1","21","2014-09-18 15:07:13");
INSERT INTO vote VALUES("33","K_Frame","ddd","0","1","4","2014-09-23 15:28:45");
INSERT INTO vote VALUES("34","????","????","0","1","3","2014-10-09 11:40:57");
INSERT INTO vote VALUES("35","????","????","0","1","3","2014-10-09 11:41:16");



