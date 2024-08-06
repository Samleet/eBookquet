@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="books">
                <div class="trailer">
                    <h2><i class="ion-ios-book"></i> {{ !request()->id ? 'Upload a Book' : 'Manage Book' }} <br/> <span></span> </h2>
                </div>
                
                <nav class="links">
                    <ul>
                        <a href="/publisher/bookstore/{{ request()->id }}">
                            <li{!! !strstr(request()->fullUrl(), 'show') ? ' class="active"' : null !!}>
                                <i class="ion-ios-book"></i> Book Details
                            </li>
                        </a>
                        <a href="/publisher/bookstore/{{ request()->id }}?show=rentals">
                            <li{!! strstr(request()->fullUrl(), 'rentals') ? ' class="active"' : null !!}>
                                <i class="ion-ios-bookmark"></i> Rentals
                            </li>
                        </a>
                        <a href="/publisher/bookstore/{{ request()->id }}?show=insight"">
                            <li{!! strstr(request()->fullUrl(), 'insight') ? ' class="active"' : null !!}>
                                <i class="ion-ios-stats"></i> Insight
                            </li>
                        </a>
                    </ul>
                </nav>

                <div class="content">
                    @yield('page')
                    
                </div>
            </section>
        </section>

@endsection