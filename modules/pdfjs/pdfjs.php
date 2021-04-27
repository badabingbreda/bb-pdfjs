<?php
class BBPDFJS extends FLBuilderModule {

  public function __construct()
  {
    parent::__construct(array(
      'name'            => __( 'PDF Viewer', 'fl-builder' ),
      'description'     => __( 'PDF Viewer', 'fl-builder' ),
      'category'        => __( 'Media', 'fl-builder' ),      
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
      'title'         => __( 'General', 'fl-builder' ),
      'sections'      => array(
          'pdfviewer'  => array(
              'title'         => __( 'PDF Viewer', 'fl-builder' ),
              'fields'        => array(
                'pdf' => array(
                  'type'          => 'pdfjs-pdf',
                  'label'         => __( 'Select PDF File', 'textdomain' ),
                ),
            )
          ),
          'viewersettings'  => array(
            'title'         => __( 'Settings', 'fl-builder' ),
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
                  'label'         => __( 'Enable Fullscreen?', 'fl-builder' ),
                  'default'       => 'true',
                  'options'       => array(
                    'true'      => __( 'True', 'fl-builder' ),
                    'false'      => __( 'False', 'fl-builder' )
                  ),
                ),
                'download' => array(
                    'type'          => 'select',
                    'label'         => __( 'Enable Download?', 'fl-builder' ),
                    'default'       => 'false',
                    'options'       => array(
                      'true'      => __( 'True', 'fl-builder' ),
                      'false'      => __( 'False', 'fl-builder' )
                    ),
                ),
                'print' => array(
                    'type'          => 'select',
                    'label'         => __( 'Enable Print?', 'fl-builder' ),
                    'default'       => 'true',
                    'options'       => array(
                      'true'      => __( 'True', 'fl-builder' ),
                      'false'      => __( 'False', 'fl-builder' )
                    ),
                ),
            )
        )

      )
  )
) );