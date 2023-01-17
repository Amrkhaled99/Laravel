<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $guarded = ['rating', 'rating_count'];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
 
     

    }
    
    public function size()
    {
 
        return $this->belongsTo(Size::class,"size_id");

    }


    public function color()
    {
        return $this->belongsTo(Color::class);

    }

    public function price()
    {
        return $this->price - ($this->price * $this->discount);
    }

    public static $rules = [
        'name' => 'required',
        'size_id' => 'required',
        'color_id' => 'required',
        'category_id' => 'required'
    ];

}


