<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index' , compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
           'name' => 'required|max:255',
           'code' => 'required|max:255',
           'status' => 'required|numeric',
           'percent' => 'required|numeric',
           'start_price' => 'required|numeric'
        ],[
            'name.required' => 'لطفا نام تخفیف را وارد کنید',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'code.required'=>'لطفا کد تخفیف را وارد کنید',
            'code.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'status.required'=>'وضعیت تخفیف را انتخاب کنید',
            'status.numeric'=>'وضعیت تخفیف را انتخاب کنید',
            'percent.required'=>'درصد تخفیف را وارد کنید',
            'percent.numeric'=>'لطفا فقط عدد وارد کنید',
            'start_price.required'=>'قیمت شروع تخفیف را وارد کنید',
            'start_price.numeric'=>'لطفا فقط عدد وارد کنید'
        ]);

        $discount = new Discount();
        $discount->create($request->all());
        flashs('ثبت شد');
        return redirect()->route('admin.discount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('admin.discount.edit' , compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'status' => 'required|numeric',
            'percent' => 'required|numeric',
            'start_price' => 'required|numeric'
        ],[
            'name.required' => 'لطفا نام تخفیف را وارد کنید',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'code.required'=>'لطفا کد تخفیف را وارد کنید',
            'code.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'status.required'=>'وضعیت تخفیف را انتخاب کنید',
            'status.numeric'=>'وضعیت تخفیف را انتخاب کنید',
            'percent.required'=>'درصد تخفیف را وارد کنید',
            'percent.numeric'=>'لطفا فقط عدد وارد کنید',
            'start_price.required'=>'قیمت شروع تخفیف را وارد کنید',
            'start_price.numeric'=>'لطفا فقط عدد وارد کنید'
        ]);
        $discount = Discount::find($id);
        if(!empty($discount))
        {
            $discount->update($request->all());
        }
        flashs('تغییرات با موفقیت اعمال شد');
        return redirect()->route('admin.discount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $discount = Discount::find($id);
        if(!empty($discount))
        {
            Discount::destroy($id);
        }
        flashs('حذف گردید');
        return redirect()->route('admin.discount.index');
    }

    public function changeStatus($id)
    {
        $discount = Discount::find($id);
        if(!empty($discount))
        {
            if($discount->status == 0)
                $discount->update(['status'=>1]);
            else
                $discount->update(['status'=>0]);
        }
        return redirect()->route('admin.discount.index');
    }
}
