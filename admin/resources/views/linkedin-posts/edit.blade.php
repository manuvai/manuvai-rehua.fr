@section('header', 'Modification du post #' . $linkedinPost->id)
@section('form_action', route('linkedin-posts.update',  $linkedinPost->id))
@section('button_form_text', 'Modifier')

@include('linkedin-posts._form')
