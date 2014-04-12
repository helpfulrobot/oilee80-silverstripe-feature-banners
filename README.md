# Feature Banners plugin

Adds the ability to manage Banner's for DataObject's (mainly SiteTree DataObject's).

## Usage

```php
Object::add_extension( 'Page', 'FeatureBannerDecorator' );
```

You can add extra fields to the FeatureBanner using further Decorators, some are included here

* FeatureBanner_Description_Decorator
  * Adds a Description Field (HTMLText)
* FeatureBanner_Link_Decorator
  * Adds ability to link to a page on or off the site
* FeatureBanner_MoreInfo_Decorator
  * Adds ability to link to another page on or of the site
* FeatureBanner_Expiry_Decorator
  * Adds ability to set Publish & Expiry DateTimes for the Banner

# Development

Grunt is used for building the CSS in this package from LESS, if you want to include the builtin CSS without including a separate CSS file then you can add `css/less/feature-banners.less` in your Gruntfile.js config