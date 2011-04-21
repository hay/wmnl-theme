<?php global $T, $WMNL; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="/feed" />
    <link rel="stylesheet" href="<?php $T->style(); ?>/css/reset.css" />
    <link rel="stylesheet" href="<?php $T->style(); ?>/css/style.css" />
    <!--[if lt IE 7]>
    <![endif]-->

    <?php // Load possible extra fonts
        if ($T->getThemeOption("font") != "arial") {
            $T->loadStylesheets("/css/" . $T->getThemeOption("font") . ".css");
        }
    ?>

    <?php /* Options from the theme page */ ?>
    <style>
        html, body {
            background-color: #<?php $T->themeOption('bgcolor'); ?>;
            <?php if ($T->getThemeOption('bgimg')): ?>
                background-image: url('<?php $WMNL->rewrittenThemeOption('bgimg'); ?>');
            <?php endif; ?>
        }
    </style>
    
    <?php if ($T->getThemeOption("custom-css")) : ?>
        <style>
            <?php $T->themeOption("custom-css"); ?>
        </style>
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body>
    <div id="wrapper">
        <div id="wmnl-nav" style="height: 25px; background: #909090; width:980px;"></div>

        <div id="header">
            <a class="logo" href="<?php $T->home(); ?>" title="Ga terug naar de homepage">
                <img id="logo" src="<?php $WMNL->logo(); ?>" alt="Logo" />
            </a>

            <img class="banner" src="<?php $WMNL->banner(); ?>" alt="" />
        </div> <!-- #header -->

        <div id="nav">
            <?php wp_nav_menu(array(
                    'sort_column' => 'menu_order',
                    'container_class' => 'menu-header'
            )); ?>
        </div> <!-- #nav -->