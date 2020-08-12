<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'name' , 'title' , 'suptitle' , 'img' , 'description','price','product_id'
    ];
    public function users(){
        return $this->BelongsToMany(User::class);
    }
}
