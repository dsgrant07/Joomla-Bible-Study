INSERT INTO `#__bsms_update` (id,version) VALUES (7,'7.1.0')
ON DUPLICATE KEY UPDATE version= '7.1.0';

-- @todo need to look at a better way to do this sql
UPDATE `#__bsms_share` SET `params` = '{"mainlink":"http://www.facebook.com/sharer.php?","item1prefix":"u=","item1":200,"item1custom":"","item2prefix":"t=","item2":5,"item2custom":"","item3prefix":"","item3":6,"item3custom":"","item4prefix":"","item4":8,"item4custom":"","use_bitly":0,"username":"","api":"","shareimage":"media/com_biblestudy/images/facebook.png","shareimageh":"33px","shareimagew":"33px","totalcharacters":"","alttext":"FaceBook"}' WHERE `#__bsms_share`.`id` = 1;

UPDATE `#__bsms_share` SET `params` = '{"mainlink":"http://twitter.com/nfsda?","item1prefix":"status=","item1":200,"item1custom":"","item2prefix":"","item2":5,"item2custom":"","item3prefix":"","item3":1,"item3custom":"","item4prefix":"","item4":0,"item4custom":"","use_bitly":0,"username":"","api":"","shareimage":"media/com_biblestudy/images/twitter.png","shareimageh":"33px","shareimagew":"33px","totalcharacters":140,"alttext":"Twitter"}' WHERE `#__bsms_share`.`id` = 2;

UPDATE `#__bsms_share` SET `params` = '{"mainlink":"http://delicious.com/save?","item1prefix":"url=","item1":200,"item1custom":"","item2prefix":"&title=","item2":5,"item2custom":"","item3prefix":"","item3":6,"item3custom":"","item4prefix":"","item4":"","item4custom":"","use_bitly":0,"username":"","api":"","shareimage":"media/com_biblestudy/images/delicious.png","shareimagew":"33px","shareimageh":"33px","totalcharacters":"","alttext":"Delicious"}' WHERE `#__bsms_share`.`id` = 3;

UPDATE `#__bsms_share` SET `params` = '{"mainlink":"http://www.myspace.com/index.cfm?","item1prefix":"fuseaction=postto&t=","item1":5,"item1custom":"","item2prefix":"&c=","item2":6,"item2custom":"","item3prefix":"&u=","item3":200,"item3custom":"","item4prefix":"&l=1","item4":"","item4custom":"","use_bitly":0,"username":"","api":"","shareimage":"media/com_biblestudy/images/myspace.png","shareimagew":"33px","shareimageh":"33px","totalcharacters":"","alttext":"MySpace"}' WHERE `#__bsms_share`.`id` = 4;

