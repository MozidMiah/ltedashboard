<?php

namespace App\Http\Controllers;

use App\Models\FlashSale;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FlashSaleController extends Controller
{
    public function index()
    {
        return view('admin.flashsale.index');
    }

    public function getData()
    {
        $data = FlashSale::latest();

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('thumbnail', function ($row) {
                return '<img src="' . asset($row->thumbnail) . '" width="60">';
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
                $edit = '<a href="' . route('flash-sale.edit', $row->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>';

                $delete = '<a href="' . route('flash-sale.delete', $row->id) . '" 
                                    onclick="return confirm(\'Are you sure?\')" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>';

                return $edit . ' ' . $delete;
            })

            ->rawColumns(['thumbnail', 'status', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.flashsale.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/flashsale'), $name);
            $imagePath = 'uploads/flashsale/' . $name;
        }

        FlashSale::create([
            'name' => $request->name,
            'thumbnail' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('flash-sale.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        $data = FlashSale::findOrFail($id);
        return view('admin.flashsale.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = FlashSale::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/flashsale'), $name);
            $data->thumbnail = 'uploads/flashsale/' . $name;
        }

        $data->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('flash-sale.index');
    }

    public function delete($id)
    {
        FlashSale::findOrFail($id)->delete();
        return back();
    }
}
