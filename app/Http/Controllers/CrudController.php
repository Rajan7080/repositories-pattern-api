<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Crud;

class CrudController extends Controller
{
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => true,
                'message' => 'filled all necessary form',
                'error' => $validator->errors()->all(),
            ], 400);
        }
        $data = Crud::create([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'A New Data Created',
            'data' => $data

        ], 201);
    }
    public function get_data()
    {
        $data = Crud::get();
        return response()->json([
            'status' => true,
            'message' => 'you get the user data',
            'data' => $data
        ], 200);
    }
    public function get_id($id)
    {
        $data = Crud::find($id);
        return response()->json([
            'status' => true,
            'message' => 'you get the user data',
            'data' => $data
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'error' => $validator->errors()->all()
            ], 401);
        }

        $data = Crud::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'No record found',
                'error' => 'Record not found'
            ], 404);
        }

        // Update the data
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');

        // Save the updated data
        $data->save();

        // Return success response
        return response()->json([
            'status' => true,
            'message' => 'User data updated successfully',
            'data' => $data
        ], 200);
    }
    public function delete($id)
    {
        $data = Crud::find($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'User data deleted ',
        ], 200);
    }
}
