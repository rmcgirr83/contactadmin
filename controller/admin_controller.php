<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace rmcgirr83\contactadmin\controller;

use Symfony\Component\DependencyInjection\ContainerInterface;

class admin_controller
{
	/** @var \phpbb\cache\service */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var ContainerInterface */
	protected $phpbb_container;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\log\log */
	protected $log;

	/* @var \rmcgirr83\contactadmin\core\contactadmin */
	protected $contactadmin;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	/** @var string Custom form action */
	protected $u_action;

	/**
	* Constructor
	*
	* @param \phpbb\cache\service									$cache				Cache object
	* @param \phpbb\config\config									$config				Config object
	* @param \phpbb\db\driver\driver_interface						$db					Database object
	* @param \phpbb\request\request									$request			Request object
	* @param ContainerInterface                   					$phpbb_container	Service container interface
	* @param \phpbb\template\template								$template			Template object
	* @param \phpbb\user											$user				User object
	* @param \phpbb\log												$log				Log object
	* @param \rmcgirr83\contactadmin\core\contactadmin				$contactadmin		Methods for the extension
	* @param string													$root_path			phpBB root path
	* @param string													$php_ext			phpEx
	* @return \rmcgirr83\contactadmin\controller\admin_controller
	* @access public
	*/
	public function __construct(
			\phpbb\cache\service $cache,
			\phpbb\config\config $config,
			\phpbb\db\driver\driver_interface $db,
			\phpbb\request\request $request,
			ContainerInterface $phpbb_container,
			\phpbb\template\template $template,
			\phpbb\user $user,
			\phpbb\log\log $log,
			\rmcgirr83\contactadmin\core\contactadmin $contactadmin,
			$root_path,
			$php_ext)
	{
		$this->cache = $cache;
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->container = $phpbb_container;
		$this->template = $template;
		$this->user = $user;
		$this->log = $log;
		$this->contactadmin = $contactadmin;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;

		if (!function_exists('display_custom_bbcodes'))
		{
			include($this->root_path . 'includes/functions_display.' . $this->php_ext);
		}
		if (!class_exists('parse_message'))
		{
			include($this->root_path . 'includes/message_parser.' . $this->php_ext);
		}
	}

