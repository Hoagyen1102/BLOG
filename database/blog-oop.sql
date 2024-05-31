-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 04:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Linh tinh'),
(2, 'Học tập');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `total_like` int(255) DEFAULT 0,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `path`, `content`, `total_like`, `created`, `user_id`, `post_id`, `status`) VALUES
(1, '0001', 'comment nè', 1, '2024-05-27', 3, 1, 0),
(2, '0001.0002', 'comment típ', 0, '2024-05-27', 3, 1, 0),
(6, '0006', 'comment comment', 0, '2024-05-27', 1, 19, 0),
(8, '0001.0008', 'rep 1', 2, '2024-05-27', 3, 1, 0),
(9, '0001.0002.0009', 'rep comment típ', 0, '2024-05-27', 3, 1, 0),
(10, '0010', 'Hay', 1, '2024-05-30', 1, 22, 0),
(11, '0011', 'Test sub rep ', 1, '2024-05-30', 1, 22, 0),
(12, '0010.0012', 'rep hay', 1, '2024-05-30', 3, 22, 0),
(13, '0006.0013', 'Bình luận đã bị xóa!', 0, '2024-05-30', 4, 19, 1),
(14, '0006.0014', 'hi', 1, '2024-05-30', 4, 19, 0),
(16, '0006.0013.0016', 'ok', 0, '2024-05-30', 4, 19, 0),
(17, '0006.0014.0017', 'bar', 0, '2024-05-30', 4, 19, 0),
(18, '0006.0014.0018', '123456', 0, '2024-05-30', 4, 19, 0),
(19, '0019', 'xem vui vẻ!', 0, '2024-05-31', 3, 18, 0),
(23, '0023', 'nhớ like!', 0, '2024-05-31', 3, 18, 0),
(24, '0024', 'Chỉnh sửa chút là ổn', 0, '2024-05-31', 3, 23, 0),
(25, '0025', 'ảnh dưới vỡ rồi', 0, '2024-05-31', 3, 23, 0),
(26, '0025.0026', 'ảnh trên thì ổn', 0, '2024-05-31', 3, 23, 0),
(31, '0023.0031', 'ủng hộ nè', 0, '2024-05-31', 1, 18, 0),
(32, '0023.0031.0032', 'nhớ ra thêm nhiều nhé!', 0, '2024-05-31', 1, 18, 0),
(33, '0033', 'ảnh vỡ xỉu', 0, '2024-05-31', 1, 20, 0),
(34, '0033.0034', 'nhìn đau mắt', 0, '2024-05-31', 1, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_type_id` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `object_id`, `object_type_id`, `created`) VALUES
(89, 1, 19, 1, '2024-05-30'),
(93, 3, 6, 2, '2024-05-30'),
(94, 3, 1, 1, '2024-05-30'),
(95, 4, 23, 1, '2024-05-30'),
(96, 4, 6, 2, '2024-05-30'),
(99, 4, 8, 2, '2024-05-30'),
(101, 3, 11, 2, '2024-05-30'),
(103, 3, 10, 2, '2024-05-30'),
(107, 1, 18, 1, '2024-05-30'),
(108, 1, 1, 1, '2024-05-30'),
(109, 1, 1, 2, '2024-05-30'),
(110, 1, 8, 2, '2024-05-30'),
(111, 1, 14, 2, '2024-05-30'),
(112, 1, 12, 2, '2024-05-30'),
(113, 3, 23, 1, '2024-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `user_id`, `post_id`) VALUES
(1, 3, 9),
(2, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `object_types`
--

CREATE TABLE `object_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `object_types`
--

INSERT INTO `object_types` (`id`, `type_name`) VALUES
(1, 'post'),
(2, 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `total_like` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `total_like`, `views`, `user_id`, `status`, `created`, `updated`, `category_id`) VALUES
(1, 'Cùng ôn ISTQB Foundation(CTFL) v4.0 New! - Sample A - Phần một', 'cung-on-istqb-foundationctfl-v40-new---sample-a---phan-mot-22-05-24-09-06-28', '<p>Mình cùng nhau ôn luyện Certified Tester Foundation Level (CTFL) v4.0- Sample A nhé cả nhà. Question #27(1 Point) In your project there has been a delay in the release of a brand-new application and test execution started late, but you have very detailed domain knowledge and good analytical skills. The full list of requirements has not yet been shared with the team, but management is asking for some test results to be presented. Which test technique fits BEST in this situation? a) Checklist-based testing b) Error guessing c) Exploratory testing d) Branch testing Select ONE option. **Gợi ý: ** Câu hỏi \"Trong dự án của bạn đã có sự chậm trễ trong việc phát hành ứng dụng hoàn toàn mới và thực hiện thử nghiệm bắt đầu muộn nhưng bạn có kiến thức chuyên môn rất chi tiết và kỹ năng phân tích tốt. Danh sách đầy đủ của yêu cầu chưa được chia sẻ với nhóm, nhưng ban quản lý đang yêu cầu một số kết quả kiểm tra được trình bày. Kỹ thuật kiểm tra nào phù hợp TỐT NHẤT trong tình huống này? Đáp án sẽ là c) Exploratory testing: Kiểm thử khám phá. Vì đây là phương pháp testing hữu ích nhất khi có ít thông tin hoặc yêu cầu khách hàng chia sẻ chưa đầy đủ với mốc thời gian cấp bách để thử nghiệm. Question #28 (1 Point) Which of the following BEST describes the way acceptance criteria can be documented? a) Performing retrospectives to determine the actual needs of the stakeholders regarding a given user story b) Using the given/when/then format to describe an example test condition related to a given user story c) Using verbal communication to reduce the risk of misunderstanding the acceptance criteria by others d) Documenting risks related to a given user story in a test plan to facilitate the risk-based testing of a given user story Select ONE option. **Gợi ý: ** Keyword: acceptance criteria a) Performing retrospectives để xác định nhu cầu thực tế của các bên liên quan về một câu chuyện của người dùng được cung cấp. Incorrect vì Performing retrospectives được sử dụng để nắm bắt những bài học kinh nghiệm và để cải thiện quá trình phát triển và thử nghiệm, không ghi lại tiêu chí chấp nhận Đáp án b) Using the given/when/then format to describe an example test condition related to a given user story Sử dụng định dạng given/when/then để mô tả một điều kiện thử nghiệm mẫu liên quan đến một điều kiện nhất định câu chuyện người dùng. Correct vì nó đúng là tiêu chuẩn để ghi lại các tiêu chí chấp nhận c) Sử dụng giao tiếp bằng lời nói để giảm nguy cơ hiểu sai tiêu chí chấp nhận bởi người khác. Incorrect Giao tiếp bằng lời nói không cho phép thể chất ghi lại các tiêu chí chấp nhận như một phần của câu chuyện người dùng d) Ghi lại các rủi ro liên quan đến User story của người dùng nhất định trong kế hoạch kiểm tra để tạo điều kiện thuận lợi cho việc quản lý dựa trên rủi ro. kiểm tra một User story của người dùng nhất định. Incorrect Tiêu chí chấp nhận có liên quan đến User story của người dùng, không phải test plan Question #29 (1 Point) Consider the following user story: As an Editor I want to review content before it is published so that I can assure the grammar is correct and its acceptance criteria:  The user can log in to the content management system with \"Editor\" role  The editor can view existing content pages  The editor can edit the page content  The editor can add markup comments  The editor can save changes  The editor can reassign to the \"content owner\" role to make updates Which of the following is the BEST example of an ATDD test for this user story? a) Test if the editor can save the document after edit the page content b) Test if the content owner can log in and make updates to the content c) Test if the editor can schedule the edited content for publication d) Test if the editor can reassign to another editor to make updates Select ONE option. **Gợi ý: ** Đáp án a) Test if the editor can save the document after edit the page content. Vì Bài kiểm tra này bao gồm hai tiêu chí chấp nhận: một về chỉnh sửa tài liệu và một tài liệu về việc lưu các thay đổi cảu tài liệu sa khi chỉnh sửa Question #30 (1 Point) How do testers add value to iteration and release planning? a) Testers determine the priority of the user stories to be developed b) Testers focus only on the functional aspects of the system to be tested c) Testers participate in the detailed risk identification and risk assessment of user stories d) Testers guarantee the release of high-quality software through early test design during the release planning Select ONE option. **Gợi ý: ** Câu hỏi cách mà tester tăng thêm values (giá trị) cho kế hoạch iteration (test lặp lại) và release (phát hành phần mềm) Đáp án phù hợp nhất sẽ là c) Testers participate in the detailed risk identification and risk assessment of user stories - Tester tham gia vào việc xác định rủi ro chi tiết và đánh giá rủi ro của các user story của người dùng a) Incorrect. Vì Mức độ ưu tiên cho user story của người dùng được xác định bởi doanh nghiệp đại diện cùng với dev b) Incorrect. Vì Người kiểm thử tập trung vào cả chức năng và phi chức năng d) Incorrect. Vì Testing sớm không phải là một phần của kế hoạch release phần mềm. Thiết kế test design sớm không đảm bảo việc chất lượng phần mềm khi release vì trong quá trình phát triền yêu cầu của khách hàng thay đổi liên tục, việc thiết kế sớm có thể gây tốn chi phí do phải update liên tục. Question #31 (1 Point) Which TWO of the following options are the exit criteria for testing a system? a) Test environment readiness b) The ability to log in to the test object by the tester c) Estimated defect density is reached d) Requirements are translated into given/when/then format e) Regression tests are automated Select TWO options. **Gợi ý: ** Keyword: exit criteria Yêu cầu chọn \"TWO options\" nên sẽ có 2 đáp án đúng ở đây. c) Estimated defect density is reached và e) Regression tests are automated Vì a) đề cập đến Test environment - môi trường test, không thuộc exit criteria (tiêu chí đầu vào) b) Incorrect. Do đây là resource availability criterion (tiêu chí về tính sẵn có của nguồn lực) d) Incorrect. liên quan đến việc dịch tài liệu yêu cầu cũng là exit criteria (tiêu chí đầu vào) chứ không phải là exit criteria (tiêu chí đầu ra)</p>', 2, 244, 1, 1, '2024-05-22 09:06:28', '2024-05-31 08:53:22', 1),
(9, 'Bài viết thử', 'bai-viet-thu-23-05-24-04-18-26', '<h2>Làm sao để đăng bài?</h2><p>Làm như này nè</p>', 0, 29, 1, 1, '2024-05-23 04:18:26', '2024-05-30 04:54:12', 1),
(13, 'Lưu bài nháp ', 'luu-bai-nhap-24-05-24-10-06-26', '<p>dgsd</p>', 0, 4, 1, 0, '2024-05-24 10:06:26', '2024-05-30 11:00:41', 1),
(18, 'Đăng một bài viết về một tập phim conan', 'dang-mot-bai-viet-ve-mot-tap-phim-conan-24-05-24-11-52-22', '<h3>Đăng thử thôi</h3><p><strong>chữ đậm</strong></p><p><i>chữ nghiêng</i></p><p><a href=\"https://laravel.com/docs/11.x/queries\">https://laravel.com/docs/11.x/queries</a></p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=LWS67FaEMKA\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/LWS67FaEMKA\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure>', 1, 226, 3, 1, '2024-05-24 11:52:22', '2024-05-31 09:03:07', 1),
(19, 'XO 3 ô', 'xo-3-o-24-05-24-01-55-02', '<figure class=\"table\"><table><tbody><tr><td>X</td><td>O</td><td>O</td></tr><tr><td>O</td><td>O</td><td>X</td></tr><tr><td>X</td><td>X</td><td>O</td></tr></tbody></table></figure><p>XOXO</p>', 1, 59, 3, 1, '2024-05-24 01:55:02', '2024-05-30 04:55:09', 1),
(20, 'Cực quang', 'cuc-quang-24-05-24-02-36-47', '<figure class=\"image\"><img style=\"aspect-ratio:148/148;\" src=\"data:image/jpeg;base64,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\" alt=\"10 bức ảnh trời đêm đẹp nhất thế giới - Báo VnExpress Du lịch\" width=\"148\" height=\"148\"></figure>', 0, 84, 3, 1, '2024-05-24 02:36:47', '2024-05-31 09:05:39', 1),
(22, 'Úm ba la', 'um-ba-la-24-05-24-03-28-15', '<blockquote><p>A ba lúm</p><p>Ba a lúm</p><p>La ba úm</p></blockquote><p>&nbsp;</p><p>Doraemon - Tập 609</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=NESs1KPmtKM\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/NESs1KPmtKM\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure>', 0, 42, 1, 1, '2024-05-24 03:28:15', '2024-05-31 08:53:32', 1),
(23, 'Đăng ảnh thử', 'dang-anh-thu-24-05-24-03-35-14', '<figure class=\"image\"><img style=\"aspect-ratio:1024/601;\" src=\"https://phongma.vn/wp-content/uploads/2018/06/30-dia-diem-du-lich-da-nang-du-la-van-chua-het-hot-trong-nam-2017-phan-1-1-1024x601.jpg\" alt=\"Đà nẵng đẹp xỉu\" width=\"1024\" height=\"601\"></figure><figure class=\"image\"><img style=\"aspect-ratio:299/168;\" src=\"data:image/jpeg;base64,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\" alt=\"47 địa điểm du lịch Đà Nẵng đẹp đến mê ...\" width=\"299\" height=\"168\"></figure>', 2, 90, 1, 1, '2024-05-24 03:35:14', '2024-05-31 08:53:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 2,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `username`, `image`, `role`, `status`, `created`, `updated`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Đang học code', 'code12345', '2021/05/10/2021-05-10-162064087864382.png', 1, 1, '2017-09-16 11:34:12', '2024-05-24 15:14:36'),
(3, 'vuongnguyenthanhbinh@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Vương Nguyễn Thanh Bình', 'VuongBinh', '152333798956889.jpeg', 3, 1, '2018-06-01 06:09:14', '2024-05-24 15:15:14'),
(4, 'trieutandanh1997@gmail.com', '21232f297a57a5a743894a0e4a801fc3', ' Danh', 'DanhDanh', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:10:52', '2024-05-30 16:03:55'),
(5, 'nguyentungducbk@gmail.com', '21232f297a57a5a743894a0e4a801fc3', ' Äá»©c', 'Nguyá»…n TÃ¹ng', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:12:59', '2024-05-30 15:39:33'),
(6, 'ngochoang09121996@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'HoÃ ng', 'Tráº§n Ngá»c ', '2021/05/10/2021-05-10-162064087864382.png', 3, 0, '2018-06-01 06:13:52', '2024-05-30 15:39:33'),
(7, 'mictienhung@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'HÃ¹ng', 'Há»“ Tiáº¿n ', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:14:42', '2024-05-30 15:39:33'),
(8, 'leduchuy13t2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Huy', 'LÃª Äá»©c ', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:16:04', '2024-05-30 15:39:33'),
(9, 'hphuoclam92@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'LÃ¢m', 'HÃ  PhÆ°á»›c ', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:16:48', '2024-05-30 15:39:33'),
(10, 'lephuocninh7118@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ninh', 'LÃª PhÆ°á»›c ', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:17:46', '2024-05-30 15:39:33'),
(11, 'akiraphung97@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Phá»¥ng', 'Nguyá»…n VÄƒn', '2021/05/10/2021-05-10-162064087864382.png', 3, 0, '2018-06-01 06:19:07', '2024-05-30 15:39:33'),
(12, 'pvtinh1996@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Tá»‹nh', 'Phan VÄƒn ', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:19:56', '2024-05-30 15:39:33'),
(13, 'minhtoandut96@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ToÃ n', 'HoÃ ng Minh ', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:21:50', '2024-05-30 15:39:33'),
(14, 'dqviet08t3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Viá»‡t', 'ÄÃ o Quá»‘c ', '2021/05/10/2021-05-10-162064087864382.png', 3, 0, '2018-06-01 06:23:51', '2024-05-30 15:39:33'),
(16, 'vuonghungvinhit@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'VÄ©nh', 'VÆ°Æ¡ng HÆ°ng', '2021/05/10/2021-05-10-162064087864382.png', 3, 1, '2018-06-01 06:26:32', '2024-05-30 15:39:33'),
(21, 'modi.bixa0@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'modi', 'bixa', '2021/05/10/2021-05-10-162064087864382.png', 2, 1, '2021-05-31 12:00:51', '2024-05-30 15:39:33'),
(22, 'modi.bixa1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'modi', 'bixa', '2021/05/10/2021-05-10-162064087864382.png', 2, 1, '2021-05-31 12:10:26', '2024-05-30 15:39:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `object_types`
--
ALTER TABLE `object_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `object_types`
--
ALTER TABLE `object_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
