@section('header', 'Modification de la compétence #' . $skill->id)
@section('form_action', route('skills.update',  $skill->id))
@section('button_form_text', 'Modifier')

@include('skills._form')
