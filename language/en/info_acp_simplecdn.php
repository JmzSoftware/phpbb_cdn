<?php
/**
*
* @package phpBB Extension - Simple CDN
* @copyright (c) 2016 David Yin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
   exit;
}
if (empty($lang) || !is_array($lang))
{
   $lang = array();
}

$lang = array_merge($lang, array(
   'ACP_SIMPLECDN'         => 'Simple CDN',
   'SIMPLECDN_CONFIG'      => 'Simple CDN Settings',
));

