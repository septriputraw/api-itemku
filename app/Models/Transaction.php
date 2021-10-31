<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
        'item_id', 'qty', 'sold',
    ];

    public function item()
    {
        return $this->belongsToMany('App\Models\Item');
    }
}