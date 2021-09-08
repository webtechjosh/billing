-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2021 at 08:53 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vyaparbill`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_details`
--

CREATE TABLE `tbl_bill_details` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `prefix` varchar(15) NOT NULL,
  `bill_type` enum('Proforma','Tax','Receipt','Invoice') NOT NULL,
  `gstno` varchar(25) NOT NULL,
  `gst_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `state` varchar(55) NOT NULL,
  `state_code` varchar(2) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `billno` int(5) NOT NULL,
  `particulars` longtext NOT NULL,
  `narration` varchar(255) NOT NULL,
  `bill_footer` varchar(555) NOT NULL,
  `email` varchar(555) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_details` varchar(555) NOT NULL,
  `invoice_date` date NOT NULL,
  `created_by` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bill_details`
--

INSERT INTO `tbl_bill_details` (`id`, `pid`, `prefix`, `bill_type`, `gstno`, `gst_amount`, `paid_amount`, `party_name`, `address`, `state`, `state_code`, `mobileno`, `billno`, `particulars`, `narration`, `bill_footer`, `email`, `payment_mode`, `payment_details`, `invoice_date`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 5, 'USER', 'Tax', '07AAHCD5938L1Z6', 0, 0, 'Gail India Pvt. Ltd. ', 'Sector 1, Block E, Noida', 'Delhi', '07', '9582734364', 6, '{\"1\":{\"desc\":\"Row1\",\"hsn\":\"7542\",\"rate\":\"7542\",\"gst\":\"18\",\"mrpgst\":\"8900.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"8900.00\"}}', '<p>TEst proforma</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Kotak Mahindra Bank</b>\r\n                                                    <br>Account Name: <b>Digisajilo India Pvt. Ltd.</b>\r\n                                                    <br>Account Number: <b>0113962790</b>\r\n                                                    <br>IFSC Code: <b>KKBK0000218</b>\r\n                                                    <br>Branch: <b>Kalka ji, New De', 'moosakhan92@gmail.com', '', '', '0000-00-00', 1, '2020-12-07 05:25:13', '2020-12-10 00:30:09'),
(5, 5, 'TAX', 'Tax', '07AAHCD5938L1Z6', 0, 0, 'PRD Logistics', 'ICD Container Dadri', 'Haryana', '06', '9971618434', 1, '{\"1\":{\"desc\":\"Tax\",\"hsn\":\"7854\",\"rate\":\"1875\",\"gst\":\"18\",\"mrpgst\":\"2213.00\",\"qty\":\"2\",\"disc\":\"0\",\"total\":\"4426.00\"}}', '<p>Tax Invoice</p>', '                          We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Kotak Mahindra Bank</b>\r\n                        <br>Account Name: <b>Digisajilo India Pvt. Ltd.</b>\r\n                        <br>Account Number: <b>0113962790</b>\r\n                        <br>IFSC Code: <b>KKBK0000218</b>\r\n                        <br>Branch: <b>Kalka ji, New Delhi</b>\r\n                        <br>UPI: <b>DIGISAJILO@KOTAK</b>        \r\n           ', 'moosakhan92@gmail.com', 'credit', '{\"amount\":\"452\",\"paid_amount\":\"400\",\"outstanding_amount\":\"50\"}', '2020-12-07', 2, '2020-12-07 05:53:01', '2020-12-07 05:56:12'),
(6, 5, 'second', 'Proforma', '07AAHCD5938L1Z6', 0, 0, 'Gail India Pvt. Ltd. ', 'Sector 1, Block E, Noida', 'Delhi', '07', '9582734364', 7, '{\"1\":{\"desc\":\"mobile\",\"hsn\":\"3344\",\"rate\":\"15000\",\"gst\":\"18\",\"mrpgst\":\"16815.00\",\"qty\":\"3\",\"disc\":\"5\",\"total\":\"50445.00\"},\"2\":{\"desc\":\"laptop\",\"hsn\":\"2222\",\"rate\":\"35000\",\"gst\":\"18\",\"mrpgst\":\"41300.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"41300.00\"}}', '<p>two products testing narration</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Kotak Mahindra Bank</b>\r\n                                                    <br>Account Name: <b>Digisajilo India Pvt. Ltd.</b>\r\n                                                    <br>Account Number: <b>0113962790</b>\r\n                                                    <br>IFSC Code: <b>KKBK0000218</b>\r\n                                                    <br>Branch: <b>Kalka ji, New De', 'moosakhan92@gmail.com', '', '', '0000-00-00', 1, '2020-12-07 23:06:40', '2020-12-10 01:02:04'),
(7, 5, '', 'Proforma', '07AAHCD5938L1Z6', 0, 0, 'Gail India Pvt. Ltd.  01', 'Sector 1, Block E, Noida', 'Delhi', '07', '9582734364', 8, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>TESTING Rakesh</b>\r\n                                                    <br>Account Name: <b>Account Name</b>\r\n                                                    <br>Account Number: <b>Account Number</b>\r\n                                                    <br>IFSC Code: <b>IFSC Code</b>\r\n                                                    <br>Branch: <b>Branch</b>\r\n                     ', 'moosakhan92@gmail.com', '', '', '0000-00-00', NULL, '2020-12-11 02:44:18', '2020-12-11 02:44:18'),
(8, 5, 'aa', 'Proforma', '', 0, 0, 'anmol & co.', 'a-44', 'Delhi', '07', '9971618434', 9, '{\"1\":{\"desc\":\"new item\",\"hsn\":\"2525\",\"rate\":\"5000\",\"gst\":\"18\",\"mrpgst\":\"5900.00\",\"qty\":\"2\",\"disc\":\"5\",\"total\":\"11210.00\"}}', '<p>test</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Kotak</b><br>Account Name: Digisajilo<br>Account Number: <b>Account Number</b>\r\n                                                    <br>IFSC Code: <b>IFSC Code</b>\r\n                                                    <br>Branch: <b>Branch</b>\r\n                                                    <br>UPI: <b>UPI ID</b>', 'digisajilo@gmail.com', '', '', '0000-00-00', NULL, '2020-12-11 04:48:22', '2020-12-11 04:48:22'),
(9, 5, 'mk', 'Proforma', '07AAHCD5938L1Z6', 0, 0, 'Gail India Pvt. Ltd.  01', 'Sector 1, Block E, Noida', 'Delhi', '07', '9582734364', 10, '{\"1\":{\"desc\":\"my item\",\"hsn\":\"4444\",\"rate\":\"700\",\"gst\":\"18\",\"mrpgst\":\"826.00\",\"qty\":\"5\",\"disc\":\"10\",\"total\":\"3717.00\"}}', '<p>only for testing purpose by mkuk<br></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>icici bank</b>\r\n                                                    <br>Account Name: <b>mkuk web</b>\r\n                                                    <br>Account Number: <b>10203052400</b>\r\n                                                    <br>IFSC Code: <b>icici025874</b>\r\n                                                    <br>Branch: <b>sector 2</b>\r\n                             ', 'moosakhan92@gmail.com', '', '', '0000-00-00', NULL, '2020-12-11 05:41:03', '2020-12-11 05:41:03'),
(10, 5, 'mmm', 'Tax', '07AAHCD5938L1Z6', 0, 0, 'Gail India Pvt. Ltd.', 'Sector 1, Block E, Noida', 'Delhi', '07', '9582734364', 7, '{\"1\":{\"desc\":\"my item tax\",\"hsn\":\"2444\",\"rate\":\"700\",\"gst\":\"18\",\"mrpgst\":\"826.00\",\"qty\":\"5\",\"disc\":\"10\",\"total\":\"3717.00\"}}', '<p>tax invoice testing<br></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>icici bank</b>\r\n                                                    <br>Account Name: <b>mkuk web</b>\r\n                                                    <br>Account Number: <b>10203052400</b>\r\n                                                    <br>IFSC Code: <b>icici025874</b>\r\n                                                    <br>Branch: <b>sector 2</b>\r\n                            ', 'moosakhan92@gmail.com', '', '{\"amount\":\"\",\"company\":\"\",\"loan_number\":\"\",\"fin_amount\":\"\",\"fin_amount_apid\":\"\",\"cheque_no\":\"\",\"branch\":\"\",\"payment_date\":\"\",\"payment_ref_utr\":\"\",\"paid_amount\":\"\",\"outstanding_amount\":\"\"}', '2020-11-12', NULL, '2020-12-11 05:48:15', '2020-12-11 05:48:15'),
(11, 5, 'mk', 'Proforma', '', 0, 0, 'farhan & co.', 'Sector 1, Block E, Noida', 'Andaman and Nicobar Islands', '35', '9971618434', 11, '{\"1\":{\"desc\":\"first item\",\"hsn\":\"4444\",\"rate\":\"500\",\"gst\":\"18\",\"mrpgst\":\"590.00\",\"qty\":\"5\",\"disc\":\"5\",\"total\":\"2802.50\"},\"2\":{\"desc\":\"second item\",\"hsn\":\"5555\",\"rate\":\"1000\",\"gst\":\"18\",\"mrpgst\":\"1180.00\",\"qty\":\"2\",\"disc\":\"5\",\"total\":\"2242.00\"}}', '<p>without adding party<br></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>icici bank</b>\r\n                                                    <br>Account Name: <b>mkuk web tech</b>\r\n                                                    <br>Account Number: <b>10203052400</b>\r\n                                                    <br>IFSC Code: <b>icici025874</b>\r\n                                                    <br>Branch: <b>sector 2</b>\r\n                        ', 'moosakhan92@gmail.com', '', '', '0000-00-00', NULL, '2020-12-11 06:12:20', '2020-12-11 06:12:20'),
(12, 2, '', 'Proforma', '', 0, 0, 'Tarun Ghutey', '', 'Delhi', '07', '+916398709828', 1, '{\"1\":{\"desc\":\"Digi 1\",\"hsn\":\"1212\",\"rate\":\"20000\",\"gst\":\"18\",\"mrpgst\":\"23600.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"21240.00\"}}', '<p>Duration - 1 year</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Digisajilo@gmail.com', '', '', '2030-11-01', NULL, '2020-12-11 07:17:51', '2020-12-11 08:10:31'),
(13, 2, '', 'Proforma', '', 0, 0, 'Nitesh', 'xyz gali number 10', 'Delhi', '07', '8802894639', 2, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1212\",\"rate\":\"20000\",\"gst\":\"18\",\"mrpgst\":\"23600.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"21240.00\"},\"2\":{\"desc\":\"SSL\",\"hsn\":\"2131\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"10620.00\"},\"3\":{\"desc\":\"DIGI 2\",\"hsn\":\"2132\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"10620.00\"}}', '<p><b>Duration - 1212</b></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'nitesh.citi01@gmail.com', '', '', '0000-00-00', NULL, '2020-12-12 07:16:10', '2020-12-12 07:16:10'),
(14, 21, '', 'Proforma', '', 0, 0, '', '', '', '', '8802894639', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>Ttgduhvdyh</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>12345667788</b>\r\n                                                    <br>IFSC Code: <b>Egctvdrg</b>\r\n                                                    <br>Branch: <b>Dghufvvf</b>\r\n                                 ', 'tghutey@gmail.com', '', '', '0000-00-00', NULL, '2020-12-12 23:53:02', '2020-12-12 23:53:02'),
(15, 30, 'Proforma', 'Proforma', '745821', 0, 0, 'RAkesh', 'TESTING ADDRESS', 'Delhi', '07', '321478932', 1, '{\"1\":{\"desc\":\"Row1\",\"hsn\":\"7854\",\"rate\":\"145\",\"gst\":\"18\",\"mrpgst\":\"171.00\",\"qty\":\"2\",\"disc\":\"0\",\"total\":\"342.00\"}}', '<p>Proforma Narration</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'smartwebdev2007@gmail.com', '', '', '0000-00-00', NULL, '2020-12-14 02:10:45', '2020-12-14 02:10:45'),
(16, 32, 'RR', 'Proforma', '', 0, 0, 'Rahul Retailer Service', 'DLF City, Gurugram', 'Haryana', '06', '5555555555', 1, '{\"1\":{\"desc\":\"Chair\",\"hsn\":\"8989\",\"rate\":\"500\",\"gst\":\"18\",\"mrpgst\":\"590.00\",\"qty\":\"10\",\"disc\":\"0\",\"total\":\"5900.00\"},\"2\":{\"desc\":\"Table\",\"hsn\":\"6969\",\"rate\":\"700\",\"gst\":\"18\",\"mrpgst\":\"826.00\",\"qty\":\"5\",\"disc\":\"0\",\"total\":\"4130.00\"}}', '<p>Demo Narration</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: SBI<b></b><br>Account Name: Demo Company<br>Account Number: 1010101010<b></b><br>IFSC Code: SBI0001947<br>Branch: Delhi<b></b><br>UPI: demo@paytm<b></b>', 'mkuk92@gmail.com', '', '', '0000-00-00', NULL, '2020-12-14 02:21:20', '2020-12-14 02:21:20'),
(17, 32, 'TR', 'Tax', '', 0, 0, 'Rahul Retailer', 'India', 'Delhi', '07', '5555555555', 1, '{\"1\":{\"desc\":\"CHAIR\",\"hsn\":\"5858\",\"rate\":\"500\",\"gst\":\"18\",\"mrpgst\":\"590.00\",\"qty\":\"10\",\"disc\":\"0\",\"total\":\"5900.00\"},\"2\":{\"desc\":\"TABLE\",\"hsn\":\"6565\",\"rate\":\"700\",\"gst\":\"18\",\"mrpgst\":\"826.00\",\"qty\":\"5\",\"disc\":\"0\",\"total\":\"4130.00\"}}', '<p>Amount paid by demo</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: SBI<br>Account Name: Demo&nbsp;<br>Account Number: 1010101010<b></b><br>IFSC Code: SBI0001947<br>Branch: Delhi<b></b><br>UPI: demo@paytm<b></b>', 'rahuldemoxyz@gmail.com', 'cash', '{\"amount\":\"10030\"}', '1970-01-01', NULL, '2020-12-14 02:39:55', '2020-12-14 02:39:55'),
(18, 29, 'PRO', 'Proforma', '18AABCU9603R1ZM', 0, 0, 'Tesing', 'TEsting Address', 'Delhi', '07', '9874532147', 1, '{\"1\":{\"desc\":\"Row1\",\"hsn\":\"7854\",\"rate\":\"1545\",\"gst\":\"18\",\"mrpgst\":\"1823.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"1823.00\"},\"2\":{\"desc\":\"Row2\",\"hsn\":\"7895\",\"rate\":\"1175\",\"gst\":\"18\",\"mrpgst\":\"1387.00\",\"qty\":\"2\",\"disc\":\"0\",\"total\":\"2774.00\"}}', '<p>Proforma Narration</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>ICICI Bank</b>\r\n                                                    <br>Account Name: <b>CHAITANYA TECHNOSOFT</b>\r\n                                                    <br>Account Number: <b>258741258</b>\r\n                                                    <br>IFSC Code: <b>ICICI0029</b>\r\n                                                    <br>Branch: <b>Noida</b>\r\n                        ', 'rk.webdev2007@gmail.com', '', '', '2020-12-01', NULL, '2020-12-14 06:03:55', '2020-12-15 04:53:13'),
(19, 29, 'TAX', 'Tax', '18AABCU9603R1ZM', 0, 0, 'Tax Party', 'TAx Address', 'Chattisgarh', '22', '9875412358', 1, '{\"1\":{\"desc\":\"Row\",\"hsn\":\"7854\",\"rate\":\"1785\",\"gst\":\"18\",\"mrpgst\":\"2106.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"2106.00\"}}', '<p>Tax Narration</p>', '                                                                                                                                                            We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>ICICI Bank</b>\r\n                                                    <br>Account Name: <b>CHAITANYA TECHNOSOFT</b>\r\n                                                    <br>Account Number: <b>258741258</b>\r\n                              ', 'rk.webdev2007@gmail.com', 'cash', '{\"amount\":\"4500\"}', '2021-01-01', NULL, '2020-12-14 06:13:10', '2020-12-15 04:58:40'),
(20, 2, '', 'Tax', '08ABHPA4413B1ZF', 0, 0, 'A. H. RANDER MARBLES ', 'B No.22 Godown, Bye Pass Road, Makrana,', 'Rajasthan', '08', '9829078504', 1, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1213\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"2\",\"disc\":\"10\",\"total\":\"21240.00\"},\"2\":{\"desc\":\"DIGI 2\",\"hsn\":\"1214\",\"rate\":\"20000\",\"gst\":\"18\",\"mrpgst\":\"23600.00\",\"qty\":\"5\",\"disc\":\"20\",\"total\":\"94400.00\"}}', '<p>Duration - 2 Years</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                         ', 'Digisajilo@gmail.com', 'cheque', '{\"amount\":\"115640\",\"cheque_no\":\"213134\",\"branch\":\"Icici Bank\",\"payment_date\":\"15\\/12\\/2020\"}', '1970-01-01', NULL, '2020-12-14 14:40:31', '2020-12-14 14:40:31'),
(21, 2, '', 'Proforma', '08ABHPA4413B1ZF', 0, 0, 'A. H. RANDER MARBLES ', 'B No.22 Godown, Bye Pass Road, Makrana,', 'Rajasthan', '08', '9829078504', 3, '{\"1\":{\"desc\":\"Digi1\",\"hsn\":\"7854\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '<p>Duration One year</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                          ', 'Digisajilo@gmail.com', '', '', '2020-12-15', NULL, '2020-12-15 06:21:04', '2020-12-15 06:21:04'),
(22, 32, 'ff', 'Proforma', '', 0, 0, 'Rahul Retailer', 'India', 'Delhi', '07', '5555555555', 2, '{\"1\":{\"desc\":\"ffff\",\"hsn\":\"2525\",\"rate\":\"500\",\"gst\":\"18\",\"mrpgst\":\"590.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"590.00\"}}', '<p>test narration</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>SBI</b>\r\n                                                    <br>Account Name: <b>Demo Name</b>\r\n                                                    <br>Account Number: <b>1010101010</b>\r\n                                                    <br>IFSC Code: <b>SBI0001947</b>\r\n                                                    <br>Branch: <b>Delhi</b>\r\n                                        ', 'rahuldemoxyz@gmail.com', '', '', '2020-12-16', NULL, '2020-12-16 06:11:12', '2020-12-16 06:11:12'),
(23, 32, 'Pro', 'Proforma', '', 0, 0, 'Rahul Retailer', 'India', 'Delhi', '07', '5555555555', 3, '{\"1\":{\"desc\":\"dd\",\"hsn\":\"7854\",\"rate\":\"1452\",\"gst\":\"0\",\"mrpgst\":\"1452.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"1452.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>SBI</b>\r\n                                                    <br>Account Name: <b>Demo Name</b>\r\n                                                    <br>Account Number: <b>1010101010</b>\r\n                                                    <br>IFSC Code: <b>SBI0001947</b>\r\n                                                    <br>Branch: <b>Delhi</b>\r\n                                        ', 'rahuldemoxyz@gmail.com', '', '', '2020-12-15', NULL, '2020-12-16 06:13:38', '2020-12-16 06:13:38'),
(24, 32, 'ee', 'Proforma', '', 0, 0, 'Rahul Retailer', 'India', 'Delhi', '07', '5555555555', 4, '{\"1\":{\"desc\":\"new item\",\"hsn\":\"3333\",\"rate\":\"1500\",\"gst\":\"18\",\"mrpgst\":\"1770.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"1770.00\"}}', '<p>test</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>SBI</b>\r\n                                                    <br>Account Name: <b>Demo Name</b>\r\n                                                    <br>Account Number: <b>1010101010</b>\r\n                                                    <br>IFSC Code: <b>SBI0001947</b>\r\n                                                    <br>Branch: <b>Delhi</b>\r\n                                        ', 'rahuldemoxyz@gmail.com', '', '', '2020-12-16', NULL, '2020-12-16 06:21:17', '2020-12-16 06:21:17'),
(25, 2, '', 'Proforma', '08AOHPB8084L1ZJ', 0, 0, 'IINSHA CREATIONS', 'Plot No.17, Ganesh Nagar, VKI, , -', 'Rajasthan', '08', '9414782440', 4, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1212\",\"rate\":\"16949.15\",\"gst\":\"18\",\"mrpgst\":\"20000\",\"qty\":\"1\",\"disc\":\"12\",\"total\":\"17600.00\"},\"2\":{\"desc\":\"DIGI 2\",\"hsn\":\"1213\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"5\",\"total\":\"11210.00\"}}', '<p>Duration - 1 Year</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                          ', 'nitmishra007@gmail.com', '', '', '2020-12-16', NULL, '2020-12-16 07:41:22', '2020-12-16 07:41:22'),
(26, 2, '', 'Tax', '08AQPPC1704L1ZT', 0, 0, 'Royal Rose Industries', 'BNo J-51-52, RIICO INDL AREA,', 'Rajasthan', '08', '7014849846', 2, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1212\",\"rate\":\"20000\",\"gst\":\"18\",\"mrpgst\":\"23600.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"21240.00\"},\"2\":{\"desc\":\"DIGI 2\",\"hsn\":\"1313\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"5\",\"total\":\"11210.00\"}}', '<p><b>Duration - 1 Year</b></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                         ', 'abbhatia.ab@gmail.com', 'cheque', '{\"amount\":\"32450\",\"cheque_no\":\"122131\",\"branch\":\"HDFC BANK\",\"payment_date\":\"21\\/12\\/2020\"}', '2020-12-21', NULL, '2020-12-21 07:55:38', '2020-12-21 07:55:38'),
(27, 29, 'TAX', 'Tax', '18AABCU9603R1ZM', 0, 0, 'Rakesh Test Tax', 'DigiSajilio', 'Delhi', '07', '9874532147', 2, '{\"1\":{\"desc\":\"Row1\",\"hsn\":\"7854\",\"rate\":\"1452\",\"gst\":\"18\",\"mrpgst\":\"1713.00\",\"qty\":\"2\",\"disc\":\"0\",\"total\":\"3426.00\"}}', '<p>Tax Invoice Narration Testing</p>', '                                                                                                                                                                                                                                                                                                                        We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>ICICI Bank</b>\r\n                                                    <br>Account', 'rk.webdev2007@gmail.com', 'cdcard', '{\"amount\":\"4500\"}', '2020-12-22', NULL, '2020-12-22 00:21:30', '2020-12-22 03:38:56'),
(28, 34, '', 'Proforma', '', 0, 0, 'Bharat', '1419 Kucha Ustad Hira Delhi - 110006', 'Delhi', '07', '8860832641', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'arvindbhatiya535@gmail.com', '', '', '2020-12-08', NULL, '2020-12-22 04:57:05', '2020-12-22 04:57:05'),
(29, 34, '3', 'Tax', '', 0, 0, 'Bharat', '1419 Kucha Ustad Hira Delhi - 110006', 'Delhi', '07', '08860832641', 1, '{\"1\":{\"desc\":\"Digi1\",\"hsn\":\"1231\",\"rate\":\"200000\",\"gst\":\"12\",\"mrpgst\":\"224000.00\",\"qty\":\"1\",\"disc\":\"5\",\"total\":\"212800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>ICICI</b>\r\n                                                    <br>Account Name: <b>Arvind</b>\r\n                                                    <br>Account Number: <b>1234567891011</b>\r\n                                                    <br>IFSC Code: <b>12553ty7ghhvghv</b>\r\n                                                    <br>Branch: <b>Chandani Chowck </b>\r\n                     ', 'arvindbhatiya535@gmail.com', 'cdcard', '{\"amount\":\"150000\"}', '2020-12-16', NULL, '2020-12-22 05:10:50', '2020-12-22 05:10:50'),
(30, 29, 'PRO', 'Proforma', '18AABCU9603R1ZM', 0, 0, 'Sai Traders', 'Anand Ashram Marg', 'Delhi', '07', '9874532178', 2, '{\"1\":{\"desc\":\"Row\",\"hsn\":\"7854\",\"rate\":\"1452\",\"gst\":\"18\",\"mrpgst\":\"1713.00\",\"qty\":\"2\",\"disc\":\"0\",\"total\":\"3426.00\"},\"2\":{\"desc\":\"Row1\",\"hsn\":\"7458\",\"rate\":\"1500\",\"gst\":\"17\",\"mrpgst\":\"1755.00\",\"qty\":\"3\",\"disc\":\"0\",\"total\":\"5265.00\"}}', '<p>Proforma Narration</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>ICICI Bank</b>\r\n                                                    <br>Account Name: <b>CHAITANYA TECHNOSOFT</b>\r\n                                                    <br>Account Number: <b>258741258</b>\r\n                                                    <br>IFSC Code: <b>ICICI0029</b>\r\n                                                    <br>Branch: <b>Noida</b>\r\n                        ', 'rk.webdev2007@gmail.com', '', '', '2020-12-22', NULL, '2020-12-23 02:24:25', '2020-12-23 02:24:25'),
(31, 2, '', 'Proforma', '08AQPPC1704L1ZT', 0, 0, 'Royal Rose Industries', 'BNo J-51-52, RIICO INDL AREA,', 'Rajasthan', '08', '7014849846', 5, '{\"1\":{\"desc\":\"Digi 1\",\"hsn\":\"1212\",\"rate\":\"1000\",\"gst\":\"18\",\"mrpgst\":\"1180.00\",\"qty\":\"2\",\"disc\":\"10\",\"total\":\"2124.00\"},\"2\":{\"desc\":\"Digi 2\",\"hsn\":\"1213\",\"rate\":\"1000\",\"gst\":\"18\",\"mrpgst\":\"1180.00\",\"qty\":\"10\",\"disc\":\"10\",\"total\":\"10620.00\"}}', '<p><b>Duration&nbsp; - 2 Years</b></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                          ', 'Ruchighutey@gmail.com', '', '', '2020-12-23', NULL, '2020-12-23 10:58:17', '2020-12-23 10:58:17'),
(32, 2, '', 'Tax', '08AQPPC1704L1ZT', 0, 0, 'Royal Rose Industries', 'BNo J-51-52, RIICO INDL AREA,', 'Delhi', '07', '7014849846', 3, '{\"1\":{\"desc\":\"Digi 1\",\"hsn\":\"1213\",\"rate\":\"1000\",\"gst\":\"18\",\"mrpgst\":\"1180.00\",\"qty\":\"2\",\"disc\":\"10\",\"total\":\"2124.00\"},\"2\":{\"desc\":\"Digi 2\",\"hsn\":\"1214\",\"rate\":\"1000\",\"gst\":\"18\",\"mrpgst\":\"1180.00\",\"qty\":\"10\",\"disc\":\"10\",\"total\":\"10620.00\"}}', '<p>Duration 1 Year</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                         ', 'Ruchighutey@gmail.com', 'finance', '{\"amount\":\"12744\",\"company\":\"HDFC\",\"loan_number\":\"1212131\",\"fin_amount\":\"12000\",\"fin_amount_apid\":\"744\"}', '2020-12-23', NULL, '2020-12-23 11:01:45', '2020-12-23 11:01:45'),
(33, 38, '', 'Proforma', '', 0, 0, '', '', '', '', '', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', '', '', '0000-00-00', NULL, '2020-12-30 11:17:32', '2020-12-30 11:17:32'),
(34, 38, '', 'Proforma', '', 0, 0, '', '', '', '', '', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', '', '', '0000-00-00', NULL, '2020-12-30 11:17:38', '2020-12-30 11:17:38'),
(35, 38, '', 'Proforma', '', 0, 0, '', '', '', '', '', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', '', '', '0000-00-00', NULL, '2020-12-30 11:17:41', '2020-12-30 11:17:41'),
(36, 38, '', 'Proforma', '', 0, 0, '', '', '', '', '', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', '', '', '0000-00-00', NULL, '2020-12-30 11:17:43', '2020-12-30 11:17:43'),
(37, 38, '', 'Tax', '', 0, 0, '', '', '', '', '', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', 'neft', '{\"amount\":\"\",\"payment_ref_utr\":\"\"}', '0000-00-00', NULL, '2020-12-30 11:19:06', '2020-12-30 11:19:06'),
(38, 2, '', 'Proforma', '08AOHPB8084L1ZJ', 0, 0, 'IINSHA CREATIONS', 'Plot No.17, Ganesh Nagar, VKI, , -', 'Rajasthan', '08', '9414782440', 6, '{\"1\":{\"desc\":\"Digi 1\",\"hsn\":\"1212\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"},\"2\":{\"desc\":\"Digi 2\",\"hsn\":\"1213\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '<p>Duration - 2 Years</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                          ', 'nitmishra007@gmail.com', '', '', '2021-01-08', NULL, '2021-01-07 23:46:51', '2021-01-07 23:46:51'),
(39, 40, '', 'Proforma', '07AAHCD5938L1Z6', 0, 0, 'Nitesh', 'B 24, FIRST FLOOR,OFFICE NO. 3, SECTOR 1', 'Uttar Pradesh', '09', '8802894639', 1, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1234\",\"rate\":\"8475\",\"gst\":\"18\",\"mrpgst\":\"9000.00\",\"qty\":\"1\",\"disc\":\"\",\"total\":\"9000.00\"},\"2\":{\"desc\":\"SSL\",\"hsn\":\"1212\",\"rate\":\"8475\",\"gst\":\"18\",\"mrpgst\":\"9000.00\",\"qty\":\"1\",\"disc\":\"\",\"total\":\"9000.00\"}}', '<p><b>Testing</b></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                          ', 'nitmishra007@gmail.com', '', '', '2021-01-09', NULL, '2021-01-08 14:15:11', '2021-01-08 14:15:11'),
(40, 40, '', 'Tax', '07AAHCD5938L1Z6', 0, 0, 'Nitesh', 'B 24, FIRST FLOOR,OFFICE NO. 3, SECTOR 1', 'Delhi', '07', '8802894639', 1, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1212\",\"rate\":\"8475\",\"gst\":\"18\",\"mrpgst\":\"10001.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"10001.00\"},\"2\":{\"desc\":\"SSL\",\"hsn\":\"1212\",\"rate\":\"8475\",\"gst\":\"18\",\"mrpgst\":\"10001.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"10001.00\"}}', '<p><b>Testing</b></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                         ', 'nitmishra007@gmail.com', 'paytm', '{\"amount\":\"20002\"}', '2021-01-09', NULL, '2021-01-08 14:22:05', '2021-01-08 14:22:05'),
(41, 40, '', 'Tax', '07AAHCD5938L1Z6', 0, 0, 'Nitesh', 'B 24, FIRST FLOOR,OFFICE NO. 3, SECTOR 1', 'Uttar Pradesh', '09', '8802894639', 2, '{\"1\":{\"desc\":\"DIGI 1\",\"hsn\":\"1212\",\"rate\":\"10\",\"gst\":\"18\",\"mrpgst\":\"11.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"11.00\"},\"2\":{\"desc\":\"SSL\",\"hsn\":\"1213\",\"rate\":\"10\",\"gst\":\"18\",\"mrpgst\":\"11.00\",\"qty\":\"1\",\"disc\":\"10\",\"total\":\"11.00\"},\"3\":{\"desc\":\"SSL\",\"hsn\":\"1214\",\"rate\":\"10\",\"gst\":\"18\",\"mrpgst\":\"12.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"12.00\"}}', '<p>Duration - 1 Year</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                        <br>Banking: <b>Testing</b>\r\n                                                    <br>Account Name: <b>Testing</b>\r\n                                                    <br>Account Number: <b>Testing</b>\r\n                                                    <br>IFSC Code: <b>Testing</b>\r\n                                                    <br>Branch: <b>Testing</b>\r\n                                         ', 'nitmishra007@gmail.com', 'neft', '{\"amount\":\"34\",\"payment_ref_utr\":\"212323156\"}', '2021-01-09', NULL, '2021-01-08 14:28:49', '2021-01-08 14:28:49'),
(42, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:44', '2021-01-15 12:08:44'),
(43, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:50', '2021-01-15 12:08:50'),
(44, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:51', '2021-01-15 12:08:51'),
(45, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:52', '2021-01-15 12:08:52'),
(46, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:55', '2021-01-15 12:08:55'),
(47, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:57', '2021-01-15 12:08:57'),
(48, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:58', '2021-01-15 12:08:58'),
(49, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:08:59', '2021-01-15 12:08:59'),
(50, 22, '', 'Proforma', 'Dmkfkgkg', 0, 0, 'Krishna enter', 'Dmmdmdkf', 'Bihar', '10', 'Skdkfkkg', 1, '{\"1\":{\"desc\":\"Sansnd\",\"hsn\":\"0\",\"rate\":\"10000\",\"gst\":\"18\",\"mrpgst\":\"11800.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"11800.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'Mdkdk', '', '', '0000-00-00', NULL, '2021-01-15 12:09:00', '2021-01-15 12:09:00'),
(51, 42, '', 'Proforma', '07AAHCD5938L1Z6', 0, 0, 'ABC', 'B 24, FIRST FLOOR,OFFICE NO. 3, SECTOR 1', 'Uttar Pradesh', '09', '8527783906', 1, '{\"1\":{\"desc\":\"Office Rent\",\"hsn\":\"1212\",\"rate\":\"40000\",\"gst\":\"0\",\"mrpgst\":\"40000.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"40000.00\"},\"2\":{\"desc\":\"E Bill\",\"hsn\":\"1213\",\"rate\":\"16\",\"gst\":\"0\",\"mrpgst\":\"16.00\",\"qty\":\"230\",\"disc\":\"0\",\"total\":\"3680.00\"}}', '<p>Please pay this amount before 25th of Jan</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'ajha5323@gmail.com', '', '', '2021-01-22', NULL, '2021-01-22 04:03:22', '2021-01-22 04:03:22'),
(52, 44, '', 'Proforma', '', 0, 0, 'Nitesh', 'xyz vxvdchjvdwhjcbb', 'Delhi', '07', '8802894639', 1, '{\"1\":{\"desc\":\"Jeans\",\"hsn\":\"1212\",\"rate\":\"200\",\"gst\":\"18\",\"mrpgst\":\"212.00\",\"qty\":\"1000\",\"disc\":\"10\",\"total\":\"212000.00\"},\"2\":{\"desc\":\"T Shirt\",\"hsn\":\"1211\",\"rate\":\"150\",\"gst\":\"11\",\"mrpgst\":\"167.00\",\"qty\":\"200\",\"disc\":\"20\",\"total\":\"26720.00\"}}', '<p>Advance Payment - 50%<br></p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'nitmishra007@gmail.com', '', '', '2021-02-08', NULL, '2021-02-08 03:22:07', '2021-02-08 03:22:07');
INSERT INTO `tbl_bill_details` (`id`, `pid`, `prefix`, `bill_type`, `gstno`, `gst_amount`, `paid_amount`, `party_name`, `address`, `state`, `state_code`, `mobileno`, `billno`, `particulars`, `narration`, `bill_footer`, `email`, `payment_mode`, `payment_details`, `invoice_date`, `created_by`, `created_at`, `modified_at`) VALUES
(53, 46, '', 'Proforma', '', 0, 0, 'Muskan ', '55,Anarkali Garden, Jagatpuri', 'Delhi', '07', '8789965572', 1, '{\"1\":{\"desc\":\"Jeans \",\"hsn\":\"100\",\"rate\":\"100\",\"gst\":\"18\",\"mrpgst\":\"106.00\",\"qty\":\"1000\",\"disc\":\"10\",\"total\":\"106000.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'manjudevi76426@gmail.com', '', '', '2021-02-08', NULL, '2021-02-08 04:09:56', '2021-02-08 04:22:45'),
(54, 46, 'gff', 'Proforma', 'gfegfd', 0, 0, 'sdvsdcgvdf', '', 'Chandigarh', '04', '', 2, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '<p>fergfrthtt5yrht</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'gfefd', '', '', '2021-02-08', NULL, '2021-02-08 04:24:21', '2021-02-08 04:24:21'),
(55, 46, '', 'Proforma', 'gfdgdfgh', 0, 0, 'afsdgfdgh', 'hrtgfsfdgdfs', '', '', 'dfghh', 3, '{\"1\":{\"desc\":\"jfgjh\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0.00\"}}', '<p>ujytuytu</p>', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', '', '', '0000-00-00', NULL, '2021-02-08 04:25:22', '2021-02-08 04:25:22'),
(56, 45, '', 'Proforma', 'ASfafsdf', 0, 0, 'xASDSAF', 'asfasf', 'Sikkim', '11', 'safdsfa', 1, '{\"1\":{\"desc\":\"\",\"hsn\":\"0\",\"rate\":\"0\",\"gst\":\"0\",\"mrpgst\":\"0\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"0\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', 'safasf', '', '', '2021-02-08', NULL, '2021-02-08 04:29:59', '2021-02-08 04:29:59'),
(57, 75, '', 'Proforma', '09AANFP8729L1ZB', 0, 0, 'M/S. Pratikshat  Solutions LLP', 'J-221,Sec-22,Noida (U.P) -201301', 'Delhi', '07', '9891901121', 753, '{\"1\":{\"desc\":\"HDDQ\",\"hsn\":\"8471\",\"rate\":\"5000\",\"gst\":\"18\",\"mrpgst\":\"5900.00\",\"qty\":\"1\",\"disc\":\"0\",\"total\":\"5900.00\"}}', '', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. \r\n                       <br>Banking: <b></b>\r\n                                                    <br>Account Name: <b></b>\r\n                                                    <br>Account Number: <b></b>\r\n                                                    <br>IFSC Code: <b></b>\r\n                                                    <br>Branch: <b></b>\r\n                                                    <br>UPI: <b></b>', '', '', '', '2021-02-26', NULL, '2021-02-26 03:46:50', '2021-02-26 03:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `user_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_type` varchar(25) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `phone_no` varchar(55) NOT NULL,
  `gst` varchar(25) NOT NULL,
  `tin` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `state_code` varchar(2) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `status` enum('Approved','Pending') NOT NULL DEFAULT 'Pending',
  `login_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail_status` tinyint(2) NOT NULL,
  `msg_status` tinyint(2) NOT NULL,
  `registration_yrs` int(2) NOT NULL,
  `package_name` enum('Free','Business') NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `discount_by` varchar(255) NOT NULL,
  `documentation_status` varchar(55) NOT NULL,
  `terms` varchar(25) NOT NULL,
  `remarks` varchar(555) NOT NULL,
  `logoname` varchar(255) NOT NULL,
  `signature` varchar(155) NOT NULL,
  `acc_name` varchar(55) NOT NULL,
  `acc_number` varchar(55) NOT NULL,
  `ifsc` varchar(55) NOT NULL,
  `bank_name` varchar(155) NOT NULL,
  `branch` varchar(155) NOT NULL,
  `upi` varchar(55) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`user_id`, `org_name`, `owner_name`, `email`, `business_type`, `mobileno`, `phone_no`, `gst`, `tin`, `address`, `zip`, `city`, `state`, `state_code`, `landmark`, `status`, `login_name`, `password`, `mail_status`, `msg_status`, `registration_yrs`, `package_name`, `price`, `discount`, `discount_by`, `documentation_status`, `terms`, `remarks`, `logoname`, `signature`, `acc_name`, `acc_number`, `ifsc`, `bank_name`, `branch`, `upi`, `role`, `created_at`, `modified_at`) VALUES
(1, 'Mind Tech', 'Rakesh Kumar', 'rk@gmail.com', 'Manufacturer', '789541254', '78954125', '87AZVPK4786B4Z5', '87AZVPK4786B4Z5', 'Madipur Muzaffarpur', '110044', 'Muzaffarpur', 'Delhi', '02', 'Santimarg', 'Approved', 'rk@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'admin', '2020-11-09 19:36:22', '2021-02-11 04:56:14'),
(2, 'Nitesh & Co.', 'Nitesh Mishra', 'nitmishra007@gmail.com', 'Manufacturer', '8802894639', '', '07AAHCD5938L1Z6', '', 'Kalka ji, Delhi', '110019', 'Delhi', '', '07', '', 'Approved', 'nitmishra007@gmail.com', '63157ec36ea28fc3c65ddcd4067e6b11', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '1608561730_compnay_2_logo.jpg', '1608561730_compnay_2_sig.jpg', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Digisajilo@kotak', 'user', '2020-11-09 19:36:22', '2021-03-24 05:15:55'),
(3, 'Aptara', 'Himanshu', 'himanshu01dec@gmail.com', 'Manufacturer', '7053206536', '', '', '', '', '', '', '', '', '', 'Pending', 'himanshu01dec@gmail.com', 'e2624ba92f4f30a3243e62cceeef9a34', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-12-24 09:56:57'),
(4, 'Aptara', 'Himanshu', 'himanshu0112dec@gmail.com', 'Manufacturer', '7053206536', '', '', '', '', '', '', '', '', '', 'Approved', 'himanshu0112dec@gmail.com', 'e2624ba92f4f30a3243e62cceeef9a34', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(5, 'Mkuk Web Tech', 'Moosa Khan', 'mkukweb@gmail.com', 'Manufacturer', '9310069322', '', '07AAHCD5938L1Z6', '', 'B1-297, Gali No. 10, New Ashok Nagar', '110096', 'New Delhi', 'Delhi', '07', 'Near Shree Durga Mandir', 'Approved', 'bbb', '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '1607766480_compnay_5_logo.png', '1607691899_compnay_5_sig.jpg', 'mkuk web', '10203052400', 'icici025874', 'icici bank', 'sector 2', '9971618434@ybl', 'user', '2020-11-09 19:36:22', '2021-01-15 05:04:47'),
(7, 'ADM Garment ', 'Mohd Absar ', 'mohdabsar623@gmail.com', 'Manufacturer', '7982545576', '', '', '', 'C228/16A Gali No 10 Chauhan Bangur ', '110053', 'Delhi ', '', '07', 'EDMC Primary School (Gaddhe Wala School) ', 'Approved', 'mohdabsar623@gmail.com', 'b19fceead0ebd78dc99cc6f5cb4e5483', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(8, 'Mohd Absar ', 'Mohd Absar ', 'absar@digisajilo.com', 'Manufacturer', '7982545576', '', '', '', '', '', '', '', '', '', 'Approved', 'absar@digisajilo.com', '769fc60136d156dfe0f78dd640dd2796', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-12-16 05:45:29'),
(9, 'NIKITA', 'Nikita', 'bulkvyapar@gmail.com', 'Retailer', '9891846372', '', '', '', '', '', '', '', '', '', 'Approved', 'bulkvyapar@gmail.com', '6461811a7e55294adcb0029e6e4f05be', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(10, 'Rohan yadav', 'Rohan', 'rohan@digisajilo.com', 'Manufacturer', '9971856094', '', '', '', '', '', '', '', '', '', 'Pending', 'rohan@digisajilo.com', 'acf205d59e90b7c0fb94a655c5b2f958', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(11, 'Rohan yadav', 'Rohan', 'rohan@digisajilo.co.in', 'Manufacturer', '9971856094', '', '', '', '', '', '', '', '', '', 'Approved', 'rohan@digisajilo.co.in', 'acf205d59e90b7c0fb94a655c5b2f958', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(12, 'CHANDNI', 'Chandni', 'chandnip@DIGISAJILO.COM', 'Trader', '9210086168', '', '', '', '', '', '', '', '', '', 'Approved', 'chandniprakash217@gmail.com', 'a5152361485a77114f1c552e9e7d2831', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(13, 'Om commotion ', 'Kamlesh pachauri', 'kamlesh@digisajilo.com', 'Manufacturer', '8130154812', '', '', '', '', '', '', '', '', '', 'Approved', 'kamlesh@digisajilo.com', 'c9dda13bbbb38439cb49f19bbb11fcf1', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(14, 'CHANDNI', 'Chandni', 'chandni@digisajilo.co.in', 'Trader', '9210086168', '', '', '', '', '', '', '', '', '', 'Approved', 'chandni@digisajilo.co.in', 'a5152361485a77114f1c552e9e7d2831', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(15, 'arjun', 'arjun dhawan ', 'arjun@digisajilo.com', 'Trader', '8470972533', '', '', '', '', '', '', '', '', '', 'Approved', 'arjun@digisajilo.com', '3ff066afa3a1c2a9ecfcdab581036249', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(16, 'Om commotion ', 'Kamlesh pachauri', 'kamlesh@digisajilo.co.in', 'Manufacturer', '8130154812', '', '', '', '', '', '', '', '', '', 'Approved', 'kamlesh@digisajilo.co.in', '8276bff3d2bbd1f7c4c3c3b6981d0658', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'user', '2020-11-09 19:36:22', '2020-12-19 03:32:50'),
(17, 'arjun', 'arjun dhawan ', 'arjundhawan1997@gmail.com', 'Trader', '8470972533', '', '', '', '', '', '', '', '', '', 'Approved', 'arjundhawan1997@gmail.com', 'cc03e65daebcb7468baf0cc9cdbd4cf6', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(18, 'SANGEETA', 'sangeeta ', 'sangeeta@digisajilo.co.in', 'Manufacturer', '8447612054', '', '', '', '', '', '', '', '', '', 'Approved', 'sangeeta@digisajilo.co.in', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(19, 'Sonalika ', 'Sonalika Singh', 'sonalika@dijisajilo.com', 'Trader', '9599073910', '', '', '', '', '', '', '', '', '', 'Approved', 'sonalika@dijisajilo.com', '7deacd38db70abdda5f8bb577c74f8a9', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2020-11-09 19:36:22'),
(20, 'test', 'test', 'abc@gmail.com', 'Manufacturer', '9999999999', '', '', '', '', '', '', '', '', '', 'Approved', 'abc@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-22 01:35:54', '2020-11-22 01:35:54'),
(21, 'Tarun & Co.', 'Tarun', 'tghutey@gmail.com', 'Retailer', '6398709828', '', '', '', '', '', '', '', '', '', 'Approved', 'tghutey@gmail.com', '4366269e81b256cdbd51353aa5fa5f63', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', 'Testing', '12345667788', 'Egctvdrg', 'Ttgduhvdyh', 'Dghufvvf', 'Digisajilo@kotak', 'user', '2020-11-22 08:01:26', '2020-12-12 23:51:45'),
(22, 'digisajilo india pvt ltd', 'farhan khan', 'f.khan88028md@gmail.com', 'Manufacturer', '9540203621', '', '', '', '', '', '', '', '', '', 'Approved', 'f.khan88028md@gmail.com', '64e83c777867a488e2bebdc6ac0888be', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-01 02:39:47', '2020-12-01 02:39:47'),
(23, 'VyaparBill', 'Moosa kalim', 'moosakhan92@gmail.com', 'Manufacturer', '9310069322', '', '07AAHCD5938L1Z6', 'NA', 'NEW ASHOK NAGAR', '110096', 'NEW DELHI', '', '07', '', 'Approved', 'moosakhan92@gmail.com', '63c00acbccfbcc03c294bc33079d56ab', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-04 06:22:01', '2020-12-04 06:23:35'),
(24, 'TESTING', 'Rakesh Kumar', 'aa@gmail.com', 'Manufacturer', '9874532147', '', '', '', '', '', '', '', '07', '', 'Approved', 'aa@gmail.com', 'e3afed0047b08059d0fada10f400c1e5', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-12 05:07:11', '2020-12-12 05:08:06'),
(27, 'Tarun & Co.', 'Tarun', 'nitesh.citi01@gmail.com', 'Manufacturer', '8802894639', '', '', '', '', '', '', '', '', '', 'Approved', 'nitesh.citi01@gmail.com', '4366269e81b256cdbd51353aa5fa5f63', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-12 05:59:18', '2020-12-12 05:59:18'),
(29, 'Chaitanya Technosoft', 'Rakesh Kumar', 'rk.webdev2007@gmail.com', 'Manufacturer', '9874532147', '', '18AABCU9603R1ZM', 'fasdf', 'TEsting', '110092', 'Delhi', '', '07', 'Mother Dairy', 'Approved', 'rk.webdev2007@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '1608623403_compnay_29_logo.jpg', '1608623403_compnay_29_sig.jpg', 'CHAITANYA TECHNOSOFT', '258741258', 'ICICI0029', 'ICICI Bank', 'Noida', 'ICICI78954', 'user', '2020-12-13 04:43:04', '2020-12-26 06:06:48'),
(30, 'Tech Sol', 'Rakesh Kumar', 'smartwebdev2007@gmail.com', 'Manufacturer', '9874532178', '', '', '', '', '', '', '', '', '', 'Approved', 'smartwebdev2007@gmail.com', '5975c85e8d2756810491f99edfa1cfed', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', 'Tech Sol Pvt. Ltd.', '9874532145', 'ICICI7854', 'ICICI Bank', 'Mayur Vihar', '78541258', 'user', '2020-12-14 01:59:50', '2020-12-14 02:28:31'),
(31, 'Demo company', 'Demo', 'mkuk92@gmail.com', 'Manufacturer', '9971618434', '', '', '', '', '', '', '', '', '', 'Pending', 'mkuk92@gmail.com', 'afd6ea43ee1e680732d8359808895524', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-14 02:01:03', '2020-12-14 02:01:03'),
(32, 'Demo Co.', 'Demo Name', 'digisajiloseo@gmail.com', 'Retailer', '9310069322', '', '', '', 'A-44, Sector 2, Noida', '201301', 'Noida', '', '09', 'Near Metro', 'Approved', 'digisajiloseo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '1608353968_compnay_32_logo.jpg', '1607938781_compnay_32_sig.jpg', 'Demo Name', '1010101010', 'SBI0001947', 'SBI', 'Delhi', 'demo@paytm', 'user', '2020-12-14 02:15:24', '2020-12-18 21:59:28'),
(33, 'DigiSajilo', 'Mr. Nitesh', 'superadmin@digisajilo.com', 'Manufacturer', '9874532147', '', '18AABCU9603R1ZM', 'fasdf', 'TEsting', '110092', 'Delhi', '', '07', 'Sector 15, Metro Station, Noida', 'Approved', 'superadmin@digisajilo.com', 'e6e061838856bf47e1de730719fb2609', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', 'DIGISAJILO INDIA PVT. LTD.', '', '', '', '', '', 'admin', '2020-12-13 04:43:04', '2020-12-22 00:56:55'),
(34, 'Tailor Store', 'Arvind', 'arvindkumarmail1411@gmail.com', 'Trader', '7827843002', '', '', '', '1316 2nd Floor Dharam Pura Dariba Kalan Delhi - 110006', '', 'delhi', '', '07', 'Jama Masjid Police Station', 'Approved', 'arvindkumarmail1411@gmail.com', 'f6a44656cbec7cdfa2ef97d48246de41', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '1608638789_compnay_34_logo.png', '', 'Arvind', '1234567891011', '12553ty7ghhvghv', 'ICICI', 'Chandani Chowck ', '263737gfeddh', 'user', '2020-12-22 04:38:30', '2020-12-22 05:06:29'),
(35, 'Pachauri enterprise', 'Kamlesh Pachauri', 'kamleshpachauri105@gmail.com', 'Trader', '8377052030', '', '', '', '', '247001', 'saharanpur  ', '', '09', '', 'Approved', 'kamleshpachauri105@gmail.com', '8276bff3d2bbd1f7c4c3c3b6981d0658', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', 'kamlesh Kumar ', '961253600', 'kkbk0005029 ', 'Kotak mahindra bank ', 'noida sec 16 ', '', 'user', '2020-12-23 09:09:17', '2021-02-13 03:14:59'),
(38, 'Sreshta Dryfruits ', 'Sreshta Dryfruits ', 'info@sreshtadryfruits.com', 'Manufacturer', '7659913477', '', '', '', '', '', '', '', '', '', 'Approved', 'info@sreshtadryfruits.com', '87b1922f40df76c00310c904b0f42e95', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-25 05:43:51', '2020-12-25 06:07:23'),
(39, 'Kushal Traders ', 'Kushal ', 'kushalrander1998@gmail.com', 'Retailer', '9718375655', '', '', '', '', '', '', '', '', '', 'Approved', 'kushalrander1998@gmail.com', '448704456b2b7a56f12b24915f16ed45', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-12-29 22:14:57', '2020-12-29 22:14:57'),
(40, 'RuNit India Pvt Ltd', 'Ruchi', 'ruchighutey@gmail.com', 'Trader', '7532850287', '', '07AAHCD5938L1Z6', '', 'B 24, FIRST FLOOR,OFFICE NO. 3, SECTOR 1', '110019', 'Noida', '', '09', 'ABCD', 'Approved', 'ruchighutey@gmail.com', '4366269e81b256cdbd51353aa5fa5f63', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '1610139291_compnay_40_logo.jpg', '', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'user', '2021-01-08 13:50:44', '2021-01-08 14:03:51'),
(41, 'Suthar steel fabricators (Shri Krishna) ', 'SUNNY SUTHAR', 'sutharsteelfabricate@gmail.com', 'Manufacturer', '9416922221', '', '', '', '', '', '', '', '', '', 'Approved', 'sutharsteelfabricate@gmail.com', '8957fd9f0dbd70c94978acc477404801', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-01-20 09:43:36', '2021-01-20 09:43:36'),
(42, 'VDS Technologies', 'VDS Technologies', 'vdstechnoloies.amit@gmail.com', 'Manufacturer', '8800098010', '', '', '', '', '', '', '', '', '', 'Approved', 'vdstechnoloies.amit@gmail.com', 'b14f539592cf006efa3b1436fe235364', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-01-22 03:45:44', '2021-01-22 15:22:20'),
(43, 'SHOBA PHARMACEUTICAL DISTRIBUTOR', 'SAJAD', 'zargarsajad213@gmail.com', 'Trader', '9796143399', '', '', '', '', '', '', '', '', '', 'Approved', 'zargarsajad213@gmail.com', '124f644468daf7e9b33e2b44166e3c13', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-01-28 17:32:15', '2021-01-29 16:00:01'),
(44, 'Harsh & Co.', 'Vardhan', 'harshvardhan8851@gmail.com', 'Manufacturer', '9873869433', '', '', '', '', '', '', '', '', '', 'Approved', 'harshvardhan8851@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 03:17:01', '2021-02-08 03:17:01'),
(45, 'Muskan enterprises ', 'Muskany', 'muskan@digisajilo.com', 'Retailer', '8789965572', '', '', '', '', '', '', '', '', '', 'Approved', 'muskan@digisajilo.com', 'fea0f6873f5658820fa58efd01479586', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 03:30:16', '2021-02-08 03:31:21'),
(46, 'Vardhan & co. ', 'Harsh Vardhan', 'annukunmar@gmail.com', 'Manufacturer', '8851817342', '', '', '', '', '', '', '', '30', '', 'Approved', 'annukunmar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 03:31:15', '2021-02-08 04:34:13'),
(47, 'Network Facts', 'Raj kumar', 'rajresume1989@gmail.com', 'Retailer', '9953243565', '', '', '', '', '', '', '', '', '', 'Approved', 'rajresume1989@gmail.com', '48571fa355d50a4a5c871597f1480e57', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 05:12:14', '2021-02-08 05:12:14'),
(48, 'Rohit Enterprises ', 'Rohit Kumar ', 'kumarrohit52400@gmail.com', 'Retailer', '7982478644', '', '', '', '', '', '', '', '', '', 'Approved', 'kumarrohit52400@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 05:46:52', '2021-02-08 05:46:52'),
(49, 'Sai Fast Food Corner', 'Amit', 'a1998verma@gmail.com', 'Retailer', '9315362773', '', '', '', '', '', '', '', '', '', 'Approved', 'a1998verma@gmail.com', 'e25cfc43dae4f7494b8bb6e712027abc', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 06:03:51', '2021-02-08 06:03:51'),
(50, 'Jays org', 'Arpit gupta ', 'guptaarpit599@gmail.com', 'Manufacturer', '7428206839', '', '', '', '', '', '', '', '', '', 'Approved', 'guptaarpit599@gmail.com', 'c7cad8412cc075f0c3d0d6d7ed08694f', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 22:59:25', '2021-02-08 22:59:25'),
(51, 'Saket Maternity and nursing home pvt ltd', 'Harshit Agarwal', 'saket.purchase@gmail.com', 'Retailer', '7607767826', '', '', '', '', '', '', '', '', '', 'Pending', 'saket.purchase@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 23:44:54', '2021-02-08 23:44:54'),
(52, 'Alishentertainment', 'Ranjankumar', 'ritukumari9788@gmail.com', 'Trader', '8789334841', '', '', '', '', '', '', '', '', '', 'Approved', 'ritukumari9788@gmail.com', '53714919dd01b0521a93a90cc04d105f', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-08 23:59:29', '2021-02-08 23:59:29'),
(53, 'Means while', 'Rohit singh', 'zerkajadri@nedoz.com', 'Manufacturer', '9653853926', '', '', '', '', '', '', '', '', '', 'Approved', 'zerkajadri@nedoz.com', '9b93c9c5c3bc607647e3a5db6951ce6a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 00:21:00', '2021-02-09 00:21:00'),
(54, 'Sports and Safety gears', 'Aakash Suman', 'aakashsuman7061514136@gmail.com', 'Retailer', '7061514136', '', '', '', '', '', '', '', '', '', 'Approved', 'aakashsuman7061514136@gmail.com', '9a341ff6d9492a8310fce7c0b43233fa', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 00:33:57', '2021-02-09 00:33:57'),
(55, 'Prince electition', 'Prince kumar', 'rajshubham74370@gmail.com', 'Retailer', '9896234981', '', '', '', '', '', '', '', '', '', 'Approved', 'rajshubham74370@gmail.com', '539f35304f40944bc62645b1c754083a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 08:58:47', '2021-02-09 08:58:47'),
(56, 'Prince electition', 'Prince kumar', 'rajshubham74370@gmail.com', 'Retailer', '9896234981', '', '', '', '', '', '', '', '', '', 'Approved', 'rajshubham74370@gmail.com', '539f35304f40944bc62645b1c754083a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 08:58:47', '2021-02-09 08:58:47'),
(57, 'Aniket trading work', 'Aniket Kumar Singh', 'singhak321ak@gmail.com', 'Trader', '8743848450', '', '', '', '', '', '', '', '', '', 'Approved', 'singhak321ak@gmail.com', '7c62b00e5b17fbc573105c86385805a3', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 22:58:01', '2021-02-09 22:58:01'),
(58, 'Bhardwaj Paper Products ', 'Shiva Bhardwaj ', 'mk1892691@gmail.com', 'Retailer', '7838904632', '', '', '', '', '', '', '', '', '', 'Approved', 'mk1892691@gmail.com', 'b0aa651c991deca550252ed6cbba99ba', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 22:58:51', '2021-02-09 23:16:58'),
(59, 'Jaiswal Fabrication', 'Vivek', 'vivekjaiswal1002187@gmail.com', 'Retailer', '9310536167', '', '', '', '', '', '', '', '', '', 'Approved', 'vivekjaiswal1002187@gmail.com', '7c2d6adfb4a106df739abb2170e03530', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 23:04:10', '2021-02-09 23:04:10'),
(60, 'Boss Steel Furniture & Fabrication', 'Ritik', 'ritikboss433@gmail.com', 'Manufacturer', '9354238974', '', '', '', '', '', '', '', '', '', 'Approved', 'ritikboss433@gmail.com', 'f866588dc08fb34d93109fadf73a8619', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 23:07:28', '2021-02-09 23:07:28'),
(61, 'Sharma Property Dealer ', 'Sachin Kaushik ', 'kaushiksharma9084865184@gmail.com', 'Trader', '9084865184', '', '', '', '', '', '', '', '', '', 'Approved', 'kaushiksharma9084865184@gmail.com', '4822c8fec7c8e1b8822a1d272265545e', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-09 23:43:20', '2021-02-09 23:55:12'),
(62, 'tijar trading', 'Juned ', 'suthar.firoz@gmail.com', 'Trader', '9898116690', '', '', '', '', '', '', '', '', '', 'Approved', 'suthar.firoz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-10 00:57:54', '2021-02-10 00:57:54'),
(63, 'Pandit ji properties', 'Lokesh Kumar sharma', 'lokeshk8588@gmail.com', 'Manufacturer', '8588868600', '', '', '', '', '', '', '', '', '', 'Approved', 'lokeshk8588@gmail.com', 'a66db32f1efb851d3e8e4fa136051575', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-10 02:31:54', '2021-02-10 02:31:54'),
(64, 'Nitin trader', 'Nitin kumar', 'singhnk123.nk@gmail.com', 'Trader', '7703919977', '', '', '', '', '', '', '', '', '', 'Approved', 'singhnk123.nk@gmail.com', '0e2bb3565b3f5149f4ba417c6c514add', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-10 02:43:58', '2021-02-10 02:43:58'),
(65, 'Safi Repairing Center ', 'Shahib Safi ', 'xhahib786@gmail.com', 'Trader', '9599543938', '', '', '', '', '', '', '', '', '', 'Approved', 'xhahib786@gmail.com', 'bc984ef23845fdcbc250198b8ad894fe', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-10 04:54:15', '2021-02-10 04:54:15'),
(66, 'Shivyu Insurance Services', 'Yuvraj Singh', 'shivyuinsurance@gmail.com', 'Insurance', '8527950169', '8527950169', '', '', 'Delhi', '', '', 'Delhi', '', '', 'Approved', 'shivyuinsurance@gmail.com', '3d9db67486ab1d7baa545d5b49a3d043', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2021-02-10 22:50:51'),
(67, 'Hanuman Store', 'Vishnu Aggarwal', 'somr7467@gmail.com', 'Retail', '9313487376', '9313487376', '', '', 'Delhi', '', '', 'Delhi', '', '', 'Approved', 'somr7467@gmail.com', '63e9fc4f5e0156d44c02f35f1d17a412', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2020-11-09 19:36:22', '2021-02-10 22:50:51'),
(69, 'Rakesh Pvt. Ltd.', 'Chaitanya Rakesh', 'smartwebdev21@gmail.com', 'Manufacturer', '9874123987', '', '', '', '', '', '', '', '', '', 'Approved', 'abcd123@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 01:06:07', '2021-02-11 01:42:50'),
(70, 'Boutique', 'sonu', 'sonams1544@gamil.com', 'Trader', '9654226028', '', '', '', '', '', '', '', '', '', 'Approved', 'sonams1544@gamil.com', '4104f939fdc98f9823a53edee1355caa', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 02:03:50', '2021-02-11 02:03:50'),
(71, 'JS Fashion ', 'Jasvinder Singh ', 'jasvindersinghjsjs8416@gmail.com', 'Retailer', '9815732116', '', '', '', '', '', '', '', '', '', 'Approved', 'jasvindersinghjsjs8416@gmail.com', '5e3d1f419312d9f6f9d4fd8e11aefe9b', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 02:22:48', '2021-02-11 02:22:48'),
(72, 'Cut & Curv Fitness Point ', 'Aman Jeswal ', 'amanjeswal.mla@gamil.com', 'Trader', '8178561304', '', '', '', '', '', '', '', '', '', 'Approved', 'amanjeswal.mla@gamil.com', '73b25522615dac9cfd289ee35faef4ef', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 02:51:58', '2021-02-11 02:51:58'),
(73, 'Tour & Travels ', 'Sunil Kumar ', 'sss686193@gamil.com', 'Trader', '7500930212', '', '', '', '', '', '', '', '', '', 'Approved', 'sss686193@gamil.com', '0016eef2827ac2424d9e96fc40ffc5fb', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 03:11:34', '2021-02-11 03:11:34'),
(74, 'Test ', 'mayank ', 'app.rupfly@gmail.com', 'Trader', '8287678077', '', '', '', '', '', '', '', '', '', 'Approved', 'app.rupfly@gmail.com', '4afb48b21474668f9fbad4a0d53c986b', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 03:31:37', '2021-02-11 03:31:37'),
(75, 'Minter CSTech Pvt.Ltd.', 'Chander Kaushal', 'sales@mintercstech.com', 'Trader', '9891969362', '9891969362', '', '', '', '', '', '', '07', '', 'Approved', 'sales@mintercstech.com', '15989e1b2c58a54ea4613bd8e9902cd8', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 03:31:37', '2021-02-11 05:01:30'),
(76, 'Anukha', 'Sonu Kumari', 'sonams1544@gmail.com', 'Retailer', '9871057116', '', '', '', '', '', '', '', '', '', 'Pending', 'sonams1544@gmail.com', 'fb3a36dcc0c109aaa3f9de2d89714b68', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 04:54:46', '2021-02-11 04:54:46'),
(77, 'The Body Shop ', 'Soina  ', 'soinasharmacoco@gamil.com', 'Retailer', '9643246445', '', '', '', '', '', '', '', '', '', 'Approved', 'soinasharmacoco@gamil.com', 'cd442858a348f8d3a0877b89cc45071a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 04:56:55', '2021-02-11 05:24:09'),
(78, 'Anukha interprises', 'sandeep chouhan', 'sandeepchouhan3790@gmail.com', 'Retailer', '9507054184', '', '', '', '', '', '', '', '', '', 'Pending', 'sandeepchouhan3790@gmail.com', 'ac651c5b5166a53f9432bb812f6497a8', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 05:05:46', '2021-02-11 05:05:46'),
(79, 'Om Furniture ', 'Raja Mahto ', 'rajakumarmahto@gmail.com', 'Retailer', '7295906753', '', '', '', '', '', '', '', '', '', 'Approved', 'rajakumarmahto@gmail.com', '94de8e93b3b90b647a944e7abcbcf9a1', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 05:11:18', '2021-02-11 05:11:18'),
(80, 'Kashyap Respiring Center ', 'Yash Kashyap ', 'yk9315364310@gamil.com', 'Retailer', '9315364310', '', '', '', '', '', '', '', '', '', 'Approved', 'yk9315364310@gamil.com', '860597464b31f718bc28e3994d28d0f0', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 05:39:19', '2021-02-11 05:39:19'),
(81, 'suraj groceries shop ', 'suraj Kumar paswan ', 'surajkumarpaswan756@gmail.com', 'Retailer', '6205465373', '', '', '', '', '', '', '', '', '', 'Approved', 'surajkumarpaswan756@gmail.com', '7289acc31495dbe8a4fb861ca4eea6af', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 10:05:14', '2021-02-11 10:05:14'),
(82, 'suraj groceries shop ', 'suraj Kumar paswan ', 'surajkumarpaswan756@gmail.com', 'Retailer', '6205465373', '', '', '', '', '', '', '', '', '', 'Approved', 'surajkumarpaswan756@gmail.com', '7289acc31495dbe8a4fb861ca4eea6af', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 10:05:15', '2021-02-11 10:05:15'),
(83, 'suraj groceries shop ', 'suraj Kumar paswan ', 'surajkumarpaswan756@gmail.com', 'Retailer', '6205465373', '', '', '', '', '', '', '', '', '', 'Approved', 'surajkumarpaswan756@gmail.com', '7289acc31495dbe8a4fb861ca4eea6af', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 10:05:18', '2021-02-11 10:05:18'),
(84, 'suraj groceries shop ', 'suraj Kumar paswan ', 'surajkumarpaswan756@gmail.com', 'Retailer', '6205465373', '', '', '', '', '', '', '', '', '', 'Approved', 'surajkumarpaswan756@gmail.com', '7289acc31495dbe8a4fb861ca4eea6af', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 10:05:21', '2021-02-11 10:05:21'),
(85, 'suraj groceries shop ', 'suraj Kumar paswan ', 'surajkumarpaswan756@gmail.com', 'Retailer', '6205465373', '', '', '', '', '', '', '', '', '', 'Approved', 'surajkumarpaswan756@gmail.com', '7289acc31495dbe8a4fb861ca4eea6af', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 10:05:23', '2021-02-11 10:05:23'),
(86, 'Tomar automobile', 'Vishal', 'vr09404@gmail.com', 'Retailer', '8929248642', '', '', '', '', '', '', '', '', '', 'Approved', 'vr09404@gmail.com', 'c4d0d125c4a61d7432a210328ac87183', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 23:19:23', '2021-02-11 23:19:23'),
(87, 'Mehak Garments ', 'Akriti Sharma ', 'akritisharma0931@gmail.com', 'Retailer', '9717024753', '', '', '', '', '', '', '', '', '', 'Approved', 'akritisharma0931@gmail.com', '11b9d2244810244f2a785752c243a86a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-11 23:36:40', '2021-02-11 23:36:40'),
(88, 'Kazi agro', 'Nasir kazi', 'nasirkazi314@gmail.com', 'Trader', '9175526785', '', '', '', '', '', '', '', '', '', 'Approved', 'nasirkazi314@gmail.com', 'b81652b2ee3be072260d02b0ea64f1bc', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-12 00:35:25', '2021-02-12 00:35:25'),
(89, 'Tech India solutions Pvt limited', 'Rohan Verma', 'rv0914230@gmail.com', 'Retailer', '7065507683', '', '', '', '', '', '', '', '', '', 'Approved', 'rv0914230@gmail.com', '41b046191358d2415a4bfd551656c061', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-12 02:31:21', '2021-02-12 02:31:21'),
(90, 'Tyagi', 'Anmole Tyagi', 'digi@gmail.com', 'Manufacturer', '7896541239', '', '', '', '', '', '', '', '', '', 'Approved', 'digi@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-12 02:57:01', '2021-02-12 02:57:01'),
(91, 'Neha Export ', 'Neha ', 'selvi1591980@gamil.com', 'Manufacturer', '7042636077', '', '', '', '', '', '', '', '', '', 'Approved', 'selvi1591980@gamil.com', 'f3de5e16d00fe7056839f6018f1f52ca', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-12 03:30:18', '2021-02-12 03:30:18'),
(92, 'Surya general store', 'Surya', 'rajsurya811@gmail.com', 'Trader', '7303470280', '', '', '', '', '', '', '', '', '', 'Approved', 'rajsurya811@gmail.com', 'b398ab3b2e32c99af5e4163d25b63c7b', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-13 02:38:53', '2021-02-13 02:38:53'),
(93, 'Devish', 'Rajan', 'rajanrohit01@gmail.com', 'Trader', '7678420770', '', '', '', '', '', '', '', '', '', 'Approved', 'rajanrohit01@gmail.com', 'e815dfe2867a9883978e81846659e69d', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-13 02:55:03', '2021-02-13 02:55:03'),
(94, 'Welspun', 'Binod', 'binod_yadav85@yahoo', 'Trader', '8750613653', '', '', '', '', '', '', '', '', '', 'Approved', 'binod_yadav85@yahoo', '7a3be16e94bab87d7876c64b9bb0dfee', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-13 02:58:36', '2021-02-13 02:58:36'),
(95, 'ravi interprises', 'ravi', 'teshvarravi@gmail.com', 'Manufacturer', '8799766874', '', '', '', '', '', '', '', '', '', 'Approved', 'teshvarravi@gmail.com', '78f59199d10c501a039743ae61915da5', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-02-27 04:18:53', '2021-02-27 04:18:53'),
(96, 'chauhanbusniess', 'priyankachauhan', 'pc7065361317@gmail.com', 'Manufacturer', '7065361317', '', '', '', '', '', '', '', '', '', 'Approved', 'pc7065361317@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-03-01 01:03:43', '2021-03-01 01:03:43'),
(97, 'Star Refrigeration & Electronics', 'Star Refrigeration & Electronics', 'starrefrigerationup34@gmail.com', 'Retailer', '8090452469', '', '', '', '', '', '', '', '', '', 'Approved', 'starrefrigerationup34@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, 'Free', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-03-08 11:17:16', '2021-03-08 11:17:16'),
(98, 'Digisajilo india pvt ltd', 'Farhan khan', 'digisajilo@gmail.com', 'Manufacturer', '9540203621', '', '', '', '', '', '', '', '', '', 'Pending', 'digisajilo@gmail.com', 'd259147d236e48ff7c10c26a7666f3d3', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '', '', '', '', '', '', '', '', 'user', '2021-03-31 23:30:50', '2021-03-31 23:30:50'),
(99, 'Digisajilo india private limited', 'Farhan khan', 'vyaparbill01@gmail.com', 'Manufacturer', '9540203621', '', '07AAHCD5938L1Z6', '', '985- A, 3/F, L/S GALI NO- 9, GOVIND PURI KALKAJI', '110019', 'new delhi', '', '07', 'kotak mahindra bank', 'Approved', 'vyaparbill01@gmail.com', 'd259147d236e48ff7c10c26a7666f3d3', 0, 0, 0, 'Business', 0, 0, '', '', 'agree', '', '1617269288_compnay_99_logo.jpg', '1617278876_compnay_99_sig.png', 'Digisajilo India Pvt Ltd', '0113962790', 'KKBK0000218', 'KOTAK MAHINDRA BANK', 'KALKA JI', 'DIGISAJILO@KOTAK', 'user', '2021-03-31 23:40:13', '2021-04-01 05:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp_expiry`
--

