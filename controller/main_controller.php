<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/
namespace rmcgirr83\contactadmin\controller;

use phpbb\exception\http_exception;
use rmcgirr83\contactadmin\core\contact_constants;

/**
* Main controller
*/
class main_controller
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\event\dispatcher_interface */
	protected $dispatcher;

	/* @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	/* @var \rmcgirr83\contactadmin\core\contactadmin */
	protected $contactadmin;

	/** @var \phpbb\captcha\factory */
	protected $captcha_factory;

	public function __construct(
			\phpbb\auth\auth $auth,
			\phpbb\config\config $config,
			\phpbb\config\db_text $config_text,
			\phpbb\db\driver\driver_interface $db,
			\phpbb\controller\helper $helper,
			\phpbb\event\dispatcher_interface $dispatcher,
			\phpbb\request\request $request,
			\phpbb\template\template $template,
			\phpbb\user $user,
			\phpbb\log\log $log,
			$root_path,
			$php_ext,
			\rmcgirr83\contactadmin\core\contactadmin $contactadmin,
			\phpbb\captcha\factory $captcha_factory,
			\rmcgirr83\topicdescription\event\listener $topicdescription = null)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->config_text = $config_text;
		$this->db = $db;
		$this->helper = $helper;
		$this->dispatcher = $dispatcher;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->log = $log;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->contactadmin = $contactadmin;
		$this->captcha_factory = $captcha_factory;
		$this->topicdescription = $topicdescription;

		$this->contact_reasons = $this->config_text->get_array(array('contactadmin_reasons'));

		//convert the reasons string into an array
		if (!empty($this->contact_reasons['contactadmin_reasons']))
		{
			$this->contact_reasons = explode("\n",$this->contact_reasons['contactadmin_reasons']);
		}
		else
		{
			$this->contact_reasons = array();
		}

		if (!class_exists('messenger'))
		{
			include($this->root_path . 'includes/functions_messenger.' . $this->php_ext);
		}
	}

	/**
	 * Display the form
	 *
	 * @access public
	 */
	public function displayform()
	{
		$this->user->add_lang(array('ucp', 'posting'));
		$this->user->add_lang_ext('rmcgirr83/contactadmin', 'contact');

		if (!$this->config['contactadmin_enable'])
		{
			throw new http_exception(503, 'CONTACT_DISABLED');
		}
		if ($this->user->data['is_bot'])
		{
			throw new http_exception(401, 'NOT_AUTHORISED');
		}

		if (!$this->config['email_enable'] && $this->config['contactadmin_method'] == contact_constants::CONTACT_METHOD_EMAIL)
		{
			$this->config->set('contactadmin_enable', 0);

			// add an entry into the error log
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_EMAIL_INVALID',  time());

			$message = sprintf($this->user->lang('CONTACT_MAIL_DISABLED'), '<a href="mailto:' . htmlspecialchars($this->config['board_contact']) . '">', '</a>');

			return $this->helper->message($message);
		}

		// check to make sure the contact forum is legit for posting
		// has to be able to accept posts
		if ($this->config['contactadmin_method'] == contact_constants::CONTACT_METHOD_POST)
		{
			// check to make sure forum is, ermmm, forum
			// not link and not cat
			$this->contactadmin->contact_check('contact_check_forum', $this->config['contactadmin_forum']);
		}
		else if (in_array($this->config['contactadmin_method'], array(contact_constants::CONTACT_METHOD_EMAIL, contact_constants::CONTACT_METHOD_PM)))
		{
			// quick check to ensure our "bot" is good
			$this->contactadmin->contact_check('contact_check_bot', false, $this->config['contactadmin_bot_user']);
		}

		// Only have contact CAPTCHA confirmation for guests, if the option is enabled
		if ($this->user->data['user_id'] != ANONYMOUS && $this->config['contactadmin_confirm_guests'])
		{
			$this->config['contactadmin_confirm'] = false;
		}

		// our data array
		$data = array(
			'username'			=> ($this->user->data['user_id'] != ANONYMOUS) ?  $this->user->data['username'] : $this->request->variable('username', '', true),
			'email'				=> ($this->user->data['user_id'] != ANONYMOUS) ? $this->user->data['user_email'] : strtolower($this->request->variable('email', '')),
			'contact_reason'	=> $this->request->variable('contact_reason', '', true),
			'contact_subject'	=> $this->request->variable('contact_subject', '', true),
			'contact_message'	=> $this->request->variable('message', '', true),
		);

		add_form_key('contactadmin');

		// Visual Confirmation - The CAPTCHA kicks in here
		if ($this->config['contactadmin_confirm'])
		{
			$captcha = $this->captcha_factory->get_instance($this->config['captcha_plugin']);
			$captcha->init(contact_constants::CONFIRM_CONTACT);
		}

		if ($this->request->is_set_post('submit'))
		{
			$error = array();
			// let's check our inputs against the database..but only for unregistered user and only if so set in ACP
			if (!$this->user->data['is_registered'] && ($this->config['contactadmin_username_chk'] || $this->config['contactadmin_email_chk']))
			{
				if (!function_exists('validate_data'))
				{
					include($this->root_path . 'includes/functions_user.' . $this->php_ext);
				}
				if ($this->config['contactadmin_username_chk'] && $this->config['contactadmin_email_chk'])
				{
					$error = validate_data($data, array(
						'username'			=> array(
							array('string', false, $this->config['min_name_chars'], $this->config['max_name_chars']),
							array('username', '')),
						'email'				=> array(
							array('string', false, 6, 60),
							array('user_email')),
						));
				}
				else if ($this->config['contactadmin_username_chk'])
				{
					$error = validate_data($data, array(
						'username'			=> array(
							array('string', false, $this->config['min_name_chars'], $this->config['max_name_chars']),
							array('username', '')),
						));
				}
				else
				{
					$error = validate_data($data, array(
						'email'				=> array(
							array('string', false, 6, 60),
							array('user_email')),
					));
				}
			}
			// always check for a username
			if (utf8_clean_string($data['username']) === '' && !$this->config['contactadmin_username_chk'])
			{
				$error[] = $this->user->lang('CONTACT_NO_NAME');
			}

			// always check our email addresses
			if (!preg_match('/^' . get_preg_expression('email') . '$/i', $data['email']) && !$this->config['contactadmin_email_chk'])
			{
				$error[] = $this->user->lang('EMAIL_INVALID_EMAIL');
			}

			// check form
			if (!check_form_key('contactadmin'))
			{
				$error[] = $this->user->lang('FORM_INVALID');
			}

			// Replace "error" strings with their real, localised form
			$error = array_map(array($this->user, 'lang'), $error);

			// Validate message and subject
			if (utf8_clean_string($data['contact_subject']) === '' && empty($data['contact_reason']))
			{
				$error[] = $this->user->lang('CONTACT_NO_SUBJ');
			}

			if (utf8_clean_string($data['contact_message']) === '')
			{
				$error[] = $this->user->lang('CONTACT_NO_MSG');
			}

			// CAPTCHA check
			if ($this->config['contactadmin_confirm'] && !$captcha->is_solved())
			{
				$vc_response = $captcha->validate($data);
				if ($vc_response !== false)
				{
					$error[] = $vc_response;
				}

				if ($this->config['contactadmin_max_attempts'] && $captcha->get_attempt_count() > $this->config['contactadmin_max_attempts'])
				{
					$error[] = $this->user->lang('TOO_MANY_CONTACT_TRIES');
				}
			}
			// pretty up the user name..but only for non emails
			if (in_array($this->config['contactadmin_method'], array(contact_constants::CONTACT_METHOD_PM, contact_constants::CONTACT_METHOD_POST)))
			{
				$url = generate_board_url() . '/memberlist.' . $this->php_ext . '?mode=viewprofile&u=' . $this->user->data['user_id'];
				$color = $this->user->data['user_colour'] ? '[color=#' . $this->user->data['user_colour'] . ']' . $this->user->data['username'] . '[/color]' : $this->user->data['username'];
				$user_name = $this->user->data['is_registered'] ? '[url=' . $url . ']' . $color . '[/url]' : $data['username'];
			}
			else
			{
				$user_name = $data['username'];
			}

			if ($this->config['contactadmin_method'] != contact_constants::CONTACT_METHOD_EMAIL)
			{
				// change the users stuff
				if ($this->config['contactadmin_bot_poster'] == contact_constants::CONTACT_POST_ALL || ($this->config['contactadmin_bot_poster'] == contact_constants::CONTACT_POST_GUEST && !$this->user->data['is_registered']))
				{
					$contact_perms = $this->contactadmin->contact_change_auth($this->config['contactadmin_bot_user']);
				}
				if (!function_exists('create_thumbnail'))
				{
					include($this->root_path . 'includes/functions_posting.' . $this->php_ext);
				}
				if (!class_exists('parse_message'))
				{
					include($this->root_path . 'includes/message_parser.' . $this->php_ext);
				}
				$message_parser = new \parse_message();
				// Parse Attachments - before checksum is calculated
				if ($this->config['contactadmin_method'] != contact_constants::CONTACT_METHOD_PM)
				{
					$message_parser->parse_attachments('fileupload', 'post', $this->config['contactadmin_forum'], true, false, false);
				}
				else
				{
					$message_parser->parse_attachments('fileupload', 'post', 0, true, false, false, true);
				}

				// pretty up the message for posts and pms
				$contact_message = censor_text(trim('[quote] ' . $data['contact_message'] . '[/quote]'));

				// there may not be a reason entered in the ACP...so change the template to reflect this
				if (!empty($data['contact_reason']))
				{
					$contact_message = sprintf($this->user->lang('CONTACT_TEMPLATE'), $user_name, $data['email'], $this->user->ip, $data['contact_reason'], $contact_message);
				}
				else
				{
					$contact_message = sprintf($this->user->lang('CONTACT_TEMPLATE'), $user_name, $data['email'], $this->user->ip, $data['contact_subject'], $contact_message);
				}

				$message_parser->message = $contact_message;

				// Grab md5 'checksum' of new message
				$message_md5 = md5($message_parser->message);

				if (count($message_parser->warn_msg))
				{
					$error[] = implode('<br />', $message_parser->warn_msg);
					$message_parser->warn_msg = array();
				}

				$message_parser->parse(true, true, true, true, false, true, true);
			}
			/**
			* Modify data and error strings
			*
			* @event rmcgirr83.contactadmin.modify_data_and_error
			* @var array	error			Error strings
			* @var array	data			An array with data
			* @var	object	message_parser	The message parser object
			* @since 1.0.0
			*/
			$vars = array('error', 'data', 'message_parser');
			extract($this->dispatcher->trigger_event('rmcgirr83.contactadmin.modify_data_and_error', compact($vars)));

			// no errors, let's proceed
			if (!count($error))
			{
				if ($this->config['contactadmin_method'] != contact_constants::CONTACT_METHOD_POST)
				{
					$contact_users = $this->contactadmin->admin_array();
				}

				$subject = (!empty($data['contact_reason'])) ? $data['contact_reason'] : $data['contact_subject'];

				switch ($this->config['contactadmin_method'])
				{
					case contact_constants::CONTACT_METHOD_PM:
						if (!function_exists('submit_pm'))
						{
							include_once($this->root_path . 'includes/functions_privmsgs.' . $this->php_ext);
						}
						$pm_data = array(
							'from_user_id'		=> (int) $this->user->data['user_id'],
							'icon_id'			=> 0,
							'from_user_ip'		=> $this->user->data['user_ip'],
							'from_username'		=> (string) $this->user->data['username'],
							'enable_sig'		=> false,
							'enable_bbcode'		=> true,
							'enable_smilies'	=> true,
							'enable_urls'		=> true,
							'bbcode_bitfield'	=> $message_parser->bbcode_bitfield,
							'bbcode_uid'		=> $message_parser->bbcode_uid,
							'message'			=> $message_parser->message,
							'attachment_data'	=> $message_parser->attachment_data,
							'filename_data'		=> $message_parser->filename_data,
						);

						// Loop through our list of users
						$size = count($contact_users);
						for ($i = 0; $i < $size; $i++)
						{
							$pm_data['address_list'] = array('u' => array($contact_users[$i]['user_id'] => 'to'));
							submit_pm('post', $subject, $pm_data, false);
						}

					break;

					case contact_constants::CONTACT_METHOD_POST:

						$sql = 'SELECT forum_name
							FROM ' . FORUMS_TABLE . '
							WHERE forum_id = ' . (int) $this->config['contactadmin_forum'];
						$result = $this->db->sql_query($sql);
						$forum_name = $this->db->sql_fetchfield('forum_name');
						$this->db->sql_freeresult($result);

						$post_data = array(
							'forum_id'			=> (int) $this->config['contactadmin_forum'],
							'icon_id'			=> false,

							'enable_sig'		=> true,
							'enable_bbcode'		=> true,
							'enable_smilies'	=> true,
							'enable_urls'		=> true,

							'message_md5'		=> (string) $message_md5,

							'bbcode_bitfield'	=> $message_parser->bbcode_bitfield,
							'bbcode_uid'		=> $message_parser->bbcode_uid,
							'message'			=> $message_parser->message,
							'attachment_data'	=> $message_parser->attachment_data,
							'filename_data'		=> $message_parser->filename_data,

							'post_edit_locked'	=> 0,
							'topic_title'		=> $subject,
							'notify_set'		=> false,
							'notify'			=> true,
							'post_time'			=> time(),
							'forum_name'		=> $forum_name,
							'enable_indexing'	=> true,

							'force_approved_state'	=> ITEM_APPROVED,
							'force_visibility' => ITEM_APPROVED,
						);
						if ($this->topicdescription !== null)
						{
							$post_data['topic_desc'] = '';
						}
						$poll = array();

						// Submit the post!
						submit_post('post', $subject, $this->user->data['username'], POST_NORMAL, $poll, $post_data);

					break;

					case contact_constants::CONTACT_METHOD_EMAIL:
					default:

						// Send using email (default)..first remove all bbcodes
						$bbcode_remove = '#\[/?[^\[\]]+\]#';
						$message = censor_text($data['contact_message']);
						$message = preg_replace($bbcode_remove, '', $message);
						$message = htmlspecialchars_decode($message);

						// Some of the code borrowed from includes/ucp/ucp_register.php
						// The first argument of messenger::messenger() decides if it uses the message queue (which we will)

						$messenger = new \messenger(true);

						// Email headers
						$messenger->headers('X-AntiAbuse: Board servername - ' . $this->config['server_name']);
						$messenger->headers('X-AntiAbuse: User_id - ' . $this->user->data['user_id']);
						$messenger->headers('X-AntiAbuse: Username - ' . $this->user->data['username']);
						$messenger->headers('X-AntiAbuse: User IP - ' . $this->user->ip);

						$size = count($contact_users);

						// build an array of all lang directories for the extension and check to make sure we have the lang available that is being chosen
						// if the lang isn't present then errors will present themselves due to no email template found
						$dir_array = $this->contactadmin->dir_to_array($this->root_path .'ext/rmcgirr83/contactadmin/language');
						// Loop through our list of users
						for ($i = 0; $i < $size; $i++)
						{
							$tz = (!empty($contact_users[$i]['user_timezone']) ? $contact_users[$i]['user_timezone'] : $this->config['board_timezone']);
							$date = new \DateTime("now", new \DateTimeZone($tz));
							$date = $date->format('D M d, Y g:i a');

							// now check if the email may exist.  Can't be helped if there is a lang dir and no email dir
							// use en if not exist
							$contact_users[$i]['user_lang'] =  (in_array($contact_users[$i]['user_lang'], $dir_array)) ? $contact_users[$i]['user_lang'] : 'en';
							$messenger->template('@rmcgirr83_contactadmin/contact', $contact_users[$i]['user_lang']);

							$messenger->to($contact_users[$i]['user_email'], $contact_users[$i]['username']);
							$messenger->im($contact_users[$i]['user_jabber'], $contact_users[$i]['username']);
							$messenger->from($data['email']);
							$messenger->replyto($data['email']);

							$messenger->assign_vars(array(
								'ADM_USERNAME'	=> htmlspecialchars_decode($contact_users[$i]['username']),
								'SITENAME'		=> htmlspecialchars_decode($this->config['sitename']),
								'USER_IP'		=> $this->user->ip,
								'USERNAME'		=> $data['username'],
								'USER_EMAIL'	=> htmlspecialchars_decode($data['email']),
								'DATE'			=> $date,

								'SUBJECT'		=> $subject,
								'MESSAGE'		=> $message,
							));

							$messenger->send($contact_users[$i]['user_notify_type']);
						}

						// Save emails in the queue to prevent timeouts
						$messenger->save_queue();

					break;
				}
				//reset captcha
				if ($this->config['contactadmin_confirm'] && (isset($captcha) && $captcha->is_solved() === true))
				{
					$captcha->reset();
				}

				// restore permissions
				if (isset($contact_perms))
				{
					//Restore user
					$this->contactadmin->contact_change_auth('', 'restore', $contact_perms);
				}

				$message = $this->user->lang('CONTACT_MSG_SENT') . '<br /><br />' . sprintf($this->user->lang('RETURN_INDEX'), '<a href="' . append_sid("{$this->root_path}index.$this->php_ext") . '">', '</a>');

				return $this->helper->message($message);
			}
		}
		// Visual Confirmation - Show images
		$s_hidden_fields = array();

		if ($this->config['contactadmin_confirm'])
		{
			$s_hidden_fields = array_merge($s_hidden_fields, $captcha->get_hidden_fields());
		}
		$s_hidden_fields = build_hidden_fields($s_hidden_fields);

		if ($this->config['contactadmin_confirm'] && !$captcha->is_solved())
		{
			$this->template->assign_vars(array(
				'CAPTCHA_TEMPLATE'		=> $captcha->get_template(),
			));
		}

		$form_enctype = (@ini_get('file_uploads') == '0' || strtolower(@ini_get('file_uploads')) == 'off') ? '' : ' enctype="multipart/form-data"';
		$attachment_allowed = false;

		// the forum allows attachments?
		if ($this->config['contactadmin_method'] == contact_constants::CONTACT_METHOD_POST)
		{
			$attachment_allowed = ($this->config['allow_attachments'] && $this->config['contactadmin_attach_allowed'] && $form_enctype) ? true : $attachment_allowed;
		}
		// the forum allows attachments in PMs?
		if ($this->config['contactadmin_method'] == contact_constants::CONTACT_METHOD_PM)
		{
			$attachment_allowed = ($this->config['contactadmin_attach_allowed'] && $this->config['allow_pm_attach'] && $form_enctype) ? true : $attachment_allowed;
		}

		// restore permissions
		if (isset($contact_perms))
		{
			//Restore user
			$this->contactadmin->contact_change_auth('', 'restore', $contact_perms);
		}

		$l_admin_info = $this->config_text->get('contact_admin_info');
		if ($l_admin_info)
		{
			$contactadmin_data			= $this->config_text->get_array(array(
				'contact_admin_info',
				'contact_admin_info_uid',
				'contact_admin_info_bitfield',
				'contact_admin_info_flags',
			));

			$l_admin_info = generate_text_for_display(
				$contactadmin_data['contact_admin_info'],
				$contactadmin_data['contact_admin_info_uid'],
				$contactadmin_data['contact_admin_info_bitfield'],
				$contactadmin_data['contact_admin_info_flags']
			);
		}

		$this->template->assign_vars(array(
			'USERNAME'			=> isset($data['username']) ? $data['username'] : '',
			'EMAIL'				=> isset($data['email']) ? $data['email'] : '',
			'CONTACT_REASONS'	=> $this->contactadmin->contact_make_select($this->contact_reasons, $data['contact_reason']),
			'CONTACT_SUBJECT'	=> isset($data['contact_subject']) ? $data['contact_subject'] : '',
			'CONTACT_MESSAGE'	=> isset($data['contact_message']) ? $data['contact_message'] : '',
			'CONTACT_INFO'		=> $l_admin_info,

			'L_CONTACT_YOUR_NAME_EXPLAIN'	=> $this->config['contactadmin_username_chk'] ? sprintf($this->user->lang($this->config['allow_name_chars'] . '_EXPLAIN'), $this->config['min_name_chars'], $this->config['max_name_chars']) : $this->user->lang('CONTACT_YOUR_NAME_EXPLAIN'),

			'S_ATTACH_BOX'			=> ($this->config['contactadmin_method'] == contact_constants::CONTACT_METHOD_EMAIL) ? false : $attachment_allowed,
			'S_FORM_ENCTYPE'		=> $form_enctype,
			'S_CONFIRM_REFRESH'		=> ($this->config['contactadmin_confirm']) ? true : false,
			'S_EMAIL'				=> ($this->config['contactadmin_method'] == contact_constants::CONTACT_METHOD_EMAIL) ? true : false,

			'S_HIDDEN_FIELDS'		=> $s_hidden_fields,
			'S_ERROR'				=> (isset($error) && count($error)) ? implode('<br />', $error) : '',
			'S_CONTACT_ACTION'		=> $this->helper->route('rmcgirr83_contactadmin_displayform'),
		));

		// Send all data to the template file
		return $this->helper->render('contactadmin_body.html', $this->user->lang('ACP_CAT_CONTACTADMIN'));
	}
}
