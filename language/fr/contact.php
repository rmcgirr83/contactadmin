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
	'ACP_CAT_CONTACTADMIN'		=> 'Formulaire de contact',
	'ADD_ATTACHMENT_EXPLAIN'	=> 'Si vous souhaitez joindre un fichier, suivez les instructions ci-dessous.',
	'CONTACT_ERROR'			=> 'Le formulaire de contact est actuellement indisponible car il y a une erreur de configuration. Un e-mail a été envoyé au propriétaire.',
	'CONTACT_NONE'			=> 'L’utilisateur %1$s a essayé d’utiliser l’extension Formulaire de contact à %2$s pour envoyé un %3$s, mais il n’y a pas d’Administrateurs qui permettent %3$ss par les utilisateurs. Veuillez modifier la configuration de l’extension Formulaire de contact pour le forum %4$s et choisir une méthode de contact différente',
	'CONTACT_BOT_SUBJECT'		=> 'Erreur avec l’extension Formulaire de contact',
	'CONTACT_BOT_MESSAGE'	=> 'L’utilisateur %1$s a essayé d’utiliser l’extension Formulaire de contact à %2$s, mais le %3$s sélectionné dans la configuration est incorrect. Veuillez visiter le forum %4$s et choisir une différente %3$s dans les paramètres de l’extension Formulaire de contact.',
	'CONTACT_CONFIRM'			=> 'Confirmer',
	'CONTACT_DISABLED'			=> 'Vous ne pouvez pas utiliser le formulaire de contact pour l’instant car il est désactivé.',
	'CONTACT_MAIL_DISABLED'		=> 'Il y a une erreur avec la configuration du formulaire de contact. L’extension a été paramétrée pour envoyer un e-mail mais la configuration du forum n’est pas paramétrée pour envoyer les e-mails. Veuillez notifier l’%sAdministrateur du forum%s',
	'CONTACT_MSG_SENT'			=> 'Votre message a bien été envoyé',
	'CONTACT_NO_MSG'			=> 'Vous n’avez pas écrit de message',
	'CONTACT_NO_SUBJ'			=> 'Vous n’avez pas écrit de sujet',
	'CONTACT_REASON'			=> 'Raison',
	'CONTACT_TEMPLATE'			=> '[b]Nom:[/b] %1$s' . "\n" . '[b]Adresse e-mail:[/b] %2$s' . "\n" . '[b]IP:[/b] %3$s' . "\n" . '[b]Sujet:[/b] %4$s' . "\n" . '[b]A écrit le message suivant via le formulaire de contact:[/b] %5$s',
	'CONTACT_TITLE'				=> 'Formulaire de contact',

	'CONTACT_YOUR_NAME'			=> 'Nom',
	'CONTACT_YOUR_NAME_EXPLAIN'	=> 'Veuillez entrer votre prénom et nom afin de vous identifier comme expéditeur.',
	'CONTACT_YOUR_EMAIL'		=> 'Adresse e-mail',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Veuillez entrer une adresse e-mail valide afin que nous puissions vous répondre.',
	'CONTACT_YOUR_EMAIL_CONFIRM'	=> 'Confirmation de l’adresse e-mail',
	'WRONG_DATA_EMAIL'			=> 'Les adresses e-mail ne correspondent pas',

	'TOO_MANY_CONTACT_TRIES'	=> 'Vous avez atteint le nombre maximum de tentative pour cette session. Veuillez réessayer plus tard.',
	'CONTACT_NO_NAME'			=> 'Vous n’avez pas entré de nom',
	'FORUM'						=> 'forum',
	'USER'						=> 'utilisateur',
	'CONTACT_REGISTERED'		=> 'Utilisateur enregistré',
	'CONTACT_GUEST'				=> 'Invité',

	'REASON_EXPLAIN'			=> 'Veuillez choisir une raison',
	'REASON_ERROR'				=> 'Veuillez choisir une raison valide',
	'RETURN_CONTACT'			=> '%sRetourner à la page de contact%s',
	'CONTACT_PRIVACYPOLICY'				=> 'Politique de confidentialité',
	'CONTACT_PRIVACYPOLICY_EXPLAIN'		=> 'Je confirme que mon prénom, nom, adresse e-mail, message écrit et mon adresse IP seront traîtés et stockés par le propriétaire du forum selon <a target="_blank" title="Lien vers la politique de confidentialité" href="%s">la politique de confidentialité</a>',
	'CONTACT_PRIVACYPOLICY_ERROR'		=> 'Veuillez sélectionner la politique de confidentialité. En l’absence de votre accord, nous ne pourrons pas vous répondre.',
]);
