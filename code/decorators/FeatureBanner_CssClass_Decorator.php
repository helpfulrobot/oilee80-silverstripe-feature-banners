<?php

/**
 * Decorator for FeatureBanner
 * @param FeatureBanner $owner
 * @todo Change $cssClasses to a YAML config
 */
class FeatureBanner_CssClass_Decorator extends DataExtension {

	private static $db = array(
		'CssClass' => 'MultiValueField'
	);

	private static $cssClasses = array( '' => '< None >' );

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
			new MultiValueDropdownField(
				'CssClass', 
				_t(
					'FEATURE_BANNERS.CMSFields.CssClass',
					'css Class',
					'Feature Banners `CssClass` Label'
				),
				static::$cssClasses
			)
		);
	}
}