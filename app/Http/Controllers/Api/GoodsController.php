<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if($user->role == 'User') {
            $goods = Goods::where('user_id', $user->id)->get()->toArray();
        } else {
            $goods = Goods::all()->toArray();
        }

        return $goods;
    }

    public function listing()
    {
        $goods = Goods::all()->toArray();

        return $goods;
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $good = new Goods([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $good->user()->associate($user);

        $good->save();

        return response()->json('Product created!');
    }

    public function show($id)
    {
        $good = Goods::find($id);
        return response()->json($good);
    }

    public function update($id, Request $request)
    {
        $good = Goods::find($id);
        $good->update($request->all());

        return response()->json('updated!');
    }

    public function destroy($id)
    {
        $good = Goods::find($id);
        $good->delete();

        return response()->json('deleted!');
    }
}
