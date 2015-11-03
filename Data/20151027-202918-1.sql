-- -----------------------------
-- Think MySQL Data Transfer 
-- 
-- Host     : 127.0.0.1
-- Port     : 3306
-- Database : shop
-- 
-- Part : #1
-- Date : 2015-10-27 20:29:18
-- -----------------------------

SET FOREIGN_KEY_CHECKS = 0;


-- -----------------------------
-- Table structure for `shop_admin`
-- -----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `shop_admin`
-- -----------------------------
INSERT INTO `shop_admin` VALUES ('1', '1', 'admin', '202cb962ac59075b964b07152d234b70');

-- -----------------------------
-- Table structure for `shop_admin_auth`
-- -----------------------------
DROP TABLE IF EXISTS `shop_admin_auth`;
CREATE TABLE `shop_admin_auth` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rules` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `shop_admin_auth`
-- -----------------------------
INSERT INTO `shop_admin_auth` VALUES ('1', '超级管理员', '1', '1,2,3,4,5,6,7,8');
INSERT INTO `shop_admin_auth` VALUES ('2', '普通管理员', '1', '');

-- -----------------------------
-- Table structure for `shop_node`
-- -----------------------------
DROP TABLE IF EXISTS `shop_node`;
CREATE TABLE `shop_node` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(3) NOT NULL,
  `node_name` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL DEFAULT 'Admin',
  `controller` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `sort` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `shop_node`
-- -----------------------------
INSERT INTO `shop_node` VALUES ('1', '0', '后台设置', 'Admin', 'Index', 'index', '0');
INSERT INTO `shop_node` VALUES ('2', '0', '会员管理', 'Admin', 'Admin', 'index', '0');
INSERT INTO `shop_node` VALUES ('3', '1', '后台首页', 'Admin', 'Index', 'home', '0');
INSERT INTO `shop_node` VALUES ('4', '1', '站点设置', 'Admin', 'Site', 'index', '0');
INSERT INTO `shop_node` VALUES ('5', '1', '节点管理', 'Admin', 'Node', 'lists', '0');
INSERT INTO `shop_node` VALUES ('6', '1', '管理权限', 'Admin', 'AdminAuth', 'lists', '0');
INSERT INTO `shop_node` VALUES ('7', '1', '管理员列表', 'Admin', 'Admin', 'lists', '0');
INSERT INTO `shop_node` VALUES ('8', '2', '会员列表', 'Admin', 'User', 'lists', '0');
INSERT INTO `shop_node` VALUES ('9', '2', '会员组', 'Admin', 'UserGroup', 'lists', '0');
INSERT INTO `shop_node` VALUES ('15', '0', '数据管理', 'Admin', 'Data', 'index', '0');
INSERT INTO `shop_node` VALUES ('14', '2', '添加会员', 'Admin', 'User', 'add', '0');
INSERT INTO `shop_node` VALUES ('16', '15', '数据备份', 'Admin', 'Data', 'backup', '0');

-- -----------------------------
-- Table structure for `shop_user`
-- -----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `id` int(3) NOT NULL,
  `group_id` tinyint(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `truename` varchar(20) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `image` varchar(300) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `points` int(10) DEFAULT NULL,
  `exp` int(10) DEFAULT NULL,
  `money` decimal(15,0) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------
-- Table structure for `shop_user_group`
-- -----------------------------
DROP TABLE IF EXISTS `shop_user_group`;
CREATE TABLE `shop_user_group` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `min_points` int(10) NOT NULL,
  `max_points` int(10) NOT NULL,
  `discount` int(3) NOT NULL,
  `sort` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `shop_user_group`
-- -----------------------------
INSERT INTO `shop_user_group` VALUES ('4', '注册会员', '1', '0', '1000', '90', '0');
