@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Linkedin posts</h1>
<a href="{{route('linkedin-posts.create')}}" class="btn btn-primary mb-4">Ajouter</a>
@if (count(App\Models\LinkedinPost::all()) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">&Eacute;tat</th>
                <th scope="col">Date prévisionnelle</th>
                <th scope="col">Date de publication</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach(App\Models\LinkedinPost::all() as $linkedinPost)
            <tr>
                <th scope="row">{{$linkedinPost->id}}</th>
                <td>{{$linkedinPost->title}}</td>
                <td>{{$linkedinPost->description}}</td>
                <td>{!!App\Helpers\LinkedinHelperHTML::getBadge($linkedinPost->state)!!}</td>
                <td>{{$linkedinPost->scheduled_date}}</td>
                <td>{{$linkedinPost->published_date}}</td>
                <td>
                    <a href="{{route('linkedin-posts.edit', $linkedinPost->id)}}" class="btn btn-primary">Modifier</a>
                    <form action="{{route('linkedin-posts.destroy', $linkedinPost->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
Aucun post trouvé
@endif
@endsection
