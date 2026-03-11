<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryController extends Controller
{

    public function index()
    {
        return view('admin.subcategory.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {

            $subcategories = Subcategory::with('category')->latest();

            return DataTables::of($subcategories)
                ->addIndexColumn()

                ->addColumn('image', function ($row) {
                    return '<img src="' . asset($row->image) . '" width="50">';
                })

                ->addColumn('category', function ($row) {
                    return $row->category->name;
                })

                ->addColumn('status', function ($row) {

                    if ($row->status == 1) {
                        return '<span class="badge bg-success">Active</span>
                        <a href="' . route('subcategory.status', $row->id) . '" class="btn btn-success btn-sm">
                        <i class="ti-arrow-up"></i></a>';
                    } else {
                        return '<span class="badge bg-danger">Inactive</span>
                        <a href="' . route('subcategory.status', $row->id) . '" class="btn btn-warning btn-sm">
                        <i class="ti-arrow-down"></i></a>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $edit = '<a href="' . route('subcategory.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';

                    $delete = '<a href="' . route('subcategory.delete', $row->id) . '" 
                    onclick="return confirm(\'Are you sure?\')" 
                    class="btn btn-danger btn-sm">Delete</a>';

                    return $edit . ' ' . $delete;
                })

                ->rawColumns(['image', 'status', 'action'])

                ->make(true);
        }
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required'
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('subcategory.index')
            ->with('success', 'Subcategory Created');
    }
}
