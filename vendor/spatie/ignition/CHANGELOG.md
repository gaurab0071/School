# Changelog

All notable changes to `ignition` will be documented in this file

## 1.4.2 - 2023-01-23

- align dependencies with Laravel 10

## 1.4.1 - 2022-08-26

- Revert type change (breaking change) on `SolutionProviderRepository` interface

**Full Changelog**: https://github.com/spatie/ignition/compare/1.4.0...1.4.1

## 1.4.0 - 2022-08-26

### What's Changed

- Improve solution provider repository interface types by @AlexVanderbist in https://github.com/spatie/ignition/pull/160
- More readable for SQL Syntax by @SupianIDz in https://github.com/spatie/ignition/pull/159
- Added VS Codium to the editor options by @WoutervdWaal in https://github.com/spatie/ignition/pull/130
- Fix `${var}` string interpolation deprecation by @Ayesh in https://github.com/spatie/ignition/pull/144
- Fix typos in readme by @krsriq in https://github.com/spatie/ignition/pull/158
- Add ability to add dynamic HTML to head and body tags by @Jubeki in https://github.com/spatie/ignition/pull/161

### New Contributors

- @SupianIDz made their first contribution in https://github.com/spatie/ignition/pull/159
- @WoutervdWaal made their first contribution in https://github.com/spatie/ignition/pull/130
- @Ayesh made their first contribution in https://github.com/spatie/ignition/pull/144
- @krsriq made their first contribution in https://github.com/spatie/ignition/pull/158
- @Jubeki made their first contribution in https://github.com/spatie/ignition/pull/161

**Full Changelog**: https://github.com/spatie/ignition/compare/1.3.1...1.4.0

## 1.3.1 - 2022-05-16

- Bump Ignition UI to v4.0.2
- - Fix types: `context.env` can be `null` or `undefined`
- 
- 
- 
- 
- JS bundle is no longer compressed to make debugging easier

**Full Changelog**: https://github.com/spatie/ignition/compare/1.3.0...1.3.1

## 1.3.0 - 2022-05-12

## What's Changed

- Use Ignition UI v4 by @AlexVanderbist in https://github.com/spatie/ignition/pull/129
- - Bump Ignition UI version to 4.0.1
- 
- 
- 
- 
- - - Fixed a missing key in Query debug section
- - 
- 
- - 
- 
- 
- - 
- 
- 
- 
- - 
- 
- 
- 
- 
- - - Fixed selecting exceptions without accidentally collapsing the error card
- - 
- 
- - 
- 
- 
- - 
- 
- 
- 
- - 
- 
- 
- 
- 
- - - Triple clicking a code snippet now always selects it
- - 
- 
- - 
- 
- 
- - 
- 
- 
- 
- - 
- 
- 
- 
- 
- - 
- 
- 
- 
- 
- - Refactor error occurrence context items types
- 
- 
- 
- 
- - Log error to console when sharing to Flare goes wrong
- 
- 
- 
- 
- 

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.10...1.3.0

## 1.2.10 - 2022-05-10

- Bump @flareapp/ignition-ui dependency to 3.3.5 (improves handling for missing stack trace frames)
- Log error to console when sharing to Flare fails

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.9...1.2.10

## 1.2.9 - 2022-04-23

- Bump Ignition UI version to pull in changes

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.8...1.2.9

## 1.2.8 - 2022-04-23

## What's Changed

- Update .gitattributes by @angeljqv in https://github.com/spatie/ignition/pull/120
- Fix flash of unstyled content in Livewire modals by @willemvb in https://github.com/spatie/ignition/pull/118
- Don't add unnecessary URL fragments to share and settings menu

## New Contributors

- @angeljqv made their first contribution in https://github.com/spatie/ignition/pull/120

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.7...1.2.8

## 1.2.7 - 2022-03-29

- Move stylesheet and darkmode script to `head` tag of error page

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.6...1.2.7

## 1.2.6 - 2022-03-23

## What's Changed

- Enable (slightly bigger) development build to make debugging Ignition issues easier
- Speed up tests run process by @kudashevs in https://github.com/spatie/ignition/pull/105

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.5...1.2.6###

## 1.2.5 - 2022-03-19

