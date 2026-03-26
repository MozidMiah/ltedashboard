<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{

    // =============================
    // Unit List Page
    // =============================
    public function index()
    {
        return view('admin.unit.index');
    }

    // =============================
    // Yajra DataTable Data
    // =============================
    public function getData(Request $request)
    {
        $units = Unit::latest()->get();

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

                $edit = '<a href="' . route('unit.edit', $row->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>';

                $delete = '<a href="' . route('unit.delete', $row->id) . '" 
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
        return view('admin.unit.create');
    }

    // =============================
    // Store Unit
    // =============================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:units,name'
        ]);

        Unit::create([
            'name'      => $request->name,
            'status'    => 1
        ]);

        return redirect()->route('unit.index')
            ->with('success', 'Unit Added Successfully');
    }

    // =============================
    // Edit Page
    // =============================
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('admin.unit.edit', compact('unit'));
    }

    // =============================
    // Update Unit
    // =============================
    public function update(Request $request)
    {
        $unit = Unit::findOrFail($request->id);

        $request->validate([
            'name' => 'required|unique:units,name,' . $unit->id
        ]);

        $unit->update([
            'name' => $request->name
        ]);

        return redirect()->route('unit.index')
            ->with('success', 'Unit Updated Successfully');
    }

    // =============================
    // Status Toggle
    // =============================
    public function status($id)
    {
        $unit = Unit::findOrFail($id);

        if ($unit->status == 1) {
            $unit->status = 0;
        } else {
            $unit->status = 1;
        }

        $unit->save();

        return redirect()->back();
    }

    // =============================
    // Delete Unit
    // =============================
    public function delete($id)
    {
        Unit::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Unit Deleted Successfully');
    }
}
