<div class="container s-100vh">
    <h2 id="contact">Contact</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="tel:{{$conf['tel']}}">{{$conf['tel']}}</a></p>
                </div>
                <div class="col-md-12">
                    <p><a href="mailto:{{$conf['mailto']}}">{{$conf['mailto']}}</a></p>
                </div>
                <div class="col-md-12">
                    <p><a href="{{$conf['linkedin']['link']}}">{{$conf['linkedin']['lib']}}</a></p>
                </div>

            </div>
        </div>
        <div class="col-md-9">
            <form action="{{route('contact.index')}}" @submit="submitContactForm" method="post" data-app="contact">
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
                <button class="btn btn-primary " type="submit">Submit form</button>

            </form>
        </div>
    </div>
</div>