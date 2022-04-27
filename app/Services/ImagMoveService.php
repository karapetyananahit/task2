<?php

namespace App\Services;

use App\Models\Image;


/**
 * Class ImagMoveService
 * @package App\Services
 */
class ImagMoveService
{
    public function moveImg($product,$request)
    {
        $images = array();


        $files = $request->file('img');

        $product->save();

        for ($i = 0; $i < count($files); $i++) {
            $name = $files[$i]->getClientOriginalName();
            $destinationPath = public_path('img');
            if ($files[$i]->move($destinationPath, $name)) {
                $images[] = $name;
            }

        }

        foreach ($images as $i) {

            $image = new Image();
            $image->img = $i;
            $image->product_id = $product->id;
            $image->save();
        }

    }
}
