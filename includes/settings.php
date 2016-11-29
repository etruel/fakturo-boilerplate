<?php
/** 
 *  @package WPeMatico boilerplate
 *	functions to add a tab with custom options in wpematico settings 
**/

if ( !defined('ABSPATH') ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
class boilerplate_page_extension {

	public static function hooks() {
		add_action('admin_menu', array(__CLASS__, 'admin_menu'), 99);
		add_filter( 'ftkr_tabs_sections', array(__CLASS__, 'settings_tab' ), 1 );
	}
	 /**
         * Add settings
         *
         * @access      public
         * @since       1.0.0
         * @param       array $settings The existing EDD settings array
         * @return      array The modified EDD settings array
    */
    public static function settings_tab( $tabs ) {
        if (!isset( $tabs['extensions'])) {
            $tabs['extensions'] = array();
        }
        if (!isset( $tabs['extensions']['boilerplate'])) {
           	$tabs['extensions']['boilerplate'] = array('text' => __( 'Boilerplate', BOILERPLATE_TEXT_DOMAIN ), 'url' => admin_url('admin.php?page=boilerplate-extension-page'), 'screen' => 'admin_page_boilerplate-extension-page');
        }
        if (!isset( $tabs['extensions']['default'])) {
           	$tabs['extensions']['default'] = array('text' => __( 'Extensions', FAKTURO_TEXT_DOMAIN ), 'url' => '', 'screen' => '');
        }
        if (empty($tabs['extensions']['default']['screen']) && empty($tabs['extensions']['default']['url'])) {
           	$tabs['extensions']['default'] = array('text' => __( 'Extensions', FAKTURO_TEXT_DOMAIN ), 'url' => admin_url('admin.php?page=boilerplate-extension-page'), 'screen' => 'admin_page_boilerplate-extension-page');
        }
        return $tabs;
    }	
	public static function admin_menu() {
		$page = add_submenu_page(
			null,
			__( 'Settings', BOILERPLATE_TEXT_DOMAIN ), 
			__( 'Settings', BOILERPLATE_TEXT_DOMAIN ), 
			'edit_fakturo_settings', 
			'boilerplate-extension-page',
			array(__CLASS__,'page'), 
			'dashicons-tickets', 27 
			);	
	}

	public static function page() {
		global $current_screen;
		echo '<div id="tab_container">
			<br/>
			<h1>'.__( 'Boilerplate Settings', BOILERPLATE_TEXT_DOMAIN ).'</h1>

		</div>';
	}
}
boilerplate_page_extension::hooks();
?>