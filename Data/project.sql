/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-11-03 17:45:51
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('9', '2', '1; 2;', '这是一个项目', '/Uploads/pro/cover/20151103/5638233903a81.jpg', '/Uploads/pro/top/20151103/563823434efee.jpg', 'http://', '0', '我的项目额额', '1446519627', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('10', '1', '', '4124', '/Uploads/pro/cover/20151103/56387628e0364.jpg', '', '14144', '0', '123', '1446540845', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('11', '1', '3; 2;', '213213123', '/Uploads/pro/cover/20151103/563878983892a.jpg', '123123', '123123', '0', '21312', '1446541467', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('12', '1', '3; 2;', '213213123', '/Uploads/pro/cover/20151103/563878983892a.jpg', '123123', '123123', '0', '21312', '1446541467', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('13', '1', '3; 2;', '213213123', '/Uploads/pro/cover/20151103/563878983892a.jpg', '123123', '123123', '0', '21312', '1446541473', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('14', '1', '3; 2;', '213213123', '/Uploads/pro/cover/20151103/563878983892a.jpg', '123123', '123123', '0', '21312', '1446541473', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('15', '5', '123213;', '213213321', '/Uploads/pro/cover/20151103/56387939b14bb.jpg', '/Uploads/pro/top/20151103/56387941177a2.jpg', '3123', '0', '3213123', '1446541635', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('16', '5', '123213;', '213213321', '/Uploads/pro/cover/20151103/56387939b14bb.jpg', '/Uploads/pro/top/20151103/56387941177a2.jpg', '3123', '0', '3213123', '1446541635', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('17', '5', '123213;', '21421412', '', '', '312313', '0', '321321', '1446541677', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('18', '5', '123213;', '21421412', '', '', '312313', '0', '321321', '1446541677', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('19', '5', '123213;', '21421412', '213213', '123213', '312313', '0', '321321', '1446541680', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('20', '5', '123213;', '21421412', '213213', '123213', '312313', '0', '321321', '1446541680', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('21', '5', '123213;', '21421412', '213213', '123213', '312313', '0', '321321', '1446541680', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('22', '5', '123213;', '21421412', '213213', '123213', '312313', '0', '321321', '1446541680', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('23', '5', '123213;', '21421412', '213213', '123213', '312313', '0', '321321', '1446541681', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('24', '5', '123213;', '21421412', '213213', '123213', '312313', '0', '321321', '1446541681', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('25', '5', '123213;', '21421412', '213213312', '123213', '312313', '0', '321321', '1446541688', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('26', '5', '123213;', '21421412', '213213312', '123213', '312313', '0', '321321', '1446541688', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('27', '5', '123213;', '21421412', '213213312', '123213', '312313', '0', '321321', '1446541696', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('28', '5', '123213;', '21421412', '213213312', '123213', '312313', '0', '321321', '1446541696', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('29', '6', '', '21331', '23113', '123123', '21313', '0', '21321', '1446541819', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('30', '6', '', '21331', '23113', '123123', '21313', '0', '21321', '1446541819', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('31', '1', '', '213213', '/Uploads/pro/cover/20151103/56387b6559c6d.jpg', '31231', '3213123', '0', '213213', '1446542188', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('32', '1', '', '213213', '/Uploads/pro/cover/20151103/56387b6559c6d.jpg', '31231', '3213123', '0', '213213', '1446542188', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');
INSERT INTO `project` VALUES ('33', '6', '', '3123', '213213', '312321', '3113123', '0', '321312', '1446542314', '1', '                    关于我 向支持者介绍一下你自己，以及你与所发起的项目之间的背景。这样有助于拉近你与支持者之间的距离。建议不超过100字。 我想要做什么 以视频、图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。 项目的进展和风险 让大家更好的了解项目的进度，增加对项目的信任度，以及在支持者选择支持前就了解和认同项目在执行过程中所存在的风险 为什么需要你的支持 这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。 我的承诺与回报 让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你erew。                    ');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stall
-- ----------------------------
INSERT INTO `stall` VALUES ('11', '213213', '213213', '/Uploads/pro/stall/20151103/56387ff9dc591.jpg', '0', '0', '0', '3213', '1', '0', '0', '0', '1446543361', '1');

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