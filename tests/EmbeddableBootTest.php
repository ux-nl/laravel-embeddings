<?php

use Illuminate\Support\Collection;
use UX\Embedding\Tests\Models\EmbeddableTestModel;

it('boots a model using the Embeddable trait without a re-entrant boot error', function () {
    // Booting the model runs bootEmbeddable(). On Laravel 11+ registering the
    // observer or instantiating the model while it is still booting throws a
    // LogicException ("... while it is being booted."). Instantiating here
    // forces the boot and proves it no longer happens.
    $model = new EmbeddableTestModel;

    expect($model)->toBeInstanceOf(EmbeddableTestModel::class);
});

it('registers the embeddable collection macros once the model has booted', function () {
    new EmbeddableTestModel;

    expect(Collection::hasMacro('embeddable'))->toBeTrue()
        ->and(Collection::hasMacro('unembeddable'))->toBeTrue();
});
