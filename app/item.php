<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable=['category_id','name','price','stock'];

    public function item()
    {
      return $this->belongsTo(category::class);
    }
}
