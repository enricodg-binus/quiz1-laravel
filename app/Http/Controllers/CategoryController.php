<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class CategoryController extends Controller
{
    public function index()
    {
      $task = Category::all('id','name');

      return $task;
    }

    public function show ($id)
    {
      $task_id = Category::find($id)->where('id','=',$id)->value('id');
      $task_name = Category::find($id)->where('id','=',$id)->value('name');

      $anu['id'] = $task_id;
      $anu['name'] = $task_name;
      $anu['item'] = Item::all()->where('category_id','=',$id);

      return $anu;
    }

    public function insert(Request $request)
    {
      try{
        $id = Category::insertGetId([
          'name' => $request->input('name')]);

        return response('OK', 200);
      }catch(Exception $error){
        return response('FAIL',400);
      }
    }

    public function delete(Request $request){
      try{
        $task = Category::where('id','=',$request->input('id'))->delete();

        return response('OK',200);
      }catch(Exception $error){
        return response('FAIL',400);
      }

    }

    public function update(Request $request)
    {
      try{
        $task = Category::where('id','=',$request->input('id'))->update(['name' => $request->input('name')]);

        return response('OK',200);
      }catch(Exception $error){
        return response('FAIL',400);
      }
    }
}
