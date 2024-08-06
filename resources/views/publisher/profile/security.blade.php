@extends('publisher.profile.layouts.main')
@section('page')

                    <div class="form">
                        <form method="post" action="/publisher/profile/security">
                            @csrf

                            <p>
                                <label>Password</label>
                                <i class="ion-ios-lock"></i> <input type="password" name="password" placeholder="" required/>
                            </p>

                            <p>
                                <label>Confirm Password</label>
                                <i class="ion-ios-lock"></i> <input type="password" name="confirmPassword" placeholder="" required/>
                            </p>

                            <p>
                                <p align="right"><button>Save</button></p>
                            </p>
                        </form>
                    </div>

@endsection