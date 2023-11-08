CREATE TABLE `role` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NULL,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `user` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `role_id` int NULL,
  `fullname` varchar(50) NULL,
  `username` varchar(50) NULL,
  `email` varchar(150) NULL,
  `phone_number` varchar(50) NULL,
  `password` varchar(100) NULL,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `category` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NULL,
  `slug` varchar(150) NULL,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `order` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_id` int NULL,
  `fullname` varchar(100) NULL,
  `email` varchar(50) NULL,
  `address` varchar(150) NULL,
  `note` varchar(200) NULL,
  `status` tinyint(1) NULL DEFAULT 0 COMMENT 'Trạng thái: 0: Chưa duyệt 1: Đã duyệt',
  `total_price` float NULL,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `order_details` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `order_id` int NULL,
  `product_id` int NULL,
  `price` int NULL,
  `quantity` float NULL,
  `total` float NULL
);

CREATE TABLE `manufacturer` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NULL,
  `logo` text NULL,
  `phone_number` varchar(50) NULL,
  `address` varchar(200) NULL,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `product` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `category_id` int NULL,
  `manufacturer_id` int NULL,
  `title` varchar(200) NULL,
  `price` float NULL,
  `discount` float NULL,
  `printer_type` varchar(150) NULL,
  `paper_size` varchar(150) NULL,
  `scan_speed` varchar(150) NULL,
  `double_sided_scanning` tinyint(1) NULL DEFAULT 0 COMMENT 'Scan hai mặt: 0: Không 1: Có',
  `automatic_paper_feeder` tinyint(1) NULL DEFAULT 0 COMMENT 'Khay nạp giấy tự động: 0: Không có sẵn 1: Có sẵn',
  `warranty` varchar(150) NULL,
  `thumbnail` text NULL,
  `printer_condition` varchar(200) NULL,
  `hot_selling` tinyint(1) NULL DEFAULT 0 COMMENT 'Bán chạy: 0: Không bán chạy 1: Bán chạy',
  `hot_sale` tinyint(1) NULL DEFAULT 0 COMMENT 'Khuyến mãi: 0: Không khuyến mãi 1: Khuyễn mãi',
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `product_details` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_id` int NULL,
  `species` varchar(200) NULL COMMENT 'Chủng loại',
  `machine_type` varchar(200) NULL,
  `activity_cycle` varchar(200) NULL COMMENT 'Chu kỳ hoạt động',
  `optical_resolution` varchar(200) NULL COMMENT 'Độ phân giải quang học',
  `auto_doc_feeder` varchar(200) NULL COMMENT 'Công suất khay nạp tài liệu tự động',
  `scan_options` varchar(150) NULL COMMENT 'Tùy chọn chụp quét',
  `scan_size` text NULL COMMENT 'Kích thước chụp quét',
  `support_weight` varchar(150) NULL COMMENT 'Trọng lượng giấy ảnh media, được hỗ trợ',
  `auto_scan_speed` varchar(200) NULL COMMENT 'Tốc độ chụp quét của khay nạp tài liệu tự động',
  `color_bit_depth` varchar(200) NULL COMMENT 'Chiều sâu bit màu',
  `memory` varchar(50) NULL,
  `scan_file_format` text NULL COMMENT 'Định dạng file scan',
  `connect` text NULL,
  `operating_system` text NULL,
  `printer_size` text NULL,
  `printer_weight` varchar(50) NULL,
  `description` text NULL
);

CREATE TABLE `product_images` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_id` int NULL,
  `images` text NULL
);

ALTER TABLE `user` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `order_details` ADD FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `product_details` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_images` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
