<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }
 
    public function show($id)
    {
        $post = auth()->user()->categories()->find($id);
 
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found '
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $post->toArray()
        ], 400);
    }
 
    public function store()
    {
        request()-> validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        return Category::create([
            'name' => request('name'),
            'description' => request('description'),
        ]);
    }
 
    public function update(Category $category)
    {
        // $post = auth()->user()->categories()->find($id);
 
        // if (!$post) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post not found'
        //     ], 400);
        // }
 
        // $updated = $post->fill($request->all())->save();
 
        // if ($updated)
        //     return response()->json([
        //         'success' => true
        //     ]);
        // else
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post can not be updated'
        //     ], 500);
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $success = $category->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);
    
        return [
            'success' => $success
        ];
    }
 
    public function destroy($id)
    {
        $post = auth()->user()->posts()->find($id);
 
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }
 
        if ($post->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post can not be deleted'
            ], 500);
        }
    }
}
