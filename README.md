# WebExcess.Label Package for Neos CMS #
[![Latest Stable Version](https://poser.pugx.org/webexcess/label/v/stable)](https://packagist.org/packages/webexcess/label)
[![License](https://poser.pugx.org/webexcess/label/license)](https://packagist.org/packages/webexcess/label)

By adding `WebExcess.Label:Show` to your NodeType configuration, a helper selector will be added to the backend for better selecting a content element.

| before | after |
| ------ | ----- |
| ![before](Documentation/before.jpg?raw=true "before") | ![after](Documentation/after.jpg?raw=true "after") |

## Compatibility and Maintenance
WebExcess.Label is currently being maintained for Neos 4.0 and Neos 5.0.

| Neos Version | WebExcess.Label Version | Maintained |
|--------------|-------------------------|------------|
| Neos 5.x     | 2.x                     | YES        |
| Neos 4.x     | 1.x                     | YES        |

## Installation
```
composer require webexcess/label
```

## How to use

Add `WebExcess.Label:Show` to your NodeType configuration.

```
Your.Package:NodeType:
  superTypes:
    WebExcess.Label:Show: true
```

## Default CSS

You can turn off the default CSS by setting `WebExcess.Label.includeCss` to false in your configuration.
