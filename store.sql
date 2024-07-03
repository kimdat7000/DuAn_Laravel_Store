-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2024 lúc 06:37 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store`
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
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `id_product`, `id_order`, `name`, `image`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 'cum', 'https://via.placeholder.com/640x480.png/00ee00?text=quisquam', 3910.00, 2, 7820.00, '2024-06-05 10:24:44', '2024-06-05 10:24:44'),
(5, 4, 4, 'veniam', 'https://via.placeholder.com/640x480.png/005588?text=ut', 4344.00, 1, 4344.00, '2024-06-05 11:30:13', '2024-06-05 11:30:13'),
(6, 7, 4, 'praesentium', 'https://via.placeholder.com/640x480.png/005544?text=natus', 8700.00, 1, 8700.00, '2024-06-05 11:30:13', '2024-06-05 11:30:13'),
(11, 1, 9, 'cum', 'https://via.placeholder.com/640x480.png/00ee00?text=quisquam', 3910.00, 1, 3910.00, '2024-06-08 01:21:02', '2024-06-08 01:21:02'),
(17, 1, 15, 'cum', 'https://via.placeholder.com/640x480.png/00ee00?text=quisquam', 3910.00, 1, 3910.00, '2024-06-09 20:51:32', '2024-06-09 20:51:32'),
(18, 2, 16, 'ut', 'https://via.placeholder.com/640x480.png/002233?text=ut', 8041.00, 1, 8041.00, '2024-06-09 20:52:28', '2024-06-09 20:52:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'vel', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(2, 'et', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(3, 'mollitia', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(4, 'voluptatem', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(5, 'asperiores', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(6, 'labore', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(7, 'quasi', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(8, 'cum', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(9, 'blanditiis', '2024-06-04 20:20:07', '2024-06-04 20:20:07'),
(10, 'vel', '2024-06-04 20:20:07', '2024-06-04 20:20:07');

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
(4, '2024_05_13_035636_create_categories_table', 1),
(5, '2024_05_13_035643_create_products_table', 1),
(6, '2024_06_08_075511_create_vnpay_transactions_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_address` varchar(255) DEFAULT NULL,
  `receiver_phone` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_method` varchar(50) NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `receiver_name`, `receiver_address`, `receiver_phone`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `status`, `payment_method`, `order_date`, `total_amount`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, NULL, NULL, 'Nguyễn Kim Đạt', 'Eakar, Đắk Lắk', '0347343925', 'kimdat7000@gmail.com', 3, 'cod', NULL, 7820.00, '2024-06-05 10:24:44', '2024-06-06 10:10:41'),
(4, 1, NULL, NULL, NULL, 'Nguyễn Kim Đạt', 'Eakar, Đắk Lắk', '0347343925', 'kimdat7000@gmail.com', 4, 'vnpay', NULL, 13044.00, '2024-06-05 11:30:13', '2024-06-05 13:34:44'),
(9, 1, NULL, NULL, NULL, 'Nguyễn Kim Đạt', 'Eakar, Đắk Lắk', '0347343925', 'kimdat7000@gmail.com', 0, 'cod', NULL, 3910.00, '2024-06-08 01:21:02', '2024-06-08 01:21:02'),
(15, 1, 'Nguyễn Kim Đạt', 'Eakar, Đắk Lắk', '0347343925', 'Nguyễn Kim Đạt', 'Eakar, Đắk Lắk', '0347343925', 'kimdat7000@gmail.com', 0, 'cod', NULL, 3910.00, '2024-06-09 20:51:32', '2024-06-09 20:51:32'),
(16, 1, 'Đỗ Cao Hải Đăng', 'An Giang', '0321321331', 'Nguyễn Kim Đạt', 'Eakar, Đắk Lắk', '0347343925', 'kimdat7000@gmail.com', 0, 'cod', NULL, 8041.00, '2024-06-09 20:52:28', '2024-06-09 20:52:28');

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
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `view` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sold` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`, `view`, `sold`, `brand_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'cum', 'https://via.placeholder.com/640x480.png/00ee00?text=quisquam', 'Sed quia assumenda dolor molestiae consequatur dolor aut. Dolor non repellat ea excepturi aut magnam. Totam deserunt dolor molestias voluptas necessitatibus. Rem animi corporis nam soluta et et.', 3910.00, 2626, 4621, 0, 7, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(2, 'ut', 'https://via.placeholder.com/640x480.png/002233?text=ut', 'Laudantium perferendis animi necessitatibus ex reprehenderit est vel consequuntur. Accusamus autem atque dolorum culpa. Optio sed eum maxime et est aut repellat. Quis velit vel sit ut aut.', 8041.00, 8984, 83, 0, 3, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(3, 'id', 'https://via.placeholder.com/640x480.png/0022dd?text=est', 'Voluptatum aut necessitatibus tempora ipsum tempora iure. Magni repellendus ut autem et. Sint fugit saepe autem reprehenderit.', 8620.00, 5041, 3376, 0, 9, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(4, 'veniam', 'https://via.placeholder.com/640x480.png/005588?text=ut', 'Ea consequuntur totam provident asperiores commodi. Voluptas qui itaque quia et. Maxime praesentium omnis atque dolores mollitia illum.', 4344.00, 2507, 7121, 0, 8, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(5, 'ea', 'https://via.placeholder.com/640x480.png/002255?text=dolorem', 'Dolorem magnam iusto vel voluptas fugit id. Aliquid itaque nihil maxime. Neque delectus architecto ipsa eaque. Sunt nihil culpa quia voluptas eum cum perferendis.', 7625.00, 1076, 6070, 0, 9, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(6, 'nihil', 'https://via.placeholder.com/640x480.png/0077ee?text=minus', 'Voluptatem labore vel at totam dolorem. Porro deleniti beatae placeat dolor voluptatem eos ducimus. Eius voluptatum eos aut explicabo quidem. Magnam est perspiciatis eos id sit consequatur.', 4388.00, 244, 9003, 0, 7, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(7, 'praesentium', 'https://via.placeholder.com/640x480.png/005544?text=natus', 'Error veniam neque maiores cumque et. Enim necessitatibus vero aut iusto. Aspernatur rem blanditiis culpa quis consequatur earum enim.', 8700.00, 2442, 8438, 0, 2, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(8, 'nihil', 'https://via.placeholder.com/640x480.png/0088dd?text=aut', 'In perspiciatis deleniti magnam tenetur. Enim id aut facere vel fugiat. Ipsa ullam voluptatem neque voluptatem.', 8726.00, 9706, 2154, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(9, 'quia', 'https://via.placeholder.com/640x480.png/005511?text=dolorem', 'Qui illum aut voluptatem optio vero quam accusantium voluptas. Doloremque voluptas quos veritatis nostrum commodi magnam quidem. Est et incidunt maiores velit dolore aut minus enim.', 9364.00, 1582, 7286, 0, 3, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(10, 'maiores', 'https://via.placeholder.com/640x480.png/006699?text=et', 'Pariatur animi fugiat et cum. Aliquid non ipsam quidem alias vel quia id cumque. Placeat quibusdam sunt et dignissimos omnis. Voluptas facere ea quae ad corrupti quasi.', 5405.00, 8266, 9457, 0, 1, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(11, 'delectus', 'https://via.placeholder.com/640x480.png/00ccff?text=et', 'Reprehenderit sit rerum repudiandae quae fuga voluptatem et dolores. Sint deleniti libero quis consequatur illo. Quas animi deserunt ut non necessitatibus dolores a.', 8183.00, 9293, 8286, 0, 5, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(12, 'quisquam', 'https://via.placeholder.com/640x480.png/003300?text=culpa', 'Non quisquam aliquam eum laborum. Assumenda aut in repellendus et aut illum necessitatibus quaerat. Magni dicta cupiditate delectus velit debitis soluta. Aut praesentium praesentium et dolorum.', 3335.00, 5867, 8073, 0, 6, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(13, 'est', 'https://via.placeholder.com/640x480.png/0000dd?text=porro', 'Est natus iste ab facilis quasi numquam odit. Culpa vero ad provident expedita quae quidem. Possimus in labore qui. Ut eos illo consectetur ipsa.', 7615.00, 2691, 2575, 0, 8, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(14, 'doloremque', 'https://via.placeholder.com/640x480.png/00bb77?text=est', 'Adipisci excepturi quia itaque veritatis beatae facere. Eligendi et cumque aut doloribus. Odit possimus cum aut laboriosam.', 1833.00, 7891, 455, 0, 7, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(15, 'nulla', 'https://via.placeholder.com/640x480.png/00ccdd?text=omnis', 'Enim tempora optio qui perspiciatis. Quaerat veritatis eveniet qui numquam reiciendis nam qui.', 8697.00, 1623, 7177, 0, 6, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(16, 'aut', 'https://via.placeholder.com/640x480.png/0077dd?text=modi', 'Sint ipsum aut eveniet sed. Ullam eaque numquam tempore quaerat eos enim. Sapiente libero illum tempora voluptas. Numquam vitae error animi qui fugit.', 9565.00, 2733, 8059, 0, 7, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(17, 'ea', 'https://via.placeholder.com/640x480.png/00ff22?text=modi', 'Ea ex deserunt qui impedit rerum. Veniam excepturi eaque nulla voluptatem accusantium. Fugit impedit et iste voluptatem.', 5002.00, 3316, 6252, 0, 8, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(18, 'adipisci', 'https://via.placeholder.com/640x480.png/009988?text=quibusdam', 'Dignissimos voluptatibus tenetur nihil qui perferendis enim sint. In qui dolorum esse aut. Aut quo alias amet sapiente enim.', 9140.00, 2096, 4352, 0, 2, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(19, 'mollitia', 'https://via.placeholder.com/640x480.png/008866?text=rerum', 'Ut culpa perspiciatis aut. Nisi et quibusdam beatae dolores nihil. Ut temporibus incidunt eligendi vitae nihil possimus sit. Adipisci totam sit fuga et.', 2736.00, 7562, 5829, 0, 8, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(20, 'vitae', 'https://via.placeholder.com/640x480.png/004488?text=sunt', 'Quidem rerum dolor et tenetur qui nesciunt. Voluptas totam doloremque tenetur. Qui sit assumenda nisi ullam. Odio reprehenderit dicta beatae eaque.', 9052.00, 3569, 1104, 0, 3, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(21, 'et', 'https://via.placeholder.com/640x480.png/004466?text=iure', 'Cum ad et et voluptate beatae et voluptas. Totam in vitae doloremque assumenda repellat ducimus. Temporibus explicabo perferendis illum enim. Omnis rerum qui suscipit eum maxime molestias qui.', 9846.00, 3292, 2471, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(22, 'suscipit', 'https://via.placeholder.com/640x480.png/007766?text=illum', 'Accusamus atque quia quis omnis excepturi. Quis cumque ratione nam quis culpa voluptas quia deserunt. Dolores dignissimos omnis nulla fugiat.', 8296.00, 7107, 6628, 0, 9, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(23, 'inventore', 'https://via.placeholder.com/640x480.png/009900?text=ut', 'Assumenda voluptatum ex ut voluptas totam ad sit. Accusamus consectetur consequatur culpa rem dolores quo dolores corporis. Deleniti est culpa quia enim.', 8107.00, 383, 6366, 0, 5, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(24, 'et', 'https://via.placeholder.com/640x480.png/00eebb?text=odio', 'Reprehenderit nulla harum dolorum non. Itaque consequuntur nesciunt rerum labore cumque autem dolor.', 1829.00, 7190, 2869, 0, 9, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(25, 'consectetur', 'https://via.placeholder.com/640x480.png/0033ff?text=ipsa', 'Ab consequuntur qui quia ipsa. Debitis commodi iure aut mollitia expedita modi. Ea minima doloribus molestias animi vel earum.', 1751.00, 259, 7551, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(26, 'nulla', 'https://via.placeholder.com/640x480.png/007788?text=voluptas', 'Enim architecto id esse dolore ipsam et molestias dolorum. Impedit saepe officia et maiores accusamus nesciunt placeat. Velit nemo deleniti perspiciatis eum.', 7430.00, 3600, 1712, 0, 6, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(27, 'laboriosam', 'https://via.placeholder.com/640x480.png/00eeff?text=autem', 'Et sequi accusamus nihil omnis beatae. Accusamus omnis porro vitae in ex. Est ducimus exercitationem omnis. Cupiditate tenetur animi et.', 1154.00, 6595, 2548, 0, 6, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(28, 'et', 'https://via.placeholder.com/640x480.png/0066bb?text=sed', 'Eaque cum earum non nam culpa eaque. Iste et veniam praesentium qui magnam. Nulla vel neque tempora tenetur.', 2061.00, 6808, 6618, 0, 8, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(29, 'deleniti', 'https://via.placeholder.com/640x480.png/0099bb?text=possimus', 'Quia maxime non ullam exercitationem qui sint autem. Minus adipisci aut dolores enim. Nostrum labore est laudantium et ut quo.', 4503.00, 8792, 3883, 0, 9, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(30, 'et', 'https://via.placeholder.com/640x480.png/001155?text=blanditiis', 'Ut eius aliquid laborum et perferendis. Occaecati reiciendis sit distinctio asperiores.', 7058.00, 6209, 2526, 0, 2, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(31, 'illum', 'https://via.placeholder.com/640x480.png/00dd55?text=est', 'Vitae tempora qui ut nisi fugit sunt nihil. Tempora laudantium eos laudantium est. Ex quae vel officia consequatur. Quo at dolor dicta.', 7892.00, 6114, 4935, 0, 1, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(32, 'error', 'https://via.placeholder.com/640x480.png/004400?text=temporibus', 'Est dignissimos laudantium culpa omnis rerum eius. Blanditiis nostrum ad exercitationem officiis. Nobis sed aut illum vel.', 2537.00, 5575, 470, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(33, 'voluptatum', 'https://via.placeholder.com/640x480.png/00ff11?text=ea', 'Porro magnam autem ab omnis. Dolorem modi hic voluptatem nostrum ipsam quasi. Ipsam ut inventore ad. Perferendis qui ab omnis aut corrupti qui voluptates.', 4028.00, 2364, 4265, 0, 5, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(34, 'et', 'https://via.placeholder.com/640x480.png/003399?text=consequatur', 'Quibusdam architecto voluptatem nam totam quo ex accusantium. Et sit asperiores et delectus nostrum quidem accusamus. Est neque illo minus perspiciatis ea sunt laboriosam.', 1655.00, 1553, 552, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(35, 'recusandae', 'https://via.placeholder.com/640x480.png/00aa44?text=eligendi', 'Voluptas qui nihil labore eos. Dolor sint incidunt sed molestiae perspiciatis aut aspernatur. Praesentium non non consectetur et maxime in. Quam molestiae doloremque qui aliquam iste.', 3822.00, 7349, 5847, 0, 8, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(36, 'adipisci', 'https://via.placeholder.com/640x480.png/005599?text=asperiores', 'Assumenda a minus odio. Itaque ipsa qui ex. Harum expedita quas provident occaecati. Doloribus nihil natus eos sit neque impedit adipisci.', 9931.00, 866, 2853, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(37, 'itaque', 'https://via.placeholder.com/640x480.png/0022dd?text=minima', 'Quo non vel non sed a sint qui. Quia voluptas ea eum assumenda illum minus. Maiores optio velit velit rem praesentium. Voluptatem aperiam est laborum totam consequatur delectus alias.', 7377.00, 4061, 4327, 0, 9, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(38, 'voluptate', 'https://via.placeholder.com/640x480.png/000022?text=nam', 'Fuga a fugit dicta sit quae nisi iusto ex. In qui fuga necessitatibus sit. Beatae eos est autem perferendis. Culpa quis qui sint voluptatum ea sunt deserunt.', 7768.00, 7204, 7847, 0, 1, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(39, 'ea', 'https://via.placeholder.com/640x480.png/00ff44?text=ratione', 'Repellat quia repudiandae culpa sunt. Voluptas architecto aliquid quae corrupti. Molestias temporibus ex qui recusandae omnis nesciunt est omnis.', 1943.00, 255, 69, 0, 10, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(40, 'itaque', 'https://via.placeholder.com/640x480.png/009911?text=dignissimos', 'Sit qui atque quia quibusdam corrupti. Ut corrupti aut quis possimus. Qui neque ea veniam doloribus aut ratione et ipsum. Est vel provident eos sint et numquam ad.', 6939.00, 9788, 115, 0, 2, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(41, 'nobis', 'https://via.placeholder.com/640x480.png/0055bb?text=omnis', 'Quas sequi officia aut deleniti ab et. Fugiat pariatur sint quasi aut. Ea delectus dolor explicabo et vitae eos.', 6372.00, 502, 9232, 0, 3, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(42, 'repellat', 'https://via.placeholder.com/640x480.png/002299?text=quidem', 'Id nihil magnam excepturi fugit iure molestiae architecto. A odio delectus modi in eos unde. Quod fugiat in vel. Voluptatem nobis aspernatur cupiditate pariatur tempore.', 4289.00, 9769, 6094, 0, 1, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(43, 'consequuntur', 'https://via.placeholder.com/640x480.png/0066dd?text=sit', 'Odio nisi nisi itaque iusto repellat voluptas. Dicta eum consequatur tempora debitis voluptate. Quibusdam aut vel doloremque aut consequatur iusto dolor aperiam.', 2514.00, 1213, 1386, 0, 4, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(44, 'fugit', 'https://via.placeholder.com/640x480.png/002233?text=nostrum', 'Necessitatibus laboriosam reiciendis omnis aut dolores perspiciatis iste. Qui dolores eum libero incidunt delectus sunt aliquam. Magnam quis eveniet sunt hic voluptatum.', 1195.00, 1725, 9026, 0, 1, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(45, 'et', 'https://via.placeholder.com/640x480.png/007777?text=iste', 'Et eaque aut expedita qui impedit. Voluptatem repellendus et qui. Suscipit maxime voluptate consequatur voluptatem ut est reiciendis. Sunt temporibus et aperiam neque dolor.', 5702.00, 7981, 1231, 0, 3, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(46, 'mollitia', 'https://via.placeholder.com/640x480.png/00ee22?text=asperiores', 'Eos pariatur reiciendis corrupti. Voluptate praesentium sit quia ut impedit non. Tempora iure in inventore atque ipsam et ad.', 2901.00, 4763, 1833, 0, 5, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(47, 'pariatur', 'https://via.placeholder.com/640x480.png/001111?text=et', 'Aut dolores qui aut et et eum quia. Nam impedit ut voluptates omnis ea. In rerum nihil commodi nostrum consequatur. Ullam dolore ut aliquam dolor.', 1387.00, 7488, 6039, 0, 4, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(48, 'in', 'https://via.placeholder.com/640x480.png/007799?text=et', 'Quidem dolores quod occaecati. Eligendi minus repudiandae enim. Quos quaerat sit optio sapiente rerum rerum corrupti fuga. Quos fugit eos vitae et alias.', 8597.00, 8119, 583, 0, 7, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(49, 'dignissimos', 'https://via.placeholder.com/640x480.png/007766?text=est', 'Nihil dolorem culpa laudantium quas ducimus. Itaque vero quas voluptatem. Ducimus voluptate beatae sint accusamus et. Libero excepturi exercitationem corporis at numquam.', 5614.00, 4275, 430, 0, 4, '2024-06-04 20:20:28', '2024-06-04 20:20:28'),
(50, 'soluta', 'http://127.0.0.1:8000/upload/1717989451.webp', 'Dolores error labore laudantium a. Voluptatem cum nisi voluptatem molestias quisquam similique. Doloremque fugiat molestias laudantium in consequuntur.', 9276.00, 6399, 7881, 0, 3, '2024-06-04 20:20:28', '2024-06-09 20:17:31');

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
('U13jUwfEAAlAmhTvAwI7420mRYIXkXVI6CqpohAQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiajV4RFlOVXgwWmRvSDdzN00wcGgxVWQzMkFhcEhhTGk2dE52b2hGUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0X2RldGFpbCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzE3OTkxMDE3O319', 1717992622),
('uZ9Jp71rMUuqbYOc0pj3TMeViX2AddxGnHImtGBI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3JIMVllTlZoY2dOVWtEVVJhTzhHYmhBd0VrclhVVWFSZnFIR0dGayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYmVzdC1zZWxsZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718164369);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `locked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `birth_date`, `avatar`, `remember_token`, `created_at`, `updated_at`, `role`, `locked`) VALUES
(1, 'Nguyễn Kim Đạt', 'kimdat7000@gmail.com', '2024-06-04 20:21:15', '$2y$12$vRbhGuP5clZcIYYwpGVxduddPRKu1Jy6SH2LfhX9SfdLxh9Sqo2VK', '0347343925', 'Eakar, Đắk Lắk', '2004-04-03', 'avatar/1717608239.jpg', 'cBpqRjJUtstF4eZ48sNBzHm1PjXqwahmtUlG3NeKekqLx6k9SHkPTRMKOJQ4', '2024-06-04 20:21:15', '2024-06-05 10:23:59', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay_transactions`
--

CREATE TABLE `vnpay_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `transaction_ref` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_id_product_foreign` (`id_product`),
  ADD KEY `carts_id_order_foreign` (`id_order`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_id_user_foreign` (`id_user`);

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
-- Chỉ mục cho bảng `vnpay_transactions`
--
ALTER TABLE `vnpay_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `vnpay_transactions`
--
ALTER TABLE `vnpay_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
