<?php

$viewer_width = '';
$viewer_height = '';
$fullscreen_target = '';
$fullscreen_text = '';


function pdfjs_is_url( $input ) {
    $re = '/https:\/\/|http:\/\//';
    preg_match( $re, $input , $matches , PREG_OFFSET_CAPTURE, 0);
    
    return sizeof($matches) > 0;
    
    
}

if ( $settings->pdf ) {
    
    if ($settings->viewer_width) {
        $viewer_width = " viewer_width=" . $settings->viewer_width . $settings->viewer_width_unit;
    }

    if ($settings->viewer_height) {
        $viewer_height = " viewer_height=" . $settings->viewer_height . $settings->viewer_height_unit;
    }

    if($settings->fullscreen == 'true') {

        $fullscreen_target = " fullscreen_target=" . $settings->fullscreen_target;
        $fullscreen_text = " fullscreen_text=" . preg_replace( [ '/ /' ] , [ '%20' ] , $settings->fullscreen_text );
    }

    // test if $settings->pdf returns a URL; if not, assume that it's a media-ID
    if ( pdfjs_is_url( $settings->pdf ) ) {
        $pdffile = $settings->pdf;
    } else {
        $pdffile =  wp_get_attachment_url( $settings->pdf);
    }

    echo "[pdfjs-viewer url={$pdffile} {$viewer_width}{$viewer_height} fullscreen={$settings->fullscreen}{$fullscreen_target}{$fullscreen_text} download={$settings->download} print={$settings->print}]";
} else {
    printf( "<p>%s</p>" , __( 'Please select a PDF file', 'bb-pdfjs' ));
}
