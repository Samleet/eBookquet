@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="genre">
                <div class="trailer">
                    <h2><i class="ion-ios-bookmarks"></i> Create a Genre <br/> <span></span> </h2>
                </div>
                
                <nav class="links">
                </nav>

                <div class="content">
                    <div class="form">
                        <form method="post" action="/publisher/genres/create" enctype="multipart/form-data">
                            @csrf

                            <p>
                                <label>Genre Name</label>
                                <i class="ion-ios-pricetag"></i> <input type="text" name="name" placeholder="" required/>
                                <s>*</s>
                            </p>

                            <p>
                                <label>Shelf Limit</label>
                                <i class="ion-ios-book"></i> <input type="text" name="limit" placeholder="E.g 100" data-digit/>
                            </p>

                            <p>
                                <label>Description</label>
                                <i class="ion-ios-paper" 
                                style="top: 24px;"> </i> 
                                <textarea placeholder="Optional..." name="description" style="padding-left: 40px"></textarea>
                            </p>

                            <p>
                                <p align="right"><button>Save</button></p>
                            </p>
                        </form>
                    </div>
                </div>
            </section>
        </section>

@endsection