<?php
class Wmnl {
    private $haybase;
    private $themeOptions = array(
        "google-analytics-id" => array(
            "title" => "Google Analytics ID",
            "default" => "UA-8050986-14"
        ),
        "default-banner" => array(
            "title" => "URL to default banner (can be local)",
            "default" => "img/default-banner.jpg"
        ),
        "logo-url" => array(
            "title" => "URL to logo (can be local)",
            "default" => "img/logo.png"
        ),
        "bgcolor" => array(
            "title" => "Background color",
            "default" => "069"
        ),
        "bgimg" => array(
            "title" => "Background image (can be local)",
            "default" => "img/bg.jpg"
        ),
        "font" => array(
            "title" => "Font",
            "type" => "select",
            "data" => array(
                "vera-serif" => "Bitstream Vera Serif",
                "arial" => "Arial"
            ),
            "default" => "arial"
        ),
        "custom-css" => array(
            "title" => "Custom CSS",
            "type" => "textarea",
            "description" => "Use this only as a last resort, you shouldn't really be using this"
        ),
        "custom-js" => array(
            "title" => "Custom Javascript",
            "type" => "textarea",
            "description" => "Use this only as a last resort, you shouldn't really be using this"
        )
    );

    const BANNER_WIDTH = 810;
    const BANNER_HEIGHT = 150;
    const SLIDER_WIDTH = 710;
    const SLIDER_HEIGHT = 260;
    const POSTTHUMB_WIDTH = 200;
    const POSTTHUMB_HEIGHT = 200;

    function __construct($haybase) {
        $this->haybase = $haybase;

        $this->registerSidebars();

        add_theme_support('post-thumbnails');

    	// This theme uses wp_nav_menu()
    	add_theme_support('nav-menus');

    	$this->themePage();
    }

    private function registerSidebars() {
    	register_sidebar(array(
            'id' => 'sidebar',
            'name' => 'Sidebar',
            'before_widget' => '<div id="%1$s" class="box %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'id' => 'home',
            'name' => 'Home',
            'before_widget' => '<div id="%1$s" class="box %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'id' => 'home-sidebar',
            'name' => "Home sidebar",
            'before_widget' => '<div id="%1$s" class="box %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }

    private function themePage() {
        $this->haybase->newThemePage(array(
            "title" => "Edit WMNL Theme",
            "options" => $this->themeOptions
        ));
    }


    public function slider() {
        $slider = new NiceSlide(array(
            "category" => "featured",
            "width" => self::SLIDER_WIDTH,
            "height" => self::SLIDER_HEIGHT
        ));
        $slider->show();
    }

    public function logo() {
        echo $this->haybase->rewriteExternalFile(
            $this->haybase->getThemeOption("logo-url")
        );
    }

    public function banner() {
        global $post;
        $custom = get_post_custom($post->ID);

        if ($custom['banner']) {
            $img = $custom['banner'][0];
        } else {
            $img = $this->haybase->getThemeOption("default-banner");
        }

        $img = $this->haybase->rewriteExternalFile($img);
        echo $this->haybase->getResizeUrl($img, self::BANNER_WIDTH, self::BANNER_HEIGHT);
    }

    public function postthumb() {
        $img = $this->haybase->getPostThumbResized($post->ID, self::POSTTHUMB_WIDTH, self::POSTTHUMB_HEIGHT);
        if (!$img) return;

        echo $this->haybase->parseTemplate(
            $this->haybase->getTheme() . "/templates/postthumb.html", array(
                "img" => $img
            )
        );
    }

    public function rewrittenThemeOption($id) {
        echo $this->haybase->rewriteExternalFile(
            $this->haybase->getThemeOption('bgimg')
        );
    }

    public function menu() {
        wp_list_pages("sort_column=menu_order&title_li=&exclude=15&depth=1");
    }
}