-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 06:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_on_tbl`
--

CREATE TABLE IF NOT EXISTS `add_on_tbl` (
`add_on_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `tos` varchar(255) NOT NULL,
  `adjustment` varchar(255) NOT NULL,
  `commision` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `add_on_tbl`
--

INSERT INTO `add_on_tbl` (`add_on_id`, `emp_id`, `from`, `tos`, `adjustment`, `commision`, `enabled`) VALUES
(1, 10033, '2019-01-01', '2019-02-09', '1', '3', 1),
(4, 10033, '2019-01-26', '2019-02-10', '1', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bracket_for_gov_remettance_tbl`
--

CREATE TABLE IF NOT EXISTS `bracket_for_gov_remettance_tbl` (
`bfgr_id` int(11) NOT NULL,
  `name_of_bracket` varchar(255) NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `monthly_deduction` varchar(255) NOT NULL,
  `employee_addon` varchar(255) NOT NULL,
  `bfgr_given_id` varchar(255) NOT NULL,
  `used` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bracket_for_gov_remettance_tbl`
--

INSERT INTO `bracket_for_gov_remettance_tbl` (`bfgr_id`, `name_of_bracket`, `salary_range`, `monthly_deduction`, `employee_addon`, `bfgr_given_id`, `used`, `enabled`) VALUES
(1, 'SSS', '10000', '1', '10', 'brsss_1', 1, 1),
(2, 'PHILHEALTH', '10000', '999', '1000', 'brphilhealth_2', 1, 1),
(3, 'PAG-IBIG', '10000', '10000', '10000', 'brpag-ibig_3', 1, 1),
(4, 'SSS', '11000', '1', '10', 'brsss_4', 1, 1),
(5, 'SSS', '12000', '1', '10', 'brsss_5', 1, 1),
(6, 'SSS', '10000', '1', '10', 'brsss_6', 1, 1),
(7, 'PHILHEALTH', '10000', '500', '501', 'brphilhealth_7', 1, 1),
(8, 'PAG-IBIG', '19000', '999', '900', 'brpag-ibig_8', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bracket_type_tbl`
--

CREATE TABLE IF NOT EXISTS `bracket_type_tbl` (
`bracket_id` int(11) NOT NULL,
  `bracket_name` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bracket_type_tbl`
--

INSERT INTO `bracket_type_tbl` (`bracket_id`, `bracket_name`, `enabled`) VALUES
(1, 'SSS', 1),
(2, 'PHILHEALTH', 1),
(3, 'PAG-IBIG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `computational_time_tbl`
--

CREATE TABLE IF NOT EXISTS `computational_time_tbl` (
`computational_time_id` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `date_time_in` time NOT NULL,
  `date_time_out` time NOT NULL,
  `date` date NOT NULL,
  `over_time_total_hour` varchar(255) NOT NULL,
  `under_time_total_hour` varchar(255) NOT NULL,
  `total_accomplished_hours` varchar(255) NOT NULL,
  `total_hours_to_comply_daily` varchar(255) NOT NULL,
  `holiday_pay` varchar(255) NOT NULL,
  `holiday_hourly_pay` varchar(255) NOT NULL,
  `over_time_premium` varchar(255) NOT NULL,
  `day_type` varchar(255) NOT NULL,
  `leave_from` varchar(255) NOT NULL,
  `leave_to` varchar(255) NOT NULL,
  `absent` varchar(255) NOT NULL,
  `schedue_time` varchar(255) NOT NULL,
  `time_suspend` varchar(255) NOT NULL,
  `tardiness_amount_to_deduct` varchar(255) NOT NULL,
  `total_hours_of_juty_required` varchar(255) NOT NULL,
  `total_normal_pay` varchar(255) NOT NULL,
  `tardiness_time_total` varchar(255) NOT NULL,
  `late_in_time_status` varchar(255) NOT NULL,
  `late_hour_no_deduction` varchar(255) NOT NULL,
  `total_pay_for_over_all_hour` varchar(255) NOT NULL,
  `late_leave` varchar(255) NOT NULL,
  `over_time_amount` varchar(255) NOT NULL,
  `salary_per_day_amount` varchar(255) NOT NULL,
  `salary_per_hour_amount` varchar(255) NOT NULL,
  `total_hours_of_juty_complied` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14063 ;

--
-- Dumping data for table `computational_time_tbl`
--

INSERT INTO `computational_time_tbl` (`computational_time_id`, `enabled`, `emp_id`, `emp_name`, `date_time_in`, `date_time_out`, `date`, `over_time_total_hour`, `under_time_total_hour`, `total_accomplished_hours`, `total_hours_to_comply_daily`, `holiday_pay`, `holiday_hourly_pay`, `over_time_premium`, `day_type`, `leave_from`, `leave_to`, `absent`, `schedue_time`, `time_suspend`, `tardiness_amount_to_deduct`, `total_hours_of_juty_required`, `total_normal_pay`, `tardiness_time_total`, `late_in_time_status`, `late_hour_no_deduction`, `total_pay_for_over_all_hour`, `late_leave`, `over_time_amount`, `salary_per_day_amount`, `salary_per_hour_amount`, `total_hours_of_juty_complied`) VALUES
(14053, 1, '10033', 'dave x', '07:48:00', '12:00:00', '2019-01-26', '0', '', '3.48', '8', '', '', '', 'special', '', '', '', '', '', '0', '3.54', '423', '0', '', '', '549.9', '', '0', '423', '53', ''),
(14054, 1, '10033', 'dave x', '08:30:00', '19:30:00', '2019-01-28', '1.44', '', '9.74', '8', '', '', '', 'none', '', '', '', '', '', '0', '8', '423', '0', '', '', '476', '', '53', '423', '53', ''),
(14055, 1, '10033', 'dave x', '08:50:00', '17:31:00', '2019-01-29', '0', '', '7.51', '8', '', '', '', 'none', '', '', '', '', '', '3.5333333333333', '7.31', '419.46666666667', '4', '', '', '419.46666666667', '', '0', '423', '53', ''),
(14056, 1, '10033', 'dave x', '08:44:00', '17:33:00', '2019-01-30', '0', '', '8.97', '8', '', '', '', 'none', '', '', '', '', '', '0', '8', '423', '0', '', '', '423', '', '0', '423', '53', ''),
(14057, 1, '10033', 'dave x', '08:50:00', '17:36:00', '2019-01-31', '0', '', '6.56', '8', '', '', '', 'none', '', '', '', '', '', '3.5333333333333', '6.86', '419.46666666667', '4', '', '', '419.46666666667', '', '0', '423', '53', ''),
(14058, 1, '10033', 'dave x', '08:24:00', '17:31:00', '2019-02-01', '0', '', '8.79', '8', '', '', '', 'none', '', '', '', '', '', '0', '8', '423', '0', '', '', '423', '', '0', '423', '53', ''),
(14059, 1, '10033', 'dave x', '08:52:00', '12:14:00', '2019-02-02', '0', '', '7.6333333333333', '8', '', '', '', 'none', '', '', '', '', '', '5.2875', '7.6333333333333', '423', '6', '', '', '417.7125', '', '0', '423', '53', ''),
(14060, 1, '10033', 'dave x', '08:35:00', '17:32:00', '2019-02-06', '0', '', '8.89', '8', '', '', '', 'none', '', '', '', '', '', '0', '8', '423', '0', '', '', '423', '', '0', '423', '53', ''),
(14061, 1, '10033', 'dave x', '08:44:00', '17:44:00', '2019-02-07', '0', '', '8.86', '8', '', '', '', 'none', '', '', '', '', '', '0', '8', '423', '0', '', '', '423', '', '0', '423', '53', ''),
(14062, 1, '10033', 'dave x', '08:47:00', '18:31:00', '2019-02-08', '1.1', '', '8.48', '8', '', '', '', 'none', '', '', '', '', '', '0.88333333333333', '7.34', '422.11666666667', '1', '', '', '475.11666666667', '', '53', '423', '53', '');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_action`
--

CREATE TABLE IF NOT EXISTS `deduction_action` (
`deduction_action_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `deduction_action`
--

INSERT INTO `deduction_action` (`deduction_action_id`, `emp_id`, `amount`, `status`) VALUES
(5, 10044, 100, 1),
(6, 10044, 100, 1),
(7, 10044, 100, 1),
(8, 10044, 100, 1),
(9, 10044, 100, 1),
(10, 10044, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deduction_item`
--

CREATE TABLE IF NOT EXISTS `deduction_item` (
`deduction_item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_left` int(11) NOT NULL,
  `amount_to_deduct` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `deduction_item`
--

INSERT INTO `deduction_item` (`deduction_item_id`, `item_name`, `amount`, `amount_left`, `amount_to_deduct`, `emp_id`, `start`, `end`, `status`, `enabled`) VALUES
(5, 'others', 1000, 0, 300, 10033, '2019-01-10', '2019-01-26', 1, 1),
(6, 'sss', 1000, 0, 300, 10033, '2019-01-10', '2019-01-26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE IF NOT EXISTS `department_tbl` (
`dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`dept_id`, `dept_name`, `enabled`) VALUES
(1, 'BackOffice', 1),
(2, 'finance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_tbl` (
`emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `sss_bracket` varchar(255) NOT NULL,
  `philhealth_bracket` varchar(255) NOT NULL,
  `pag_ibig_bracket` varchar(255) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `pey_per_day` double NOT NULL,
  `pay_per_hour` float NOT NULL,
  `shedule_type` varchar(255) NOT NULL,
  `time_out_sched` varchar(255) NOT NULL,
  `daily_salary` float NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emp_leave_available` double NOT NULL,
  `emp_sick_leave_available` int(11) NOT NULL,
  `juty_day_from` varchar(255) NOT NULL,
  `juty_day_to` varchar(255) NOT NULL,
  `emp_date_hired` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`emp_id`, `emp_name`, `dept`, `position`, `salary`, `sss_bracket`, `philhealth_bracket`, `pag_ibig_bracket`, `pay_type`, `pey_per_day`, `pay_per_hour`, `shedule_type`, `time_out_sched`, `daily_salary`, `user_type`, `emp_code`, `username`, `password`, `emp_leave_available`, `emp_sick_leave_available`, `juty_day_from`, `juty_day_to`, `emp_date_hired`, `enabled`) VALUES
(1, 'dave x', '1', '1', 11000, 'brsss_1', 'brphilhealth_2', 'brsss_1', 'monthly', 423, 53, '08:46:00', '17:30:00', 423, 'user', '10033', 'dave', 'dave', 7, 6, 'Monday', 'Saturday', '2018-10-01', 1),
(12, 'marvy', '1', '5', 11000, 'brsss_1', 'brphilhealth_2', 'brpag-ibig_3', 'monthly', 423.07692307692, 52.8846, '08:46:00', '17:30:00', 423.077, 'user', '10040x', 'marvy', 'marvy', 0, 0, 'Monday', 'Saturday', '2019-02-01', 1),
(16, 'sample', '1', '5', 11000, 'brsss_1', 'brphilhealth_2', 'brpag-ibig_3', 'monthly', 423.07692307692, 52.8846, '08:46:00', '17:30:00', 423.077, 'user', '10041x', 'sample', 'sample', 0, -1, 'Monday', 'Saturday', '2019-02-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_time_record_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_time_record_tbl` (
`emp_time_record_id` int(11) NOT NULL,
  `date_time_record` date NOT NULL,
  `time_in_date` time NOT NULL,
  `time_out_date` time NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `holiday_type` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `employee_time_record_tbl`
--

INSERT INTO `employee_time_record_tbl` (`emp_time_record_id`, `date_time_record`, `time_in_date`, `time_out_date`, `emp_id`, `holiday_type`, `enabled`) VALUES
(1, '2019-01-26', '07:48:00', '12:00:00', '10033', 'special', 1),
(2, '2019-01-28', '08:30:00', '19:30:00', '10033', '', 1),
(3, '2019-01-29', '08:50:00', '17:31:00', '10033', '', 1),
(4, '2019-01-30', '08:44:00', '17:33:00', '10033', '', 1),
(5, '2019-01-31', '08:50:00', '17:36:00', '10033', '', 1),
(6, '2019-02-01', '08:24:00', '17:31:00', '10033', '', 1),
(7, '2019-02-02', '08:52:00', '12:14:00', '10033', '', 1),
(8, '2019-02-06', '08:35:00', '17:32:00', '10033', '', 1),
(9, '2019-02-07', '08:44:00', '17:44:00', '10033', '', 1),
(10, '2019-02-08', '08:47:00', '18:31:00', '10033', '', 1),
(11, '2019-01-26', '07:47:00', '12:04:00', '10040', '', 1),
(12, '2019-01-26', '07:47:00', '12:04:00', '10040', '', 1),
(13, '2019-01-26', '07:47:00', '12:04:00', '10040', '', 1),
(14, '2019-01-28', '08:30:00', '17:33:00', '10040', '', 1),
(15, '2019-01-29', '08:31:00', '17:58:00', '10040', '', 1),
(16, '2019-01-30', '08:36:00', '17:31:00', '10040', '', 1),
(17, '2019-01-31', '08:41:00', '17:38:00', '10040', '', 1),
(18, '2019-02-01', '08:42:00', '17:34:00', '10040', '', 1),
(19, '2019-02-02', '08:52:00', '12:04:00', '10040', '', 1),
(20, '2019-02-04', '08:05:00', '17:32:00', '10040', '', 1),
(21, '2019-02-07', '08:05:00', '17:31:00', '10040', '', 1),
(22, '2019-02-08', '08:13:00', '17:31:00', '10040', '', 1),
(23, '2019-02-09', '09:06:00', '13:00:00', '10040', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `for_holiday_days_tbl`
--

CREATE TABLE IF NOT EXISTS `for_holiday_days_tbl` (
`for_holiday_days_id` int(11) NOT NULL,
  `holiday_type` varchar(255) NOT NULL,
  `daily_type_rate` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `for_holiday_days_tbl`
--

INSERT INTO `for_holiday_days_tbl` (`for_holiday_days_id`, `holiday_type`, `daily_type_rate`, `enabled`) VALUES
(1, 'legal', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `for_holiday_hour_tbl`
--

CREATE TABLE IF NOT EXISTS `for_holiday_hour_tbl` (
`for_holiday_hour_id` int(11) NOT NULL,
  `holiday_type` int(11) NOT NULL,
  `hourly_type_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE IF NOT EXISTS `leave_tbl` (
`leave_id` int(11) NOT NULL,
  `type_of_leave` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_file_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `approved` int(11) NOT NULL,
  `use` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`leave_id`, `type_of_leave`, `emp_id`, `leave_from`, `leave_to`, `leave_file_date`, `reason`, `approved`, `use`, `enabled`) VALUES
(1, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0),
(2, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0),
(3, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0),
(4, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0),
(5, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0),
(6, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0),
(7, 'vacation leave', '10033', '2019-02-01', '2019-02-04', '2019-02-28', 'sadadasda', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_display_tbl`
--

CREATE TABLE IF NOT EXISTS `payroll_display_tbl` (
`payroll_display_id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `employee_sal_per_day` varchar(255) NOT NULL,
  `employee_sal_per_month` varchar(255) NOT NULL,
  `employee_sal_per_hour` varchar(255) NOT NULL,
  `employee_total_hours_complied` varchar(255) NOT NULL,
  `employee_total_hours_to_comply` varchar(255) NOT NULL,
  `employee_total_tardiness_time` varchar(255) NOT NULL,
  `employee_total_tardiness_amount` varchar(255) NOT NULL,
  `employee_total_over_time` varchar(255) NOT NULL,
  `employee_total_over_time_amount` varchar(255) NOT NULL,
  `employee_sss_amount` int(11) NOT NULL,
  `employee_philh_amount` int(11) NOT NULL,
  `employee_pag_i_amount` int(11) NOT NULL,
  `legal` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `total_absent` int(11) NOT NULL,
  `employee_total_salary_tally` int(11) NOT NULL,
  `employee_gross_salary` int(11) NOT NULL,
  `employee_net_salary` int(11) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=573 ;

--
-- Dumping data for table `payroll_display_tbl`
--

INSERT INTO `payroll_display_tbl` (`payroll_display_id`, `emp_id`, `emp_name`, `employee_sal_per_day`, `employee_sal_per_month`, `employee_sal_per_hour`, `employee_total_hours_complied`, `employee_total_hours_to_comply`, `employee_total_tardiness_time`, `employee_total_tardiness_amount`, `employee_total_over_time`, `employee_total_over_time_amount`, `employee_sss_amount`, `employee_philh_amount`, `employee_pag_i_amount`, `legal`, `special`, `total_absent`, `employee_total_salary_tally`, `employee_gross_salary`, `employee_net_salary`, `pay_type`, `enabled`) VALUES
(572, '10033', 'dave x', '423.077', '11000', '52.8846', '72.18', '68.13', '15', '13.2211525', '0', '0', 1, 999, 1, 0, 1, 3, 4385, 4385, 3384, 'monthly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE IF NOT EXISTS `position_tbl` (
`position_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`position_id`, `position_name`, `dept_id`, `enabled`) VALUES
(1, 'STAFF', 1, 1),
(4, 'DEVELOPER\r\n', 2, 1),
(5, 'TECHNICIAN\r\n', 1, 1),
(6, 'TESTER', 2, 1),
(7, 'a', 1, 1),
(8, 'asdasdasd', 2, 0),
(9, 'z', 2, 0),
(10, 's', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `time_suspend_tbl`
--

CREATE TABLE IF NOT EXISTS `time_suspend_tbl` (
`time_suspend_id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `date_time_suspend` date NOT NULL,
  `time_from` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approved` int(11) NOT NULL,
  `checked` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_on_tbl`
--
ALTER TABLE `add_on_tbl`
 ADD PRIMARY KEY (`add_on_id`);

--
-- Indexes for table `bracket_for_gov_remettance_tbl`
--
ALTER TABLE `bracket_for_gov_remettance_tbl`
 ADD PRIMARY KEY (`bfgr_id`);

--
-- Indexes for table `bracket_type_tbl`
--
ALTER TABLE `bracket_type_tbl`
 ADD PRIMARY KEY (`bracket_id`);

--
-- Indexes for table `computational_time_tbl`
--
ALTER TABLE `computational_time_tbl`
 ADD PRIMARY KEY (`computational_time_id`);

--
-- Indexes for table `deduction_action`
--
ALTER TABLE `deduction_action`
 ADD PRIMARY KEY (`deduction_action_id`);

--
-- Indexes for table `deduction_item`
--
ALTER TABLE `deduction_item`
 ADD PRIMARY KEY (`deduction_item_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
 ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
 ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_time_record_tbl`
--
ALTER TABLE `employee_time_record_tbl`
 ADD PRIMARY KEY (`emp_time_record_id`);

--
-- Indexes for table `for_holiday_days_tbl`
--
ALTER TABLE `for_holiday_days_tbl`
 ADD PRIMARY KEY (`for_holiday_days_id`);

--
-- Indexes for table `for_holiday_hour_tbl`
--
ALTER TABLE `for_holiday_hour_tbl`
 ADD PRIMARY KEY (`for_holiday_hour_id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
 ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `payroll_display_tbl`
--
ALTER TABLE `payroll_display_tbl`
 ADD PRIMARY KEY (`payroll_display_id`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
 ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `time_suspend_tbl`
--
ALTER TABLE `time_suspend_tbl`
 ADD PRIMARY KEY (`time_suspend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_on_tbl`
--
ALTER TABLE `add_on_tbl`
MODIFY `add_on_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bracket_for_gov_remettance_tbl`
--
ALTER TABLE `bracket_for_gov_remettance_tbl`
MODIFY `bfgr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bracket_type_tbl`
--
ALTER TABLE `bracket_type_tbl`
MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `computational_time_tbl`
--
ALTER TABLE `computational_time_tbl`
MODIFY `computational_time_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14063;
--
-- AUTO_INCREMENT for table `deduction_action`
--
ALTER TABLE `deduction_action`
MODIFY `deduction_action_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `deduction_item`
--
ALTER TABLE `deduction_item`
MODIFY `deduction_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `employee_time_record_tbl`
--
ALTER TABLE `employee_time_record_tbl`
MODIFY `emp_time_record_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `for_holiday_days_tbl`
--
ALTER TABLE `for_holiday_days_tbl`
MODIFY `for_holiday_days_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `for_holiday_hour_tbl`
--
ALTER TABLE `for_holiday_hour_tbl`
MODIFY `for_holiday_hour_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payroll_display_tbl`
--
ALTER TABLE `payroll_display_tbl`
MODIFY `payroll_display_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=573;
--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `time_suspend_tbl`
--
ALTER TABLE `time_suspend_tbl`
MODIFY `time_suspend_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
