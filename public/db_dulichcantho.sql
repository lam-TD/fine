-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2017 lúc 08:14 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_dulichcantho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_anuong`
--

CREATE TABLE `dlct_anuong` (
  `id` int(10) UNSIGNED NOT NULL,
  `au_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `au_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_binhluan`
--

CREATE TABLE `dlct_binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `bl_binhluan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bl_trangthai` tinyint(1) NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_chitietlichtrinh`
--

CREATE TABLE `dlct_chitietlichtrinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ctlt_gioithieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ctlt_ngaygiodukien` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lt_idlichtrinh` int(10) UNSIGNED NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_danhgia`
--

CREATE TABLE `dlct_danhgia` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `dg_diem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_diadiem`
--

CREATE TABLE `dlct_diadiem` (
  `id` int(10) UNSIGNED NOT NULL,
  `dd_tendiadiem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dd_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dd_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dd_sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dd_kinhdo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dd_vido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_dichvu`
--

CREATE TABLE `dlct_dichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_gioithieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giomocua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giodongcua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giacaonhat` int(11) NOT NULL,
  `dv_giathapnhat` int(11) NOT NULL,
  `dv_trangthai` tinyint(1) NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_hinhanh`
--

CREATE TABLE `dlct_hinhanh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ha_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ha_hinhchitiet1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ha_hinhchitiet2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_khachsan`
--

CREATE TABLE `dlct_khachsan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ks_tenkhachsan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ks_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ks_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_lichtrinh`
--

CREATE TABLE `dlct_lichtrinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `lt_ngaylichtrinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lt_tenlichtrinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lt_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_loaihinhsukien`
--

CREATE TABLE `dlct_loaihinhsukien` (
  `id` int(10) UNSIGNED NOT NULL,
  `lhsk_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidung`
--

CREATE TABLE `dlct_nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `nd_tendangnhap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nd_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_quocgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_ngonngu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidungcanhan`
--

CREATE TABLE `dlct_nguoidungcanhan` (
  `id` int(10) UNSIGNED NOT NULL,
  `cn_tennguoidung` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidungdoanhnghiep`
--

CREATE TABLE `dlct_nguoidungdoanhnghiep` (
  `id` int(10) UNSIGNED NOT NULL,
  `dn_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dn_tendoanhnghiep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dn_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dn_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_phuongtien`
--

CREATE TABLE `dlct_phuongtien` (
  `id` int(10) UNSIGNED NOT NULL,
  `pt_tenphuongtien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pt_loaihinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_sukien`
--

CREATE TABLE `dlct_sukien` (
  `id` int(10) UNSIGNED NOT NULL,
  `sk_tensukien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sk_ngaybatdau` date NOT NULL,
  `sk_ngayketthuc` date NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `lhsk_idloaihinhsukien` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_thamquan`
--

CREATE TABLE `dlct_thamquan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tq_tendiemthamquan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tq_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_tukhoa`
--

CREATE TABLE `dlct_tukhoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `tk_tukhoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_tukhoa_dichvu`
--

CREATE TABLE `dlct_tukhoa_dichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `tk_idtukhoa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_vuichoi`
--

CREATE TABLE `dlct_vuichoi` (
  `id` int(10) UNSIGNED NOT NULL,
  `vc_tendiemvuichoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vc_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_yeuthich`
--

CREATE TABLE `dlct_yeuthich` (
  `id` int(10) UNSIGNED NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(23, '2017_11_02_142109_create_nguoidung_table', 1),
(24, '2017_11_02_143248_create_diadiem_table', 1),
(25, '2017_11_02_143901_create_lichtrinh_table', 1),
(26, '2017_11_02_144022_create_chitietlichtrinh_table', 1),
(27, '2017_11_02_144140_create_dichvu_table', 1),
(28, '2017_11_02_144243_create_loaihinhsukien_table', 1),
(29, '2017_11_02_144358_create_sukien_table', 1),
(30, '2017_11_02_144540_create_binhluan_table', 1),
(31, '2017_11_02_151955_create_danhgia_table', 1),
(32, '2017_11_02_152627_create_thamquan_table', 1),
(33, '2017_11_02_152802_create_phuongtien_table', 1),
(34, '2017_11_02_152910_create_anuong_table', 1),
(35, '2017_11_02_152958_create_khachsan_table', 1),
(36, '2017_11_02_153038_create_vuichoi_table', 1),
(37, '2017_11_09_123423_create_yeuthich_table', 1),
(38, '2017_11_13_141540_create_tukhoa_table', 1),
(39, '2017_11_13_144257_create_tukhoa_dichvu_table', 1),
(40, '2017_12_13_233705_create_nguoidungcanhan_table', 1),
(41, '2017_12_13_235129_create_nguoidungdoanhnghiep_table', 1),
(42, '2017_12_18_141111_create_hinhanh_table', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_anuong_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_binhluan_dv_iddichvu_foreign` (`dv_iddichvu`),
  ADD KEY `dlct_binhluan_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_chitietlichtrinh_lt_idlichtrinh_foreign` (`lt_idlichtrinh`),
  ADD KEY `dlct_chitietlichtrinh_dd_iddiadiem_foreign` (`dd_iddiadiem`);

--
-- Chỉ mục cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dlct_danhgia_dv_iddichvu_nd_idnguoidung_unique` (`dv_iddichvu`,`nd_idnguoidung`),
  ADD KEY `dlct_danhgia_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_diadiem_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_dichvu_dd_iddiadiem_foreign` (`dd_iddiadiem`);

--
-- Chỉ mục cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_hinhanh_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_khachsan_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlct_nguoidung`
--
ALTER TABLE `dlct_nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dlct_nguoidung_nd_tendangnhap_unique` (`nd_tendangnhap`);

--
-- Chỉ mục cho bảng `dlct_nguoidungcanhan`
--
ALTER TABLE `dlct_nguoidungcanhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_nguoidungcanhan_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_nguoidungdoanhnghiep`
--
ALTER TABLE `dlct_nguoidungdoanhnghiep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_nguoidungdoanhnghiep_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_phuongtien`
--
ALTER TABLE `dlct_phuongtien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_phuongtien_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_sukien_dd_iddiadiem_foreign` (`dd_iddiadiem`),
  ADD KEY `dlct_sukien_lhsk_idloaihinhsukien_foreign` (`lhsk_idloaihinhsukien`);

--
-- Chỉ mục cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_thamquan_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_tukhoa`
--
ALTER TABLE `dlct_tukhoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlct_tukhoa_dichvu`
--
ALTER TABLE `dlct_tukhoa_dichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_tukhoa_dichvu_dv_iddichvu_foreign` (`dv_iddichvu`),
  ADD KEY `dlct_tukhoa_dichvu_tk_idtukhoa_foreign` (`tk_idtukhoa`);

--
-- Chỉ mục cho bảng `dlct_vuichoi`
--
ALTER TABLE `dlct_vuichoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_vuichoi_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nd_idnguoidung` (`dd_iddiadiem`),
  ADD KEY `dlct_yeuthich_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_nguoidung`
--
ALTER TABLE `dlct_nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_nguoidungcanhan`
--
ALTER TABLE `dlct_nguoidungcanhan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_nguoidungdoanhnghiep`
--
ALTER TABLE `dlct_nguoidungdoanhnghiep`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_phuongtien`
--
ALTER TABLE `dlct_phuongtien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_tukhoa`
--
ALTER TABLE `dlct_tukhoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_tukhoa_dichvu`
--
ALTER TABLE `dlct_tukhoa_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_vuichoi`
--
ALTER TABLE `dlct_vuichoi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  ADD CONSTRAINT `dlct_anuong_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  ADD CONSTRAINT `dlct_binhluan_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_binhluan_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  ADD CONSTRAINT `dlct_chitietlichtrinh_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_chitietlichtrinh_lt_idlichtrinh_foreign` FOREIGN KEY (`lt_idlichtrinh`) REFERENCES `dlct_lichtrinh` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  ADD CONSTRAINT `dlct_danhgia_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_danhgia_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  ADD CONSTRAINT `dlct_diadiem_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  ADD CONSTRAINT `dlct_dichvu_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  ADD CONSTRAINT `dlct_hinhanh_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  ADD CONSTRAINT `dlct_khachsan_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_nguoidungcanhan`
--
ALTER TABLE `dlct_nguoidungcanhan`
  ADD CONSTRAINT `dlct_nguoidungcanhan_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_nguoidungdoanhnghiep`
--
ALTER TABLE `dlct_nguoidungdoanhnghiep`
  ADD CONSTRAINT `dlct_nguoidungdoanhnghiep_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_phuongtien`
--
ALTER TABLE `dlct_phuongtien`
  ADD CONSTRAINT `dlct_phuongtien_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  ADD CONSTRAINT `dlct_sukien_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_sukien_lhsk_idloaihinhsukien_foreign` FOREIGN KEY (`lhsk_idloaihinhsukien`) REFERENCES `dlct_loaihinhsukien` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  ADD CONSTRAINT `dlct_thamquan_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_tukhoa_dichvu`
--
ALTER TABLE `dlct_tukhoa_dichvu`
  ADD CONSTRAINT `dlct_tukhoa_dichvu_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_tukhoa_dichvu_tk_idtukhoa_foreign` FOREIGN KEY (`tk_idtukhoa`) REFERENCES `dlct_tukhoa` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_vuichoi`
--
ALTER TABLE `dlct_vuichoi`
  ADD CONSTRAINT `dlct_vuichoi_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  ADD CONSTRAINT `dlct_yeuthich_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_yeuthich_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
