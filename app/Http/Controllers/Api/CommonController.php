<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class CommonController extends Controller
{
    use ImageUpload;

    public function profileUpdate(Request $request) {
        try {
            $auth = auth('api')->user();
            $user = User::find($auth->id);
            $rules = [
                'name'      => 'required|max:191',
                'email'     => 'required|email|max:191|unique:users,email,'.$user->id,
                'phone'     => 'required|max:15|unique:users,phone,'.$user->id,
                'address'     => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json(['status' => false, 'errors'=> $validator->messages()]);
            }

            if ($request->hasFile('avatar')) {
                $this->imageAndFileDelete($user->domain, $auth->avatar, '');
                $file = $this->imageUpload($request->file('avatar'), $user->domain, '');
                $avatar = $file['name'];
            }
            if ($request->hasFile('logo')) {
                $this->imageAndFileDelete($user->domain, $auth->logo, '');
                $file = $this->imageUpload($request->file('logo'), $user->domain, '');
                $logo = $file['name'];
            }

            $user->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'avatar'  => isset($avatar) ? $avatar : $user->avatar,
                'logo'    => isset($logo) ? $logo : $user->logo,
                'address' => $request->address,
            ]);

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Profile update successfully'
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function changePassword(Request $request) {
        $rules = [
            'old_password'      => 'required|min:8|max:20',
            'password'      => 'required|min:8|max:20|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            $user = auth('api')->user();

            if (Hash::check($request->old_password, $user->password)) {
                User::find($user->id)->update([
                    'password' => bcrypt($request->password)
                ]);

                return response()->json([
                    'status' => true,
                    'message' => "Your password change successfully."
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Your old password word did not match"
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
