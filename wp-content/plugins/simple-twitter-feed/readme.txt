=== Plugin Name ===
Contributors: CrowderSoup
Donate link: http://aaroncrowder.com/
Tags: twitter, simple
Requires at least: 3.4
Tested up to: 3.4.2
Stable tag: 0.5.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple WordPress plugin that allows you to display your latest tweets in a widget.

== Description ==

This plugin was created out of a desire for a more simple Twitter plugin. It handles all the heavy lifting of getting the tweets, parsing them, and adding links where appropriate. However, it make no assumptions regarding style. It outputs everything in an unordered list and requires that you apply your own styles via your theme.

This plugin is aimed at developers. However, most themes (including the default WordPress theme) default styles work great.

Requirements:  
* WordPress 3.4 or later  
* cURL must be installed on your server  
* A Twitter account  

== Installation ==

1. Install and activate the plugin
2. Add the sidebar widget to one of your widget areas
3. Enter a title and your twitter handle (username) and click save
4. [OPTIONAL] Apply custom styles
5. YOU'RE DONE!

== Frequently Asked Questions ==

= Do I need a Twitter account to use this plugin? =

Yes.

= What if I don't have cURL installed? =

If you are able, you can install cURL your server. Otherwise talk to your system administrator so they can do it for you.

== Screenshots ==

1. The plugin in action without any custom styling in the WordPress 2011 theme.
2. This is the pluging widget configuration

== Changelog ==

= 0.1 =
* This is the first version of the plugin. Many changes will come, but this is the first viable product.

= 0.2 =
* This release adds caching of the twitter feed to make sure that we don't make too many requests to the API

= 0.3 =
* Patched the chaching mechanism to make sure it works on all systems

= 0.4 =
* Changed the caching meachanism to use Transients.

= 0.5 =
* Added field that will allow users to specify how many tweets they want to display

= 0.5 =
* Added a new field that will allow users to specify how long to keep the cache for, in case they want to refresh it more often.  
* Made it possible to have widgets for more than one twitter user

== Upgrade Notice ==

= 0.3 =
The caching mechanism was pathed to work on all systems.

= 0.4 =
The caching mechanism was updated to be more portable and work on all systems.

= 0.5 =
A new field was added that allows you to specify how many tweets you want to display

= 0.5.1 =
A new field was added that will allow you to specify how long you want to keep the cache for. You may now also have widgets for more than one twitter account.
