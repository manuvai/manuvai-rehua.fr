@section('header', 'Création d\'expérience')
@section('form_action', route('cursuses.store'))
@section('button_form_text', 'Sauvegarder')

@include('cursuses._form')
