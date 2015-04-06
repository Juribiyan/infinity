<?php
require_once("inc/8chan-functions.php");
require_once("inc/8chan-mod-pages.php");

function max_posts_per_hour($post) {
	global $config, $board;
	if (!$config['hour_max_threads']) return false;

	if ($post['op']) {
		$query = prepare(sprintf('SELECT COUNT(*) AS `count` FROM ``posts_%s`` WHERE `thread` IS NULL AND FROM_UNIXTIME(`time`) > DATE_SUB(NOW(), INTERVAL 1 HOUR);', $board[$
		$query->bindValue(':ip', $_SERVER['REMOTE_ADDR']);
		$query->execute() or error(db_error($query));
		$r = $query->fetch(PDO::FETCH_ASSOC);

		return ($r['count'] > $config['hour_max_threads']);
	}
}
