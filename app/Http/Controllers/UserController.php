<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Documenttype;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = User::all()->except(1);
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
        User::create($customer_data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $customer = $user;
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }

    public function search(Request $request)
    {
        $customers = User::where('id', '>', 1);

        $customers->where('sex', $request->sex);
        $customers->where('category_id', $request->category_id);
        $customers->where('documenttype_id', $request->documenttype_id);
        $customers->with('documenttype')->with('category');
        if (isset($request->name)) $customers->where('name', 'like', '%'.$request->name.'%');
        if (isset($request->address)) $customers->where('address', 'like', '%'.$request->address.'%');
        if (isset($request->DOB)) $customers->where('DOB', $request->DOB);
        if (isset($request->phone)) $customers->where('phone', 'like', '%'.$request->phone.'%');
        if (isset($request->email)) $customers->where('email', $request->email);
        if (isset($request->line_id)) $customers->where('line_id', $request->line_id);
        if (isset($request->facebook_id)) $customers->where('facebook_id', $request->facebook_id);
        if (isset($request->twitter_id)) $customers->where('twitter_id', $request->twitter_id);
        if (isset($request->telegram_id)) $customers->where('telegram_id', $request->telegram_id);
        if (isset($request->youtube_id)) $customers->where('youtube_id', $request->youtube_id);
        if (isset($request->ipaddress)) $customers->where('ipaddress', 'like', '%'.$request->ipaddress.'%');
        $customers = $customers->get();
        return response()->json($customers);
    }

    public function searchall(Request $request)
    {
        $customers = User::where('id', '>', 1);
        $customers->with('documenttype')->with('category');
        $customers = $customers->get();
        return response()->json($customers);
    }
}
