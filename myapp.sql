/*
SQLyog Ultimate v8.82 
MySQL - 5.6.17 : Database - sms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `sms`;

/*Table structure for table `academic_program_subjects` */

DROP TABLE IF EXISTS `academic_program_subjects`;

CREATE TABLE `academic_program_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_program_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `taught_by` int(11) DEFAULT NULL,
  `number_of_session` int(11) DEFAULT NULL,
  `monday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `monday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `monday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `academic_program_subject_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tuesday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `tuesday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `tuesday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `wednesday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `wednesday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `wednesday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `thursday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `thursday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `thursday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `friday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `friday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `friday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `saturday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `saturday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `saturday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `sunday_time_start` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `sunday_time_end` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `sunday` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `academic_program_subjects` */

LOCK TABLES `academic_program_subjects` WRITE;

UNLOCK TABLES;

/*Table structure for table `academic_programs` */

DROP TABLE IF EXISTS `academic_programs`;

CREATE TABLE `academic_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `academic_program_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `number_of_semester` int(11) DEFAULT '0',
  `price_per_semester` double DEFAULT '0',
  `number_of_term` int(11) DEFAULT '0',
  `price_per_term` double DEFAULT '0',
  `number_of_month` int(11) DEFAULT '0',
  `price_per_month` double DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `full_program_price` double DEFAULT '0',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `academic_programs` */

LOCK TABLES `academic_programs` WRITE;

UNLOCK TABLES;

/*Table structure for table `academics` */

DROP TABLE IF EXISTS `academics`;

CREATE TABLE `academics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `academic_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `academics` */

LOCK TABLES `academics` WRITE;

UNLOCK TABLES;

/*Table structure for table `book_borrowings` */

DROP TABLE IF EXISTS `book_borrowings`;

CREATE TABLE `book_borrowings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `book_borrowings` */

LOCK TABLES `book_borrowings` WRITE;

UNLOCK TABLES;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `book_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `isbn` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `price` double DEFAULT NULL,
  `book_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `edition` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `publisher` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `copy` int(11) DEFAULT NULL,
  `book_position` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `shelf_no` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `books` */

LOCK TABLES `books` WRITE;

UNLOCK TABLES;

/*Table structure for table `buildings` */

DROP TABLE IF EXISTS `buildings`;

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `building_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `number_of_room` int(11) DEFAULT NULL,
  `building_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `buildings` */

LOCK TABLES `buildings` WRITE;

UNLOCK TABLES;

/*Table structure for table `ci_cookies` */

DROP TABLE IF EXISTS `ci_cookies`;

CREATE TABLE `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `netid` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `orig_page_requested` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `php_session_id` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ci_cookies` */

LOCK TABLES `ci_cookies` WRITE;

UNLOCK TABLES;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ci_sessions` */

LOCK TABLES `ci_sessions` WRITE;

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('14d56f3e9489c7bb775700c7a93ef0af','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0',1432545827,'a:4:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:8:\"monorith\";s:12:\"is_logged_in\";b:1;s:11:\"school_name\";s:26:\"Logos International School\";}');

UNLOCK TABLES;

/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) DEFAULT NULL,
  `class_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `class_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `classes` */

LOCK TABLES `classes` WRITE;

UNLOCK TABLES;

/*Table structure for table `classroom_types` */

DROP TABLE IF EXISTS `classroom_types`;

CREATE TABLE `classroom_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `classroom_type_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `classroom_types` */

LOCK TABLES `classroom_types` WRITE;

insert  into `classroom_types`(`id`,`classroom_type`,`classroom_type_description`,`status`,`created_date`,`modified_date`) values (2,'Classroom','This is updated',1,'2015-05-11 20:00:02','2015-05-11 20:45:11'),(3,'Laboratory','',1,'2015-05-11 20:00:02',NULL),(4,'Office','',1,'2015-05-11 20:00:02',NULL),(5,'Bathroom','',1,'2015-05-11 20:00:02',NULL),(6,'Other','',1,'2015-05-11 20:00:02',NULL),(7,'Sleeping Room','',1,'2015-05-11 20:00:02',NULL),(8,'Sleeping Room','',0,'2015-05-11 20:00:02',NULL);

UNLOCK TABLES;

/*Table structure for table `classrooms` */

DROP TABLE IF EXISTS `classrooms`;

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building_id` int(11) DEFAULT NULL,
  `classroom_type_id` int(11) DEFAULT NULL,
  `classroom_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `number_of_student` int(11) DEFAULT NULL,
  `classroom_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `classrooms` */

