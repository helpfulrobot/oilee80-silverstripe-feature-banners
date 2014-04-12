<?php

class FeatureBanner_MoreInfo_Decorator extends DataExtension {

	private static $db = array(
		'MoreInfoLinkText' => 'Varchar'
	);

	private static $has_one = array(
		'MoreInfoLink' => 'Page'
	);

}
