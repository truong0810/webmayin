CREATE TABLE `user` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50),
  `username` varchar(50),
  `email` varchar(150),
  `phone_number` varchar(50),
  `password` varchar(100),
  `gender` tinyint(4) DEFAULT 0 COMMENT '0: Nam, 1: Nữ',
  `avatar` varchar(200) DEFAULT "https://facebookninja.vn/wp-content/uploads/2023/06/anh-dai-dien-mac-dinh-zalo.jpg",
  `token` varchar(50) COMMENT '	Token sẽ null khi user ghi nhớ đăng nhập mới sinh token',
  `created_at` timestamp DEFAULT (now()),
  `updated_at` timestamp DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `category` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(150),
  `slug` varchar(150),
  `created_at` timestamp DEFAULT (now()),
  `updated_at` timestamp DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `orders` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_id` int,
  `fullname` varchar(100),
  `email` varchar(50),
  `phone_number` varchar(20),
  `address` varchar(150),
  `note` varchar(200),
  `status` tinyint(1) DEFAULT 0 COMMENT 'Trạng thái: 0: Chưa duyệt 1: Đã duyệt',
  `total_price` float,
  `created_at` timestamp DEFAULT (now()),
  `updated_at` timestamp DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `orders_details` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` float,
  PRIMARY KEY (`order_id`, `product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `manufacturer` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(100),
  `logo` varchar(200),
  `phone_number` varchar(50),
  `address` varchar(200),
  `created_at` timestamp DEFAULT (now()),
  `updated_at` timestamp DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `product` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `category_id` int,
  `manufacturer_id` int,
  `title` varchar(200),
  `price` float,
  `discount` float,
  `printer_type` varchar(150),
  `paper_size` varchar(150),
  `scan_speed` varchar(150),
  `double_sided_scanning` tinyint(1) DEFAULT 0 COMMENT 'Scan hai mặt: 0: Không 1: Có',
  `automatic_paper_feeder` tinyint(1) DEFAULT 0 COMMENT 'Khay nạp giấy tự động: 0: Không có sẵn 1: Có sẵn',
  `printer_communicate` varchar(150),
  `warranty` varchar(150),
  `thumbnail` varchar(200),
  `printer_condition` varchar(200),
  `hot_selling` tinyint(1) DEFAULT 0 COMMENT 'Bán chạy: 0: Không bán chạy 1: Bán chạy',
  `hot_sale` tinyint(1) DEFAULT 0 COMMENT 'Khuyến mãi: 0: Không khuyến mãi 1: Khuyễn mãi',
  `created_at` timestamp DEFAULT (now()),
  `updated_at` timestamp DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `product_details` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_id` int,
  `species` varchar(200) COMMENT 'Chủng loại',
  `machine_type` varchar(200),
  `activity_cycle` varchar(200) COMMENT 'Chu kỳ hoạt động',
  `optical_resolution` varchar(200) COMMENT 'Độ phân giải quang học',
  `auto_doc_feeder` varchar(200) COMMENT 'Công suất khay nạp tài liệu tự động',
  `scan_options` varchar(150) COMMENT 'Tùy chọn chụp quét',
  `scan_size` text COMMENT 'Kích thước chụp quét',
  `support_weight` varchar(150) COMMENT 'Trọng lượng giấy ảnh media, được hỗ trợ',
  `auto_scan_speed` varchar(200) COMMENT 'Tốc độ chụp quét của khay nạp tài liệu tự động',
  `color_bit_depth` varchar(200) COMMENT 'Chiều sâu bit màu',
  `memory` varchar(50),
  `scan_file_format` text COMMENT 'Định dạng file scan',
  `connect` text,
  `operating_system` text,
  `printer_size` text,
  `printer_weight` varchar(50),
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `product_images` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_id` int,
  `images` varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `admin` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(50),
  `email` varchar(50),
  `password` varchar(50),
  `level` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Admin 1: Super Admin',
  `avatar` varchar(200) DEFAULT "https://us.123rf.com/450wm/anatolir/anatolir2011/anatolir201110041/159616981-icono-del-sistema-administrador-estilo-simple.jpg?ver=6"
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `product` ADD FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `product_details` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_images` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `orders_details` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

ALTER TABLE `orders_details` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
