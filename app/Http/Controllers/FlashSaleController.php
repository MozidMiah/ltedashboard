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
                return $row->status == 'active'
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })

            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('flashsale.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>
                <a href="' . route('flashsale.delete', $row->id) . '" class="btn btn-sm btn-danger">Delete</a>
                ';
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

        return redirect()->route('flashsale.index')->with('success', 'Created!');
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

        return redirect()->route('flashsale.index');
    }

    public function delete($id)
    {
        FlashSale::findOrFail($id)->delete();
        return back();
    }
}
