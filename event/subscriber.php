<?php

namespace nekstati\override_timezone\event;

class subscriber implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return [
			'core.user_setup'					=> 'user_setup',
			'core.acp_board_config_edit_add'	=> 'acp_board_config_edit_add',
			'core.page_footer_after'			=> 'common_overwrite_template_vars',
			'core.adm_page_footer'				=> 'common_overwrite_template_vars',
		];
	}


	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\template\template */
	protected $template;


	public function __construct(
		\phpbb\config\config $config,
		\phpbb\template\template $template
	)
	{
		$this->config		= $config;
		$this->template 	= $template;
	}


	public function user_setup($event)
	{
		if ($this->config['override_user_dateformat'])
			$event['user_date_format'] = $this->config['default_dateformat'];

		if ($this->config['override_user_timezone'])
			$event['user_timezone'] = $this->config['board_timezone'];
	}


	public function acp_board_config_edit_add($event)
	{
		if ($event['mode'] != 'settings')
			return;

		$display_vars = $event['display_vars'];
		$new_options = [
			'override_user_dateformat'		=> ['lang' => 'OVERRIDE_USER_DATEFORMAT',		'validate' => 'bool',	'type' => 'radio:yes_no', 'explain' => true],
			'override_user_timezone'		=> ['lang' => 'OVERRIDE_USER_TIMEZONE',			'validate' => 'bool',	'type' => 'radio:yes_no', 'explain' => true],
			'override_user_timezone_notice'	=> ['lang' => 'OVERRIDE_USER_TIMEZONE_NOTICE',	'validate' => 'string',	'type' => 'text:40:255', 'explain' => true],
		];
        $position = array_search('board_timezone', array_keys($display_vars['vars'])) + 1;
        $display_vars['vars'] = array_merge(
            array_slice($display_vars['vars'], 0, $position),
            $new_options,
            array_slice($display_vars['vars'], $position)
        );
		$event['display_vars'] = $display_vars;
	}


	public function common_overwrite_template_vars($event)
	{
		$this->template->assign_vars([
			'OVERRIDE_USER_DATEFORMAT'	=> $this->config['override_user_dateformat'],
			'OVERRIDE_USER_TIMEZONE'	=> $this->config['override_user_timezone'],
		]);

		if ($this->config['override_user_timezone'] && $this->config['override_user_timezone_notice'])
			$this->template->append_var('CURRENT_TIME', '<br />' . htmlspecialchars($this->config['override_user_timezone_notice']));
	}
}
