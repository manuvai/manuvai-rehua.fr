<div class="container s-100vh">
    <h2 id="contact">Contact</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="tel:{{$conf['tel']}}"><i class="fa fa-phone"></i>&nbsp;{{$conf['tel']}}</a></p>
                </div>
                <div class="col-md-12">
                    <p><a href="mailto:{{$conf['mailto']}}"><i class="fa fa-envelope"></i>&nbsp;{{$conf['mailto']}}</a></p>
                </div>
                <div class="col-md-12">
                    <p>
                        <a href="{{$conf['linkedin']['link']}}">
                            <svg  viewBox="0 0 16 16" width="50px" height="1em" focusable="false" role="img" aria-label="linkedin" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-linkedin b-icon bi" style="color: rgb(10, 102, 194);"><g data-v-c067cc8e=""><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path></g></svg>{{$conf['linkedin']['lib']}}
                        </a>
                    </p>
                </div>

            </div>
        </div>
        <div class="col-md-9" data-app="contact">
            <form action="{{route('contact.index')}}" @submit="submitContactForm" method="post" v-if="!form_states.message_sent">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row m-4">
                    <label for="name" class="col-sm-2 col-form-label">Nom * :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="e.g. Jean Dupont">
                    </div>
                    <div class="col-sm-10">
                      <small id="passwordHelp" class="text-danger">
                        <v v-for="err in errors.name"> 
                            @{{err}}
                        </v>
                      </small>      
                    </div>
                </div>
                    
                <div class="form-group row m-4">
                    <label for="email" class="col-sm-2 col-form-label">Email * :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="e.g. mail@example.co">
                    </div>
                    <div class="col-sm-10">
                      <small id="passwordHelp" class="text-danger">
                        <v v-for="err in errors.email"> 
                            @{{err}}
                        </v>
                      </small>      
                    </div>
                </div>
                    
                <div class="form-group row m-4">
                    <label for="message">Votre message * :</label>
                    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                    <div class="col-sm-10">
                      <small id="passwordHelp" class="text-danger">
                        <v v-for="err in errors.message"> 
                            @{{err}}
                        </v>
                      </small>      
                    </div>
                </div>
                <button class="btn btn-secondary " type="button" v-if="form_states.message_sending">Veuillez patienter...</button>
                <button class="btn btn-primary " type="submit" v-else>Envoyer</button>

            </form>
            <div class="alert alert-success" v-else role="alert">
                Merci pour la petite note ! Votre message a bien été envoyé !
            </div>
        </div>
    </div>
</div>