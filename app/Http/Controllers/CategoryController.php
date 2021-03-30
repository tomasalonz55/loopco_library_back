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
        $category = Category::findOrFail($id);
 
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found '
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $category->toArray()
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
        $category = auth()->user()->posts()->find($id);
 
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 400);
        }
 
        if ($category->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category can not be deleted'
            ], 500);
        }
    }
}