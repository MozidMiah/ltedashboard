<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    // =============================
    // Category List Page
    // =============================
    public function index()
    {
        return view('admin.category.index');
    }

    // =============================
    // Yajra DataTable Data
    // =============================
    public function getData(Request $request)
    {
        if ($request->ajax()) {

            $categories = Category::latest();

            return DataTables::of($categories)

                ->addIndexColumn()

                ->addColumn('image', function ($row) {
                    return '<img src="'.asset($row->image).'" width="50">';
                })

                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-danger">Inactive</span>';
                    }
                })

                ->addColumn('action', function ($row) {
                    
                    $edit = '<a href="'.route('category.edit',$row->id).'" class="btn btn-sm btn-primary">Edit</a>';

                    $delete = '<a href="'.route('category.delete',$row->id).'" 
                                onclick="return confirm(\'Are you sure?\')" 
                                class="btn btn-sm btn-danger">Delete</a>';

                    return $edit.' '.$delete;
                })

                ->rawColumns(['image','status','action'])

                ->make(true);
        }
    }

    // =============================
    // Create Page
    // =============================
    public function create()
    {
        return view('admin.category.create');
    }

    // =============================
    // Store Category
    // =============================
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $imageUrl = null;

        if ($request->hasFile('image')) {
            $imageUrl = getImageUrl($request->image,'uploads/images/');
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imageUrl,
        ]);

        return redirect()->route('category.index')
                ->with('success','Category created successfully');
    }

    // =============================
    // Edit Page
    // =============================
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit',compact('category'));
    }

    // =============================
    // Update Category
    // =============================
    public function update(Request $request)
    {

        $category = Category::findOrFail($request->id);

        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);

        if ($request->hasFile('image')) {

            $imageUrl = getImageUrl($request->image,'uploads/images/');

        } else {

            $imageUrl = $category->image;
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imageUrl,
        ]);

        return redirect()->route('category.index')
                ->with('success','Category updated successfully');
    }

    // =============================
    // Delete Category
    // =============================
    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category.index')
                ->with('success','Category deleted successfully');
    }

}