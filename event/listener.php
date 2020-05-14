<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/
namespace rmcgirr83\contactadmin\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public function __construct(
		\phpbb\config\config $config,
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template,
		\phpbb\user $user)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_extensions_run_action_before'	=> 'enable_default_contact',
			'core.adm_page_footer'	=> 'extension_enabled',
			'core.page_header_after'	=> 'page_header_after',
			'core.user_setup'			=> 'user_setup',
			'core.login_box_failed'		=> 'login_box_failed',
			'core.ucp_register_modify_template_data'	=> 'contact_form_register',
		);
	}

	// enable the default phpbb contact page upon disabling the extension
	public function enable_default_contact($event)
	{
		$action = $event['action'];
		$ext_name = $event['ext_name'];

		if ($action = 'disable' && $ext_name = 'rmcgirr83/contactadmin')
		{
			$this->config->set('contact_admin_form_enable', true);
		}
	}

	// change the display of information on the default contact page of phpBB within the ACP
	public function extension_enabled($event)
	{
		if ($this->config['contactadmin_enable'])
		{
			$this->user->add_lang_ext('rmcgirr83/contactadmin', 'acp_contact');
			$this->template->assign_vars(array(
				'L_CONTACT_US_ENABLE_EXPLAIN'	=> $this->user->lang['CONTACT_EXTENSION_ACTIVE'],
			));
		}
	}

	public function user_setup($event)
	{
		$url = $this->helper->get_current_url();

		if ($this->config['contactadmin_enable'] && empty($this->user->data['is_bot']) && $this->config['board_disable'] && substr($url, strrpos($url, '/') + 1) === 'contactadmin')
		{
			define('SKIP_CHECK_DISABLED', true);
		}

		// if the extension is enabled ensure the default phpBB contact page is disabled.
		if ($this->config['contactadmin_enable'] && $this->config['contact_admin_form_enable'])
		{
			$this->config->set('contact_admin_form_enable', 0);
		}
	}

	public function page_header_after($event)
	{
		if ($this->config['contactadmin_enable'] && !$this->user->data['is_bot'])
		{
			$version = phpbb_version_compare($this->config['version'], '3.2.0-b2', '>=');

			$this->template->assign_vars(array(
				'U_CONTACT_US'		=> false,
				'U_CONTACTADMIN'	=> $this->helper->route('rmcgirr83_contactadmin_displayform'),
				'S_FORUM_VERSION'	=> $version,
			));
		}
	}

	public function login_box_failed($event)
	{
		$error = $event['err'];
		$result = $event['result'];
		if ($this->config['contactadmin_enable'] && ($result['error_msg'] == 'LOGIN_ERROR_USERNAME' || $result['error_msg'] == 'LOGIN_ERROR_PASSWORD'))
		{
			$error = sprintf($this->user->lang[$result['error_msg']], '<a href="' . $this->helper->route('rmcgirr83_contactadmin_displayform') . '">', '</a>');
		}
		$event['err'] = $error;
	}

	public function contact_form_register($event)
	{
		if ($this->config['contactadmin_enable'])
		{
			$this->template->assign_vars(array(
				'L_CONFIRM_EXPLAIN' => sprintf($this->user->lang['CONFIRM_EXPLAIN'], '<a href="' . $this->helper->route('rmcgirr83_contactadmin_displayform') . '">', '</a>'),
			));
		}
	}
}
