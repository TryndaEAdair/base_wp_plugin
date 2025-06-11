<?php
defined('ABSPATH') || exit;

/**
 * Render callback for Mass Map Block.
 */
function render_basic_block($attributes = [], $content = '') {
    ob_start();
    ?>
    <div id="basic-block-placeholder" style="height: 500px;"></div>
    <script>
        // Placeholder
        document.addEventListener('DOMContentLoaded', function () {
            
        });
    </script>
    <?php
    return ob_get_clean();
}

