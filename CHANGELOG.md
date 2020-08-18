# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.4.1] - 2020-08-18
### Added
- Caching 
 - [x] View
 - [x] Config
 - [x] Route
### Fixed
- moved build process in a controller so that it will be cache-able

## [0.4.0] - 2020-08-18
### Changed
- PHP minimum requirement to version 7.4.8
- Illuminate/console to version 7.25.0
- illuminate/support to version 7.25.0

## [0.3.0] - 2020-08-17
### Added
- [Link storage](https://github.com/alephitdev/bitbucket-webhook-package/issues/1)
- Clear commands
  - [x] View
  - [x] Cache
  - [x] Config 

### Fixed
- [Composer installation command](https://github.com/alephitdev/bitbucket-webhook-package/issues/2)


## [0.2.1] - 2020-07-31
### Removed
- Removes --no-dev --no-scripts option when executing composer install

## [0.2.0] - 2020-07-30
### Added
- Database migration script 

## [0.1.0] - 2020-07-30
### Added
- Bitbucket pull request (approved/merged) integration for develop branch.
- Bitbucket repository merge/push integration for master branch.