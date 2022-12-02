@section('header', 'Création de post Linkedin')
@section('form_action', route('linkedin-posts.store'))
@section('button_form_text', 'Sauvegarder')

@include('linkedin-posts._form')
