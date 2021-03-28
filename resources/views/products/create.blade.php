@extends('layouts.product-master')

@section('title', 'Post Ad')


@section('content')
<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="100" style="margin:4px">')).attr('src', event.target
                        .result).appendTo(placeToInsertImagePreview);
                }
                if (input.files[i].size > 5000000) {
                    alert('File too big. Ensure it is below 5MBs');
                } else {
                    reader.readAsDataURL(input.files[i]);
                }

            }
        }

    };

    $('#product-photo').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
<form class="needs-validation mt-2" novalidate style="background-color: white; padding: 1em;"
    enctype="multipart/form-data" id="apple" action="{{ route('products.store') }}" method="POST">
    <?php echo csrf_field() ?>
<p>
@if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li style="color:red">{{$error}}</li>
@endforeach
@endif
</ul>
<p>
<ul>
@if(!@empty($selectImage))
<li style="color:red">{{$selectImage}}</li>
@endif
</ul>
</p>

</p>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="custom-select" id="category" required name="category">
            <option selected disabled value="">Choose...</option>
            <option value="plot" @igit init(old('category') == "plot") {{'selected'}} @endif>Plot</option>
            <option value="apartment" @if(old('category') == "apartment") {{'selected'}} @endif>Apartment</option>
        </select>
        <div class="invalid-feedback">
            Please select a valid Category.
        </div>
    </div>

    <div class="form-group">
        <label for="product-photo" style="cursor:pointer; color:green">Add Product Photo</label><br>
        <input type="file" class="form-control-file" id="product-photo" style="display:none" accept="image/*"
            name="productPhotos[]" multiple="multiple" required>
        <div class="gallery"></div>
        <small class="text-muted">Image must be less than 5MBs</small>
        <small class="text-muted">You can select multiple photos at once. Hold <kbd> ctrl</kbd> and click on desired
            pictures for desktop</small><br>
        <div class="invalid-feedback">
            Please select atleast one photo
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="county">County</label>
            <select class="custom-select" id="county" required v-model="countyId" name="county">
                <option selected disabled value="">Choose...</option>
                @foreach($locations as $location)
                
                <option value="{{$location->id}}" @if(old('county') == "$location->id") {{'selected'}} @endif>{{$location->countyName}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Please select a valid County.
            </div>
        </div>

        <custom-location>
        <!-- attempt to change: id to countyName -->
            <custom-options-sub v-for="sub in {{ $subCounties }}" :sub="sub" :value="sub.id"
                v-if="sub.county_id == countyId">
            </custom-options-sub>
        </custom-location>
    </div>

    <div class="form-group">
        <label for="productTitle">Title</label>
        <input type="text" class="form-control" id="productTitle" required name="productTitle"
        value="<?=old('productTitle', '') ?>">
        <small class="text-muted">Make your title short and precise</small>
        <div class="invalid-feedback">
            Please give a product title
        </div>
    </div>

    <div class="form-group">
        <label for="productFor">Product for</label>
        <select class="custom-select" id="productFor" required name="productFor" value="<?=old('productFor', '') ?>">
            <option selected disabled value="">Choose...</option>
            <option value="sale" @if(old('productFor') == "sale") {{'selected'}} @endif>Sale</option>
            <option value="rent" @if(old('productFor') == "rent") {{'selected'}} @endif>Rent</option>
        </select>
        <small class="text-muted" >Will you e.g rent or sell the property</small>
        <div class="invalid-feedback">
            Please select a choice, rent or sale.
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" id="description" name="description" required><?=old('description', '') ?></textarea>
        <small class="text-muted">Feel free to give a detailed description</small>
        <div class="invalid-feedback">
            Please give a description
        </div>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" value="<?=old('price', '') ?>"  name="price" required>
        <small class="text-muted">Only digits are allowed</small>
        <div class="invalid-feedback">
            Please give the price
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="negotiable" id="negotiable" name="negotiable" 
            @if(old('negotiable') == "negotiable") {{'checked'}} @endif>
            <label class="form-check-label" for="negotiable">
                Negotiable
            </label>
            <div class="invalid-feedback">
                Specify whether the price is fixed or negotiable
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="phoneNumber">Phone Number</label>
        <input type="number" class="form-control" id="phoneNumber" value="<?= old('phoneNumber','') ?>" name="phoneNumber" required>
        <small class="text-muted">Only digits are allowed</small>
        <div class="invalid-feedback">
            Please give your phone number
        </div>
    </div>

    <div class="card form-group" style="width: 18rem;">
        <div class="card-header">
            <h3>Promote Your Add!</h3>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="custom-control custom-radio">
                    <input type="radio" id="standardAd" name="plan" value="standardAd" class="custom-control-input" required
                    >
                    <label class="custom-control-label" for="standardAd">Standard Ad(free)</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="custom-control custom-radio">
                    <input type="radio" id="platinumAd" name="plan" value="platinumAd" class="custom-control-input" required
                    >
                    <label class="custom-control-label" for="platinumAd">Platinum Ad</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="custom-control custom-radio">
                    <input type="radio" id="diamondAd" name="plan" value="diamondAd"  class="custom-control-input" required
                    >
                    <label class="custom-control-label" for="diamondAd">Diamond Ad</label>
                </div>
            </li>
        </ul>
        <div>
        <small class="text-muted">Please select a plan</small>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="agree" name="terms" id="terms" @if(old('terms') == "terms") {{'checked'}} @endif required>
            <label class="form-check-label" for="terms">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>


    <button class="btn btn-primary" type="submit">Post Ad</button>
    <!--<custom-options-sub v-for="sub in {{ $subCounties }}" :sub="sub" :value="sub.id" v-if="sub.county_id == countyId">
    </custom-options-sub>
    <br>
    @{{ cId() }}
    @{{name}}
    @{{sayHi()}}
    <custom-option v-for="location in {{ $locations }}" :location="location" value="location.countyName">
    </custom-option>-->

</form>
<!-- {!! $locations !!}-->

@endsection

@section('footerScripts')
@parent
<script>
Vue.component('custom-location', {

    template: `<div class="form-group col" >
        <label for="subCounty">Sub-county</label>
        <select class="custom-select" id="subCounty" required name="subCounty">
          <option selected disabled value="">choose...</option>
          <slot></slot>
        </select>
        
        <div class="invalid-feedback">
            Please select a valid Location.
        </div>
    </div>`,
});

Vue.component('custom-option', {
    props: ['location'],
    template: `
        <p>@{{ location.countyName }}</p>
  `
});
Vue.component('custom-options', {
    props: ['location'],
    template: `
        <option value="location.value">@{{ location.countyName }}</option>
  `,

});

Vue.component('custom-options-sub', {
    props: ['sub'],
    template: `
        <option value="sub.id">@{{ sub.subCounty }}</option>
  `,

});

new Vue({
    el: "#apple",
    data: {
        name: "muliro",
        countyId: undefined,
    },
    methods: {
        sayHi() {
            console.log("YEEEEEE!!!!");
        },
        cId(){
            console.log(this.countyId);
        }
    }
});
</script>
@endsection