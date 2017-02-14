/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-10 17:34:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bbs_comment`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_comment`;
CREATE TABLE `bbs_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text,
  `create_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tiezi_id` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_comment
-- ----------------------------
INSERT INTO `bbs_comment` VALUES ('1', '回复内容', '1456970025', '5', '4', null);
INSERT INTO `bbs_comment` VALUES ('2', 'jidi', '1456970072', '6', '4', null);
INSERT INTO `bbs_comment` VALUES ('3', 'd', '1456976244', '7', '1', null);
INSERT INTO `bbs_comment` VALUES ('4', '回复2', '1456981071', '8', '4', '0');
INSERT INTO `bbs_comment` VALUES ('5', '嗯嗯', '1456984604', '9', '4', '0');
INSERT INTO `bbs_comment` VALUES ('6', '1', '1456984654', '10', '4', '5');
INSERT INTO `bbs_comment` VALUES ('7', '22', '1456985071', '8', '4', '6');
INSERT INTO `bbs_comment` VALUES ('8', '额', '1456986233', '12', '1', '0');
INSERT INTO `bbs_comment` VALUES ('9', '额', '1456986250', '12', '5', '0');
INSERT INTO `bbs_comment` VALUES ('10', 'c1', '1456986271', '13', '5', '9');
INSERT INTO `bbs_comment` VALUES ('11', 'eeeeee', '1456992051', '15', '6', '0');
INSERT INTO `bbs_comment` VALUES ('12', 'tttttt', '1456992068', '16', '6', '11');
INSERT INTO `bbs_comment` VALUES ('13', 'yyyyyy', '1456992084', '17', '6', '12');
INSERT INTO `bbs_comment` VALUES ('14', '我是回复service', '1456999252', '19', '7', '0');
INSERT INTO `bbs_comment` VALUES ('15', '我是回复service的第二层', '1456999281', '20', '7', '14');
INSERT INTO `bbs_comment` VALUES ('16', '22', '1457056813', '8', '8', '0');
INSERT INTO `bbs_comment` VALUES ('17', '33', '1457056821', '21', '8', '16');
INSERT INTO `bbs_comment` VALUES ('18', '12-11', '1457316969', '25', '12', '0');
INSERT INTO `bbs_comment` VALUES ('19', '14-11', '1457332958', '27', '14', '0');
INSERT INTO `bbs_comment` VALUES ('20', '19-11', '1457402929', '33', '19', '0');

-- ----------------------------
-- Table structure for `bbs_tiezi`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_tiezi`;
CREATE TABLE `bbs_tiezi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `content` text,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_tiezi
-- ----------------------------
INSERT INTO `bbs_tiezi` VALUES ('1', '1', 'aa', '1456900397');
INSERT INTO `bbs_tiezi` VALUES ('2', '2', 'bb', '1456900432');
INSERT INTO `bbs_tiezi` VALUES ('3', '3', 'ed', '1456902177');
INSERT INTO `bbs_tiezi` VALUES ('4', '4', 'e', '1456902208');
INSERT INTO `bbs_tiezi` VALUES ('5', '11', '啊', '1456986220');
INSERT INTO `bbs_tiezi` VALUES ('6', '14', 'wwwww', '1456992042');
INSERT INTO `bbs_tiezi` VALUES ('7', '18', '\nservice', '1456999218');
INSERT INTO `bbs_tiezi` VALUES ('8', '10', '11', '1457056808');
INSERT INTO `bbs_tiezi` VALUES ('9', '2', 'bb', '1457077413');
INSERT INTO `bbs_tiezi` VALUES ('10', '22', '9', '1457077422');
INSERT INTO `bbs_tiezi` VALUES ('11', '23', '11', '1457077430');
INSERT INTO `bbs_tiezi` VALUES ('12', '24', '12', '1457077440');
INSERT INTO `bbs_tiezi` VALUES ('13', '25', '12-11', '1457316866');
INSERT INTO `bbs_tiezi` VALUES ('14', '26', '14', '1457332947');
INSERT INTO `bbs_tiezi` VALUES ('15', '28', '15', '1457345706');
INSERT INTO `bbs_tiezi` VALUES ('16', '29', '哈哈', '1457401630');
INSERT INTO `bbs_tiezi` VALUES ('17', '30', '17', '1457401673');
INSERT INTO `bbs_tiezi` VALUES ('18', '31', '17-1', '1457402504');
INSERT INTO `bbs_tiezi` VALUES ('19', '32', '19', '1457402545');
INSERT INTO `bbs_tiezi` VALUES ('20', '34', '20-1', '1457513721');
INSERT INTO `bbs_tiezi` VALUES ('21', '35', '21-1', '1457513730');
INSERT INTO `bbs_tiezi` VALUES ('22', '36', '22', '1457514243');
INSERT INTO `bbs_tiezi` VALUES ('23', '37', '23', '1457514251');
INSERT INTO `bbs_tiezi` VALUES ('24', '38', '24', '1457514257');
INSERT INTO `bbs_tiezi` VALUES ('25', '39', '25', '1457514264');
INSERT INTO `bbs_tiezi` VALUES ('26', '40', '26', '1457514282');
INSERT INTO `bbs_tiezi` VALUES ('27', '41', '27', '1457514288');
INSERT INTO `bbs_tiezi` VALUES ('28', '42', '28', '1457514295');
INSERT INTO `bbs_tiezi` VALUES ('29', '43', '29', '1457514303');
INSERT INTO `bbs_tiezi` VALUES ('30', '44', '30', '1457514310');
INSERT INTO `bbs_tiezi` VALUES ('32', '45', '31', '1457602196');

-- ----------------------------
-- Table structure for `bbs_user`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_user`;
CREATE TABLE `bbs_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '''''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_user
-- ----------------------------
INSERT INTO `bbs_user` VALUES ('1', 'a');
INSERT INTO `bbs_user` VALUES ('2', 'b');
INSERT INTO `bbs_user` VALUES ('3', 'de');
INSERT INTO `bbs_user` VALUES ('4', 'e');
INSERT INTO `bbs_user` VALUES ('5', '回复作者');
INSERT INTO `bbs_user` VALUES ('6', '哦哦');
INSERT INTO `bbs_user` VALUES ('7', 'd');
INSERT INTO `bbs_user` VALUES ('8', '2');
INSERT INTO `bbs_user` VALUES ('9', '嗯嗯');
INSERT INTO `bbs_user` VALUES ('10', '1');
INSERT INTO `bbs_user` VALUES ('11', '啊');
INSERT INTO `bbs_user` VALUES ('12', '额');
INSERT INTO `bbs_user` VALUES ('13', 'c1');
INSERT INTO `bbs_user` VALUES ('14', 'ww');
INSERT INTO `bbs_user` VALUES ('15', 'eee');
INSERT INTO `bbs_user` VALUES ('16', 'ttt');
INSERT INTO `bbs_user` VALUES ('17', 'yyy');
INSERT INTO `bbs_user` VALUES ('18', 'author');
INSERT INTO `bbs_user` VALUES ('19', '作者1');
INSERT INTO `bbs_user` VALUES ('20', '啊啊');
INSERT INTO `bbs_user` VALUES ('21', '3');
INSERT INTO `bbs_user` VALUES ('22', '9');
INSERT INTO `bbs_user` VALUES ('23', '11');
INSERT INTO `bbs_user` VALUES ('24', '12');
INSERT INTO `bbs_user` VALUES ('25', '12-1');
INSERT INTO `bbs_user` VALUES ('26', '14');
INSERT INTO `bbs_user` VALUES ('27', '14-1');
INSERT INTO `bbs_user` VALUES ('28', '15');
INSERT INTO `bbs_user` VALUES ('29', '哈哈');
INSERT INTO `bbs_user` VALUES ('30', '17');
INSERT INTO `bbs_user` VALUES ('31', '17-1');
INSERT INTO `bbs_user` VALUES ('32', '19');
INSERT INTO `bbs_user` VALUES ('33', '19-1');
INSERT INTO `bbs_user` VALUES ('34', '20');
INSERT INTO `bbs_user` VALUES ('35', '21');
INSERT INTO `bbs_user` VALUES ('36', '22');
INSERT INTO `bbs_user` VALUES ('37', '23');
INSERT INTO `bbs_user` VALUES ('38', '24');
INSERT INTO `bbs_user` VALUES ('39', '25');
INSERT INTO `bbs_user` VALUES ('40', '26');
INSERT INTO `bbs_user` VALUES ('41', '27');
INSERT INTO `bbs_user` VALUES ('42', '28');
INSERT INTO `bbs_user` VALUES ('43', '29');
INSERT INTO `bbs_user` VALUES ('44', '30');
INSERT INTO `bbs_user` VALUES ('45', '31');
