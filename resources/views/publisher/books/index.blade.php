@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="shelf">
                <div class="trailer">
                    <h2><i class="ion-ios-book"></i> Bookstore <br/> <span></span> <a href="/publisher/bookstore/create"><button><i class="ion-ios-add"></i> Upload Book</button></a></h2>
                </div>
                
                <div class="content">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0">    
                            <div class="card shadow-light">
                                <div class="stats" style="overflow: hidden">
                                    <h5>Today</h5>
                                    <h2>{{ number_format($statistics['today']) }}</h2>
                                    <img 
                                        style="
                                            top: 107px;
                                            right: -70px;
                                        "
                                        src="/themes/xenalite/images/chart_1.png" width="300" height="100" alt="" class="img1" 
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4 mb-md-0">    
                            <div class="card shadow-light">
                                <div class="stats" style="overflow: hidden">
                                    <h5>This Week</h5>
                                    <h2>{{ number_format($statistics['week']) }}</h2>
                                    <img 
                                        style="
                                            top: 100px;
                                            right: 0;
                                        "
                                        src="/themes/xenalite/images/chart_2.png" width="300" height="100" alt="" class="img1" 
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4 mb-md-0">    
                            <div class="card shadow-light">
                                <div class="stats" style="overflow: hidden">
                                    <h5>This Month</h5>
                                    <h2>{{ number_format($statistics['month']) }}</h2>
                                    <img 
                                        style="
                                            top: 107px;
                                            right: -70px;
                                        "
                                        src="/themes/xenalite/images/chart_3.png" width="300" height="100" alt="" class="img1" 
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="body">
                        <div class="col-md-12">
                            <h2 class="title">
                                <i class="ion-ios-list"></i> Book Records 
                                <div class="controls">
                                    <span 
                                        class="ion-ios-list active"
                                        onclick="
                                            ($('.controls span').removeClass('active'), $(this).addClass('active')),
                                            $('#body .card').hide(), $('.card.t').fadeIn()
                                        "
                                    ></span>
                                    <span 
                                        class="ion-ios-grid"
                                        onclick="
                                            ($('.controls span').removeClass('active'), $(this).addClass('active')),
                                            $('#body .card').hide(), $('.card.s').fadeIn()
                                        "
                                    ></span>
                                </div>
                            </h2>
                            <div class="card t" style="display: block">
                                <table>
                                    <thead>
                                        <th>S/N</th>
                                        <th>Book</th>
                                        <th
                                            class="text-left"
                                        >
                                            Title
                                        </th>
                                        <th>Genre</th>
                                        <th>Total Rentals</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Timestamp</th>
                                        <th>Manage</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = page(50);
                                        ?>
                                        @foreach($books as $book)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td
                                                class="position-relative"
                                            >
                                                <div class="avatar">
                                                    <img src="{{ $book['thumbnail'] }}" width="40" height="50" alt="" style="border-radius: 0px" onclick="return window.open(this.src, '_blank')"/>
                                                </div>
                                            </td>
                                            <td 
                                                class="text-left pt-4"
                                            >
                                                {{ $book['title'] }}
                                                <small style="
                                                    display: block; color: #4951AC;
                                                ">
                                                    {{ $book['author'] }}
                                                </small>
                                            </td>
                                            <td>{{ $book['genre']['name'] }}</td>
                                            <td>{{ $book['rentals'] }}</td>
                                            <td>{{ $book['type'] }}</td>
                                            <td>₦{{ number_format($book['price'] ) }}</td>
                                            <td><span class="{{ $book['status'] == 'ACTIVE' ? 'create' : 'delete' }}">{{ $book['status'] }}</span></td>
                                            <td>{{ carbon()->parse($book['created_at']) }}</td>
                                            <td>
                                                <a href="/publisher/bookstore/{{ $book['id'] }}"><span class="button" id="update"><i class="fa fa-edit"></i></span></a>

                                                <a data-action="/publisher/bookstore/{{ $book['id'] }}/delete" data-models="book"><span class="button" id="delete"><i class="fa fa-remove"></i></span></a>                                            
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                        @endforeach

                                    </tbody>
                                </table>

                                {{-- @if(collect($books)->count() == 0)

                                <div class="card w m-auto h-auto" style="min-height: auto">
                                    <div class="box h-auto">
                                        <div class="n-w">
                                            <span>
                                                <h4 style="margin-top:10px; margin-bottom:-15px; font-size: 16px">No Books!</h4> 
                                                <br/>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @endif --}}
                            </div>

                            <div class="card s" style="display: none ">
                                <div class="pub">
                                    @foreach($books as $book)

                                    <a href="/publisher/bookstore/{{ $book['id'] }}">
                                        <div class="rack">
                                            <div 
                                                class="book" 
                                                style="background: url({{ $book['thumbnail'] }}); background-size: cover"
                                            >
                                                <div class="cover">{{ $book['title'] }}</div>
                                            </div>
                                        </div>
                                    </a>

                                    @endforeach
                                    
                                </div>

                            </div>

                            {{-- {{ $withdrawals->onEachSide(0)->links() }} --}}

                        </div>
                    </div>
                </div>
            </section>
        </section> 
@endsection