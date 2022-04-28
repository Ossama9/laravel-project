<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{



    public function getModelById(Request $request)
    {
        $model = Modele::find($request->id);
        dd($model);
//        return view('models', ['models' => $model]);

    }

    public function getModels()
    {
        return Modele::all()->toJson(JSON_PRETTY_PRINT);

//        $models = Modele::all();
//        return view('models', ['models' => $models]);
    }

    public function getModelByIdBrand(Request $request)
    {

        $brand = Brand::find($request->id);

        return $brand->modeles->toJson(JSON_PRETTY_PRINT);

    }
}
