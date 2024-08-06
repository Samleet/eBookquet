@extends('publisher.layouts.master')
@section('content')

        <div id="auth">
            <div class="page">
                <h2>Log in to eBookquet Network</h2>
                <span>
                    <b>Welcome back,</b> Login to your publisher account to manage your books
                </span>

                <form method="post" action="/publisher/login">
                    @csrf

                    <input 
                        name="email" 
                        class="form-control" 
                        placeholder="E-mail" 
                        required
                        value="{{ old('email') }}"
                    />
                    <input 
                        type="password"
                        name="password" 
                        class="form-control" 
                        placeholder="Password" 
                        required
                        {{-- value="123456" --}}
                        
                    />
                    <button>Login</button>

                    <a href="/publisher/register" id="link">
                        New Publisher? Register
                    </a>
                </form>
            </div>
            <footer>
                <div class="bar">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved. 
                </div>
            </footer>
        </div>

@endsection