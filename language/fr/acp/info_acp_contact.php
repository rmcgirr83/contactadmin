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
	'ACP_CAT_CONTACTADMIN'	=> 'Formulaire de contact',
	'ACP_CONTACTADMIN_CONFIG'	=> 'Configuration',
	'FORUM_EMAIL_INACTIVE'	=> 'La manière dont vous souhaitez que l’utilisateur vous contact.<br><span style="color:red;">L’envoi d’e-mail n’est pas autorisé selon les paramètres du forum</span>',
	'NO_FORUM_ATTACHMENTS'		=> 'Si sélectionné, les fichiers joints seront autorisé lors de l’envoi d’un message sur le forum ou par messagerie privée. Les extensions autorisées sont les mêmes que celles autorisées dans la configuration globale du forum.<br><span style="color:red;">Pas de fichier joint permis selon la configuration du forum !</span>',
	// Log entries
	'LOG_CONFIG_CONTACT_ADMIN'		=> '<strong>Configuration de l’extension Formulaire de contact modifiée</strong>',
	'LOG_CONTACT_BOT_INVALID'		=> '<strong>L’extension Formulaire de Contact est paramétrée avec un mauvais utilisateur comme utilisateur robot :</strong><br />Identifiant de l’utilisateur %1$s',
	'LOG_CONTACT_FORUM_INVALID'		=> '<strong>L’extension Formulaire de contact est paramétrée avec un forum invalide :</strong><br />Identifiant du forum %1$s',
	'LOG_CONTACT_EMAIL_INVALID'		=> '<strong>L’extension Formulaire de contact est paramétrée pour générer des e-mais mais le forum ne permet pas cela. L’extension a été désactivée.',
	'LOG_CONTACT_NONE'				=> '<strong>Aucun Administrateur ne permet aux utilisateurs de le contacter via %1$s dans les paramètres de l’extension Formulaire de contact</strong>',
	'LOG_CONTACT_CONFIG_UPDATE'		=> '<strong>Configuration de l’extension Formulaire de contact mise à jour</strong>',
	//Donation
	'PAYPAL_IMAGE_URL'          => 'https://www.paypalobjects.com/webstatic/en_US/i/btn/png/silver-pill-paypal-26px.png',
	'PAYPAL_ALT'                => 'Donner via PayPal',
	'BUY_ME_A_BEER_URL'         => 'https://paypal.me/RMcGirr83',
	'BUY_ME_A_BEER'				=> 'Achetez-moi une bière pour la création de cette extension',
	'BUY_ME_A_BEER_SHORT'		=> 'Faire une donation pour cette extension',
	'BUY_ME_A_BEER_EXPLAIN'		=> 'Cette extension est totalement gratuite. Il s’agit d’un projet pour lequel j’ai donné du temps pour le plaisir et l’utilisation par la communauté phpBB. Si vous aimez cette extension, ou qu’elle a bénéficiée à votre forum, vous pouvez <a href="https://paypal.me/RMcGirr83" target="_blank" rel="noreferrer noopener">m’offrir une bière</a>. Ce serait très apprécié. <i class="fa fa-smile-o" style="color:green;font-size:1.5em;" aria-hidden="true"></i>',
]);
