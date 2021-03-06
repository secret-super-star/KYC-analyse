<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Documenttype;
use App\Models\Ipaddress;
use App\Models\Tag;
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

        $ipaddresses = Ipaddress::select('ipaddress')->groupBy('ipaddress')->get();
//        $ip_ids = array();
        foreach ($ipaddresses as $ipaddress)
        {
            $user_ids = Ipaddress::where('ipaddress', $ipaddress->ipaddress)->get()->pluck('user_id');
            $users = User::whereIn('id', $user_ids)->get()->sortBy('name');
            $ipaddress['user'] = $users;
        }

        return view('customers/index', compact('customers', 'categoriss', 'documenttypes', 'ipaddresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriss = Category::all();
        $tags = $categoriss[0]->tag;
        $documenttypes = Documenttype::all();
        return view('customers.create', compact('categoriss', 'documenttypes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_data = $request->all();
        $documenttype_id = $request->documenttype_id;
        $new_documenttype = Documenttype::find($documenttype_id);

        if (!isset($new_documenttype)) {
            $new_documenttype = Documenttype::create([
                'name' => $documenttype_id
            ]);
        }

        $documents = array();
        foreach ($request->file('documents') as $file) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $name);
            $documents[] = $name;
        }

        $documents = implode(', ', $documents);

        if (isset($request->labels)) {
            $tags = implode(', ', $request->labels);
            unset($customer_data['labels']);
            $customer_data['labels'] = $tags;
        }

        $phone = $request['phone']['full'];
        unset($customer_data['documents']);
        unset($customer_data['phone']);
        $customer_data['documents'] = $documents;
        $customer_data['phone'] = $phone;
        $customer_data['documenttype_id'] = $new_documenttype->id;
        $user = User::create($customer_data);

        if (isset($request->ipaddress)) {
            foreach ($request->ipaddress as $ipaddress) {
                if($ipaddress == '') continue;
                $user->ipaddress()->create([
                    'ipaddress' => $ipaddress
                ]);
            }
        }

        return back()->with('success', "New customer has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $customer = $user;
        $customer_tags = $customer->labels;
        $customer_tags = explode(', ', $customer_tags);
        $tags = Tag::whereIn('id', $customer_tags)->get();
        return view('customers.show', compact('customer', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $categoriss = Category::all();
        $tags = $user->category->tag;
        $documenttypes = Documenttype::all();
        $customer = $user;
        return view('customers.edit', compact('customer', 'categoriss', 'documenttypes', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $customer_data = $request->all();
        $documenttype_id = $request->documenttype_id;
        $new_documenttype = Documenttype::find($documenttype_id);

        if (!isset($new_documenttype)) {
            $new_documenttype = Documenttype::create([
                'name' => $documenttype_id
            ]);
        }

        if ($request->hasFile('documents')) {
            $documents = array();
            foreach ($request->file('documents') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $documents[] = $name;
            }

            $documents = implode(', ', $documents);
            unset($customer_data['documents']);
            $customer_data['documents'] = $documents;
        }


        if (isset($request->labels)) {
            $tags = implode(', ', $request->labels);
            unset($customer_data['labels']);
            $customer_data['labels'] = $tags;
        }

        $phone = $request['phone']['full'];
        unset($customer_data['phone']);
        $customer_data['phone'] = $phone;
        $customer_data['documenttype_id'] = $new_documenttype->id;

        if (isset($request->ipaddress))
        {
            $user->ipaddress()->delete();
            foreach ($request->ipaddress as $ipaddress) {
                if($ipaddress == '') continue;
                $user->ipaddress()->create([
                    'ipaddress' => $ipaddress
                ]);
            }
        }
        $user->update($customer_data);

        return back()->with('success', "Customer data has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }

    public function search(Request $request)
    {
        $customers = User::where('id', '>', 1);
        if (isset($request->sex)) $customers->where('sex', $request->sex);
        if (isset($request->category_id)) $customers->where('category_id', $request->category_id);
        if (isset($request->documenttype_id)) $customers->where('documenttype_id', $request->documenttype_id);
        if (isset($request->name)) $customers->where('name', 'like', '%' . $request->name . '%');
        if (isset($request->address)) $customers->where('address', 'like', '%' . $request->address . '%');
        if (isset($request->DOB)) $customers->where('DOB', $request->DOB);
        if (isset($request->phone)) $customers->where('phone', 'like', '%' . $request->phone . '%');
        if (isset($request->email)) $customers->where('email', $request->email);
        if (isset($request->line_id)) $customers->where('line_id', $request->line_id);
        if (isset($request->facebook_id)) $customers->where('facebook_id', $request->facebook_id);
        if (isset($request->twitter_id)) $customers->where('twitter_id', $request->twitter_id);
        if (isset($request->telegram_id)) $customers->where('telegram_id', $request->telegram_id);
        if (isset($request->youtube_id)) $customers->where('youtube_id', $request->youtube_id);

        $ipaddress = $request->ipaddress;
        unset($ipaddress[0]);
        $customers->with('documenttype')->with('category');
        $customers = $customers->get();
        $filtered = array();
        foreach ($customers as $key => $customer) {
            $customer_ipaddress = $customer->ipaddress->pluck('ipaddress')->toArray();
            if(!empty($ipaddress)) {
//                $result = !empty(array_intersect($ipaddress, $customer_ipaddress));
                $result = count(array_intersect($ipaddress, $customer_ipaddress)) == count($ipaddress);
                if($result) {
                    unset($customers[$key]['ipaddress']);
                    $customers[$key]['ipaddress'] = implode(', ', $customer_ipaddress);
                    $filtered[] = $customers[$key];
                }
            } else {
                unset($customers[$key]['ipaddress']);
                $customers[$key]['ipaddress'] = implode(', ', $customer_ipaddress);
                $filtered[] = $customers[$key];
            }
        }

        return response()->json($filtered);
    }

    public function searchall(Request $request)
    {
        $customers = User::where('id', '>', 1);
        $customers->with('documenttype')->with('category');
        $customers = $customers->get();
        foreach ($customers as $key => $customer) {
            $ipaddress = implode(', ', $customer->ipaddress->pluck('ipaddress')->toArray());
            unset($customers[$key]['ipaddress']);
            $customers[$key]['ipaddress'] = $ipaddress;
        }
        return response()->json($customers);
    }

    public function getusers(){
        $users = User::all()->except(1);
        foreach ($users as $user) {
            $user['title'] = $user->name.' - Birthday';
            $user['start'] = $user->DOB;
            $user['allDay'] = true;
            $user['backgroundColor'] = '#00a65a';
            $user['borderColor'] = '#00a65a';
        }
        return response()->json($users);
    }
}
