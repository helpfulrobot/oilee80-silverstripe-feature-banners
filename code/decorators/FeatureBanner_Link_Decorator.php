<?php

class FeatureBanner_Link_Decorator extends DataExtension {

	private static $db = array(
		'LinkText' => 'Varchar'
	);

	private static $has_one = array(
		'Link' => 'Page'
	);

}
