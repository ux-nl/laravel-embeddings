<?php

namespace Vormkracht10\Embedding\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Database\ModelIdentifier;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;

class RemoveFromEmbed implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The models to be removed from the search index.
     *
     * @var RemoveableEmbedCollection
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
        $this->models = RemoveableEmbedCollection::make($models);
    }

    /**
     * Handle the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->models->isNotEmpty()) {
            $this->models->first()->embeddableUsing()->delete($this->models);
        }
    }

    /**
     * Restore a queueable collection instance.
     *
     * @param  ModelIdentifier  $value
     * @return RemoveableEmbedCollection
     */
    protected function restoreCollection($value)
    {
        if (! $value->class || count($value->id) === 0) {
            return new RemoveableEmbedCollection;
        }

        return new RemoveableEmbedCollection(
            collect($value->id)->map(function ($id) use ($value) {
                return tap(new $value->class, function ($model) use ($id) {
                    $model->setKeyType(
                        is_string($id) ? 'string' : 'int'
                    )->forceFill([
                        $model->getEmbedKeyName() => $id,
                    ]);
                });
            })
        );
    }
}
