<?php

namespace Modules\Article\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @property int $id
 * @property string $title
 * @property string $path
 * @property int $user_id
 * @property string $journalist_alias
 * @property string $text
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Article extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'article';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'path',
        'user_id',
        'journalist_alias',
        'text',
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
