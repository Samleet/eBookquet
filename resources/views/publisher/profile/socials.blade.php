@extends('publisher.profile.layouts.main')
@section('page')

                    <div class="form">
                        <form method="post" action="/publisher/profile/socials">
                            @csrf

                            <p>
                                <label>Facebook</label>
                                <i class="ion-logo-facebook"></i> <input type="text" name="socials[facebook]" placeholder="" value="{{ @publisher()->socials->facebook }}"/>
                            </p>

                            <p>
                                <label>Twitter</label>
                                <i class="ion-logo-twitter"></i> <input type="text" name="socials[twitter]" placeholder="" value="{{ @publisher()->socials->twitter }}"/>
                            </p>

                            <p>
                                <label>Linkedin</label>
                                <i class="ion-logo-linkedin"></i> <input type="text" name="socials[linkedin]" placeholder="" value="{{ @publisher()->socials->linkedin }}"/>
                            </p>

                            <p>
                                <p align="right"><button>Save</button></p>
                            </p>
                        </form>
                    </div>

@endsection