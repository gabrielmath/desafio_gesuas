<?php

namespace Source\Support\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Source\Support\Models\UserModel
 *
 * @property-read int $id
 * @property string $name
 * @property string $document
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereDocument($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Builder
 */
class User extends Model
{
    protected $fillable = [
        'name',
        'document'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
