@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="settings">
                <div class="trailer">
                    <h2><i class="ion-ios-person"></i> {{ $title }} <br/> <span></span> </h2>
                </div>
                
                <nav class="links">
                    <ul>
                        <a href="/publisher/profile">
                            <li{!! request()->is('publisher/profile') ? ' class="active"' : null !!}>
                                <i class="ion-ios-person"></i> Personal Details
                            </li>
                        </a>
                        <a href="/publisher/profile/security">
                            <li{!! request()->is('*security*') ? ' class="active"' : null !!}>
                                <i class="ion-ios-lock"></i> Security
                            </li>
                        </a>
                        <a href="/publisher/profile/socials">
                            <li{!! request()->is('*socials*') ? ' class="active"' : null !!}>
                                <i class="ion-logo-instagram"></i> Social Handles
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