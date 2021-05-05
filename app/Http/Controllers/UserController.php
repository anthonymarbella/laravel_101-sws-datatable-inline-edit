<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

class UserController extends Controller
{


    public function json(Request $request)
    {
        $result = DB::table('swsuser');

		return Datatables::querybuilder($result)
		->setRowId(function ($result) { return $result->username; })
		->make(true);

    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'password' => md5($request->password),
    				'storecode' => $request->storecode,
    				'firstname' => $request->firstname,
    				'lastname' => $request->lastname,
    				'mi' => $request->mi,
    				'jobtitlecode' => $request->jobtitlecode,
    				'sex' => $request->sex,
    				'useremail' => $request->useremail,
    				'useremail' => $request->useremail,
    			);
    			DB::table('swsuser')
    			->where('username', $request->username)
    			->update($data);
    		}
    		return response()->json($request);
    	}
    }

}
