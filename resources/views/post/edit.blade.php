@extends("layouts.main")
@section("title")
Edit Post: {{$post->animal->name}}
@endsection
@section("content")
<form method="POST" action="{{ route('post.update', [ 'id' => $post->id ]) }}">
  @csrf
  <h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">Edit Post</h3>
  <div class="mb-3">
    <label for="animal" class="form-label">Animal</label>
    <select name="animal" id="animal" class="form-select" >
      <option value="">-- Select Animal --</option>
      @foreach ($animals as $animal)
        <option value="{{ $animal->id }}" {{ (string)$animal->id === (string)old('animal', $post->animal_id) ? "selected" : ""}}>
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
    <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $post->description)}}">
    @error("description")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $post->status)}}">
    @error("status")
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection