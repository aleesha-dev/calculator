CREATE TABLE `calculator_logs`
(
	`id`           int NOT NULL AUTO_INCREMENT,
	`first_number` decimal(10, 2) NULL DEFAULT NULL,
	`sec_number`   decimal(10, 2) NULL DEFAULT NULL,
	`action`       varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
	`total`        decimal(10, 2) NULL DEFAULT NULL,
	`created_by`   bigint NULL DEFAULT NULL,
	`created_at`   timestamp NULL DEFAULT NULL,
	`updated_at`   timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;
