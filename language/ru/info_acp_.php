<?php

if (empty($lang) || !is_array($lang))
	$lang = [];

$lang += [
    'OVERRIDE_USER_DATEFORMAT'				=> 'Заменять формат даты пользователя',
    'OVERRIDE_USER_DATEFORMAT_EXPLAIN'		=> 'Использовать «Формат даты», установленный выше, для всех пользователей.',
    'OVERRIDE_USER_TIMEZONE'				=> 'Заменять часовой пояс пользователя',
    'OVERRIDE_USER_TIMEZONE_EXPLAIN'		=> 'Использовать «Часовой пояс для гостей», установленный выше, для всех пользователей.',
    'OVERRIDE_USER_TIMEZONE_NOTICE'			=> 'Подсказка о часовом поясе',
    'OVERRIDE_USER_TIMEZONE_NOTICE_EXPLAIN'	=> 'Короткая подсказка, которая будет выводиться в верхней части главной страницы рядом с текущим временем. Например, «Время на форуме московское».',
];
