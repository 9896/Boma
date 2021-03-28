<?php

namespace App\Customs;

use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Validator as Validator;

/**
 * This class will be responsible for product validation
 * 
 * @package Customs
 * @author Israel Immanuel
 */
class ProductValidator{
    /**
     * This method will be responsible for handling validation of the various fields in the form
     * @param Request  $request
     * @return array the array will hold results for normal input fields and that for the files which require special handling
     */
    
    static function validateProduct(Request $request){
        /**
         * This block works on the insertion of images into the public folder of app which i modified in filesystem.php from storage_path() to public_path()
         * insertion of actuall image path into the database will happen in the controller
         */
        $selectedImagePaths = array();
        if($request->hasFile('productPhotos')){
        $selectedImages = $request->allFiles('productPhotos');
        $selectedImagesFailedUpload = array();
        /**
         * Note that there is a catch to the code below, aquiring all the uploaded i images we aquire i instances of UploadedFile Objects 
         * which are held an array named product photos i.e a=array('productPhotos'=>array(Obj1,Obj2,Obj3...i)), note that these objects 
         * are basically extensions of the PHP SplFileInfo class thus the normal file manipulation methods are available to this extended 
         * class
         * The array will be sequntially accessed and the methods necessary run for each object
         * 
         */
        foreach($selectedImages as $selectedImage){
            for($i = 0; $i < count($selectedImage); $i++){
                $selectedImageSize = round(($selectedImage[$i]->getSize()) / 1048576, $precision = 2);
                if($selectedImageSize > 1){
                    $selectedImagesFailedUpload = $selectedImageSize;//simply save the oversized image's size, it might find use later
                }else{
                    $id = auth()->user()->id;
                    $selectedImageName = $selectedImage[$i]->getClientOriginalName();
                    $selectedImageStorageName = $id."_".$selectedImageName;
                    $selectedImagePaths[$i] = $selectedImage[$i]->storeAs("UserProductImages/{$id}", $selectedImageStorageName,"public");

                }
            }
        }
        }else{
            //runs incase no image was selected but not that for the benefit of count() used in the controller i have not implemented
            //anything so tha selectedImagePaths remains an empty array
        }

        $validator = Validator::make($request->all(),[
            'category' => 'required',
            //in this sector remember to add photo validation
            'county' => 'required',
            'subCounty' => 'required',
            'productTitle' => 'required',
            'productFor' => 'required',
            'description' => 'required | integer',
            'price' => 'required | integer',
            //'negotiable' => 'required',
            'phoneNumber' => 'required | integer',
            'plan' => 'required',
            //'terms' => 'required'
        ]);
        return array($validator, $selectedImagePaths);
    }
}