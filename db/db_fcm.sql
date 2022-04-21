-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2022 pada 09.57
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fcm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 00:32:36', 1),
(2, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 00:33:14', 1),
(3, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 00:34:10', 1),
(4, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 00:38:48', 1),
(5, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 00:45:00', 1),
(6, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 01:05:21', 1),
(7, '::1', 'rigilmakmun@gmail.com', 1, '2021-12-25 13:48:28', 1),
(8, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-18 18:23:58', 1),
(9, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 12:02:23', 1),
(10, '::1', 'rigilz48', NULL, '2022-01-19 13:28:36', 0),
(11, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 13:28:58', 1),
(12, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 18:20:18', 1),
(13, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 18:24:17', 1),
(14, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 18:26:15', 1),
(15, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 18:47:44', 1),
(16, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-19 18:48:58', 1),
(17, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-20 11:59:55', 1),
(18, '::1', 'rigilmakmun2@gmail.com', 2, '2022-01-20 18:40:34', 1),
(19, '::1', 'rigilz11', NULL, '2022-01-20 18:52:30', 0),
(20, '::1', 'rigilz48', NULL, '2022-01-20 18:52:45', 0),
(21, '::1', 'rigilmakmun2@gmail.com', 2, '2022-01-20 19:43:24', 1),
(22, '::1', 'rigilmakmun2@gmail.com', 2, '2022-01-20 19:47:50', 1),
(23, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-20 19:48:10', 1),
(24, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-21 14:46:10', 1),
(25, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-21 18:03:58', 1),
(26, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-22 10:52:56', 1),
(27, '::1', 'rigilmakmun@gmail.com', 1, '2022-01-22 16:42:00', 1),
(28, '::1', 'admin@admin.com', 7, '2022-01-22 18:10:16', 1),
(29, '::1', 'asda23123', NULL, '2022-01-22 18:56:49', 0),
(30, '::1', 'admin@gmail.com', 1, '2022-01-22 18:58:55', 1),
(31, '::1', 'admin@gmail.com', 1, '2022-01-23 16:26:52', 1),
(32, '::1', 'admin@gmail.com', 1, '2022-01-24 10:25:19', 1),
(33, '::1', 'admin@gmail.com', 1, '2022-01-24 22:15:07', 1),
(34, '::1', 'anggaraw21@gmail.com', 2, '2022-01-24 22:34:46', 1),
(35, '::1', 'admin@gmail.com', 1, '2022-01-27 16:37:24', 1),
(36, '::1', 'admin@gmail.com', 1, '2022-01-27 17:32:16', 1),
(37, '::1', 'admin', NULL, '2022-01-27 18:03:43', 0),
(38, '::1', 'admin', NULL, '2022-01-27 18:03:48', 0),
(39, '::1', 'admin', NULL, '2022-01-27 18:05:03', 0),
(40, '::1', 'admn', NULL, '2022-01-27 18:05:08', 0),
(41, '::1', 'admin@gmail.com', 1, '2022-01-27 18:05:28', 1),
(42, '::1', 'admin', NULL, '2022-01-27 18:07:31', 0),
(43, '::1', 'admin@gmail.com', 1, '2022-01-27 18:08:33', 1),
(44, '::1', 'admin@admin.com', 1, '2022-01-27 18:50:09', 1),
(45, '::1', 'anggaraw21@gmail.com', 2, '2022-01-27 19:40:07', 1),
(46, '::1', 'admin@admin.com', 1, '2022-01-28 23:00:48', 1),
(47, '::1', 'admin', NULL, '2022-01-29 14:08:25', 0),
(48, '::1', 'admin@admin.com', 1, '2022-01-29 14:08:34', 1),
(49, '::1', 'user@user.com', 2, '2022-01-29 19:26:18', 1),
(50, '::1', 'admin@admin.com', NULL, '2022-01-29 19:38:12', 0),
(51, '::1', 'admin@admin.com', 1, '2022-01-29 19:38:19', 1),
(52, '::1', 'admin@admin.com', 1, '2022-01-30 15:00:14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'blog', 'Manage Blog'),
(2, 'profile', 'Manage User Profile'),
(3, 'management-user', 'Manage All User'),
(4, 'management-menuaccess', 'Manage Menu Access'),
(5, 'category-blog', 'Manage Category Blog'),
(6, 'contact', 'Manage Contact');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_form`
--

CREATE TABLE `contact_form` (
  `id_contact` int(11) NOT NULL,
  `name_contact` varchar(100) NOT NULL,
  `email_contact` varchar(100) NOT NULL,
  `subject_contact` varchar(100) NOT NULL,
  `message_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fcm_blog`
--

CREATE TABLE `fcm_blog` (
  `id_blog` int(11) NOT NULL,
  `blog_img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'default_blog.png',
  `title_blog` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fcm_category`
--

CREATE TABLE `fcm_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `slug_category` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1640248949, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings_website`
--

CREATE TABLE `settings_website` (
  `id_website` int(11) NOT NULL,
  `img_website` varchar(255) NOT NULL,
  `name_website` varchar(255) NOT NULL,
  `description_website` text NOT NULL,
  `email_website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings_website`
--

INSERT INTO `settings_website` (`id_website`, `img_website`, `name_website`, `description_website`, `email_website`) VALUES
(1, 'logo-s3.png', 'Foodcast Cerita Makanan', '<h1>Selamat datang di Foodcast Cerita Makanan</h1>\r\n<h3 class=\"mt-4\">Kalian bisa mendengarkan Foodcast Cerita Makanan di berbagai macam platform yang tersedia dibawah ini!</h3>\r\n<div class=\"mt-4\">\r\n<div class=\"btn-platform scrollto d-inline-flex\"><a class=\"platform\" title=\"Spotify\" href=\"https://open.spotify.com/show/6lsgKoIYGQtQ2gXL2ZOLHW\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/spotify.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Apple Podcast\" href=\"https://podcasts.apple.com/id/podcast/foodcast-cerita-makanan/id1536975257\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/apple-podcast.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Google Podcast\" href=\"https://www.google.com/podcasts?feed=aHR0cHM6Ly9hbmNob3IuZm0vcy8zYmQyYmUzOC9wb2RjYXN0L3Jzcw==\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/google-podcasts.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Roov\" href=\"http://roov.id/podcast/701/overview?utm_source=line&amp;utm_medium=social\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/roov.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Anchor\" href=\"https://anchor.fm/foodcast-cerita-makanan\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/anchor.png\" alt=\"\" /></a></div>\r\n</div>\r\n<div class=\"mt-4\">\r\n<div class=\"btn-platform scrollto d-inline-flex\"><a class=\"platform\" title=\"Overcast\" href=\"https://overcast.fm/+le7a0JeHA\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/overcast.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Castbox\" href=\"https://castbox.fm/channel/Foodcast-Cerita-Makanan-id3455433\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/castbox.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Pocket Casts\" href=\"https://pca.st/ie9gc3za\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/pocket-casts.png\" alt=\"\" /></a> <a class=\"platform\" title=\"RadioPublic\" href=\"https://radiopublic.com/foodcast-cerita-makanan-69ZaMB\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/radiopublic.png\" alt=\"\" /></a> <a class=\"platform\" title=\"Breaker\" href=\"https://www.breaker.audio/foodcast-cerita-makanan\" target=\"_blank\"><img class=\"img-fluid\" src=\"../../assets/img/platform/breaker.png\" alt=\"\" /></a></div>\r\n</div>', 'foodcastceritamakanan@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `desc_user` text DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `soc_twitter` varchar(255) DEFAULT NULL,
  `soc_facebook` varchar(255) DEFAULT NULL,
  `soc_instagram` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `desc_user`, `user_image`, `soc_twitter`, `soc_facebook`, `soc_instagram`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@admin.com', 'admin', 'Admin istrator', 'Administrator', 'default.jpg', '', '', '', '$2y$10$d2yoLvRH8pAHwEm39j.FQ.XVUOqh40L.PUiV6bDIvWLNK2OYNR4zG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-25 00:32:17', '2022-01-27 19:37:58', NULL),
(2, 'user@user.com', 'user', 'User s', 'User', 'default.jpg', NULL, NULL, NULL, '$2y$10$d2yoLvRH8pAHwEm39j.FQ.XVUOqh40L.PUiV6bDIvWLNK2OYNR4zG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-22 19:00:47', '2022-01-22 19:10:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `fcm_blog`
--
ALTER TABLE `fcm_blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `fcm_category`
--
ALTER TABLE `fcm_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings_website`
--
ALTER TABLE `settings_website`
  ADD PRIMARY KEY (`id_website`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fcm_blog`
--
ALTER TABLE `fcm_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fcm_category`
--
ALTER TABLE `fcm_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settings_website`
--
ALTER TABLE `settings_website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fcm_blog`
--
ALTER TABLE `fcm_blog`
  ADD CONSTRAINT `fcm_blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
