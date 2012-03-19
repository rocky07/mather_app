-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2012 at 11:07 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `mather`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `notes` text NOT NULL,
  `email_id` varchar(60) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `fullname`, `type`, `notes`, `email_id`) VALUES
(1, 'admin', 'YWRtaW4=', 'Admin', 1, 'Super Admin with Full Control', 'sreejith@matherprojects.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_availability_chart`
--

CREATE TABLE `tbl_availability_chart` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `chart_data` longblob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_availability_chart`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL auto_increment,
  `district_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `district_name`) VALUES
(1, 'Thiruvananthapuram'),
(2, 'Kollam'),
(3, 'Pathanamthitta'),
(4, 'Alappuzha'),
(5, 'Kottayam'),
(6, 'Idukki'),
(7, 'Cochin'),
(8, 'Thrissur'),
(9, 'Palakkad'),
(10, 'Malappuram'),
(11, 'Kozhikode'),
(12, 'Wayanad'),
(13, 'Kannur'),
(14, 'Kasaragod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `id` int(11) NOT NULL auto_increment,
  `caption` varchar(150) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_ebrochure`
--

CREATE TABLE `tbl_ebrochure` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `ebrochure` varchar(230) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_ebrochure`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_flash_home`
--

CREATE TABLE `tbl_flash_home` (
  `flash` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_flash_home`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_flash_images`
--

CREATE TABLE `tbl_flash_images` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `flash_image` varchar(230) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_flash_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_floor`
--

CREATE TABLE `tbl_floor` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `tower_id` int(11) NOT NULL,
  `floor_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_floor`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_floor_type`
--

CREATE TABLE `tbl_floor_type` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `floor_type_name` varchar(80) NOT NULL,
  `square_feet` double(10,2) NOT NULL,
  `Image_name` varchar(80) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_tbl_floor_type_1` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_floor_type`
--

INSERT INTO `tbl_floor_type` (`id`, `project_id`, `floor_type_name`, `square_feet`, `Image_name`) VALUES
(2, 1, 'Diamond', 3070.00, '-E47a7hZ52y_upload.jpg'),
(3, 1, 'Platinum', 2570.00, '-DSXLlyIo9O_upload.jpg'),
(4, 1, 'Gold', 2085.00, '-iWYyoVkhxH_upload.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `news_id` int(10) unsigned NOT NULL,
  `image_name` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_details` text NOT NULL,
  `news_headline` varchar(88) NOT NULL,
  `news_priority` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_news`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `location` varchar(80) NOT NULL,
  `no_of_floors` varchar(60) NOT NULL,
  `unit_type` varchar(80) NOT NULL,
  `land_area` varchar(80) NOT NULL,
  `project_status` varchar(80) NOT NULL,
  `current_status` varchar(80) NOT NULL,
  `summary` text NOT NULL,
  `specification` text NOT NULL,
  `amenities` text NOT NULL,
  `location_map` varchar(80) default NULL COMMENT 'name of the map uploaded',
  `project_image` varchar(150) NOT NULL,
  `project_logo` varchar(150) NOT NULL,
  `district_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `short_summary` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `prj_priority` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `project_type`, `location`, `no_of_floors`, `unit_type`, `land_area`, `project_status`, `current_status`, `summary`, `specification`, `amenities`, `location_map`, `project_image`, `project_logo`, `district_id`, `category`, `short_summary`, `latitude`, `longitude`, `prj_priority`) VALUES
(1, 'Palm Meadows', 'Eco Friendly Villas', 'Alampady', '300', '3,4 bhk villas', '', 'Ongoing', '', '&lt;p&gt;Palm Meadows has been specially envisioned to be a dream-come-true. Every aspect and every facility here has been planned and executed to perfection. From design, to architecture to the interiors, everything boasts elegance and sophistication.&lt;/p&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;Palm Meadows brings you closer to nature by bringing nature closer to you! Carefully planned and compliant architecture, excellent location. Man made green forest, with over 60% of open spaces, brings you the best relaxed and healthy environment.&lt;/div&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;The township is nurtured with latest in Rainwater Harvesting technology, infiltration drainage system, water conserving fixtures &amp;amp; fittings, along with native &amp;amp; low water consuming plants, let you save every drop of water you can.&lt;/div&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;Palm Meadows brings you scientifically planned health Club to lead a healthy life style with the latest world-class equipment. A well equipped ultra modern gymnasium. World class Ayurvedic clinic, Beauty spa with Steam bath and Jacuzzi along with a Yoga center for complete rejuvenation. Entertainment hub with facilities to rival metro-standards where the breath of heart meets the soul of nature!&lt;/div&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;Palm Meadows offers World Class villas with a superior quality international facilities and amenities to offer a pampered lifestyle.&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '&lt;ul&gt;\r\n    &lt;li&gt;spec1&lt;/li&gt;\r\n    &lt;li&gt;spec1&lt;/li&gt;\r\n    &lt;li&gt;spec1&lt;/li&gt;\r\n    &lt;li&gt;spec1&lt;/li&gt;\r\n    &lt;li&gt;spec1&amp;nbsp;&lt;/li&gt;\r\n    &lt;li&gt;spec1&lt;/li&gt;\r\n&lt;/ul&gt;', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n    &lt;li&gt;&amp;nbsp;Pool&lt;/li&gt;\r\n    &lt;li&gt;Power Backup&lt;/li&gt;\r\n    &lt;li&gt;Security&lt;/li&gt;\r\n    &lt;li&gt;Water&lt;/li&gt;\r\n&lt;/ul&gt;', NULL, '-MhtLV5CvNY_upload.jpg', '', 13, 'Villa', ' Palm Meadows has been specially envisioned to be a dream-come-true. Every aspect and every facility here has been planned and executed to perfection. From design, to architecture to the interiors, everything boasts elegance and sophistication.', 12.550113, 75.053573, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_flash`
--

CREATE TABLE `tbl_project_flash` (
  `pid` int(11) NOT NULL,
  `flash` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_flash`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_images`
--

CREATE TABLE `tbl_project_images` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `image_name` varchar(80) NOT NULL,
  `caption` varchar(80) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_tbl_project_images_1` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_project_images`
--

INSERT INTO `tbl_project_images` (`id`, `project_id`, `image_name`, `caption`) VALUES
(2, 1, '-Kk2vs4gw42_upload.jpg', ''),
(3, 1, '-wrg30DDard_upload.jpg', ''),
(4, 1, '-9lijFaqRs4_upload.jpg', ''),
(5, 1, '-QfihryU2y9_upload.jpg', ''),
(6, 1, '-VKgSQJ1roh_upload.jpg', ''),
(7, 1, '-V21u3SrJQu_upload.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tower`
--

CREATE TABLE `tbl_tower` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `tower_name` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_tower`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_units`
--

CREATE TABLE `tbl_units` (
  `id` int(11) NOT NULL auto_increment,
  `floor_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `floor_type_id` int(11) NOT NULL,
  `square_feet` varchar(200) NOT NULL,
  `noofrooms` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_units`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_zipfile`
--

CREATE TABLE `tbl_zipfile` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `zip_file` varchar(230) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_zipfile`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_floor_type`
--
ALTER TABLE `tbl_floor_type`
  ADD CONSTRAINT `FK_tbl_floor_type_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_project_images`
--
ALTER TABLE `tbl_project_images`
  ADD CONSTRAINT `FK_tbl_project_images_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE;
