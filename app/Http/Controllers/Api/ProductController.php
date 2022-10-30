<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ImageUpload;
    public $_filePath = '';
    public $_authUser = null;

    public function __construct()
    {
        $this->_filePath = auth('api')->user()->domain.'/product';
        $this->_authUser = auth('api')->user();
    }

    public function index(Request  $request)
    {
        try {
            $sql = Product::with('variants')->where('products.user_id', $this->_authUser->id)
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'categories.title as category_title', 'subcategories.title as subcategory_title', 'brands.title as brand_title');

            if (isset($request->filter)) {
                $sql->where('name', 'LIKE', '%' . $request->filter . '%');
                $sql->orWhere('categories.title', 'LIKE', '%' . $request->filter . '%');
                $sql->orWhere('subcategories.title', 'LIKE', '%' . $request->filter . '%');
                $sql->orWhere('brands.title', 'LIKE', '%' . $request->filter . '%');
            }

            $data = $sql->orderBy('products.id', 'desc')->paginate(25);

            return response()->json([
                'status'  => true,
                'message' => 'Data get successfully',
                'data'    => $data
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'category'      => 'required|exists:categories,id',
            'subcategory'   => 'required|exists:subcategories,id',
            'brand'         => 'required|exists:brands,id',
            'name'          => 'required|max:255',
            'status'        => 'required|in:Active,Inactive',
            'image'         => 'nullable|image',
            'variants'      => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            if ($request->hasFile('image')) {
                $file  = $this->imageUpload($request->file('image'), $this->_filePath, '');
                $image = $file['name'];
            }

            $product = Product::create([
                'user_id'        => $this->_authUser->id,
                'category_id'    => $request->category,
                'subcategory_id' => $request->subcategory,
                'brand_id'       => $request->brand,
                'name'           => $request->name,
                'descriptions'   => $request->description,
                'notes'          => $request->notes,
                'image'          => $image ?? null,
                'status'         => $request->status,
            ]);

            if ($product) {
                $variants = json_decode($request->variants, true);
                $productV = [];
                foreach ($variants as $variant) {
                    $productV[] = [
                        'product_id' => $product->id,
                        'code'       => $variant['code'],
                        'color'      => $variant['color'],
                        'size'       => $variant['size'],
                        'weight'     => $variant['weight'],
                    ];
                }
                ProductVariant::insert($productV);
            }

            return response()->json([
                'status'  => true,
                'message' => "Product save successfully !!"
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
            $data = Product::with('variants')->where('products.user_id', $this->_authUser->id)
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'categories.title as category_title', 'subcategories.title as subcategory_title', 'brands.title as brand_title')
                ->find($id);
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
            'category'      => 'required|exists:categories,id',
            'subcategory'   => 'required|exists:subcategories,id',
            'brand'         => 'required|exists:brands,id',
            'name'          => 'required|max:255',
            'status'        => 'required|in:Active,Inactive',
            'image'         => 'nullable|image',
            'variants'      => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()]);
        }

        try {
            $data = Product::where('user_id', $this->_authUser->id)->find($id);

            if ($request->hasFile('image')) {
                if ($data->image) {
                    $this->imageAndFileDelete($this->_filePath, $data->image, '');
                }
                $file = $this->imageUpload($request->file('image'), $this->_filePath, '');
                $image = $file['name'];
            }

            $data->update([
                'category_id'    => $request->category,
                'subcategory_id' => $request->subcategory,
                'brand_id'       => $request->brand,
                'name'           => $request->name,
                'descriptions'   => $request->description,
                'notes'          => $request->notes,
                'image'          => $image ?? $data->image,
                'status'         => $request->status,
            ]);

            if ($data) {
                ProductVariant::where('product_id', $data->id)->delete();
                $variants = json_decode($request->variants, true);
                $productV = [];
                foreach ($variants as $variant) {
                    $productV[] = [
                        'product_id' => $data->id,
                        'code'       => $variant['code'],
                        'color'      => $variant['color'],
                        'size'       => $variant['size'],
                        'weight'     => $variant['weight'],
                    ];
                }
                ProductVariant::insert($productV);
            }

            return response()->json([
                'status'  => true,
                'message' => "Product update successfully !!"
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
            $data = Product::where('user_id', $this->_authUser->id)->find($id);
            if ($data->image) {
                $this->imageAndFileDelete($this->_filePath, $data->image, '');
            }
            $data->delete();

            return response()->json([
                'status'  => true,
                'message' => "Product delete successfully !!"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
