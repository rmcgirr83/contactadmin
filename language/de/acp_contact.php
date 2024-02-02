<?php
/**
*
* Contact Admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
* German translation by NetSecond.net 02/2024
*
*/
/**
* DO NOT CHANGE
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
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, [
	'ADMINS_NOT_EXIST_FOR_METHOD'	=> [
		0 => 'Es gibt keine Administratoren, die Kontakt über E-Mails erlauben.  Es muss eine andere Art der Kontaktaufnahme gewählt werden.',
		2 => 'Es gibt keine Administratoren, die Kontakt über private Nachrichten erlauben.  Es muss eine andere Art der Kontaktaufnahme gewählt werden.',
	],
	'CONTACT_CONFIG_SAVED'			=> 'Die Admin-kontaktieren-Konfiguration wurde aktualisiert.',
	'CONTACT_ACP_CONFIRM'				=> 'Visuelle Bestätigung aktivieren',
	'CONTACT_ACP_CONFIRM_EXPLAIN'		=> 'Wenn aktiviert, müssen Benutzer zum Senden einer Nachricht eine visuelle Bestätigung durchführen.<br>Dies dient der Vermeidung von Spam Nachrichten. Bitte beachten, dass diese Option nur für das Kontaktformular dient. Dies beeinflusst keine anderen visuellen Bestätigungen.',
	'CONTACT_ATTACHMENTS'				=> 'Anhänge zulassen',
	'CONTACT_ATTACHMENTS_EXPLAIN'		=> 'Wenn aktiviert, werden Anhänge in Posts im Forum und privaten Nachrichten zugelassen.<br>Die zulässigen Erweiterungen entsprechen der Boardkonfiguration.<br><span style="color:red;">Gilt nicht für die Kontaktart “EMail”.</span>',
	'CONTACT_CONFIRM_GUESTS'			=> 'Visuelle Bestätigung nur für Gäste',
	'CONTACT_CONFIRM_GUESTS_EXPLAIN'	=> 'Wenn aktiviert, wird die visuelle Bestätigung nur Gästen angezeigt (falls visuelle Bestätigung aktiviert).',
	'CONTACT_WHO'						=> 'Wer kontaktiert werden soll',
	'CONTACT_WHO_EXPLAIN'				=> 'Wer per E-Mail oder privater Nachricht kontaktiert werden soll',
	'CONTACT_MAX_ATTEMPTS'				=> 'Maximale Bestätigungsversuche',
	'CONTACT_MAX_ATTEMPTS_EXPLAIN'		=> 'Wie oft ein Benutzer versuchen darf, das korrekte Bild zu bestätigen.<br>Bitte 0 für beliebig viele Versuche eingeben.',
	'CONTACT_METHOD'					=> 'Art der Kontaktaufnahme',
	'CONTACT_METHOD_EXPLAIN'			=> 'Wie ein Benutzer Kontakt aufnehmen darf.',
	'CONTACT_POST_OPTIONS'				=> 'Kontakt per Post im Forum oder Privater Nachricht',
	'CONTACT_REASONS'					=> 'Gründe für die Kontaktaufnahme',
	'CONTACT_REASONS_EXPLAIN'			=> 'Gründe für die Kontaktaufnahme eingeben, getrennt durch neue Zeilen.<br>Wenn diese Funktion nicht genutzt werden soll, dieses Feld bitte leer lassen.',
	// Bot config options
	'CONTACT_BOT_FORUM'				=> 'Forum für Kontakt-Bot',
	'CONTACT_BOT_FORUM_EXPLAIN'		=> 'Forum auswählen, in dem der Kontakt-Bot posten soll, wenn die Kontaktmethode auf “Forumsbeitrag” eingestellt ist.',
	'CONTACT_BOT_POSTER'			=> 'Bot als Poster',
	'CONTACT_BOT_POSTER_EXPLAIN'	=> 'Wenn aktiviert, scheinen PNs und Beiträge basierend auf den Einstellungen hier vom oben ausgewählten Kontakt-Bot-Benutzer zu stammen. Wenn “Keiner” ausgewählt ist, wird der Bot nicht als Poster verwendet. Beiträge und PNs werden basierend auf den im Kontaktformular eingegebenen Informationen veröffentlicht.',
	'CONTACT_BOT_USER'				=> 'Kontakt-Bot-Benutzer',
	'CONTACT_BOT_USER_EXPLAIN'		=> 'Bitte Benutzer auswählen, unter dem Nachrichten gepostet werden, wenn die Kontaktmethode auf “Private Nachricht” oder “Forumsbeitrag” eingestellt ist.',
	'CONTACT_NO_BOT_USER'			=> '<strong>Die ausgewählte Kontakt-Bot-Benutzer-ID existiert nicht</strong>',
	'CONTACT_BOT_IS_BOT'			=> '<strong>Der ausgewählte Kontakt-Bot wird als Bot des Forums bezeichnet. Sicher, dass dieser Benutzer als Bot benutzt werden soll?</strong>',
	'CONTACT_USERNAME_CHK'			=> 'Benutzername prüfen',
	'CONTACT_USERNAME_CHK_EXPLAIN'	=> 'Wenn aktiviert, wird der eingegebene Benutzername mit denen in der Datenbank verglichen. Wenn der Name gefunden wird, wird dem Benutzer eine Fehlermeldung angezeigt und er wird aufgefordert, einen anderen Benutzernamen einzugeben.',
	'CONTACT_EMAIL_CHK'				=> 'E-Mail prüfen',
	'CONTACT_EMAIL_CHK_EXPLAIN'		=> 'Wenn aktiviert, wird die E-Mail-Adresse des Benutzers mit denen in der Datenbank abgeglichen. Wenn die E-Mail-Adresse gefunden wird, wird dem Benutzer eine Fehlermeldung angezeigt und er wird aufgefordert, eine andere E-Mail-Adresse einzugeben.',

	// Contact methods
	'CONTACT_METHOD_EMAIL'			=> 'E-Mail',
	'CONTACT_METHOD_PM'				=> 'Private Nachricht',
	'CONTACT_METHOD_POST'			=> 'Forum Post',

	// Contact methods
	'CONTACT_WHO_ALL_ADMINS'		=> 'Alle Admins',
	'CONTACT_WHO_BOARD_FOUNDER'		=> 'Board Gründer',
	'CONTACT_WHO_BOARD_DEFAULT'	=> 'Board Standard E-Mail',

	// Contact posters...user bot
	'CONTACT_POST_NEITHER'			=> 'Keiner',
	'CONTACT_POST_GUEST'			=> 'Nur Gäste',
	'CONTACT_POST_ALL'				=> 'Alle',

	// Overwrite the default contact page lang
	'CONTACT_EXTENSION_ACTIVE'	=> '<span style="color:red;">Die Einstellungen hier spielen keine Rolle, da derzeit die Admin-kontaktieren-Erweiterung aktiviert ist. Dies kann nicht auf “Aktiviert” gesetzt werden, ohne zuvor die Erweiterung zu deaktivieren.</span>',
	'CONTACT_GDPR'	=> 'DSGVO',
	'CONTACT_GDPR_EXPLAIN' => 'Wenn aktiviert, wird dem Benutzer ein Kontrollkästchen angezeigt, mit dem er die Datenschutzrichtlinie des Boards bestätigen kann. Damit das Kontaktformular übermittelt werden kann, muss das Kästchen angekreuzt sein.',
	'EMAIL_NOT_CONFIGURED' => 'Für das Board ist keine E-Mail-Adresse konfiguriert. Bitte eine andere Kontaktmethode auswählen.',
]);
