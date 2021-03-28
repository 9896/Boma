<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\County as County;
use App\Models\SubCounty as SubCounty;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * Note that a chunk of the code below basically attempts to immitate the functionality of faker
         * 
         */
        $c = array();
        $i = -1;

        $sc = array();
        $j = -1;

        $counties = County::get();
        foreach($counties as $county){
            $i++;
            $c[$i] = $county->countyName;
        }

        $sub_counties = SubCounty::get();
        foreach($sub_counties as $sub_county){
            $j++;
            $sc[$j] = $sub_county->subCounty;
        }

        $negotiable = array('negotiable', null);
        $plan = array('standardAd', 'platinumAd', 'diamondAd');
        $product_for = array('sale', 'rent');
        $category = array('plot', 'appartment');
        $title = array('House', 'Aparment','Plot','Land','Furnished','Flat','Building');
        return [
            //This will provide data for productTable
            'title' => $title[array_rand($title)],
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 76),
            'county' => $c[array_rand($c)],//notice that we could have instead used $this->faker->randomElement($array = $c)
            'sub_county' => $sc[array_rand($sc)],
            'negotiable' => $negotiable[array_rand($negotiable)],
            'phone_number' => $this->faker->phoneNumber,
            'plan' => $plan[array_rand($plan)],
            'product_for' => $product_for[array_rand($product_for)],
            'category' => $category[array_rand($category)],
            'price' => $this->faker->numberBetween($min = 7000, $max = 50000)

            
        ];
    }
}
