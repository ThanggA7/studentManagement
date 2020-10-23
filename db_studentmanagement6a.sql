-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 23, 2020 lúc 02:34 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_studentmanagement6a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `homework`
--

INSERT INTO `homework` (`id`, `studentName`, `fileName`, `time`) VALUES
(9, 'cuong', 'answer1.txt', '2020-09-25 22:32:34'),
(10, 'cuong', 'aswer2.txt', '2020-09-25 22:32:39'),
(11, 'cuong', 'New-Text-Document (1).txt', '2020-09-26 14:58:21'),
(12, 'cuong', 'de5.asm', '2020-09-26 15:38:58'),
(13, 'cuong', 'New-Text-Document.txt', '2020-09-26 17:13:15'),
(14, 'cuong', 'New-Text-Document (1).txt', '2020-09-27 21:38:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `userSendID` int(11) NOT NULL,
  `userReceiveID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `receiver` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `userSendID`, `userReceiveID`, `message`, `createdTime`, `receiver`, `sender`) VALUES
(67, 53, 14, 'Tin nhắn 1', '2020-09-26 08:18:59', 'cuong ', 'quan'),
(69, 53, 14, 'Đây là một tin nhắn.', '2020-09-26 08:19:23', 'cuong ', 'quan'),
(71, 53, 58, 'Chào Đại Ca Quân tôi là Admin', '2020-09-26 08:20:03', 'quan32 ', 'quan'),
(72, 14, 53, 'Hello How are you?', '2020-09-26 08:20:37', 'quan ', 'cuong'),
(75, 53, 8, 'Xin chào Trang', '2020-09-26 08:42:50', 'trang ', 'quan'),
(80, 14, 53, 'Đây là Cường', '2020-09-26 08:56:42', 'quan ', 'cuong'),
(91, 14, 63, 'Dinh cong menh', '2020-09-26 09:12:42', 'quan234 ', 'cuong'),
(97, 14, 34, 'local', '2020-09-26 09:28:53', 'nam ', 'cuong'),
(98, 14, 34, 'local', '2020-09-26 09:31:42', 'nam ', 'cuong'),
(100, 14, 8, 'haz', '2020-09-26 09:31:55', 'trang', 'cuong'),
(104, 14, 53, 'Đậu xanh loan', '2020-09-26 09:39:16', 'quan', 'cuong'),
(108, 14, 53, 'Here you are.', '2020-09-26 09:40:46', 'quan', 'cuong'),
(109, 14, 63, 'heye hey', '2020-09-26 09:41:45', 'quan234', 'cuong'),
(120, 53, 14, 'Hello How are you?', '2020-09-26 09:56:20', 'cuong', 'quan'),
(121, 53, 14, 'Tôi trở lại đây nhé,', '2020-09-26 09:56:52', 'cuong', 'quan'),
(128, 53, 14, 'Đừng có đùa.', '2020-09-27 15:56:48', 'cuong', 'quan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pin` varchar(15) NOT NULL,
  `fbID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `position`, `email`, `phone`, `pin`, `fbID`) VALUES
(8, 'trang', '827ccb0eea8a706c4c34a16891f84e7b', 'Huyền Trang', 'Student', 'huyencl2002@gmail.com', '021091234597', '', NULL),
(14, 'cuong', '827ccb0eea8a706c4c34a16891f84e7b', 'Hồng Cường Nguyễn', 'Student', 'cuongnguyen@gmail.com', '+84376448428', '549635', NULL),
(34, 'nam', '827ccb0eea8a706c4c34a16891f84e7b', 'Võ Văn Nam', 'Student', 'nam@gmail.com', '120291210', '', NULL),
(53, 'quan', '827ccb0eea8a706c4c34a16891f84e7b', 'Trung Quân Nguyễn', 'Teacher', 'trungquan12@gmail.com', '+84987950444', '821245', NULL),
(58, 'quan32', '827ccb0eea8a706c4c34a16891f84e7b', 'Trung Quan', 'Teacher', 'trungquanx@gmail.com', '+84987950444', '891765', NULL),
(63, 'quan234', '827ccb0eea8a706c4c34a16891f84e7b', 'Quan Trung', 'Student', 'truong23@gmail.com', '0234556557', '', NULL),
(64, 'dai12', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Đại', 'Student', 'dai@gmail.com', '091288231', '', NULL),
(65, 'dai27', '827ccb0eea8a706c4c34a16891f84e7b', 'Đại Đô', 'Student', 'dailo@mail.com', '09364454245', '', NULL),
(72, 'hoado', '827ccb0eea8a706c4c34a16891f84e7b', 'Hoa Nguyễn', 'Student', 'hoa@mgial.ocm', '0292319321', '', NULL),
(77, '', NULL, 'Tuân Hoàng', 'Student', '', NULL, '', '396782628147471'),
(86, 'hongcuongcl98', NULL, 'Hong Cuong Nguyen', 'Student', 'hongcuongcl98@gmail.com', NULL, '', '1638531632991720');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userSendID` (`userSendID`),
  ADD KEY `userReceiveID` (`userReceiveID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userSendID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`userReceiveID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
