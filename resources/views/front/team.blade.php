<x-app-layout>
    <x-slot:title>
        Ekibimiz
    </x-slot>

    
    <x-front.breadcrumb class="bg-f" title="Ekibimiz" />

    <section class="team-wrap ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach( $teams as $team )
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="team-card style1">
                        <div class="team-img">
                            <img style="width: 100%" src="{{ asset($team->image) }}" alt="{{ $team->full_name }}">
                            <ul class="social-profile list-style style1">
                                    <li><a href="{{ $team->socials->get('facebook') }}" ><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="{{ $team->socials->get('instagram') }}" ><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $team->socials->get('youtube') }}" ><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="{{ $team->socials->get('twitter') }}" ><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-info-wrap">
                            <div class="team-info">
                                <h3><a>{{$team->full_name}}</a></h3>
                                <span>{{ $team->degree }}</span>
                            </div>
                            <a class="team-link"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="page-navigation mt-10">
                {{ $teams->links('vendor.pagination.front') }}
            </div>
        </div>
    </section>

</x-app-layout>