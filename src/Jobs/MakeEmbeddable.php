<?php

namespace UX\Embedding\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;

class MakeEmbeddable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The models to be made embeddable.
     *
     * @var Collection
     */
    public $models;

    /**
     * Create a new job instance.
     *
     * @param  Collection  $models
     * @return void
     */
    public function __construct($models)
    {
        $this->models = $models;
    }

    /**
     * Handle the job.
     *
     * @return void
     */
    public function handle()
    {
        if (count($this->models) === 0) {
            return;
        }

        $this->models->first()->makeEmbeddableUsing($this->models)->first()->embeddableUsing()->update($this->models);
    }
}
