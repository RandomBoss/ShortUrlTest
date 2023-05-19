<?php

namespace App\Models;

use App\Http\Controllers\MainController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


/**
 * @mixin Builder
 */
class UrlInfo extends Model
{
    use HasFactory;

    protected $table = 'url_infos';
    protected $fillable = [
        'url','hash', 'email','short-key'
    ];

}
