# Changelog

All notable changes to `laravel-embeddings` will be documented in this file.

## v0.1.1 - 2026-06-30

### Fixed

**Models using the `Embeddable` trait now boot on Laravel 11, 12 and 13.**

`v0.1.0` made the package *install* on newer Laravel, but `Embeddable::bootEmbeddable()` still registered the observer and instantiated the model while the model was mid-boot. Laravel 11+ rejects re-entrant boots with:

```
LogicException: The [Illuminate\Database\Eloquent\Model::bootIfNotBooted] method
may not be called on model [...] while it is being booted.

```
The observer registration and collection-macro setup are now deferred into a `whenBooted()` callback (matching Laravel Scout), so they run after the model has finished booting. Falls back to immediate execution on Laravel versions without the hook. A regression test boots a model using the trait to guard against this.

If you bumped to `v0.1.0` and hit the boot error, upgrade to `v0.1.1`.

**Full Changelog**: https://github.com/ux-nl/laravel-embeddings/compare/v0.1.0...v0.1.1

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
