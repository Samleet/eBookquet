@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="shelf">
                <div class="trailer">
                    <h2><i class="ion-ios-book"></i> Upload a Book <br/> <span></span> </h2>
                </div>
                
                <nav class="links">
                </nav>

                <div class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form">
                                <form method="post" action="/publisher/bookstore/create" enctype="multipart/form-data" id="book">
                                    @csrf

                                    <p>
                                        <label>Book Title</label>
                                        <i class="ion-md-create"></i> <input type="text" name="title" placeholder="E.g Mr. Oliver's Adventures" required value="{{ old('title') }}"/>
                                        <s>*</s>
                                    </p>

                                    <p>
                                        <label>Author</label>
                                        <i class="ion-ios-person"></i> <input type="text" name="author" placeholder="Full Name" value="{{ old('author') }}"/>
                                        <s>*</s>
                                    </p>

                                    <p>
                                        <label>Book ISBN</label>
                                        <i class="ion-ios-barcode"></i> <input type="text" name="isbn" placeholder="E.g 1-2-555" value="{{ old('isbn') }}"/>
                                    </p>

                                    <p>
                                        <label>Genre</label>
                                        <i class="ion-ios-pricetag"></i> 
                                        <select name="genre" class="form-control" required>
                                            <option value="" selected disabled>Select Genre</option>
                                            @foreach ($genres as $genre)

                                            <option value="{{ $genre->id }}"@if(old('genre') == $genre->id) selected @endif>{{ $genre->name }}</option>
                                            @endforeach

                                        </select>
                                    </p>

                                    <p>
                                        <label>Book Type</label>
                                        <i class="ion-ios-menu"></i>
                                        <select name="type" class="form-control" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="FREE"@if(old('type') == 'FREE') selected @endif>FREE</option>
                                            <option value="RENTAL"@if(old('type') == 'RENTAL') selected @endif>RENTAL</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label>Price</label>
                                        <i class="ion-ios-cash"></i> <input type="text" name="price" placeholder="E.g 10000" data-digit value="{{ old('price') }}"/>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <form>
                                    <p>
                                        <label>Source</label>
                                        <i class="ion-ios-book"></i> <input type="file" name="source" id="file" data-supported='["pdf","epub"]' required form="book"/>
                                    </p>

                                    <p>
                                        <label>Thumbnail</label>
                                        <i class="ion-ios-image"></i> <input type="file" name="photo" id="file" data-supported='["image"]' required form="book"/>
                                    </p>

                                    <p>
                                        <label>Status</label>
                                        <i class="ion-ios-checkmark"></i>
                                        <select name="status" class="form-control" required form="book">
                                            <option value="" selected disabled>Book Status</option>
                                            <option value="ACTIVE"@if(old('status') == 'ACTIVE') selected @endif>ACTIVE</option>
                                            <option value="DISABLED"@if(old('status') == 'DISABLED') selected @endif>DISABLED</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label>Description</label>
                                        <i class="ion-ios-paper" 
                                        style="top: 24px;"> </i> 
                                        <textarea name="description" placeholder="What's the book all about?" style="padding-left: 40px; height: 160px;" form="book">{{ old('description') }}</textarea>
                                    </p>

                                    <p>
                                        <label class="switch">
                                            <input type="checkbox" name="share" checked class="primary" id="share" form="book"/>
                                            <span class="slider round"></span>
                                        </label>
                                        <label 
                                            for="share" class="d-inline-block mx-1" style="top: -10px; cursor: pointer;  user-select: none"
                                        >
                                            Share
                                        </label>
                                        <button class="pull-right" form="book">Upload</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

@endsection