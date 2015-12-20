<?php

/**
 */
class FeatureBannerAdmin extends ModelAdmin
{

    public static $managed_models = array(
        'FeatureBanner'
    );

    public static $url_segment = 'feature-banners';

    public static $menu_title = 'Feature Banners';
}
