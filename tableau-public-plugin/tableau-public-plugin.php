<?php
/*
Plugin Name: Tableau Public Plugin
Project URI: https://github.com/TheInformationLab/Tableau-Wordpress-Plugin
Description: The following code defines and registers a shortcode to embed a Tableau Public visualization via an iFrame.
Version: 2.0
Author: Craig Bloodworth, forked from https://github.com/maid0marion/Tableau-Wordpress-Plugin
License: GPL3

All js modifications from original published code are commented in ** ** tags

tableau.htm as been modified to reflect the cut down in parameters and rework for Tableau Public embeds

*/

// define shortcode parameters.
// ** Cut down from original code as most are depreciated **

function tableau_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
    'url' => 'https://public.tableau.com',
		'width' => '705px',
    'height' => '800px',
		'options' => array(
						'display_name' => 'tableau',
						'open_tag' => '\n[tableau]',
						'close_tag' => '[/tableau]\n',
						'key' => '')
    ), $atts));

//** Added showVizHome=no param **
	$output = "<iframe src='{$url}&:showVizHome=no width='{$width}' height='{$height}'></iframe>";
    return $output;
}

function tableau_addbuttons() {
   // Don't proceed if the current user lacks permissions
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
    	return;
	}

   // Add only in Visual Editor mode
	if ( get_user_option( 'rich_editing' ) == 'true' ) {
   		add_filter( 'mce_external_plugins', 'add_tableau_mce_plugin' );
     	add_filter( 'mce_buttons_2', 'register_tableau_button' );
	}
}

// register Tableau shortcode for both the HTML and Visual editors
add_shortcode( 'tableau', 'tableau_func');
add_shortcode( 'tableau-button', 'tableau_func' );
add_action( 'admin_footer', 'tableau_quicktag' );

// define parameters for Tableau shortcode in the Visual Editor
function tableau_quicktag() {
?>
	<script type="text/javascript" charset="utf-8">
		QTags.addButton( 'tableau-plugin', 'tableau', '\n[tableau url="" width="705px" height="800px"]', '[/tableau]\n' );
	</script>
<?php
}

function register_tableau_button( $buttons ) {
   array_push( $buttons, "|", "tableau" );
   return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js
function add_tableau_mce_plugin( $plugin_array ) {
   $plugin_array['tableau'] = plugin_dir_url(__FILE__) . 'tinymce/tableau/editor_plugin.js';
   return $plugin_array;
}

// init process for button control
function tableau_refresh_mce( $ver ) {
  $ver += 3;
  return $ver;
}

add_filter( 'tiny_mce_version', 'tableau_refresh_mce' );
add_action( 'init', 'tableau_addbuttons' );

?>
