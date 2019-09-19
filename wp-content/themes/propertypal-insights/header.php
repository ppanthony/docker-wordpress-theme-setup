<!doctype html>
<html class="no-js" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-itunes-app" content="app-id=583325320">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sidebar.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/author.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/categories.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pagination.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/base.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/post.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/file-not-found.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/general.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/file-not-found.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<?php if(isStudentPage()) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/student.css" type="text/css">
<?php } ?>
<?php if(is_front_page()) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/category-box.css" type="text/css">
<?php } ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/print.css" type="text/css" media="print">

<link rel="apple-touch-icon" href="https://static.ppcdn.co.uk/22552128112018/assets/img/apple-touch-icon.png" />
<link rel="shortcut icon" href="https://www.propertypal.com/favicon.ico" type="image/x-icon"/>
<link rel="icon" href="https://static.ppcdn.co.uk/22552128112018/assets/img/favicon.gif" type="image/gif" />
<link rel="icon" href="https://static.ppcdn.co.uk/22552128112018/assets/img/favicon-16x16.png" type="image/png" sizes="16x16" />
<link rel="icon" href="https://static.ppcdn.co.uk/22552128112018/assets/img/favicon-32x32.png" type="image/png" sizes="32x32" />
<link rel="mask-icon" href="https://static.ppcdn.co.uk/22552128112018/assets/img/safari-pinned-tab.svg" color="#ee4900" />

<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<!--[if IE 8]>
<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

wp_head();
?>
</head>

<!--[if lt IE 7]>      <body <?php body_class('lt-ie10 lt-ie9 lt-ie8 lt-ie7'); ?>> <![endif]-->
<!--[if IE 7]>         <body <?php body_class('lt-ie10 lt-ie9 lt-ie8'); ?>> <![endif]-->
<!--[if IE 8]>         <body <?php body_class('lt-ie10 lt-ie9'); ?>> <![endif]-->
<!--[if IE 9]>         <body <?php body_class('lt-ie10'); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <body <?php body_class(); ?>> <!--<![endif]-->

<!--[if lt IE 8]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="page-wrapper">
	<div id="page-canvas">

		<header id="header" class="hidden-print">
			<?php
			require_once('navigation.php');

			if(!is_404()) :
				require_once('pgheader.php');
			endif;

			?>
		</header>

		<article id="body">
			<div id="page">
