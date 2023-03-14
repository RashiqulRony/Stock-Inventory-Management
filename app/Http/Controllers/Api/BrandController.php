<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    use ImageUpload;
    public $_filePath = '';
    public $_authUser = null;

    public function __construct()
    {
        $this->_filePath = auth('api')->user()->username.'/brand';
        $this->_authUser = auth('api')->user();
    }

    public function index()
    {
        try {
            $data = Brand::where('user_id', $this->_authUser->id)->orderBy('id', 'desc')->get();

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
            'title'      => 'required|max:255',
            'status'     => 'required|in:Active,Inactive',
            'image'      => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            if ($request->hasFile('image')) {
                $file = $this->imageUpload($request->file('image'), $this->_filePath, '');
                $image = $file['name'];
            }

            Brand::create([
                'user_id'      => $this->_authUser->id,
                'title'        => $request->title,
                'description'  => $request->description,
                'image'        => $image ?? null,
                'status'       => $request->status,
            ]);

            return response()->json([
                'status'  => true,
                'message' => "Brand save successfully !!"
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
            $data = Brand::where('user_id', $this->_authUser->id)->find($id);
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
            'title'      => 'required|max:255',
            'status'     => 'required|in:Active,Inactive',
            'image'      => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            $data = Brand::where('user_id', $this->_authUser->id)->find($id);

            if ($request->hasFile('image')) {
                if ($data->image) {
                    $this->imageAndFileDelete($this->_filePath, $data->image, '');
                }
                $file = $this->imageUpload($request->file('image'), $this->_filePath, '');
                $image = $file['name'];
            }

            $data->update([
                'title'        => $request->title,
                'description'  => $request->description,
                'image'        => $image ?? $data->image,
                'status'       => $request->status,
            ]);

            return response()->json([
                'status'  => true,
                'message' => "Brand update successfully !!"
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
            $data = Brand::where('user_id', $this->_authUser->id)->find($id);
            if ($data->image) {
                $this->imageAndFileDelete($this->_filePath, $data->image, '');
            }
            $data->delete();

            return response()->json([
                'status'  => true,
                'message' => "Brand delete successfully !!"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
