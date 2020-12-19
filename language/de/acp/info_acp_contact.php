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
	$lang = [];
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


$lang = array_merge($lang, [
	// General config options
	'ACP_CAT_CONTACTADMIN'		=> 'Contact Administration',
	'ACP_CONTACTADMIN_CONFIG'	=> 'Konfiguration',
	'FORUM_EMAIL_INACTIVE'		=> 'Wie möchtest du, dass die Benutzer Kontakt aufnehmen können.<br><span style="color:red;">Keine E-Mail per Foreneinstellungen erlaubt</span>',
	'NO_FORUM_ATTACHMENTS'		=> 'Wenn diese Option gesetzt ist, werden Anhänge in Beiträgen im Forum und in privaten Nachrichten erlaubt. Die erlaubten Erweiterungen sind die gleichen wie in der Board-Konfiguration.<br><span style="color:red;">Keine Anhänge per Forumseinstellungen erlaubt!</span>',

	// Log entries
	'LOG_CONFIG_CONTACT_ADMIN'	=> '<strong>„Contact Administration“-Extension Einstellungen geändert</strong>',
	'LOG_CONTACT_BOT_INVALID'	=> '<strong>Für den „Contact Administration“-Extension Kontaktbot wurde eine ungültige Benutzer-ID ausgewählt:</strong><br />Benutzer-ID %1$s',
	'LOG_CONTACT_FORUM_INVALID'	=> '<strong>Für das „Contact Administration“-Extension Forum wurde ein ungültiges Forum ausgewählt:</strong><br />Forum-ID %1$s',
	'LOG_CONTACT_EMAIL_INVALID'	=> '<strong>Die „Contact Administration“-Extension erlaubt E-Mails, allerdings sind Board-E-Mails nicht erlaubt. Die Extension wurde deaktiviert.',
	'LOG_CONTACT_NONE'			=> '<strong>Kein Administrator hat den Benutzer erlaubt ihn per %1$s via „Contact Board Administration“-Extension zu kontaktieren.</strong>',
	'LOG_CONTACT_CONFIG_UPDATE'	=> '<strong>„Contact Administration“-Konfigurationseinstellung wurden aktualisiert</strong>',
	//Donation
	'PAYPAL_IMAGE_URL'			=> 'https://www.paypalobjects.com/webstatic/en_US/i/btn/png/silver-pill-paypal-26px.png',
	'PAYPAL_ALT'				=> 'Spenden mit PayPal',
	'BUY_ME_A_BEER_URL'			=> 'https://paypal.me/RMcGirr83',
	'BUY_ME_A_BEER'				=> 'Spendiere mir ein Bier für die Erstellung dieser Erweiterung',
	'BUY_ME_A_BEER_SHORT'		=> 'Sende eine Spende für diese Erweiterung',
	'BUY_ME_A_BEER_EXPLAIN'		=> 'Diese Erweiterung ist völlig kostenlos. Es ist ein Projekt, in das ich meine Zeit investiere, um der phpBB-Community Freude zu bereiten und sie zu nutzen. Wenn Sie diese Erweiterung gerne verwenden oder wenn Ihr Forum davon profitiert hat, ziehen Sie bitte in Betracht, <a href="https://paypal.me/RMcGirr83" target="_blank" rel="noreferrer noopener">mir ein Bier zu spendieren</a>. Das würde ich sehr zu schätzen wissen. <i class="fa fa-smile-o" style="color:green;font-size:1.5em;" aria-hidden="true"></i>',
]);
