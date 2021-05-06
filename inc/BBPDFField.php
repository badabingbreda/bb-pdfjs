<?php
namespace BBPDFJS;

class BBPDFField {

    public function __construct() {

        add_action( 'fl_builder_custom_fields',         __CLASS__ . '::pdf_field', 1, 3 );
        add_action( 'wp_enqueue_scripts',               __CLASS__ . '::pdf_field_assets' );

    }
    
    /**
     * pdf_field
     *
     * @param  mixed $fields
     * @return void
     */
    public static function pdf_field( $fields ) {

        $fields[ 'pdfjs-pdf' ] = BBPDFJS_DIR . 'field/pdfjs-pdf-field.php';

        return $fields;
    }

            
    /**
     * pdf_field_assets
     *
     * @return void
     */
    public static function pdf_field_assets() {

        if ( !class_exists( 'FLBuilderModel' ) || !\FLBuilderModel::is_builder_active() ) return false;

        wp_enqueue_style( 'pdfjs-field', BBPDFJS_URL . 'css/pdfjs.css', array(), '' );
        wp_enqueue_script( 'pdfjs-field', BBPDFJS_URL . 'js/pdfjs.js', array(), '', true );
        
    }
        

}

function pdfjs_is_url( $input ) {
    $re = '/https:\/\/|http:\/\//';
    preg_match( $re, $input , $matches , PREG_OFFSET_CAPTURE, 0);
    
    return sizeof($matches) > 0;
    
}
