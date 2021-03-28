<?php

namespace App\Customs;

/**
 * This class is in the most basic sense a faker
 */
class ProductFaker
{
    static function fakeProduct()
    {
        /**
         * This is basically a Faker
         * This code will be used to create dummy directory with dummy data that will be used to fill the index page
         * we have basically acquired all the images in the plots directory
         * Note that the Directory of a product will have the product_id and the image's names concatenated with the same prod_id
         */
        $imagesArray = array();
        $ds = DIRECTORY_SEPARATOR;
        $imagesArray = scandir(public_path().$ds.'images'.$ds.'plots');//alternatively $imagesArray = Storage::disk('public')->files('images'.$ds.'plots');
        $ds = DIRECTORY_SEPARATOR;
        $imagesInt = 1;//this variable will be the one to ensure that the $imagesArray variable is well traversed, set to one to skip the dots of scandir()
        //this loop is majorly responsible for the creation of the directories holding product images
        for($i = 7; $i < 59; $i++){
            Storage::disk('public')->makeDirectory('UserProductImages'.$ds.$i);
            //this loop is responsible for restricting the number of images that will be placed into a particular product directory
            for($j = 0; $j < 5; $j++){
                $imagesInt++;//is used inside the imageArray variable
                //this block ensures that the imagesInt which acts as an index in images array does not surpas and result in unknown offset errror
                if($imagesInt >= count($imagesArray)){
                    $imagesInt = 2;
                }
                $imageIndex = $imagesInt;
                //copy the images in the images/plots directory and place them into the UserProductImage directory and finally sequentially push them into the db
                Storage::disk('public')->copy('images'.$ds.'plots'.$ds.$imagesArray[$imageIndex], 'UserProductImages'.$ds.$i.$ds.$i."_".$imagesArray[$imageIndex]);
                ProductImagePath::create([
                    'product_id' => $i,
                    'product_image_path' => 'UserProductImages'.$ds.$i.$ds.$i."_".$imagesArray[$imageIndex]
                ]);
            }
        }

    }
}