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
/**
* DO NOT CHANGE
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
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'CONTACT_CONFIG_SAVED'			=> 'Die „Contact Board Administration“-Konfiguration wurde aktualisiert',
	'CONTACT_ENABLE'				=> 'Aktiviere die „Contact Board Administration“-Extension',
	'CONTACT_ENABLE_EXPLAIN'		=> 'Aktiviere oder deaktiviere global die Extension',
	'CONTACT_ACP_CONFIRM'				=> 'Aktiviere den Bestätigungscode',
	'CONTACT_ACP_CONFIRM_EXPLAIN'		=> 'Wenn du diese Einstellung aktivierst, müssen die Benutzer einen Bestätigungscode eintragen, um eine Nachricht zu senden.<br>Damit werden Spam-Nachrichten verhindert. Beachte, dass diese Einstellung nur für das Kontaktformular gültig ist. Es beeinflusst keine anderen Bestätigungscodes-Einstellung.',
	'CONTACT_ATTACHMENTS'				=> 'Dateianhänge erlaubt',
	'CONTACT_ATTACHMENTS_EXPLAIN'		=> 'Sofern aktiviert werden Dateianhänge bei der Kontaktart „Forenbeitrag“ und „Private Nachricht" erlaubt.<br>Die Dateitypen entsprechen denen der Board-Einstellungen.<br><span style="color:red;">Wirkt sich nicht auf die Kontaktart „E-Mail“ aus.</span>',
	'CONTACT_CONFIRM_GUESTS'			=> 'Bestätigungscode nur für Gäste',
	'CONTACT_CONFIRM_GUESTS_EXPLAIN'	=> 'Wenn diese Einstellung aktiviert ist, müssen nur Gäste den Bestätigungscode ausfüllen (sofern Gäste das Formular nutzen dürfen).',
	'CONTACT_FOUNDER'					=> 'Nur die Board-Gründer kontaktieren',
	'CONTACT_FOUNDER_EXPLAIN'			=> 'Wenn dies aktiviert ist, bekommen nur die „Gründer“ des Forums eine E-Mail oder PN Benachrichtigung.',
	'CONTACT_GENERAL_SETTINGS'			=> 'Allgemeine Kontaktseiten-Einstellungen',
	'CONTACT_MAX_ATTEMPTS'				=> 'Maximale Anzahl von Versuchen',
	'CONTACT_MAX_ATTEMPTS_EXPLAIN'		=> 'Wie viele Versuche haben die Benutzer den richtigen Bestätigungscode auszufüllen?<br>0 entspricht einer unbegrenzten Anzahl an Versuchen.',
	'CONTACT_METHOD'					=> 'Kontaktart',
	'CONTACT_METHOD_EXPLAIN'			=> 'Mit welcher Kontaktart sollen Benutzer in Kontakt treten können.<br><span style="color:red;">Wenn „E-Mail“ ausgewählt wird, sind Dateianhänge nicht möglich.</span>',
	'CONTACT_REASONS'					=> 'Kontaktgründe',
	'CONTACT_REASONS_EXPLAIN'			=> 'Trage Gründe für den Kontakt ein, je Grund eine eigene Zeile.<br>Wenn du diese Funktion nicht verwenden willst, dann lasse dieses Feld leer.',
	// Bot config options
	'CONTACT_BOT_FORUM'				=> 'Kontaktbot',
	'CONTACT_BOT_FORUM_EXPLAIN'		=> 'Wähle das Forum aus, in das der Kontaktbot schreiben soll, sofern die Kontaktart „Forenbeitrag“ ausgewählt wurde.',
	'CONTACT_BOT_POSTER'			=> 'Kontaktbot-Benutzer als Beitragsersteller',
	'CONTACT_BOT_POSTER_EXPLAIN'	=> 'Wenn aktiviert, werden PNs und Beiträge durch den Kontaktbot-Benutzer erstellt. Wenn „Weder noch“ ausgewählt wurde, wird der Kontaktbot-Benutzer nicht verwendet. Dann werden Beiträge und PNs basierend auf den Einträgen in das Kontaktformular erstellt.',
	'CONTACT_BOT_USER'				=> 'Kontaktbot-Benutzer',
	'CONTACT_BOT_USER_EXPLAIN'		=> 'Wähle den Benutzer aus, unter dessen Account die Nachrichten erstellen werden, sofern die Kontaktart „Private Nachricht” oder „Forenbeitrag” ausgewählt wurde.',
	'CONTACT_USERNAME_CHK'			=> 'Prüfe Benutzernamen Username',
	'CONTACT_USERNAME_CHK_EXPLAIN'	=> 'Wenn aktiviert, werden die eingetragenen Benutzernamen mit der Mitgliederliste abgeglichen. Wenn eine Übereinstimmung gefunden wird, bekommt der Benutzer eine Fehlermeldung gezeigt und wird aufgefordert einen anderen Benutzernamen zu wählen.',
	'CONTACT_EMAIL_CHK'				=> 'Prüfe E-Mail-Adresse',
	'CONTACT_EMAIL_CHK_EXPLAIN'		=> 'Wenn aktiviert, werden die eingetragenen E-Mail_Adressen mit der Mitgliederliste abgeglichen. Wenn eine Übereinstimmung gefunden wird, bekommt der Benutzer eine Fehlermeldung gezeigt und wird aufgefordert eine andere E-Mail-Adresse zu verwenden.',

	// Contact methods
	'CONTACT_METHOD_EMAIL'			=> 'E-Mail',
	'CONTACT_METHOD_PM'				=> 'Private Nachricht',
	'CONTACT_METHOD_POST'			=> 'Forenbeitrag',

	// Contact posters...user bot
	'CONTACT_POST_NEITHER'			=> 'Weder noch',
	'CONTACT_POST_GUEST'			=> 'Nur Gäste',
	'CONTACT_POST_ALL'				=> 'Jeder',
));
