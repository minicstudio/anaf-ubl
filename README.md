# UBL-Invoice

A modern object-oriented PHP library to create valid UBL files. Please feel free to [contribute](https://github.com/num-num/ubl-invoice/pulls) if you are missing features or tags.

## Installation and usage

This package requires PHP 8.3 or higher. Installation can be done through [composer](https://www.getcomposer.org).

The package has to be added manually into the `composer.json` file
```json
"require": {
    ...
    "minicstudio/anaf-ubl": "^2.0"
}
```

Then we also need to specify where package can be found as it is not listed as a composer package, so add the following into the `composer.json` file.
```json
"repositories": {
    "anaf-ubl": {
        "type": "vcs",
        "url": "git@github.com:minicstudio/anaf-ubl.git"
    } 
}
```

## Examples & documentation

This repository does not have a documentation website at this moment. For now, please check out some code examples by checking the unit tests in the `tests` folder.