CREATE TABLE `tbl_otp_expiry` (
  `id` int(5) NOT NULL,
  `otp` varchar(15) NOT NULL,
  `passreset_id` int(5) NOT NULL,
  `otp_expiry` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_otp_expiry`
--

INSERT INTO `tbl_otp_expiry` (`id`, `otp`, `passreset_id`, `otp_expiry`, `created_at`) VALUES
(1, '10642', 2, 0, '2020-12-12 13:33:38'),
(2, '75343', 26, 0, '2020-12-12 13:39:56'),
(3, '71459', 26, 0, '2020-12-12 14:17:50'),
(4, '16212', 26, 0, '2020-12-12 14:18:12'),
(5, '67816', 0, 0, '2020-12-12 14:36:51'),
(6, '77450', 0, 0, '2020-12-12 14:43:26'),
(7, '32470', 2, 0, '2020-12-12 15:18:46'),
(8, '12830', 2, 0, '2020-12-12 16:34:55'),
(9, '63346', 21, 0, '2020-12-13 06:48:14'),
(10, '72711', 0, 0, '2020-12-13 11:41:25'),
(11, '50802', 0, 0, '2020-12-13 12:12:06'),
(12, '83290', 0, 0, '2020-12-13 12:12:15'),
(13, '58987', 1, 0, '2020-12-13 12:12:48'),
(14, '77919', 1, 0, '2020-12-13 12:12:55'),
(15, '36321', 29, 0, '2020-12-13 12:14:58'),
(16, '89858', 20, 0, '2020-12-14 05:33:28'),
(17, '14874', 29, 0, '2020-12-14 05:34:36'),
(18, '72295', 5, 0, '2020-12-14 05:45:27'),
(19, '39078', 0, 0, '2020-12-14 08:58:14'),
(20, '71959', 0, 0, '2020-12-14 08:59:36'),
(21, '90957', 31, 0, '2020-12-14 09:02:11'),
(22, '40900', 30, 0, '2020-12-14 09:06:10'),
(23, '64620', 0, 0, '2020-12-14 09:13:33'),
(24, '77728', 2, 0, '2020-12-14 12:04:42'),
(25, '18022', 29, 0, '2020-12-14 12:45:14'),
(26, '27023', 2, 0, '2020-12-14 21:33:41'),
(27, '76058', 21, 0, '2020-12-15 10:11:49'),
(28, '21196', 2, 0, '2020-12-15 13:10:46'),
(29, '85804', 8, 0, '2020-12-16 12:44:48'),
(30, '60485', 2, 0, '2020-12-16 14:31:27'),
(31, '74403', 0, 0, '2020-12-17 10:33:14'),
(32, '85241', 0, 0, '2020-12-17 10:38:19'),
(33, '18831', 2, 0, '2020-12-17 12:50:36'),
(34, '17437', 0, 0, '2020-12-17 12:55:42'),
(35, '27745', 29, 0, '2020-12-19 04:50:53'),
(36, '28110', 2, 0, '2020-12-20 06:25:38'),
(37, '76981', 2, 0, '2020-12-20 06:25:40'),
(38, '95216', 2, 0, '2020-12-21 12:23:33'),
(39, '60890', 29, 0, '2020-12-22 07:16:25'),
(40, '20527', 0, 0, '2020-12-22 11:36:39'),
(41, '86879', 5, 0, '2020-12-22 12:54:37'),
(42, '86168', 29, 0, '2020-12-23 09:13:43'),
(43, '97948', 0, 0, '2020-12-23 16:07:34'),
(44, '26610', 2, 0, '2020-12-23 17:50:55'),
(45, '16173', 0, 0, '2020-12-25 09:39:13'),
(46, '93157', 0, 0, '2020-12-25 09:47:38'),
(47, '76136', 0, 0, '2020-12-25 09:47:38'),
(48, '66527', 0, 0, '2020-12-25 12:43:28'),
(49, '23230', 0, 0, '2020-12-30 05:12:19'),
(50, '90438', 2, 0, '2021-01-07 19:47:25'),
(51, '70181', 2, 0, '2021-01-07 19:48:58'),
(52, '44510', 0, 0, '2021-01-08 20:48:58'),
(53, '79181', 33, 0, '2021-01-10 18:05:00'),
(54, '75391', 33, 0, '2021-01-10 18:05:01'),
(55, '33511', 0, 0, '2021-01-20 16:41:59'),
(56, '64786', 0, 0, '2021-01-22 10:27:24'),
(57, '23849', 0, 0, '2021-01-22 10:32:02'),
(58, '27136', 0, 0, '2021-01-22 10:32:10'),
(59, '99814', 0, 0, '2021-01-22 10:33:05'),
(60, '96298', 0, 0, '2021-01-22 10:33:07'),
(61, '38975', 0, 0, '2021-01-22 10:34:33'),
(62, '36857', 0, 0, '2021-01-22 10:44:13'),
(63, '73147', 0, 0, '2021-01-22 12:20:02'),
(64, '17870', 0, 0, '2021-01-22 12:20:30'),
(65, '97601', 0, 0, '2021-01-29 00:30:33'),
(66, '18370', 0, 0, '2021-01-29 00:32:08'),
(67, '65284', 0, 0, '2021-02-02 06:15:43'),
(68, '69984', 0, 0, '2021-02-02 06:15:51'),
(69, '68002', 0, 0, '2021-02-02 06:16:01'),
(70, '94542', 0, 0, '2021-02-02 06:16:04'),
(71, '95779', 0, 0, '2021-02-02 06:16:05'),
(72, '99804', 0, 0, '2021-02-02 06:16:06'),
(73, '32035', 0, 0, '2021-02-02 06:16:06'),
(74, '41002', 0, 0, '2021-02-02 06:16:08'),
(75, '84203', 0, 0, '2021-02-02 06:16:08'),
(76, '63924', 0, 0, '2021-02-02 06:17:08'),
(77, '10906', 0, 0, '2021-02-02 06:17:13'),
(78, '53494', 0, 0, '2021-02-02 06:17:14'),
(79, '46183', 0, 0, '2021-02-02 06:17:14'),
(80, '25155', 0, 0, '2021-02-02 06:17:14'),
(81, '73873', 0, 0, '2021-02-02 06:17:14'),
(82, '59042', 0, 0, '2021-02-02 06:17:15'),
(83, '38817', 0, 0, '2021-02-02 06:17:15'),
(84, '49409', 0, 0, '2021-02-02 06:17:15'),
(85, '91599', 0, 0, '2021-02-02 06:17:15'),
(86, '42387', 0, 0, '2021-02-08 10:13:58'),
(87, '55834', 0, 0, '2021-02-08 10:14:05'),
(88, '11151', 0, 0, '2021-02-08 10:14:09'),
(89, '10195', 0, 0, '2021-02-08 10:14:15'),
(90, '33125', 0, 0, '2021-02-08 10:14:26'),
(91, '32815', 0, 0, '2021-02-08 10:14:37'),
(92, '59297', 0, 0, '2021-02-08 10:14:38'),
(93, '13773', 0, 0, '2021-02-08 10:14:38'),
(94, '11942', 0, 0, '2021-02-08 10:14:38'),
(95, '63990', 0, 0, '2021-02-08 10:14:40'),
(96, '69808', 0, 0, '2021-02-08 10:14:40'),
(97, '72856', 0, 0, '2021-02-08 10:14:40'),
(98, '85962', 0, 0, '2021-02-08 10:14:40'),
(99, '96765', 0, 0, '2021-02-08 10:14:41'),
(100, '50740', 0, 0, '2021-02-08 10:14:41'),
(101, '71154', 0, 0, '2021-02-08 10:15:06'),
(102, '87014', 0, 0, '2021-02-08 10:16:26'),
(103, '49807', 0, 0, '2021-02-08 10:29:17'),
(104, '35801', 0, 0, '2021-02-08 10:29:45'),
(105, '87304', 0, 0, '2021-02-08 12:00:21'),
(106, '64943', 0, 0, '2021-02-08 12:09:25'),
(107, '99252', 0, 0, '2021-02-08 12:10:29'),
(108, '13192', 0, 0, '2021-02-08 12:41:59'),
(109, '79968', 0, 0, '2021-02-08 12:46:44'),
(110, '21750', 0, 0, '2021-02-08 13:02:09'),
(111, '53630', 0, 0, '2021-02-09 05:57:41'),
(112, '56595', 0, 0, '2021-02-09 05:59:20'),
(113, '65309', 0, 0, '2021-02-09 06:26:13'),
(114, '46769', 0, 0, '2021-02-09 06:27:02'),
(115, '74070', 0, 0, '2021-02-09 06:29:20'),
(116, '34294', 0, 0, '2021-02-09 06:43:27'),
(117, '97394', 0, 0, '2021-02-09 06:52:45'),
(118, '53354', 0, 0, '2021-02-09 06:54:54'),
(119, '72686', 0, 0, '2021-02-09 06:58:12'),
(120, '42580', 52, 0, '2021-02-09 07:01:10'),
(121, '16823', 0, 0, '2021-02-09 07:18:47'),
(122, '62484', 0, 0, '2021-02-09 07:20:47'),
(123, '89607', 0, 0, '2021-02-09 07:32:39'),
(124, '36449', 0, 0, '2021-02-09 10:12:23'),
(125, '16995', 0, 0, '2021-02-09 12:24:50'),
(126, '88428', 0, 0, '2021-02-09 12:29:58'),
(127, '68687', 0, 0, '2021-02-09 15:41:03'),
(128, '73389', 0, 0, '2021-02-10 04:46:51'),
(129, '32013', 0, 0, '2021-02-10 04:47:01'),
(130, '37273', 0, 0, '2021-02-10 04:47:03'),
(131, '27742', 0, 0, '2021-02-10 04:47:03'),
(132, '82055', 0, 0, '2021-02-10 04:47:04'),
(133, '45053', 0, 0, '2021-02-10 04:47:04'),
(134, '73746', 0, 0, '2021-02-10 04:47:04'),
(135, '59932', 0, 0, '2021-02-10 04:47:04'),
(136, '38616', 0, 0, '2021-02-10 05:54:12'),
(137, '97106', 0, 0, '2021-02-10 05:57:22'),
(138, '67272', 0, 0, '2021-02-10 06:02:44'),
(139, '66753', 0, 0, '2021-02-10 06:05:53'),
(140, '32460', 0, 0, '2021-02-10 06:05:58'),
(141, '66868', 58, 0, '2021-02-10 06:13:55'),
(142, '45184', 0, 0, '2021-02-10 06:39:12'),
(143, '54121', 61, 0, '2021-02-10 06:49:02'),
(144, '47374', 0, 0, '2021-02-10 07:40:34'),
(145, '48047', 0, 0, '2021-02-10 08:57:15'),
(146, '41773', 0, 0, '2021-02-10 09:30:03'),
(147, '58583', 0, 0, '2021-02-10 09:36:37'),
(148, '50041', 0, 0, '2021-02-10 09:36:56'),
(149, '55604', 0, 0, '2021-02-10 09:38:18'),
(150, '48073', 0, 0, '2021-02-10 09:41:08'),
(151, '74533', 0, 0, '2021-02-10 09:41:28'),
(152, '14340', 0, 0, '2021-02-10 09:43:14'),
(153, '32618', 0, 0, '2021-02-10 11:40:09'),
(154, '97464', 0, 0, '2021-02-10 12:14:05'),
(155, '38565', 0, 0, '2021-02-10 12:16:54'),
(156, '49699', 0, 0, '2021-02-10 12:23:18'),
(157, '11242', 0, 0, '2021-02-11 06:19:22'),
(158, '19604', 0, 0, '2021-02-11 07:23:45'),
(159, '40857', 0, 0, '2021-02-11 07:36:42'),
(160, '27890', 0, 0, '2021-02-11 07:50:04'),
(161, '13167', 0, 0, '2021-02-11 08:04:48'),
(162, '86341', 0, 0, '2021-02-11 08:51:03'),
(163, '49385', 0, 0, '2021-02-11 09:03:47'),
(164, '58976', 0, 0, '2021-02-11 09:22:46'),
(165, '83081', 0, 0, '2021-02-11 09:51:56'),
(166, '11754', 0, 0, '2021-02-11 10:11:32'),
(167, '99527', 0, 0, '2021-02-11 10:31:34'),
(168, '91347', 0, 0, '2021-02-11 11:54:42'),
(169, '64160', 0, 0, '2021-02-11 11:56:53'),
(170, '14392', 0, 0, '2021-02-11 12:05:34'),
(171, '71706', 0, 0, '2021-02-11 12:11:09'),
(172, '92256', 0, 0, '2021-02-11 12:16:43'),
(173, '97970', 0, 0, '2021-02-11 12:39:17'),
(174, '66971', 0, 0, '2021-02-11 17:02:10'),
(175, '95068', 0, 0, '2021-02-12 06:16:49'),
(176, '78260', 0, 0, '2021-02-12 06:19:10'),
(177, '84302', 0, 0, '2021-02-12 06:34:07'),
(178, '52978', 0, 0, '2021-02-12 07:33:52'),
(179, '68841', 0, 0, '2021-02-12 08:42:02'),
(180, '29349', 0, 0, '2021-02-12 09:29:44'),
(181, '77298', 0, 0, '2021-02-12 09:54:31'),
(182, '38978', 0, 0, '2021-02-12 10:24:03'),
(183, '69143', 0, 0, '2021-02-12 10:30:08'),
(184, '36126', 0, 0, '2021-02-13 09:27:51'),
(185, '30826', 0, 0, '2021-02-13 09:35:16'),
(186, '43891', 0, 0, '2021-02-13 09:35:22'),
(187, '84917', 0, 0, '2021-02-13 09:37:19'),
(188, '62205', 0, 0, '2021-02-13 09:37:25'),
(189, '20670', 0, 0, '2021-02-13 09:42:58'),
(190, '59379', 0, 0, '2021-02-13 09:49:08'),
(191, '75900', 0, 0, '2021-02-13 09:57:35'),
(192, '10049', 0, 0, '2021-02-13 10:02:53'),
(193, '22300', 0, 0, '2021-02-13 10:26:15'),
(194, '98803', 44, 0, '2021-02-13 12:28:08'),
(195, '44892', 0, 0, '2021-02-23 07:35:48'),
(196, '17344', 0, 0, '2021-02-25 09:43:45'),
(197, '15767', 0, 0, '2021-02-27 11:12:43'),
(198, '48960', 0, 0, '2021-03-01 07:58:51'),
(199, '36350', 0, 0, '2021-03-08 18:15:59'),
(200, '19970', 2, 0, '2021-03-24 12:14:20'),
(201, '32324', 0, 0, '2021-04-01 06:29:29'),
(202, '63329', 0, 0, '2021-04-01 06:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_party_details`
--

CREATE TABLE `tbl_party_details` (
  `id` int(5) NOT NULL,
  `pid` int(11) NOT NULL,
  `company_name` varchar(55) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `state_code` varchar(2) NOT NULL,
  `country` varchar(55) NOT NULL,
  `address` varchar(355) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `gst` varchar(25) NOT NULL,
  `remark` varchar(555) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_party_details`
--

INSERT INTO `tbl_party_details` (`id`, `pid`, `company_name`, `owner_name`, `mobileno`, `email`, `city`, `state`, `state_code`, `country`, `address`, `zip`, `gst`, `remark`, `created_at`, `modified_at`) VALUES
(1, 2, 'Royal Rose Industries', 'ABHISHEK BHATIA', '7014849846', 'Ruchighutey@gmail.com', 'Suratgarh', 'Rajasthan', '08', 'India', 'BNo J-51-52, RIICO INDL AREA,', '335804', '08AQPPC1704L1ZT', 'DMU Data', '2020-10-28 07:12:22', '2020-12-23 10:55:36'),
(2, 2, 'SS FURNITURE WORKS', 'Pushpinder Singh', '9899709281', 'rekha4993kaur@gmail.com', 'Alwar', 'Rajasthan', '08', 'India', '200 Feet Road, Khadanpuri, Opp. Naman Hotel,', '301001', '', 'DMU Data', '2020-10-29 02:59:06', '2020-12-11 00:28:52'),
(3, 1, 'Rakesh Traders', 'Rakesh Kumar', '7895412547', 'rk@gmail.com', 'East Delhi', 'Delhi', '07', 'India', 'West Vinod Nagar', '110092', '87AZVPK4786B4Z5', '', '2020-10-29 05:04:32', '2020-11-18 22:59:48'),
(4, 5, 'PRD Logistics', 'Anil Kumar', '9971618434', 'moosakhan921@gmail.com', 'Gurugram', 'Haryana', '06', 'India', 'ICD Container Dadri', '201307', '07AAHCD5938L1Z6', '', '2020-10-29 22:22:45', '2020-12-08 01:11:42'),
(5, 14, 'Gour Divine Enterprises', 'Yoshita', '8080799433', 'chandni@digisajilo.co.in', 'Mumbai', '', '27', 'india', 'Mumbai, Maharashtra, India', '110091', '', '', '2020-11-02 03:24:20', '2020-11-02 03:24:20'),
(6, 16, 'Azad metals PVT LTD ', 'Puneet Aggarwal ', '9781984888', 'kamleshpachauri105@gmail.com', 'Patiala', '', '03', 'India', 'Plot No. 5, Adarsh Nagar, Shahpura, Bhilwara-311404, Rajasthan, India', '311404', '03AABCA2334B1ZO', '', '2020-11-02 03:46:24', '2020-11-02 03:46:24'),
(7, 16, 'Baba Lok Nath Garments', 'surjit', '9547069716', 'www@gmail.com', 'Darjeeling', '', '19', 'India', 'Darjeeling', '123456', '', '', '2020-11-02 03:52:56', '2020-11-02 03:52:56'),
(8, 8, 'Mayur ', 'Mayur ', '9552185371', 'absar@digisajilo.com', 'UP', '', '09', 'india ', 'He said Call Back November Starting Then Talk to u E commerce website  ', '110053', '', '', '2020-11-02 03:59:48', '2020-11-02 03:59:48'),
(9, 11, 'preetika Engineer work', 'krishna ', '8426071009', 'kk394565@gmail.com', 'ugbjgbu', '', '08', 'vhfvyfv7ug', 'sdfghjkl', '110046', '', '', '2020-11-02 04:00:04', '2020-11-02 04:00:04'),
(10, 11, 'puja offset trading company', 'Rohan', '9917205430', 'rohan@digisajilo.com', 'ugbjgbu', '', '09', 'vhfvyfv7ug', 'sdfghjkl', '110046', '', '', '2020-11-02 04:02:21', '2020-11-02 04:02:21'),
(11, 19, 'Megha Enterprise', 'Akhil', '8860231107', 'sonalika@dijisajilo.com', 'Bihar', '', '10', 'India', 'street no 5 ', '121002', '', '', '2020-11-02 04:06:22', '2020-11-02 04:06:22'),
(12, 9, '', '', '', '', '', '', '08', '', '', '', '', '', '2020-11-02 04:06:47', '2020-11-02 04:06:47'),
(13, 18, 'Mohd Zia & Co. ', 'mohammad zia ', '8858939871', 'sangeeta@digisajilo.co.in', 'Uttar Pradesh  ', '', '09', 'india', 'Tanda', '224190', '09AAAPZ3128N1Z6', '', '2020-11-02 04:22:27', '2020-11-02 04:22:27'),
(14, 2, 'Saini Electrical Works', 'Hukam Chand Saini', '9711436099', 'manoj.saini1455@gmail.com', 'Alwar', 'Rajasthan', '08', 'India', 'Behind TOI Building, Tonk Road, Behror, Near Old Bus Stand, ', '', '', 'DMU Data', '2020-11-02 21:44:34', '2020-12-11 00:26:15'),
(15, 5, 'Gail India Pvt. Ltd.', 'Farhan Khan', '9582734364', 'moosakhan92@gmail.com', 'Delhi', 'Delhi', '07', 'India', 'Sector 1, Block E, Noida', '110096', '07AAHCD5938L1Z6', 'Added by Moosa', '2020-11-02 22:30:32', '2020-12-11 05:45:40'),
(16, 23, 'SRESTHA DRY FRUITS', 'ALPHA', '9310069322', 'mkuk92@gmail.com', 'India', 'Delhi', '07', 'India', 'India', '110096', '', '', '2020-12-04 06:26:26', '2020-12-04 06:26:26'),
(17, 2, 'Jayant Cloth Centre', 'Harsh Choudhary', '7229846312', 'harshchoudhary9007@gmail.com', 'Barmer', 'Rajasthan', '08', 'India', 'Ward No. 34, Pachpadra Road Sonana Dyeing Industries, Behind Bishnoi Hospital, Balotra', '344022', '08AAKHD1780Q1ZP', 'DMU Data', '2020-12-11 00:17:08', '2020-12-11 00:17:08'),
(18, 2, 'PACIFIC HANDICRAFT', 'Manish Jasmatiya', '9829025580', 'pacific1812@hotmail.com', 'Jodhpur', 'Rajasthan', '08', 'India', 'Plot No.580-B, Tulsi-Sadan, 10th \'C\' Road, Sardarpura, Near Louis Philippe,', '301001', '', '', '2020-12-11 00:32:45', '2020-12-11 00:32:45'),
(19, 2, 'Maheshwari Electros Private Limited', 'K. C. Dhoot, Raj Kumar Dhoot 919414039441,9414040031', '9414038608', 'meplsik@yahoo.com', 'Sikar', 'Rajasthan', '08', 'India', '4th K. M. Stone, Piprali Road', '301001', '', 'PG', '2020-12-11 00:37:07', '2020-12-11 00:37:07'),
(20, 2, 'IINSHA CREATIONS', 'Anil Bhati Bhati', '9414782440', 'nitmishra007@gmail.com', 'Jaipur', 'Rajasthan', '08', 'India', 'Plot No.17, Ganesh Nagar, VKI, , -', '302039', '08AOHPB8084L1ZJ', '', '2020-12-11 00:40:12', '2020-12-16 07:38:56'),
(21, 2, 'ABHINAV SYNTHETICS', 'Rajneesh', '9414148392', 'rnolkha1@gmail.com', 'Bhilwara', 'Rajasthan', '08', 'India', '128, 1st Floor, Sri Nath Tower, Pur Road.', '311001', '', '', '2020-12-11 00:43:32', '2020-12-11 00:43:32'),
(22, 2, 'A. H. RANDER MARBLES ', 'Hassan Rander', '9829078504', 'Digisajilo@gmail.com', 'Nagaur', 'Rajasthan', '08', 'India', 'B No.22 Godown, Bye Pass Road, Makrana,', '341505', '08ABHPA4413B1ZF', 'Dmu', '2020-12-11 00:46:14', '2020-12-14 14:37:29'),
(23, 2, 'RAMJAN HANDICRAFTS', 'Mohd Ramjan', '8058404828', 'ramjankhan93225@gmail.com', 'Jodhpur', 'Rajasthan', '08', 'India', 'Jodhpur', '302039', '', '', '2020-12-11 00:50:42', '2020-12-11 00:50:42'),
(24, 2, 'LAXMI TENT SUPPLIER', 'Guman Das', '9413872293', 'laxmitent@gmail.com', 'Jodhpur', 'Rajasthan', '08', 'India', 'Shankar Nagar, Near Ring Road, Jhalamand', '341505', '08DIKPD1279P1ZO', '', '2020-12-11 01:02:20', '2020-12-11 01:02:20'),
(25, 32, 'Rahul Retailer', 'Mr. Rahul', '5555555555', 'rahuldemoxyz@gmail.com', 'India', 'Delhi', '07', 'India', 'India', '110096', '', 'Party added by moosa', '2020-12-14 02:26:04', '2020-12-14 02:26:04'),
(26, 8, 'Rathi & Copmany', 'Rajendra Prakash Rathi ', '9352522119', 'mohdabsar365@gmail.com', 'Udaipur', 'Rajasthan', '08', 'India', 'Udaipur', '313001', '', 'He said i need a Dynamic Website so call back Monday Finalise You 100%', '2020-12-16 05:48:52', '2020-12-16 05:48:52'),
(27, 16, 'Invenio Industries ', 'pradeep ', '8485818707', 'www1@gmail.com', 'India', 'Maharashtra', '27', 'India', 'India', '207001', '27EUUPK4532H1Z5', 'client is interested paid service call for finally 20-25 Dec  month last talk 10 Oct month ', '2020-12-16 05:53:47', '2020-12-16 23:26:19'),
(28, 16, 'Rahmani Dyeing Company', 'Nijamudeen', '9460015602', 'www.Nijamudeen1@gmail.com', 'balotra ', 'Rajasthan', '08', 'India', 'E-157, 3rd Phase, RIICO Industrial Area, Near Canara Bank, Balotra, Barmer-344022, Rajasthan, India', '344022', '08AOZPS8178Q1Z7', 'client is interested paid service call fior finally jan month last talk Nov month ', '2020-12-16 23:23:29', '2020-12-16 23:23:29'),
(29, 16, 'Silk Jewellery Multicolor Foundation', 'Anjali Sudhakar Jadhv', '9404200900', 'anjalisudhar@gmail.com', 'Sakri', 'Maharashtra', '27', 'India', 'Gurukrupa Astrosage, Main Chowk, Malpur, Dharmraj Mandir, Rammandir, Sakri, Dhule-424310, Maharashtra, India', '424310', '27CSGPK3962B1ZT', 'client is interested paid service client say call for finally 20 dec last talk nov month ', '2020-12-17 03:08:15', '2020-12-17 03:08:15'),
(30, 16, 'GETS Abacus (OPC) Private Limited', 'kamlesh ', '9425035248', 'kamlesh@gmail.com', 'Shujalpur', 'Madhya Pradesh', '23', 'India', '12, Punjabi Mohalla, Khara Kua, Shujalpur Mandi, Shajapur-465333, Madhya Pradesh, India', '465333', '23AAGCG8704Q1Z6', 'client is interested paid service digi 1 ,2 call back fab month last 1 Dec ', '2020-12-17 03:14:32', '2020-12-17 03:14:32'),
(31, 8, 'Home Food Products', 'Amit Agarwal', '9336333207', 'mohdabsar36@gmail.com', 'India', 'Assam', '18', 'India', 'India', '110053', '', 'He said Send me One More Time Demo And Call back Tomorrow 11 AM Then Talk to u   15k for 2 year/He said Call back Saturday 11 AM Then Talk to u ', '2020-12-18 00:03:01', '2020-12-18 00:03:01'),
(32, 8, 'Ankit And Abhinav Traders', 'Ankit Verma', '7318577577', 'mohdabsar3@gmail.com', 'Aligarh', 'Rajasthan', '08', 'India', 'up', '110053', '', 'He said Call Back January 15 Then Talk to u Regarding Service  I Need a website ', '2020-12-18 00:04:57', '2020-12-18 00:04:57'),
(33, 8, 'M/s Sony Enterprises', 'Shan Mohd', '6306243058', 'mohdabsar@gmail.com', 'India', 'Andhra Pradesh', '28', 'India', 'India', '110053', '', 'he said Send me details and i need a website send me some demo then finalize u ', '2020-12-18 00:08:44', '2020-12-18 00:08:44'),
(34, 8, 'Vishwakarma Fabrication', 'Vishambhar Sharma', '9725238011', 'mohdabsa@gmail.com', 'Aligarh', 'Rajasthan', '08', 'India', 'up', '110053', '', 'He said Call back 26 December Then Take this 20k For 2 Year Talk By Farhan Sir ', '2020-12-18 00:09:42', '2020-12-18 00:09:42'),
(35, 8, 'Hanuman Sales', 'Anil Hanuman ', '7828283025', 'mohdabsar0@gmail.com', 'Aligarh', 'Rajasthan', '08', 'India', 'up', '110053', '', 'He said Send me details and call back Evening 5 Then Talk to he is saying i\'ll check and revert back to u 11800 For 1 Year  ', '2020-12-22 00:47:26', '2020-12-22 00:47:26'),
(36, 8, 'Aarushi Enterprises', 'Shashikant ', '7004512709', 'mohdabsar355@gmail.com', 'Aligarh', 'Rajasthan', '08', 'India', 'up', '110053', '', 'He said Send me details and call back tomorrow 10 To 11 AM Then Talk to u Right Now I M very Busy ', '2020-12-22 02:59:41', '2020-12-22 02:59:41'),
(37, 8, 'Manya Health Care', 'Vijay', '7991102648', 'mohdabsar395@gmail.com', 'Aligarh', 'Rajasthan', '08', 'India', 'up', '110053', '', 'He said I m in bank right now send me details and call back some time and I’ll Make A Plan for website nearest Tuesday ', '2020-12-22 03:12:18', '2020-12-22 03:12:18'),
(38, 34, 'Bharat', 'Harshit', '8860832641', 'arvindbhatiya535@gmail.com', 'Delhi', 'Delhi', '07', 'India', '1419 Kucha Ustad Hira Delhi - 110006', '110006', '', '', '2020-12-22 04:52:06', '2020-12-22 04:52:06'),
(39, 29, 'Sai Traders', 'Prabhakaran', '9874532178', 'rk.webdev2007@gmail.com', 'Delhi', 'Delhi', '07', 'India', 'Anand Ashram Marg', '110092', '18AABCU9603R1ZM', 'TESTING', '2020-12-23 02:21:18', '2020-12-23 02:21:18'),
(40, 42, 'ABC', 'xyz', '8527783906', 'ajha5323@gmail.com', 'Noida', 'Uttar Pradesh', '09', 'INDIA', 'B 24, FIRST FLOOR,OFFICE NO. 3, SECTOR 1', '201301', '07AAHCD5938L1Z6', 'A 44 Floor 1', '2021-01-22 03:59:28', '2021-01-22 03:59:28'),
(41, 5, 'TESting by rk', 'Rakesh', '9582734364', 'rk001@gmail.com', 'India', 'Karnataka', '29', 'India', 'India', '110092', '', 'Testing', '2021-01-22 04:18:44', '2021-01-22 04:18:44'),
(42, 5, 'fdas', 'asdfa', '9874123987', 'rk@gmail.com', 'asdfa', 'Himachal Pradesh', '02', 'adsfa', 'dsfas', '110092', '', 'asdf', '2021-01-22 04:19:49', '2021-01-22 04:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `password` varchar(555) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('client','registered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(2) NOT NULL,
  `pid` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(555) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `pid`, `name`, `email`, `password`, `mobileno`, `city`, `state`, `country`, `address`, `zip`, `created_at`, `modified_at`) VALUES
(1, 5, 'Rakesh fasdfa', 'usertest@gmail.com', 'e3afed0047b08059d0fada10f400c1e5', '7854125478', 'Delhi', 'Delhi', 'India', 'cxte dfdste dfasd', '110095', '2020-12-04 14:47:27', '2020-12-07 06:00:57'),
(2, 5, 'Rakesh1', 'usertest1@gmail.com', 'e3afed0047b08059d0fada10f400c1e5', '7854125478', 'Delhi', 'Delhi', 'India', 'cxte dfdste dfasd 1', '110095', '2020-12-04 14:47:27', '2020-12-04 14:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE `tbl_visitors` (
  `id` int(11) NOT NULL,
  `count` int(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`id`, `count`, `created_at`, `modified_at`) VALUES
(1, 6124, '2020-12-18 23:24:50', '2021-04-07 06:56:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bill_details`
--
ALTER TABLE `tbl_bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_otp_expiry`
--
ALTER TABLE `tbl_otp_expiry`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_party_details`
--
ALTER TABLE `tbl_party_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bill_details`
--
ALTER TABLE `tbl_bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_otp_expiry`
--
ALTER TABLE `tbl_otp_expiry`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `tbl_party_details`
--
ALTER TABLE `tbl_party_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
