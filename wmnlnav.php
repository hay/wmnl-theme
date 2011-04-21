<!-- WMNL Central navigation -->
<?php
if ($T->isLocal()) {
    $base = "http://localhost/wmnl/trunk/global.wmnederland.nl/nav/v1";
    $phpurl = "'" . $base . "/nav.php?callback=?'";
} else {
    $base = "http://global.wmnederland.nl/nav/v1";
    $phpurl = "";
}
$jsurl = $base . "/nav.js";
?>
<script>
(function() {
    var url = '<?php echo $jsurl; ?>';
    document.write('<script type="text/javascript" src="' + url + '"></' + 'script>');

    function init() {
        if (typeof WMNL_NAV === "undefined") {
            setTimeout(init, 20);
            return;
        }

        WMNL_NAV(<?php echo $phpurl; ?>);
    }

    init();
})();
</script>
<!-- /WMNL Central nav -->