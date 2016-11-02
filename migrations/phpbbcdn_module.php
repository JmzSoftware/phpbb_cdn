<?php
/**
*
* @package phpBB Extension - phpBB CDN
* @copyright (c) 2016 David Yin
* @copyright (c) 2016 Jmz Software
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jmz\phpbbcdn\migrations;

class phpbbcdn_module extends \phpbb\db\migration\migration
{
   
   public function update_data()
   {
      return array(
          array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_PHPBBCDN')),
         array('module.add', array(
         'acp', 'ACP_PHPBBCDN', array(
         'module_basename' => '\jmz\phpbbcdn\acp\phpbbcdn_module', 'modes'   => array('config'),
             ),
         )),
      );
   }
}
