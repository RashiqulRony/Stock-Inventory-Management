<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    use ImageUpload;
    public $_filePath = '';
    public $_authUser = null;

    public function __construct()
    {
        $this->_filePath = auth('api')->user()->domain.'/sale';
        $this->_authUser = auth('api')->user();
    }

    public function index()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
