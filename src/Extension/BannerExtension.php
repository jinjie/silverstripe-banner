<?php

/**
 * BannerExtension
 *
 * @package SwiftDevLabs\SSBanner\Extension
 * @author Kong Jin Jie <jinjie@swiftdev.sg>
 */

namespace SwiftDevLabs\SSBanner\Extension;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Requirements;
use SwiftDevLabs\SSBanner\Model\Slide;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class BannerExtension extends DataExtension
{
    private static $has_many = [
        'Slides'    => Slide::class,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Banner',
            GridField::create(
                'Slides',
                'Slides',
                $this->owner->Slides(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(new GridFieldOrderableRows())
            )
        );
    }

    public function getBanner()
    {
        Requirements::javascript('silverstripe/admin: thirdparty/jquery/jquery.min.js');
        Requirements::javascript('jinjie/silverstripe-banner: resources/javascript/slick-1.8.1/slick.min.js', [
            'defer' => true,
        ]);
        
        Requirements::css('jinjie/silverstripe-banner: resources/javascript/slick-1.8.1/slick.css');
        Requirements::css('jinjie/silverstripe-banner: resources/javascript/slick-1.8.1/slick-theme.css');

        Requirements::javascriptTemplate('jinjie/silverstripe-banner: resources/javascript/banner.js', [
            'BannerClass'   => $this->getBannerClass(),
        ]);

        return $this->owner->renderWith('BannerTemplate');
    }

    public function getBannerClass()
    {
        return $this->owner->getClassName() . '-banner';
    }
}
