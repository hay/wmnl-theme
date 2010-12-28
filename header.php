<?php global $T; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php $T->style(); ?>/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php $T->style(); ?>/css/style.css" />
    <!--[if lt IE 7]>
    <![endif]-->

    <?php wp_head(); ?>
    <script type="text/javascript" src="<?php $T->style(); ?>/js/javascript.js"></script>
    <?php require 'wmnlnav.php'; ?>
</head>
<body>
    <div id="wrapper">
        <div id="wmnl-nav" style="height: 25px; background: #909090; width:980px;"></div>

        <div id="header">
            <a class="logo" href="<?php $T->home(); ?>" title="Ga terug naar de homepage">
                <img id="logo" src="<?php $T->style(); ?>/img/logo.png" alt="Logo" />
            </a>

            <img class="banner" src="<?php $T->banner(); ?>" alt="" />
        </div> <!-- #header -->

        <div id="nav">
            <?php wp_nav_menu(array(
                    'sort_column' => 'menu_order',
                    'container_class' => 'menu-header'
            )); ?>
        </div> <!-- #nav -->