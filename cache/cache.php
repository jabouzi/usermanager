<?php    
    function get_include_contents($filename) {
        if (is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }

    file_put_contents("cached_file.php", get_include_contents("template.php"));

?>
