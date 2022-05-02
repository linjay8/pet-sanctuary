@extends("layouts.main")
@section("title", "New Animal")
@section("content")
<form method="POST" action="{{ route('animal.store') }}" enctype="multipart/form-data">
<h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">New Animal</h3>

  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}">
    @error("name")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="sex" class="form-label">Sex</label>
    <input type="text" name="sex" id="sex" class="form-control" value="{{ old('sex')}}">
    @error("sex")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="number" name="age" id="age" class="form-control" value="{{ old('age')}}">
    @error("age")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <select name="type" id="type" class="form-select" >
      <option value="">-- Select Type --</option>
      @foreach ($types as $type)
        <option value="{{ $type->id }}" {{ (string)$type->id === (string)old('type') ? "selected" : ""}}>
          {{ $type->name }}
        </option>
      @endforeach
    </select>
    @error("type")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" id="image" class="form-control" >
    @error("image")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection