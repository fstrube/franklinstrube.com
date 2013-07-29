<?php
/**
 * Copyright 2013 Franklin P. Strube
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700" type="text/css" /> -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700|Yanone+Kaffeesatz:400,700,300" type="text/css" />
        <link rel="stylesheet" href="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/css/prism-custom.css">
        <link rel="stylesheet" href="<?php echo parse_url(get_stylesheet_uri(), PHP_URL_PATH); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <script src="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <?php wp_head() ?>
    </head>
    <body ontouchstart="" <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="header">
            <header>
                <h1><a href="<?php bloginfo('url'); ?>">#!/bin/<span>strube</span></a></h1>
                <nav role="navigation">
                    <button class="toggle-navigation">Show Navigation</button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'navigation' ) ); ?>
                </nav>
            </header>
        </div>
        <div class="wrapper">
