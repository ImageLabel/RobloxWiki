<?php
#session_save_path ("/var/www/html/mediawiki-1.21.3/php_sessions");
ini_set('memory_limit', '750M');
include('extensions/GeshiCodeTag.php');

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/includes/profiler", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "$IP/includes/DefaultSettings.php" );

# If PHP's memory limit is very low, some operations may fail.


if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename         = "Roblox Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgScriptExtension  = ".php";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "";
$wgPasswordSender = "";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "";
$wgDBname           = "";
$wgDBuser           = "";
$wgDBpassword       = "";

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;

## Shared memory settings
$wgMainCacheType = CACHE_DB;
#$wgMemCachedServers = array();

#$wgAllowTitlesInSVG = true;

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/local/bin/convert";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "en";

$wgProxyKey = "a0e5af8defcba08f031e86a4b66503da1e7fd40608dabeda857efd921d549bd9";

# Replace logo - Wilson 
#$wgLogo = "/images/4/45/roblox_logo.png";
$wgLogo = "/images/1/13/RobloxWikiLogo.png";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'xblock';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
# $wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );

require_once("$IP/extensions/ImageMap/ImageMap.php");
include_once('extensions/FlaggedRevs/FlaggedRevs.php');
#####FLAGGED REVS##################################################################################


# Allowed namespaces of reviewable pages
$wgFlaggedRevsNamespaces = array( NS_MAIN, NS_USER, NS_PROJECT, NS_IMAGE, NS_TEMPLATE, NS_HELP, NS_CATEGORY );

#$wgFlaggedRevsNamespaces = array( NS_MAIN, NS_TALK, NS_USER, 
#NS_USER_TALK, NS_PROJECT, NS_PROJECT_TALK, NS_IMAGE, NS_IMAGE_TALK, NS_MEDIAWIKI, NS_MEDIAWIKI_TALK, 
#NS_TEMPLATE, NS_TEMPLATE_TALK, NS_HELP, NS_HELP_TALK, NS_CATEGORY, NS_CATEGORY_TALK );

# Patrollable namespaces
$wgFlaggedRevsPatrolNamespaces = array( NS_CATEGORY, NS_IMAGE, NS_TEMPLATE );




# When setting up new dimensions or levels, you will need to add some
# MediaWiki messages for the UI to show properly; any sysop can do this.
# Define the tags we can use to rate an article, and set the minimum level
# to have it become a "quality" version. "Quality" revisions take precedence
# over other reviewed revisions
$wgFlaggedRevTags = array( 'accuracy'=>2, 'depth'=>1, 'style'=>1 );

# How high can we rate these revisions?
$wgFlaggedRevValues = 4;

# A revision with all tags rated at least to this level is considered "pristine"/"featured"
$wgFlaggedRevPristine = 4;

# Who can set what flags to what level? (use -1 or 0 for not at all)
# Users cannot lower tags from a level they can't set
# Users with 'validate' can do anything regardless
# This is mainly for custom, less experienced, groups
$wgFlagRestrictions = array(
	'accuracy' => array( 'review' => 1 ),
	'depth'    => array( 'review' => 2 ),
	'style'    => array( 'review' => 3 ),
);

$wgSimpleFlaggedRevsUI = true;
$wgFlaggedRevsOverride = true;
$wgFlaggedRevsLowProfile = true;
$wgFlaggedRevsReviewForDefault = true;
###END OF FLAGGED REVS########################################################################

