<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable=['name'];

    public function items()
    {
      return $this->hasMany(item::class);
    }

    public function addItem($body) //get the id from request
    {
      $this->items()->create(compact('body'));
      // Comment::create([
      //   'body' => $body,
      //   'post_id' => $this->id //refer to its own id
      // ]);
    }
}
