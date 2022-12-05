/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : iot

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 06/12/2022 01:54:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sensor_tinggi
-- ----------------------------
DROP TABLE IF EXISTS `sensor_tinggi`;
CREATE TABLE `sensor_tinggi`  (
  `data` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sensor_tinggi
-- ----------------------------
INSERT INTO `sensor_tinggi` VALUES (6, '2022-12-15');
INSERT INTO `sensor_tinggi` VALUES (5, '2022-12-16');
INSERT INTO `sensor_tinggi` VALUES (2, '2022-12-17');
INSERT INTO `sensor_tinggi` VALUES (7, '2022-12-18');
INSERT INTO `sensor_tinggi` VALUES (8, '2022-12-19');
INSERT INTO `sensor_tinggi` VALUES (1, '2022-12-20');
INSERT INTO `sensor_tinggi` VALUES (2, '2022-12-21');
INSERT INTO `sensor_tinggi` VALUES (2, '2022-12-22');
INSERT INTO `sensor_tinggi` VALUES (6, '2022-12-23');
INSERT INTO `sensor_tinggi` VALUES (8, '2022-12-24');
INSERT INTO `sensor_tinggi` VALUES (1, '2022-12-25');
INSERT INTO `sensor_tinggi` VALUES (3, '2022-12-26');
INSERT INTO `sensor_tinggi` VALUES (9, '2022-12-27');
INSERT INTO `sensor_tinggi` VALUES (2, '2022-12-28');

-- ----------------------------
-- Table structure for tinggi
-- ----------------------------
DROP TABLE IF EXISTS `tinggi`;
CREATE TABLE `tinggi`  (
  `id` enum('1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data1` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal1` date NULL DEFAULT NULL,
  `data2` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal2` date NULL DEFAULT NULL,
  `data3` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal3` date NULL DEFAULT NULL,
  `data4` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal4` date NULL DEFAULT NULL,
  `data5` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal5` date NULL DEFAULT NULL,
  `data6` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal6` date NULL DEFAULT NULL,
  `data7` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal7` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tinggi
-- ----------------------------
INSERT INTO `tinggi` VALUES ('1', '3', '2022-12-22', '2', '2022-12-23', '1', '2022-12-24', '7', '2022-12-25', '5', '2022-12-26', '4', '2022-12-27', '3', '2022-12-28');

-- ----------------------------
-- Table structure for tinggi2
-- ----------------------------
DROP TABLE IF EXISTS `tinggi2`;
CREATE TABLE `tinggi2`  (
  `data_history` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_history` date NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tinggi2
-- ----------------------------
INSERT INTO `tinggi2` VALUES ('1', '2022-12-15');
INSERT INTO `tinggi2` VALUES ('2', '2022-12-16');
INSERT INTO `tinggi2` VALUES ('3', '2022-12-17');
INSERT INTO `tinggi2` VALUES ('4', '2022-12-18');
INSERT INTO `tinggi2` VALUES ('5', '2022-12-19');
INSERT INTO `tinggi2` VALUES ('6', '2022-12-20');
INSERT INTO `tinggi2` VALUES ('7', '2022-12-21');
INSERT INTO `tinggi2` VALUES ('3', '2022-12-22');
INSERT INTO `tinggi2` VALUES ('2', '2022-12-23');
INSERT INTO `tinggi2` VALUES ('1', '2022-12-24');
INSERT INTO `tinggi2` VALUES ('7', '2022-12-25');
INSERT INTO `tinggi2` VALUES ('5', '2022-12-26');
INSERT INTO `tinggi2` VALUES ('4', '2022-12-27');
INSERT INTO `tinggi2` VALUES ('3', '2022-12-28');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('a', '0cc175b9c0f1b6a831c399e269772661');
INSERT INTO `user` VALUES ('b', '92eb5ffee6ae2fec3ad71c777531578f');
INSERT INTO `user` VALUES ('c', '4a8a08f09d37b73795649038408b5f33');

SET FOREIGN_KEY_CHECKS = 1;
