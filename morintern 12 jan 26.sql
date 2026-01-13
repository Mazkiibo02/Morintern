-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jan 2026 pada 07.25
-- Versi server: 8.0.30
-- Versi PHP: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `morintern`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pesertas`
--

CREATE TABLE `calon_pesertas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesialisasi_id` bigint UNSIGNED DEFAULT NULL,
  `kelompok_id` bigint UNSIGNED DEFAULT NULL,
  `ketua_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pendaftar','menunggu','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendaftar',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `calon_pesertas`
--

INSERT INTO `calon_pesertas` (`id`, `nama_lengkap`, `email`, `password`, `google_id`, `no_telp`, `universitas`, `jurusan`, `spesialisasi_id`, `kelompok_id`, `ketua_id`, `tanggal_mulai`, `tanggal_selesai`, `cv`, `surat`, `github`, `linkedin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Hafidz Rahmatullah', 'vdz.rach02@gmail.com', '$2y$12$8Bt3Vn5CLXFIvJwCq2GEeunNIBFGy8SqPyrIm3TxVKKQxfAPLxfZK', NULL, '089630517466', NULL, NULL, NULL, NULL, NULL, '2026-01-07', '2026-01-07', '-', '-', NULL, NULL, 'pendaftar', NULL, '2026-01-06 22:59:34', '2026-01-06 22:59:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompoks`
--

CREATE TABLE `kelompoks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(7, '0001_01_01_000001_create_cache_table', 1),
(8, '0001_01_01_000002_create_jobs_table', 1),
(9, '2025_10_23_020051_create_interns_table', 1),
(10, '2025_10_24_015041_add_fields_to_interns_table', 1),
(11, '2025_10_24_064443_rename_interns_table_to_pesertas', 1),
(12, '2025_10_28_025438_create_penilaian_table', 1),
(13, '2025_10_28_025439_create_perusahaan_table', 1),
(14, '2025_10_28_025441_create_role_table', 1),
(15, '2025_10_28_025443_create_status_table', 1),
(16, '2025_11_04_000001_update_foreign_keys_on_peserta_calon_table', 1),
(17, '2025_11_11_010000_create_postingan_magangs_table', 1),
(18, '2025_11_11_020000_create_penilaian_magang_table', 1),
(19, '2025_11_12_034323_add_spesialisasi_id_to_calon_pesertas_table', 1),
(20, '2025_11_17_000000_make_password_nullable_on_peserta_calon', 1),
(21, '2025_11_18_000001_create_sessions_table', 1),
(22, '2025_11_21_000001_add_peserta_id_to_penilaian_magangs_table', 1),
(23, '2025_11_21_000002_add_requested_role_id_to_users_table', 1),
(24, '2025_11_22_000001_consolidate_roles_table', 1),
(25, '2025_11_22_000002_calon_pesertas_add_new_columns', 1),
(26, '2025_11_22_000003_calon_pesertas_backfill_spesialisasi_id', 1),
(27, '2025_11_22_000004_calon_pesertas_drop_old_columns', 1),
(28, '2025_11_22_000005_postingan_add_spesialisasi_ilustrasi', 1),
(29, '2025_11_22_000006_add_users_role_fk_if_needed', 1),
(30, '2025_11_26_085901_create_kelompok_table', 1),
(31, '2025_12_01_023713_sync_peserta_calon_table', 1),
(32, '2025_12_01_023738_sync_anggotas_table', 1),
(33, '2025_12_01_181347_add_penilaian_to_pesertas_table', 1),
(34, '2025_12_03_165848_add_foreign_key_peserta_id_to_penilaians', 1),
(36, '2026_01_07_052222_add_soft_deletes_to_spesialisasis_table', 2),
(37, '2025_12_04_063141_add_status_to_calon_pesertas_table', 3),
(38, '2025_12_08_add_user_id_to_penilaians_table', 4),
(39, '2025_10_28_025442_create_spesialisasi_table', 5),
(40, '2026_01_07_203000_add_deleted_at_to_spesialisasi_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint UNSIGNED NOT NULL,
  `peserta_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Mentor/Admin who assessed',
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `nilai_angka` int DEFAULT NULL,
  `file_penilaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rubrik_skor` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertas`
--

CREATE TABLE `pesertas` (
  `id` bigint UNSIGNED NOT NULL,
  `status` enum('pendaftar','menunggu','mendaftar','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendaftar',
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesialisasi_id` bigint UNSIGNED DEFAULT NULL,
  `kelompok_id` bigint UNSIGNED DEFAULT NULL,
  `ketua_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan_magangs`
--

CREATE TABLE `postingan_magangs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int NOT NULL DEFAULT '0',
  `spesialisasi_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `ilustrasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `postingan_magangs`
--

INSERT INTO `postingan_magangs` (`id`, `judul`, `deskripsi`, `kuota`, `spesialisasi_id`, `tanggal_mulai`, `tanggal_selesai`, `is_active`, `ilustrasi`, `created_at`, `updated_at`) VALUES
(1, 'Penyelam', 'Dolorem ut saepe dolorem aut dolor asperiores. Facere nostrum delectus dolorem nemo voluptas quibusdam. Dolor ea distinctio accusamus neque illum ab similique. Eum est sunt impedit et.', 5, 3, '2025-12-31', '2026-03-14', 1, NULL, '2025-12-26 17:53:17', '2025-12-26 17:53:17'),
(2, 'Perancang Busana', 'Aliquid impedit itaque autem. Voluptatibus ut nulla praesentium sed adipisci impedit maiores. Perferendis dolorem aut sed eius. Reiciendis totam labore nobis autem eos voluptates quo. Tempore ut commodi necessitatibus nam.', 4, 2, '2025-12-28', '2026-04-19', 1, NULL, '2025-12-26 17:53:17', '2025-12-26 17:53:17'),
(3, 'Seniman', 'Est rem et et quaerat eligendi repudiandae. Est dolore sapiente possimus labore. Aut reprehenderit debitis maiores mollitia impedit voluptas. Corrupti aut quod perferendis nemo quia.', 10, 1, '2026-01-13', '2026-03-13', 1, NULL, '2025-12-26 17:53:17', '2025-12-26 17:53:17'),
(6, 'Dokter', 'In aliquid vitae animi quod quis aut et quia. Ratione est omnis sit libero. Est rem necessitatibus totam eum nostrum nobis et. Qui impedit eos at sunt et sint.', 9, 4, '2026-01-04', '2026-04-05', 1, NULL, '2025-12-26 17:53:17', '2025-12-26 17:53:17'),
(8, 'Penyiar Radio', 'Et sed quia sequi ipsa nisi ullam. Iure eum ipsam dolor autem ratione accusamus rem ut. Quidem animi sint fuga veniam sit totam. Expedita fuga non quaerat delectus vero eos.', 6, 3, '2026-01-05', '2026-03-22', 1, NULL, '2025-12-26 17:53:17', '2025-12-26 17:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8h6XieV1piWjuW7WNbD5PqMjeXVlqn8b7oI8cE8h', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOFBFZVdCYzRNNW5xMEJZT2JwTzdNV21VZXpaUk5GYWY4NGVEZUtaVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJDcvaUUwRllOTFpWUC9GLkRPL0E4bGU1YVhBUjMuNmw2d0t1SkFpWjVzWEk0Q0F1YjdQZ3FpIjtzOjY6InRhYmxlcyI7YToyOntzOjQwOiJlZTViMWI0MzU1YjQxZmNkNjJjNWZmMzU4NzhlZjkxN19jb2x1bW5zIjthOjM6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNzoibmFtYV9zcGVzaWFsaXNhc2kiO3M6NToibGFiZWwiO3M6MTI6IlNwZXNpYWxpc2FzaSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MjM6InBvc3Rpbmdhbl9tYWdhbmdzX2NvdW50IjtzOjU6ImxhYmVsIjtzOjE2OiJKdW1sYWggUG9zdGluZ2FuIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyMDoicGVzZXJ0YV9jYWxvbnNfY291bnQiO3M6NToibGFiZWwiO3M6MTI6Ikp1bWxhaCBDYWxvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO319czo0MDoiMjBmOTExZmMxYmJlNWUxYmQzMTJjN2VkMmIxYTI3ZmZfY29sdW1ucyI7YTo3OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6Imp1ZHVsX3Bvc2lzaSI7czo1OiJsYWJlbCI7czoxMjoiSnVkdWwgcG9zaXNpIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czozMDoic3Blc2lhbGlzYXNpLm5hbWFfc3Blc2lhbGlzYXNpIjtzOjU6ImxhYmVsIjtzOjEyOiJTcGVzaWFsaXNhc2kiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjY6ImR1cmFzaSI7czo1OiJsYWJlbCI7czo2OiJEdXJhc2kiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6Imt1b3RhIjtzOjU6ImxhYmVsIjtzOjU6Ikt1b3RhIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJpbHVzdHJhc2kiO3M6NToibGFiZWwiO3M6OToiSWx1c3RyYXNpIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiVXBkYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX19czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1768200520);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesialisasi`
--

CREATE TABLE `spesialisasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_spesialisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spesialisasi`
--

INSERT INTO `spesialisasi` (`id`, `nama_spesialisasi`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Back End', NULL, NULL, NULL, NULL),
(2, 'Front End', NULL, NULL, NULL, NULL),
(3, 'System Analyst', NULL, NULL, NULL, NULL),
(4, 'Quality Assurance', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesialisasis`
--

CREATE TABLE `spesialisasis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_spesialisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spesialisasis`
--

INSERT INTO `spesialisasis` (`id`, `nama_spesialisasi`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Back End', NULL, NULL, NULL, NULL),
(2, 'Front End', NULL, NULL, NULL, NULL),
(3, 'System Analyst', NULL, NULL, NULL, NULL),
(4, 'Quality Assurance', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-12-26 17:53:16', '$2y$12$ylNa8Wss.o7en17Q7xfiYu/DRzIYaz1TfA2zHeNlF1lsUg4NG84L6', NULL, 'YaXybfjem6', '2025-12-26 17:53:17', '2025-12-26 17:53:17'),
(2, 'admin', 'admin1@gmail.com', NULL, '$2y$12$7/iE0FYNLZVP/F.DO/A8le5aXAR3.6l6wKuJAiZ5sXI4CAub7Pgqi', NULL, 'mkSzp3XdB5a0eMbaXkDbGaTtxG0wg155hOJDIz36jFztolJdxUuoZNbS24UJ', '2025-12-26 21:53:46', '2025-12-26 21:53:46'),
(3, 'admin', 'vdz.rach02@gmail.com', '2026-01-06 23:39:16', '$2y$12$LUBoTkxLbz9eXuyQrFKTW.5YeYKq1NKf5Ohd8pGblglBA1KaACKAy', '1', NULL, '2026-01-06 23:13:13', '2026-01-07 04:24:16'),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$12$0ZIx4K0qw1kiUauuoLQjHeKRzPEIxaSml1ySLet7kO5Yto9ZoqUdK', NULL, NULL, '2026-01-06 23:44:40', '2026-01-06 23:44:40'),
(5, 'admin1', 'admin2@gmail.com', NULL, '$2y$12$hKn09rbihK1LWoE4ljax9.iqq0xyC1Sebk3MCzPKYtU4zBtUgfF1a', NULL, NULL, '2026-01-07 03:39:50', '2026-01-07 03:39:50');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `calon_pesertas`
--
ALTER TABLE `calon_pesertas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calon_pesertas_email_unique` (`email`),
  ADD KEY `calon_pesertas_spesialisasi_id_foreign` (`spesialisasi_id`),
  ADD KEY `calon_pesertas_kelompok_id_foreign` (`kelompok_id`);

--
-- Indeks untuk tabel `kelompoks`
--
ALTER TABLE `kelompoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_peserta_id_foreign` (`peserta_id`),
  ADD KEY `penilaians_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesertas_email_unique` (`email`),
  ADD KEY `pesertas_spesialisasi_id_foreign` (`spesialisasi_id`),
  ADD KEY `pesertas_kelompok_id_foreign` (`kelompok_id`);

--
-- Indeks untuk tabel `postingan_magangs`
--
ALTER TABLE `postingan_magangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postingan_magangs_spesialisasi_id_foreign` (`spesialisasi_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spesialisasis`
--
ALTER TABLE `spesialisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon_pesertas`
--
ALTER TABLE `calon_pesertas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelompoks`
--
ALTER TABLE `kelompoks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `postingan_magangs`
--
ALTER TABLE `postingan_magangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `spesialisasis`
--
ALTER TABLE `spesialisasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `calon_pesertas`
--
ALTER TABLE `calon_pesertas`
  ADD CONSTRAINT `calon_pesertas_kelompok_id_foreign` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompoks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `calon_pesertas_spesialisasi_id_foreign` FOREIGN KEY (`spesialisasi_id`) REFERENCES `spesialisasis` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
  ADD CONSTRAINT `pesertas_kelompok_id_foreign` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompoks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pesertas_spesialisasi_id_foreign` FOREIGN KEY (`spesialisasi_id`) REFERENCES `spesialisasis` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `postingan_magangs`
--
ALTER TABLE `postingan_magangs`
  ADD CONSTRAINT `postingan_magangs_spesialisasi_id_foreign` FOREIGN KEY (`spesialisasi_id`) REFERENCES `spesialisasis` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
