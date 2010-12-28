<?php
$T = new WMNL();

class WMNL {
    const BANNER_WIDTH = 810;
    const BANNER_HEIGHT = 150;
    const SLIDER_WIDTH = 710;
    const SLIDER_HEIGHT = 260;
    const POSTTHUMB_WIDTH = 200;
    const POSTTHUMB_HEIGHT = 200;

    function __construct() {
        // Do all initialization stuff
        wp_enqueue_script('jquery');

        $this->registerSidebars();

        add_action("wp_head", array($this, "addPageProperties"));

        add_theme_support('post-thumbnails');

    	// This theme uses wp_nav_menu()
    	add_theme_support('nav-menus');
        wp_enqueue_script("jquery");    	
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

    public function slider() {
        $slider = new NiceSlide(array(
            "category" => "featured",
            "width" => self::SLIDER_WIDTH,
            "height" => self::SLIDER_HEIGHT
        ));
        $slider->show();
    }

    public function banner() {
        // Look for the 'banner' custom key and use that
        // Local in the img/headers folder if it doesn't have a 'http' prefix
        // else remote, or the default image if no key is found
        global $post;
        $custom = get_post_custom($post->ID);
        if ($custom['banner']) {
            $img = $custom['banner'][0];
            if (strpos($img, "http://") === false) {
                $img = $this->getTheme() . "/img/headers/$img";
            }
        } else {
            $img = $this->getTheme() . "/img/headers/default.jpg";
        }
        echo $this->resize($img, self::BANNER_WIDTH, self::BANNER_HEIGHT);
    }

    private function resize($src, $width, $height, $zc = "1") {
        return sprintf($this->getTheme() . "/img/timthumb.php?src=%s&w=%s&h=%s&zc=%s",
            $src, $width, $height, $zc
        );
    }

    public function addPageProperties() {
        echo $this->parseTemplate("wmnl.js", array(
            "isLocal" => ($this->isLocal()) ? "true" : "false"
        ), true);
    }

    public function postthumb() {
        $thumbid = get_post_thumbnail_id($post->ID);
        $img = wp_get_attachment_image_src($thumbid, $size);
        if (!$img) return;
        echo $this->parseTemplate(
            $this->theme(false) . "/templates/postthumb.html", array(
                "img" => $this->resize($img[0], self::POSTTHUMB_WIDTH, self::POSTTHUMB_HEIGHT)
            )
        );
    }

    private function getTheme() {
        return get_bloginfo('template_directory');
    }

    public function isLocal() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $myips = array("localhost", "127.0.0.1", "::1");
        return in_array($ip, $myips);
    }

    public function theme($echo = true) {
        if($echo) {
            bloginfo('template_directory');
        } else {
            return get_bloginfo('template_directory');
        }
    }

    public function style($echo = true) {
        if($echo) {
            echo bloginfo('stylesheet_directory');
        } else {
            return bloginfo('stylesheet_directory');
        }
    }

    public function home($echo = true) {
        if($echo) {
            echo bloginfo('url');
        } else {
            return get_bloginfo('url');
        }
    }

    public function menu() {
        wp_list_pages("sort_column=menu_order&title_li=&exclude=15&depth=1");
    }

    private function parseTemplate($file, $options) {
        $template = @file_get_contents($file);
        if (!$template) {
            return false;
        }

        preg_match_all("!\{([^{]*)\}!", $template, $matches);

        $replacements = array();
        for ($i = 0; $i < count($matches[1]); $i++) {
            $key = $matches[1][$i];
            if (isset($options[$key])) {
                $val = $matches[0][$i];
                $template = str_replace($val, $options[$key], $template);
            }
        }

        return $template;
    }
}
?>