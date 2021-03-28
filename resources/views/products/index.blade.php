@extends('layouts.product-master')

@section('title','Home Page')

@section('cont', 'container-fluid')
@section('content')
<h3 class="text-center">Pick a Category</h3>
<div class="row row-cols-2 row-cols-md-4" style="margin-top:1em;margin-right: 9px; margin-left: 9px;">
  <div class="col mb-1 p-1">
    <div class="card">
      <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="..." style="">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text.</p>
      </div>
    </div>
  </div>
  <div class="col mb-1 p-1">
    <div class="card">
      <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text .</p>
      </div>
    </div>
  </div>
  <div class="col mb-1 p-1">
    <div class="card">
      <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text.</p>
      </div>
    </div>
  </div>
  <div class="col mb-1 p-1">
    <div class="card h-100">
      <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text</p>
      </div>
    </div>
  </div>
</div>

<div class="" style="overflow-x:auto;margin:1em; background-color:white; white-space:nowrap">
  <div>
  <p style="display:inline-block; padding-left:1em;">Prime Plots</p>
  </div>
  <div class="card border-light w-30" style="display:inline-block;">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1" style="white-space:wrap">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light" style="display:inline-block">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light" style="display:inline-block">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light" style="display:inline-block">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light" style="display:inline-block">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light" style="display:inline-block">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
</div>

<div class="" style="margin:1em; background-color:white;">
  <div class=row>
  <p class="col" style="display:inline-block; padding-left:2em;">Plots Under Ksh. 100K</p>
  <p class="col" style="display:inline-block"><a href="#" style="float:right; padding-right:1em;">See more</a></p>
  </div>

  <div class="row row-cols-2 row-cols-md-4" style="margin-right: 9px; margin-left: 9px;">
  <div class="card border-light col" style="">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light col" style="">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light col" style="">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <div class="card border-light col" style="">
    <img src="{{ asset('images/icons/land.png') }}" class="card-img-top" alt="...">
    <div class="card-body p-1">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This  text</p>
    </div>
  </div>
  <!--END ROW-->
  </div>

  </div>

<h3 class="text-center">Search by Category</h3>

<div class="row row-cols-2 row-cols-md-4" style="margin-top:1em;background-color:white;margin-right: 9px; margin-left: 9px;">
  <div class="col mb-1 p-1" style="">
  <a href="">
    <h4 class="text-center">For Rent</h4>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  </a>
  </div>
  <div class="col mb-1 p-1">
  <h4 class="text-center">For Rent</h4>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  </div>
  <div class="col mb-1 p-1">
  <h4 class="text-center">For Rent</h4>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  </div>
  <div class="col mb-1 p-1">
  <a href="#">
  <h4 class="text-center">For Rent</h4>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  <div class="row row-cols-2" style="margin-right: 9px; margin-left: 9px;">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  <img src="{{ asset('images/icons/samantha.jpg') }}" class="img-fluid col p-1" style="width:50px">
  </div>
  </a>
  </div>
</div>
@endsection

