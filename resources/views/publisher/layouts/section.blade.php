@extends('publisher.layouts.master')
@section('content')

        <section class="sidebar">
            <div class="logo">
                <img src="/themes/xenalite/images/logo.png" width="30" height="30" alt="logo"/> {{ config('app.name') }} &reg;
            </div>
            <div class="user">
                <div 
                    class="image" 
                    style="
                        background: url({{ publisher()->image() }});
                        background-size: cover;
                        background-position: center;
                    "
                >
                    <span class="online" style="background: #0c0"></span>
                    <div class="avatar">

                    </div>
                </div>
                <span>{{ publisher()->fullname }}</span>
                <small style="color: #1d9bf0">Publisher</small>
            </div>
            
            <nav>
                <ul>
                    <a href="/publisher/dashboard"><li{!! Request::is('publisher/dashboard*') ? ' class="active"' : '' !!}><i class="ion-ios-keypad"></i> Dashboard</li></a>
                    <a href="/publisher/wallet"><li{!! Request::is('publisher/wallet*') ? ' class="active"' : '' !!}><i class="ion-ios-wallet"></i> Wallet</li></a>
                    <a href="/publisher/bookstore"><li{!! Request::is('publisher/bookstore*') ? ' class="active"' : '' !!}><i class="ion-ios-book"></i> Bookstore</li></a>
                    <a href="/publisher/genres"><li{!! Request::is('publisher/genres*') ? ' class="active"' : '' !!}><i class="ion-ios-list"></i> Genres</li></a>
                    <a href="/publisher/rentals"><li{!! Request::is('publisher/rentals*') ? ' class="active"' : '' !!}><i class="ion-ios-people"></i> My Rentals</li></a>
                    <a href="/publisher/logout"><li{!! Request::is('publisher/logout*') ? ' class="active"' : '' !!}><i class="ion-ios-log-out"></i> <font class="text-danger">Signout</font></li></a>
                </ul>
            </nav>
        </section>

        <section class="headbar">
            <span class="menu" onclick="return $('.sidebar').toggleClass('toggle'), $('.headbar, .mainbar').toggleClass('resize') && setTimeout(() => { $(this).find('i').attr('class', $(this).find('i').attr('class') == 'ion-ios-menu' ? 'ion-md-close' : 'ion-ios-menu') }, 300)"><i class="ion-ios-menu"></i></span>
            <div class="link">
                <div class="icon" id="user">
                    <a href="/publisher/logout" target="_self" data-url="signout">Sign out</a>
                </div>
                <div class="icon" id="mail">
                    <span class="ion-ios-notifications"></span>
                    @if(publisher()->notifications()->where(
                        'seen', 0)->count() >= 1)
                        
                    <s class="fa fa-circle"></s>
                    @endif

                    <div class="droplist x">
                        <div class="flow">
                            <?php
                            $notifications = publisher()->notifications()->orderBy(
                                'id', 'DESC'
                            )->get()->take(20);
                            if($notifications->count() == (0)){
                            ?>

                            <div class="log">
                                <i class="ion-ios-notifications-outline"></i> You dont have any alert at the moment
                            </div>

                            <?php
                            }
                            else{
                            ?>

                            <ul>
                            @foreach($notifications as $msg)

                                <li data-id="{{ $msg->id }}" {{ !$msg->seen ? ' class=state' : null }}>
                                    <a href="{{ $msg->link }}" style="background: #4951AC">{{ $msg->title }}</a>
                                    <span>{{ $msg->message }}</span>
                                    <small>{{ date("d/m/Y", strtotime($msg->created_at)) }}</small>
                                </li>
                            @endforeach

                            </ul>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="flag">@if(publisher()->notifications()->where('seen', 0)->count() >= 1) <a href="/publisher/dashboard?notifications=all">Mark all read</a> @endif</div>
                    </div>
                </div>
                <div class="icon" id="avtr">
                    <a href="/publisher/profile"><img src="{{ publisher()->image() }}" width="30" height="30" alt="" /></a>
                </div>
            </div>
        </section>

        @yield('app')

        <span class="message">
            <ul>
                <?php
                if($errors->any()){
                    foreach($errors->all() as $key => $error)  {
                ?>
                <li>
                    - {{ $error }}
                </li>
                <?php
                    }
                }
                ?>

            </ul>
        </span>

        <!-- Start of Tidio plugins-->
        {{-- <script src="//code.tidio.co/tys1t9hmkxcmqa7dwjrqsnfuwfujhqrr.js" async></script> --}}
        <!--Start of Tawk.to Script-->
        <script>
        /*
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function(){
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/61311f1b649e0a0a5cd45145/1feju324q';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        */
        </script>
        <!--End of Tawk.to Script-->

        <script>window.user = {!! publisher() !!}</script>
@endsection