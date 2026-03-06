<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    // Index page
    public function index()
    {
        return view('admin.category.index');
    }

    // Data for DataTable
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::select(['id', 'name', 'created_at']);

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $edit = '<a href="'.route('category.edit', $row->id).'" class="btn btn-sm btn-primary">Edit</a>';
                    $delete = '<form action="'.route('category.delete', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().method_field('DELETE').'
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                               </form>';
                    return $edit . ' ' . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Show create page
    public function create()
    {
        return view('admin.category.create');
    }

    // Store category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($request->only('name'));
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Show edit page
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name'));

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Delete category
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}