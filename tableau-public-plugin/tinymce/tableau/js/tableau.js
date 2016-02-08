/**
 * $Id: editor_plugin_src.js  2012-06-21 maid0marion $
 *
 * @author maid0marion
 */

jQuery("form").submit(function mceInsertTableau($) {
	var inst = tinyMCEPopup.editor, dom = inst.dom;  (function mceInsertTableau($) {
		  var inst = tinyMCEPopup.editor, dom = inst.dom;
			//get form data
	    var embedURL = $("#embed_url").val();
			var width = jQuery.trim($("#width").val());
			if (width == "") {
				var w_unit = "";
			}
			else {
				var w_unit = $("#w_unit").val();
			}
	        var height = jQuery.trim($("#height").val());
			if (height == "") {
				var h_unit = "";
			}
			else {
				var h_unit = $("#h_unit").val();
			}

			//create shortcode
			// ** shortcode params cut down to URL, width & height **
	        var code =  '\n[tableau url="'+embedURL+'" width="'+width+''+w_unit+'" height="'+height+''+h_unit+'"][/tableau]\n';

	 tinyMCEPopup.execCommand('mceInsertContent', false, code);
	 tinyMCEPopup.close();



	}(jQuery));


});
function init() {
	tinyMCEPopup.resizeToInnerSize();

};
tinyMCEPopup.onInit.add(init);
