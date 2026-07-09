<?php

namespace UX\Embedding\Engines;

use Illuminate\Database\Eloquent\Collection;

class NullEngine implements EngineInterface
{
    public function __construct() {}

    public function embed($content): array
    {
        return [];
    }

    /**
     * Update the given model
     *
     * @param  Collection  $models
     * @return void
     */
    public function update($models) {}

    /**
     * Remove the given model from the index.
     *
     * @param  Collection  $models
     * @return void
     */
    public function delete($models) {}
}
