/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80011
 Source Host           : localhost:3306
 Source Schema         : net

 Target Server Type    : MySQL
 Target Server Version : 80011
 File Encoding         : 65001

 Date: 29/07/2020 23:46:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for container
-- ----------------------------
DROP TABLE IF EXISTS `container`;
CREATE TABLE `container` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `container_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `need_create` varchar(255) DEFAULT NULL,
  `need_commit` varchar(255) DEFAULT NULL,
  `port` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for homework_student
-- ----------------------------
DROP TABLE IF EXISTS `homework_student`;
CREATE TABLE `homework_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `statu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of homework_student
-- ----------------------------
BEGIN;
INSERT INTO `homework_student` VALUES (6, 12, 1, '待完成');
INSERT INTO `homework_student` VALUES (7, 12, 3, '待完成');
INSERT INTO `homework_student` VALUES (8, 12, 5, '待完成');
COMMIT;

-- ----------------------------
-- Table structure for homework_teacher
-- ----------------------------
DROP TABLE IF EXISTS `homework_teacher`;
CREATE TABLE `homework_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of homework_teacher
-- ----------------------------
BEGIN;
INSERT INTO `homework_teacher` VALUES (1, '测试exp1', '描述12', 14, -1, '2020-07-29 10:44:17', '2020-07-30 10:44:19');
INSERT INTO `homework_teacher` VALUES (3, '测试exp2', '描述2', 14, -1, '2020-07-28 10:44:25', '2020-07-31 10:44:27');
INSERT INTO `homework_teacher` VALUES (5, '测试exp3', 'ceshi3', 14, -1, '2020-07-29 11:42:58', '2020-07-30 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for port
-- ----------------------------
DROP TABLE IF EXISTS `port`;
CREATE TABLE `port` (
  `port` int(255) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of port
-- ----------------------------
BEGIN;
INSERT INTO `port` VALUES (1000, '0');
INSERT INTO `port` VALUES (1001, '0');
INSERT INTO `port` VALUES (1002, '0');
INSERT INTO `port` VALUES (1003, '0');
INSERT INTO `port` VALUES (1004, '0');
INSERT INTO `port` VALUES (1005, '0');
INSERT INTO `port` VALUES (1006, '0');
INSERT INTO `port` VALUES (1007, '0');
INSERT INTO `port` VALUES (1008, '0');
INSERT INTO `port` VALUES (1009, '0');
INSERT INTO `port` VALUES (1010, '0');
INSERT INTO `port` VALUES (1011, '0');
INSERT INTO `port` VALUES (1012, '0');
INSERT INTO `port` VALUES (1013, '0');
INSERT INTO `port` VALUES (1014, '0');
INSERT INTO `port` VALUES (1015, '0');
INSERT INTO `port` VALUES (1016, '0');
INSERT INTO `port` VALUES (1017, '0');
INSERT INTO `port` VALUES (1018, '0');
INSERT INTO `port` VALUES (1019, '0');
INSERT INTO `port` VALUES (1020, '0');
INSERT INTO `port` VALUES (1021, '0');
INSERT INTO `port` VALUES (1022, '0');
INSERT INTO `port` VALUES (1023, '0');
INSERT INTO `port` VALUES (1024, '0');
INSERT INTO `port` VALUES (1025, '0');
INSERT INTO `port` VALUES (1026, '0');
INSERT INTO `port` VALUES (1027, '0');
INSERT INTO `port` VALUES (1028, '0');
INSERT INTO `port` VALUES (1029, '0');
INSERT INTO `port` VALUES (1030, '0');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (12, 'stu', '63ee451939ed580ef3c4b6f0109d1fd0', 14, '2020-07-25 16:05:59', 'student');
INSERT INTO `user` VALUES (14, 'tea', '63ee451939ed580ef3c4b6f0109d1fd0', -1, '2020-07-27 17:38:40', 'teacher');
INSERT INTO `user` VALUES (15, 'tea2', '63ee451939ed580ef3c4b6f0109d1fd0', -1, '2020-07-29 10:31:16', 'teacher');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
