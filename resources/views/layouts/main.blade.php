<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Inter:wght@200;400;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ccf90604d1.js" crossorigin="anonymous"></script>
  <style>
    * {
      font-family: "DM Sans";
    }
  </style>
  <title>@yield("title") - The Sanctuary</title>
</head>
  
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}"><img src="{{Storage::url('public/logo.png')}}" alt="" width="40"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
          </li>
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.index') }}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('favorite.index') }}">Favorites</a>
            </li>
            @can('create', App\Models\Animal::class)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('animal.create') }}">Add Animal</a>
            </li>
            @endcan
            <li class="nav-item">
              <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-decoration-none text-black-50 px-0 px-lg-2">Logout</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('registration.index') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
          @endif
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          
          @if(Route::currentRouteName() == 'post.index')
          @can('create', App\Models\Post::class)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('post.create') }}">Create a New Post</a>
          </li>
          @endcan
          @endif
          @if(Route::currentRouteName() == 'post.show')
          @can('update', $post)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('post.edit', ['id' => $post->id]) }}">Edit This Post</a>
          </li>
          @endcan
          @endif
          @if(Route::currentRouteName() == 'post.show')
          @can('delete', $post)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('post.delete', ['id' => $post->id]) }}">Delete This Post</a>
          </li>
          @endcan
          @endif
        </ul>
        
      </div>
    </div>
  </nav>
  <div class="container">
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
    @endif
    <main>
        @yield("content")
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>