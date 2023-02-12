<?php
/**
*
* Contact Admin extension for the phpBB Forum Software package.
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
	'ADMINS_NOT_EXIST_FOR_METHOD'	=> [
		0 => 'Il n’y a pas d’Administrateurs qui autorise les e-mails. Vous devez choisir une méthode de contact différente.',
		2 => 'Il n’y a pas d’Administrateurs qui autorise les messages privés. Vous devez choisir une méthode de contact différente.',
	],
	'CONTACT_CONFIG_SAVED'			=> 'Configuration de l’extension Formulaire de contact mise à jour',
	'CONTACT_ACP_CONFIRM'				=> 'Activer la confirmation visuelle',
	'CONTACT_ACP_CONFIRM_EXPLAIN'		=> 'Si activée, l’utilisateur devra entrer une confirmation visuelle pour envoyer le message.<br>Cela permet d’éviter les spams. Notez que cette option n’affecte uniquement que la page de contact.',
	'CONTACT_ATTACHMENTS'				=> 'Permettre l’ajout de fichiers joints',
	'CONTACT_ATTACHMENTS_EXPLAIN'		=> 'Si activée, des fichiers joints pourront être ajouté lors de l’envoi d’un message dans un sujet du forum ou via messagerie privé.<br>Les extensions autorisées sont les mêmes que celles autorisées dans la configuration globale du forum.<br><span style="color:red;">N’a aucun effet pour la méthode via “E-mail”.</span>',
	'CONTACT_CONFIRM_GUESTS'			=> 'Confirmation visuelle uniquement pour les invités',
	'CONTACT_CONFIRM_GUESTS_EXPLAIN'	=> 'Si activée, la confirmation visuelle ne sera demandée que pour les utilisateurs invités.',
	'CONTACT_FOUNDER'					=> 'N’envoyer qu’au propriétaire du forum',
	'CONTACT_FOUNDER_EXPLAIN'			=> 'Si activée, seul le propriétaire du forum recevra les e-mails et messages privés.',

	'CONTACT_MAX_ATTEMPTS'				=> 'Nombre maximal de tentatives de confirmation',
	'CONTACT_MAX_ATTEMPTS_EXPLAIN'		=> 'Combien de fois un utilisateur peut tenter d’entrer la confirmation visuelle ?<br>Indiquer 0 pour un nombre d’essai illimité.',
	'CONTACT_METHOD'					=> 'Méthode de contact',
	'CONTACT_METHOD_EXPLAIN'			=> 'Par quel moyen un utilisateur peut prendre contact.<br><span style="color:red;">Il n’est pas possible de joindre des fichiers avec la méthode “E-mail”.</span>',
	'CONTACT_REASONS'					=> 'Sujets de contact',
	'CONTACT_REASONS_EXPLAIN'			=> 'Entrer les différentes raisons de contact (une nouvelle ligne pour chaque sujet).<br>Si vous ne souhaitez pas utiliser cette option, laissez le champs vide.',
	// Bot config options
	'CONTACT_BOT_FORUM'				=> 'Catégorie des messages',
	'CONTACT_BOT_FORUM_EXPLAIN'		=> 'Sélectionner la catégorie du forum où le robot devra poster un message si la méthode sélectionnée est “Message dans une catégorie du forum”.',
	'CONTACT_BOT_POSTER'			=> 'Robot comme expéditeur/créateur',
	'CONTACT_BOT_POSTER_EXPLAIN'	=> 'Si la méthode de contact est définie sur “Message privé” ou “Message dans une catégorie du forum” les utilisateurs verront le nom de l’expéditeur/créateur remplacé par le nom du robot choisi ci-dessus. Si “Aucun” est sélectionné, le nom ne sera pas remplacé. Le nom affiché sera celui encodé via le formulaire de contact par l’utilisateur.',
	'CONTACT_BOT_USER'				=> 'Nom d’utilisateur pour le robot',
	'CONTACT_BOT_USER_EXPLAIN'		=> 'Sélectionner l’utilisateur qui sera affiché comme expéditeur/créateur si la méthode de contact est “Message privé” ou “Message dans une catégorie du forum”.',
	'CONTACT_NO_BOT_USER'			=> '<b>L’identifiant de l’utilisateur n’existe pas</b>',
	'CONTACT_USERNAME_CHK'			=> 'Vérifier le nom d’utilisateur',
	'CONTACT_USERNAME_CHK_EXPLAIN'	=> 'Si activée, l’existence du nom d’utilisateur encodé par l’utilisateur dans la base de données sera vérifiée. Si une correspondance existe, une erreur sera affichée et l’utilisateur devra encoder un autre nom d’utilisateur.',
	'CONTACT_EMAIL_CHK'				=> 'Vérifier l’adresse e-mail',
	'CONTACT_EMAIL_CHK_EXPLAIN'		=> 'Si activée, l’existence de l’adresse e-mail encodée par l’utilisateur dans la base de données sera vérifiée. Si une correspondance existe, une erreur sera affichée et l’utilisateur devra encoder une autre adresse e-mail.',

	// Contact methods
	'CONTACT_METHOD_EMAIL'			=> 'E-mail',
	'CONTACT_METHOD_PM'				=> 'Message privé',
	'CONTACT_METHOD_POST'			=> 'Message dans une catégorie du forum',
	'CONTACT_METHOD_BOARD_DEFAULT'	=> 'E-mail par défaut du forum',

	// Contact posters...user bot
	'CONTACT_POST_NEITHER'			=> 'Aucun',
	'CONTACT_POST_GUEST'			=> 'Invités seulement',
	'CONTACT_POST_ALL'				=> 'Tout le monde',

	// Overwrite the default contact page lang
	'CONTACT_EXTENSION_ACTIVE'	=> '<span style="color:red;">Les paramètres ici n’ont pas d’impact car l’extension Formulaire de contact est activée. Vous devez d’abord désactiver cette extension.</span>',
	'CONTACT_GDPR'	=> 'RGPD',
	'CONTACT_GDPR_EXPLAIN' => 'Si activée, l’utilisateur devra marquer son accord avec la politique de confidentialité du forum. La case devra être cochée pour que le message puisse être envoyé.',
	'EMAIL_NOT_CONFIGURED' => 'L’envoi d’e-mail n’est pas configuré pour le forum, veuillez choisir une autre méthode de contact.',
]);
