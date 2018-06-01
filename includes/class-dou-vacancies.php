<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Dou_Vacancies {

	const DOU_VACANCIES_URI_PATTERN = 'https://jobs.dou.ua/vacancies/{company}/feeds/';
	const DOU_VACANCY_URI_REGEX = '#.*/companies/(.*)/vacancies/(\d+).*#i';

	public static function loadAll($company) {
		try {
			return Feed::loadRss(str_replace('{company}', $company, self::DOU_VACANCIES_URI_PATTERN));
		} catch (FeedException $e) {
			return null;
		}
	}

	public static function loadOne($url) {
		preg_match(self::DOU_VACANCY_URI_REGEX, $url, $persed_uri);

		if (isset($persed_uri[1]) && isset($persed_uri[2])){
			try {
				$data = Feed::loadRss(str_replace('{company}', $persed_uri[1], self::DOU_VACANCIES_URI_PATTERN));
			} catch (FeedException $e) {
				$data = null;
			}
			if ($data) {
				foreach($data->item as $item) {
					if (stristr($item->link, "vacancies/{$persed_uri[2]}")) {
						return $item;
					}
				}
			}
		}
		return null;
	}
}
