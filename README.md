## SilverStripe 4 Banner

Adds SlickJS banner into any SilverStripe 4 pages

## Installation

`composer require jinjie/silverstripe-banner`

## How to use

### Add extension

Add this to any page model

```
private static $extensions = [
    SwiftDevLabs\SSBanner\Extension\BannerExtension::class,
];
```

or by configuration

```
Page:
  extensions:
    - SwiftDevLabs\SSBanner\Extension\BannerExtension
```

and run `dev/build`

## Template

If you ever need to customise the mark up for the banner section, create a `BannerTemplate.ss` in `templates` folder.

### Todo

- [ ] Configurable banner
- [ ] Add default style
- [ ] Add configuration to prevent including slick.css and/or slick-theme.css
- [ ] Add configuration to prevent including javascripts