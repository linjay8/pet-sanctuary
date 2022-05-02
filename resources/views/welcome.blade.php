@extends("layouts.main")
@section("title", "Home")
@section("content")
<div class="container" style="margin-top:18%">
  <div class="row">
    <div class="col col-md-8 col-12">
      <h2 style="font-size:60px; font-weight:bold;">Welcome to The Sanctuary</h2>
      <p style="font-size:20px;">The Sanctuary provides a safe home for cats, dogs, puppies and kittens. While our goal is to help these animals find forever homes as quickly as possible, we know that some will have a long road ahead, and they are welcome to stay with us for as long as it takes for them to find the right family. </p>
    </div>
    <div class="col col-md-4 col-12 mt-md-1 mt-5">
      <div style="width:200px; margin:auto; ">
        <img src="{{Storage::url('public/logo.png')}}" alt="dog and cat logo" style="width:100%;">
      </div>
    </div>
  </div>
  <div class="container" style="margin: auto;margin-top: 25%;width:70%;">
        <h3 style="margin-bottom: 40px;font-size: 50px;font-weight: bold;">How To Get Started</h3>
        <div class="row">
          <div class="col col-12" >
            <h3 style="font-size: 20px; font-style: italic;">
              Step 1 - Explore
            </h3>
          </div>
        </div>
        <div class="row">
          <div class="col col-3 col-lg-2" >
            <h3 style="font-style: normal;font-weight:700;font-size: 150px;text-align: center;line-height: 195px;color: #3b2c1a;">
              1
            </h3>
          </div> 
          <div class="col col-9 col-lg-10">
            <p style="font-size: 20px;font-style: normal;font-weight: 400;padding: 20px;padding-top: 40px;">
              Look through the animals that are at our sanctuary and ready for adoption or fostering. You can find out their name, sex, age, and a fun description about them!
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col col-12" >
            <h3 style="font-size: 20px; font-style: italic;">
              Step 2 - Ask Questions
            </h3>
          </div>
        </div>
        <div class="row">
          <div class="col col-3 col-lg-2" >
            <h3 style="font-style: normal;font-weight:700;font-size: 150px;text-align: center;line-height: 195px;color: #3b2c1a;">
              2
            </h3>
          </div>
          <div class="col col-9 col-lg-10">
            <p style="font-size: 20px;font-style: normal;font-weight: 400;padding: 20px;padding-top: 40px;">
              Create an account and you will be able to comment on a posting. Comment if you have any questions or concerns, and we will reply!
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col col-12 " >
            <h3 style="font-size: 20px; font-style: italic;">
              Step 3 - Request
            </h3>
          </div>
        </div>
        <div class="row">
          <div class="col col-3 col-lg-2" >
            <h3 style="font-style: normal;font-weight:700;font-size: 150px;text-align: center;line-height: 195px;color: #3b2c1a;">
              3
            </h3>
          </div>
          <div class="col col-9 col-lg-10">
            <p style="font-size: 20px;font-style: normal;font-weight: 400;padding: 20px;padding-top: 40px;">
              If the animal is available, comment your interest and we will get back to you ASAP. If not, you can favorite and check back through your favorites page!
            </p>
          </div>
        </div>
        
      </div>
</div>
@endsection