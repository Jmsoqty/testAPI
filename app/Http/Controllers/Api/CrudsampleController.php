<?php

namespace App\Http\Controllers\Api;

use App\Models\Crudsample;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CrudsampleController extends Controller
{
    public function index()
    {
        $crudsamples = Crudsample::all();

        if($crudsamples->count()>0)
        {
            return response()->json([
                'status' => 200,
                'crudsamples' => $crudsamples
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No sample records found'
            ], 404);
        }
    }

    public function add(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:200',
            'section' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'contact_num' => 'required|digits:11'
        ]);
        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
            $crudsamples = Crudsample::create([
                'name' => $req->name,
                'section' => $req->section,
                'email' => $req->email,
                'contact_num' => $req->contact_num,
            ]);
            if($crudsamples)
            {
                return response()->json([
                    'status' => 200,
                    'message' => "Data Created Successfully"
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => 500,
                    'errors' => "Oops! Something went wrong!"
                ], 500);
            }
        }
    }
    public function view($id)
    {
        $crudsamples = Crudsample::find($id);
        if($crudsamples)
        {
            return response()->json([
                'status' => 200,
                'data' => $crudsamples
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "No sample found!"
            ], 404);
        }
    }
    public function update(Request $req, int $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:200',
            'section' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'contact_num' => 'required|digits:11'
        ]);
        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
            $crudsample = Crudsample::find($id);
            if($crudsample)
            {
                $crudsample -> update([
                    'name' => $req->name,
                    'section' => $req->section,
                    'email' => $req->email,
                    'contact_num' => $req->contact_num,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Data Updated Successfully"
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => "No sample found!"
                ], 404);
            }
        }
    }
    public function destroy($id)
    {
        $crudsample = Crudsample::find($id);
        if($crudsample)
        {
            $crudsample -> delete();
            return response()->json([
                'status' => 200,
                'message' => "Data Deleted Successfully"
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "No sample found!"
            ], 404);
        }
    }
}
