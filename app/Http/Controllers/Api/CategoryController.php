<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ImageUpload;
    public $_filePath = '';

    public function __construct()
    {
        $this->_filePath = auth('api')->user()->domain.'/category';
    }

    public function index()
    {
        try {
            $user = auth('api')->user();
            $data = Category::where('user_id', $user->id)->orderBy('id', 'desc')->get();

            return response()->json([
                'status' => true,
                'message' => 'Data get successfully',
                'data' => $data
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
            'status'   => 'required|in:Active,Inactive',
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

            Category::create([
                 'user_id'      => auth('api')->id(),
                 'title'        => $request->title,
                 'description'  => $request->description,
                 'image'        => $image ?? null,
                 'status'       => $request->status,
            ]);

            return response()->json([
                'status'  => true,
                'message' => "Category save successfully !!"
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
            $data = Category::find($id);
            return response()->json([
                'status'  => true,
                'message' => "Data get successfully",
                'data' => $data
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
            'status'   => 'required|in:Active,Inactive',
            'image'      => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            $category = Category::find($id);

            if ($request->hasFile('image')) {
                $this->imageAndFileDelete($this->_filePath, $category->image, '');
                $file = $this->imageUpload($request->file('image'), $this->_filePath, '');
                $image = $file['name'];
            }

            $category->update([
                'title'        => $request->title,
                'description'  => $request->description,
                'image'        => $image ?? $category->image,
                'status'       => $request->status,
            ]);

            return response()->json([
                'status'  => true,
                'message' => "Category update successfully !!"
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
        //
    }
}
