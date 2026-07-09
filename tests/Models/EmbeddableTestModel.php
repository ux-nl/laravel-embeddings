<?php

namespace UX\Embedding\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use UX\Embedding\Embeddable;

class EmbeddableTestModel extends Model
{
    use Embeddable;

    protected $table = 'embeddable_test_models';

    protected $guarded = [];
}