- Disable "Share to Flare" feature based on Ignition config value

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.4...1.2.5

## 1.2.4 - 2022-03-11

- Pass an already initialised `Report` object to Flare client (instead of creating a new instance)
- Bump `spatie/flare-client-php` version to support passing an initialised report to flare
- Fix the `renderException` method to only render the Ignition error page (without also sending a report)
- Remove `spatie/ray` dependency

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.3...1.2.4

## 1.2.3 - 2022-03-08

## What's Changed

- Suppress file check by @kudashevs in https://github.com/spatie/ignition/pull/91

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.2...1.2.3

## 1.2.2 - 2022-03-08

## What's Changed

- fix exception caused by file_exists by @dianfishekqi in https://github.com/spatie/ignition/pull/90

## New Contributors

- @dianfishekqi made their first contribution in https://github.com/spatie/ignition/pull/90

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.1...1.2.2

## 1.2.1 - 2022-03-04

- Ignition UI bugfix: stacktrace with only one vendor frame no longer crashes Ignition

**Full Changelog**: https://github.com/spatie/ignition/compare/1.2.0...1.2.1

## 1.2.0 - 2022-03-04

## What's Changed

- The possibility to specify a path to the settings file using a new `ConfigManager` interface by @kudashevs in https://github.com/spatie/ignition/pull/57

**Full Changelog**: https://github.com/spatie/ignition/compare/1.1.1...1.2.0

## 1.1.1 - 2022-03-02

## What's Changed

- Create new build for Ignition-UI changes
- Update README.md by @biscuit-deluxe in https://github.com/spatie/ignition/pull/54

## New Contributors

- @biscuit-deluxe made their first contribution in https://github.com/spatie/ignition/pull/54

**Full Changelog**: https://github.com/spatie/ignition/compare/1.1.0...1.1.1

## 1.1.0 - 2022-03-01

## What's Changed

- fix: don't let `exception_message` be `null` by @innocenzi in https://github.com/spatie/ignition/pull/45
- Update .gitattributes by @PaolaRuby in https://github.com/spatie/ignition/pull/46
- Set `vscode` as default editor by @AlexVanderbist in https://github.com/spatie/ignition/pull/53
- Add error boundaries

## New Contributors

- @PaolaRuby made their first contribution in https://github.com/spatie/ignition/pull/46

**Full Changelog**: https://github.com/spatie/ignition/compare/1.0.5...1.1.0

## 1.0.5 - 2022-02-17

## What's Changed

- Immediately open new shares in new tab (owner URL is no longer required)
- Render initial theme class in HTML by @willemvb in https://github.com/spatie/ignition/pull/31
- fix: Convert query bindings to an array before mapping by @innocenzi in https://github.com/spatie/ignition/pull/43

## New Contributors

- @willemvb made their first contribution in https://github.com/spatie/ignition/pull/31
- @innocenzi made their first contribution in https://github.com/spatie/ignition/pull/43

**Full Changelog**: https://github.com/spatie/ignition/compare/1.0.4...1.0.5

## 1.0.4 - 2022-02-16

## What's Changed

- Refine the Windows OS check by @kudashevs in https://github.com/spatie/ignition/pull/40

## New Contributors

- @kudashevs made their first contribution in https://github.com/spatie/ignition/pull/40

**Full Changelog**: https://github.com/spatie/ignition/compare/1.0.3...1.0.4

## 1.0.3 - 2022-02-13

## What's Changed

- Update incorrectly documented namespace by @imliam in https://github.com/spatie/ignition/pull/23
- Ensure example exception is... an exception by @imliam in https://github.com/spatie/ignition/pull/24
- add check to make sure ConfigFilePath is readable by @leafling in https://github.com/spatie/ignition/pull/36

## New Contributors

- @imliam made their first contribution in https://github.com/spatie/ignition/pull/23
- @leafling made their first contribution in https://github.com/spatie/ignition/pull/36

**Full Changelog**: https://github.com/spatie/ignition/compare/1.0.2...1.0.3

## 1.0.2 - 2022-01-19

- remove Laravel specific bits

## 1.0.1 - 2022-01-18

- bug fixes

## 1.0.0 - 2022-01-18

- stable release
