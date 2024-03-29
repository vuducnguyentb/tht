# Changelog

All notable changes to `laravel-translatable` will be documented in this file

## 4.1.3 - 2019-06-16

- improve dependencies

## 4.1.2 - 2019-06-06

- allow false and true values in translations

## 4.1.1 - 2019-02-27

- fix service provider error

## 4.1.0 - 2019-02-27

- drop support for Laravel 5.7 and below
- drop support for PHP 7.1 and below

## 4.0.0 - 2019-02-27

- `app.fallback_local` will now be used (see #148)

## 3.1.3 - 2019-02-27

- add support for Laravel 5.8

## 3.1.2 - 2019-01-05

- add `hasTranslation`

## 3.1.1 - 2018-12-18

- allow 0 to be used as a translation value

## 3.1.0 - 2018-11-29

- allow `getTranslations` to return other things than strings

## 3.0.1 - 2018-09-18

- fix regarding empty locales

## 3.0.0 - 2018-09-16

- added `translations` accessor
- dropped support for PHP 7.0

## 2.2.1 - 2018-08-24

- add support for Laravel 5.7

## 2.2.0 - 2018-03-09
- made it possible to get all translations in one go

## 2.1.5 - 2018-02-28
- better handling of `null` values

## 2.1.4 - 2018-02-08
- add support for L5.6

## 2.1.3 - 2018-01-24
- make locale handling more flexible

## 2.1.2 - 2017-12-24
- fix for using translations within translations

## 2.1.1 - 2017-12-20
- fix event `key` attribute
- fix support for mutators

## 2.1.0 - 2017-09-21
- added support for setting a translation directly through the property

## 2.0.0 - 2017-08-30
- added support for Laravel 5.5, dropped support for all older versions
- rename config file from `laravel-translatable` to `translatable`

## 1.3.0 - 2017-06-12
- add `forgetAllTranslations`

## 1.2.2 - 2016-01-27
- improve support for fallback locale

## 1.2.1 - 2016-01-23
- improve compatibility for Laravel 5.4

## 1.2.0 - 2016-01-23
- add compatibility for Laravel 5.4

## 1.1.2 - 2016-10-02
- made `isTranslatableAttribute` public

## 1.1.1 - 2016-08-24
- add L5.3 compatibility

## 1.1.0 - 2016-05-02
- added support for a fallback locale

## 1.0.0 - 2016-04-10
- initial release
