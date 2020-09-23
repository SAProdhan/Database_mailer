<?php

namespace App\Http\Controllers;
use App\Clients;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Redirect,Response;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }



    //Controller start
    public function index(Request $request)
    {
    if ($request->ajax()) {
    $data = Clients::latest()->get();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', function($row){
    
    $action = '<a class="btn btn-info" id="show-user" data-toggle="modal" data-id='.$row->Serial_No.'>Show</a>
    <a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->Serial_No.'>Edit </a>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a id="delete-user" data-id='.$row->Serial_No.' class="btn btn-danger delete-user">Delete</a>';
    
    return $action;
    
    })
    ->rawColumns(['action'])
    ->make(true);
    }
    
    return view('users');
    }
    
    public function store(Request $request)
    {
    
    $r=$request->validate([
    'name' => 'required',
    'email' => 'required',
    
    ]);

    $uId = $request->user_id;
    Clients::updateOrCreate(['id' => $uId],['name' => $request->name, 'email' => $request->email]);
    if(empty($request->user_id))
    $msg = 'Clients created successfully.';
    else
    $msg = 'Clients data is updated successfully';
    return redirect()->route('users.index')->with('success',$msg);
    }
    
    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function show($id)
    {
    $where = array('Serial_No' => $id);
    $user = Clients::where($where)->first();
    return Response::json($user);
    //return view('users.show',compact('user'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function edit($id)
    {
    $where = array('Serial_No' => $id);
    $user = Clients::where($where)->first();
    return Response::json($user);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function destroy($id)
    {
    $user = Clients::where('Serial_No',$id)->delete();
    return Response::json($user);
    //return redirect()->route('users.index');
    }
    //Controller end







































}
