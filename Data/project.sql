/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-11-03 16:26:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `classify`
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES ('1', '通讯数码');
INSERT INTO `classify` VALUES ('2', '家居生活');
INSERT INTO `classify` VALUES ('3', '智能穿戴');
INSERT INTO `classify` VALUES ('4', '影音娱乐');
INSERT INTO `classify` VALUES ('5', '出行定位');
INSERT INTO `classify` VALUES ('6', '办公相关');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `intro` varchar(200) NOT NULL,
  `cover_img` varchar(300) NOT NULL,
  `top_img` varchar(300) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `update_time` varchar(30) NOT NULL,
  `uid` int(3) NOT NULL,
  `dintro` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('9', '2', '1; 2;', '这是一个项目', '/Uploads/pro/cover/20151103/5638233903a81.jpg', '/Uploads/pro/top/20151103/563823434efee.jpg', 'http://', '0', '我的项目额额', '1446519627', '1', '              关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。              ');

-- ----------------------------
-- Table structure for `stall`
-- ----------------------------
DROP TABLE IF EXISTS `stall`;
CREATE TABLE `stall` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(10) NOT NULL,
  `intro` varchar(200) NOT NULL,
  `img` varchar(300) NOT NULL,
  `is_limit` tinyint(1) NOT NULL DEFAULT '0',
  `email_type` tinyint(1) NOT NULL DEFAULT '0',
  `is_email` tinyint(1) NOT NULL DEFAULT '0',
  `re_time` int(3) NOT NULL,
  `uid` int(3) NOT NULL,
  `to_limit` tinyint(1) NOT NULL DEFAULT '0',
  `limit_num` int(3) NOT NULL,
  `limit_user` int(3) NOT NULL,
  `update_time` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stall
-- ----------------------------
INSERT INTO `stall` VALUES ('9', '1', '123213123', '/Uploads/pro/stall/20151103/56385b4a8067f.jpg', '1', '0', '0', '31233', '1', '0', '123', '0', '1446533968', '1');
INSERT INTO `stall` VALUES ('10', '21414', '124124124', '/Uploads/pro/stall/20151103/56385c6920110.jpg', '1', '1', '1', '1', '1', '1', '1', '1', '1446534259', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` varchar(30) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'user1', 'e10adc3949ba59abbe56e057f20f883e', '1446516176', '127.0.0.1');
