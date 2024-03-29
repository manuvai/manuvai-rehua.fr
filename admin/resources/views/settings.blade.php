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
<form action="{{route('settings.edit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4">
        <label for="introduction_text">Texte d'introduction</label>
        <textarea class="form-control summernote" name="introduction_text" id="introduction_text" aria-describedby="introduction_textHelp" rows="3">{{App\Models\Setting::get('introduction_text')}}</textarea>
    </div>
    <div class="form-group mb-4">
        <label for="hero_image_path">Image h&eacute;ro</label>
        <input type="file" class="form-control" name="hero_image_path" id="hero_image_path" />
        @if (App\Models\Setting::get('hero_image_path'))
            <img src="{{asset('storage/' . App\Models\Setting::get('hero_image_path'))}}" class="img-thumbnail img-fluid" style="max-height: 50vh" alt="" srcset="">
        @endif
    </div>
    <div class="form-group mb-4">
        <label for="cv_file_path">CV</label>
        <input type="file" class="form-control" name="cv_file_path" id="cv_file_path" />
        <iframe src="{{asset('storage/' . App\Models\Setting::get('cv_file_path'))}}" width="100%" frameborder="0"></iframe>
    </div>
    <div class="form-group mb-4">
        <label for="linkedin_badge">Badge Linkedin</label>
        <input type="text" value="{{App\Models\Setting::get('linkedin_badge')}}" class="form-control" name="linkedin_badge" id="linkedin_badge" placeholder="Badge Linkedin">
    </div>
    <div class="form-group mb-4">
        <label for="mobile">T&eacute;l&eacute;phone</label>
        <input type="text" value="{{App\Models\Setting::get('mobile')}}" class="form-control" name="mobile" id="mobile" placeholder="T&eacute;l&eacute;phone">
    </div>
    <div class="form-group mb-4">
        <label for="email">Email</label>
        <input type="email" value="{{App\Models\Setting::get('email')}}" class="form-control" name="email" id="email" placeholder="E-mail">
    </div>
    <div class="form-group mb-4">
        <label for="captcha_pub_key">Cl&eacute; publique ReCaptcha</label>
        <input type="password" value="{{App\Models\Setting::get('captcha_pub_key')}}" class="form-control" name="captcha_pub_key" id="captcha_pub_key" placeholder="Cl&eacute; publique ReCaptcha">
    </div>
    <div class="form-group mb-4">
        <label for="captcha_prv_key">Cl&eacute; priv&eacute;e ReCaptcha</label>
        <input type="password" value="{{App\Models\Setting::get('captcha_prv_key')}}" class="form-control" name="captcha_prv_key" id="captcha_prv_key" placeholder="Cl&eacute; priv&eacute;e ReCaptcha">
    </div>
    <div class="form-group mb-4">
        <label for="linkedin_link">Lien vers profile linkedin</label>
        <input type="text" value="{{App\Models\Setting::get('linkedin_link')}}" class="form-control" name="linkedin_link" id="linkedin_link" placeholder="Lien vers profile linkedin">
    </div>
    <div class="form-group mb-4">
        <label for="linkedin_access_token">Access token linkedin</label>
        <input type="text" value="{{App\Models\Setting::get('linkedin_access_token')}}" class="form-control" name="linkedin_access_token" id="linkedin_access_token" placeholder="Access token linkedin">
    </div>
    <div class="form-group mb-4">
        <label for="linkedin_profile_id">ID Profil linkedin</label>
        <input type="text" value="{{App\Models\Setting::get('linkedin_profile_id')}}" class="form-control" name="linkedin_profile_id" id="linkedin_profile_id" placeholder="ID Profil linkedin">
    </div>
    <div class="form-group mb-4">
        <label for="linkedin_publish_interval_days">Intervalle de publications (en jours)</label>
        <input type="number" value="{{App\Models\Setting::get('linkedin_publish_interval_days')}}" class="form-control" name="linkedin_publish_interval_days" id="linkedin_publish_interval_days" placeholder="Intervalle de publications (en jours)">
    </div>
    <div class="form-group mb-4">
        <label for="github_link">Lien vers profile github</label>
        <input type="text" value="{{App\Models\Setting::get('github_link')}}" class="form-control" name="github_link" id="github_link" placeholder="Lien vers profile github">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection
