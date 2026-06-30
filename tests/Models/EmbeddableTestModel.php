<?php

namespace Vormkracht10\Embedding\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Vormkracht10\Embedding\Embeddable;

class EmbeddableTestModel extends Model
{
    use Embeddable;

    protected $table = 'embeddable_test_models';

    protected $guarded = [];
}
