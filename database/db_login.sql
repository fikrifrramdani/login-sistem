#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (1, 'Fikri Ramdani', 'fikriramdani@mainoffice.com', 'default.jpg', '$2y$10$hU73NvYU..hnhPOAFyC.fuOt46StEGPpnCsBDCT6ETT1uBH24be4G', 1, 1, 1650016323);
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (2, 'Indri Suhartini', 'indrisuhartini@mainoffice.com', 'default.jpg', '$2y$10$yYI8uWkkata3kPkLNYZiMe/riTONqkMHvTvkBRsH72kU/DmJz1L52', 2, 1, 1650017296);
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (4, 'Fikri Ramdani', 'fikriramdani32@gmail.com', 'default.jpg', '$2y$10$sIYfV//ECPTN39/ElqaYMOhyVOXmB4HPQu46lgDVneWNHvvmN0vf.', 2, 1, 1650024748);


#
# TABLE STRUCTURE FOR: user_access_menu
#

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (1, 1, 1);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (2, 1, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (3, 2, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (4, 1, 3);


#
# TABLE STRUCTURE FOR: user_menu
#

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_menu` (`id`, `menu`) VALUES (1, 'Admin');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (2, 'User');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (3, 'Menu');


#
# TABLE STRUCTURE FOR: user_role
#

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_role` (`id`, `role`) VALUES (1, 'Administrator');
INSERT INTO `user_role` (`id`, `role`) VALUES (2, 'Member');


#
# TABLE STRUCTURE FOR: user_sub_menu
#

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (3, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (4, 3, 'Submenu Management', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (5, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-cog', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (7, 1, 'Backup Database', 'admin/backupDb', 'fas fa-fw fa-database', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (8, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1);


#
# TABLE STRUCTURE FOR: user_token
#

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