LOCK TABLES `classrooms` WRITE;

UNLOCK TABLES;

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `comments` */

LOCK TABLES `comments` WRITE;

UNLOCK TABLES;

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `department_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `department_phone1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `department_phone2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `department_fax` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `department_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `departments` */

LOCK TABLES `departments` WRITE;

UNLOCK TABLES;

/*Table structure for table `faculties` */

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `faculty_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `faculty_phone1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `faculty_phone2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `faculty_fax` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `faculty_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `faculties` */

LOCK TABLES `faculties` WRITE;

UNLOCK TABLES;

/*Table structure for table `membership` */

DROP TABLE IF EXISTS `membership`;

CREATE TABLE `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_addres` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pass_word` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `membership` */

LOCK TABLES `membership` WRITE;

insert  into `membership`(`id`,`first_name`,`last_name`,`email_addres`,`user_name`,`pass_word`) values (1,'admin','admin','admin@admin.com','admin','e10adc3949ba59abbe56e057f20f883e'),(2,'bros','dynamic','bros@gmail.com','broscute','e10adc3949ba59abbe56e057f20f883e'),(3,'thancheat','monorith','monorith@gmail.com','monorith','e10adc3949ba59abbe56e057f20f883e');

UNLOCK TABLES;

/*Table structure for table `noticeboards` */

DROP TABLE IF EXISTS `noticeboards`;

CREATE TABLE `noticeboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `notice_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` varchar(12) COLLATE utf8_bin DEFAULT '00:00:00',
  `end_time` varchar(12) COLLATE utf8_bin DEFAULT '23:59:59',
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `noticeboards` */

LOCK TABLES `noticeboards` WRITE;

insert  into `noticeboards`(`id`,`notice_title`,`notice_description`,`start_date`,`end_date`,`start_time`,`end_time`,`status`,`created_date`,`modified_date`) values (1,'Hot News Updatre','We have to leave','2015-01-01','2015-01-02','00:00:00','00:00:00',1,'2015-05-11 20:02:42',NULL),(2,'Leave Early','This is leave early','2015-01-03','2015-01-03','00:00:00','00:00:00',1,'2015-05-11 20:02:42',NULL),(3,'Khmer New Year','','2015-04-13','2015-04-15','00:00:00','00:00:00',1,'2015-05-11 20:02:42',NULL),(4,'Khmer New Year','Dayoff','2015-04-13','2015-04-15','00:00:00','00:00:00',1,'2015-05-11 20:02:42',NULL),(5,'First Demo','We have to give a demonstration middle of this may','2015-05-15','2015-01-16','00:00:00','00:00:00',1,'2015-05-11 20:02:42',NULL);

UNLOCK TABLES;

/*Table structure for table `parents` */

DROP TABLE IF EXISTS `parents`;

CREATE TABLE `parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `relationship` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fullname_in_khmer` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `phone1` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `phone2` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `parent_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `profession` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `birthplace` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `parents` */

LOCK TABLES `parents` WRITE;

UNLOCK TABLES;

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `position_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `positions` */

LOCK TABLES `positions` WRITE;

insert  into `positions`(`id`,`position`,`position_description`,`status`,`created_date`,`modified_date`) values (1,'Administrator','',1,'2015-05-11 20:03:52','2015-05-11 20:48:20'),(2,'Account','',1,'2015-05-11 20:03:52',NULL),(3,'Teacher','',1,'2015-05-11 20:03:52',NULL);

UNLOCK TABLES;

/*Table structure for table `promotions` */

