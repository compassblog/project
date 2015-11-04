/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-11-04 16:05:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cart`
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `cart_name` varchar(20) NOT NULL,
  `cart_price` decimal(5,0) NOT NULL,
  `cart_img` varchar(300) NOT NULL,
  `cart_status` tinyint(1) NOT NULL DEFAULT '0',
  `uid` int(3) NOT NULL,
  `sid` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('29', '我的项目', '50', '/Uploads/pro/stall/20151104/5639bb365178e.jpg', '1', '1', '17');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('34', '6', '你; 我; 他;', '我的项目', '/Uploads/pro/cover/20151104/563955341e4d7.jpg', '/Uploads/pro/top/20151104/5639553b3ea39.jpg', 'http://', '0', '我的项目', '1446597956', '1', '            \r\n                                       关于我\r\n\r\n向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。\r\n\r\n我想要做什么\r\n\r\n以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。\r\n\r\n项目的进展和风险\r\n\r\n让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险\r\n\r\n为什么需要你的支持\r\n\r\n这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。\r\n\r\n我的承诺与回报\r\n\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。          ');

-- ----------------------------
-- Table structure for `stall`
-- ----------------------------
DROP TABLE IF EXISTS `stall`;
CREATE TABLE `stall` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,0) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stall
-- ----------------------------
INSERT INTO `stall` VALUES ('17', '50', '50一个档位', '/Uploads/pro/stall/20151104/5639bb365178e.jpg', '0', '0', '0', '3', '1', '0', '0', '0', '1446624061', '1');
INSERT INTO `stall` VALUES ('18', '10', '1元一个档位', '/Uploads/pro/stall/20151104/5639bb5aa718e.jpg', '1', '0', '0', '3', '1', '1', '30', '2', '1446624104', '1');

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
  `balance` decimal(5,0) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'user1', 'e10adc3949ba59abbe56e057f20f883e', '1446623161', '127.0.0.1', '50', '昆明市某某路');
