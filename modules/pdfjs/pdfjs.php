<?php
class BBPDFJS extends FLBuilderModule {

  public function __construct()
  {
    parent::__construct(array(
      'name'            => __( 'PDF Viewer', 'bb-pdfjs' ),
      'description'     => __( 'PDF Viewer', 'bb-pdfjs' ),
      'category'        => __( 'Media', 'bb-pdfjs' ),      
      'dir'             => BBPDFJS_DIR . 'modules/pdfjs/',
      'url'             => BBPDFJS_URL . 'modules/pdfjs/',
      'icon'            => 'button.svg',
      'editor_export'   => true, // Defaults to true and can be omitted.
      'enabled'         => true, // Defaults to true and can be omitted.
      'partial_refresh' => false, // Defaults to false and can be omitted.
    ));
  }
}

FLBuilder::register_module( 'BBPDFJS', array(
  'general'      => array(
      'title'         => __( 'General', 'bb-pdfjs' ),
      'sections'      => array(
          'pdfviewer'  => array(
              'title'         => __( 'PDF Viewer', 'bb-pdfjs' ),
              'fields'        => array(
                'pdf' => array(
                  'type'          => 'pdfjs-pdf',
                  'label'         => __( 'Select PDF File', 'bb-pdfjs' ),
                  'connections' => array( 'custom_field' ),
                ),
            )
          ),
          'viewersettings'  => array(
            'title'         => __( 'Settings', 'bb-pdfjs' ),
            'fields'        => array(
                'viewer_width' => array(
                  'type'         => 'unit',
                  'label'        => 'Viewer Width',
                  'units'          => array( 'px', '%' ),
                  'default_unit' => '%', // Optional
                  'preview'    => false
                ),
                'viewer_height' => array(
                    'type'         => 'unit',
                    'label'        => 'Viewer Height',
                    'units'          => array( 'px' ),
                    'default_unit' => 'px', // Optional
                    'preview'    => false
                ),
                'fullscreen' => array(
                  'type'          => 'select',
                  'label'         => __( 'Enable Fullscreen?', 'bb-pdfjs' ),
                  'default'       => 'true',
                  'options'       => array(
                    'true'      => __( 'True', 'bb-pdfjs' ),
                    'false'      => __( 'False', 'bb-pdfjs' )
                  ),
                  'toggle'  => array(
                    'false' => array(),
                    'true'  => array(
                        'fields' => array( 'fullscreen_target', 'fullscreen_text' ),
                    )  
                  )
                ),
                'fullscreen_target' => array(
                  'type'          => 'select',
                  'label'         => __( 'Open in New Tab?', 'bb-pdfjs' ),
                  'default'       => 'false',
                  'options'       => array(
                    'true'      => __( 'True', 'bb-pdfjs' ),
                    'false'      => __( 'False', 'bb-pdfjs' )
                  ),
                ),
                'fullscreen_text' => array(
                  'type'          => 'text',
                  'label'         => __( 'Fullscreen link text', 'bb-pdfjs' ),
                  'default'       => 'View Fullscreen',
                  'size'          => '35',
                  'placeholder'   => __( 'Please enter a fullscreen link text', 'bb-pdfjs' ),
                ),
                'download' => array(
                    'type'          => 'select',
                    'label'         => __( 'Enable Download?', 'bb-pdfjs' ),
                    'default'       => 'false',
                    'options'       => array(
                      'true'      => __( 'True', 'bb-pdfjs' ),
                      'false'      => __( 'False', 'bb-pdfjs' )
                    ),
                ),
                'print' => array(
                    'type'          => 'select',
                    'label'         => __( 'Enable Print?', 'bb-pdfjs' ),
                    'default'       => 'true',
                    'options'       => array(
                      'true'      => __( 'True', 'bb-pdfjs' ),
                      'false'      => __( 'False', 'bb-pdfjs' )
                    ),
                ),
            )
        )

      )
  )
) );