DROP TABLE IF EXISTS `promotions`;

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_type` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `promotion_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `discount_percentage` double DEFAULT '0',
  `discount_amount` double DEFAULT '0',
  `effective_from` date DEFAULT NULL,
  `effective_end` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `promotion_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `promotions` */

LOCK TABLES `promotions` WRITE;

UNLOCK TABLES;

/*Table structure for table `school` */

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `school_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `school_phone1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `school_phone2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `school_fax` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `school_email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `school_website` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `school_logo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `school_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `school` */

LOCK TABLES `school` WRITE;

insert  into `school`(`id`,`school_name`,`school_address`,`school_phone1`,`school_phone2`,`school_fax`,`school_email`,`school_website`,`school_logo`,`school_description`,`created_date`,`modified_date`) values (1,'Logos International School','Siem Reap','089 555 006','077777882','023456789','monorith@gmail.com','monorith.com','/sms/attachments/upload1427949257.jpg','','2015-05-11 20:04:29','2015-05-11 20:34:48');

UNLOCK TABLES;

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `service_price` double DEFAULT NULL,
  `service_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `services` */

LOCK TABLES `services` WRITE;

UNLOCK TABLES;

/*Table structure for table `staffs` */

DROP TABLE IF EXISTS `staffs`;

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fullname_in_khmer` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `phone1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `phone2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `staff_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `staffs` */

LOCK TABLES `staffs` WRITE;

UNLOCK TABLES;

/*Table structure for table `student_absences` */

DROP TABLE IF EXISTS `student_absences`;

CREATE TABLE `student_absences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `academic_program_subject_id` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `absent_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_absences` */

LOCK TABLES `student_absences` WRITE;

UNLOCK TABLES;

/*Table structure for table `student_academic_program` */

DROP TABLE IF EXISTS `student_academic_program`;

CREATE TABLE `student_academic_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `academic_program_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_end` date DEFAULT NULL,
  `student_academic_program_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `admission_date` date DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `last_amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_academic_program` */

LOCK TABLES `student_academic_program` WRITE;

UNLOCK TABLES;

/*Table structure for table `student_book_purchase` */

DROP TABLE IF EXISTS `student_book_purchase`;

CREATE TABLE `student_book_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `student_book_purchase_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `purchased_date` date DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `last_amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_book_purchase` */

LOCK TABLES `student_book_purchase` WRITE;

UNLOCK TABLES;

/*Table structure for table `student_library` */

DROP TABLE IF EXISTS `student_library`;

CREATE TABLE `student_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_end` date DEFAULT NULL,
  `student_library_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `last_amount` double DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_library` */

LOCK TABLES `student_library` WRITE;

UNLOCK TABLES;

/*Table structure for table `student_service` */

DROP TABLE IF EXISTS `student_service`;

CREATE TABLE `student_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_service` */

LOCK TABLES `student_service` WRITE;

UNLOCK TABLES;

/*Table structure for table `student_types` */

DROP TABLE IF EXISTS `student_types`;

CREATE TABLE `student_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `student_type_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_types` */

LOCK TABLES `student_types` WRITE;

insert  into `student_types`(`id`,`student_type`,`student_type_description`,`status`,`created_date`,`modified_date`) values (1,'General','This is for general student',1,'2015-05-19 12:40:15','2015-05-19 12:46:34'),(2,'Scholarship','This is for scholarship program',1,'2015-05-19 12:46:16',NULL);

UNLOCK TABLES;

/*Table structure for table `student_vehicle` */

DROP TABLE IF EXISTS `student_vehicle`;

CREATE TABLE `student_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_end` date DEFAULT NULL,
  `student_vehicle_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `last_amount` double DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `student_vehicle` */

LOCK TABLES `student_vehicle` WRITE;

UNLOCK TABLES;

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fullname_in_khmer` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `phone1` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `phone2` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `student_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `birthplace` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `student_type_id` int(11) DEFAULT NULL,
  `student_id_number` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `students` */

LOCK TABLES `students` WRITE;

UNLOCK TABLES;

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `subject_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `subjects` */

LOCK TABLES `subjects` WRITE;

UNLOCK TABLES;

/*Table structure for table `transports` */

DROP TABLE IF EXISTS `transports`;

CREATE TABLE `transports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `route_fare` double DEFAULT NULL,
  `number_of_vehicle` int(11) DEFAULT NULL,
  `transport_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `transports` */

LOCK TABLES `transports` WRITE;

UNLOCK TABLES;

