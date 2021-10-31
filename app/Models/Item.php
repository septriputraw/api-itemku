<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = [
        'name', 'type_id', 'qty',
    ];

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function type()
    {
        return $this->hasOne('App\Models\Type');
    }
}