@extends('layouts.app')

@section('content')
<a href="{{route('skills.create')}}" class="btn btn-primary">Ajouter</a>
@foreach(App\Models\Skill::all() as $skill)
    <!-- Blog Post -->
    <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('storage/' . $skill->image_path)}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$skill->title}}</h2>
            <p class="card-text">{{$skill->rate}}</p>
        </div>
        <div class="card-footer text-muted">
            <form action="{{route('skills.destroy', $skill->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            Créé le {{$skill->created_at->format('d/m/Y')}}
        </div>
    </div>
@endforeach
@endsection
