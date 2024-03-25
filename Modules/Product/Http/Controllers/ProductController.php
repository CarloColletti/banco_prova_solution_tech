<?php

namespace Modules\Product\Http\Controllers;

use Modules\Product\Entities\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();
        $numberDead = Product::onlyTrashed()->count();
        return view('product::index', compact('products', 'numberDead'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
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


    public function trash()
    {
        $products = Product::onlyTrashed()->get();

        // dd($users);

        return view('product::trash', compact('products'));
    }


    public function force_delete(Int $id)
    {
        // query lunga per risolvere il problema della dipendence injection 
        $product = Product::where('id', $id)->onlyTrashed()->first();

        // if ($user->id === auth()->user()->id) {
        //     return abort(403);
        // }

        $product->forceDelete();

        return redirect()->route('product.index');
    }

    public function restore(Int $id)
    {
        // query lunga per risolvere il problema della dipendence injection 
        // $user = User::where('id', $id)->onlyTrashed()->first();

        // $user->restore();

        return redirect()->route('product.index');
    }
}
