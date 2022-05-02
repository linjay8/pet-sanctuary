@extends("layouts.main")
@section("title")
Edit Comment
@endsection
@section("content")
<div class="row">
  <div class="col col-12 mb-5">
    <form method="POST" action="{{ route('comment.update', ['id' => $comment->id,'post_id' => $post_id])}}" class="text-end">
      @csrf
      <h4 style="margin: 60px 0 10px 0; font-size: 35px;font-weight: bold;text-align:center;">Edit Comment</h4>
      @if(Auth::check())
      <div class="mb-3 text-start">
        <label for="comment" class="form-label"></label>
        <textarea name="comment" class="form-control" id="comment" rows="3" style="border-radius: 20px;" value="{{old('comment', $comment->content)}}">{{old('comment', $comment->content)}}</textarea>
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
</div>
@endsection