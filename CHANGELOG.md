# Changelog

All notable changes to `laravel-embeddings` will be documented in this file.

## v0.1.0 - 2026-06-30

### What's new

Adds support for **Laravel 11, 12 and 13** (Laravel 10 remains supported).

#### Changes

- Raise the minimum PHP version to **8.2** (8.1 is end-of-life).
- Widen dev dependencies: `orchestra/testbench` (`^8 || ^9 || ^10 || ^11`), Pest + plugins (add `^4.0`), `nunomaduro/collision` (add `^8.0`), PHPStan rule packages (add `^2.0`).
- Replace the abandoned `nunomaduro/larastan` with `larastan/larastan` (`^2.0.1 || ^3.0`).
- CI matrix expanded to Laravel 10–13 across PHP 8.2–8.4 (Ubuntu + Windows).
- Migrate `phpunit.xml.dist` to the PHPUnit 12 schema; modernise PHPStan config for PHPStan 2 / Larastan 3.

#### Upgrade notes

- **Requires PHP 8.2+.** If you are on PHP 8.1 (EOL since December 2025), upgrade PHP before updating.
- No application-facing API changes.

**Full Changelog**: https://github.com/ux-nl/laravel-embeddings/compare/v0.0.4...v0.1.0
