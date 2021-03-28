<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Validator as Validator;
use App\Customs\ProductValidator as ProductValidator;
use App\Models\Product as Product;
use App\Models\ProductImagePath as ProductImagePath;
use Illuminate\Support\Facades\Storage as Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        //fetch all data from the sub-county table and send it to create page
        $locations = DB::table('counties')->orderBy('countyName', 'ASC')->get();
        $subCounties = DB::table('sub_counties')->orderBy('subCounty', 'ASC')->get();
        return view('products.create')->with(['locations'=>$locations,'subCounties'=>$subCounties]);
    }

    /**
     * Store a newly created resource in storage.
     * First the Product validar method will be called checking the inputs
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        list($validator,$selectedImagePaths) = ProductValidator::validateProduct($request);
        /**
         * if validator fails redirect with error information
         * Note that a count is done on the selected images and a redirect will happen if: 
         * 1. no image is selected
         * 2. The images selected is more than 5MBs and thus they would not be placed in the array
         * rendering the selectedImagePaths variable empty and thus there redirect 
         * */
        if($validator->fails() || count($selectedImagePaths) < 1){
            return back()
            ->withErrors($validator)
            ->withInput();
        }else{
            //if validation succeeds place all necessary data into the database
            //Note that two databases are affected, products and product_image_path(which is an extension of product)
            $product = Product::create([
                'title' => $request->input('productTitle'),
                'description' => $request->input('description'),
                'user_id' => auth()->user()->id,
                'county' => ucfirst(strtolower($request->input('county'))),
                'sub_county' => ucfirst(strtolower($request->input('subCounty'))),
                'negotiable' => $request->input('negotiable'),// check the value of empty requested input: tried it and it seems that is empty
                'phone_number' => $request->input('phoneNumber'),
                'plan' => $request->input('plan'),
                'product_for' => $request->input('productFor'),
                'category' => $request->input('category')
            ]);
            $productId = $product->id;
            //loop through selectedImagePaths
            foreach($selectedImagePaths as $selectedImagePath){
                ProductImagePath::create([
                    'product_id' => $productId,
                    'product_image_path' => $selectedImagePath
                ]);
            }

        }

        
        //Add the product info belonging to a specific user into the database
        return view('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
