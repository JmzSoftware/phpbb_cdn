<?php
/**
*
* @package phpBB Extension - phpBB CDN
* @copyright (c) 2016 David Yin
* @copyright (c) 2016 Jmz Software
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
   'ACP_PHPBBCDN'         => 'phpBB CDN',
   'PHPBBCDN_CONFIG'      => 'phpBB CDN Settings',
));

