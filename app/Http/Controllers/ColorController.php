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

                $current = $row->status == 1 ? 'Active' : 'Inactive';

                return '
                    <select class="form-control form-control-sm statusDropdown text-center" 
                            data-id="' . $row->id . '" 
                            style="width:80px; padding:2px; font-size:15px;">
                        <option value="' . $row->status . '" selected>' . $current . '</option>
                        <option value="' . ($row->status == 1 ? 0 : 1) . '">' . ($row->status == 1 ? 'Inactive' : 'Active') . '</option>
                    </select>
                ';
            })

            ->addColumn('action', function ($row) {
                    $edit = '<a href="' . route('color.edit', $row->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>';

                    $delete = '<a href="' . route('color.delete', $row->id) . '" 
                                    onclick="return confirm(\'Are you sure?\')" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>';

                    return $edit . ' ' . $delete;
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
