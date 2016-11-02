<?php
/**
 *
 * @package phpBB Extension - phpBB CDN
 * @copyright (c) 2016 David Yin
 * @copyright (c) 2016 Jmz Software
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
namespace jmz\phpbbcdn\event;
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
			'core.user_setup' => 'load_language_on_setup',
			'core.page_header_after' => 'modify_header_static_to_cdn',
			'core.smiley_text_override' => 'smiley_text',
			'core.generate_smilies_before' => 'smilies_before'
		);
	}
	protected $helper;
	protected $template;
	protected $config;
	protected $user;
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\config\config $config, \phpbb\user $user)
	{
		$this->helper   = $helper;
		$this->template = $template;
		$this->config   = $config;
		$this->user     = $user;
	}
	public function load_language_on_setup($event)
	{
		$lang_set_ext          = $event['lang_set_ext'];
		$lang_set_ext[]        = array(
			'ext_name' => 'jmz/phpbbcdn',
			'lang_set' => 'common'
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
	function return_cdn()
	{
		if ($this->config['phpbbcdn_enable'] && isset($this->config['phpbbcdn_url'])) {
			return $this->config['phpbbcdn_url'];
		}
	}
	function smilies_before($event)
	{
		$event['root_path'] = $this->return_cdn();
	}
	function smiley_text($event)
	{
		$event['root_path'] = $this->return_cdn();
	}
	public function modify_header_static_to_cdn($event)
	{
		if ($this->config['phpbbcdn_enable'] && isset($this->config['phpbbcdn_url'])) {
			$this->template->assign_vars(array(
				'T_THEME_PATH' => $this->config['phpbbcdn_url'] . "styles/" . rawurlencode($this->user->style['style_path']) . '/theme',
				'T_TEMPLATE_PATH' => $this->config['phpbbcdn_url'] . "styles/" . rawurlencode($this->user->style['style_path']) . '/template',
				'T_STYLESHEET_LINK' => $this->config['phpbbcdn_url'] . "styles/" . rawurlencode($this->user->style['style_path']) . '/theme/stylesheet.css?assets_version=' . $this->config['assets_version'],
				'T_STYLESHEET_LANG_LINK' => $this->config['phpbbcdn_url'] . "styles/" . rawurlencode($this->user->style['style_path']) . '/theme/' . $this->user->lang_name . '/stylesheet.css?assets_version=' . $this->config['assets_version'],
				'T_SUPER_TEMPLATE_PATH' => $this->config['phpbbcdn_url'] . "styles/" . rawurlencode($this->user->style['style_path']) . '/template',
				'T_ASSETS_PATH' => $this->config['phpbbcdn_url'] . "assets",
				'T_ICONS_PATH' => $this->config['phpbbcdn_url'] . $this->config['icons_path'] . "/",
				'T_RANKS_PATH' => $this->config['phpbbcdn_url'] . $this->config['ranks_path'] . "/"
			));
		}
	}
}

