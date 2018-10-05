<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
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
	'ACP_CAT_CONTACTADMIN'		=> 'Contact Administration',
	'ADD_ATTACHMENT_EXPLAIN'	=> 'If you wish to attach a file enter the details below.',
	'CONTACT_BOT_ERROR'			=> 'You can’t use the contact form at the moment because there is an error in the configuration.  An email has been sent to the founder.',
	'CONTACT_BOT_NONE'			=> 'The user %1$s tried to use the Contact Admin Extension at %2$s to send a %3$s, but there are no Administrators that allow %3$ss by users. Please enter the Contact Bot Configuration in the Admin Panel for the forum %4$s and choose the “Board Founder” option',
	'CONTACT_BOT_SUBJECT'		=> 'Contact Administration Extension Error',
	'CONTACT_BOT_USER_MESSAGE'	=> 'The user %1$s tried to use the Contact Admin extension at %2$s, but the user selected in the configuration is incorrect. Please visit the forum %3$s and choose a different user in the ACP for the Contact Administration.',
	'CONTACT_BOT_FORUM_MESSAGE'	=> 'The user %1$s tried to use the Contact Admin extension at %2$s, but the forum selected in the configuration is incorrect. Please visit the forum %3$s and choose a different forum in the ACP for the Contact Administration.',
	'CONTACT_CONFIRM'			=> 'Confirm',
	'CONTACT_DISABLED'			=> 'You can’t use the contact form at the moment because it is disabled.',
	'CONTACT_MAIL_DISABLED'		=> 'There is an error with the configuration of the Contact  Administration. The extension is set to send an email but the board configuration isn’t setup to send emails.  Please notify the %sBoard Administrator%s',
	'CONTACT_MSG_SENT'			=> 'Your message has been sent successfully',
	'CONTACT_NO_MSG'			=> 'You didn’t enter a message.',
	'CONTACT_NO_SUBJ'			=> 'You didn’t enter a subject.',
	'CONTACT_REASON'			=> 'Reason',
	'CONTACT_TEMPLATE'			=> '[b]Name:[/b] %1$s' . "\n" . '[b]Email Address:[/b] %2$s' . "\n" . '[b]IP:[/b] %3$s' . "\n" . '[b]Subject:[/b] %4$s' . "\n" . '[b]Has entered the following message into the contact form:[/b] %5$s',
	'CONTACT_TITLE'				=> 'Contact Administration',
	'CONTACT_TOO_MANY'			=> 'You have exceeded the maximum number of contact confirmation attempts for this session. Please try again later.',

	'CONTACT_YOUR_NAME'			=> 'Your name',
	'CONTACT_YOUR_NAME_EXPLAIN'	=> 'Please enter your name, so the message has an identity.',
	'CONTACT_YOUR_EMAIL'		=> 'Your email address',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Please enter a valid email address, so we can contact you.',

	'TOO_MANY_CONTACT_TRIES'	=> 'You have exceeded the maximum number of attempts for this session. Please try again later.',
	'CONTACT_NO_NAME'			=> 'You didn’t enter a name.',

	'RETURN_CONTACT'			=> '%sReturn to the contact page%s',
));
