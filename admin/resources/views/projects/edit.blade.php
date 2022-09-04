@section('header', 'Modification du projet #' . $project->id)
@section('form_action', route('projects.update',  $project->id))
@section('button_form_text', 'Modifier')

@include('projects._form')
