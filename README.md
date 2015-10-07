# evista/clean_code

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


This is a demonstration package of clean coding practices in PHP. Feel free to contribute.

## Install

Via Composer

``` bash
$ composer require evista/clean_code
```

## Usage

``` php
$longMethod = new \Evista\CleanCode\LongMethods();;
echo $longMethod->getLogName(1,1);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email sera.balint@e-vista.hu instead of using the issue tracker.

## Credits

- [Balint Sera][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/evista/clean_code.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/evista/clean_code/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/evista/clean_code.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/evista/clean_code.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/evista/clean_code.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/evista/clean_code
[link-travis]: https://travis-ci.org/thephpleague/evista/clean_code
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/evista/clean_code/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/evista/clean_code
[link-downloads]: https://packagist.org/packages/league/evista/clean_code
[link-author]: https://github.com/serabalint
[link-contributors]: ../../contributors
