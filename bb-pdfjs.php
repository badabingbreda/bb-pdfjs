<?php
/**
 * BB PDFJS
 *
 * @package     bb-pdfjs
 * @author      Badabingbreda
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: BB PDFJS
 * Plugin URI:  https://www.badabing.nl
 * Description: PDFJS Shortcode injector for Beaver Builder. Adds a module with which you can add PDF files. Needs PDF.js Viewer plugin.
 * Version:     1.1.0
 * Author:      Badabingbreda
 * Author URI:  https://www.badabing.nl
 * Text Domain: bb-pdfjs
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
namespace BBPDFJS;
use BBPDFJS\BBPDFField;
use BBPDFJS\GithubUpdater;

define( 'BBPDFJS_VERSION', '1.1.0' );
define( 'BBPDFJS_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBPDFJS_FILE', __FILE__ );
define( 'BBPDFJS_URL', plugins_url( '/', __FILE__ ) );

// we need this now to update the plugin
require_once( 'inc/GithubUpdater.php' );

add_action( 'init' , __NAMESPACE__ . '\add_bb_modules' );

/**
 * add_bb_modules
 *
 * @return void
 */
function add_bb_modules() {

    // bail if Beaver Builder isn't activated
    if (!class_exists( 'FLBuilder' ) ) return;

    // bail if pdfjs_handler does not exist; This function is used in the pdfjs plugin
    if (!function_exists( 'pdfjs_handler' )) return;

    // finally, enqueue/require the file that will register the Beaver Builder Module
    require_once( 'modules/pdfjs/pdfjs.php' );
    require_once( 'inc/BBPDFField.php' );
    new BBPDFField();
}

// updater for the Github Repo
$updater = new GithubUpdater( BBPDFJS_FILE );
$updater->set_username( 'badabingbreda' );
$updater->set_repository( 'bb-pdfjs' );
$updater->set_settings( array(
			'requires'			=> '4.6',
			'tested'			=> '5.7.0',
			'rating'			=> '100.0',
			'num_ratings'		=> '10',
			'downloaded'		=> '10',
			'added'				=> '2021-04-28',
		) );
$updater->initialize();