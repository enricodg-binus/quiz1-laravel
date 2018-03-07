<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemController extends Controller
{

  public function index()
  {
    $task = Item::all('id','category_id','name','price','stock');

    return $task;
  }

  public function show ($id)
  {
    $cat_id = Item::find($id)->where('id','=',$id)->value('category_id');
    $anu['item'] = Item::find($id);
    $anu['item']['category'] = Category::find($cat_id);

    return $anu;
  }

  public function insert(Request $request)
  {
    try{
      $id = Item::insertGetId([
        'name' => $request->input('name'),
        'category_id' => $request->input('category_id'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock')
      ]);

      return response('OK', 200);
    }catch(Exception $error){
      return response('FAIL',400);
    }
  }

  public function delete(Request $request){
    try{
      $task = Item::where('id','=',$request->input('id'))->delete();

      return response('OK',200);
    }catch(Exception $error){
      return response('FAIL',400);
    }
  }

  public function update(Request $request)
  {
    try{
      $task = Item::where('id','=',$request->input('id'))->update(['name' => $request->input('name'),
                                                                  'category_id' => $request->input('category_id'),
                                                                  'price' => $request->input('price'),
                                                                  'stock' => $request->input('stock')
      ]);

      return response('OK',200);
    }catch(Exception $error){
      return response('FAIL',400);
    }
  }
}
