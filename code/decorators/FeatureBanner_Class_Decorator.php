<?php

/**
 * Decorator for FeatureBanner
 * @param FeatureBanner $owner
 * @todo Change field to multi data field as opposed to just a single option
 */
class FeatureBanner_Class_Decorator extends DataExtenstion {

	private static $db = array(
		'CssClass' => 'Varchar'
	);

	private static $cssClasses = array();

	/**
	 * @param String $class The css Class that will be rendered
	 * @param String $title The title for the css class, if left blank, then the css class is used
	 */
	public static function addCssClass( $class, $title = null ) {
		static::$cssClasses[ $class ] = ( $title ) ? $title : $class;
	}

	public function updateCMSFields( FieldList $fields ) {
		$fields->addFieldToTab(
			'Root.Main',
			new DropdownField(
				'CssClass', 
				_t(
					'FEATURE_BANNERS.CMSFields.CssClass',
					'css Class',
					'Feature Banners `CssClass` Label'
				)
			)
		);
	}
}