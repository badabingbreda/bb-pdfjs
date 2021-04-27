<?php

$viewer_width = '';
$viewer_height = '';

if ( $settings->pdf ) {
    
    if ($settings->viewer_width) {
        $viewer_width = "viewer_width=" . $settings->viewer_width . $settings->viewer_width_unit;
    }

    if ($settings->viewer_height) {
        $viewer_height = "viewer_height=" . $settings->viewer_height . $settings->viewer_height_unit;
    }


    echo "[pdfjs-viewer url=" . wp_get_attachment_url( $settings->pdf) . " {$viewer_width} {$viewer_height} fullscreen={$settings->fullscreen} download={$settings->download} print={$settings->print}]";
} else {
    echo "<p>Please select a PDF file</p>";
}
