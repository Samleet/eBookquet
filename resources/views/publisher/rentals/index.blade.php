@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="rentals">
                <div class="trailer">
                    <h2><i class="ion-ios-people"></i> Rentals <br/> <span></span> <button><i class="ion-ios-book"></i> Total Rentals: 0</button></h2>
                </div>
                
                <div class="content">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0">    
                            <div class="card shadow-light">
                                <div class="stats" style="overflow: hidden">
                                    <h5>Today</h5>
                                    <h2>{{ number_format($statistics['today']) }}</h2>
                                    {{-- <img 
                                        style="
                                            top: 107px;
                                            right: -70px;
                                        "
                                        src="/themes/xenalite/images/chart_1.png" width="300" height="100" alt="" class="img1" 
                                    /> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4 mb-md-0">    
                            <div class="card shadow-light">
                                <div class="stats" style="overflow: hidden">
                                    <h5>Revenue</h5>
                                    <h2>{{ '₦'.number_format($statistics['total'], 2) }}</h2>
                                    {{-- <img 
                                        style="
                                            top: 100px;
                                            right: 0;
                                        "
                                        src="/themes/xenalite/images/chart_2.png" width="300" height="100" alt="" class="img1" 
                                    /> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4 mb-md-0">    
                            <div class="card shadow-light">
                                <div class="stats" style="overflow: hidden">
                                    <h5>This Month</h5>
                                    <h2>{{ '₦'.number_format($statistics['month'], 2) }}</h2>
                                    {{-- <img 
                                        style="
                                            top: 107px;
                                            right: -70px;
                                        "
                                        src="/themes/xenalite/images/chart_3.png" width="300" height="100" alt="" class="img1" 
                                    /> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title"><i class="ion-ios-list"></i> Rental History</h2>
                            <div class="card t">
                                <table>
                                    <thead>
                                        <th>S/N</th>
                                        <th
                                            class="text-left"
                                        >
                                            Book
                                        </th>
                                        <th>Genre</th>
                                        <th>Type</th>
                                        <th>User</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Timestamp</th>
                                        <th>Manage</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // $i = page(50);
                                        ?>
                                        {{-- @foreach($withdrawals as $withdraw)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ '#'.$withdraw->doctor->doctorId }}</td>
                                            <td 
                                                class="text-left"
                                            >
                                                {{ $withdraw->doctor->fullname }}
                                                <small style="
                                                    display: block;
                                                    color: #4951AC;
                                                ">
                                                    {{ $withdraw->doctor->speciality }}
                                                </small>
                                            </td>
                                            <td>{{ 'NGN' }}</td>
                                            <td>

                                                <span class="create">WITHDRAW</span>

                                            </td>
                                            <td>₦{{ number_format($withdraw->amount ) }}</td>
                                            <td>n/a</td>
                                            <td>{{ $withdraw->reference }}</td>
                                            <td><span class="{{ $withdraw->status == 'pending' ? 'manage' : ($withdraw->status == 'confirmed' ? 'create' : ($withdraw->status == 'declined' ? 'delete' : null)) }}">{{ ucwords($withdraw->status) }}</span></td>
                                            <td>{{ $withdraw->created_at }}</td>
                                            <td>
                                                @if($withdraw->status == 'pending')

                                                <a href="/admin/withdrawals/show/{{ $withdraw->id }}"><span class="button" id="update"><i class="fa fa-edit"></i></span></a>
                                                <a data-action="/admin/withdrawals/{{ $withdraw->id }}/delete" data-models="withdrawal"><span class="button" id="delete"><i class="fa fa-remove"></i></span></a>                                            
                                                @else

                                                <a><span class="button bg-light text-muted" id="nulled"><i class="fa fa-edit"></i></span></a>
                                                <a><span class="button bg-light text-muted" id="nulled"><i class="fa fa-remove"></i></span></a>                                            
                                                @endif

                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                        @endforeach
 --}}
                                    </tbody>
                                </table>

                                {{-- @if($withdrawals->count() == 0)

                                <div class="card w m-auto h-auto" style="min-height: auto">
                                    <div class="box h-auto">
                                        <div class="n-w">
                                            <span>
                                                <h4 style="margin-top:10px; margin-bottom:-15px; font-size: 16px">No Transaction!</h4> 
                                                <br/>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @endif --}}
                            </div>

                            {{-- {{ $withdrawals->onEachSide(0)->links() }} --}}

                        </div>
                    </div>
                </div>
            </section>
        </section> 
@endsection