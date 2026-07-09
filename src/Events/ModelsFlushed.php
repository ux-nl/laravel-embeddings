<?php

namespace UX\Embedding\Events;

use Illuminate\Database\Eloquent\Collection;

class ModelsFlushed
{
    /**
     * The model collection.
     *
     * @var Collection
     */
    public $models;

    /**
     * Create a new event instance.
     *
     * @param  Collection  $models
     * @return void
     */
    public function __construct($models)
    {
        $this->models = $models;
    }
}
