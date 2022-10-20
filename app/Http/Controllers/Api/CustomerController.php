<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use ImageUpload;
    public $_filePath = '';
    public $_authUser = null;

    public function __construct()
    {
        $this->_filePath = auth('api')->user()->domain.'/customer';
        $this->_authUser = auth('api')->user();
    }

    public function index(Request $request)
    {
        try {
            $sql = Customer::where('user_id', $this->_authUser->id)->orderBy('id', 'desc');
            if (isset($request->filter)) {
                $sql->where('name', 'LIKE', '%' . $request->filter . '%');
                $sql->orWhere('email', 'LIKE', '%' . $request->filter . '%');
                $sql->orWhere('phone', 'LIKE', '%' . $request->filter . '%');
                $sql->orWhere('address', 'LIKE', '%' . $request->filter . '%');
            }
            $data = $sql->paginate(25);

            return response()->json([
                'status'  => true,
                'message' => 'Data get successfully',
                'data'    => $data
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'name'       => 'required|max:255',
            'phone'      => 'required|max:15',
            'email'      => 'nullable|email|max:255',
            'status'     => 'required|in:Active,Inactive',
            'photo'      => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            if ($request->hasFile('photo')) {
                $file = $this->imageUpload($request->file('photo'), $this->_filePath, '');
                $image = $file['name'];
            }

            Customer::create([
                'user_id'   => $this->_authUser->id,
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'address'   => $request->address,
                'photo'     => $image ?? null,
                'status'    => $request->status,
            ]);

            return response()->json([
                'status'  => true,
                'message' => "Customer save successfully !!"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        try {
            $data = Customer::where('user_id', $this->_authUser->id)->find($id);
            return response()->json([
                'status'  => true,
                'message' => "Data get successfully",
                'data'    => $data
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'       => 'required|max:255',
            'phone'      => 'required|max:15',
            'email'      => 'nullable|email|max:255',
            'status'     => 'required|in:Active,Inactive',
            'photo'      => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            $data = Customer::where('user_id', $this->_authUser->id)->find($id);

            if ($request->hasFile('photo')) {
                if ($data->photo) {
                    $this->imageAndFileDelete($this->_filePath, $data->photo, '');
                }
                $file = $this->imageUpload($request->file('photo'), $this->_filePath, '');
                $image = $file['name'];
            }

            $data->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'address'   => $request->address,
                'photo'     => $image ?? $data->photo,
                'status'    => $request->status,
            ]);

            return response()->json([
                'status'  => true,
                'message' => "Customer update successfully !!"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Customer::where('user_id', $this->_authUser->id)->find($id);
            if ($data->photo) {
                $this->imageAndFileDelete($this->_filePath, $data->photo, '');
            }
            $data->delete();

            return response()->json([
                'status'  => true,
                'message' => "Customer delete successfully !!"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
