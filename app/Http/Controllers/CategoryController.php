<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Can;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    // showing create page
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageUrl = getImageUrl($request->image, 'uploads/images/');
        }
        Category::created([
            'name'              => $request->image,
            'description'       => $request->description,
            'status'            => $request->status,
            'image'             => $imageUrl,
        ]);
        return redirect()->route('category.index')
            ->with('message', 'Category Created Successfully.');
    }

    public function edit($id)
    {
        $categories = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request)
    {
        $categories = Category::find($request->id);
        if ($request->hasFile('image')) {
            $imageUrl = getImageUrl($request->image, 'uploads/images/');
        } else {
            $imageUrl = $categories->image;
        }
        $update = $categories->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imageUrl,
        ]);

        if ($update) {
            return redirect()->route('category.index')->with('message', 'Category Updated Successfully.');
        } else {
            return back()->with('message', 'Category update failed.');
        }
    }

    public function status($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category->status == 0) {
            $category->update([
                'status' => 1,
            ]);
        } else {
            $category->update([
                'status' => 0,
            ]);
        }

        if ($category) {
            return redirect()->route('category.index')->with('message', 'Category update Successfully.');
        } else {
            return back()->with('message', 'Category does not update.');
        }
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->delete();
        if ($category) {
            return redirect()->route('category.index')->with('message', 'Category delete Successfully.');
        } else {
            return back()->with('message', 'Category does not create.');
        }
    }
}
