# eZ Platform Contrib Bundle

This is an unofficial eZ Platform bundle, which extends the Product and is a playground
for potential new features.

## Installation

This bundle is not available on Packagist yet and has no release.

To use it, you need to provide or update `"repositories"` section in your composer.json:

``` json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/awlsolutions/ezplatform-contrib-bundle.git" }
    ]
}
```

and then execute from your shell:

```
composer req awlsolutions/ezplatform-contrib-bundle:dev-master
```

As the last step, you need to enable the Bundle in your `AppKernel`:
``` php
$bundles = [
    // ...
    new AWLSolutions\EzPlatformContribBundle\EzPlatformContribBundle(),
    // ...
];
```

## Supported versions

This bundle for now supports Symfony 3.4 and eZ Platform 2.5 LTS.

## LICENSE

See [LICENSE](./LICENSE) file.

## Copyright

Copyright (c) 2019 Andrew W. Longosz
