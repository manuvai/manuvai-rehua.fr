@extends('layouts.app')

@section('content')
<a href="{{route('cursuses.create')}}" class="btn btn-primary">Ajouter</a>
@foreach(App\Models\Cursus::all() as $cursus)
    <!-- Blog Post -->
    <div class="card mb-4" style="width: 18rem;">
        <div class="card-body">
            <h2 class="card-title">{{$cursus->name}}</h2>
            <p class="card-text">{!!$cursus->description!!}</p>
        </div>
        <div class="card-footer text-muted">
            <form action="{{route('cursuses.destroy', $cursus->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="{{route('cursuses.edit', $cursus->id)}}" class="btn btn-primary">Modifier</a>
            Créé le {{$cursus->created_at->format('d/m/Y')}}
        </div>
    </div>
@endforeach
@endsection
