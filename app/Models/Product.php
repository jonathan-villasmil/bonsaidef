<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'update_at'];
    // protected $fillable = [
    //     'name','slug', 'description','user_id'];
     
     
     
    public function getRouteKeyName()
    {
        return "slug";
    }

    //relacion uno a mucho inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion uno a uno polimorfica

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
