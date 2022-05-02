@extends("layouts.main")
@section("title", "New Post")
@section("content")
<form method="POST" action="{{ route('post.store') }}">
  @csrf
  <h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">New Post</h3>
  
  <div class="mb-3">
    <label for="animal" class="form-label">Animal</label>
    <select name="animal" id="animal" class="form-select" >
      <option value="">-- Select Animal --</option>
      @foreach ($animals as $animal)
        <option value="{{ $animal->id }}" {{ (string)$animal->id === (string)old('animal') ? "selected" : ""}}>
          {{ $animal->name }}
        </option>
      @endforeach
    </select>
    @error("type")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" id="description" class="form-control" value="{{ old('description')}}">
    @error("description")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <input type="text" name="status" id="status" class="form-control" value="{{ old('status')}}">
    @error("status")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection