@extends('publisher.profile.layouts.main')
@section('page')

                    <div class="form">
                        <form method="post" action="/publisher/profile" enctype="multipart/form-data">
                            @csrf

                            <p>
                                <label>Firstname</label>
                                <i class="ion-ios-person"></i> <input type="text" name="firstname" placeholder="" value="{{ publisher()->firstname }}"/>
                                <s>*</s>
                            </p>

                            <p>
                                <label>Lastname</label>
                                <i class="ion-ios-person"></i> <input type="text" name="lastname" placeholder="" value="{{ publisher()->lastname }}"/>
                                <s>*</s>
                            </p>

                            <p>
                                <label>E-mail</label>
                                <i class="ion-ios-mail"></i> <input type="text" name="email" placeholder="" value="{{ publisher()->email }}"/>
                                <s>*</s>
                            </p>

                            <p>
                                <label>Telephone</label>
                                <i class="ion-ios-call"></i> <input type="text" name="telephone" placeholder="" required value="{{ publisher()->telephone }}"/>
                                <s>*</s>
                            </p>

                            <p>
                                <label>Photo</label>
                                <i class="ion-ios-image"></i> <input type="file" name="photo" id="file" data-supported='["image"]'/>
                            </p>

                            <p>
                                <p align="right"><button>Save</button></p>
                            </p>
                        </form>
                    </div>

@endsection