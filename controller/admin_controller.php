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

	/* @var \rmcgirr83\contactadmin\core\functions_contactadmin */
	protected $functions;

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
	* @param \rmcgirr83\contactadmin\core\functions_contactadmin	$functions			Functions for the extension
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
			\rmcgirr83\contactadmin\core\functions_contactadmin $functions)
	{
		$this->cache = $cache;
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->container = $phpbb_container;
		$this->template = $template;
		$this->user = $user;
		$this->log = $log;
		$this->functions = $functions;
	}

	public function display_options()
	{
		// Create a form key for preventing CSRF attacks
		add_form_key('contactadmin_settings');

		$config_text = $this->container->get('config_text');

		$contactadmin			= $config_text->get_array(array(
			'contactadmin_reasons',
		));
		$this->user->add_lang_ext('rmcgirr83/contactadmin', 'acp_contact');
		if ($this->request->is_set_post('submit'))
		{
			$error = array();

			if (!check_form_key('contactadmin_settings'))
			{
				$error[] = $this->user->lang('FORM_INVALID');
			}

			if (!sizeof($error))
			{
				$config_text->set_array(array(
					'contactadmin_reasons'			=> $this->request->variable('reasons', '', true),
				));

				$this->set_options();

				// and an entry into the log table
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_CONFIG_UPDATE');

				trigger_error($this->user->lang('CONTACT_CONFIG_SAVED') . adm_back_link($this->u_action));
			}
		}

		$this->template->assign_vars(array(
			'CONTACT_ERROR'					=> isset($error) ? ((sizeof($error)) ? implode('<br />', $error) : '') : '',
			'CONTACT_ENABLE'				=> $this->config['contactadmin_enable'],
			'CONTACT_CONFIRM'				=> $this->config['contactadmin_confirm'],
			'CONTACT_CONFIRM_GUESTS'		=> $this->config['contactadmin_confirm_guests'],
			'CONTACT_ATTACHMENTS'			=> $this->config['contactadmin_attach_allowed'],
			'CONTACT_MAX_ATTEMPTS'			=> $this->config['contactadmin_max_attempts'],
			'CONTACT_FOUNDER'				=> $this->config['contactadmin_founder_only'],
			'CONTACT_REASONS'				=> $contactadmin['contactadmin_reasons'],
			'CONTACT_METHOD'				=> $this->functions->method_select($this->config['contactadmin_method']),
			'CONTACT_BOT_POSTER'			=> $this->functions->poster_select($this->config['contactadmin_bot_poster']),
			'CONTACT_BOT_FORUM'				=> $this->functions->forum_select($this->config['contactadmin_forum']),
			'CONTACT_BOT_USER'				=> $this->functions->bot_user_select($this->config['contactadmin_bot_user']),
			'CONTACT_USERNAME_CHK'			=> $this->config['contactadmin_username_chk'],
			'CONTACT_EMAIL_CHK'				=> $this->config['contactadmin_email_chk'],

			'U_ACTION'						=> $this->u_action)
		);
	}

	public function set_options()
	{
		$this->config->set('contactadmin_enable', $this->request->variable('contactadmin_enable', 0));
		$this->config->set('contactadmin_confirm', $this->request->variable('confirm', 0));
		$this->config->set('contactadmin_confirm_guests', $this->request->variable('confirm_guests', 0));
		$this->config->set('contactadmin_attach_allowed', $this->request->variable('attach_allowed', 0));
		$this->config->set('contactadmin_max_attempts', $this->request->variable('max_attempts', 0));
		$this->config->set('contactadmin_founder_only', $this->request->variable('founder_only', 0));
		$this->config->set('contactadmin_bot_poster', $this->request->variable('bot_poster', 0));
		$this->config->set('contactadmin_forum', $this->request->variable('forum', 0));
		$this->config->set('contactadmin_bot_user', $this->request->variable('bot_user', 0));
		$this->config->set('contactadmin_username_chk', $this->request->variable('username_chk', 0));
		$this->config->set('contactadmin_email_chk', $this->request->variable('email_chk', 0));
		$this->config->set('contactadmin_method', $this->request->variable('method', 0));
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