CREATE TABLE IF NOT EXISTS `#__bsms_styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` int(3) NOT NULL,
  `filename` text NOT NULL,
  `stylecode` longtext NOT NULL,
  `asset_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
    KEY `idx_state` (`published`)
   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

INSERT INTO `#__bsms_styles` (`id`, `published`, `filename`, `stylecode`) VALUES
(1, 1, 'biblestudy', '/* Listing Page Items */\r\n#listintro p, #listintro td {\r\n	margin: 0;\r\n	font-weight: bold;\r\n	color: black;\r\n}\r\n\r\n#listingfooter li, #listingfooter ul\r\n{\r\n    display: inline;\r\n}\r\n#main ul, #main li\r\n{\r\n    display: inline;\r\n}\r\n#bsdropdownmenu {\r\n  margin-bottom: 10px;\r\n}\r\n#bslisttable {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n}\r\n#bslisttable th, #bslisttable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n#bslisttable .row1col1,\r\n#bslisttable .row2col1,\r\n#bslisttable .row3col1,\r\n#bslisttable .row4col1 {\r\n  border-left: grey 2px solid;\r\n}\r\n#bslisttable .lastcol {\r\n  border-right: grey 2px solid;\r\n}\r\n#bslisttable .lastrow td {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:7px;\r\n}\r\n#bslisttable th {\r\n  background-color:#707070;\r\n  font-weight:bold;\r\n  color:white;\r\n\r\n}\r\n#bslisttable th.row1col1,\r\n#bslisttable th.row1col2,\r\n#bslisttable th.row1col3,\r\n#bslisttable th.row1col4 {\r\n  border-top: grey 2px solid;\r\n  padding-top:3px;\r\n}\r\n#bslisttable th.firstrow {\r\n	border-bottom: grey 2px solid;\r\n}\r\n#bslisttable tr.lastrow th {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:3px;\r\n}\r\n\r\n#bslisttable tr.bsodd td {\r\n  background-color:#FFFFFF;\r\n}\r\n#bslisttable tr.bseven td {\r\n  background-color:#FFFFF0;\r\n}\r\n\r\n#bslisttable .date {\r\n  white-space:nowrap;\r\n  font-size:1.2em;\r\n  color:grey;\r\n  font-weight:bold;\r\n}\r\n#bslisttable .scripture1 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#bslisttable .scripture2 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#bslisttable .title {\r\n  font-size:1.2em;\r\n  color:#707070;\r\n  font-weight:bold;\r\n}\r\n#bslisttable .series_text {\r\n  white-space:nowrap;\r\n  color:grey;\r\n}\r\n#bslisttable .duration {\r\n  white-space:nowrap;\r\n  font-style:italic;\r\n}\r\n#bslisttable .studyintro {\r\n\r\n}\r\n#bslisttable .teacher {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .location_text {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .topic_text {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .message_type {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .jbsmedia {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .store {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .details-text {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .details-pdf {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .details-text-pdf {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .detailstable td {\r\n  border: none;\r\n  padding: 0 2px 0 0;\r\n}\r\n#bslisttable .secondary_reference {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .teacher-title-name {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .submitted {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .hits {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .studynumber {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .filesize {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .custom {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .commentshead {\r\n	font-size: 2em;\r\n	font-weight:bold;\r\n}\r\n#bslisttable .thumbnail {\r\n	white-space:nowrap;\r\n}\r\n#bslisttable .mediatable td {\r\n  border: none;\r\n  padding: 0 6px 0 0;\r\n}\r\n#bslisttable .mediatable span.bsfilesize {\r\n  font-size:0.6em;\r\n  position:relative; bottom: 7px;\r\n}\r\n\r\n.component-content ul\r\n{\r\ntext-align: center;\r\n}\r\n\r\n.component-content li\r\n{\r\ndisplay: inline;\r\n}\r\n\r\n.pagenav\r\n{\r\nmargin-left: 10px;\r\nmargin-right: 10px;\r\n}\r\n\r\n/* Study Details CSS */\r\n\r\n#bsmsdetailstable {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n}\r\n#bsmsdetailstable th, #bsmsdetailstable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n#bsmsdetailstable .row1col1,\r\n#bsmsdetailstable .row2col1,\r\n#bsmsdetailstable .row3col1,\r\n#bsmsdetailstable .row4col1 {\r\n  border-left: grey 2px solid;\r\n}\r\n#bsmsdetailstable .lastcol {\r\n  border-right: grey 2px solid;\r\n}\r\n#bsmsdetailstable .lastrow td {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:7px;\r\n}\r\n#bsmsdetailstable th {\r\n  background-color:#707070;\r\n  font-weight:bold;\r\n  color:white;\r\n\r\n}\r\n#bsmsdetailstable th.row1col1,\r\n#bsmsdetailstable th.row1col2,\r\n#bsmsdetailstable th.row1col3,\r\n#bsmsdetailstable th.row1col4 {\r\n  border-top: grey 2px solid;\r\n  padding-top:3px;\r\n}\r\n#bsmsdetailstable tr.lastrow th {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:3px;\r\n}\r\n#bsmsdetailstable th.firstrow {\r\n	border-bottom: grey 2px solid;\r\n}\r\n#bsmsdetailstable tr.bsodd td {\r\n  background-color:#FFFFFF;\r\n}\r\n#bsmsdetailstable tr.bseven td {\r\n  background-color:#FFFFF0;\r\n}\r\n\r\n#bsmsdetailstable .date {\r\n  white-space:nowrap;\r\n  font-size:1.2em;\r\n  color:grey;\r\n  font-weight:bold;\r\n}\r\n#bsmsdetailstable .scripture1 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#bsmsdetailstable .scripture2 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#bsmsdetailstable .title {\r\n  font-size:1.2em;\r\n  color:#707070;\r\n  font-weight:bold;\r\n}\r\n#bsmsdetailstable .series_text {\r\n  white-space:nowrap;\r\n  color:grey;\r\n}\r\n#bsmsdetailstable .duration {\r\n  white-space:nowrap;\r\n  font-style:italic;\r\n}\r\n#bsmsdetailstable .studyintro {\r\n\r\n}\r\n#bsmsdetailstable .teacher {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .location_text {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .topic_text {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .message_type {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .jbsmedia {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .store {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .details-text {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .details-pdf {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .details-text-pdf {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .detailstable td {\r\n  border: none;\r\n  padding: 0 2px 0 0;\r\n}\r\n#bsmsdetailstable .secondary_reference {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .teacher-title-name {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .submitted {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .hits {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .studynumber {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .filesize {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .custom {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .commentshead {\r\n	font-size: 2em;\r\n	font-weight:bold;\r\n}\r\n#bsmsdetailstable .thumbnail {\r\n	white-space:nowrap;\r\n}\r\n#bsmsdetailstable .mediatable td {\r\n  border: none;\r\n  padding: 0 6px 0 0;\r\n}\r\n#bsmsdetailstable .mediatable span.bsfilesize {\r\n  font-size:0.6em;\r\n  position:relative; bottom: 7px;\r\n}\r\n#bsdetailstable th, #bsdetailstable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n#bsdetailstable .studydetailstext td {\r\n	font-size:1.2em;\r\n  color:#707070;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n}\r\n#titletable {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n}\r\n#titletable th, #titletable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n\r\n#titletable .titlesecondline {\r\n	font-weight: bold;\r\n}\r\n#titletable .titlefirstline {\r\n	font-size:20px;\r\n	font-weight:bold;\r\n}\r\n\r\n#recaptcha_widget_div {\r\n  position:static !important;\r\n}\r\n/* Module Style Settings */\r\n\r\n#bsmsmoduletable {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n}\r\n#bsmsmoduletable th, #bsmsmoduletable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n#bsmsmoduletable .row1col1,\r\n#bsmsmoduletable .row2col1,\r\n#bsmsmoduletable .row3col1,\r\n#bsmsmoduletable .row4col1 {\r\n  border-left: grey 2px solid;\r\n}\r\n#bsmsmoduletable .lastcol {\r\n  border-right: grey 2px solid;\r\n}\r\n#bsmsmoduletable .lastrow td {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:7px;\r\n}\r\n#bsmsmoduletable th {\r\n  background-color:#707070;\r\n  font-weight:bold;\r\n  color:white;\r\n\r\n}\r\n#bsmsmoduletable th.row1col1,\r\n#bsmsmoduletable th.row1col2,\r\n#bsmsmoduletable th.row1col3,\r\n#bsmsmoduletable th.row1col4 {\r\n  border-top: grey 2px solid;\r\n  padding-top:3px;\r\n}\r\n#bsmsmoduletable th.firstrow {\r\n	border-bottom: grey 2px solid;\r\n}\r\n#bsmsmoduletable tr.lastrow th {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:3px;\r\n}\r\n\r\n#bsmsmoduletable tr.bsodd td {\r\n  background-color:#FFFFFF;\r\n}\r\n#bsmsmoduletable tr.bseven td {\r\n  background-color:#FFFFF0;\r\n}\r\n\r\n#bsmsmoduletable .date {\r\n  white-space:nowrap;\r\n  font-size:1.2em;\r\n  color:grey;\r\n  font-weight:bold;\r\n}\r\n#bsmsmoduletable .scripture1 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#bsmsmoduletable .scripture2 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#bsmsmoduletable .title {\r\n  font-size:1.2em;\r\n  color:#707070;\r\n  font-weight:bold;\r\n}\r\n#bsmsmoduletable .series_text {\r\n  white-space:nowrap;\r\n  color:grey;\r\n}\r\n#bsmsmoduletable .duration {\r\n  white-space:nowrap;\r\n  font-style:italic;\r\n}\r\n#bsmsmoduletable .studyintro {\r\n\r\n}\r\n#bsmsmoduletable .teacher {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .location_text {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .topic_text {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .message_type {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .jbsmedia {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .store {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .details-text {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .details-pdf {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .details-text-pdf {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .detailstable td {\r\n  border: none;\r\n  padding: 0 2px 0 0;\r\n}\r\n#bsmsmoduletable .secondary_reference {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .teacher-title-name {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .submitted {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .hits {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .studynumber {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .filesize {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .custom {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .commentshead {\r\n	font-size: 2em;\r\n	font-weight:bold;\r\n}\r\n#bsmsmoduletable .thumbnail {\r\n	white-space:nowrap;\r\n}\r\n#bsmsmoduletable .mediatable td {\r\n  border: none;\r\n  padding: 0 6px 0 0;\r\n}\r\n#bsmsmoduletable .mediatable span.bsfilesize {\r\n  font-size:0.6em;\r\n  position:relative; bottom: 7px;\r\n}\r\n/* Series List-Details Items */\r\n#seriestable {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n}\r\n#seriestable th, #seriestable td {\r\n  text-align:left;\r\n  padding: 3px 3px 3px 3px;\r\n  border:none;\r\n}\r\n#seriestable .firstrow td {\r\n	border-top: grey 2px solid;\r\n}\r\n#seriestable .firstcol {\r\n  border-left: grey 2px solid;\r\n}\r\n#seriestable .lastcol {\r\n  border-right: grey 2px solid;\r\n}\r\n#seriestable .lastrow td {\r\n  border-bottom:2px solid grey;\r\n  border-left: 2px solid grey;\r\n  border-right: 2px solid grey;\r\n  padding-bottom:3px;\r\n}\r\n#seriesttable tr.bsodd td {\r\n  background-color:#FFFFFF;\r\n}\r\n#seriestable tr.bseven td {\r\n  background-color:#FFFFF0;\r\n}\r\n#seriestable tr.onlyrow td {\r\n	border-bottom: 2px solid grey;\r\n	border-top:  grey 2px solid;\r\n}\r\n#seriestable .thumbnail img {\r\n	border: 1px solid grey;\r\n}\r\n#seriestable .teacher img {\r\n	border: 1px solid grey;\r\n}\r\n#seriestable .title {\r\n	font-weight: bold;\r\n	font-size: larger;\r\n}\r\n#seriestable tr.noborder td{\r\n	border: none;\r\n}\r\n#seriestable .description p{\r\n	width:500px;\r\n}\r\n#seriestable .teacher {\r\n	font-weight: bold;\r\n}\r\n/* Series Detail Study Links Items */\r\n#seriesstudytable {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n}\r\n#seriesstudytable th, #seriesstudytable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n#seriesstudytable .row1col1,\r\n#seriesstudytable .row2col1,\r\n#seriesstudytable .row3col1,\r\n#seriesstudytable .row4col1 {\r\n  border-left: grey 2px solid;\r\n}\r\n#seriesstudytable .lastcol {\r\n  border-right: grey 2px solid;\r\n}\r\n#seriesstudytable .lastrow td {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:7px;\r\n}\r\n#seriesstudytable th {\r\n  background-color:#707070;\r\n  font-weight:bold;\r\n  color:white;\r\n\r\n}\r\n#seriesstudytable th.row1col1,\r\n#seriesstudytable th.row1col2,\r\n#seriesstudytable th.row1col3,\r\n#seriesstudytable th.row1col4 {\r\n  border-top: grey 2px solid;\r\n  padding-top:3px;\r\n}\r\n#seriesstudytable th.firstrow {\r\n	border-bottom: grey 2px solid;\r\n}\r\n#seriesstudytable tr.lastrow th {\r\n  border-bottom:2px solid grey;\r\n  padding-bottom:3px;\r\n}\r\n\r\n#seriesstudytable tr.bsodd td {\r\n  background-color:#FFFFFF;\r\n}\r\n#seriesstudytable tr.bseven td {\r\n  background-color:#FFFFF0;\r\n}\r\n\r\n#seriesstudytable .date {\r\n  white-space:nowrap;\r\n  font-size:1.2em;\r\n  color:grey;\r\n  font-weight:bold;\r\n}\r\n#seriesstudytable .scripture1 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#seriesstudytable .scripture2 {\r\n  white-space:nowrap;\r\n  color:#c02121;\r\n  font-weight:bold;\r\n}\r\n#seriesstudytable .title {\r\n  font-size:1.2em;\r\n  color:#707070;\r\n  font-weight:bold;\r\n  font-style:italic;\r\n}\r\n#seriesstudytable .series_text {\r\n  white-space:nowrap;\r\n  color:grey;\r\n}\r\n#seriesstudytable .duration {\r\n  white-space:nowrap;\r\n  font-style:italic;\r\n}\r\n#seriesstudytable .studyintro {\r\n\r\n}\r\n#seriesstudytable .teacher {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .location_text {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .topic_text {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .message_type {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .jbsmedia {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .store {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .details-text {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .details-pdf {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .details-text-pdf {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .detailstable td {\r\n  border: none;\r\n  padding: 0 2px 0 0;\r\n}\r\n#seriesstudytable .secondary_reference {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .teacher-title-name {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .submitted {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .hits {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .studynumber {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .filesize {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .custom {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .commentshead {\r\n	font-size: 2em;\r\n	font-weight:bold;\r\n}\r\n#seriesstudytable .thumbnail {\r\n	white-space:nowrap;\r\n}\r\n#seriesstudytable .mediatable td {\r\n  border: none;\r\n  padding: 0 6px 0 0;\r\n}\r\n#seriesstudytable .mediatable span.bsfilesize {\r\n  font-size:0.6em;\r\n  position:relative; bottom: 7px;\r\n}\r\n#seriesstudytable .studyrow {\r\n\r\n}\r\n.tool-tip {\r\n        color: #fff;\r\n        width: 300px;\r\n        z-index: 13000;\r\n}\r\n/* Tooltip Styles */\r\n/* @todo need to find these files */\r\n.tool-title {\r\n        font-weight: bold;\r\n        font-size: 11px;\r\n        margin: 0;\r\n        color: #9FD4FF;\r\n        padding: 8px 8px 4px;\r\n        background: url(/images/tooltip/bubble.gif) top left;\r\n}\r\n.tool-text {\r\n        font-size: 11px;\r\n        padding: 4px 8px 8px;\r\n        background: url(/images/tooltip/bubble_filler.gif) bottom right;\r\n}\r\n    .custom-tip {\r\n       color: #000;\r\n       width: 300px;\r\n       z-index: 13000;\r\n       border: 2px solid #666666;\r\n       background-color: white;\r\n    }\r\n\r\n    .custom-title {\r\n       font-weight: bold;\r\n       font-size: 11px;\r\n       margin: 0;\r\n       color: #000000;\r\n       padding: 8px 8px 4px;\r\n       background: #666666;\r\n       border-bottom: 1px solid #999999;\r\n    }\r\n\r\n    .custom-text {\r\n       font-size: 11px;\r\n       padding: 4px 8px 8px;\r\n       background: #999999;\r\n    }\r\n/* Teacher List Styles */\r\n#bsm_teachertable\r\n	{\r\n	margin: 0;\r\n 	border-collapse:separate;\r\n	}\r\n#bsm_teachertable td {\r\n  text-align:left;\r\n  padding:0 5px 0 5px;\r\n  border:none;\r\n}\r\n#bsm_teachertable .titlerow\r\n	{\r\n		border-bottom: thick;\r\n	}\r\n#bsm_teachertable .title\r\n	{\r\n		font-size:18px;\r\n		font-weight:bold;\r\n		border-bottom: 3px solid #999999;\r\n		padding: 4px 0px 4px 4px;\r\n	}\r\n#bsm_teachertable .bsm_separator\r\n	{\r\n	border-bottom: 1px solid #999999;\r\n	}\r\n\r\n.bsm_teacherthumbnail\r\n	{\r\n\r\n	}\r\n#bsm_teachertable .bsm_teachername\r\n	{\r\n		font-weight: bold;\r\n		font-size: 14px;\r\n		color: #000000;\r\n		white-space:nowrap;\r\n\r\n	}\r\n#bsm_teachertable .bsm_teacheremail\r\n	{\r\n		font-weight:normal;\r\n		font-size: 11px;\r\n	}\r\n#bsm_teachertable .bsm_teacherwebsite\r\n	{\r\n		font-weight:normal;\r\n		font-size: 11px;\r\n	}\r\n#bsm_teachertable .bsm_teacherphone\r\n	{\r\n		font-weight:normal;\r\n		font-size: 11px;\r\n	}\r\n#bsm_teachertable .bsm_short\r\n	{\r\n		padding: 8px 4px 4px;\r\n	}\r\n#bsm_teachertable .bsm_studiestitlerow {\r\n	background-color: #666;\r\n}\r\n#bsm_teachertable .bsm_titletitle\r\n	{\r\n		font-weight:bold;\r\n		color:#FFFFFF;\r\n	}\r\n#bsm_teachertable .bsm_titlescripture\r\n	{\r\n		font-weight:bold;\r\n		color:#FFFFFF;\r\n	}\r\n#bsm_teachertable .bsm_titledate\r\n	{\r\n		font-weight:bold;\r\n		color:#FFFFFF;\r\n	}\r\n#bsm_teachertable .bsm_teacherlong\r\n{\r\n	padding: 8px 4px 4px;\r\n	border-bottom: 1px solid #999999;\r\n}\r\n#bsm_teachertable tr.bsodd {\r\n  background-color:#FFFFFF;\r\n  border-bottom: 1px solid #999999;\r\n}\r\n#bsm_teachertable tr.bseven {\r\n  background-color:#FFFFF0;\r\n  border-bottom: 1px solid #999999;\r\n}\r\n\r\n#bsm_teachertable .lastrow td {\r\n  border-bottom:1px solid grey;\r\n  padding-bottom:7px;\r\n  padding-top:7px;\r\n}\r\n#bsm_teachertable .bsm_teacherfooter\r\n	{\r\n		border-top: 1px solid #999999;\r\n		padding: 4px 1px 1px 4px;\r\n	}\r\n/*Study Edit CSS */\r\n\r\n.bsmbutton\r\n    {\r\n        background-color:white;\r\n\r\n    }\r\n#toolbar td.white {\r\n	background-color:#FFFFFF;\r\n}\r\n#toolbar a hover visited{\r\n	color:#0B55C4;\r\n}\r\n\r\n/*Social Networking Items */\r\n#bsmsshare {\r\n  margin: 0;\r\n  border-collapse:separate;\r\n  float:right;\r\n  border: 1px solid #CFCFCF;\r\n  background-color: #F5F5F5;\r\n}\r\n#bsmsshare th, #bsmsshare td {\r\n  text-align:center;\r\n  padding:0 0 0 0;\r\n  border:none;\r\n}\r\n#bsmsshare th {\r\n	color:#0b55c4;\r\n	font-weight:bold;\r\n}\r\n/* Landing Page Items */\r\n#landinglist {\r\n\r\n}\r\n#landing_label {\r\n\r\n}\r\n#landing_item {\r\n\r\n}\r\n#landing_title {\r\nfont-family:arial;\r\nfont-size:16px;\r\nfont-weight:bold;\r\n\r\n}\r\n#biblestudy_landing {\r\n\r\n}\r\n#showhide {\r\nfont-family:arial;\r\nfont-size:12px;\r\nfont-weight:bold;\r\ntext-decoration:none;\r\n}\r\n\r\n#showhide .showhideheadingbutton img {\r\nvertical-align:bottom;\r\n}\r\n\r\n#landing_table {\r\n\r\n}\r\n\r\n#landing_td {\r\nwidth: 33%;\r\n}\r\n\r\n#landing_separator {\r\nheight:15px;\r\n}\r\n/* Popup Window Items */\r\n.popupwindow\r\n{\r\nmargin: 5px;\r\ntext-align:center;\r\n}\r\np.popuptitle {\r\nfont-weight: bold;\r\ncolor: black;\r\n}\r\n\r\n.popupfooter\r\n{\r\nmargin: 5px;\r\ntext-align:center;\r\n}\r\np.popupfooter {\r\nfont-weight: bold;\r\ncolor: grey;\r\n}\r\n#main ul, #main li\r\n{\r\ndisplay: inline;\r\n}\r\n\r\n.component-content ul\r\n{\r\ntext-align: center;\r\n}\r\n\r\n.component-content li\r\n{\r\ndisplay: inline;\r\n}\r\n\r\n.pagenav\r\n{\r\nmargin-left: 10px;\r\nmargin-right: 10px;\r\n}\r\n\r\n#recaptcha_widget_div {\r\nposition:static !important;}');

