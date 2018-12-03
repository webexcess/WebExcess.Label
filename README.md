# WebExcess.Label Package for Neos CMS #
[![Latest Stable Version](https://poser.pugx.org/webexcess/label/v/stable)](https://packagist.org/packages/webexcess/label)
[![License](https://poser.pugx.org/webexcess/label/license)](https://packagist.org/packages/webexcess/label)

Adds the NodeType-Label to the content element.

## Compatibility and Maintenance
WebExcess.Label is currently being maintained for Neos 4.0.

| Neos Version | WebExcess.MultiColumn Version | Maintained |
|--------------|-------------------------------|------------|
| Neos 4.x     | 1.x                           | YES        |

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
