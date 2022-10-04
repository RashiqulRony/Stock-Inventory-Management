<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{
    public function profileUpdate(Request $request) {
        try {
            $user = auth('api')->user();

            $rules = [
                'name'      => 'required|max:191',
                'email'     => 'required|email|max:191|unique:users',
                'phone'     => 'required|max:15|unique:users',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json(['status' => false, 'errors'=> $validator->messages()]);
            }

            User::find($user->id)->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'avatar'  => $request->avatar,
                'logo'    => $request->logo,
                'address' => $request->address,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Profile update successfully'
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