###GROUP PERMISSIONS##########################################################################
#VISITORS#####
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['upload'] = false;
$wgGroupPermissions['*']['move'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['writeapi'] = false;
$wgGroupPermissions['*']['stablesettings'] = false;
$wgGroupPermissions['*']['lesson-edit'] = false;

#SYSOP#####
$wgGroupPermissions['sysop']['review'] = true;
$wgGroupPermissions['sysop']['validate'] = true;
$wgGroupPermissions['sysop']['edit'] = true;
$wgGroupPermissions['sysop']['delete'] = true;
$wgGroupPermissions['sysop']['undelete'] = true;
$wgGroupPermissions['sysop']['protect'] = true;
$wgGroupPermissions['sysop']['patrol'] = true;
$wgGroupPermissions['sysop']['createpage'] = true;
$wgGroupPermissions['sysop']['upload'] = true;
$wgGroupPermissions['sysop']['createpage'] = true;
$wgGroupPermissions['sysop']['unreviewedpages'] = true; 
$wgGroupPermissions['sysop']['accountcreator'] = true; 
$wgGroupPermissions['sysop']['lesson-edit'] = true;


#USER######

$wgGroupPermissions['user']['validate'] = false;
$wgGroupPermissions['user']['move'] = false;
$wgGroupPermissions['user']['edit'] = false;
$wgGroupPermissions['user']['upload'] = false;
$wgGroupPermissions['user']['createpage'] = false;
$wgGroupPermissions['user']['createtalk'] = false;
$wgGroupPermissions['user']['minoredit'] = false;
$wgGroupPermissions['user']['move-subpages'] = false;
$wgGroupPermissions['user']['reupload-shared'] = false;
$wgGroupPermissions['user']['reupload'] = false;
$wgGroupPermissions['user']['purge'] = false;
$wgGroupPermissions['user']['writeapi'] = false;

#EDITORS#####
$wgGroupPermissions['editor']['edit'] = true;
$wgGroupPermissions['editor']['createpage'] = true;
$wgGroupPermissions['editor']['createtalk'] = true;
$wgGroupPermissions['editor']['autoreview'] = false;
$wgGroupPermissions['editor']['autopatrolother'] = false;
$wgGroupPermissions['editor']['autoconfirmed'] = false;
$wgGroupPermissions['editor']['upload'] = true;
$wgGroupPermissions['editor']['unreviewedpages'] = false;
$wgGroupPermissions['editor']['patrol'] = true;
$wgGroupPermissions['editor']['editprotected'] = true;
$wgGroupPermissions['editor']['block'] = true;
$wgGroupPermissions['editor']['reupload'] = true;
$wgGroupPermissions['editor']['unreviewedpages'] = true; 
# added for Toby/Becky US10718 - Wilson
$wgGroupPermissions['editor']['move'] = true; 
$wgGroupPermissions['editor']['movefile'] = true; 
$wgGroupPermissions['editor']['movestable'] = true; 
$wgGroupPermissions['editor']['move-subpages'] = true; 
$wgGroupPermissions['editor']['suppressredirect'] = true;

#WRITERS#####
$wgGroupPermissions['writer']['upload'] = true;
$wgGroupPermissions['writer']['edit'] = true;
$wgGroupPermissions['writer']['createtalk'] = true;
$wgGroupPermissions['writer']['createpage'] = true;

#REVIEWERS####
$wgGroupPermissions['reviewer']['protect'] = true;
$wgGroupPermissions['reviewer']['reupload'] = true;
$wgGroupPermissions['reviewer']['review'] = true;
$wgGroupPermissions['reviewer']['validate'] = true;
$wgGroupPermissions['reviewer']['upload'] = true;
$wgGroupPermissions['reviewer']['userrights'] = false;
$wgAddGroups['reviewer'] = array( 'editor');
$wgRemoveGroups['reviewer'] = array( 'editor');
$wgGroupPermissions['sysop']['editwidgets'] = true;
$wgGroupPermissions['*']['editwidgets'] = false;
###END OF GROUP PERMISSIONS##################################################################


# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );

#$wgUpgradeKey = '7c67d2bc0b9f2b7d';
#$wgShowExceptionDetails = true;
$wgFlaggedRevsStatsAge = false;

# Captcha Settings
#require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php");
require_once( "$IP/extensions/ConfirmEdit/Asirra.php");
$wgCaptchaClass = 'Asirra';
$wgAsirraCellsPerRow = '4';
$wgCaptchaTriggers['badlogin'] = true;
$wgCaptchaTriggers['edit'] = false;
$wgCaptchaTriggers['create'] = false;
$wgCaptchaTriggers['addurl'] = false;
$wgCaptchaTriggers['createaccount'] = false;
$wgGroupPermissions['bot']['skipcaptcha'] = false;
$wgGroupPermissions['sysop']['skipcaptcha']= false;

#Google Analytics
require_once( "$IP/extensions/googleAnalytics/googleAnalytics.php" );
#require_once( "$IP/extensions/HTML5video/HTML5video.php" );
require_once "$IP/extensions/Widgets/Widgets.php";
require_once ("$IP/extensions/Gadgets/Gadgets.php");

#
# 2012.11.12 - Wilson & Becky
#
### NAMESPACES
define("NS_API", 200);                        #define NS_API variable at namespace index 200
define("NS_API_TALK", 201);                  #define NS_API_TALK variable for talk page
define("NS_LESSON", 202);
define("NS_LESSON_TALK", 203);
define("NS_MANUAL", 204);
define("NS_MANUAL_TALK", 205);
define("NS_TUTORIAL", 206);
define("NS_TUTORIAL_TALK", 207);


$wgExtraNamespaces[NS_API] = "API";            #add the API namespace as the name "API"
$wgExtraNamespaces[NS_API_TALK] = "API_talk";      #add the API talk namespace
$wgExtraNamespaces[NS_LESSON] = "Lesson";
$wgExtraNamespaces[NS_LESSON_TALK] = "Lesson_talk";
$wgExtraNameSpaces[NS_MANUAL] = "Manual";
$wgExtraNameSpaces[NS_MANUAL_TALK] = "Manual_talk";
$wgExtraNameSpaces[NS_TUTORIAL] = "Tutorial";
$wgExtraNameSpaces[NS_TUTORIAL_TALK] = "Tutorial_talk";

$wgNamespacesWithSubpages[NS_API] = true;      #enable subpages for API
$wgNamespacesWithSubpages[NS_API_TALK] = true;      #enable subpages for API talk
$wgNamespacesWithSubpages[NS_LESSON] = true;
$wgNamespacesWithSubpages[NS_LESSON_TALK] = true;
$wgNamespacesWithSubpages[NS_MANUAL] = true;
$wgNamespacesWithSubpages[NS_MANUAL_TALK] = true;
$wgNamespacesWithSubpages[NS_TUTORIAL] = true;
$wgNamespacesWithSubpages[NS_TUTORIAL_TALK] = true;

$wgNamespaceProtection[NS_LESSON] = array('lesson-edit');

$wgPFEnableStringFunctions = true;

$wgNamespacesToBeSearchedDefault = array(
	NS_MAIN => 1, NS_API =>1
);


### SCRIBUNTO ###
require_once("$IP/extensions/Scribunto/Scribunto.php");
require_once("$IP/extensions/CodeEditor/CodeEditor.php");
require_once("$IP/extensions/WikiEditor/WikiEditor.php");
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

$wgScribuntoDefaultEngine = 'luastandalone';
$wgScribuntoUseGeSHi = true;
$wgCodeEditorEnableCore = true;
$wgScribuntoUseCodeEditor = true;
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
$wgDefaultUserOptions['wikieditor-preview'] = 1;

### RSS ###
require_once("$IP/extensions/RSS/RSS.php");
$wgRSSUrlWhitelist = array("http://blog.roblox.com/feed/");
$wgRSSUrlNumberOfAllowedRedirects = 2;
$wgRSSAllowLinkTag = true;
$wgAllowImageTag = true;

### MISC ###
require_once("$IP/extensions/ParserFunctions/ParserFunctions.php");

### CUSTOM ROBLOX ###
require_once("$IP/skins/xblock/xblock.php");
require_once("$IP/extensions/RobloxLandingPage/RobloxLandingPage.php");

#session_save_path("tmp");

error_reporting(E_ALL);
ini_set("display_errors", 1);
