<?php

/**
 * Slide
 *
 * @package SwiftDevLabs\SSBanner\Model
 * @author Kong Jin Jie <jinjie@swiftdev.sg>
 */

namespace SwiftDevLabs\SSBanner\Model;

use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;

class Slide extends DataObject
{
    private static $table_name = 'Slide';
    
    private static $db = [
        'Title'      => 'Varchar(200)',
        'ShortTitle' => 'Varchar(200)',
        'Sort'       => 'Int',
    ];

    private static $has_one = [
        'Banner' => Image::class,
        'Page'   => SiteTree::class,
    ];

    private static $owns = [
        'Banner',
    ];

    private static $summary_fields = [
        'BannerThumbnail' => 'Thumbnail',
        'Title'           => 'Title',
        'ShortTitle'      => 'Short Title',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
    
        $fields->removeByName('Sort');
    
        return $fields;
    }

    public function getBannerThumbnail()
    {
        return $this->Banner()->Thumbnail(200, 200);
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        if (! $this->Sort) {
            // Put this to the last
            $this->Sort = $this->Page()->Slides()->max('Sort') + 1;
        }
    }
}
