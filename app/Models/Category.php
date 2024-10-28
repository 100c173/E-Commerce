<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','description' ] ; 

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    protected static function booted(){
    
        static::deleting( function($category) {
            if ( $category -> isForceDeleting() ){
                foreach($category->products as $product){
                    if($product->categories()->count == 1){
                        $product->forceDelete();;
                    }
                }
            }else {
                foreach($category->products as $product){
                    if($product->categories()->count() == 1){
                        $product->delete();
                    }
                }
            }
        });
    }
}
