@section('header', 'Modification de l\'expérience #' . $cursus->id)
@section('form_action', route('cursuses.update',  $cursus->id))
@section('button_form_text', 'Modifier')

@include('cursuses._form')
