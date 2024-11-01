=== warcraftfeed ===
Contributors: etftw
Donate link: http://www.etftw.co.uk/donate
Tags: widget, world, of, warcraft, jsonp, jquery, feed, achievement, achievements
Requires at least: 2.9
Tested up to: 3.1
Stable tag: trunk


A fast and robust plugin for displaying your latest World of Warcraft achievements and character information on your blog.

== Description ==
The warcraftfeed plugin let's you display your latest World of Warcraft achievements and character information in the sidebar of your blog, in a manner which will not disrupt the rest of your blog loading like many other plugins.


== Installation ==

1. Unzip the zip file and upload the entire folder to wp-content/plugins.
2. Activate the plugin through the 'Plugins' menu in WordPress

= Widget Enabled Themes = 
* Go To The Widget Screen Under Appearance. 
* Add the warcraftfeed Widget.
* Fill in the required information about your character
* Save your changes


= Non Widget Enabled Themes =
* Add a reference to jQuery 1.4.4 in your head tags (http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js)
* Add a reference to jquery.warcfraftfeed.js in your head tags
* Add The following HTML to your sidebar, ensuring to enter the realm name as it appears in the URL of your armory page
* <pre>
	&lt;script type="text/javascript"&gt;

		var $wfj = jQuery.noConflict();

		$wfj(function(){
		$wfj('#warcraftfeed_content).warcraftfeed({
			characterName: 'yourCharacterName',
			realmName: 'realm-name',
			region: 'eu or us',
			includeGeneralInformation: true,
			includeLatestAchievements: true

			});
		});
	&lt;/script&gt;

	&lt;div id="warcraftfeed_content"&gt;&lt;/div&gt; 
</pre>

== Changelog ==
= 1.0.1 =
* Fixed the region selector in the plugin configuration to reflect the saved region
= 1.0.0 =
* Initial release

== Upgrade Notice ==
= 1.0.1 =
* Fixed the region selector in the plugin configuration to reflect the saved region
= 1.0.0 =
* Initial release

== Screenshots ==
1. View of the widget in use.

