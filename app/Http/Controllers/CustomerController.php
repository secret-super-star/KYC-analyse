<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Documenttype;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        $categoriss = Category::all();
        $documenttypes = Documenttype::all();
        return view('customers/index', compact('customers', 'categoriss', 'documenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoriss = Category::all();
        $documenttypes = Documenttype::all();
        return view('customers.create', compact('categoriss', 'documenttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documents = array();
        foreach($request->file('documents') as $file)
        {
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);
            $documents[] = $name;
        }

        $documents = implode(', ', $documents);

        $customer_data = $request->all();
        unset($customer_data['documents']);
        $customer_data['documents'] = $documents;
        Customer::create($customer_data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function search(Request $request)
    {
//        dump($request->all());
//        die();
        $customers = Customer::where('id', '>', 0);

        $customers->where('sex', $request->sex);
        $customers->where('category_id', $request->category_id);
        $customers->where('documenttype_id', $request->documenttype_id);
        $customers->with('documenttype')->with('category');
        $customers = $customers->get();
        return response()->json($customers);
    }
}
