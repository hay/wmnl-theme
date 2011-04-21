<?php
require_once 'inc/class-wmnl.php';

// Initialize the Haybase object
if (class_exists('HaybaseTheme')) {
    $T = new HaybaseTheme();
} else {
    wp_die(
        'The Haybase plugin is disabled, but it is necessary for this theme. ' .
        'I suggest you switch to a default theme, re-enable the plugin ' .
        'and try again.'
    );
}

if (class_exists('Wmnl')) {
    $WMNL = new Wmnl($T);
}
?>
