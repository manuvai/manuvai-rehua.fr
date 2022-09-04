@section('header', 'Création')
@section('form_action', route('projects.store'))
@section('button_form_text', 'Sauvegarder')

@include('projects._form')
