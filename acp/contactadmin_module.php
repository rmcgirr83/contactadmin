<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace rmcgirr83\contactadmin\acp;

class contactadmin_module
{
	public	$u_action;

	function main($id, $mode)
	{
		global $user, $phpbb_container;

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('rmcgirr83.contactadmin.admin.controller');

		$admin_controller->set_page_url($this->u_action);

		// Load the "settings" or "manage" module modes
		switch ($mode)
		{
			case 'configuration':

				$this->page_title = $user->lang('ACP_CAT_CONTACTADMIN');

				$this->tpl_name = 'acp_contact';

				// Load the display options handle in the admin controller
				$admin_controller->display_options();
			break;

		}

	}
}
