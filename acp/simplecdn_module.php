<?php
/**
*
* @package phpBB Extension - Simple CDN
* @copyright (c) 2016 David Yin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace davidyin\simplecdn\acp;

class simplecdn_module
{
var $u_action;

   function main($id, $mode)
   {
      global $db, $user, $auth, $template, $cache, $request;
      global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

      $this->tpl_name = 'acp_simplecdn_config';
      $this->page_title = $user->lang['SIMPLECDN_CONFIG'];
      add_form_key('acp_simplecdn_config');
      
      $submit = $request->is_set_post('submit');
      if ($submit)
      {
         if (!check_form_key('acp_simplecdn_config'))
         {
            trigger_error('FORM_INVALID');
         }
         $config->set('simplecdn_enable', $request->variable('simplecdn_enable', 0));
         $config->set('simplecdn_url', $request->variable('simplecdn_url', ''));


         trigger_error($user->lang['SIMPLECDN_CONFIG_SAVED'] . adm_back_link($this->u_action));
      }
      $template->assign_vars(array(
         'SIMPLECDN_VERSION'        => (isset($config['simplecdn_version'])) ? $config['simplecdn_version'] : '',
         'SIMPLECDN_ENABLE'         => (!empty($config['simplecdn_enable'])) ? true : false,
         'SIMPLECDN_URL'        => (isset($config['simplecdn_url'])) ? $config['simplecdn_url'] : '',
         'U_ACTION'              => $this->u_action,
      ));
   }
}
