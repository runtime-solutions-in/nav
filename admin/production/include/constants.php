<?php

   if(!defined('DOMAIN_NAME')) define('DOMAIN_NAME', 'Tata Xenon');
   if(!defined('HOST')) define('HOST', 'http://'.$_SERVER['HTTP_HOST']);
   if(!defined('DOMAIN_PATH')) define('DOMAIN_PATH', HOST);
   if(!defined('IMG_UPLOAD_DIR')) define('IMG_UPLOAD_DIR', '');
   if(!defined('IMG_DISPLAY_DIR')) define('IMG_DISPLAY_DIR', DOMAIN_PATH.'/');
   if(!defined('CMS_PATH')) define('CMS_PATH', DOMAIN_PATH.'admin/');
   if(!defined('REQUIRED_TAG')) define('REQUIRED_TAG', '<span class="required text-danger">*</span>');

	
?>