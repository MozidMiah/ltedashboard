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
        $coupons = Coupon::latest();

        return DataTables::of($coupons)
            ->addIndexColumn()
            ->addColumn('start_at', function ($row) {
                return $row->start_at ? $row->start_at->format('d F, Y') : '';
            })
            ->addColumn('expire_at', function ($row) {
                return $row->expire_at ? $row->expire_at->format('d F, Y') : '';
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('coupon.edit', $row->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>';

                $delete = '<a href="' . route('coupon.delete', $row->id) . '" 
                                    onclick="return confirm(\'Are you sure?\')" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function changeStatus(Request $request)
    {
        $coupon = Coupon::findOrFail($request->id);
        $coupon->status = !$coupon->status;
        $coupon->save();

        return response()->json([
            'success' => true,
            'status' => $coupon->status
        ]);
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'           => 'required|unique:coupons,code',
            'discount_type'  => 'required',
            'discount'       => 'required|numeric|min:1',
            'min_amount'     => 'nullable|numeric',
            'user_limit'     => 'nullable|numeric',
            'max_discount'   => 'nullable|numeric',

            'start_date'     => 'required|date',
            'start_time'     => 'required',
            'expire_date'    => 'required|date',
            'expire_time'    => 'required',
        ]);

        // ================= Combine Date + Time =================
        $start_at = Carbon::parse($request->start_date . ' ' . $request->start_time);
        $expire_at = Carbon::parse($request->expire_date . ' ' . $request->expire_time);

        Coupon::create([
            'code'          => $request->code,
            'discount_type' => $request->discount_type,
            'discount'      => $request->discount,
            'min_amount'    => $request->min_amount,
            'user_limit'    => $request->user_limit,
            'max_discount'  => $request->max_discount,
            'start_at'      => $start_at,
            'expire_at'     => $expire_at,
            'status'        => $request->status ?? 1,
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
