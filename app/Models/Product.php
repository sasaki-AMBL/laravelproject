<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'image',
        'owner_id',
        'stock',
        'display'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'transaction')
        ->withPivot('amount','price','created_at');
    }

    public function owners()
    {
        return $this->belongsTo(Owner::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }



}
