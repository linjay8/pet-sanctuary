@extends("layouts.main")
@section("title", $post->animal->name)
@section("content")
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">{{ $post->animal->name }}</h3>
<div class="container">
  <div class="row">
    <div class="col col-12 col-md-6">
      <img src="{{ Storage::url($post->animal->image) }}" class="card-img-top" alt="A picture of {{ $post->animal->name}}" style="object-fit: cover; height:100%; border-radius:20px">
    </div>
    <div class="col col-12 col-md-6">
      <div class="card" style="border-radius: 20px;">
        <div class="card-body">
          <p class="card-text">Age: {{$post->animal->age}} year(s) old</p>
          <p class="card-text">Sex: {{$post->animal->sex}}</p>
          <p class="card-text">Status: {{$post->status}}</p>
          <p class="card-text">{{$post->description}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-12 mb-5">
      <form method="POST" action="{{ route('comment.store', ['post_id' => $post->id])}}" class="text-end">
        @csrf
        <h4 style="margin: 60px 0 10px 0; font-size: 35px;font-weight: bold;text-align:center;">Comments</h4>
        @if(Auth::check())
        <div class="mb-3 text-start">
          <label for="comment" class="form-label"></label>
          <textarea name="comment" class="form-control" id="comment" rows="3" style="border-radius: 20px;"></textarea>
          @error("comment")
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <button type="submit" class="btn" style="background-color: #f99e22; color: white; border-radius: 10px;">Post</button>
        @else
        <h4 style="margin: 20px 0 10px 0; font-size: 20px;text-align:center;"><em>Please register or login to leave a comment.</em></h4>
            
        @endif
      </form>
    </div>
    @foreach ($comments as $comment)
    <div class="col col-12">
      <div class="card" style="border-radius: 20px; margin: 10px 0 10px 0">
        
        <div class="card-body" style="position:relative;">
          <div style="position:absolute;right:0;">
            @can('update', $comment)
            <div class="btn-group dropend">
              <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis "></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('comment.edit', ['post_id' => $post->id, 'id' => $comment->id])}}">
                  <form >
                    <button class="btn btn-link text-decoration-none text-dark p-0">Edit</button>
                  </form>
                </a></li>
                <li>
                  <form method="POST" action="{{ route('comment.delete', ['post_id' => $post->id, 'id' => $comment->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none text-dark dropdown-item" style="padding:4px 16px; border-radius: 0px;"onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                  </form>
                </li>
              </ul>
            </div>
            @endcan
          </div>
          
          <h5 class="card-title">{{$comment->user->name}}</h5>
          <p class="card-text">{{$comment->content}} <br>
            <em>Posted on {{date_format($comment->updated_at, 'n/j/Y')}} at {{date_format($comment->updated_at, 'g:i A')}}</em>
          </p>
          
        </div>
      </div>
    </div>
    @endforeach
    @if(count($comments) == 0)
    <h3 style="margin: 0 0 40px 0; font-size: 30px;font-weight: normal;text-align:center;">No comments yet.</h3>
    @endif
  </div>
</div>

@endsection