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

 Date: 07/12/2022 00:17:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ph
-- ----------------------------
DROP TABLE IF EXISTS `ph`;
CREATE TABLE `ph`  (
  `data` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ph
-- ----------------------------
INSERT INTO `ph` VALUES ('2', '2022-12-06');
INSERT INTO `ph` VALUES ('8', '2022-12-28');

-- ----------------------------
-- Table structure for sensor_ph
-- ----------------------------
DROP TABLE IF EXISTS `sensor_ph`;
CREATE TABLE `sensor_ph`  (
  `data_sensor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_sensor` date NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sensor_ph
-- ----------------------------
INSERT INTO `sensor_ph` VALUES ('3', '2022-12-06');
INSERT INTO `sensor_ph` VALUES ('8', '2022-12-28');

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
INSERT INTO `sensor_tinggi` VALUES (25, '2022-12-01');
INSERT INTO `sensor_tinggi` VALUES (30, '2022-12-02');
INSERT INTO `sensor_tinggi` VALUES (35, '2022-12-03');
INSERT INTO `sensor_tinggi` VALUES (40, '2022-12-04');
INSERT INTO `sensor_tinggi` VALUES (32, '2022-12-05');
INSERT INTO `sensor_tinggi` VALUES (49, '2022-12-06');
INSERT INTO `sensor_tinggi` VALUES (51, '2022-12-07');
INSERT INTO `sensor_tinggi` VALUES (40, '2022-12-08');
INSERT INTO `sensor_tinggi` VALUES (37, '2022-12-09');
INSERT INTO `sensor_tinggi` VALUES (42, '2022-12-10');
INSERT INTO `sensor_tinggi` VALUES (55, '2022-12-11');
INSERT INTO `sensor_tinggi` VALUES (28, '2022-12-12');
INSERT INTO `sensor_tinggi` VALUES (49, '2022-12-13');
INSERT INTO `sensor_tinggi` VALUES (55, '2022-12-14');

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
INSERT INTO `tinggi` VALUES ('1', '30', '2022-12-08', '39', '2022-12-09', '40', '2022-12-10', '25', '2022-12-11', '45', '2022-12-12', '47', '2022-12-13', '55', '2022-12-14');

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
INSERT INTO `tinggi2` VALUES ('21', '2022-12-01');
INSERT INTO `tinggi2` VALUES ('25', '2022-12-02');
INSERT INTO `tinggi2` VALUES ('30', '2022-12-03');
INSERT INTO `tinggi2` VALUES ('34', '2022-12-04');
INSERT INTO `tinggi2` VALUES ('41', '2022-12-05');
INSERT INTO `tinggi2` VALUES ('45', '2022-12-06');
INSERT INTO `tinggi2` VALUES ('50', '2022-12-07');
INSERT INTO `tinggi2` VALUES ('30', '2022-12-08');
INSERT INTO `tinggi2` VALUES ('39', '2022-12-09');
INSERT INTO `tinggi2` VALUES ('40', '2022-12-10');
INSERT INTO `tinggi2` VALUES ('25', '2022-12-11');
INSERT INTO `tinggi2` VALUES ('45', '2022-12-12');
INSERT INTO `tinggi2` VALUES ('47', '2022-12-13');
INSERT INTO `tinggi2` VALUES ('55', '2022-12-14');

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
