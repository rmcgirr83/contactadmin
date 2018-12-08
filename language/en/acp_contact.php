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
	'CONTACT_CONFIG_SAVED'			=> 'Contact Board Administration configuration has been updated',
	'CONTACT_ENABLE'				=> 'Enable Contact Board Administration Extension',
	'CONTACT_ENABLE_EXPLAIN'		=> 'Enable or disable the extension globally',
	'CONTACT_ACP_CONFIRM'				=> 'Enable visual confirmation',
	'CONTACT_ACP_CONFIRM_EXPLAIN'		=> 'If you enable this option, users will have to enter a visual confirmation to send the message.<br>This is to prevent spam messages. Note that this option is for the contact page only.  It does not affect other visual confirmation settings.',
	'CONTACT_ATTACHMENTS'				=> 'Attachments allowed',
	'CONTACT_ATTACHMENTS_EXPLAIN'		=> 'If set attachments will be allowed in posting to the forum and private messages.<br>The extensions allowed are the same as the board configuration.<br><span style="color:red;">Does not apply for contact method via “EMail”.</span>',
	'CONTACT_CONFIRM_GUESTS'			=> 'Visual confirmation for guests only',
	'CONTACT_CONFIRM_GUESTS_EXPLAIN'	=> 'If this option is enabled, the visual confirmation is only displayed to guests (if it’s enabled).',
	'CONTACT_FOUNDER'					=> 'Contact via just the Board Founder',
	'CONTACT_FOUNDER_EXPLAIN'			=> 'If set only the Founder of the Forum will get Email or PM notifications.',
	'CONTACT_GENERAL_SETTINGS'			=> 'General contact page settings',
	'CONTACT_MAX_ATTEMPTS'				=> 'Maximum confirmation attempts',
	'CONTACT_MAX_ATTEMPTS_EXPLAIN'		=> 'How many times may a user attempt to enter the correct confirmation image?<br>Enter 0 for unlimited attempts.',
	'CONTACT_METHOD'					=> 'Contact method',
	'CONTACT_METHOD_EXPLAIN'			=> 'How do you want users to be able to make contact.<br><span style="color:red;">If set as “EMail” then attachments do not apply.</span>',
	'CONTACT_REASONS'					=> 'Contact reasons',
	'CONTACT_REASONS_EXPLAIN'			=> 'Enter reasons for contacting, separated by new lines.<br>If you don’t want to use this feature, leave this field empty.',
	// Bot config options
	'CONTACT_BOT_FORUM'				=> 'Contact bot forum',
	'CONTACT_BOT_FORUM_EXPLAIN'		=> 'Select the forum, where the contact bot should post to, if the contact method is set to “Forum post”.',
	'CONTACT_BOT_POSTER'			=> 'Bot as Poster',
	'CONTACT_BOT_POSTER_EXPLAIN'	=> 'If set PM’s and posts will seem to come from the contact bot user chosen above based on the settings here. If “Neither” is selected then the bot is not used as the poster.  Posts and PM’s will be posted based on the information entered in the contact form.',
	'CONTACT_BOT_USER'				=> 'Contact bot user',
	'CONTACT_BOT_USER_EXPLAIN'		=> 'Select the user that messages will be posted under if the contact method is set to “Private Message” or “Forum Post”.',
	'CONTACT_USERNAME_CHK'			=> 'Check Username',
	'CONTACT_USERNAME_CHK_EXPLAIN'	=> 'If set yes, the users name that is entered will be checked against those in the database. If a similar name is found the user will be presented with an error and asked to input a different user name.',
	'CONTACT_EMAIL_CHK'				=> 'Check Email',
	'CONTACT_EMAIL_CHK_EXPLAIN'		=> 'If set yes, the users email will be checked against those in the database. If a similar email is found the user will be presented with an error and asked to input a different email address.',

	// Contact methods
	'CONTACT_METHOD_EMAIL'			=> 'Email',
	'CONTACT_METHOD_PM'				=> 'Private message',
	'CONTACT_METHOD_POST'			=> 'Forum post',

	// Contact posters...user bot
	'CONTACT_POST_NEITHER'			=> 'Neither',
	'CONTACT_POST_GUEST'			=> 'Guests only',
	'CONTACT_POST_ALL'				=> 'Everyone',
));
