<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function index()
    {
        return view('admin.coupon.index');
    }

    public function getData(Request $request)
    {
        $coupons = Coupon::latest()->get();

        return DataTables::of($coupons)
            ->addIndexColumn()
            ->editColumn('start_at', function ($row) {
                return $row->start_at
                    ? Carbon::parse($row->start_at)->format('d M Y h:i A')
                    : '-';
            })
            ->editColumn('expire_at', function ($row) {
                return $row->expire_at
                    ? Carbon::parse($row->expire_at)->format('d M Y h:i A')
                    : '-';
            })
            ->addColumn('status', function ($row) {
                $current = $row->status == 1 ? 'Active' : 'Inactive';
                return '
                <select class="form-control form-control-sm statusDropdown" data-id="' . $row->id . '" style="width:90px;">
                    <option value="1" ' . ($row->status == 1 ? 'selected' : '') . '>Active</option>
                    <option value="0" ' . ($row->status == 0 ? 'selected' : '') . '>Inactive</option>
                </select>
                ';
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('coupon.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="' . route('coupon.delete', $row->id) . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $edit . ' ' . $delete;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'         => 'required|unique:coupons,code',
            'discount_type' => 'required',
            'discount'     => 'required|numeric|min:1',
            'min_amount'   => 'nullable|numeric',
            'user_limit'   => 'nullable|numeric',
            'max_discount' => 'nullable|numeric',
            'start_at'     => 'nullable|date',
            'expire_at'    => 'nullable|date|after_or_equal:start_at',
        ]);

        $start_at = $request->start_at ? Carbon::parse($request->start_at) : null;
        $expire_at = $request->expire_at ? Carbon::parse($request->expire_at) : null;

        Coupon::create([
            'code'          => $request->code,
            'discount_type' => $request->discount_type,
            'discount'      => $request->discount,
            'min_amount'    => $request->min_amount,
            'user_limit'    => $request->user_limit,
            'max_discount'  => $request->max_discount,
            'start_at'      => $start_at,
            'expire_at'     => $expire_at,
            'status'        => 1,
        ]);

        return redirect()->route('coupon.index')->with('success', 'Coupon Added Successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
            'code'         => 'required|unique:coupons,code,' . $coupon->id,
            'discount'     => 'required|numeric|min:1',
            'min_amount'   => 'nullable|numeric',
            'start_date'   => 'nullable|date',
            'start_time'   => 'nullable',
            'expire_date'  => 'nullable|date|after_or_equal:start_date',
            'expire_time'  => 'nullable',
        ]);

        $start_at = $request->start_date && $request->start_time
            ? Carbon::parse($request->start_date . ' ' . $request->start_time)
            : null;

        $expire_at = $request->expire_date && $request->expire_time
            ? Carbon::parse($request->expire_date . ' ' . $request->expire_time)
            : null;

        $coupon->update([
            'code'         => $request->code,
            'discount_type' => $request->discount_type,
            'discount'     => $request->discount,
            'min_amount'   => $request->min_amount,
            'user_limit'   => $request->user_limit,
            'max_discount' => $request->max_discount,
            'start_at'     => $start_at,
            'expire_at'    => $expire_at,
        ]);

        return redirect()->route('coupon.index')->with('success', 'Coupon Updated Successfully');
    }

    public function status($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->status = $coupon->status == 1 ? 0 : 1;
        $coupon->save();

        return response()->json(['success' => 'Status updated successfully', 'status' => $coupon->status]);
    }

    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->back()->with('success', 'Coupon Deleted Successfully');
    }
}
