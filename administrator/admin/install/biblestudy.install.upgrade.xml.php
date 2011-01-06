<?php
$xmlstr = <<<XML
<?xml version="1.0" ?>
<comupgrade version="1.0">
	<install version="7.0.0" versiondate="2011-1-12" build="1190" versionname="1Kings">
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_admin` (
					  `id` int(11) NOT NULL,
					  `podcast` text,
					  `series` text,
					  `study` text,
					  `teacher` text,
					  `media` text,
					  `download` text,
					  `main` text,
					  `showhide` char(255) DEFAULT NULL,
					  `params` text,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8</query>
        <query>CREATE TABLE IF NOT EXISTS `#__bsms_books` (
					  `id` int(3) NOT NULL AUTO_INCREMENT,
					  `bookname` varchar(250) DEFAULT NULL,
					  `booknumber` int(5) DEFAULT NULL,
					  `published` tinyint(1) NOT NULL DEFAULT '1',
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 </query>
        <query>CREATE TABLE IF NOT EXISTS `#__bsms_comments` (
					  `id` int(3) NOT NULL AUTO_INCREMENT,
					  `published` tinyint(1) NOT NULL DEFAULT '0',
					  `study_id` int(11) NOT NULL DEFAULT '0',
					  `user_id` int(11) NOT NULL DEFAULT '0',
					  `full_name` varchar(50) NOT NULL DEFAULT '',
					  `user_email` varchar(100) NOT NULL DEFAULT '',
					  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
					  `comment_text` text NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
       <query>CREATE TABLE IF NOT EXISTS `#__bsms_folders` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `foldername` varchar(250) NOT NULL DEFAULT '',
				  `folderpath` varchar(250) NOT NULL DEFAULT '',
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 </query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_locations` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `location_text` varchar(250) DEFAULT NULL,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_media` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `media_text` text,
				  `media_image_name` varchar(250) NOT NULL DEFAULT '',
				  `media_image_path` varchar(250) NOT NULL DEFAULT '',
				  `path2` varchar(150) NOT NULL,
				  `media_alttext` varchar(250) NOT NULL DEFAULT '',
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_mediafiles` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `study_id` int(5) DEFAULT NULL,
				  `media_image` int(3) DEFAULT NULL,
				  `server` varchar(250) DEFAULT NULL,
				  `path` varchar(250) DEFAULT NULL,
				  `special` varchar(250) DEFAULT '_self',
				  `filename` text,
				  `size` varchar(50) DEFAULT NULL,
				  `mime_type` int(3) DEFAULT NULL,
				  `podcast_id` varchar(50) DEFAULT NULL,
				  `internal_viewer` tinyint(1) DEFAULT '0',
				  `mediacode` text,
				  `ordering` int(11) NOT NULL DEFAULT '0',
				  `createdate` datetime DEFAULT NULL,
				  `link_type` char(1) DEFAULT NULL,
				  `hits` int(10) DEFAULT NULL,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  `docMan_id` int(11) DEFAULT NULL,
				  `article_id` int(11) DEFAULT NULL,
				  `comment` text,
				  `virtueMart_id` int(11) DEFAULT NULL,
				  `downloads` int(10) DEFAULT 0,
				  `plays` int(10) DEFAULT 0,
				  `params` text,
                  `player` int(2) NULL,
                  `popup` int(2) NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_message_type` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `message_type` text NOT NULL,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_mimetype` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `mimetype` varchar(50) DEFAULT NULL,
				  `mimetext` varchar(50) DEFAULT NULL,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_order` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `value` varchar(15) DEFAULT '',
				  `text` varchar(20) DEFAULT '',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_podcast` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `title` varchar(100) DEFAULT NULL,
				  `website` varchar(100) DEFAULT NULL,
				  `description` text,
				  `image` varchar(130) DEFAULT NULL,
				  `imageh` int(3) DEFAULT NULL,
				  `imagew` int(3) DEFAULT NULL,
				  `author` varchar(100) DEFAULT NULL,
				  `podcastimage` varchar(130) DEFAULT NULL,
				  `podcastsearch` varchar(255) DEFAULT NULL,
				  `filename` varchar(150) DEFAULT NULL,
				  `language` varchar(10) DEFAULT 'en-us',
				  `editor_name` varchar(150) DEFAULT NULL,
				  `editor_email` varchar(150) DEFAULT NULL,
				  `podcastlimit` int(5) DEFAULT NULL,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  `episodetitle` int(11) DEFAULT NULL,
				  `custom` varchar(200) DEFAULT NULL,
				  `detailstemplateid` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_search` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `value` varchar(15) DEFAULT '',
				  `text` varchar(15) DEFAULT '',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_series` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `series_text` text,
				  `teacher` int(3) DEFAULT NULL,
				  `description` text,
				  `series_thumbnail` varchar(150) DEFAULT NULL,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_servers` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `server_name` varchar(250) NOT NULL DEFAULT '',
				  `server_path` varchar(250) NOT NULL DEFAULT '',
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  `server_type` char(5) NOT NULL DEFAULT 'local',
				  `ftp_username` char(255) NOT NULL,
				  `ftp_password` char(255) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_share` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(250) DEFAULT NULL,
				  `params` text,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_studies` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `studydate` datetime DEFAULT NULL,
				  `teacher_id` int(11) DEFAULT '1',
				  `studynumber` varchar(100) DEFAULT '',
				  `booknumber` int(3) DEFAULT '101',
				  `chapter_begin` int(3) DEFAULT '1',
				  `verse_begin` int(3) DEFAULT '1',
				  `chapter_end` int(3) DEFAULT '1',
				  `verse_end` int(3) DEFAULT '1',
				  `secondary_reference` text,
				  `booknumber2` varchar(4) DEFAULT NULL,
				  `chapter_begin2` varchar(4) DEFAULT NULL,
				  `verse_begin2` varchar(4) DEFAULT NULL,
				  `chapter_end2` varchar(4) DEFAULT NULL,
				  `verse_end2` varchar(4) DEFAULT NULL,
				  `prod_dvd` varchar(100) DEFAULT NULL,
				  `prod_cd` varchar(100) DEFAULT NULL,
				  `server_cd` varchar(10) DEFAULT NULL,
				  `server_dvd` varchar(10) DEFAULT NULL,
				  `image_cd` varchar(10) DEFAULT NULL,
				  `image_dvd` varchar(10) DEFAULT '0',
				  `studytext2` text,
				  `comments` tinyint(1) DEFAULT '1',
				  `hits` int(10) NOT NULL DEFAULT '0',
				  `user_id` int(10) DEFAULT NULL,
				  `user_name` varchar(50) DEFAULT NULL,
				  `show_level` varchar(100) NOT NULL DEFAULT '0',
				  `location_id` int(3) DEFAULT NULL,
				  `studytitle` text,
				  `studyintro` text,
				  `media_hours` varchar(2) DEFAULT NULL,
				  `media_minutes` varchar(2) DEFAULT NULL,
				  `media_seconds` varchar(2) DEFAULT NULL,
				  `messagetype` varchar(100) DEFAULT '1',
				  `series_id` int(3) DEFAULT '0',
				  `topics_id` int(3) DEFAULT '0',
				  `studytext` text,
				  `thumbnailm` text,
				  `thumbhm` int(11) DEFAULT NULL,
				  `thumbwm` int(11) DEFAULT NULL,
				  `params` text,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_studytopics` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `study_id` int(3) NOT NULL DEFAULT '0',
				  `topic_id` int(3) NOT NULL DEFAULT '0',
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id` (`id`),
				  KEY `id_2` (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_teachers` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `teacher_image` text,
				  `teacher_thumbnail` text,
				  `teachername` varchar(250) NOT NULL DEFAULT '',
				  `title` varchar(250) DEFAULT NULL,
				  `phone` varchar(50) DEFAULT NULL,
				  `email` varchar(100) DEFAULT NULL,
				  `website` text,
				  `information` text,
				  `image` text,
				  `imageh` text,
				  `imagew` text,
				  `thumb` text,
				  `thumbw` text,
				  `thumbh` text,
				  `short` text,
				  `ordering` int(3) DEFAULT NULL,
				  `catid` int(3) DEFAULT '1',
				  `list_show` tinyint(1) NOT NULL DEFAULT '1',
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_templates` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `type` varchar(255) NOT NULL,
				  `tmpl` longtext NOT NULL,
				  `published` int(1) NOT NULL DEFAULT '1',
				  `params` longtext,
				  `title` text,
				  `text` text,
				  `pdf` text,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20</query>
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_topics` (
				`id` INT NOT NULL AUTO_INCREMENT,
				`topic_text` TEXT NULL,
				`published` TINYINT(1) NOT NULL DEFAULT '1',
				PRIMARY KEY (`id`) ) TYPE=MyISAM CHARACTER SET `utf8`;</query>
        <query>CREATE TABLE IF NOT EXISTS `#__bsms_timeset` (
                `timeset` VARCHAR(14) ,
                `backup` VARCHAR(14) ,
                KEY `timeset` (`timeset`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;</query>
        <query>INSERT INTO `#__bsms_timeset` SET `timeset`='1281646339'</query>
        <query>INSERT INTO `#__bsms_timeset` SET `backup`='1281646339'</query>
		<query>INSERT INTO `#__bsms_studies` SET `studydate`='2010-03-13 00:10:00', `teacher_id`=1, `studynumber`='2010-001', `booknumber`='101', `chapter_begin`='01', `verse_begin`='01', `chapter_end`='01', `verse_end`='31', `studytitle`='Sample Study Title', `studyintro`='Sample text you can use as an introduction to your study', `studytext`='This is where you would put study notes or other information. This could be the full text of your study as well. If you install the scripture links plugin you will have all verses as links to BibleGateway.com'</query>
		<query>INSERT INTO `#__bsms_servers` SET `id`='1', `server_name`='Your Server Name', `server_path`='www.mywebsite.com', `published`='1'</query>
		<query>INSERT INTO `#__bsms_series` SET `id`=NULL, `series_text`='Worship Series', `published`='1'</query>
		<query>INSERT INTO `#__bsms_message_type` VALUES (NULL, 'Sunday', 1)</query>
		<query>INSERT INTO `#__bsms_folders` VALUES (NULL, 'My Folder Name', '/media/', 1)</query>
		<query>INSERT INTO `#__bsms_podcast` SET `id`=NULL, `title`='My Podcast', `website`='www.mywebsite.com', `description`='Podcast Description goes here', `image`='www.mywebsite.com/myimage.jpg', `imageh`='30', `imagew`='30', `author`='Pastor Billy', `podcastimage`='www.mywebsite.com/myimage.jpg', `podcastsearch`='jesus', `filename`='mypodcast.xml', `language`='en-us', `editor_name`='Jim Editor', `editor_email`='jim@mywebsite.com', `podcastlimit`=50, `published`='1' </query>
		<query>INSERT INTO `#__bsms_topics` VALUES (1,'Abortion',1) , (3,'Addiction',1) , (4,'Afterlife',1) , (5,'Apologetics',1) ,(7,'Baptism',1) ,(8,'Basics of Christianity',1) ,(9,'Becoming a Christian',1) ,(10,'Bible',1) ,(37,'Blended Family Relationships',1) ,(12,'Children',1) ,(13,'Christ',1) ,(14,'Christian Character/Fruits',1) ,(15,'Christian Values',1) ,(16,'Christmas Season',1) ,(17,'Church',1) ,(18,'Communication',1) ,(19,'Communion / Lords Supper',1) ,(21,'Creation',1) ,(23,'Cults',1) ,(113,'Da Vinci Code',1) ,(24,'Death',1) ,(26,'Descriptions of God',1) ,(27,'Disciples',1) ,(28,'Discipleship',1) ,(30,'Divorce',1) ,(32,'Easter Season',1) ,(33,'Emotions',1) ,(34,'Entertainment',1) ,(35,'Evangelism',1) ,(36,'Faith',1) ,(103,'Family',1) ,(39,'Forgiving Others',1) ,(104,'Freedom',1) ,(41,'Friendship',1) ,	(42,'Fulfillment in Life',1) ,(43,'Fund-raising rally',1) ,(44,'Funerals',1) ,(45,'Giving',1) ,(2,'Gods Activity',1) ,(6,'Gods Attributes',1) ,(40,'Gods Forgiveness',1) ,(58,'Gods Love',1) ,(65,'Gods Nature',1) ,(46,'Gods Will',1) ,(47,'Hardship of Life',1) ,(107,'Holidays',1) ,(48,'Holy Spirit',1) ,(111,'Hot Topics',1) ,(11,'Jesus Birth',1) ,(22,'Jesus Cross/Final Week',1) ,(29,'Jesus Divinity',1) ,(50,'Jesus Humanity',1) ,(56,'Jesus Life',1) ,(61,'Jesus Miracles',1) ,(84,'Jesus Resurrection',1) ,(93,'Jesus Teaching',1) ,	(52,'Kingdom of God',1) ,(55,'Leadership Essentials',1) ,(57,'Love',1) ,(59,'Marriage',1) ,(109,'Men',1) ,(82,'Messianic Prophecies',1) ,	(62,'Misconceptions of Christianity',1) ,(63,'Money',1) ,(112,'Narnia',1) ,(66,'Our Need for God',1) ,(69,'Parables',1) ,(70,'Paranormal',1) ,(71,'Parenting',1) ,(73,'Poverty',1) ,	(74,'Prayer',1) ,(76,'Prominent N.T. Men',1) ,(77,'Prominent N.T. Women',1) ,(78,'Prominent O.T. Men',1) ,(79,'Prominent O.T. Women',1) ,(83,'Racism',1) ,(85,'Second Coming',1) ,(86,'Sexuality',1) ,(87,'Sin',1) ,(88,'Singleness',1) ,(89,'Small Groups',1) ,(108,'Special Services',1) ,(90,'Spiritual Disciplines',1) ,(91,'Spiritual Gifts',1) ,(105,'Stewardship',1) ,(92,'Supernatural',1) ,(94,'Temptation',1) ,(95,'Ten Commandments',1) ,	(97,'Truth',1) ,(98,'Twelve Apostles',1) ,(100,'Weddings',1) ,(110,'Women',1) ,(101,'Workplace Issues',1) ,(102,'World Religions',1) ,(106,'Worship',1) </query>
		<query>INSERT INTO `#__bsms_locations` SET `location_text`='My Location', `published`=1</query>
		<query>INSERT  INTO `#__bsms_media` VALUES (2, 'mp3 compressed audio file', 'mp3', '','speaker24.png', 'mp3 audio file', 1),(3, 'Video', 'Video File', '','video24.png', 'Video File', 1),(4, 'm4v', 'Video Podcast', '','podcast-video24.png', 'Video Podcast', 1),(6, 'Streaming Audio', 'Streaming Audio', '','streamingaudio24.png', 'Streaming Audio', 1),(7, 'Streaming Video', 'Streaming Video', '','streamingvideo24.png', 'Streaming Video', 1),(8, 'Real Audio', 'Real Audio', '','realplayer24.png', 'Real Audio', 1),(9, 'Windows Media Audio', 'Windows Media Audio', '','windows-media24.png', 'Windows Media File', 1),(10, 'Podcast Audio', 'Podcast Audio', '','podcast-audio24.png', 'Podcast Audio', 1),(11, 'CD', 'CD', '','cd.png', 'CD', 1),(12, 'DVD', 'DVD', '','dvd.png', 'DVD', 1), (13,'Download','Download', '', 'download.png', 'Download', '1'),(14,'Article','Article', '', 'textfile24.png', 'Article', '1')</query>
		<query>INSERT INTO `#__bsms_books`  VALUES (1, 'JBS_BBK_GENESIS', 101, 1),(2, 'JBS_BBK_EXODUS', 102, 1),(3, 'JBS_BBK_LEVITICUS', 103, 1),(4, 'JBS_BBK_NUMBERS', 104, 1),(5, 'JBS_BBK_DEUTERONOMY', 105, 1) ,(6, 'JBS_BBK_JOSHUA', 106, 1) ,(7, 'JBS_BBK_JUDGES', 107, 1) ,(8, 'JBS_BBK_RUTH', 108, 1) ,(9, 'JBS_BBK_1SAMUEL', 109, 1) ,(10, 'JBS_BBK_2SAMUEL', 110, 1) ,(11, 'JBS_BBK_1KINGS', 111, 1) ,(12, 'JBS_BBK_2KINGS', 112, 1) ,(13, 'JBS_BBK_1CHRONICLES', 113, 1) ,(14, 'JBS_BBK_2CHRONICLES', 114, 1) ,(15, 'JBS_BBK_EZRA', 115, 1) ,(16, 'JBS_BBK_NEHEMIAH', 116, 1) ,(17, 'JBS_BBK_ESTHER', 117, 1) ,(18, 'JBS_BBK_JOB', 118, 1) ,(19, 'JBS_BBK_PSALM', 119, 1) ,(20, 'JBS_BBK_PROVERBS', 120, 1) ,(21, 'JBS_BBK_ECCLESIASTES', 121, 1) ,(22, 'JBS_BBK_SONG_OF_SOLOMON', 122, 1) ,(23, 'JBS_BBK_ISAIAH', 123, 1) ,(24, 'JBS_BBK_JEREMIAH', 124, 1) ,(25, 'JBS_BBK_LAMENTATIONS', 125, 1) ,(26, 'JBS_BBK_EZEKIEL', 126, 1) ,(27, 'JBS_BBK_DANIEL', 127, 1) ,(28, 'JBS_BBK_HOSEA', 128, 1) ,(29, 'JBS_BBK_JOEL', 129, 1) ,(30, 'JBS_BBK_AMOS', 130, 1) ,(31, 'JBS_BBK_OBADIAH', 131, 1) ,(32, 'JBS_BBK_JONAH', 132, 1) ,(33, 'JBS_BBK_MICAH', 133, 1) ,(34, 'JBS_BBK_NAHUM', 134, 1) ,(35, 'JBS_BBK_HABAKKUK', 135, 1) ,(36, 'JBS_BBK_ZEPHANIAH', 136, 1),(37, 'JBS_BBK_HAGGAI', 137, 1),(38, 'JBS_BBK_ZECHARIAH', 138, 1),(39, 'JBS_BBK_MALACHI', 139, 1),(40, 'JBS_BBK_MATTHEW', 140, 1),(41, 'JBS_BBK_MARK', 141, 1),(42, 'JBS_BBK_LUKE', 142, 1),(43, 'JBS_BBK_JOHN', 143, 1),(44, 'JBS_BBK_ACTS', 144, 1),(45, 'JBS_BBK_ROMANS', 145, 1),(46, 'JBS_BBK_1CORINTHIANS', 146, 1),(47, 'JBS_BBK_2CORINTHIANS', 147, 1),(48, 'JBS_BBK_GALATIANS', 148, 1),(49, 'JBS_BBK_EPHESIANS', 149, 1),(50, 'JBS_BBK_PHILIPPIANS', 150, 1),(51, 'JBS_BBK_COLOSSIANS', 151, 1),(52, 'JBS_BBK_1THESSALONIANS', 152, 1),(53, 'JBS_BBK_2THESSALONIANS', 153, 1),(54, 'JBS_BBK_1TIMOTHY', 154, 1),(55, 'JBS_BBK_2TIMOTHY', 155, 1),(56, 'JBS_BBK_TITUS', 156, 1),(57, 'JBS_BBK_PHILEMON', 157, 1),(58, 'JBS_BBK_HEBREWS', 158, 1),(59, 'JBS_BBK_JAMES', 159, 1),(60, 'JBS_BBK_1PETER', 160, 1),(61, 'JBS_BBK_2PETER', 161, 1),(62, 'JBS_BBK_1JOHN', 162, 1),(63, 'JBS_BBK_2JOHN', 163, 1),(64, 'JBS_BBK_3JOHN', 164, 1),(65, 'JBS_BBK_JUDE', 165, 1),(66, 'JBS_BBK_REVELATION', 166, 1),(67, 'JBS_BBK_TOBIT', 167, 1),(68, 'JBS_BBK_JUDITH', 168, 1),(69, 'JBS_BBK_1MACCABEES', 169, 1),(70, 'JBS_BBK_2MACCABEES', 170, 1),(71, 'JBS_BBK_WISDOM', 171, 1),(72, 'JBS_BBK_ECCLESIASTICUS', 172, 1),(73, 'JBS_BBK_BARUCH', 173, 1)</query>
		<query>INSERT INTO `#__bsms_order` VALUES (1, 'ASC', 'JBS_CMN_ASCENDING'),(2, 'DESC', 'JBS_CMN_DESCENDING')</query>
		<query>INSERT INTO `#__bsms_mimetype` VALUES (1,'audio/mpeg3','MP3 Audio',1), (2,'audio/x-pn-realaudio','Real Audio',1),(3,'video/x-m4v','Podcast Video m4v',1),(4,'application/vnd.rn-realmedia','Real Media rm',1),(5,'audio/x-ms-wma','Windows Media Audio WMA',1),(6,'text/html','Text',1),(7,'audio/x-wav','Windows wav File',1),(8,'audio/x-pn-realaudio-plugin',' Real audio Plugin.rpm',1),(9,'audio/x-pn-realaudio','Real Media File .rm',1),(10,'audio/x-realaudio','Rea Audio File .ra',1),(11,'audio/x-pn-realaudio','Read Audio File.ram',1),(12,'video/mpeg',' Mpeg video .mpg',1),(13,'audio/mpeg','Video .mp2 File',1),(14,'video/x-msvideo',' Video .avi File',1),(15,'video/x-flv',' Flash Video FLV',1)</query>
<query>INSERT INTO `#__bsms_mediafiles` VALUES (NULL, 1, 2, 1, 1, '','myfile.mp3', 12332, 1, 1, 0, '', 0, '2009-09-13 00:10:00', 1,'',1,0,0,'',0,0,0,'',1,1)</query>
<query>INSERT INTO `#__bsms_admin` VALUES (1, '', '', '', '', 'speaker24.png', 'download.png', 'openbible.png', '0', 'compat_mode=0 drop_tables=0 admin_store=1 studylistlimit=10 popular_limit=1 series_imagefolder= media_imagefolder= teachers_imagefolder= study_images= podcast_imagefolder= location_id= teacher_id= series_id= booknumber= topic_id= messagetype= avr=0 download= target= server= path= podcast=0 mime=0 allow_entry_study=0 entry_access=23 study_publish=0 socialnetworking=1')</query>
<query>INSERT INTO `#__bsms_teachers` VALUES (NULL,'','', 'Billy Sunday','Pastor','555-555-5555','billy@sunday.com','http://billysunday.com','William Ashley Sunday was an American athlete who after being a popular outfielder in baseballs National League during the 1880s became the most celebrated and influential American evangelist during the first two decades of the 20th century. ','components/com_biblestudy/images/billy_sunday11.jpg','276','197','components/com_biblestudy/images/images.jpg','101','141','Billy Sunday: 1862-1935',0,1,1,1)</query>
<query>INSERT INTO `#__bsms_share` (`id`, `name`, `params`, `published`) VALUES 
	(NULL, 'FaceBook', 'mainlink=http://www.facebook.com/sharer.php? item1prefix=u= item1=200 item1custom= item2prefix=t= item2=5 item2custom= item3prefix= item3=6 item3custom= item4prefix= item4=8 item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/facebook.png shareimageh=33px shareimagew=33px totalcharacters= alttext=FaceBook  ', 1), 
	(NULL, 'Twitter', 'mainlink=http://twitter.com/home? item1prefix=status= item1=200 item1custom= item2prefix= item2=5 item2custom= item3prefix= item3=1 item3custom= item4prefix= item4= item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/twitter.png shareimagew=33px shareimageh=33px totalcharacters=140 alttext=Twitter', 1), 
	(NULL, 'Delicious', 'mainlink=http://delicious.com/save? item1prefix=url= item1=200 item1custom= item2prefix=&amp;title= item2=5 item2custom= item3prefix= item3=6 item3custom= item4prefix= item4= item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/delicious.png shareimagew=33px shareimageh=33px totalcharacters= alttext=Delicious', 1),
	(NULL, 'MySpace', 'mainlink=http://www.myspace.com/index.cfm? item1prefix=fuseaction=postto&amp;t= item1=5 item1custom= item2prefix=&amp;c= item2=6 item2custom= item3prefix=&amp;u= item3=200 item3custom= item4prefix=&amp;l=1 item4= item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/myspace.png\nshareimagew=33px\nshareimageh=33px\ntotalcharacters=\nalttext=MySpace', 1)</query>
<query>INSERT INTO `#__bsms_templates` VALUES (1, 'tmplList', '', 1, 'itemslimit=10\n compatibilityMode=0\n studieslisttemplateid=1\n detailstemplateid=1\n teachertemplateid=1\n serieslisttemplateid=1\n seriesdetailtemplateid=1\n teacher_id=\n show_teacher_list=0\n series_id=0\n booknumber=0\n topic_id=0\n messagetype=0\n locations=0\n default_order=DESC\n show_page_image=1\n tooltip=1\n show_verses=0\n stylesheet=\n date_format=2\n duration_type=1\n useavr=0\n popuptype=window\n media_player=0\n player_width=290\n show_filesize=1\n store_page=flypage.tpl\n show_page_title=1\n page_title=Bible\n Studies\n use_headers_list=1\n list_intro=\n intro_show=1\n listteachers=1\n teacherlink=1\n details_text=Study\n Details\n show_book_search=1\n show_teacher_search=1\n show_series_search=1\n show_type_search=1\n show_year_search=1\n show_order_search=1\n show_topic_search=1\n show_locations_search=1\n show_popular=1\n tip_title=Sermon\n Information\n tip_item1_title=Title\n tip_item1=5\n tip_item2_title=Details\n tip_item2=6\n tip_item3_title=Teacher\n tip_item3=7\n tip_item4_title=Reference\n tip_item4=1\n tip_item5_title=Date\n tip_item5=10\n row1col1=18\n r1c1custom=\n r1c1span=1\n rowspanr1c1=1\n linkr1c1=0\n row1col2=5\n r1c2custom=\n r1c2span=1\n rowspanr1c2=1\n linkr1c2=1\n row1col3=1\n r1c3custom=\n r1c3span=1\n rowspanr1c3=1\n linkr1c3=0\n row1col4=20\n r1c4custom=\n rowspanr1c4=1\n linkr1c4=0\n row2col1=6\n r2c1custom=\n r2c1span=4\n rowspanr2c1=1\n linkr2c1=0\n row2col2=0\n r2c2custom=\n r2c2span=1\n rowspanr2c2=1\n linkr2c2=0\n row2col3=0\n r2c3custom=\n r2c3span=1\n rowspanr2c3=1\n linkr2c3=0\n row2col4=0\n r2c4custom=\n rowspanr2c4=1\n linkr2c4=0\n row3col1=0\n r3c1custom=\n r3c1span=1\n rowspanr3c1=1\n linkr3c1=0\n row3col2=0\n r3c2custom=\n r3c2span=1\n linkr3c2=0\n row3col3=0\n r3c3custom=\n r3c3span=1\n rowspanr3c3=1\n linkr3c3=0\n row3col4=0\n r3c4custom=\n rowspanr3c4=1\n linkr3c4=0\n row4col1=0\n r4c1custom=\n r4c1span=1\n rowspanr4c1=1\n linkr4c1=0\n row4col2=0\n r4c2custom=\n r4c2span=1\n rowspanr4c2=1\n linkr4c2=0\n row4col3=0\n r4c3custom=\n r4c3span=1\n rowspanr4c3=1\n linkr4c3=0\n row4col4=0\n r4c4custom=\n rowspanr4c4=1\n linkr4c4=0\n show_print_view=1\n show_pdf_view=1\n show_teacher_view=1\n show_passage_view=1\n use_headers_view=1\n list_items_view=0\n title_line_1=1\n customtitle1=\n title_line_2=4\n customtitle2=\n view_link=1\n link_text=Return\n to\n Studies\n List\n show_scripture_link=1\n show_comments=0\n comment_access=1\n comment_publish=0\n use_captcha=1\n email_comments=1\n recipient=\n subject=Comments\n on\n studies\n body=Comments\n entered.\n moduleitems=3\n teacher_title=Our\n Teachers\n show_teacher_studies=1\n teacherlink=1\n studies=5\n label_teacher=Latest\n Messages\n series_title=Our\n Series\n show_series_title=1\n show_page_image_series=1\n series_show_description=1\n series_characters=\n search_series=1\n series_limit=5\n serieselement1=1\n seriesislink1=1\n serieselement2=1\n seriesislink2=1\n serieselement3=1\n seriesislink3=1\n serieselement4=1\n seriesislink4=1\n series_detail_sort=1\n series_detail_order=DESC\n series_detail_show_link=1\n series_detail_limit=\n series_list_return=1\n series_detail_1=5\n series_detail_islink1=1\n series_detail_2=7\n series_detail_islink2=0\n series_detail_3=10\n series_detail_islink3=0\n series_detail_4=20\n series_detail_islink4=0', 'Default','textfile24.png','pdf24.png')</query>
<phpfile name="biblestudy.install.special.php" />
</install>
	<upgrade>
		<version version="6.0.7" versiondate="2008-04-10" build="600" versionname="Genesis">
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN media_hours VARCHAR(2) NULL AFTER studyintro</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN media_minutes VARCHAR(2) NULL AFTER media_hours</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN media_seconds VARCHAR(2) NULL AFTER media_minutes</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN secondary_reference TEXT NULL AFTER chapter_end</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN title VARCHAR(50) NULL AFTER teachername</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN phone VARCHAR(50) NULL AFTER title</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN email VARCHAR(100) NULL AFTER phone</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN website VARCHAR(250) NULL AFTER email</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN information TEXT NULL AFTER website</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN image TEXT NULL AFTER information</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN imageh TEXT NULL AFTER image</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN imagew TEXT NULL AFTER imageh</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN thumb TEXT NULL AFTER imagew</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN thumbw TEXT NULL AFTER thumb</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN thumbh TEXT NULL AFTER thumbw</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN short TEXT NULL AFTER thumbh</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN ordering INT(3) NULL AFTER short</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN catid INT(3) NULL default '1' AFTER ordering</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN list_show TINYINT(1) NOT NULL default '1' AFTER catid</query>
	</version>
	<version version="6.0.8" versiondate="2008-08-14" build="608" versionname="Exodus">
			<query>CREATE TABLE IF NOT EXISTS `#__bsms_comments` (
				`id` INT(3) NOT NULL AUTO_INCREMENT,
				`published` TINYINT(1) NOT NULL default '0',
				`study_id` INT(11) NOT NULL,
				`user_id` INT(11) NOT NULL,
				`full_name` VARCHAR(50) NOT NULL,
				`user_email` VARCHAR(100) NOT NULL,
				`comment_date` DATETIME NOT NULL,
				`comment_text` TEXT NOT NULL,
				PRIMARY KEY (`id`) ) TYPE=MyISAM CHARACTER SET `utf8`</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN booknumber2 VARCHAR(4) NULL AFTER secondary_reference</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN chapter_begin2 VARCHAR(4) NULL AFTER booknumber2</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN verse_begin2 VARCHAR(4) NULL AFTER chapter_begin2</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN chapter_end2 VARCHAR(4) NULL AFTER verse_begin2</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN verse_end2 VARCHAR(4) NULL AFTER chapter_end2</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN prod_dvd VARCHAR(100) NULL AFTER verse_end2</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN prod_cd VARCHAR(100) NULL AFTER prod_dvd</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN server_cd VARCHAR(10) NULL AFTER prod_cd</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN server_dvd VARCHAR(10) NULL AFTER server_cd</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN image_cd VARCHAR(10) NULL AFTER server_dvd</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN image_dvd VARCHAR(10) NULL default '0' AFTER image_cd</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN studytext2 TEXT NULL AFTER image_dvd</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN comments TINYINT(1) NULL default '1' AFTER studytext2</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN hits INT(10) NOT NULL default '0' AFTER comments</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN user_id INT(10) NULL AFTER hits</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN user_name VARCHAR(50) NULL AFTER user_id</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN link_type VARCHAR(1) NULL AFTER createdate</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN hits INT(10) NULL AFTER link_type</query>
		</version>
		<version version="6.0.11" versiondate="2008-10-22" build="611" versionname="Leviticus">
			<query>CREATE TABLE IF NOT EXISTS `#__bsms_locations` (
					`id` INT NOT NULL AUTO_INCREMENT,
					`location_text` VARCHAR(250) NULL,
					`published` TINYINT(1) NOT NULL DEFAULT '1',
					PRIMARY KEY (`id`) ) TYPE=MyISAM CHARACTER SET `utf8`</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN show_level varchar(100) NOT NULL default '0' AFTER user_name</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN location_id INT(3) NULL AFTER show_level</query>
		</version>
		<version version="6.1.0" versiondate="2009-11-30" build="613" versionname="Numbers">
			<query>CREATE TABLE IF NOT EXISTS `#__bsms_admin` (
					  `id` int(11) NOT NULL,
					  `podcast` text,
					  `series` text,
					  `study` text,
					  `teacher` text,
					  `media` text,
					  `download` text,
					  `main` text,
					  `showhide` char(255) DEFAULT NULL,
					  `params` text,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8</query>
			<query>CREATE TABLE IF NOT EXISTS `#__bsms_share` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(250) DEFAULT NULL,
				  `params` text,
				  `published` tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
			<query>CREATE TABLE IF NOT EXISTS `#__bsms_templates` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `type` varchar(255) NOT NULL,
				  `tmpl` longtext NOT NULL,
				  `published` int(1) NOT NULL DEFAULT '1',
				  `params` longtext,
				  `title` text,
				  `text` text,
				  `pdf` text,
				  PRIMARY KEY (`id`)
				  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20</query>
				  <query>INSERT INTO `#__bsms_admin` VALUES (1, '', '', '', '', 'speaker24.png', 'download.png', 'openbible.png', '0', 'compat_mode=0 drop_tables=0 admin_store=1 studylistlimit=10 popular_limit=1 series_imagefolder= media_imagefolder= teachers_imagefolder= study_images= podcast_imagefolder= location_id= teacher_id= series_id= booknumber= topic_id= messagetype= avr=0 download= target= server= path= podcast=0 mime=0 allow_entry_study=0 entry_access=23 study_publish=0 socialnetworking=1')</query>
					<query>INSERT INTO `#__bsms_share` (`id`, `name`, `params`, `published`) VALUES 
	(NULL, 'FaceBook', 'mainlink=http://www.facebook.com/sharer.php? item1prefix=u= item1=200 item1custom= item2prefix=t= item2=5 item2custom= item3prefix= item3=6 item3custom= item4prefix= item4=8 item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/facebook.png shareimageh=33px shareimagew=33px totalcharacters= alttext=FaceBook  ', 1), 
	(NULL, 'Twitter', 'mainlink=http://twitter.com/home? item1prefix=status= item1=200 item1custom= item2prefix= item2=5 item2custom= item3prefix= item3=1 item3custom= item4prefix= item4= item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/twitter.png shareimagew=33px shareimageh=33px totalcharacters=140 alttext=Twitter', 1), 
	(NULL, 'Delicious', 'mainlink=http://delicious.com/save? item1prefix=url= item1=200 item1custom= item2prefix=&amp;title= item2=5 item2custom= item3prefix= item3=6 item3custom= item4prefix= item4= item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/delicious.png shareimagew=33px shareimageh=33px totalcharacters= alttext=Delicious', 1),
	(NULL, 'MySpace', 'mainlink=http://www.myspace.com/index.cfm? item1prefix=fuseaction=postto&amp;t= item1=5 item1custom= item2prefix=&amp;c= item2=6 item2custom= item3prefix=&amp;u= item3=200 item3custom= item4prefix=&amp;l=1 item4= item4custom= use_bitly=0 username= api= shareimage=components/com_biblestudy/images/myspace.png\nshareimagew=33px\nshareimageh=33px\ntotalcharacters=\nalttext=MySpace', 1)</query>
			<query>INSERT INTO `#__bsms_templates` VALUES (1, 'tmplList', '', 1, 'itemslimit=10\n compatibilityMode=0\n studieslisttemplateid=1\n detailstemplateid=1\n teachertemplateid=1\n serieslisttemplateid=1\n seriesdetailtemplateid=1\n teacher_id=\n show_teacher_list=0\n series_id=0\n booknumber=0\n topic_id=0\n messagetype=0\n locations=0\n default_order=DESC\n show_page_image=1\n tooltip=1\n show_verses=0\n stylesheet=\n date_format=2\n duration_type=1\n useavr=0\n popuptype=window\n media_player=0\n player_width=290\n show_filesize=1\n store_page=flypage.tpl\n show_page_title=1\n page_title=Bible\n Studies\n use_headers_list=1\n list_intro=\n intro_show=1\n listteachers=1\n teacherlink=1\n details_text=Study\n Details\n show_book_search=1\n show_teacher_search=1\n show_series_search=1\n show_type_search=1\n show_year_search=1\n show_order_search=1\n show_topic_search=1\n show_locations_search=1\n show_popular=1\n tip_title=Sermon\n Information\n tip_item1_title=Title\n tip_item1=5\n tip_item2_title=Details\n tip_item2=6\n tip_item3_title=Teacher\n tip_item3=7\n tip_item4_title=Reference\n tip_item4=1\n tip_item5_title=Date\n tip_item5=10\n row1col1=18\n r1c1custom=\n r1c1span=1\n rowspanr1c1=1\n linkr1c1=0\n row1col2=5\n r1c2custom=\n r1c2span=1\n rowspanr1c2=1\n linkr1c2=1\n row1col3=1\n r1c3custom=\n r1c3span=1\n rowspanr1c3=1\n linkr1c3=0\n row1col4=20\n r1c4custom=\n rowspanr1c4=1\n linkr1c4=0\n row2col1=6\n r2c1custom=\n r2c1span=4\n rowspanr2c1=1\n linkr2c1=0\n row2col2=0\n r2c2custom=\n r2c2span=1\n rowspanr2c2=1\n linkr2c2=0\n row2col3=0\n r2c3custom=\n r2c3span=1\n rowspanr2c3=1\n linkr2c3=0\n row2col4=0\n r2c4custom=\n rowspanr2c4=1\n linkr2c4=0\n row3col1=0\n r3c1custom=\n r3c1span=1\n rowspanr3c1=1\n linkr3c1=0\n row3col2=0\n r3c2custom=\n r3c2span=1\n linkr3c2=0\n row3col3=0\n r3c3custom=\n r3c3span=1\n rowspanr3c3=1\n linkr3c3=0\n row3col4=0\n r3c4custom=\n rowspanr3c4=1\n linkr3c4=0\n row4col1=0\n r4c1custom=\n r4c1span=1\n rowspanr4c1=1\n linkr4c1=0\n row4col2=0\n r4c2custom=\n r4c2span=1\n rowspanr4c2=1\n linkr4c2=0\n row4col3=0\n r4c3custom=\n r4c3span=1\n rowspanr4c3=1\n linkr4c3=0\n row4col4=0\n r4c4custom=\n rowspanr4c4=1\n linkr4c4=0\n show_print_view=1\n show_pdf_view=1\n show_teacher_view=1\n show_passage_view=1\n use_headers_view=1\n list_items_view=0\n title_line_1=1\n customtitle1=\n title_line_2=4\n customtitle2=\n view_link=1\n link_text=Return\n to\n Studies\n List\n show_scripture_link=1\n show_comments=0\n comment_access=1\n comment_publish=0\n use_captcha=1\n email_comments=1\n recipient=\n subject=Comments\n on\n studies\n body=Comments\n entered.\n moduleitems=3\n teacher_title=Our\n Teachers\n show_teacher_studies=1\n studies=5\n label_teacher=Latest\n Messages\n teacherlink=1\n series_title=Our\n Series\n show_series_title=1\n show_page_image_series=1\n series_show_description=1\n series_characters=\n search_series=1\n series_limit=5\n serieselement1=1\n seriesislink1=1\n serieselement2=1\n seriesislink2=1\n serieselement3=1\n seriesislink3=1\n serieselement4=1\n seriesislink4=1\n series_detail_sort=1\n series_detail_order=DESC\n series_detail_show_link=1\n series_detail_limit=\n series_list_return=1\n series_detail_1=5\n series_detail_islink1=1\n series_detail_2=7\n series_detail_islink2=0\n series_detail_3=10\n series_detail_islink3=0\n series_detail_4=20\n series_detail_islink4=0', 'Default','textfile24.png','pdf24.png')</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN thumbnailm TEXT NULL AFTER studytext</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN thumbhm INT NULL AFTER thumbnailm</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN thumbwm INT NULL AFTER thumbhm</query>
			<query mode="silenterror">ALTER TABLE #__bsms_studies ADD COLUMN params TEXT NULL AFTER thumbwm</query>
			<query mode="silenterror">ALTER TABLE #__bsms_podcast ADD COLUMN episodetitle INT NULL AFTER published</query>
			<query mode="silenterror">ALTER TABLE #__bsms_podcast ADD COLUMN custom VARCHAR( 200 ) NULL AFTER episodetitle</query>
			<query mode="silenterror">ALTER TABLE #__bsms_podcast ADD COLUMN detailstemplateid INT NULL AFTER custom</query>
			<query mode="silenterror">ALTER TABLE #__bsms_series ADD COLUMN series_thumbnail VARCHAR(150) NULL AFTER series_text</query>
			<query mode="silenterror">ALTER TABLE #__bsms_series ADD COLUMN description TEXT NULL AFTER series_text</query>
			<query mode="silenterror">ALTER TABLE #__bsms_series ADD COLUMN teacher INT(3) NULL AFTER series_text</query>
			<query mode="silenterror">ALTER TABLE #__bsms_media ADD COLUMN path2 VARCHAR(150) NOT NULL AFTER media_image_path</query>
			<query>INSERT INTO #__bsms_media SET `media_text` = 'Article',`media_image_name` = 'Article',`path2` = 'textfile24.png', `media_alttext` = 'Article',`published` = '1'</query>
			<query>INSERT INTO #__bsms_media SET `media_text` = 'Download',`media_image_name` = 'Download',`path2` = 'download.png', `media_alttext` = 'Download',`published` = '1'</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN teacher_thumbnail TEXT NULL AFTER id</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers ADD COLUMN teacher_image TEXT NULL AFTER id</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN docMan_id INT NULL AFTER published</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN article_id INT NULL AFTER docMan_id</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN comment TEXT NULL AFTER article_id</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN virtueMart_id INT NULL AFTER comment</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN params TEXT NULL AFTER virtueMart_id</query>
			<phpfile name="biblestudy.613.upgrade.php" />	
		</version>
		<version version="6.2.0" versiondate="2010-09-06" build="614" versionname="Deuteronomy">
		<query>CREATE TABLE IF NOT EXISTS `#__bsms_studytopics` (
				  `id` int(3) NOT NULL AUTO_INCREMENT,
				  `study_id` int(3) NOT NULL DEFAULT '0',
				  `topic_id` int(3) NOT NULL DEFAULT '0',
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id` (`id`),
				  KEY `id_2` (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1</query>
        <query>CREATE TABLE IF NOT EXISTS `#__bsms_timeset` (
                `timeset` VARCHAR(14) ,
                KEY `timeset` (`timeset`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;</query>
			<query mode="silenterror">ALTER TABLE #__bsms_teachers MODIFY `title` varchar(250)</query>
			<query mode="silenterror">ALTER TABLE #__bsms_admin ADD COLUMN showhide char(255) DEFAULT NULL</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN downloads int(10) DEFAULT 0</query>
			<query mode="silenterror">ALTER TABLE #__bsms_mediafiles ADD COLUMN plays int(10) DEFAULT 0</query>
            <query>INSERT INTO `#__bsms_timeset` SET `timeset`='1281646339'</query>
			<phpfile name="biblestudy.614.upgrade.php" />
		</version>
        <version version="6.2.1" versiondate="2010-09-27" build="615" versionname="Joshua">
        </version>
        <version version="6.2.2" versiondate="2010-10-25" build="622" versionname="Judges">
            <phpfile name="biblestudy.622.upgrade.php" />
        </version>
        <version version="6.2.3" versiondate="2010-11-03" build="623" versionname="1Samuel">
            <phpfile name="biblestudy.623.upgrade.php" />
        </version>
         <version version="6.2.4" versiondate="2010-11-03" build="624" versionname="2Samuel">
            </version>
        <version version="7.0.0" versiondate="2011-01-12" build="1190" versionname="1Kings">
            <query mode="silenterror">ALTER TABLE #__bsms_studies MODIFY `show_level` varchar(100)</query>
            <query mode="silenterror">ALTER TABLE #__bsms_mediafiles MODIFY `podcast_id` varchar(50)</query>
            <query>ALTER TABLE #__bsms_mediafiles ADD COLUMN `player` int(2) NULL</query>
            <query>ALTER TABLE #__bsms_mediafiles ADD COLUMN `popup` int(2) NULL</query>
            <query>ALTER TABLE #__bsms_timeset ADD COLUMN `backup` VARCHAR(14)</query>
            <query>INSERT INTO `#__bsms_timeset` SET `backup`='1281646339'</query>
            <phpfile name="biblestudy.700.upgrade.php" />
        </version>
	</upgrade>
</comupgrade>
XML;
?>