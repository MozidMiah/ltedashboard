<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Yajra\DataTables\Facades\DataTables;

class ColorController extends Controller
{

    // =============================
    // Color List Page
    // =============================
    public function index()
    {
        return view('admin.color.index');
    }

    // =============================
    // Yajra DataTable Data
    // =============================
    public function getData(Request $request)
    {
        $colors = Color::latest()->get();

        return DataTables::of($colors)

            ->addIndexColumn()

            ->editColumn('color', function ($row) {
                return '<span style="background:' . $row->color . ';
                        padding:5px 20px;
                        border-radius:5px;"></span>';
            })

            ->addColumn('status', function ($row) {

                if ($row->status == 1) {
                    return '<a href="' . route('color.status', $row->id) . '" 
                    class="btn btn-success btn-sm">Active</a>';
                } else {
                    return '<a href="' . route('color.status', $row->id) . '" 
                    class="btn btn-danger btn-sm">Inactive</a>';
                }
            })

            ->addColumn('action', function ($row) {

                $btn = '

                <a href="' . route('color.edit', $row->id) . '" 
                class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i>
                </a>

                <a href="' . route('color.delete', $row->id) . '" 
                class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
                </a>

                ';

                return $btn;
            })

            ->rawColumns(['color', 'status', 'action'])
            ->make(true);
    }

    // =============================
    // Create Page
    // =============================
    public function create()
    {
        return view('admin.color.create');
    }

    // =============================
    // Store Color
    // =============================
    public function store(Request $request)
    {

        $request->validate([
            'name'  => 'required|unique:colors,name',
            'color' => 'required'
        ]);

        Color::create([
            'name'   => $request->name,
            'color'  => $request->color,
            'status' => 1
        ]);

        return redirect()->route('color.index')
            ->with('success', 'Color Added Successfully');
    }

    // =============================
    // Edit Page
    // =============================
    public function edit($id)
    {
        $color = Color::findOrFail($id);

        return view('admin.color.edit', compact('color'));
    }

    // =============================
    // Update Color
    // =============================
    public function update(Request $request)
    {
        $color = Color::findOrFail($request->id);

        $request->validate([
            'name' => 'required|unique:colors,name,' . $color->id,
            'color' => 'required'
        ]);

        $color->update([
            'name'  => $request->name,
            'color' => $request->color
        ]);

        return redirect()->route('color.index')
            ->with('success', 'Color Updated Successfully');
    }

    // =============================
    // Status Toggle
    // =============================
    public function status($id)
    {
        $color = Color::findOrFail($id);

        if ($color->status == 1) {
            $color->status = 0;
        } else {
            $color->status = 1;
        }

        $color->save();

        return redirect()->back();
    }

    // =============================
    // Delete Color
    // =============================
    public function delete($id)
    {
        Color::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Color Deleted Successfully');
    }
}
