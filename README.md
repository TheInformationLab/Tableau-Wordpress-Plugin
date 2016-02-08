Tableau Plugin
==============
*Contributors:* Julie Repass (maid0marion), Craig Bloodworth (The Information Lab)
*Tags:* shortcode, embed, tableau
*Tested versions:* 4.4.2
*Tested up to:* 4.4.2

Description
===========
Php Shortcode to embed a Tableau Public Viz in a Wordpress page via an iFrame. Plus a shortcode button added to both the HTML and Visual editor.

Installation
============
1. Upload the 'tableau-public-plugin' folder to the directory used to store plugins (default is `/wp-content/plugins/`)
2. Activate the plugin through the 'Plugins' menu in WordPress

Uninstallation
==============
1. Remove the 'tableau-public-plugin' folder from the plugins directory in your Wordpress installation (default is `/wp-content/plugins/`).

Using the Plugin
================
The plugin adds a button to both the Visual and HTML editors to insert short code for embedding an interactive Tableau Server view.

Frequently Asked Questions
==========================

1. *Why use an iFrame rather than the Javascript code generated from the "Share" button on Tableau Server?*
When trying to embed a Tableau Server view in a Wordpress post, the Javascript embed code would work only
occasionally.  Using the iFrame option consistently displayed the embedded Tableau Server view when viewing
the published post in different browsers.
