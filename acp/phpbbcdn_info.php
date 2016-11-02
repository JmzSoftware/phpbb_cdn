<?php
/**
*
* @package phpBB Extension - phpBB CDN
* @copyright (c) 2016 David Yin
* @copyright (c) 2016 Jmz Software
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jmz\phpbbcdn\acp;

class phpbbcdn_info
 {
    function module()
    {
         return array(
			'filename'  => '\jmz\phpbbcdn\acp\phpbbcdn_module',
			'title'     => 'ACP_PHPBBCDN',
			'modes'     => array(
				'config' => array(
					'title' => 'ACP_PHPBBCDN_CONFIG', 
					'auth' => 'ext_jmz/phpbbcdn && acl_a_board', 
					'cat' => array('ACP_PHPBBCDN')
				),
			),
		);
   }
}
