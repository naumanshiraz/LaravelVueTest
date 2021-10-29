<?php
namespace App;

use App\Models\User;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Goods extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'goods';

    protected $fillable = [
        'name', 'description', 'price', 'role_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
