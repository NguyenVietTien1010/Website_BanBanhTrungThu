-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2025 lúc 02:04 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an_banh_trung_thu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Nướng', 'banh-nuong', '2025-11-03 22:59:11', '2025-11-03 22:59:11'),
(2, 'Bánh Dẻo', 'banh-deo', '2025-11-03 22:59:11', '2025-11-03 22:59:11'),
(3, 'Hộp Quà', 'hop-qua', '2025-11-04 07:41:15', '2025-11-04 07:41:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_01_000000_create_categories_table', 1),
(5, '2025_01_02_000000_create_products_table', 1),
(6, '2025_01_03_000000_create_orders_table', 1),
(7, '2025_01_04_000000_create_order_items_table', 1),
(8, '2025_01_05_000001_add_is_admin_to_users', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `total`, `payment_status`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'DH-YVMXPWI0', 'User', '0934172536', 'user@example.com', 'kế F3/40S, Ấp 6C, Xã Vĩnh Lộc A', 55000, 'pending', 'completed', 2, '2025-11-04 05:09:26', '2025-11-04 06:53:09'),
(2, 'DH-RKMJFR9L', 'User', '0934172536', 'user@example.com', 'kế F3/40S, Ấp 6C, Xã Vĩnh Lộc A', 65000, 'pending', 'completed', 2, '2025-11-04 05:11:53', '2025-11-04 06:49:23'),
(3, 'DH-6WMIRK3E', 'Admin', '0934172536', 'admin@example.com', 'kế F3/40S, Ấp 6C, Xã Vĩnh Lộc A', 1400000, 'pending', 'completed', 1, '2025-11-04 17:17:41', '2025-11-04 17:18:05'),
(4, 'DH-7IFPS02I', 'Admin', '0934172536', 'admin@example.com', 'kế F3/40S, Ấp 6C, Xã Vĩnh Lộc A', 600000, 'pending', 'completed', 1, '2025-11-04 17:47:25', '2025-11-04 17:47:41'),
(5, 'DH-P8MZDLIQ', 'Nguyễn Viết Tiến', '0934172536', 'ngvietien14001557@gmail.com', 'kế F3/40S, Ấp 6C, Xã Vĩnh Lộc A', 500000, 'pending', 'completed', 3, '2025-11-04 18:00:47', '2025-11-04 18:01:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Bánh Dẻo Thập Cẩm', 1, 55000, '2025-11-04 05:09:26', '2025-11-04 05:09:26'),
(2, 2, 2, 'Bánh Nướng Đậu Xanh (1 trứng)', 1, 65000, '2025-11-04 05:11:53', '2025-11-04 05:11:53'),
(3, 3, 6, 'Bánh nướng truyền thống', 28, 50000, '2025-11-04 17:17:41', '2025-11-04 17:17:41'),
(4, 4, 18, 'Trăng Vàng Hoàng Kim Vinh Hiển (Đỏ) Hộp Giấy', 1, 600000, '2025-11-04 17:47:25', '2025-11-04 17:47:25'),
(5, 5, 16, 'THU ĐOÀN VIÊN 6Bx80G – Mẫu Mới 2025', 1, 500000, '2025-11-04 18:00:47', '2025-11-04 18:00:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bánh Nướng Thập Cẩm (2 trứng)', 'banh-nuong-thap-cam-2-trung', 'Hương vị truyền thống, đậm đà với 2 trứng muối.', 'images/banh-trung-thu-thap-cam-lap-xuong.jpg', 75000, 100, '2025-11-03 22:59:11', '2025-11-04 08:14:19'),
(2, 1, 'Bánh Nướng Đậu Xanh (1 trứng)', 'banh-nuong-dau-xanh-1-trung', 'Nhân đậu xanh trứng muối ngọt bùi, thơm lừng.', 'images/nuong_dau_xanh_nhan_1_trung_8813d5c2970846338277f63df4fe7a80_master.jpg', 65000, 100, '2025-11-03 22:59:11', '2025-11-04 08:14:47'),
(3, 2, 'Bánh Dẻo Thập Cẩm', 'banh-deo-thap-cam', 'Vỏ bánh dẻo thơm, nhân đậm đà hương vị.', 'images/banh-trung-thu-deo-thap-cam.jpg', 55000, 100, '2025-11-03 22:59:11', '2025-11-04 08:15:10'),
(6, 1, 'Bánh nướng truyền thống', 'banh-nuong-truyen-thong', 'Bánh nướng truyền thống là một trong các loại bánh trung thu quen thuộc và được yêu thích nhất trong mỗi mùa trăng rằm. Với lớp vỏ bánh được nướng vàng óng, thơm lừng hòa quyện cùng nhân bên trong đậm đà, đây là loại bánh không thể thiếu trên mâm cỗ Trung Thu của người Việt.\r\n\r\nVỏ bánh thường được làm từ bột mì, nước đường, dầu ăn và nước tro tàu. Phần nhân bên đa dạng như: nhân thập cẩm, đậu xanh, hạt sen, trứng muối, gà quay… Trong đó, bánh nướng thập cẩm trứng muối được xem là một trong những loại bánh trung thu ngon nhất, mang đậm hương vị truyền thống và chiều lòng đa số khẩu vị người Việt.\r\n\r\nBánh nướng truyền thống không chỉ mang ý nghĩa về mặt ẩm thực mà còn là biểu tượng của sự đoàn viên, gắn kết. Nhờ sự đa dạng trong cách kết hợp nhân, các loại bánh nướng trung thu hiện nay ngày càng phong phú, đáp ứng cả khẩu vị cổ điển lẫn hiện đại.', 'images/banh-trung-thu-nuong-1.jpg', 50000, 100, '2025-11-04 08:04:18', '2025-11-04 08:10:20'),
(7, 2, 'Bánh trung thu dẻo', 'banh-trung-thu-deo', 'Bánh dẻo có vỏ làm từ bột nếp trắng, được nhào nặn cùng nước đường hoa bưởi. Bánh thường có hình tròn, bề mặt in hoa văn đẹp mắt, mang ý nghĩa tròn đầy, viên mãn.\r\n\r\nCác loại nhân bánh trung thu bên trong bánh dẻo cũng vô cùng đa dạng như đậu xanh, hạt sen, mè đen, dừa… Một số biến tấu mới còn kết hợp các loại nhân bánh trung thu đặc biệt như trà xanh, chocolate, phô mai,…\r\n\r\nVới kết cấu mềm mịn và dẻo thơm, bánh dẻo là lựa chọn lý tưởng cho những ai thích vị ngọt thanh. Bánh thường được dùng kèm trà để làm dịu hậu vị trong những buổi sum họp ngày trung thu.', 'images/banh-trung-thu-deo.jpg', 68000, 100, '2025-11-04 17:19:10', '2025-11-04 17:19:10'),
(8, 2, 'Bánh trung thu rau câu', 'banh-trung-thu-rau-cau', 'Trong những năm gần đây, bánh trung thu rau câu đã nhanh chóng trở thành xu hướng mới trong danh sách các loại bánh trung thu ngon nhất, đặc biệt được giới trẻ và những người ăn kiêng yêu thích.\r\n\r\nKhác với bánh nướng hay bánh dẻo, bánh trung thu rau câu có lớp vỏ được làm từ bột agar hoặc gelatin, kết hợp cùng các nguyên liệu tạo màu tự nhiên như lá dứa, nước ép thanh long, hoa đậu biếc…\r\n\r\nPhần nhân bên trong cũng rất đa dạng, từ nhân trái cây, nhân cà phê, flan, dừa non,…được bọc trong lớp rau câu mát lạnh. Các loại nhân bánh trung thu mới này không chỉ độc đáo mà còn mang đến trải nghiệm vị giác lạ miệng, dễ ăn trong thời tiết nóng. Chính sự mới mẻ và vẻ ngoài lung linh đã giúp loại bánh này chiếm trọn trái tim người tiêu dùng, đặc biệt là trẻ nhỏ.', 'images/banh-trung-thu-rau-cau.jpg', 69000, 100, '2025-11-04 17:19:50', '2025-11-04 17:19:50'),
(9, 1, 'Bánh trung thu ngàn lớp', 'banh-trung-thu-ngan-lop', 'Bánh trung thu ngàn lớp (còn gọi là bánh trung thu Đài Loan) với lớp vỏ bánh được cán mỏng nhiều lần, tạo thành từng lớp mỏng xếp chồng lên nhau. Khi nướng chín, vỏ bánh trông rất bắt mắt và giòn rụm.\r\n\r\nCác loại nhân bánh trung thu ngàn lớp cũng rất đa dạng: từ đậu đỏ, đậu xanh, khoai môn cho đến các loại nhân bánh trung thu đặc biệt như phô mai tan chảy, trứng muối, custard… Không chỉ hấp dẫn về hương vị, bánh trung thu ngàn lớp còn được biến tấu thành nhiều màu sắc bắt mắt như tím, xanh, hồng,… làm phong phú thêm các loại bánh trung thu hiện đại trên thị trường.', 'images/banh-trung-thu-ngan-lop.jpg', 35000, 100, '2025-11-04 17:20:29', '2025-11-04 17:20:29'),
(10, 2, 'Bánh trung thu lava', 'banh-trung-thu-lava', 'Bánh trung thu lava là một trong các loại bánh trung thu mới lạ, gây sốt trong những năm gần đây. Đặc điểm nổi bật của loại bánh này là phần nhân chảy bên trong – thường là trứng muối tan chảy, custard, chocolate hoặc matcha. Khi cắt ra, phần nhân sẽ từ từ chảy ra ngoài vô cùng hấp dẫn.\r\n\r\nVỏ bánh trung thu lava có thể là bánh nướng hoặc bánh dẻo. Các loại nhân bánh trung thu lava mới liên tục được sáng tạo như lava sầu riêng, lava trà sữa, lava trứng muối phô mai,… giúp người tiêu dùng có thêm nhiều lựa chọn phong phú. Không chỉ ngon miệng, bánh trung thu lava còn tạo hiệu ứng thị giác bắt mắt, rất thích hợp để làm quà tặng sang trọng.', 'images/banh-trung-thu-lava.jpg', 50000, 100, '2025-11-04 17:21:16', '2025-11-04 17:21:16'),
(11, 1, 'Bánh trung thu in hoa nổi', 'banh-trung-thu-in-hoa-noi', 'Trong danh sách các loại bánh trung thu đẹp mắt nhất, không thể không nhắc đến bánh trung thu in hoa nổi. Đây là dòng bánh chú trọng vào thẩm mỹ, với các họa tiết hoa lá được tạo hình 3D trên bề mặt bánh bằng kỹ thuật ép khuôn hoặc đắp thủ công.\r\n\r\nBánh trung thu in hoa nổi có thể là dạng bánh nướng, dẻo hoặc bánh rau câu, tùy theo sở thích. Nhân bánh vẫn là các loại nhân bánh trung thu quen thuộc như đậu xanh, khoai môn, sầu riêng,…\r\n\r\nKhông chỉ mang đến hương vị thơm ngon, bánh trung thu in hoa nổi còn là một tác phẩm nghệ thuật, khiến người nhận cảm thấy trân trọng. Đây cũng là loại bánh trung thu được ưa chuộng trong các dịp biếu tặng cao cấp, thường thấy trong các bộ sưu tập bánh trung thu của những thương hiệu nổi tiếng.', 'images/banh-trung-thu-in-hoa-noi.jpg', 49000, 100, '2025-11-04 17:21:50', '2025-11-04 17:21:50'),
(12, 1, 'Bánh trung thu hình con vật', 'banh-trung-thu-hinh-con-vat', 'Bánh trung thu hình con vật thường được thiết kế với tạo hình ngộ nghĩnh như cá chép, thỏ ngọc, gấu, mèo… đặc biệt phù hợp cho trẻ nhỏ. Đây là loại bánh giúp dịp trung thu trở nên sinh động và thú vị hơn cho các bé.\r\n\r\nNhân bánh linh hoạt từ đậu xanh, chocolate, phô mai đến nhân trái cây tổng hợp. Các loại nhân bánh trung thu này thường ít ngọt và mềm để phù hợp khẩu vị của trẻ nhỏ. Loại bánh này không chỉ thu hút bằng vẻ ngoài đáng yêu mà còn giúp cha mẹ có thể giới thiệu cho con về ý nghĩa của Tết trung thu một cách gần gũi.', 'images/banh-trung-thu-hinh-con-vat.jpg', 35000, 100, '2025-11-04 17:22:25', '2025-11-04 17:22:25'),
(13, 2, 'Bánh trung thu dẻo lạnh', 'banh-trung-thu-deo-lanh', 'Bánh trung thu dẻo lạnh là một trong những biến tấu hiện đại của bánh dẻo truyền thống. Bánh được làm từ bột dẻo kết hợp cùng nhân kem hoặc các loại mứt trái cây, chocolate… Bánh được bảo quản lạnh để giữ độ dẻo mát.\r\n\r\nCác loại nhân bánh trung thu dẻo lạnh phổ biến gồm kem phô mai, matcha, oreo, dâu tây, cam,  đào… Đây là các loại nhân bánh trung thu mới giúp người ăn có cảm giác lạ miệng và không bị ngấy như những loại bánh truyền thống.\r\n\r\nBánh trung thu dẻo lạnh thường có hình dáng nhỏ gọn, màu sắc bắt mắt, phù hợp làm quà biếu. Nhờ hương vị thanh mát và dễ ăn, loại bánh này đặc biệt được yêu thích bởi giới trẻ hiện nay.', 'images/banh-trung-thu-deo-lanh.jpg', 45000, 100, '2025-11-04 17:22:53', '2025-11-04 17:22:53'),
(14, 3, 'Trăng Vàng Long Ngư Vọng Nguyệt – Hộp 6 Bánh', 'trang-vang-long-ngu-vong-nguyet-hop-6-banh', 'Thuộc bộ sưu tập Trăng Vàng Long Ngư Vọng Nguyệt – lấy cảm hứng từ Hoàng gia, kết hợp với ý tưởng thiết kế bao bì là hình ảnh Đoàn múa Lân Sư Rồng, biểu trưng cho điều lành, sự phát đạt, thịnh vượng và hạnh phúc. Mỗi hộp được chế tác thủ công bởi nghệ nhân làng sơn mài Bình Dương', 'images/1762303164_blackgold-6-b.jpg', 500000, 100, '2025-11-04 17:39:24', '2025-11-04 17:39:24'),
(15, 3, 'Trăng Vàng Long Ngư Vọng Nguyệt – Hộp 4 Bánh', 'trang-vang-long-ngu-vong-nguyet-hop-4-banh', 'Set hộp bánh trung thu Kinh Đô Trăng Vàng Long Ngư Vọng Nguyệt 4 bánh, thuộc bộ sưu tập Trăng Vang Long Ngư Vọng Nguyệt lấy cảm hứng từ Hoàng Gia, mang 2 màu chủ đạo là đen huyền bí và vương giả…', 'images/1762303267_blackgold-4-banh.jpg', 45000, 100, '2025-11-04 17:41:07', '2025-11-04 17:41:07'),
(16, 3, 'THU ĐOÀN VIÊN 6Bx80G – Mẫu Mới 2025', 'thu-doan-vien-6bx80g-mau-moi-2025', 'Bánh Trung Thu Kinh Đô THU ĐOÀN VIÊN Là món quà gói trọn lòng trân quý, mỗi tuyệt phẩm trong dòng bánh biếu quà tặng cao cấp Trăng vàng đến tay người nhận đều là một công trình ẩm thực được dày công chế biến, để dư vị Trung Thu cùng tâm ý của người trao còn đọng mãi trong lòng người thưởng thức.', 'images/1762303306_Thu-doan-vien-2024.jpg', 500000, 100, '2025-11-04 17:41:46', '2025-11-04 17:41:46'),
(17, 3, 'Trăng Vàng Hoàng Kim Vinh Hoa (Vàng) Hộp Giấy', 'trang-vang-hoang-kim-vinh-hoa-vang-hop-giay', 'Một thu rực rỡ thịnh vượng đã mở ra theo ánh hoàng kim quyền quý, để bản hòa tấu hương vị trung thu ngân lên những cung bậc tinh tế của Tôm Bách Hoa, Thịt Sốt Tương BBQ, Gà Quay Tứ Quý, Hạt Sen Hạt Dưa. Và cũng chỉ sắc màu kiêu hãnh ấy mới gửi trao trọn vẹn lời chúc trân quý cho một thu huy hoàng công danh, lộng lẫy vinh hoa phú quý, để người thưởng thức cảm nhận sâu sắc mối thâm tình nồng hậu, sáng ngời như ánh kim nguyệt đêm rằm.', 'images/1762303361_z5585158275326_dcb1c27a197058aab1c82c693e281c62-2048x2048.jpg', 450000, 100, '2025-11-04 17:42:41', '2025-11-04 17:42:41'),
(18, 3, 'Trăng Vàng Hoàng Kim Vinh Hiển (Đỏ) Hộp Giấy', 'trang-vang-hoang-kim-vinh-hien-do-hop-giay', 'Mở chiếc hộp Trăng Vàng Hoàng Kim, ẩn sau sắc màu vương giả là những kỳ quan ẩm thực được nghệ nhân Trăng Vàng dày công chăm chút: Cua Bát Bửu, Thịt Sốt Tương BBQ, Gà Quay Tứ Quý và Đậu Xanh Hạnh Nhân. Mỗi chiếc bánh không chỉ là sự thăng hoa của nghệ thuật chế tác hương vị trung thu mà còn tỏa sáng lời chúc thành công, ghi dấu một thu hoàng kim, vinh hiển rạng rỡ, vị thế sáng ngời.', 'images/1762303420_HKD-2048x2048.jpg', 600000, 100, '2025-11-04 17:43:40', '2025-11-04 17:43:40'),
(19, 3, 'Hộp 4 Bánh – Thu Vui Khỏe 3 Ngọt 1 Mặn', 'hop-4-banh-thu-vui-khoe-3-ngot-1-man', 'Để đáp ứng nhu cầu tặng quà nhanh chóng và phù hợp với khẩu vị người sử dụng, team Hoàng Gia xin gửi tới quý khách Hộp 4 Bánh bao gồm:\r\n\r\n- Gà quay sốt X.O ( 2 TRỨNG ) ĐB 210G\r\n- Đậu Xanh Hạt Dưa ( 2 TRỨNG ) ĐB 210G\r\n- Dẻo Hạt Sen Hạt Dưa  ( 1 TRỨNG ) ĐB 230G\r\n- Đậu Đỏ Kiểu Nhật ( 2 TRỨNG ) ĐB 210G', 'images/1762303580_KDMC-CATA25-hinh-anh-19.jpg', 350000, 100, '2025-11-04 17:46:07', '2025-11-04 17:46:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8PxmQ277kygCbW8PIVjxuwRloSLQ0srRxm3G6VgW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTjlQbkEzN3gydGw0QkdZcWw1eThWOGc3aVBGelZqaVVTVHBEZGYySyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1762304597);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$/QkwaC7H56w8Up1UuoHvVe.veIFpG9BoRMitgKgJAwjA60eEBEnwe', NULL, 1, '2025-11-03 22:59:11', '2025-11-03 23:12:07'),
(2, 'User', 'user@example.com', NULL, '$2y$12$/QkwaC7H56w8Up1UuoHvVe.veIFpG9BoRMitgKgJAwjA60eEBEnwe', NULL, 0, '2025-11-03 22:59:11', '2025-11-03 23:12:07'),
(3, 'Nguyễn Viết Tiến', 'ngvietien14001557@gmail.com', NULL, '$2y$12$ZAr8BEp2JavZOAsjjImzvewgncCyNu1sLmMyuf1UkWsx.9pjQh2Fa', NULL, 0, '2025-11-04 16:44:16', '2025-11-04 16:44:16'),
(4, 'Đặng Cam Hồng', 'camhongdang110@gmail.com', NULL, '$2y$12$bA9CEoyKbi5Loey7yKEyHeeAcBmw7Tdci.iisD5f0.qM5dcVFt.wG', NULL, 0, '2025-11-04 17:52:18', '2025-11-04 17:52:18'),
(5, 'Tường Vy', 'tuongvy123@gmail.com', NULL, '$2y$12$AM0UC.cxwcj5GF96WwVb0u6UOYTZbRntQTkDe1RtzmDYw.XmT1GAK', NULL, 0, '2025-11-04 17:56:12', '2025-11-04 17:56:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
