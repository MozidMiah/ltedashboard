<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Yajra\DataTables\Facades\DataTables;

class SizeController extends Controller
{

    // =============================
    // Unit List Page
    // =============================
    public function index()
    {
        return view('admin.size.index');
    }

    // =============================
    // Yajra DataTable Data
    // =============================
    public function getData(Request $request)
    {
        $units = Size::latest()->get();

        return DataTables::of($units)

            ->addIndexColumn()

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

                $edit = '<a href="' . route('size.edit', $row->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>';

                $delete = '<a href="' . route('size.delete', $row->id) . '" 
                                onclick="return confirm(\'Are you sure?\')" 
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>';

                return $edit . ' ' . $delete;
            })

            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    // =============================
    // Create Page
    // =============================
    public function create()
    {
        return view('admin.size.create');
    }

    // =============================
    // Store Unit
    // =============================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sizes,name'
        ]);

        Size::create([
            'name'      => $request->name,
            'status'    => 1
        ]);

        return redirect()->route('size.index')
            ->with('success', 'Size Added Successfully');
    }

    // =============================
    // Edit Page
    // =============================
    public function edit($id)
    {
        $size = Size::findOrFail($id);

        return view('admin.size.edit', compact('size'));
    }

    // =============================
    // Update Unit
    // =============================
    public function update(Request $request)
    {
        $size = Size::findOrFail($request->id);

        $request->validate([
            'name' => 'required|unique:sizes,name,' . $size->id
        ]);

        $size->update([
            'name' => $request->name
        ]);

        return redirect()->route('size.index')
            ->with('success', 'Size Updated Successfully');
    }

    // =============================
    // Status Toggle
    // =============================
    public function status($id)
    {
        $size = Size::findOrFail($id);

        if ($size->status == 1) {
            $size->status = 0;
        } else {
            $size->status = 1;
        }

        $size->save();

        return redirect()->back();
    }

    // =============================
    // Delete Unit
    // =============================
    public function delete($id)
    {
        Size::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Size Deleted Successfully');
    }
}
