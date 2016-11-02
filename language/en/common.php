<?php
/**
*
* @package phpBB Extension - Simple CDN
* @copyright (c) 2016 David yin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/


/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
   exit;
}

if (empty($lang) || !is_array($lang))
{
   $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
   'ACP_SIMPLECDN_CONFIG'           => 'Simple CDN',
   'ACP_SIMPLECDN_CONFIG_EXPLAIN'      => 'This is configuration page for the Simple CDN extension. The URL of static resources will be served from CDN below.',

   'ACP_SIMPLECDN_CONFIG_SET'       => 'Configuration',
   'SIMPLECDN_CONFIG_SAVED'         => 'Simple CDN settings saved',
      
   'SIMPLECDN_ENABLE'               => 'Enable Simple CDN',
   'SIMPLECDN_ENABLE_EXPLAIN'       => 'Do you want to enable the Simple CDN EXT?',

   'SIMPLECDN_URL'              => 'Simple CDN URL',
   'SIMPLECDN_URL_EXPLAIN'         => 'Enter the full URL of the CDN INCLUDING  // ',
   'SIMPLECDN_URL_PLACEHOLDER'     => '//cdn.cloudfront.net/',


));
