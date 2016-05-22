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
			'core.page_header_after'	=> 'page_header_after',
		);
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
}
