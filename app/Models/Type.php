<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';

    protected $fillable = [
        'name',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }


}
