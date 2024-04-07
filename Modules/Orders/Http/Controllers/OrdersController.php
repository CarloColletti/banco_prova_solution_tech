<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Orders\Entities\Orders;
use Modules\Product\Entities\Product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('orders::index', compact('products'));
    }

    public function order_create(Request $request)
    {

        $selectedProducts = Session::get('selectedProducts');

        $products = Product::whereIn('id', $selectedProducts)->get();

        // dd($products);

        return view('orders::cart', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $form_data = $request->all();
        $productIds = $request->input('id_products');



        // dd($form_data);

        $order = new Orders();

        $order->name = $form_data['name'];
        $order->customer_id = Auth::id();
        $order->discount = $form_data['discount'];
        $order->discount_type = $form_data['discount_type'];
        $order->total_amount = $form_data['total_amount'];

        $order->save();

        $order->products()->attach($productIds);


        return redirect()->route('order.show');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $selectedProducts = $request->input('products');

        // dd($selectedProducts);

        Session::put('selectedProducts', $selectedProducts);

        return redirect('order/order_create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $author = Auth::id();
        $orders = Orders::where('customer_id', $author)->with('products')->get();


        return view('orders::show_order', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit()
    {
        return view('orders::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
