<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Modele;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getBrands()
    {
        return Brand::all()->toJson(JSON_PRETTY_PRINT);
    }




/*    public function brandByIdModel(Request $request)
    {
        $brand = Brand::find($request->id);

//        $models = $brand->modeles;

        return $brand->modeles->toJson(JSON_PRETTY_PRINT);

    }*/


}
