<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


/**
 * @mixin Builder
 */
class UrlInfo extends Model
{
    use HasFactory;

    protected $table = 'url_infos';
    protected $fillable = [
        'url','hash','short-key'
    ];

}
