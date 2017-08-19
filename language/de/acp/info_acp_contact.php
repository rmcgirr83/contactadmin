<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
* German Casual Translation by Crizzo (Crizzo.de)
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
	'ACP_CONTACTADMIN_CONFIG'			=> 'Konfiguration',
	// Log entries
	'LOG_CONFIG_CONTACT_ADMIN'		=> '<strong>„Contact Board Administration“-Extension Einstellungen geändert</strong>',
	'LOG_CONTACT_BOT_INVALID'		=> '<strong>Für den „Contact Board Administration“-Extension Kontaktbot wurde eine ungültige Benutzer-ID ausgewählt:</strong><br />Benutzer-ID %1$s',
	'LOG_CONTACT_FORUM_INVALID'		=> '<strong>Für das „Contact Board Administration“-Extension Forum wurde ein ungültiges Forum ausgewählt:</strong><br />Forum-ID %1$s',
	'LOG_CONTACT_EMAIL_INVALID'		=> '<strong>Die „Contact Board Administration“-Extension erlaubt E-Mails, allerdings sind Board-E-Mails nicht erlaubt. Die Extension wurde deaktiviert.',
	'LOG_CONTACT_NONE'				=> '<strong>Kein Administrator hat den Benutzer erlaubt ihn per %1$s via „Contact Board Administration“-Extension zu kontaktieren.</strong>',
	'LOG_CONTACT_CONFIG_UPDATE'		=> '<strong>„Contact Board Administration“-Konfigurationseinstellung wurden aktualisiert</strong>',

));
