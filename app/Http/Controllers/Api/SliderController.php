<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //

    public function sliderList()
    {
        $slider = Slider::get();
        $data = [];
        foreach ($slider as $val) {
            $data[] = [
                'title' => $val->title,
                'description' => $val->description,
                'image' => asset($val->image),
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
