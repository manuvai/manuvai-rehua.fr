@section('header', 'Création')
@section('form_action', route('skills.store'))
@section('button_form_text', 'Sauvegarder')

@include('skills._form')