-- Menu Update
UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=mediaimages', `img` = '../media/com_biblestudy/images/menu/icon-16-mediaimages.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=mediaimages' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy', `img` = '../media/com_biblestudy/images/menu/icon-16-biblemenu.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=cpanel', `img` = '../media/com_biblestudy/images/menu/icon-16-biblemenu.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=cpanel' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&task=admin.edit&id=1', `img` = '../media/com_biblestudy/images/menu/icon-16-administration.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&task=admin.edit&id=1' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=messages', `img` = '../media/com_biblestudy/images/menu/icon-16-studies.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=messages' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=mediafiles', `img` = '../media/com_biblestudy/images/menu/icon-16-mp3.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=mediafiles' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=teachers', `img` = '../media/com_biblestudy/images/menu/icon-16-teachers.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=teachers' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=series', `img` = '../media/com_biblestudy/images/menu/icon-16-series.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=series' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=messagetypes', `img` = '../media/com_biblestudy/images/menu/icon-16-messagetype.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=messagetypes' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=locations', `img` = '../media/com_biblestudy/images/menu/icon-16-locations.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=locations' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=topics', `img` = '../media/com_biblestudy/images/menu/icon-16-topics.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=topics' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=comments', `img` = '../media/com_biblestudy/images/menu/icon-16-comments.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=comments' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=servers', `img` = '../media/com_biblestudy/images/menu/icon-16-servers.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=servers' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=folders', `img` = '../media/com_biblestudy/images/menu/icon-16-folder.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=folders' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=podcasts', `img` = '../media/com_biblestudy/images/menu/icon-16-podcast.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=podcasts' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=shares', `img` = '../media/com_biblestudy/images/menu/icon-16-social.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=shares' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=templates', `img` = '../media/com_biblestudy/images/menu/icon-16-templates.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=templates' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=mimetypes', `img` = '../media/com_biblestudy/images/menu/icon-16-mimetype.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=mimetypes' LIMIT 1;

