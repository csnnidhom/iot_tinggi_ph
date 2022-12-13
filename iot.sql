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

 Date: 13/12/2022 18:59:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ph
-- ----------------------------
DROP TABLE IF EXISTS `ph`;
CREATE TABLE `ph`  (
  `data_input` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ph
-- ----------------------------
INSERT INTO `ph` VALUES ('2', '2022-11-01');
INSERT INTO `ph` VALUES ('99', '2022-12-13');

-- ----------------------------
-- Table structure for sensor_ph
-- ----------------------------
DROP TABLE IF EXISTS `sensor_ph`;
CREATE TABLE `sensor_ph`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` int NULL DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sensor_ph
-- ----------------------------
INSERT INTO `sensor_ph` VALUES (1, 97, '2022-11-01 22:01:24');
INSERT INTO `sensor_ph` VALUES (2, 70, '2022-12-13 16:50:03');

-- ----------------------------
-- Table structure for sensor_tinggi
-- ----------------------------
DROP TABLE IF EXISTS `sensor_tinggi`;
CREATE TABLE `sensor_tinggi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` int NULL DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sensor_tinggi
-- ----------------------------
INSERT INTO `sensor_tinggi` VALUES (1, 97, '2022-11-01 22:01:24');
INSERT INTO `sensor_tinggi` VALUES (2, 97, '2022-11-02 22:02:11');
INSERT INTO `sensor_tinggi` VALUES (3, 92, '2022-11-03 22:02:24');
INSERT INTO `sensor_tinggi` VALUES (4, 95, '2022-11-04 09:38:52');
INSERT INTO `sensor_tinggi` VALUES (5, 80, '2022-12-01 16:52:52');
INSERT INTO `sensor_tinggi` VALUES (6, 70, '2022-12-02 16:53:02');
INSERT INTO `sensor_tinggi` VALUES (7, 60, '2022-12-03 16:53:11');
INSERT INTO `sensor_tinggi` VALUES (8, 50, '2022-12-04 16:53:21');

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tinggi
-- ----------------------------
INSERT INTO `tinggi` VALUES ('1', '60', '2022-11-01', '83', '2022-11-02', '77', '2022-11-03', '90', '2022-11-04');

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
INSERT INTO `tinggi2` VALUES ('70', '2022-11-01');
INSERT INTO `tinggi2` VALUES ('65', '2022-11-02');
INSERT INTO `tinggi2` VALUES ('75', '2022-11-03');
INSERT INTO `tinggi2` VALUES ('80', '2022-11-04');
INSERT INTO `tinggi2` VALUES ('80', '2022-12-01');
INSERT INTO `tinggi2` VALUES ('70', '2022-12-02');
INSERT INTO `tinggi2` VALUES ('60', '2022-12-03');
INSERT INTO `tinggi2` VALUES ('50', '2022-12-04');

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
