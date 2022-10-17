<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class CommonController extends Controller
{
    use ImageUpload;

    public $_authUser = null;

    public function __construct()
    {
        $this->_authUser = auth('api')->user();
    }

    public function profileUpdate(Request $request) {
        try {
            $user = User::find($this->_authUser->id);
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
                $this->imageAndFileDelete($user->domain, $this->_authUser->avatar, '');
                $file = $this->imageUpload($request->file('avatar'), $user->domain, '');
                $avatar = $file['name'];
            }
            if ($request->hasFile('logo')) {
                $this->imageAndFileDelete($user->domain, $this->_authUser->logo, '');
                $file = $this->imageUpload($request->file('logo'), $user->domain, '');
                $logo = $file['name'];
            }

            $user->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'avatar'  => $avatar ?? $user->avatar,
                'logo'    => $logo ?? $user->logo,
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

            if (Hash::check($request->old_password, $this->_authUser->password)) {
                User::find($this->_authUser->id)->update([
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

    public function getCategories() {
        try {
            $data = Category::with('subcategories')->where('user_id', $this->_authUser->id)->orderBy('id', 'desc')->get();

            return response()->json([
                'status'  => true,
                'message' => "Data get successfully.",
                'data'    => $data,
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function getSubcategories() {
        try {
            $data = Subcategory::where('subcategories.user_id', $this->_authUser->id)
                ->where('subcategories.status', 'Active')
                ->join('categories', 'subcategories.category_id', '=', 'categories.id')
                ->select('subcategories.*', 'categories.title as category_title')
                ->orderBy('subcategories.id', 'desc')
                ->get();

            return response()->json([
                'status'  => true,
                'message' => "Data get successfully.",
                'data'    => $data,
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function getCategoryWiseSubcategories($categoryId) {
        try {
            $data = Subcategory::where('user_id', $this->_authUser->id)
                ->where('category_id', $categoryId)
                ->get();

            return response()->json([
                'status'  => true,
                'message' => "Data get successfully.",
                'data'    => $data,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function getBrands() {
        try {
            $data = Brand::where('user_id', $this->_authUser->id)->orderBy('id', 'desc')->get();

            return response()->json([
                'status'  => true,
                'message' => "Data get successfully.",
                'data'    => $data,
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