UPDATE `#__menu` SET `link` = 'index.php?option=com_biblestudy&view=cssedit', `img` = '../media/com_biblestudy/images/menu/icon-16-css.png' WHERE `#__menu`.`link` ='index.php?option=com_biblestudy&view=cssedit' LIMIT 1;

CREATE TABLE IF NOT EXISTS `#__bsms_templatecode` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `published` int(3) NOT NULL DEFAULT '1',
  `type` int(3) NOT NULL,
  `asset_id` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `templatecode` longtext NOT NULL,
  `filename` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `#__bsms_mediafiles` ADD COLUMN `language` CHAR( 7 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The language code for the MediaFile.',
ADD COLUMN `created_by` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0',
ADD COLUMN `created_by_alias` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
ADD COLUMN `modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD COLUMN `modified_by` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0',
ADD INDEX `idx_study_id` ( `study_id` );

UPDATE `#__bsms_mediafiles` SET `language` = '*' WHERE `#__bsms_mediafiles`.`language` = '';

ALTER TABLE `#__bsms_comments` ADD COLUMN `language` CHAR( 7 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The language code for the Comments.';

UPDATE `#__bsms_comments` SET `language` = '*' WHERE `#__bsms_comments`.`language` = '';

ALTER TABLE `#__bsms_teachers` ADD COLUMN `language` CHAR( 7 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The language code for the Teachers.';

UPDATE `#__bsms_teachers` SET `language` = '*' WHERE `#__bsms_teachers`.`language` = '';

ALTER TABLE `#__bsms_podcast` ADD COLUMN `language` CHAR( 7 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The language code for the Podcasts.';

UPDATE `#__bsms_podcast` SET `language` = '*' WHERE `#__bsms_podcast`.`language` = '';

ALTER TABLE `#__bsms_series` ADD COLUMN `language` CHAR( 7 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The language code for the Series.';

UPDATE `#__bsms_series` SET `language` = '*' WHERE `#__bsms_series`.`language` = '';

ALTER TABLE `#__bsms_studies` ADD COLUMN `language` CHAR( 7 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The language code for the Studies.',
ADD INDEX `idx_seriesid` ( `series_id` ),
ADD INDEX `idx_topicsid` ( `topics_id` ),
ADD INDEX `idx_user` ( `user_id` );

UPDATE `#__bsms_studies` SET `language` = '*' WHERE `#__bsms_studies`.`language` = '';

ALTER TABLE `#__bsms_studytopics` ADD INDEX `idx_study` ( `study_id` ),
ADD INDEX `idx_topic` ( `topic_id` );

ALTER TABLE `#__bsms_servers` ADD COLUMN `type` tinyint(3) NOT NULL,
ADD COLUMN `ftphost` varchar(100) NOT NULL,
ADD COLUMN `ftpuser` varchar(250) NOT NULL,
ADD COLUMN `ftppassword` varchar(250) NOT NULL,
ADD COLUMN `ftpport` varchar(10) NOT NULL,
ADD COLUMN `aws_key` varchar(100) NOT NULL,
ADD COLUMN `aws_secret` varchar(100) NOT NULL;

ALTER TABLE `#__bsms_podcast` ADD COLUMN `podcast_image_subscribe` VARCHAR(150) COMMENT 'The image to use for the podcast subscription image',
ADD COLUMN `podcast_subscribe_desc` VARCHAR(150) COMMENT 'Words to go below podcast subscribe image',
ADD COLUMN `alternatelink` varchar(300) COMMENT 'replaces podcast file link on subscription',
ADD COLUMN `alternateimage` varchar(150) COMMENT 'alternate image path for podcast',
ADD COLUMN `podcast_subscribe_show` int(3),
ADD COLUMN `alternatewords` varchar(20);

ALTER TABLE `#__bsms_teachers` ADD COLUMN `facebooklink` varchar(150),
ADD COLUMN `twitterlink` varchar(150),
ADD COLUMN `bloglink` varchar(150),
ADD COLUMN `link1` varchar(150),
ADD COLUMN `linklabel1` varchar(150),
ADD COLUMN `link2` varchar(150),
ADD COLUMN `linklabel2` varchar(150),
ADD COLUMN `link3` varchar(150),
ADD COLUMN `linklabel3` varchar(150);