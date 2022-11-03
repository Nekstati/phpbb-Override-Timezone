<?php

namespace nekstati\override_timezone\migrations;

class v100 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\dev'];
	}

	public function update_data()
	{
		return [
			['config.add', ['override_user_dateformat', 0]],
			['config.add', ['override_user_timezone', 0]],
			['config.add', ['override_user_timezone_notice', '']],
		];
	}
}
