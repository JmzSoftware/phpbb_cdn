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

class phpbbcdn_module
{
var $u_action;

   function main($id, $mode)
   {
      global $db, $user, $auth, $template, $cache, $request;
      global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

      $this->tpl_name = 'acp_phpbbcdn_config';
      $this->page_title = $user->lang['PHPBBCDN_CONFIG'];
      add_form_key('acp_phpbbcdn_config');
      
      $submit = $request->is_set_post('submit');
      if ($submit)
      {
         if (!check_form_key('acp_phpbbcdn_config'))
         {
            trigger_error('FORM_INVALID');
         }
         $config->set('phpbbcdn_enable', $request->variable('phpbbcdn_enable', 0));
         $config->set('phpbbcdn_url', $request->variable('phpbbcdn_url', ''));


         trigger_error($user->lang['PHPBBCDN_CONFIG_SAVED'] . adm_back_link($this->u_action));
      }
      $template->assign_vars(array(
         'PHPBBCDN_VERSION'        => (isset($config['phpbbcdn_version'])) ? $config['phpbbcdn_version'] : '',
         'PHPBBCDN_ENABLE'         => (!empty($config['phpbbcdn_enable'])) ? true : false,
         'PHPBBCDN_URL'        => (isset($config['phpbbcdn_url'])) ? $config['phpbbcdn_url'] : '',
         'U_ACTION'              => $this->u_action,
      ));
   }
}
