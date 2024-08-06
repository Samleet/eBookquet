@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="genre">
                <div class="trailer">
                    <h2><i class="ion-ios-bookmarks"></i> Genres <br/> <span></span> <a href="/publisher/genres/create"><button><i class="ion-ios-add"></i> New Genre</button></a></h2>
                </div>
                
                <div class="content">
                    <div class="row">
                        @foreach($genres as $genre)

                        <div class="col-12 col-md-4 mb-4">
                            <a href="/publisher/genres/{{ $genre['id'] }}" style="color: inherit !important">
                                <div class="card fig d-block p-4" style="min-height: 120px">
                                    <button 
                                        class="x ion-md-close"
                                        data-action="/publisher/genres/{{ $genre['id'] }}/delete"
                                        data-models="genre"
                                    ></button>
                                    <div class="image"
                                        style="border: 1.9px solid #1d9bf0"
                                    >
                                        <i class="icon ion-ios-bookmarks"></i>
                                    </div>
                                    <div class="aside">
                                        <span><i class="ion-md-create"></i> <b>{{ $genre['name'] }}</b></span>
                                        <span><i class="ion-md-book"></i> Books: {{ collect($genre['books'])->count() }}</span>
                                        <span><i class="ion-md-time"></i> {{ carbon()->parse($genre['created_at'])->diffForHumans() }}</span>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endforeach

                        {{-- @if(collect($genres)->count() == 0)

                        <div class="card w m-auto h-auto" style="min-height: auto">
                            <div class="box h-auto">
                                <div class="n-w">
                                    <span>
                                        <h4 style="margin-top:10px; margin-bottom:-15px; font-size: 16px">No Genres!</h4> 
                                        <br/>
                                    </span>
                                </div>
                            </div>
                        </div>

                        @endif --}}
                    </div>
                    
                    {{-- {{ $genres->links() }} --}}

                </div>
            </section>
        </section>         
@endsection