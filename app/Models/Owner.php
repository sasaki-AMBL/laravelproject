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

    public function products2(){
        return $this->belongsToMany(Product::class, 'transactions')
        ->withPivot('amount','price','created_at');
    }



    protected $fillable = [
        'name',
        'email',
        'password',
    ];


}
