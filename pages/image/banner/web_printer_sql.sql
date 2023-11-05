CREATE TABLE `product_images`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `images` TEXT NULL
);
ALTER TABLE
    `product_images` ADD UNIQUE `product_images_product_id_unique`(`product_id`);
CREATE TABLE `product_details`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `species` VARCHAR(200) NULL COMMENT 'Chủng loại',
    `machine_type` VARCHAR(200) NULL,
    `activity_cycle` VARCHAR(200) NULL COMMENT 'Chu kỳ hoạt động',
    `optical_resolution` VARCHAR(200) NULL COMMENT 'Độ phân giải quang học',
    `auto_doc_feeder` VARCHAR(200) NULL COMMENT 'Công suất khay nạp tài liệu tự động',
    `scan_options` VARCHAR(150) NULL COMMENT 'Tùy chọn chụp quét',
    `scan_size` TEXT NULL COMMENT 'Kích thước chụp quét',
    `support_weight` VARCHAR(150) NULL COMMENT 'Trọng lượng giấy ảnh media, được hỗ trợ',
    `auto_scan_speed` VARCHAR(200) NULL COMMENT 'Tốc độ chụp quét của khay nạp tài liệu tự động',
    `color_bit_depth` VARCHAR(200) NULL COMMENT 'Chiều sâu bit màu',
    `memory` VARCHAR(50) NULL,
    `scan_file_format` TEXT NULL COMMENT 'Định dạng file scan',
    `connect` TEXT NULL,
    `operating_system` TEXT NULL,
    `printer_size` TEXT NULL,
    `printer_weight` VARCHAR(50) NULL,
    `description` TEXT NULL
);
ALTER TABLE
    `product_details` ADD UNIQUE `product_details_product_id_unique`(`product_id`);
CREATE TABLE `order`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NULL,
    `fullname` VARCHAR(100) NULL,
    `email` VARCHAR(100) NULL,
    `phone_number` VARCHAR(50) NULL,
    `address` VARCHAR(150) NULL,
    `note` VARCHAR(200) NULL,
    `status` TINYINT NULL COMMENT 'Trạng thái: 0: Chưa duyệt 1: Đã duyệt',
    `total_price` DOUBLE(8, 2) NULL,
    `create_at` DATETIME NOT NULL,
    `update_at` DATETIME NOT NULL
);
ALTER TABLE
    `order` ADD UNIQUE `order_user_id_unique`(`user_id`);
CREATE TABLE `category`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NULL,
    `slug` VARCHAR(150) NULL,
    `create_at` DATETIME NOT NULL,
    `update_at` DATETIME NOT NULL
);
CREATE TABLE `product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `category_id` INT NULL,
    `manufacturer_id` INT NULL,
    `title` VARCHAR(200) NULL,
    `price` DOUBLE(8, 2) NULL,
    `discount` DOUBLE(8, 2) NULL,
    `printer_type` VARCHAR(150) NULL,
    `paper_size` VARCHAR(150) NULL,
    `scan_speed` VARCHAR(150) NULL,
    `double_sided_scanning` TINYINT NULL COMMENT 'Scan hai mặt: 0: Không 1: Có',
    `automatic_paper_feeder` TINYINT NULL COMMENT 'Khay nạp giấy tự động: 0: Không có sẵn 1: Có sẵn',
    `communication_port` VARCHAR(150) NULL,
    `warranty` VARCHAR(150) NULL,
    `thumbnail` TEXT NULL,
    `printer_condition` VARCHAR(200) NULL,
    `hot_selling` TINYINT NULL COMMENT 'Bán chạy: 0: Không bán chạy 1: Bán chạy',
    `hot_sale` TINYINT NULL COMMENT 'Khuyến mãi: 0: Không khuyến mãi 1: Khuyễn mãi',
    `create_at` DATETIME NOT NULL,
    `update_at` DATETIME NOT NULL
);
ALTER TABLE
    `product` ADD UNIQUE `product_category_id_unique`(`category_id`);
ALTER TABLE
    `product` ADD UNIQUE `product_manufacturer_id_unique`(`manufacturer_id`);
CREATE TABLE `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `role_id` INT NULL,
    `fullname` VARCHAR(50) NULL,
    `username` VARCHAR(50) NULL,
    `email` VARCHAR(150) NULL,
    `phone_number` VARCHAR(50) NULL,
    `password` VARCHAR(100) NULL,
    `create_at` DATETIME NOT NULL,
    `update_at` DATETIME NOT NULL
);
ALTER TABLE
    `user` ADD UNIQUE `user_role_id_unique`(`role_id`);
CREATE TABLE `order_details`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT NULL,
    `product_id` INT NULL,
    `price` DOUBLE(8, 2) NULL,
    `quantity` INT NULL,
    `total` DOUBLE(8, 2) NULL
);
ALTER TABLE
    `order_details` ADD UNIQUE `order_details_order_id_unique`(`order_id`);
ALTER TABLE
    `order_details` ADD UNIQUE `order_details_product_id_unique`(`product_id`);
CREATE TABLE `manufacturer`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NULL,
    `logo` TEXT NULL,
    `phone_number` VARCHAR(50) NULL,
    `address` VARCHAR(200) NULL,
    `create_at` DATETIME NOT NULL,
    `update_at` DATETIME NOT NULL
);
CREATE TABLE `role`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NULL,
    `create_at` DATETIME NOT NULL,
    `update_at` DATETIME NOT NULL
);
ALTER TABLE
    `order` ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `order_details` ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY(`order_id`) REFERENCES `order`(`id`);
ALTER TABLE
    `product` ADD CONSTRAINT `product_manufacturer_id_foreign` FOREIGN KEY(`manufacturer_id`) REFERENCES `manufacturer`(`id`);
ALTER TABLE
    `user` ADD CONSTRAINT `user_role_id_foreign` FOREIGN KEY(`role_id`) REFERENCES `role`(`id`);
ALTER TABLE
    `product_details` ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY(`product_id`) REFERENCES `product`(`id`);
ALTER TABLE
    `product` ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY(`category_id`) REFERENCES `category`(`id`);
ALTER TABLE
    `order_details` ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY(`product_id`) REFERENCES `product`(`id`);
ALTER TABLE
    `product_images` ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY(`product_id`) REFERENCES `product`(`id`);