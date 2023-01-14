<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "icon",
        "link",
        "group_id"
    ];

    protected $guarded = ["id"];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
