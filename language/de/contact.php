<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
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
	'ACP_CAT_CONTACTADMIN'		=> 'Admin kontaktieren',
	'ADD_ATTACHMENT_EXPLAIN'	=> 'Soll eine Datei hinzugefügt werden, bitte nachfolgende Details eingeben.',
	'CONTACT_ERROR'			=> 'Das Kontaktformular kann derzeit nicht benutzt werden, da ein Fehler in der Konfiguration vorliegt. Eine E-Mail wurde an den Betreiber gesendet.',
	'CONTACT_NONE'			=> 'Der Benutzer %1$s hat versucht, die Admin-kontaktieren-Erweiterung unter %2$s zu verwenden, um eine %3$s zu senden, aber es gibt keine Administratoren, die %3$ss durch Benutzer zulassen. Bitte die Admin-kontaktieren-Konfiguration im Admin-Erweiterungsbereich für das Board %4$s eingeben und eine andere Kontaktmethode wählen.',
	'CONTACT_BOT_SUBJECT'		=> 'Fehler in der Admin-kontaktieren-Erweiterung',
	'CONTACT_BOT_MESSAGE'	=> 'Der Benutzer %1$s hat versucht, die Admin-kontaktieren-Erweiterung unter %2$s zu verwenden, aber die in der Konfiguration ausgewählten %3$s sind falsch. Bitte das Forum %4$s besuchen und in den Einstellungen für die Kontakt-Verwaltungs-Erweiterung ein anderes %3$s auswählen.
',
	'CONTACT_CONFIRM'			=> 'Bestätigen',
	'CONTACT_DISABLED'			=> 'Das Kontaktformular ist momentan deaktiviert.',
	'CONTACT_MAIL_DISABLED'		=> 'Bei der Konfiguration der Admin-kontaktieren-Erweiterung ist ein Fehler aufgetreten. Die Erweiterung ist auf das Senden einer E-Mail eingestellt, die Board-Konfiguration ist jedoch nicht für das Senden von E-Mails eingerichtet. Bitte %sBoard-Administrator%s benachrichtigen.',
	'CONTACT_MSG_SENT'			=> 'Die Nachricht wurde gesendet',
	'CONTACT_NO_MSG'			=> 'Es wurde keine Nachricht eingegeben',
	'CONTACT_NO_SUBJ'			=> 'Es wurde kein Betreff eingegeben',
	'CONTACT_REASON'			=> 'Grund',
	'CONTACT_TEMPLATE'			=> '[b]Name:[/b] %1$s' . "\n" . '[b]E-Mail-Addresse:[/b] %2$s' . "\n" . '[b]IP:[/b] %3$s' . "\n" . '[b]Betreff:[/b] %4$s' . "\n" . '[b]Hat folgende Nachricht über das Kontaktformular gesendet:[/b] %5$s',
	'CONTACT_TITLE'				=> 'Admin kontaktieren',

	'CONTACT_YOUR_NAME'			=> 'Name',
	'CONTACT_YOUR_NAME_EXPLAIN'	=> 'Bitte einen Namen eingeben, damit die Nachricht eine Identität bekommt.',
	'CONTACT_YOUR_EMAIL'		=> 'E-Mail-Adresse',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Bitte eine gültige E-Mail-Adresse eingeben, damit geantwortet werden kann.',
	'CONTACT_YOUR_EMAIL_CONFIRM'	=> 'Bitte E-Mail-Adresse bestätigen',
	'WRONG_DATA_EMAIL'			=> 'Die E-Mail-Adressen stimmen nicht überein',

	'TOO_MANY_CONTACT_TRIES'	=> 'Es wurde die maximale Anzahl der Versuche dieser Sitzung überschritten. Bitte später erneut versuchen.',
	'CONTACT_NO_NAME'			=> 'Es wurde kein Name eingegeben',
	'FORUM'						=> 'Forum',
	'USER'						=> 'Benutzer',
	'CONTACT_REGISTERED'		=> 'Registrierter Benutzer',
	'CONTACT_GUEST'				=> 'Gast',

	'REASON_EXPLAIN'			=> 'Bitte einen Grund wählen',
	'REASON_ERROR'				=> 'Bitte einen passenden Grund wählen',
	'RETURN_CONTACT'			=> '%sZurück zum Kontaktformular%s',
	'CONTACT_PRIVACYPOLICY'				=> 'Datenschutzerklärung',
	'CONTACT_PRIVACYPOLICY_EXPLAIN'		=> 'Ich bin damit einverstanden, dass der angegebene Name, die E-Mail-Adresse, die Nachricht und meine IP-Adresse gemäß der <a target="_blank" title="Datenschutzerklärung" href="%s">Datenschutzerklärung</a> gespeichert und verarbeitet werden.',
	'CONTACT_PRIVACYPOLICY_ERROR'		=> 'Bitte der Datenschutzerklärung zustimmen. Ohne Zustimmung kann die Nachricht nicht gesendet werden.',
]);
