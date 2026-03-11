<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{

    public function index()
    {
        return view('admin.subcategory.index');
    }

    public function getData()
    {
        $data = SubCategory::with('category')->latest()->get();

        return DataTables::of($data)

            ->addIndexColumn()

            ->addColumn('category', function ($row) {
                return $row->category->name;
            })

            ->addColumn('status', function ($row) {

                if ($row->status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })

            ->addColumn('action', function ($row) {

                $edit = '<a href="'.route('subcategory.edit',$row->id).'" class="btn btn-primary btn-sm">Edit</a>';

                $delete = '<a href="'.route('subcategory.delete',$row->id).'" class="btn btn-danger btn-sm">Delete</a>';

                return $edit.' '.$delete;
            })

            ->rawColumns(['status','action'])

            ->make(true);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:sub_categories',
        ]);

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status ?? 1
        ]);

        return redirect()->route('subcategory.index')->with('success','SubCategory Added');
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

    public function update(Request $request,$id)
    {

        $subcategory = SubCategory::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('subcategory.index')->with('success','Updated Successfully');
    }

    public function delete($id)
    {
        SubCategory::findOrFail($id)->delete();

        return redirect()->back()->with('success','Deleted Successfully');
    }

}