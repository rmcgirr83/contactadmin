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
	'ACP_CAT_CONTACTADMIN'		=> 'Kontakt Administration',
	'ADD_ATTACHMENT_EXPLAIN'	=> 'Wenn du eine Datei anhängen möchtest, trage dies unten auf der Seite ein.',
	'CONTACT_BOT_ERROR'			=> 'Du kannst im Moment das Kontaktformular nicht benutzen, da es einen Fehler in der Konfiguration gibt. Es wurde eine E-Mail an den Gründer des Board gesendet.',
	'CONTACT_BOT_NONE'			=> 'Der Benutzer %1$s hat versucht die „Contact Admin“-Extension auf %2$s zu wenden, um eine %3$s zu senden, aber es sind keine Administratoren vorhanden, die %3$ss von Benutzern erlaubt haben. Bitte rufe die Kontaktbot-Einstellungen im Administrations-Bereich für das Board %4$s auf und wähle die „Board Gründer”-Einstellung',
	'CONTACT_BOT_SUBJECT'		=> 'Kontakt Administration Extension Fehler',
	'CONTACT_BOT_USER_MESSAGE'	=> 'Der Benutzer %1$s hat versucht die „Contact Admin“-Extension auf %2$s zu wenden, aber der in den Einstellungen ausgewählte Benutzer ist nicht korrekt. Bitte besuche das Board %3$s und wähle einen anderen Benutzer für die „Contact Administration“-Extension aus.',
	'CONTACT_BOT_FORUM_MESSAGE'	=> 'Der Benutzer %1$s hat versucht die „Contact Admin“-Extension auf %2$s zu wenden, baber das in den Einstellungen ausgewählte Forum ist nicht korrekt. Bitte besuche das Board %3$s und wähle ein anderes Forum für die „Contact Administration“-Extension aus.',
	'CONTACT_CONFIRM'			=> 'Bestätigen',
	'CONTACT_DISABLED'			=> 'Du kannst das Kontaktformular im Moment nicht benutzen, da es deaktiviert ist.',
	'CONTACT_MAIL_DISABLED'		=> 'Es ist ein Fehler in der Konfiguration der "Contact Administration"-Extension aufgetreten.<br />Die Extension wurde so eingerichtet eine E-Mail zu senden, aber die Einstellungen sind eingestellt, um E-Mails zu senden. Bitte informiere die Administratoren oder Webmaster: <a href="mailto:%1$s">%1$s</a>',
	'CONTACT_MSG_SENT'			=> 'Deine Nachricht wurde erfolgreich versendet',
	'CONTACT_NO_MSG'			=> 'Du hast keine Nachricht eingegeben.',
	'CONTACT_NO_SUBJ'			=> 'Du hast keinen Betrett eingegeben.',
	'CONTACT_REASON'			=> 'Grund',
	'CONTACT_TEMPLATE'			=> '[b]Name:[/b] %1$s' . "\n" . '[b]Email-Addresse:[/b] %2$s' . "\n" . '[b]IP:[/b] %3$s' . "\n" . '[b]Betreff:[/b] %4$s' . "\n" . '[b]Hat die folgende Nachricht in das Kontaktformular eingegeben:[/b] %5$s',
	'CONTACT_TITLE'				=> 'Kontakt Administration',
	'CONTACT_TOO_MANY'			=> 'Du hast die maximale Anzahl an möglichen Versuchen den Bestätigungscode auszufüllen erreicht. Bitte versuche es später noch einmal.',

	'CONTACT_YOUR_NAME'			=> 'Dein Name',
	'CONTACT_YOUR_NAME_EXPLAIN'	=> 'Bitte trage deinen Namen ein, damit deine Nachricht zugeordnet werden kann.',
	'CONTACT_YOUR_EMAIL'		=> 'Deine E-Mail-Adresse',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Bitte trage eine gültige E-Mail-Adresse ein, damit wir dich kontaktieren können.',

	'TOO_MANY_CONTACT_TRIES'	=> 'Du hast die maximale Anzahl an möglichen Versuchen für diese Sitzung erreicht. Bitte versuche es später erneut.',
	'CONTACT_NO_NAME'			=> 'Du hast keinen Namen eingetragen.',

	'RETURN_CONTACT'			=> '%sZurück zur Kontaktseite%s',
));
