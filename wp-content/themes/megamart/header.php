<!DOCTYPE html>
<html <?php language_attributes();?>>
      <head>
            <meta charset="<?php bloginfo('charset');?>">
            <meta name="viewport" content="width=device-width">
            <title class="<?php the_title()?>"><?php the_title()?></title>
            <link href="<?php bloginfo( 'template_url' );?>/assets/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' );?>" />
            <?php wp_head(); ?>
      </head>
      <title><?php get_the_title()?></title>
<body <?php body_class(); ?>> 

<header class="site-header">
    <div class="header-top">
			<span>Welcome to worldwide Megamart!</span>
			<div class="header-top-right">
				<span>Deliver to 423651</span>
				<a href="#">Track your order</a>
				<a href="#">All Offers</a>
			</div>
	</div>
	<div class="header-main">
		<div class="container">
			<button class="menu-toggle"></button>
			<h1>MegaMart</h1>
			<div class="search-box">
				<input type="search" placeholder="Search essentials, groceries and more...">
				<button type="submit"></button>
			</div>
			<div class="header-main-right">
				<a href="#">Sign Up/Sign In</a>
				<a href="#">Cart</a>
			</div>
		</div>
	</div>
		<nav class="navigation">
            <div class="container">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'container' => false, // No container wrapping the ul
                            'menu_class' => 'dropdown',
                        )
                    );?>
                <!-- Repeat for other dropdowns -->
            </div>
        </nav>
</header>

<!--Logo to show in all pages  -->

<div class="container-fluid">