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

class phpbbcdn_schema extends \phpbb\db\migration\migration
{
   static public function depends_on()
   {
      return array('\phpbb\db\migration\data\v31x\v314');
   }
   
   public function update_data()
   {
      return array(
         // Add configs
         array('config.add', array('phpbbcdn_enable', '')),
         array('config.add', array('phpbbcdn_url', '')),
         array('config.add', array('phpbbcdn_version', '1.0.0')),

      );
   }
}
