<?php

class FeatureBanner_SecondaryLink_Decorator extends DataExtension
{

    private static $db = array(
        'SecondaryLinkText' => 'Varchar'
    );

    private static $has_one = array(
        'SecondaryLink' => 'Page'
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            new TextField(
                'SecondaryLinkText',
                _t(
                    'FEATURE_BANNERS.CMSFields.SecondaryLinkText',
                    'Secondary Link Text',
                    'Feature Banners `SecondaryLinkText` Label'
                )
            )
        );

        $fields->addFieldToTab(
            'Root.Main',
            new TreeDropdownField(
                'SecondaryLinkID',
                _t(
                    'FEATURE_BANNERS.CMSFields.SecondaryLink',
                    'Secondary Link',
                    'Feature Banners `SecondaryLink` Label'
                ),
                'SiteTree'
            )
        );
    }
}
