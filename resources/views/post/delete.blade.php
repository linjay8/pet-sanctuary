@extends("layouts.main")
@section("title")
Delete Post: {{$post->animal->name}}
@endsection
@section("content")
<form method="POST" action="{{ route('post.remove', [ 'id' => $post->id ]) }}">
  @csrf
  <div class="text-center mt-5">
    <h3 >Are you sure you want to delete the post for {{ $post->animal->name }}?</h3>
  </div>
  <div class="text-center">
    <a href={{ route('post.index')}} type="submit" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-danger">Delete</button>
  </div>
</form>
@endsection