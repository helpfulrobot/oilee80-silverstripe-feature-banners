<?php

class FeatureBanner_Expiry_Decorator extends DataExtension
{

    private static $db = array(
        'PublishOn' => 'DateTime',
        'ExpireOn' => 'DateTime'
    );

    /**
     * Wrapper for the default call to FeatureBanners to add filter for Publish/Expiry conditions
     * @param String $filter Any additional filtering beyond the publish/expiry conditions
     * @param String $sort Sort conditions
     * @param String $join Join conditions
     * @param String $limit Limit Conditions
     * @return ManyManyList The set of components
     */
    public function PublishedFeatureBanners($filter = "", $sort = "", $join = "", $limit = "")
    {
        $publishFilter = printf('"PublishOn" <= \'%s\' AND "ExpireOn" > \'%s\'', date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
        if ($filter) {
            $filter = sprintf('(%s) AND (%s)', $filter, $publishFilter);
        } else {
            $filter = $publishFilter;
        }
        return $this->owner->FeatureBanners($filter, $sort, $join, $limit);
    }
}
