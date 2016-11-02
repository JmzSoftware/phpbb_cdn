<?php
/**
*
* @package phpBB Extension - Simple CDN
* @copyright (c) 2016 David Yin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace davidyin\simplecdn\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
   static public function getSubscribedEvents()
   {
      return array(
         'core.user_setup'   => 'load_language_on_setup',
         'core.page_header_after'   => 'modify_header_static_to_cdn',
      );
   }

   protected $helper;

   protected $template;
   
   protected $config;
   
   protected $user;

   public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\config\config $config, \phpbb\user $user )
   {
      $this->helper = $helper;
      $this->template = $template;
      $this->config = $config;   
	  $this->user = $user;
   }

   public function load_language_on_setup($event)
   {
      $lang_set_ext = $event['lang_set_ext'];
      $lang_set_ext[] = array(
         'ext_name' => 'davidyin/simplecdn',
         'lang_set' => 'common',
      );
      $event['lang_set_ext'] = $lang_set_ext;
   }

   
   public function modify_header_static_to_cdn($event)
   {
      $this->template->assign_vars(array(
      'SIMPLECDN_ENABLE'         => $this->config['simplecdn_enable'] ? true : false,
      'SIMPLECDN_URL'        => (isset($this->config['simplecdn_url'])) ? $this->config['simplecdn_url'] : '',
	                                                                                   
	  
      ));
	  if ( $this->config['simplecdn_enable'] && isset($this->config['simplecdn_url'])){
		   $this->template->assign_vars(array(
		  
		    'T_ASSETS_PATH'			=>  $this->config['simplecdn_url']."assets",
			'T_THEME_PATH'			=>  $this->config['simplecdn_url'] ."styles/". rawurlencode($this->user->style['style_path']) . '/theme',
			'T_TEMPLATE_PATH'		=>  $this->config['simplecdn_url']."styles/" . rawurlencode($this->user->style['style_path']) . '/template',
			'T_STYLESHEET_LINK'		=>  $this->config['simplecdn_url']."styles/" . rawurlencode($this->user->style['style_path']) . '/theme/stylesheet.css?assets_version=' .  $this->config['assets_version'],
			'T_STYLESHEET_LANG_LINK'    => $this->config['simplecdn_url']."styles/" . rawurlencode($this->user->style['style_path']) . '/theme/' . $this->user->lang_name . '/stylesheet.css?assets_version=' . $this->config['assets_version'],
			
			'T_SUPER_TEMPLATE_PATH'	=> $this->config['simplecdn_url']."styles/" . rawurlencode($this->user->style['style_path']) . '/template',
			'T_SMILIES_PATH'		=> $this->config['simplecdn_url']. $this->config['smilies_path']."/",	
			'T_AVATAR_PATH'			=> $this->config['simplecdn_url']. $this->config['avatar_path']."/",
			'T_AVATAR_GALLERY_PATH'	=> $this->config['simplecdn_url']. $this->config['avatar_gallery_path']."/",
			'T_ICONS_PATH'			=> $this->config['simplecdn_url']. $this->config['icons_path']."/",
			'T_RANKS_PATH'			=> $this->config['simplecdn_url']. $this->config['ranks_path']."/",
			'T_UPLOAD_PATH'			=> $this->config['simplecdn_url']. $this->config['upload_path']."/",			
			
			'T_JQUERY_LINK'			=> !empty($this->config['allow_cdn']) && !empty($this->config['load_jquery_url']) ? $this->config['load_jquery_url'] : $this->config['simplecdn_url']."assets/javascript/jquery.min.js?assets_version=" . $this->config['assets_version'],

			));
		
	  }
	  

	    
   }
   
   
   
   

}
