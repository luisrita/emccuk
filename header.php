<?php

	

	function is_tree($pid) 

	{

		global $post;         // load details about this page

		

		$grandparent = get_post($post->post_parent);

		

		if(is_page() && ($grandparent->post_parent == $pid || $post->post_parent == $pid || $post->ID == $pid) )

			return true;   // we're at the page or at a sub page

		else

			return false;  // we're elsewhere

	}

	

	$page = get_post($post->ID);

	$parent_id  = $page->post_parent;

	global $depth;

	$depth = 0;

	while ($parent_id > 0) 

	{

		$page = get_page($parent_id);

		$parent_id = $page->post_parent;

		$depth++;

	}

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>EMCC UK</title>

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url');?>/wp-content/themes/emcc/images/favicon.ico" />

<link rel="stylesheet" href="<?php bloginfo('url');?>/wp-content/themes/emcc/css/divPos.css" type="text/css" />

<link rel="stylesheet" href="<?php bloginfo('url');?>/wp-content/themes/emcc/css/styles.css" type="text/css" />

<link rel="stylesheet" href="<?php bloginfo('url');?>/wp-content/themes/emcc/css/med.css" type="text/css" media="print" />

<link rel="stylesheet" href="<?php bloginfo('url');?>/wp-content/themes/emcc/css/large.css" type="text/css" media="print" />

<link rel="stylesheet" href="<?php bloginfo('url');?>/wp-content/themes/emcc/css/small.css" type="text/css" id="fontsize" />

<script type="text/javascript" src="<?php bloginfo('url');?>/wp-content/themes/emcc/js/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('url');?>/wp-content/themes/emcc/js/site-functions.js"></script>

<script type="text/javascript" src="<?php bloginfo('url');?>/wp-content/themes/emcc/js/cufon-yui.js"></script>

<script type="text/javascript" src="<?php bloginfo('url');?>/wp-content/themes/emcc/js/Myriad_Pro_italic_700.font.js"></script>

<?php if($post->ID == 7) { ?>

<script type="text/javascript" src="<?php bloginfo('url');?>/wp-content/themes/emcc/js/slider.js"></script>

<?php } ?>

<?php wp_head(); ?>

</head>