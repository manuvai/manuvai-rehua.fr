@extends('layouts.app')

@section('content')
<a href="{{route('skills.create')}}" class="btn btn-primary">Ajouter</a>
@foreach(App\Models\Skill::all() as $post)
    <!-- Blog Post -->
    <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('storage/' . $post->image_path)}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->rate}}</p>
        </div>
        <div class="card-footer text-muted">
            Créé le {{$post->created_at->format('d/m/Y')}}
        </div>
    </div>
@endforeach
@endsection
