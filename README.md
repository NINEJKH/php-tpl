[![Build Status](https://travis-ci.org/NINEJKH/php-tpl.svg?branch=master)](https://travis-ci.org/NINEJKH/php-tpl)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/NINEJKH/php-tpl/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/NINEJKH/php-tpl/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/NINEJKH/php-tpl/badge.svg?branch=master)](https://coveralls.io/github/NINEJKH/php-tpl?branch=master)
[![Latest Stable Version](https://poser.pugx.org/ninejkh/tpl/v/stable.svg)](https://packagist.org/packages/ninejkh/tpl)
[![Packagist](https://img.shields.io/packagist/dt/ninejkh/tpl.svg)](https://packagist.org/packages/ninejkh/tpl)
[![Latest Unstable Version](https://poser.pugx.org/ninejkh/tpl/v/unstable.svg)](https://packagist.org/packages/ninejkh/tpl)
[![License](https://poser.pugx.org/ninejkh/tpl/license.svg)](https://packagist.org/packages/ninejkh/tpl)

# ninejkh/tpl

A really really simple template engine, if you think PHP is good enough
at doing exactly that. No compiled or cached state, pure PHP.

## Install

```bash
$ composer require ninejkh/tpl
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use NINEJKH\Tpl\Tpl;

$tpl = new Tpl('tpl/');
$tpl->assign('foo', 'bar');
$tpl->display('home');

```

## License

Licensed under the MIT License. See the [LICENSE file](LICENSE) for details.

## Author Information

[9JKH (Pty) Ltd.](https://9jkh.co.za)
