<?php

class FeatureBanner extends DataObject {
	
	/**
	 * Human-readable singular name.
	 * @var string
	 * @config
	 */
	private static $singular_name = 'Feature Banner';
	
	/**
	 * Human-readable pluaral name
	 * @var string
	 * @config
	 */
	private static $plural_name = 'Feature Banners';

	private static $db = array(
		'Title' => 'Varchar(255)'
	);

	private static $has_one = array(
		'Image' => 'Image'
	);
}
