@extends("layouts.main")
@section("title", "Posts")
@section("content")
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">Posts</h3>
@if(count($posts) == 0)
<h3 style="margin: 60px 0 40px 0; font-size: 30px;font-weight: normal;text-align:center;">No posts yet.</h3>
@else
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-5">
  @foreach ($posts as $post)
  <div class="col" style="position: relative;">
    @if(Auth::check())
    @if(count(App\Models\Favorite::where('user_id', '=', Auth::user()->id)->where('post_id', '=', $post->id)->get()) == 0)

    <form style="position: absolute; right: 15px; top: 15px; z-index: 5;" method="POST" action="{{route('favorite.store', ['post_id' => $post->id])}}">
      @csrf
      <button type="submit" class="btn btn-link text-decoration-none text-dark" >
        <i id="heart" class="fa-regular fa-heart fa-2xl fa-duotone" ></i>
      </button>
    </form>
    @else
    <form style="position: absolute; right: 15px; top: 15px; z-index: 5;" method="POST" action="{{route('favorite.delete', ['post_id' => $post->id])}}">
      @csrf
      <button type="submit" class="btn btn-link text-decoration-none text-dark" >
        <i id="heart" class="fa-solid fa-heart fa-2xl fa-duotone" ></i>
      </button>
    </form>
    @endif
    @endif
    <div class="card" style="border-radius: 20px;">
        <img src="{{ Storage::url($post->animal->image) }}" class="card-img-top" alt="..." style="object-fit: cover; width:100%; height:40vh; border-radius:20px 20px 0 0;">
   
      <div class="card-body">
        <h5 class="card-title">{{$post->animal->name}}</h5>
        <p class="card-text">Status: {{$post->status}}</p>
        <a href="{{ route('post.show', ['id' => $post->id]) }}" class="stretched-link"></a>
      </div>
    </div>
    
    
  </div>
  @endforeach
  
</div>
@endif
@endsection