/*Table structure for table `vehicles` */

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transport_id` int(11) DEFAULT NULL,
  `vehicle_brand` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `vehicle_identity_number` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `vehicle_capacity` int(11) DEFAULT NULL,
  `driver_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `driver_contact` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `vehicle_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `vehicles` */

LOCK TABLES `vehicles` WRITE;

UNLOCK TABLES;

/* Procedure structure for procedure `add_library_membership` */

/*!50003 DROP PROCEDURE IF EXISTS  `add_library_membership` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `add_library_membership`(p_student_id int, p_amount double, p_effective_from date, p_effective_end date, p_student_library_description varchar(255), p_dis_per DOUBLE, p_dis_amount DOUBLE, p_payment_date DATE)
BEGIN
	-- Declare variable book_id
	DECLARE v_last_amount DOUBLE;
	DECLARE v_dis_per DOUBLE;
	DECLARE v_dis_amount DOUBLE;
	SET v_last_amount = p_amount;
	SET v_dis_per = p_dis_per;
	SET v_dis_amount = p_dis_amount;
	
	IF p_dis_per > 0 THEN
		SET v_last_amount = (p_amount * (100 - p_dis_per)) / 100;
		set v_dis_amount = (p_amount * p_dis_per) / 100;
	END IF;
	
	IF p_dis_amount > 0 THEN
		SET v_last_amount = p_amount - p_dis_amount;
		set v_dis_per = (p_dis_amount * 100) / p_amount;
	END IF;
	
	if p_amount = 0 then
		SET v_last_amount = 0;
		SET v_dis_per = 0;
		SET v_dis_amount = 0;
	end if;
	
	-- have to set its history to 0
	update student_library set status=0
	where student_id = p_student_id;
	-- have to insert new record
	insert into student_library(student_id, amount, effective_from, effective_end, student_library_description, discount_percentage, discount_amount, last_amount, payment_date)
	values (p_student_id, p_amount, p_effective_from, p_effective_end, p_student_library_description, v_dis_per, v_dis_amount, v_last_amount, p_payment_date);
END */$$
DELIMITER ;

/* Procedure structure for procedure `add_vehicle_membership` */

/*!50003 DROP PROCEDURE IF EXISTS  `add_vehicle_membership` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `add_vehicle_membership`(p_student_id INT, p_vehicle_id INT, p_amount DOUBLE, p_effective_from DATE, p_effective_end DATE, p_student_vehicle_description VARCHAR(255), p_dis_per DOUBLE, p_dis_amount DOUBLE, p_payment_date DATE)
BEGIN
	-- Declare variable book_id
	DECLARE v_last_amount DOUBLE;
	DECLARE v_dis_per DOUBLE;
	DECLARE v_dis_amount DOUBLE;
	SET v_last_amount = p_amount;
	SET v_dis_per = p_dis_per;
	SET v_dis_amount = p_dis_amount;
	
	IF p_dis_per > 0 THEN
		SET v_last_amount = (p_amount * (100 - p_dis_per)) / 100;
		SET v_dis_amount = (p_amount * p_dis_per) / 100;
	END IF;
	
	IF p_dis_amount > 0 THEN
		SET v_last_amount = p_amount - p_dis_amount;
		SET v_dis_per = (p_dis_amount * 100) / p_amount;
	END IF;
	
	IF p_amount = 0 THEN
		SET v_last_amount = 0;
		SET v_dis_per = 0;
		SET v_dis_amount = 0;
	END IF;
	
	-- have to set its history to 0
	UPDATE student_vehicle SET STATUS=0
	WHERE student_id = p_student_id;
	-- have to insert new record
	INSERT INTO student_vehicle(student_id, vehicle_id, amount, effective_from, effective_end, student_vehicle_description, discount_percentage, discount_amount, last_amount, payment_date)
	VALUES (p_student_id, p_vehicle_id, p_amount, p_effective_from, p_effective_end, p_student_vehicle_description, v_dis_per, v_dis_amount, v_last_amount, p_payment_date);
END */$$
DELIMITER ;

/* Procedure structure for procedure `admission` */

/*!50003 DROP PROCEDURE IF EXISTS  `admission` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `admission`(p_student_id INT, p_academic_program_id INT, p_amount DOUBLE, p_effective_from DATE, p_effective_end DATE, p_student_academic_program_description VARCHAR(255), p_dis_per double, p_dis_amount double, p_admission_date DATE)
BEGIN
	-- Declare variable book_id
	DECLARE v_last_amount DOUBLE;
	DECLARE v_dis_per DOUBLE;
	DECLARE v_dis_amount DOUBLE;
	SET v_last_amount = p_amount;
	SET v_dis_per = p_dis_per;
	SET v_dis_amount = p_dis_amount;
	
	if p_dis_per > 0 THEN
		SET v_last_amount = (p_amount * (100 - p_dis_per)) / 100;
		SET v_dis_amount = (p_amount * p_dis_per) / 100;
	end if;
	
	if p_dis_amount > 0 then
		SET v_last_amount = p_amount - p_dis_amount;
		SET v_dis_per = (p_dis_amount * 100) / p_amount;
	end if;
	
	IF p_amount = 0 THEN
		SET v_last_amount = 0;
		SET v_dis_per = 0;
		SET v_dis_amount = 0;
	END IF;
	
	-- have to set its history to 0
	UPDATE student_academic_program SET STATUS=0
	WHERE student_id = p_student_id;
	-- have to insert new record
	INSERT INTO student_academic_program(student_id, academic_program_id, amount, effective_from, effective_end, student_academic_program_description, discount_percentage, discount_amount, last_amount, admission_date)
	VALUES (p_student_id, p_academic_program_id, p_amount, p_effective_from, p_effective_end, p_student_academic_program_description, v_dis_per, v_dis_amount, v_last_amount, p_admission_date);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `borrow_book` */

/*!50003 DROP PROCEDURE IF EXISTS  `borrow_book` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `borrow_book`(p_book_id int, p_student_id int, p_start_date date, p_return_date date)
BEGIN
	-- have to insert to table book_borrowings
	insert into book_borrowings(book_id, student_id, start_date, return_date)
	values (p_book_id, p_student_id, p_start_date, p_return_date);
	
	-- have to minus quantity
	UPDATE books SET copy=copy - 1 
	WHERE id = p_book_id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `purchase_book` */

/*!50003 DROP PROCEDURE IF EXISTS  `purchase_book` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `purchase_book`(p_book_id INT, p_student_id INT, p_amount double, p_purchased_date DATE, p_description varchar(255), p_dis_per DOUBLE, p_dis_amount DOUBLE)
BEGIN
	-- Declare variable book_id
	DECLARE v_last_amount DOUBLE;
	DECLARE v_dis_per DOUBLE;
	DECLARE v_dis_amount DOUBLE;
	SET v_last_amount = p_amount;
	SET v_dis_per = p_dis_per;
	SET v_dis_amount = p_dis_amount;
	
	IF p_dis_per > 0 THEN
		SET v_last_amount = (p_amount * (100 - p_dis_per)) / 100;
		SET v_dis_amount = (p_amount * p_dis_per) / 100;
	END IF;
	
	IF p_dis_amount > 0 THEN
		SET v_last_amount = p_amount - p_dis_amount;
		SET v_dis_per = (p_dis_amount * 100) / p_amount;
	END IF;
	
	IF p_amount = 0 THEN
		SET v_last_amount = 0;
		SET v_dis_per = 0;
		SET v_dis_amount = 0;
	END IF;
	
	-- insert into table purchase
	INSERT INTO student_book_purchase(student_id, book_id, amount, student_book_purchase_description, purchased_date, discount_percentage, discount_amount, last_amount)
	VALUES (p_student_id, p_book_id, p_amount, p_description, p_purchased_date, v_dis_per, v_dis_amount, v_last_amount);
	
	-- have to minus quantity
	UPDATE books SET copy=copy - 1 
	WHERE id = p_book_id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `return_book` */

/*!50003 DROP PROCEDURE IF EXISTS  `return_book` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `return_book`(p_id INT)
BEGIN
	-- Declare variable book_id
	declare v_book_id int;
	-- have to find book borrowing detail
	select book_id into v_book_id 
	from book_borrowings
	where id = p_id;
	-- have to set its status 0
	update book_borrowings set status = 0, modified_date=now()
	where id = p_id;
	-- have to adjust books one
	update books set copy = copy + 1
	where id = v_book_id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `service` */

/*!50003 DROP PROCEDURE IF EXISTS  `service` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `service`(p_student_id INT, p_service_id INT,  p_amount DOUBLE, p_payment_date date)
BEGIN
	-- insert into student service
	insert into student_service(student_id, service_id, amount, payment_date)
	values (p_student_id, p_service_id, p_amount, p_payment_date);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
