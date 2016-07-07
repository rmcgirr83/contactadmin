<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters for use
// ’ » “ ” …


$lang = array_merge($lang, array(
	// General config options
	'ACP_CAT_CONTACTADMIN'	=> 'Contact Board Administration',
	'ACP_CONTACTADMIN_CONFIG'			=> 'Configuration',
	// Log entries
	'LOG_CONFIG_CONTACT_ADMIN'		=> '<strong>Altered Contact Board Administration extension page settings</strong>',
	'LOG_CONTACT_BOT_INVALID'		=> '<strong>The Contact Board Administration extension bot has an invalid user id selected:</strong><br />User ID %1$s',
	'LOG_CONTACT_FORUM_INVALID'		=> '<strong>The Contact Board Administration extension forum has an invalid forum selected:</strong><br />Forum ID %1$s',
	'LOG_CONTACT_EMAIL_INVALID'		=> '<strong>The Contact Board Administration extension is allowing emails but the forum is not setup to allow emails.  The extension has been disabled.',
	'LOG_CONTACT_NONE'				=> '<strong>No Administrators are allowing users to contact them via %1$s in the Contact Board Administration extension</strong>',
	'LOG_CONTACT_CONFIG_UPDATE'		=> '<strong>Updated Contact Board Administration config settings</strong>',

));
