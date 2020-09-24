<?php

namespace App\Http\Controllers;
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
        // $data = Clients::latest()->get();
            $data = DB::table('clients')->orderBy('Serial_No', 'DESC')->get();
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
        return view('Clients');
    }
    
    public function store(Request $request)
    {
        $msg = 'Data insertion error!';
        $validateData =$request->validate([
            'CompanyName' => 'required|max:255',
            'CompanyAddress' => 'max:255',
            'ContactPerson' => 'max:100',
            'Designation' => 'max:255',
            'MobileNo' => 'max:255',
            'EmailAddress' => 'max:255',
            'ITManager' => 'max:255',
            'ContactNo' => 'max:255',
            'EmailAddress_IT' => 'max:255',
            'Status' => 'max:25',
        ]);
        $data=array();
        $data['CompanyName']=$request->CompanyName;
        $data['CompanyAddress']=$request->CompanyAddress;
        $data['ContactPerson']=$request->ContactPerson;
        $data['Designation']=$request->Designation;
        $data['MobileNo']=$request->MobileNo;
        $data['EmailAddress']=$request->EmailAddress;
        $data['ITManager']=$request->ITManager;
        $data['ContactNo']=$request->ContactNo;
        $data['EmailAddress_IT']=$request->EmailAddress_IT;
        $post=DB::table('clients')->insert($data);
        if($post)
        {
            $msg = 'Inserted successfully.';
        }
        return Response::json($post);

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
        $user = DB::table('clients')->where('Serial_No',$id)->delete();
        return Response::json($user);
    //return redirect()->route('users.index');
    }
    //Controller end







































}
