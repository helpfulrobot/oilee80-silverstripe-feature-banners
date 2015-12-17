<?php

class FeatureBannerDecorator extends DataExtension
{

    private static $db = array(
        'InheritFeatureBanners' => 'Boolean'
    );

    private static $many_many = array(
        'FeatureBanners' => 'FeatureBanner'
    );

    private static $many_many_extraFields = array(
        'FeatureBanners' => array(
            'Sort' => 'Int'
        )
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->findOrMakeTab(
            'Root.FeatureBanners',
            _t(
                'FEATURE_BANNERS.CMSFields.FeatureBannersTab',
                'FeatureBanners',
                'CMS Admin tab name for `FeatureBanners`'
            )
        );
        $fields->addFieldToTab(
            'Root.FeatureBanners',
            $inheritField = new CheckboxField(
                'InheritFeatureBanners',
                _t(
                    'FEATURE_BANNERS.CMSFields.InheritFeatureBanners',
                    'Inherit Feature Banners',
                    'CMS Admin Label for `InheritFeatureBanners`'
                )
            )
        );
        $fields->addFieldToTab(
            'Root.FeatureBanners',
            $featureBanners = new GridField(
                'FeatureBanners',
                _t(
                    'FEATURE_BANNERS.CMSFields.FeatureBanners',
                    'Feature Banners',
                    'CMS Admin Label for `FeatureBanners`'
                ),
                $this->owner->getManyManyComponents('FeatureBanners'),    // Need to call DataObject::getManyManyComponents directly otherwise would show inherited values
                GridFieldConfig_RelationEditor::create()->addComponent(
                    new GridFieldSortableRows('Sort')
                )
            )
        );
    }

    /**
     * Wrapper for DataObject::getManyManyComponents() with check for InheritFeatureBanners
     *
     * @param string $filter Filter to add to ManyManyList Query
     * @param string $sort
     * @param string $join
     * @param string $limit
     * @return ManyManyList The set of components
     */
    public function FeatureBanners($filter = "", $sort = "", $join = "", $limit = "")
    {
        if (trim($sort)) {
            $sort = sprintf('%s, Sort ASC');
        } else {
            $sort = 'Sort ASC';
        }
        if ($this->owner->InheritFeatureBanners && $parent = $this->owner->Parent()) {
            return $parent->FeatureBanners($filter, $sort, $join, $limit);
        } else {
            return $this->owner->getManyManyComponents(__FUNCTION__, $filter, $sort, $join, $limit);
        }
    }

    private static $includeCSS = true;

    public static function setIncludeCSS($val)
    {
        static::$includeCSS = $val;
    }

    /**
     * Render the FeatureBanners
     * @return String
     */
    public function FeatureBannersHTML()
    {
        // Check if there are any FeatureBanners, before doing further checks
        if (!$this->FeatureBanners()->Count()) {
            return false;
        }
        if (static::$includeCSS) {
            Requirements::css(FEATURE_BANNERS_FOLDER . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'feature-banners.min.css');
        }

        $templates = array( 'FeatureBanners' );
        $classes = array_reverse(ClassInfo::ancestry($this->owner->ClassName));
        foreach ($classes as $class) {
            $template = sprintf('FeatureBanners_%s', $class);
            if (SSViewer::hasTemplate($template)) {
                $templates[] = $template;
            }
            if ($class == 'SiteTree') {
                break;
            }
        }
        return $this->owner->renderWith($templates);
    }
}
