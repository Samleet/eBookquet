@extends('publisher.books.layouts.main')
@section('page')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form">
                                <form method="post" action="/publisher/bookstore/{{ request()->id }}" enctype="multipart/form-data" id="book">
                                    @csrf

                                    <p>
                                        <label>Book Title</label>
                                        <i class="ion-md-create"></i> <input type="text" name="title" placeholder="E.g Mr. Oliver's Adventures" required value="{{ $book['title'] }}"/>
                                        <s>*</s>
                                    </p>

                                    <p>
                                        <label>Author</label>
                                        <i class="ion-ios-person"></i> <input type="text" name="author" placeholder="Full Name" value="{{ $book['author'] }}"/>
                                        <s>*</s>
                                    </p>

                                    <p>
                                        <label>Book ISBN</label>
                                        <i class="ion-ios-barcode"></i> <input type="text" name="isbn" placeholder="E.g 1-2-555" value="{{ $book['isbn_code'] }}"/>
                                    </p>

                                    <p>
                                        <label>Genre</label>
                                        <i class="ion-ios-pricetag"></i> 
                                        <select name="genre" class="form-control" required>
                                            <option value="" selected disabled>Select Genre</option>
                                            @foreach ($genres as $genre)

                                            <option value="{{ $genre->id }}"@if($book['genre']['id'] == $genre->id) selected @endif>{{ $genre->name }}</option>
                                            @endforeach

                                        </select>
                                    </p>

                                    <p>
                                        <label>Book Type</label>
                                        <i class="ion-ios-menu"></i>
                                        <select name="type" class="form-control" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="FREE"@if($book['type'] == 'FREE') selected @endif>FREE</option>
                                            <option value="RENTAL"@if($book['type'] == 'RENTAL') selected @endif>RENTAL</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label>Price</label>
                                        <i class="ion-ios-cash"></i> <input type="text" name="price" placeholder="E.g 10000" data-digit value="{{ $book['price'] }}"/>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <form>
                                    <p>
                                        <label>Source</label>
                                        <i class="ion-ios-book"></i> <input type="file" name="source" id="file" data-supported='["pdf","epub"]' form="book"/>
                                    </p>

                                    <p>
                                        <label>Thumbnail</label>
                                        <i class="ion-ios-image"></i> <input type="file" name="photo" id="file" data-supported='["image"]' form="book"/>
                                    </p>

                                    <p>
                                        <label>Status</label>
                                        <i class="ion-ios-checkmark"></i>
                                        <select name="status" class="form-control" required form="book">
                                            <option value="" selected disabled>Book Status</option>
                                            <option value="ACTIVE"@if($book['status'] == 'ACTIVE') selected @endif>ACTIVE</option>
                                            <option value="DISABLED"@if($book['status'] == 'DISABLED') selected @endif>DISABLED</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label>Description</label>
                                        <i class="ion-ios-paper" 
                                        style="top: 24px;"> </i> 
                                        <textarea name="description" placeholder="What's the book all about?" style="padding-left: 40px; height: 160px;" form="book">{{ $book['description'] }}</textarea>
                                    </p>

                                    <p>
                                        <label class="switch">
                                            <input type="checkbox" name="share" @if($book['sharing'])checked @endif class="primary" id="share" form="book"/>
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

@endsection