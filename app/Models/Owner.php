<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Authenticatable
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


}
