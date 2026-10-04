ALTER TABLE `tbl_gallery_category`
  ADD COLUMN `isactive` tinyint(1) NOT NULL DEFAULT '1' AFTER `name`,
  ADD COLUMN `sort_order` int unsigned NOT NULL DEFAULT '0' AFTER `isactive`;
