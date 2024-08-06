@extends('publisher.layouts.master')
@section('content')

        <div id="auth">
            <div class="page">
                <h2>Register as Publisher</h2>
                <span>
                    <b>It take less than a minute,</b> Register a free account to become a publisher
                </span>

                <form method="post" action="/publisher/register">
                    @csrf

                    <input 
                        name="firstname" 
                        class="form-control" 
                        placeholder="Firstname" 
                        required
                        value="{{ old('firstname') }}"
                    />
                    <input 
                        name="lastname" 
                        class="form-control" 
                        placeholder="Lastname" 
                        required
                        value="{{ old('lastname') }}"
                    />
                    <input 
                        type="email"
                        name="email" 
                        class="form-control" 
                        placeholder="E-mail" 
                        required
                        value="{{ old('email') }}"
                    />
                    <input 
                        type="tel"
                        name="telephone" 
                        class="form-control" 
                        placeholder="Telephone" 
                        required
                        value="{{ old('telephone') }}"
                    />
                    <input 
                        type="password"
                        name="password" 
                        class="form-control" 
                        placeholder="Password" 
                        required
                    />
                    <input 
                        type="password"
                        name="confPassword" 
                        class="form-control" 
                        placeholder="Confirm Password" 
                        required
                    />
                    <button>Register</button>

                    <a href="/publisher/login" id="link">
                        Have an account? Login
                    </a>
                </form>
            </div>
            {{-- <footer>
                <div class="bar">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved. 
                </div>
            </footer> --}}
        </div>

@endsection