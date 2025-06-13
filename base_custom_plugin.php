<?php
/**
 * [Plugin Name]
 *
 * @package           [PluginPackage]
 * @author            [Author Name]
 * @copyright         [Year] [Author Name or Company Name]
 * @license           [License Identifier]
 *
 * @wordpress-plugin
 * Plugin Name:       [Plugin Name]
 * Plugin URI:        [https://example.com/plugin-name]
 * Description:       [Description of the plugin.]
 * Version:           [1.0.0]
 * Requires at least: [5.2]
 * Requires PHP:      [7.2]
 * Author:            [Author Name]
 * Author URI:        [https://example.com]
 * Text Domain:       [plugin-slug]
 * License:           [GPL v2 or later]
 * License URI:       [http://www.gnu.org/licenses/gpl-2.0.txt]
 * Update URI:        [https://example.com/my-plugin/]
 * Requires Plugins:  [my-plugin, yet-another-plugin]
 *
 */
	
	defined('ABSPATH') || exit;
	
	// Define constants
	define( 'BASIC_CUSTOM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	define( 'BASIC_CUSTOM_URL', plugin_dir_url( __FILE__ ) );
   
	$plugin_content = "Plugin could not be loaded properly";
	
	// Include basic display logic
	require_once plugin_dir_path(__FILE__) . 'includes/basic-display.php';

	function base_custom_install() {
		
	};
	
	function base_custom_deactivate() {
		
	};

	function register_basic_block() {
		register_block_type(__DIR__ . '/blocks/basic_block', [
			'render_callback' => 'render_basic_custom_shortcode'
		]);
	}
	
	function render_basic_custom_shortcode($atts) {
		$atts = shortcode_atts([
			'zoom' => 10,
			'height' => '400px'
		], $atts, 'basic_custom_plugin');

		$html = '<div class="basic-shortcode" style="height:' . esc_attr($atts['height']) . ';">';
		$html .= apply_filters('basic_shortcode_html', '<!-- Something Here -->', $atts);
		$html .= '</div>';

		return $html;
	}

	function base_custom_load_admin_files() {
		wp_register_script( 'base_custom_jquery', plugins_url('/admin/js/base_custom.js', __FILE__), array('jquery'));
		
		wp_enqueue_script( 'base_custom_jquery' );
		
		
		wp_register_style( 'base_custom_css', plugins_url('/admin/css/base_custom.css', __FILE__));
		
		wp_enqueue_style( 'base_custom_css' );
		
	};
	
	// Activation/Deactivation Hooks
	register_activation_hook( __FILE__, 'base_custom_install' );
	register_deactivation_hook( __FILE__, 'base_custom_deactivate' );
	
	//Init Actions
	add_action('init', 'register_basic_block');	
	add_action('wp_enqueue_scripts', 'base_custom_load_admin_files');	
		
	//Register Blocks
	add_action('init', function() {
		register_block_type(__DIR__ . '/blocks/basic_block');
	});
	
	//Register Shortcodes
	add_shortcode('basic_custom_plugin', 'render_basic_custom_shortcode');
?>