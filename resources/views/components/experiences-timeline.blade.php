<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-timeline3">
                    @foreach ($experiences as $item)
                    <div class="timeline">
                        <div class="timeline-icon"><span class="year">{{$item->getDateLabel()}}</span></div>
                        <div class="timeline-content">
                            <h3 class="title">{{$item['experience_title']}}</h3>
                            @if ($item['enterprise_website'])
                                <h4 class="text-muted">
                                    <a href="{{$item['enterprise_website']}}">{{$item->enterprise}}</a>
                                </h4>
                                
                            @else
                                <h4>{{$item->enterprise}}</h4>

                            @endif
                            <p>
                                <small>{{$item->getDuration()}}</small>
                            </p>
                            <p class="description">
                                {!!$item['description']!!}
                            </p>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>