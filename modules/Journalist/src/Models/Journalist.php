<?php

namespace Modules\Journalist\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Article\Models\Article;

/**
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Journalist extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'journalist';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function comments()
    {
        return $this->hasMany(Article::class, 'user_id', 'id');
    }
}
