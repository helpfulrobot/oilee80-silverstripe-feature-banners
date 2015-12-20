<?php

class FeatureBanner_PrimaryLink_Decorator extends DataExtension
{

    private static $db = array(
        'PrimaryLinkText' => 'Varchar'
    );

    private static $has_one = array(
        'PrimaryLink' => 'Page'
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            new TextField(
                'PrimaryLinkText',
                _t(
                    'FEATURE_BANNERS.CMSFields.PrimaryLink_Text',
                    'Primary Link Text',
                    'Feature Banners `Primary Link Text` Label'
                )
            )
        );

        $fields->addFieldToTab(
            'Root.Main',
            new TreeDropdownField(
                'PrimaryLinkID',
                _t(
                    'FEATURE_BANNERS.CMSFields.PrimaryLink_Link',
                    'Primary Link',
                    'Feature Banners `Primary Link` Label'
                ),
                'SiteTree'
            )
        );
    }
}
