-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2022 lúc 08:19 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oganic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bánh kẹo hữu cơ', '2022-12-20 10:48:24', '2022-12-20 10:48:24'),
(2, 'Bột làm bánh hữu cơ', '2022-12-20 10:48:39', '2022-12-20 10:48:39'),
(3, 'Đồ uống hữu cơ', '2022-12-20 10:48:51', '2022-12-20 10:48:51'),
(4, 'Ngũ cốc dính dưỡng', '2022-12-20 11:53:27', '2022-12-20 11:53:27'),
(5, 'Các loại đậu và hạt hữu cơ', '2022-12-20 11:53:56', '2022-12-20 11:53:56'),
(6, 'Ngũ cốc ăn sáng', '2022-12-20 11:54:19', '2022-12-20 11:54:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_04_160740_create_category_table', 1),
(6, '2022_12_04_165124_create_product_table', 1),
(7, '2022_12_04_165232_create_order_table', 1),
(8, '2022_12_04_165420_create_order_detail_table', 1),
(9, '2022_12_04_194933_alter_table_order_detail', 1),
(10, '2022_12_19_185420_create_vote_table', 1),
(11, '2022_12_19_185939_alter_table_vote', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `price` double(20,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `user_id`, `phone`, `address`, `note`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Văn Hiếu', 5, '0984399787', 'DS/TN-Gio Linh-Quảng Trị', '', -1, 720000.000, '2022-12-20 12:03:05', '2022-12-20 12:04:27'),
(2, 'Hoàng Văn Hiếu', 5, '0984399787', 'DS/TN-Gio Linh-Quảng Trị', '', 1, 220000.000, '2022-01-20 12:04:13', '2022-12-20 12:12:34'),
(3, 'Nguyễn Thị Thanh Vân', 4, '0335583859', 'DS/TN-Duy Xuyên-Quảng Nam', '', 0, 50000.000, '2022-08-20 12:07:41', '2022-12-20 12:07:41'),
(4, 'Phạm Minh Tâm', 2, '0984399785', 'DS/TN-Gio Mai-Quảng Bình', '', 1, 294000.000, '2022-08-20 12:09:56', '2022-12-20 12:10:04'),
(5, 'Phạm Minh Tâm', 2, '0984399785', 'DS/TN-Gio Mai-Quảng Bình', '', 0, 250000.000, '2022-10-20 12:09:56', '2022-12-20 12:14:05'),
(6, 'Nguyễn Thị Huyền Trang', 3, '0984399786', 'DS/TN-Gio Mai-Quảng Bình', '', 1, 535000.000, '2022-12-20 12:11:22', '2022-12-20 12:12:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` double(20,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 115000.000, '2022-12-20 12:03:05', '2022-12-20 12:03:05'),
(1, 3, 2, 270000.000, '2022-12-20 12:03:05', '2022-12-20 12:03:05'),
(1, 22, 1, 335000.000, '2022-12-20 12:03:05', '2022-12-20 12:03:05'),
(2, 6, 2, 220000.000, '2022-12-20 12:04:13', '2022-12-20 12:04:13'),
(3, 5, 1, 50000.000, '2022-12-20 12:07:41', '2022-12-20 12:07:41'),
(4, 12, 1, 115000.000, '2022-12-20 12:09:17', '2022-12-20 12:09:17'),
(4, 1, 1, 60000.000, '2022-12-20 12:09:17', '2022-12-20 12:09:17'),
(4, 24, 1, 119000.000, '2022-12-20 12:09:17', '2022-12-20 12:09:17'),
(5, 6, 1, 110000.000, '2022-12-20 12:09:56', '2022-12-20 12:09:56'),
(5, 15, 1, 140000.000, '2022-12-20 12:09:56', '2022-12-20 12:09:56'),
(6, 1, 1, 60000.000, '2022-12-20 12:11:22', '2022-12-20 12:11:22'),
(6, 3, 2, 270000.000, '2022-12-20 12:11:22', '2022-12-20 12:11:22'),
(6, 10, 1, 205000.000, '2022-12-20 12:11:22', '2022-12-20 12:11:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(20,3) NOT NULL,
  `sale_price` double(20,3) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `category_id`, `price`, `sale_price`, `description`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bnhc-17g-Biovegan.jpg', 'Bột nở hữu cơ 17g Biovegan', 2, 60000.000, 30000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"383\" style=\"mso-height-source:userset;height:287.45pt\">\r\n  <td height=\"383\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:287.45pt;\r\n  width:529pt\">Đây là điều mà thế giới làm bánh đã chờ đợi: Cuộc cách mạng bột\r\n  nở BIOVEGAN không chỉ truyền cảm hứng cho những Baker chuyên nghiệp hay Baker\r\n  tại gia. Bột nở duy nhất với tartar và tinh bột năng nguyên chất.<br>\r\n    <br>\r\n    MẠNH MẼ HƠN! Đảm bảo kết quả tốt hơn: nở hơn, màu sắc tự nhiên hơn, hương\r\n  vị và mùi thơm hơn.<br>\r\n    <br>\r\n    TRONG LÀNH HƠN! Đồ nướng giữ được tươi lâu hơn.<br>\r\n    <br>\r\n    NGHIÊM TÚC HƠN! Dòng chảy bột đều và hài hòa hơn.<br>\r\n    <br>\r\n    ỨNG DỤNG BAO QUÁT! Thích hợp cho tất cả các loại bột.<br>\r\n    <br>\r\n    LÝ TƯỞNG! Tốt cho tất cả những ai muốn làm bánh không muốn sử dụng đến tinh\r\n  bột bắp…<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo.<br>\r\n    <br>\r\n    Không bảo quản trên 32 ° C</td></tr></tbody></table>', 'Thành phần: Tinh bột năng hữu cơ, sodium carbonate, potassium tartrate (22,8%), bột nước chanh hữu cơ, chất làm dày: guar gum hữu cơ.<br><br>Shelf Life: 36 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-006<br>', 1, '2022-12-20 10:53:14', '2022-12-20 10:55:08'),
(2, 'bnhc-21g-Pural.jpg', 'Bột nở hữu cơ 21g Pural', 2, 99000.000, 30000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"326\" style=\"mso-height-source:userset;height:244.9pt\">\r\n  <td height=\"326\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:244.9pt;\r\n  width:529pt\">Bạn có thể tạo ra các công thức làm bánh và làm bánh thơm ngon\r\n  với bột nở hữu cơ Pural cho những Baker chuyên nghiệp hay Baker tại gia. Bột\r\n  nở duy nhất với tartar và Tinh bột bắp nguyên chất.<br>\r\n    <br>\r\n    MẠNH MẼ HƠN! Đảm bảo kết quả tốt hơn: nở hơn, màu sắc tự nhiên hơn, hương\r\n  vị và mùi thơm hơn.<br>\r\n    <br>\r\n    TRONG LÀNH HƠN! Đồ nướng giữ được tươi lâu hơn.<br>\r\n    <br>\r\n    NGHIÊM TÚC HƠN! Dòng chảy bột đều và hài hòa hơn.<br>\r\n    <br>\r\n    ỨNG DỤNG BAO QUÁT! Thích hợp cho tất cả các loại bột.<br>\r\n    <br>\r\n    Không như các loại bột nở bán trôi nổi và không rõ nguồn gốc trên thị\r\n  trường hiện nay, bột nở hữu cơ (organic baking powder) Pural không chứa muối\r\n  nhôm (Aluminum), vì thế bột nở hữu cơ rất an toàn cho sức khỏe của các bé nhỏ\r\n  và cả gia đình của bạn.<br>\r\n    <br>\r\n    Bột nở hữu cơ thích hợp dùng để làm có loại bánh để tạo độ phồng, xốp, giúp\r\n  các món bánh của bạn trở nên thơm ngon và hấp dẫn, như: biscuit, bánh bông\r\n  lan, bánh pancake, muffin, cupcake,…<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo.<br>\r\n    <br>\r\n    Không bảo quản trên 32 ° C.</td></tr></tbody></table>', 'Thành phần: Tinh bột bắp, chất tạo axit: pure tartar (24.7%), (monopotassium tartrate), chất tạo nở: baking soda (natri hydro cacbonat).<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br><br>Khối lượng tịnh: 21g<br>', 1, '2022-12-20 11:00:56', '2022-12-20 11:00:56'),
(3, 'tbkthc-250g-Bauck_Hof.jpg', 'Tinh bột khoai tây hữu cơ 250g Bauck Hof', 2, 135000.000, 135000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"334\" style=\"mso-height-source:userset;height:250.9pt\">\r\n  <td height=\"334\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:250.9pt;\r\n  width:529pt\">Tinh bột khoai tây là phần bột được chiết xuất từ củ\r\n  khoai tây. Tinh bột khoai tây tồn tại ở các hạt tế bào hạt tinh\r\n  bột. Để thu được tinh bột khoai tây, người ta tác động vật lý lên\r\n  khoai tây bằng cách nghiền hoặc xay nhuyễn cùng với nước.<br>\r\n    <br>\r\n    Sau đó gáng lọc lắng để thu được hỗn hợp dịch tinh bột khoai tây\r\n  gồm nước và tinh bột. Cuối cùng qua công đoạn sấy để thu được\r\n  thành phẩm cuối cùng là tinh bột khoai tây.<br>\r\n    <br>\r\n    Ngoài việc sử dụng tinh bột khoai tây trong nấu ăn, chúng còn được\r\n  sử dụng nhiều trong công nghiệp chế biến thực phẩm. Bởi công dụng\r\n  là chất tạo kết cấu đặc, sánh chính vì vậy tinh bột khoai tây được\r\n  dùng để chế biến các món hầm, nấu soup, làm nước sốt, kem tươi hay bánh\r\n  pudding.<br>\r\n    <br>\r\n    Đặc biệt với các món bánh cần độ mềm và trong suốt thì việc\r\n  chọn lựa bột khoai tây để làm chất đệm giúp thành phẩm trong và\r\n  mềm hơn chính là lựa chọn hoàn hảo.<br>\r\n    <br>\r\n    Tinh bột khoai tây có thể được sử dụng để thay thế bột ngô trong hầu hết\r\n  các công thức làm bánh. Bột tinh bột khoai tây chịu được nhiệt độ cao hơn bột\r\n  bắp, làm cho nó trở thành chất làm đặc tuyệt vời cho nước sốt, súp và món\r\n  hầm. Nó bổ sung độ ẩm cho bất kỳ món nướng nào và là một thành phần thiết yếu\r\n  trong việc nướng bánh không chứa gluten.</td></tr></tbody></table>', 'Thành phần: 100% tinh bột khoai tây hữu cơ<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-007<br><br>Khối lượng tịnh: 250g<br>', 1, '2022-12-20 11:03:20', '2022-12-20 11:03:20'),
(4, 'tbbhc-250g-Bauck_Hof.jpg', 'Tinh bột bắp hữu cơ 250g Bauck Hof', 2, 125000.000, 125000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"285\" style=\"mso-height-source:userset;height:214.15pt\">\r\n  <td height=\"285\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:214.15pt;\r\n  width:529pt\">Bột bắp ngô Bauckhof, không chứa gluten là một loại tinh bột rất\r\n  tốt được làm từ ngô tốt nhất để kết hợp nước sốt và súp cũng như các món\r\n  tráng miệng.<br>\r\n    <br>\r\n    Không sử dụng sinh vật biến đổi gen hoặc nguyên liệu biến đổi gen, không sử\r\n  dụng chất bảo quản và phụ gia, được nuôi trồng hữu cơ để đảm bảo có độ tinh\r\n  cao nhất.<br>\r\n    <br>\r\n    Tinh bột bắp được dùng làm nguyên liệu trong chế biến thực phẩm: làm bánh,\r\n  kem, chè,…<br>\r\n    <br>\r\n    Từ bánh tươi như bánh Gato (còn gọi là bông lan), cupcake hay bánh khô như\r\n  các loại cookies, bánh dừa,… có thể thay 10-20% bột mì bằng tinh bột bắp giúp\r\n  sản phẩm có độ thơm hơn, giòn hơn.<br>\r\n    <br>\r\n    Tinh bột bắp có thể thay bột năng hoặc bột sắn dây khi bạn chế biến các\r\n  loại chè, súp, hay các loại nước sốt.<br>\r\n    <br>\r\n    Khi làm kem, có thể dùng chút tinh bột bắp hoà với nước quấy cho đến kho\r\n  chín trộn lẫn với các thành khác của kem giúp kem không bị tạo tinh thể\r\n  đá.<br>\r\n    <br>\r\n    Sử dụng tinh bột bắp thay thế cho bột chiên giòn trộn vào thực phẩm chiên.<br>\r\n    <br>\r\n    Tinh bột bắp dùng làm chất tạo đặc trong các loại nước sốt, súp, tương,\r\n  bánh pudding</td></tr></tbody></table>', 'Thành phần: 100% tinh bột bắp hữu cơ<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-007<br><br>Khối lượng tịnh: 250g<br>', 1, '2022-12-20 11:04:58', '2022-12-20 11:04:58'),
(5, 'Ghcdl-10g-Sobo.jpg', 'Gelatine hữu cơ dạng lá Sobo 10g', 2, 50000.000, 50000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"302\" style=\"mso-height-source:userset;height:226.9pt\">\r\n  <td height=\"302\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:226.9pt;\r\n  width:529pt\">Gelatine chính là nguyên liệu thực phẩm được sử dụng như dầu ăn,\r\n  đường trong chế biến những món ăn. Nhất là những món tráng miệng, món bánh…\r\n  Gelatine được chiết xuất từ chính collagen có trong xương, da của động vật\r\n  như da lợn hoặc trong collagen của thực vật (tảo đỏ, trái cây,..).<br>\r\n    <br>\r\n    Đây chính là loại protein không vị, không mùi, trong suốt hoặc có loại được\r\n  sản xuất với màu hơi hơi vàng. Gelatine có 2 dạng: dạng bột và dạng lá. Tùy\r\n  vào từng trường hợp để lựa chọn dạng gelatin thích hợp.<br>\r\n    <br>\r\n    Trước tình trạng chăn nuôi công nghiệp ô nhiễm và việc sử dụng tràn lan\r\n  kháng sinh, thuốc tăng trưởng, thức ăn biến đổi gen, và ko rõ nguồn gốc, thì\r\n  việc sử dụng Gelatine Hữu Cơ sẽ là giải pháp an toàn.<br>\r\n    <br>\r\n    Gelatine là chất tạo đông được sử dụng trong các món tráng miệng như: Rau\r\n  câu, pudding, panna cotta, cheesecakes,…<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo.<br>\r\n    <br>\r\n    Lưu ý: không nấu sôi Gelatine</td></tr></tbody></table>', 'Thành phần: 100% Gelatine hữu cơ.<br><br>Gói gồm 06 lá Gelatine dùng cho 500 ml chất lỏng.<br><br>Shelf Life: 36 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-007<br>', 1, '2022-12-20 11:06:33', '2022-12-20 11:06:33'),
(6, 'blMhcccvc-78g-Arche.jpg', 'Bột làm Mousse hữu cơ cao cấp vị chocolate 78g Arche', 2, 110000.000, 100000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"330\" style=\"mso-height-source:userset;height:247.9pt\">\r\n  <td height=\"330\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:247.9pt;\r\n  width:529pt\">Mousse là một loại bánh có lớp kem mát lạnh mềm mịn, tan trong\r\n  miệng, đây là những đặc trưng đầu tiên khi người ta nghĩ đến mousse. Với ý\r\n  nghĩa là “bọt” trong tiếng Pháp, mousse chính là chiếc bánh có vẻ ngoài đẹp\r\n  mắt với lớp bánh gato mỏng bên dưới, phía trên là kem mịn, tan nhanh tự bọt\r\n  biển chỉ để lại sự vấn vương nơi đầu lưỡi thực khách.<br>\r\n    <br>\r\n    Chỉ với lòng trắng trứng đánh bông, kết hợp với các nguyên liệu khác như\r\n  gelatin, kem tươi hay hương trái cây mà mousse lại trở thành món tráng miệng\r\n  không thể thiếu và được lòng bao nhiêu người chỉ với một lần nếm qua. Bánh\r\n  Mousse rất được ưa chuộng nên sự xuất hiện loại bánh này trong menu tráng\r\n  miệng của các nhà hàng, khách sạn cũng là điều dễ hiểu.<br>\r\n    <br>\r\n    Có rất nhiều loại bánh Mousse hiện nay như Mousse socola, chanh dây, sữa\r\n  chua, xoài, dâu tây, việt quất, thanh long, táo…<br>\r\n    <br>\r\n    Socola ngon nhất và được lòng hơn cả bởi các vị khách nhỏ tuổi hay cả người\r\n  lớn! Với bột kem thuần chay, bạn có thể chế biến bánh mousse sô cô la hữu cơ\r\n  thơm ngon.<br>\r\n    <br>\r\n    Được làm hoàn toàn không có gelatine, bột làm Mousse hữu cơ cao cấp vị\r\n  chocolate Arche hoàn toàn phù hợp với những người theo chế độ ăn vegan.<br>\r\n    <br>\r\n    Luôn mềm và với 27% cacao hữu cơ tốt nhất, rất giống sôcôla và thơm ngon\r\n  không gì sánh được.<br>\r\n    <br>\r\n    Giờ đây bạn có thể dễ dàng làm loại bánh trứ danh nước Pháp này ngay tại\r\n  nhà với Bột làm Mousse hữu cơ cao cấp vị chocolate Arche với các thành phần\r\n  an toàn tuyệt đối được sản xuất tại Đức.<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"514\" style=\"width: 386pt;\"><tbody><tr height=\"330\" style=\"height: 247.9pt;\"><td height=\"330\" class=\"xl65\" align=\"left\" width=\"514\" style=\"height: 247.9pt; width: 386pt;\">Thành phần: Đường mía thô, bột ca cao đã khử dầu nhiều 27%, tinh bột bắp, chất tạo gel: agar agar.<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001</td></tr></tbody></table>', 1, '2022-12-20 11:08:39', '2022-12-20 11:08:39'),
(7, 'bPhcccvc-50g-Arche.jpg', 'Bột Pudding hữu cơ cao cấp vị Socola 50g Arche', 2, 69000.000, 50000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"436\" style=\"mso-height-source:userset;height:327.0pt\">\r\n  <td height=\"436\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:327.0pt;\r\n  width:529pt\">Bánh pudding là loại bánh lạnh được làm đông bởi gelatin kết hợp\r\n  với một số hương vị khác nhau như vị trà xanh, vị dâu, vị cam,… Về cơ bản,\r\n  pudding có nét hơi giống với flan, tuy nhiên khi ăn vào thì pudding vẽ mềm\r\n  mịn hơn và có vị béo ngậy nhiều hơn của sữa.<br>\r\n    <br>\r\n    Arche là một loại bánh pudding cổ điển . Nó không chứa gluten và cũng có\r\n  hương vị tuyệt vời vani thơm và ngọt nhẹ tự nhiên trên bánh.<br>\r\n    <br>\r\n    Bánh Pudding hữu cơ Arche với các thành phần chất lượng cao với chất lượng\r\n  hữu cơ nay được pha thêm một lượng cacao hảo hạng. Sẽ là một món khoái khẩu\r\n  của rất nhiều bạn nhỏ và ngya cả với người lớn chúng ta đây..<br>\r\n    <br>\r\n    Ăn dặm “Kiểu Nhật” với bánh Pudding mềm tan<br>\r\n    <br>\r\n    Giai đoạn từ 12-18 tháng tuổi nhiều bé đã cai sữa và bắt đầu có thể ăn các\r\n  bữa như người lớn. Ngoài việc chú trọng 3 bữa chính, mẹ cũng nên bổ sung 2-3\r\n  bữa phụ và cho bé&nbsp; uống thêm sữa hoặc\r\n  sử dụng các chế phẩm từ sữa. Những món bánh mềm mịn như bánh Pudding là sự lựa\r\n  chọn lý tưởng cho bữa phụ của bé trong giai đoạn này. Bánh Pudding có hương\r\n  thơm dịu của sữa, độ mềm tan và độ mát lạnh vừa phải giúp bé ngon miệng, kích\r\n  thích vị giác. Mẹ còn có thể linh hoạt kết hợp Pudding với các loại trái cây\r\n  để tăng hương vị và màu sắc cho món ăn<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"514\" style=\"width: 386pt;\"><tbody><tr height=\"436\" style=\"height: 327pt;\"><td height=\"436\" class=\"xl65\" align=\"left\" width=\"514\" style=\"height: 327pt; width: 386pt;\">Thành phần: Tinh bột bắp, bột cacao đã khử dầu 22%, muối<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001</td></tr></tbody></table>', 1, '2022-12-20 11:11:18', '2022-12-20 11:11:18'),
(8, 'bPhcccvv-40g-Arche.jpg', 'Bột Pudding hữu cơ cao cấp vị Vani 40g Arche', 2, 79000.000, 79000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"263\" style=\"mso-height-source:userset;height:197.45pt\">\r\n  <td height=\"263\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:197.45pt;\r\n  width:529pt\">Bánh pudding là loại bánh lạnh được làm đông bởi gelatin kết hợp\r\n  với một số hương vị khác nhau như vị trà xanh, vị dâu, vị cam,… Về cơ bản,\r\n  pudding có nét hơi giống với flan, tuy nhiên khi ăn vào thì pudding vẽ mềm\r\n  mịn hơn và có vị béo ngậy nhiều hơn của sữa.<br>\r\n    <br>\r\n    Arche là một loại bánh pudding cổ điển. Nó không chứa gluten và cũng có\r\n  hương vị tuyệt vời vani thơm và ngọt nhẹ tự nhiên trên bánh.<br>\r\n    <br>\r\n    Bánh pudding vani hữu cơ Arche với các thành phần chất lượng cao với chất\r\n  lượng hữu cơ.<br>\r\n    <br>\r\n    Ăn dặm “Kiểu Nhật” với bánh Pudding mềm tan<br>\r\n    <br>\r\n    Giai đoạn từ 12-18 tháng tuổi nhiều bé đã cai sữa và bắt đầu có thể ăn các\r\n  bữa như người lớn. Ngoài việc chú trọng 3 bữa chính, mẹ cũng nên bổ sung 2-3\r\n  bữa phụ và cho bé&nbsp; uống thêm sữa hoặc\r\n  sử dụng các chế phẩm từ sữa. Những món bánh mềm mịn như bánh Pudding là sự\r\n  lựa chọn lý tưởng cho bữa phụ của bé trong giai đoạn này. Bánh Pudding có\r\n  hương thơm dịu của sữa, độ mềm tan và độ mát lạnh vừa phải giúp bé ngon\r\n  miệng, kích thích vị giác. Mẹ còn có thể linh hoạt kết hợp Pudding với các\r\n  loại trái cây để tăng hương vị và màu sắc cho món ăn<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo</td></tr></tbody></table>', 'Thành phần: Tinh bột bắp, vani xay 2%, muối<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br>', 1, '2022-12-20 11:12:30', '2022-12-20 11:12:30'),
(9, 'tbkmhccc-200g-Arche.jpg', 'Tinh bột khoai mì hữu cơ cao cấp 200g Arche', 2, 185000.000, 150000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"307\" style=\"mso-height-source:userset;height:230.45pt\">\r\n  <td height=\"307\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:230.45pt;\r\n  width:529pt\">Bột khoai mì hữu cơ Arche là một loại tinh bột mịn, không vị,\r\n  được làm từ phần củ chứa tinh bột của khoai mì.<br>\r\n    <br>\r\n    Tinh bột khoai mì hữu cơ là một chất kết dính lý tưởng và không chứa gluten\r\n  cho súp và nước sốt, nó mang lại cho chúng độ sệt và độ bóng sáng tối ưu, như\r\n  chúng ta đã biết ở các nhà hàng châu Á.<br>\r\n    <br>\r\n    Bột khoai mì ( Tapioca Starch ) được dùng nhiều trong các sản phẩm khô như\r\n  bánh tráng, bột năng, miến, hủ tiếu, nui,&nbsp;\r\n  trân châu bột năng, bánh bột lọc, bánh canh,…<br>\r\n    <br>\r\n    Bánh ngọt không chứa gluten, bánh ngọt và món tráng miệng cũng có thể được\r\n  làm nhanh chóng với tinh bột đơn giản.<br>\r\n    <br>\r\n    Một ứng dụng quan trọng khác của tinh bột khoai mì là chất làm đặc và ổn\r\n  định. Tinh bột khoai mì đặc biệt được ưa chuộng bởi nó không có hương vị, vì\r\n  thế khi bổ sung vào không làm thay đổi mùi vị của sản phẩm.</td></tr></tbody></table>', 'Thành phần: 100% tinh bột khoai mì hữu cơ.<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br>', 1, '2022-12-20 11:13:52', '2022-12-20 11:13:52'),
(10, 'dvhccc-58g-Arche.jpg', 'Đường vani hữu cơ cao cấp 58g Arche', 2, 205000.000, 205000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"256\" style=\"mso-height-source:userset;height:192.6pt\">\r\n  <td height=\"256\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:192.6pt;\r\n  width:529pt\">Biovegan Bourbon Vanilla được làm từ vỏ vani. Trái ngược với\r\n  “Vanillin” được sản xuất nhân tạo, BIO Bourbon Vanilla từ Arche có hương vị\r\n  hoàn toàn tự nhiên của “Nữ hoàng gia vị” thực sự. Với hương thơm tự nhiên,\r\n  đường vani sẽ làm món ăn thêm hấp dẫn và hảo hạng .<br>\r\n    <br>\r\n    Đường vani với vani bourbon thực sự được sử dụng để làm ngọt kem, đồ uống\r\n  hỗn hợp, bánh ngọt và bánh quy<br>\r\n    <br>\r\n    Làm lớp ngoài phủ bánh donut, japanese cotton cheese cake, kẹo, mứt,\r\n  socola…<br>\r\n    <br>\r\n    Dùng cho vào kem tươi, kem bơ, …giúp dễ hòa tan và kem thơm ngon hơn.<br>\r\n    <br>\r\n    Dùng cho nhiều đồ uống, sinh tố và các món tráng miệng thơm ngon hơn.<br>\r\n    <br>\r\n    Đơn giản, dễ dàng thực hiện.<br>\r\n    <br>\r\n    Gói nhỏ tiện lợi dễ dàng mang theo.</td></tr></tbody></table>', 'Thành phần: Đường mía thô, vỏ vani xay 6,3%.<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br>', 1, '2022-12-20 11:15:26', '2022-12-20 11:15:26'),
(11, 'kdhccbGB-100g-Sonnentor.jpg', 'Kẹo dẻo hữu cơ cho bé Gummy Bear 100g Sonnentor', 1, 115000.000, 115000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"352\" style=\"mso-height-source:userset;height:264.6pt\">\r\n  <td height=\"352\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:264.6pt;\r\n  width:529pt\">Kẹo dẻo hữu cơ hình gấu có chứa tảo xoắn Spirulina, một siêu\r\n  thực phẩm bổ sung protein hoàn chỉnh cho các bé và cả người lớn.<br>\r\n    <br>\r\n    Hình dạng chú gấu ngộ nghĩnh xinh xắn với màu sắc bắt mắt dễ dàng thu hút\r\n  được các bạn nhỏ và cả người lớn.<br>\r\n    <br>\r\n    Mùi vị trái cây thơm ngon hấp dẫn. Kẹo có vị chua ngọt nhẹ, sẽ là món ăn\r\n  vặt yêu thích của các bạn nhỏ<br>\r\n    <br>\r\n    An toàn cho bé nên sẽ là lựa chọn ưu tiên của bố mẹ dành cho con yêu của\r\n  mình.<br>\r\n    <br>\r\n    Không sử dụng đường hóa học, chất tạo màu, hương nhân tạo và không chứa tàn\r\n  dư thuốc trừ sâu, phân bón hóa học.<br>\r\n    <br>\r\n    Chất liệu kẹo mềm, nhẹ, không dai, dễ tiêu hóa<br>\r\n    <br>\r\n    Sản phẩm được xem là món ăn vặt cho bé khi đến trường, đi dã ngoại, xem\r\n  phim, đi du lịch, có thể dùng để trang trí bàn tiệc vào các dịp lễ, bữa tiệc\r\n  nhỏ của gia đình.<br>\r\n    <br>\r\n    Được sản xuất từ những nguyên liệu hoàn toàn hữu cơ và được kiểm tra khắt\r\n  khe nhất để mang lại chất lượng tốt nhất cho các bạn nhỏ.</td></tr></tbody></table>', 'Thành phần: Si-rô glucose, đường, gelatine, nước ép trái cây cô đặc làm từ: táo, elderberry, lý chua đen, mâm xôi; Chất làm chua: axit xitric; hương chanh tự nhiên, hương nghệ tự nhiên, chiết xuất tảo (Spirulina platensis); Chất phủ: carnauba.<br><br>Shelf Life: 18 tháng từ ngày sản xuất<br><br>Sản xuất tại Áo<br><br>Chứng nhận hữu cơ Châu Âu AT-BIO-901<br><br>Khối lượng tịnh: 100g &amp; 1kg<br>', 1, '2022-12-20 11:18:11', '2022-12-20 11:18:11'),
(12, 'kdtchccb-100g-Sonnentor.jpg', 'Kẹo dẻo Trái cây hữu cơ cho bé 100g Sonnentor', 1, 115000.000, 100000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"332\" style=\"mso-height-source:userset;height:249.0pt\">\r\n  <td height=\"332\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:249.0pt;\r\n  width:529pt\">Dòng kẹo dẻo mới không sử dụng thành phần nguyên liệu gelatine.\r\n  Hoàn toàn thuần chay.<br>\r\n    <br>\r\n    Mùi vị trái cây thơm ngon hấp dẫn.<br>\r\n    <br>\r\n    An toàn cho bé nên bố mẹ có thể hoàn toàn yên tâm.<br>\r\n    <br>\r\n    Không sử dụng đường hóa học, chất tạo màu, hương nhân tạo và không chứa tàn\r\n  dư thuốc trừ sâu, phân bón hóa học.<br>\r\n    <br>\r\n    Chất liệu kẹo mềm, nhẹ, không dai, dễ tiêu hóa<br>\r\n    <br>\r\n    Hình dạng các loại trái cây với màu sắc bắt mắt dễ dàng thu hút được các\r\n  bạn nhỏ và cả người lớn.<br>\r\n    <br>\r\n    Sản phẩm được xem là món ăn vặt cho bé khi đến trường, đi dã ngoại, xem\r\n  phim, đi du lịch, có thể dùng để trang trí bàn tiệc vào các dịp lễ, bữa tiệc\r\n  nhỏ của gia đình.<br>\r\n    <br>\r\n    Được sản xuất từ những nguyên liệu hoàn toàn hữu cơ và được kiểm tra khắt\r\n  khe nhất để mang lại chất lượng tốt nhất cho các bạn nhỏ.</td></tr></tbody></table>', 'Thành phần: Si-rô glucoza, đường, chất tạo keo: pectin; Chất axit hóa: axit xitric, chất điều chỉnh độ chua: natri tartrat, kali tartrat; hương chanh tự nhiên, hương cam tự nhiên, nước ép quả cơm cháy cô đặc , hương nghệ tự nhiên, chiết xuất tảo (Spirula platensis); Chất phủ: carnauba<br><br>Shelf Life: 18 tháng từ ngày sản xuất<br><br>Sản xuất tại Áo<br><br>Chứng nhận hữu cơ Châu Âu AT-BIO-901<br><br>Khối lượng tịnh: 100g &amp; 1kg<br>', 1, '2022-12-20 11:19:46', '2022-12-20 11:19:46'),
(13, 'kSvbhccb-100g.jpg', 'Kẹo Socola viên bi hữu cơ cho bé 100g', 1, 125000.000, 125000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"359\" style=\"mso-height-source:userset;height:269.45pt\">\r\n  <td height=\"359\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:269.45pt;\r\n  width:529pt\">Pural Organic Confetti Trộn với ít nhất 30% ca cao trong phần sô\r\n  cô la. Thưởng thức những hạt sô cô la sữa đầy màu sắc này. Một món ăn nhẹ\r\n  hoàn hảo cho những người yêu thích sô cô la!<br>\r\n    <br>\r\n    Kẹo sô cô la sữa hữu cơ hình viên bi từ thương hiệu Pural được tạo nên một\r\n  cách cẩn thận và với các thành phần chất lượng cao. Những viên kẹo nhiều màu\r\n  sắc vui nhộn này chắc chắn sẽ làm hài lòng những người bạn nhỏ!<br>\r\n    <br>\r\n    Mỗi viên kẹo được phủ một lớp sô cô la sữa mỏng, mang đến hương vị ngọt\r\n  ngào nhưng không hề ngấy. Dễ dàng hòa tan trong miệng bạn.<br>\r\n    <br>\r\n    Chúng được dùng để ăn nhưng cũng có thể được sử dụng để trang trí bánh ngọt\r\n  và bánh sinh nhật của bạn. Hãy thưởng thức chúng bất cứ lúc nào trong\r\n  ngày.<br>\r\n    <br>\r\n    Kẹo sô cô la sữa hữu cơ nhãn hiệu Pural không có màu nhân tạo, chúng được\r\n  tạo ra từ chất tạo màu chiết xuất từ thực vật và trái cây.<br>\r\n    <br>\r\n    Sản phẩm được xem là món ăn vặt cho bé khi đến trường, đi dã ngoại, xem\r\n  phim, đi du lịch, có thể dùng để trang trí bàn tiệc vào các dịp lễ, bữa tiệc\r\n  nhỏ của gia đình.</td></tr></tbody></table>', 'Thành phần: Sôcôla sữa nguyên chất 60% (đường mía , bột SỮA nguyên chất 11,88%, bơ ca cao 11,1%, khối lượng ca cao 7,32%,<br><br>Bột WHEY 2,94%, lecithin hướng dương, đường mía , tinh bột gạo , sirô ngô ,chiết xuất thực vật (cà rốt , táo, tảo xoắn), nước ép thực vật cô đặc (cà rốt đen, củ dền)chất làm đặc: gum arabic, chất phủ: carnauba<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-013<br><br>Khối lượng tịnh: 100g<br>', 1, '2022-12-20 11:21:44', '2022-12-20 11:21:44'),
(14, 'kdhccbhgT-100g-Pural.jpg', 'Kẹo dẻo hữu cơ cho bé hình gấu Teddy 100g Pural', 1, 95000.000, 75000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"316\" style=\"mso-height-source:userset;height:237.0pt\">\r\n  <td height=\"316\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:237.0pt;\r\n  width:529pt\">Dòng kẹo dẻo mới không sử dụng thành phần nguyên liệu gelatine.\r\n  Hoàn toàn thuần chay.<br>\r\n    <br>\r\n    Mùi vị trái cây thơm ngon hấp dẫn.<br>\r\n    <br>\r\n    Kẹo dẻo hữu cơ hình gấu có chứa tảo xoắn Spirulina, một siêu thực phẩm bổ\r\n  sung protein hoàn chỉnh cho các bé và cả người lớn.<br>\r\n    <br>\r\n    Hình dạng chú gấu ngộ nghĩnh xinh xắn với màu sắc bắt mắt dễ dàng thu hút\r\n  được các bạn nhỏ và cả người lớn.<br>\r\n    <br>\r\n    Mùi vị trái cây thơm ngon hấp dẫn. Kẹo có vị chua ngọt nhẹ, sẽ là món ăn\r\n  vặt yêu thích của các bạn nhỏ<br>\r\n    <br>\r\n    An toàn cho bé nên sẽ là lựa chọn ưu tiên của bố mẹ dành cho con yêu của\r\n  mình.<br>\r\n    <br>\r\n    Không sử dụng đường hóa học, chất tạo màu, hương nhân tạo và không chứa tàn\r\n  dư thuốc trừ sâu, phân bón hóa học.<br>\r\n    <br>\r\n    Chất liệu kẹo mềm, nhẹ, không dai, dễ tiêu hóa<br>\r\n    <br>\r\n    Sản phẩm được xem là món ăn vặt cho bé khi đến trường, đi dã ngoại, xem\r\n  phim, đi du lịch, có thể dùng để trang trí bàn tiệc vào các dịp lễ, bữa tiệc\r\n  nhỏ của gia đình.<br>\r\n    <br>\r\n    Được sản xuất từ những nguyên liệu hoàn toàn hữu cơ và được kiểm tra khắt\r\n  khe nhất để mang lại chất lượng tốt nhất cho các bạn nhỏ.</td></tr></tbody></table>', 'Thành phần: Sirô glucoza, đường mía, gelatine, nước ép trái cây cô đặc (3,23%) (táo (0,70%), chanh(0,60%), cam (0,56%), mâm xôi (0,48%), dứa (0,48%), lý chua đen (0,41%)), chất axit hóa: axit xitric, hương vị tự nhiên, chiết xuất thực vật (cà rốt, bí ngô, táo , tảo, cây rum, cây cơm cháy), chất phủ : carnauba<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-013<br><br>Khối lượng tịnh: 100g<br>', 1, '2022-12-20 11:23:16', '2022-12-20 11:23:16'),
(15, 'bqchccbS-300g.jpg', 'Bánh qui cacao hữu cơ cho bé Sottolestelle 300g', 1, 140000.000, 140000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"308\" style=\"mso-height-source:userset;height:231.0pt\">\r\n  <td height=\"308\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:231.0pt;\r\n  width:529pt\">Thành phần: Bột mì cao cấp Senatore Cappelli 57%, đường mía, dầu\r\n  ô liu nguyên chất 13%, ca cao 5%, tinh bột bắp, xi-rô gạo ,hương vị tự\r\n  nhiên<br>\r\n    <br>\r\n    Những chiếc bánh quy xinh xắn mô tả hai nhân vật: Stella và Stello, hai\r\n  ngôi sao nhỏ dễ thương với biểu cảm khác nhau. Được làm bằng bột mì Ý thuộc\r\n  giống Senatore Cappelli, dầu ô liu nguyên chất và vị cacao thơm ngon. Hoàn\r\n  toàn không có bơ và trứng.<br>\r\n    <br>\r\n    Bữa sáng sẽ là một thời gian vui vẻ mà người lớn và trẻ em sẽ được thưởng\r\n  thức những chiếc bánh quy độc đáo về hình dáng và hương vị này.<br>\r\n    <br>\r\n    Các công thức nấu ăn tốt nhất dành cho những đứa trẻ tôn trọng sức khỏe của\r\n  chúng, để chúng làm quen với hương vị ít ngọt ngay từ khi còn nhỏ. Bánh quy\r\n  có nhiều hương vị khác nhau và thơm ngon, không chứa đường tinh luyện và được\r\n  làm ngọt bằng xi-rô gạo và nước táo. Thu được bằng Bột mì cao cấp Senatore\r\n  Cappelli và dầu ô liu nguyên chất. Không có sữa và trứng. Vì một sản phẩm hữu\r\n  cơ mang đến và giáo dục những người trẻ nhất một chế độ ăn uống lành mạnh và\r\n  chân chính để họ trở thành những người trưởng thành có ý thức.</td></tr></tbody></table>', 'Xuất xứ : Sottolestelle –Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Egg Free, Milk Free<br><br>Non GMO<br><br>Vegan<br>', 1, '2022-12-20 11:24:20', '2022-12-20 11:33:49'),
(16, 'bqhkhccbS-250g.png', 'Bánh qui hạt kê hữu cơ cho bé Sottolestelle 250g', 1, 140000.000, 140000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"514\" style=\"width: 386pt;\"><tbody><tr height=\"326\" style=\"mso-height-source:userset;height:244.9pt\">\r\n  <td height=\"326\" class=\"xl65\" align=\"left\" width=\"514\" style=\"height:244.9pt;\r\n  width:386pt\">Thành phần: Bột mì Spelt 60%, xi-rô gạo, dầu ô liu nguyên chất\r\n  11%, xi-rô agave ,bỏng hạt kê 2%,<br>\r\n    <br>\r\n    Những chiếc bánh quy xinh xắn mô tả hai nhân vật: Stella và Stello, hai\r\n  ngôi sao nhỏ dễ thương với biểu cảm khác nhau. Được làm bằng bột mì Spelt ,\r\n  dầu ô liu nguyên chất và với vị bỏng hạt kê đặc biệt thơm ngon vui mắt. Hoàn\r\n  toàn không có bơ và trứng.<br>\r\n    <br>\r\n    Bữa sáng sẽ là một thời gian vui vẻ mà người lớn và trẻ em sẽ được thưởng\r\n  thức những chiếc bánh quy độc đáo về hình dáng và hương vị này.<br>\r\n    <br>\r\n    Các công thức nấu ăn tốt nhất dành cho những đứa trẻ tôn trọng sức khỏe của\r\n  chúng, để chúng làm quen với hương vị ít ngọt ngay từ khi còn nhỏ. Bánh quy\r\n  có nhiều hương vị khác nhau và thơm ngon, không chứa đường tinh luyện và được\r\n  làm ngọt bằng xi-rô gạo và nước táo. Thu được bằng Bột mì cao cấp Senatore\r\n  Cappelli và dầu ô liu nguyên chất. Không có sữa và trứng. Vì một sản phẩm hữu\r\n  cơ mang đến và giáo dục những người trẻ nhất một chế độ ăn uống lành mạnh và\r\n  chân chính để họ trở thành những người trưởng thành có ý thức</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"514\" style=\"width: 386pt;\"><tbody><tr height=\"326\" style=\"mso-height-source:userset;height:244.9pt\">\r\n  <td height=\"326\" class=\"xl65\" align=\"left\" width=\"514\" style=\"height:244.9pt;\r\n  width:386pt\">Thành phần: Bột mì Spelt 60%, xi-rô gạo, dầu ô liu nguyên chất\r\n  11%, xi-rô agave ,bỏng hạt kê 2%,<br>\r\n    <br>\r\n    Những chiếc bánh quy xinh xắn mô tả hai nhân vật: Stella và Stello, hai\r\n  ngôi sao nhỏ dễ thương với biểu cảm khác nhau. Được làm bằng bột mì Spelt ,\r\n  dầu ô liu nguyên chất và với vị bỏng hạt kê đặc biệt thơm ngon vui mắt. Hoàn\r\n  toàn không có bơ và trứng.<br>\r\n    <br>\r\n    Bữa sáng sẽ là một thời gian vui vẻ mà người lớn và trẻ em sẽ được thưởng\r\n  thức những chiếc bánh quy độc đáo về hình dáng và hương vị này.<br>\r\n    <br>\r\n    Các công thức nấu ăn tốt nhất dành cho những đứa trẻ tôn trọng sức khỏe của\r\n  chúng, để chúng làm quen với hương vị ít ngọt ngay từ khi còn nhỏ. Bánh quy\r\n  có nhiều hương vị khác nhau và thơm ngon, không chứa đường tinh luyện và được\r\n  làm ngọt bằng xi-rô gạo và nước táo. Thu được bằng Bột mì cao cấp Senatore\r\n  Cappelli và dầu ô liu nguyên chất. Không có sữa và trứng. Vì một sản phẩm hữu\r\n  cơ mang đến và giáo dục những người trẻ nhất một chế độ ăn uống lành mạnh và\r\n  chân chính để họ trở thành những người trưởng thành có ý thức</td></tr></tbody></table>', 1, '2022-12-20 11:26:24', '2022-12-20 11:26:24'),
(17, 'bqtcrhccbS-300g.png', 'Bánh qui táo cà rốt hữu cơ cho bé Sottolestelle 300g', 1, 135000.000, 125000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"307\" style=\"mso-height-source:userset;height:230.45pt\">\r\n  <td height=\"307\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:230.45pt;\r\n  width:529pt\">Thành phần: Bột mì đa dụng 53% , xi-rô gạo, dầu ô liu nguyên\r\n  chất 10%, bột gạo, táo xay nhuyễn 4%, nước táo cô đặc 2,5%, cà rốt 1 %<br>\r\n    <br>\r\n    Những chiếc bánh quy xinh xắn mô tả hai nhân vật: Stella và Stello, hai\r\n  ngôi sao nhỏ dễ thương với biểu cảm khác nhau. Được làm bằng bột mì Ý thuộc\r\n  giống Senatore Cappelli, dầu ô liu nguyên chất , táo xay và cà rốt thơm ngon.\r\n  Hoàn toàn không có bơ và trứng.<br>\r\n    <br>\r\n    Bữa sáng sẽ là một thời gian vui vẻ mà người lớn và trẻ em sẽ được thưởng\r\n  thức những chiếc bánh quy độc đáo về hình dáng và hương vị này.<br>\r\n    <br>\r\n    Các công thức nấu ăn tốt nhất dành cho những đứa trẻ tôn trọng sức khỏe của\r\n  chúng, để chúng làm quen với hương vị ít ngọt ngay từ khi còn nhỏ. Bánh quy\r\n  có nhiều hương vị khác nhau và thơm ngon, không chứa đường tinh luyện và được\r\n  làm ngọt bằng xi-rô gạo và nước táo. Thu được bằng Bột mì cao cấp Senatore\r\n  Cappelli và dầu ô liu nguyên chất. Không có sữa và trứng. Vì một sản phẩm hữu\r\n  cơ mang đến và giáo dục những người trẻ nhất một chế độ ăn uống lành mạnh và\r\n  chân chính để họ trở thành những người trưởng thành có ý thức.</td></tr></tbody></table>', 'Xuất xứ : Sottolestelle –Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Egg Free, Milk Free<br><br>Non GMO<br><br>Vegan<br>', 1, '2022-12-20 11:29:03', '2022-12-20 11:29:03'),
(18, 'bqchckdS-350g.jpg', 'Bánh qui cacao hữu cơ không đường Sottolestelle 350g', 1, 150000.000, 100000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"306\" style=\"mso-height-source:userset;height:229.9pt\">\r\n  <td height=\"306\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:229.9pt;\r\n  width:529pt\">Thành phần: Bột mì 55%, xi-rô gạo , dầu hướng dương 11%, ca cao\r\n  3%, bỏng gạo 2%, muối.<br>\r\n    <br>\r\n    Vị ngọt ngào và mềm mại của cacao hòa quyện tuyệt vời với những hạt bỏng\r\n  gạo căng phồng, tạo nên một chiếc bánh ngọt không thể cưỡng lại được, được\r\n  làm từ dầu hướng dương và các thành phần chỉ thực vật, không có trứng hoặc\r\n  sữa<br>\r\n    <br>\r\n    Việc không có men làm tăng độ giòn của bánh quy và hương vị thực của các\r\n  nguyên liệu. Đây là một dòng sản phẩm thu được mà không sử dụng bất kỳ chất\r\n  tạo men nào, cả tự nhiên và hóa học. Một sự thay thế được tạo ra bởi sự kết\r\n  hợp giữa vị nhẹ và hương vị cho những người không dung nạp được men</td></tr></tbody></table>', 'Xuất xứ : Sottolestelle –Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Non GMO<br><br>Vegan<br><br>Egg Free , Milk Free, Yeast Free<br>', 1, '2022-12-20 11:30:32', '2022-12-20 11:30:32'),
(19, 'bqkmchcS-300g.jpg', 'Bánh qui kiều mạch cacao hữu cơ Sottolestelle 300g', 1, 140000.000, 140000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"514\" style=\"width: 386pt;\"><tbody><tr height=\"264\" style=\"mso-height-source:userset;height:198.0pt\">\r\n  <td height=\"264\" class=\"xl65\" align=\"left\" width=\"514\" style=\"height:198.0pt;\r\n  width:386pt\">Xuất xứ : Sottolestelle –Ý<br>\r\n    <br>\r\n    Shelf Life : 12 tháng kể từ ngày sản xuất<br>\r\n    <br>\r\n    Chứng nhận hữu cơ Châu Âu<br>\r\n    <br>\r\n    Gluten Free<br>\r\n    <br>\r\n    Non GMO<br>\r\n    <br>\r\n    Vegan.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"514\" style=\"width: 386pt;\"><tbody><tr height=\"264\" style=\"mso-height-source:userset;height:198.0pt\">\r\n  <td height=\"264\" class=\"xl65\" align=\"left\" width=\"514\" style=\"height:198.0pt;\r\n  width:386pt\">Xuất xứ : Sottolestelle –Ý<br>\r\n    <br>\r\n    Shelf Life : 12 tháng kể từ ngày sản xuất<br>\r\n    <br>\r\n    Chứng nhận hữu cơ Châu Âu<br>\r\n    <br>\r\n    Gluten Free<br>\r\n    <br>\r\n    Non GMO<br>\r\n    <br>\r\n    Vegan.</td></tr></tbody></table>', 1, '2022-12-20 11:32:15', '2022-12-20 11:32:15'),
(20, 'bqymtchcS-300g.png', 'Bánh qui yến mạch trái cây hữu cơ Sottolestelle 300g', 1, 145000.000, 145000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"385\" style=\"mso-height-source:userset;height:289.15pt\">\r\n  <td height=\"385\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:289.15pt;\r\n  width:529pt\">Thành Phần: Yến mạch cán 28%, bột mì nguyên cám 27%, đường mía,\r\n  dầu hướng dương , nho sultanas 7%, xi-rô gạo , táo 2%, bột hạt phỉ 1%<br>\r\n    <br>\r\n    Sản phẩm được tạo từ ngũ cốc nguyên hạt với yến mạch và trái cây, một sự\r\n  hòa quyện tuyệt vời giữa vị ngọt tự nhiên của trái cây với các chất xơ quý\r\n  giá có trong yến mạch cán mỏng và bột mì spelt nguyên cám.<br>\r\n    <br>\r\n    Hương vị của ngũ cốc được tăng cường bởi bột hạt phỉ, dành cho những ai\r\n  muốn thưởng thức tất cả sự chân thực và ngon lành tuyệt vời của nguồn nguyên\r\n  liệu luôn được lựa chọn cẩn thận.</td></tr></tbody></table>', 'Xuất xứ : Sottolestelle –Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Gluten Free<br><br>Non GMO<br><br>Vegan<br>', 1, '2022-12-20 11:34:46', '2022-12-20 11:34:46'),
(21, 'mokohccc-250g-Hoyer.jpg', 'Mật ong Keo ong hữu cơ cao cấp 250g Hoyer', 3, 335000.000, 335000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"480\" style=\"mso-height-source:userset;height:360.6pt\">\r\n  <td height=\"480\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:360.6pt;\r\n  width:529pt\">Mật ong được dùng như một loại thực phẩm giúp cung cấp năng\r\n  lượng, bồi bổ để tăng cường các cơ quan quan trọng trong cơ thể. Điều này đã\r\n  được thực hiện từ thời cổ đại. Các thành phần tích cực của mật ong, chẳng hạn\r\n  như glucose, fructose, flavonoid, polyphenol và axit hữu cơ, đóng một vai trò\r\n  quan trọng trong chất lượng của nó&nbsp;\r\n  Ngoài ra, mật ong nổi tiếng với các hoạt động sinh học, sinh lý và\r\n  dược lý của nó.<br>\r\n    <br>\r\n    Ong cũng tạo ra một hợp chất gọi là keo ong từ nhựa cây lá kim hoặc cây\r\n  thường xuân. Khi chúng kết hợp nhựa cây với chất thải của chính chúng và sáp\r\n  ong, chúng sẽ tạo ra một sản phẩm dính, màu nâu xanh dùng làm lớp phủ để xây\r\n  tổ ong. Đây là keo ong. Keo ong và các chất chiết xuất của nó có rất nhiều\r\n  ứng dụng trong việc điều trị các bệnh khác nhau do đặc tính khử trùng, chống\r\n  viêm, chống oxy hóa, kháng khuẩn, chống co thắt, kháng nấm, chống đông máu,\r\n  chống ung thư và điều hòa miễn dịch<br>\r\n    <br>\r\n    Những con ong mật đã phát hiện ra lớp phủ nhựa của chồi non của cây rụng lá\r\n  và cây lá kim làm nguyên liệu cho keo ong. Kết hợp với sự bài tiết của chính\r\n  cơ thể, một chất tự nhiên chất lượng cao được tạo ra để những con ong mật của\r\n  chúng ta có thể tự bảo vệ cho đến ngày nay. Keo ong mang lại cho mật ong hoa\r\n  chất lượng cao này hương vị đặc trưng của nó.<br>\r\n    <br>\r\n    Hàng ngàn năm trước, các nền văn minh cổ đại đã sử dụng keo ong vì các đặc\r\n  tính chữa bệnh của nó.<br>\r\n    <br>\r\n    Các nhà sản xuất từ Hoyer đã kết hợp mật ong cao cấp với chiết xuất keo ong\r\n  để cho ra đời 1 sản phẩm mang tính đột phá cao với rất nhiều lợi ích an toàn\r\n  cho một lối sống lành mạnh hơn.<br>\r\n    <br>\r\n    Sản phẩm này không thích hợp cho trẻ sơ sinh dưới 12 tháng tuổi.<br>\r\n    <br>\r\n    Sau khi mở, để khô và đóng chặt, tốt nhất là trong tủ lạnh!</td></tr></tbody></table>', 'Thành phần: mật ong hữu cơ cao cấp, Chiết xuất keo ong<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br>', 1, '2022-12-20 11:36:06', '2022-12-20 11:36:06'),
(22, 'mosochccc-250g-Hoyer.jpg', 'Mật ong Sữa ong chúa hữu cơ cao cấp 250g Hoyer', 3, 335000.000, 335000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"513\" style=\"mso-height-source:userset;height:385.15pt\">\r\n  <td height=\"513\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:385.15pt;\r\n  width:529pt\">Mật ong được dùng như một loại thực phẩm giúp cung cấp năng\r\n  lượng, bồi bổ để tăng cường các cơ quan quan trọng trong cơ thể. Điều này đã\r\n  được thực hiện từ thời cổ đại. Các thành phần tích cực của mật ong, chẳng hạn\r\n  như glucose, fructose, flavonoid, polyphenol và axit hữu cơ, đóng một vai trò\r\n  quan trọng trong chất lượng của nó&nbsp;\r\n  Ngoài ra, mật ong nổi tiếng với các hoạt động sinh học, sinh lý và\r\n  dược lý của nó.<br>\r\n    <br>\r\n    Sữa ong chúa, một chất giống như sữa ong chúa có màu trắng và sền sệt, là\r\n  một dạng bài tiết của tuyến hầu họng và tuyến hàm dưới từ ong thợ. Nó còn\r\n  được biết đến như một loại “siêu thực phẩm” chỉ được dùng cho ong chúa.<br>\r\n    <br>\r\n    Sữa ong chúa được sử dụng rộng rãi như một phức hợp dinh dưỡng trong chế độ\r\n  ăn uống để giúp chống lại các tình trạng sức khỏe mãn tính khác nhau. Hơn\r\n  nữa, nó là một trong những phương thuốc chữa bệnh có lợi cho con người trong\r\n  cả y học cổ truyền và hiện đại. Nhiều hoạt tính dược lý như tác dụng kháng\r\n  khuẩn, kháng u, antiallergy, chống viêm và điều hòa miễn dịch cũng được cho\r\n  là nhờ vào nó<br>\r\n    <br>\r\n    Sữa ong chúa được sử dụng cho bệnh hen suyễn, sốt cỏ khô, bệnh gan, viêm\r\n  tụy, khó ngủ (mất ngủ), hội chứng tiền kinh nguyệt (PMS), loét dạ dày, bệnh\r\n  thận, gãy xương, các triệu chứng mãn kinh, rối loạn da và cholesterol\r\n  cao<br>\r\n    <br>\r\n    Sản phẩm này không thích hợp cho trẻ sơ sinh dưới 12 tháng tuổi.<br>\r\n    <br>\r\n    Sau khi mở, để khô và đóng chặt, tốt nhất là trong tủ lạnh!</td></tr></tbody></table>', 'Thành phần: sữa ong chúa cô đặc (tương đương với 5.000 mg sữa ong chúa)<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br>', 1, '2022-12-20 11:37:35', '2022-12-20 11:37:35'),
(23, 'phmohccc=225g-Hoyer.png', 'Phấn hoa mật ong hữu cơ cao cấp 225g Hoyer', 3, 535000.000, 500000.000, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"705\" style=\"width: 529pt;\"><tbody><tr height=\"516\" style=\"mso-height-source:userset;height:387.0pt\">\r\n  <td height=\"516\" class=\"xl65\" align=\"left\" width=\"705\" style=\"height:387.0pt;\r\n  width:529pt\">Phấn hoa ong hữu cơ HOYER lấy từ các đàn ong của những người\r\n  nuôi ong vùng cao được chọn lọc, những người làm việc và được kiểm soát theo\r\n  các hướng dẫn nghiêm ngặt của quy định hữu cơ của EU về nuôi ong.<br>\r\n    <br>\r\n    Hệ thực vật nguyên bản và đa dạng ở vùng vừng đen nước Đức nơi bầy ong sinh\r\n  sống mang lại cho loại phấn hoa này hương vị đặc trưng và làm cho nó trở nên\r\n  có giá trị cao cấp như vậy.<br>\r\n    <br>\r\n    Thành phần của nó bao gồm sự kết hợp của phấn hoa, mật hoa, enzym, mật ong,\r\n  sáp và chất tiết của ong<br>\r\n    <br>\r\n    Phấn hoa ong là nguồn cung cấp protein thực vật chất lượng cao tuyệt vời.\r\n  Là một phần của lối sống lành mạnh, đóng góp giá trị vào sức khỏe\r\n  chung.<br>\r\n    <br>\r\n    Phấn hoa chứa nhiều protein, vitamin C và vitamin E. Đây cũng là một cách\r\n  tuyệt vời để cung cấp cho cơ thể bạn một nguồn bổ sung chất xơ cần thiết cho\r\n  hoạt động bình thường của cơ thể.<br>\r\n    <br>\r\n    Dồi Dào chất xơ<br>\r\n    <br>\r\n    Kho vitamin E&amp;C<br>\r\n    <br>\r\n    Giàu Protein<br>\r\n    <br>\r\n    Góp phần vào sự phát triển và duy trì khối lượng cơ, duy trì xương bình\r\n  thường. Góp phần bảo vệ tế bào khỏi stress oxy hóa. Giúp giảm căng thẳng mệt\r\n  mỏi. Góp phần vào quá trình chuyển hóa năng lượng bình thường.Tham gia vào\r\n  quá trình hình thành bình thường của collagen, một loại protein cơ bản là một\r\n  phần của nhiều cấu trúc dạng sợi, chẳng hạn như xương, sụn, da, nướu và\r\n  răng.<br>\r\n    <br>\r\n    Sau khi mở, để khô và đóng chặt, tốt nhất là trong tủ lạnh!<br>\r\n    <br>\r\n    </td></tr></tbody></table>', 'Thành phần: 100% Phấn hoa mật ong hữu cơ cao cấp<br><br>Shelf Life: 24 tháng từ ngày sản xuất<br><br>Sản xuất tại Đức<br><br>Chứng nhận hữu cơ Châu Âu DE-ÖKO-001<br>', 1, '2022-12-20 11:38:28', '2022-12-20 11:38:28'),
(24, 'sgdhc-1L-ProBios.jpg', 'Sữa gạo dừa hữu cơ 1L ProBios', 3, 119000.000, 100000.000, 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước,&nbsp; gạo 14%, nước cốt dừa 2%, dầu hướng dương, protein đậu, muối, hương liệu tự nhiên<br>', 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước,&nbsp; gạo 14%, nước cốt dừa 2%, dầu hướng dương, protein đậu, muối, hương liệu tự nhiên<br>', 1, '2022-12-20 11:40:30', '2022-12-20 11:40:30'),
(25, 'sghc-1L-ProBios.jpg', 'Sữa gạo hữu cơ 1L ProBios', 3, 110000.000, 110000.000, '<p>Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, dầu hướng dương, muối biển<br></p>', 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, dầu hướng dương, muối biển<br>', 1, '2022-12-20 11:41:44', '2022-12-20 11:41:44'),
(26, 'sghphc-1L-ProBios.jpg', 'Sữa gạo hạt phỉ hữu cơ 1L ProBios', 3, 135000.000, 100000.000, '<p>Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, hạt phỉ 3%, dầu hướng dương, muối biển<br></p>', 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, hạt phỉ 3%, dầu hướng dương, muối biển<br>', 1, '2022-12-20 11:43:05', '2022-12-20 11:43:05'),
(27, 'sghnhc-1L-ProBios.jpg', 'Sữa gạo hạnh nhân hữu cơ 1L ProBios', 3, 119000.000, 119000.000, '<p>Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần :nước, gạo 14%, hạnh nhân 1,2%, dầu hướng dương, muối biển, hương vị tự nhiên<br></p>', 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần :nước, gạo 14%, hạnh nhân 1,2%, dầu hướng dương, muối biển, hương vị tự nhiên<br>', 1, '2022-12-20 11:43:58', '2022-12-20 11:43:58'),
(28, 'sgChc-1L-ProBios.jpg', 'Sữa gạo Cacao hữu cơ 1L ProBios', 3, 135000.000, 125000.000, '<p>Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, ca cao 2,8%, dầu hướng dương, đường mía, bơ ca cao 0,6%, muối biển<br></p>', 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, ca cao 2,8%, dầu hướng dương, đường mía, bơ ca cao 0,6%, muối biển<br>', 1, '2022-12-20 11:45:16', '2022-12-20 11:45:16'),
(29, 'sgChc-200ml-ProBios.jpg', 'Sữa gạo Cacao hữu cơ 200ml ProBios', 3, 39000.000, 39000.000, 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, ca cao 2,8%, dầu hướng dương, đường mía, bơ ca cao 0,6%, muối biển<br>', 'Xuất xứ : ProBios – Ý<br><br>Shelf Life : 12 tháng kể từ ngày sản xuất<br><br>Chứng nhận hữu cơ Châu Âu<br><br>Vegan<br><br>Non GMO<br><br>Thành phần : nước, gạo 14%, ca cao 2,8%, dầu hướng dương, đường mía, bơ ca cao 0,6%, muối biển<br>', 1, '2022-12-20 11:46:40', '2022-12-20 11:46:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Hồng Sơn', 'sonnh.21it@vku.udn.vn', '0984399784', NULL, '$2y$10$1mS4tg0wgf24j6e67oNGZOX001lrX3BD5koPw0zAj6svcbUl0wXAW', 'Nghệ An', 'admin', 1, NULL, '2022-12-20 10:47:05', '2022-12-20 10:47:05'),
(2, 'Phạm Minh Tâm', 'tampm.21ad@vku.udn.vn', '0984399785', NULL, '$2y$10$dfOpKTko1RarY6juKdm83.FZH9JvENyz9T3FyvUss3vtpGP2PThP6', 'Quảng bình', 'customer', 1, NULL, '2022-12-20 11:55:42', '2022-12-20 11:55:42'),
(3, 'Nguyễn Thị Huyền Trang', 'trangnth.21it@vku.udn.vn', '0984399786', NULL, '$2y$10$lBmi09RhLQ8JnLgviVG8O.vCvh8ALPLCPYgDFVyfzAzI1yB5WlR/a', 'Quảng Bình', 'customer', 1, NULL, '2022-12-20 11:56:38', '2022-12-20 11:56:38'),
(4, 'Nguyễn Thị Thanh Vân', 'vanntt.21it@vku.udn.vn', '0335583859', NULL, '$2y$10$Qi/QIawQB.BA9uBQQxpl2.mwVQsQAJWlrfImWkMcOD54CEo7ETOTq', 'Quảng Nam', 'customer', 1, NULL, '2022-12-20 12:00:53', '2022-12-20 12:00:53'),
(5, 'Hoàng Văn Hiếu', 'hieuhv.21it@vku.udn.vn', '0984399787', NULL, '$2y$10$34si8/YbX9ojc4RK5NDOh.8LcwupXmVnRA80e3JSN6jaXAZXEIswu', 'Quảng Trị', 'customer', 1, NULL, '2022-12-20 12:01:49', '2022-12-20 12:01:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vote`
--

CREATE TABLE `vote` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `vote` double(9,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vote`
--

INSERT INTO `vote` (`id`, `user_id`, `product_id`, `vote`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 4.000, '2022-12-20 12:05:29', '2022-12-20 12:05:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vote_user_id_foreign` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vote`
--
ALTER TABLE `vote`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vote_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