	public function display_options()
	{
		$this->user->add_lang(array('acp/board', 'posting'));
		$this->user->add_lang_ext('rmcgirr83/contactadmin', 'acp_contact');

		// Create a form key for preventing CSRF attacks
		add_form_key('contactadmin_settings');
		$error = '';

		$config_text = $this->container->get('config_text');

		$contact_admin_data		= $config_text->get_array(array(
			'contactadmin_reasons',
			'contact_admin_info',
			'contact_admin_info_uid',
			'contact_admin_info_bitfield',
			'contact_admin_info_flags',
		));

		$contact_admin_reasons			= $contact_admin_data['contactadmin_reasons'];
		$contact_admin_info				= $contact_admin_data['contact_admin_info'];
		$contact_admin_info_uid			= $contact_admin_data['contact_admin_info_uid'];
		$contact_admin_info_bitfield	= $contact_admin_data['contact_admin_info_bitfield'];
		$contact_admin_info_flags		= $contact_admin_data['contact_admin_info_flags'];

		if ($this->request->is_set_post('submit')  || $this->request->is_set_post('preview'))
		{
			if (!check_form_key('contactadmin_settings'))
			{
				$error = $this->user->lang('FORM_INVALID');
			}

			$contact_admin_info		= $this->request->variable('contact_admin_info', '', true);
			$contact_admin_reasons	= $this->request->variable('reasons', '', true);

			generate_text_for_storage(
				$contact_admin_info,
				$contact_admin_info_uid,
				$contact_admin_info_bitfield,
				$contact_admin_info_flags,
				!$this->request->variable('disable_bbcode', false),
				!$this->request->variable('disable_magic_url', false),
				!$this->request->variable('disable_smilies', false)
			);

			if (empty($error) && $this->request->is_set_post('submit'))
			{
				$config_text->set_array(array(
					'contactadmin_reasons'			=> $contact_admin_reasons,
					'contact_admin_info'			=> $contact_admin_info,
					'contact_admin_info_uid'		=> $contact_admin_info_uid,
					'contact_admin_info_bitfield'	=> $contact_admin_info_bitfield,
					'contact_admin_info_flags'		=> $contact_admin_info_flags,
				));

				$this->set_options();

				// and an entry into the log table
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_CONFIG_UPDATE');

				trigger_error($this->user->lang('CONTACT_CONFIG_SAVED') . adm_back_link($this->u_action));
			}
		}

		$contact_admin_info_preview = '';
		if ($this->request->is_set_post('preview'))
		{
			$contact_admin_info_preview = generate_text_for_display($contact_admin_info, $contact_admin_info_uid, $contact_admin_info_bitfield, $contact_admin_info_flags);
		}

		$contact_admin_edit = generate_text_for_edit($contact_admin_info, $contact_admin_info_uid, $contact_admin_info_flags);

		$this->template->assign_vars(array(
			'CONTACT_ERROR'					=> $error,
			'CONTACT_ENABLE'				=> $this->config['contactadmin_enable'],
			'CONTACT_CONFIRM'				=> $this->config['contactadmin_confirm'],
			'CONTACT_CONFIRM_GUESTS'		=> $this->config['contactadmin_confirm_guests'],
			'CONTACT_ATTACHMENTS'			=> $this->config['contactadmin_attach_allowed'],
			'CONTACT_MAX_ATTEMPTS'			=> $this->config['contactadmin_max_attempts'],
			'CONTACT_FOUNDER'				=> $this->config['contactadmin_founder_only'],
			'CONTACT_REASONS'				=> $contact_admin_reasons,
			'CONTACT_METHOD'				=> $this->contactadmin->method_select($this->config['contactadmin_method']),
			'CONTACT_BOT_POSTER'			=> $this->contactadmin->poster_select($this->config['contactadmin_bot_poster']),
			'CONTACT_BOT_FORUM'				=> $this->contactadmin->forum_select($this->config['contactadmin_forum']),
			'CONTACT_BOT_USER'				=> $this->contactadmin->bot_user_select($this->config['contactadmin_bot_user']),
			'CONTACT_USERNAME_CHK'			=> $this->config['contactadmin_username_chk'],
			'CONTACT_EMAIL_CHK'				=> $this->config['contactadmin_email_chk'],

			'CONTACT_INFO'					=> $contact_admin_edit['text'],
			'CONTACT_INFO_PREVIEW'			=> $contact_admin_info_preview,

			'S_BBCODE_DISABLE_CHECKED'		=> !$contact_admin_edit['allow_bbcode'],
			'S_SMILIES_DISABLE_CHECKED'		=> !$contact_admin_edit['allow_smilies'],
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$contact_admin_edit['allow_urls'],

			'BBCODE_STATUS'			=> $this->user->lang('BBCODE_IS_ON', '<a href="' . append_sid("{$this->root_path}faq.$this->php_ext", 'mode=bbcode') . '">', '</a>'),
			'SMILIES_STATUS'		=> $this->user->lang['SMILIES_ARE_ON'],
			'IMG_STATUS'			=> $this->user->lang['IMAGES_ARE_ON'],
			'FLASH_STATUS'			=> $this->user->lang['FLASH_IS_ON'],
			'URL_STATUS'			=> $this->user->lang['URL_IS_ON'],

			'S_BBCODE_ALLOWED'		=> true,
			'S_SMILIES_ALLOWED'		=> true,
			'S_BBCODE_IMG'			=> true,
			'S_BBCODE_FLASH'		=> true,
			'S_LINKS_ALLOWED'		=> true,

			'U_ACTION'				=> $this->u_action,
		));
		// Assigning custom bbcodes
		display_custom_bbcodes();
	}

	public function set_options()
	{
		$this->config->set('contactadmin_enable', $this->request->variable('contactadmin_enable', 0));
		$this->config->set('contactadmin_confirm', $this->request->variable('confirm', 0));
		$this->config->set('contactadmin_confirm_guests', $this->request->variable('confirm_guests', 0));
		$this->config->set('contactadmin_attach_allowed', $this->request->variable('attach_allowed', 0));
		$this->config->set('contactadmin_max_attempts', $this->request->variable('max_attempts', 0));
		$this->config->set('contactadmin_founder_only', $this->request->variable('founder_only', 0));
		$this->config->set('contactadmin_bot_poster', $this->request->variable('contact_bot_poster', 0));
		$this->config->set('contactadmin_forum', $this->request->variable('forum', 0));
		$this->config->set('contactadmin_bot_user', $this->request->variable('bot_user', 0));
		$this->config->set('contactadmin_username_chk', $this->request->variable('username_chk', 0));
		$this->config->set('contactadmin_email_chk', $this->request->variable('email_chk', 0));
		$this->config->set('contactadmin_method', $this->request->variable('contact_method', 0));
	}
	/**
	 * Set page url
	 *
	 * @param string $u_action Custom form action
	 * @return null
	 * @access public
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
