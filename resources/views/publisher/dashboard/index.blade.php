@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="dashboard">
                <div class="trailer">
                    <h2>Welcome Back, <font>{{ publisher()->fullname }}!</font>
                        <br/> 
                        <span>{{ date("D d, M Y - h:iA") }}</span> <a href="/publisher/bookstore/create"><button><i class="ion-ios-book"></i> Upload Book</button></a></h2>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card c shadow-light" style="color: #fff; height: auto">
                            <div class="stats">
                                <h5>Wallet Balance</h5>
                                <h2>{{ '₦'.number_format(publisher()->fresh()->wallet->balance, 2) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats" style="overflow: hidden">
                                <h5><i class="ion-ios-book"></i> Books</h5>
                                <h2>{{ number_format($summary['books']) }}</h2>
                                <img 
                                    style="
                                        top: 50px;
                                        right: -40px;
                                    "
                                    src="/themes/xenalite/images/vector1.png" width="200" height="150" alt="" class="img2" 
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats" style="overflow: hidden">
                                <h5><i class="ion-ios-people"></i> Total Renters</h5>
                                <h2>{{ number_format($summary['renters']) }}</h2>
                                <img 
                                    style="
                                        top: 20px;
                                        right: -80px;
                                    "
                                    src="/themes/xenalite/images/vector2.png" width="250" height="200" alt="" class="img2" 
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats">
                                <h5><i class="ion-ios-bookmarks"></i> All Rentals</h5>
                                <h2>{{ number_format($summary['rentals']) }}</h2>
                                <a href="/publisher/rentals">See All <i class="ion-md-arrow-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats">
                                <h5><i class="ion-ios-list"></i> Genres</h5>
                                <h2>{{ number_format($summary['genres']) }}</h2>
                                <a href="/publisher/genres">See All <i class="ion-md-arrow-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats">
                                <h5><i class="ion-ios-calendar"></i> Leases Out</h5>
                                <h2>{{ number_format($summary['toDue']) }}</h2>
                                <a href="/publisher/rentals">See All <i class="ion-md-arrow-forward"></i></a>
                            </div>
                        </div>
                    </div>

                    <?php
                    ?>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title"><i class="ion-ios-list"></i> Recent Rentals <a href="/publisher/rentals">See More &raquo;</a></h2>
                            <div class="card t">
                                <table>
                                    <thead>
                                        <th>S/N</th>
                                        <th>Book</th>
                                        <th>Genre</th>
                                        <th>User</th>
                                        <th>BookHut</th>
                                        <th>Duration</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Manage</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // $i = page(10);
                                        ?>
                                        {{-- @foreach($appointments as $appointment)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $appointment->doctor ? $appointment->doctor->fullname : 'n/a' }}</td>
                                            <td>{{ $appointment->patient ? $appointment->patient->fullname : 'n/a' }}</td>
                                            <td>{{ $appointment->location ?? '-' }}</td>
                                            <td>{{ $appointment->type }}</td>
                                            <td>{{ $appointment->payment ? $appointment->payment->reference : 'n/a' }}</td>
                                            <td>{!! $appointment->status == 'pending' || $appointment->status == 'confirmed' && !$appointment->payment ? '<button class="manage">Pending</button>' : ($appointment->status == 'confirmed' ? '<button class="create">Confirmed</button>' : '<button class="delete">'.ucwords($appointment->status).'</button>') !!}</td>
                                            <td>{!! $appointment->payment ? '₦'.number_format($appointment->payment->amount) : 'n/a' !!}</td>
                                            <td>{{ carbon()->parse($appointment->date)->format('D jS, M y @ h:i A') }}</td>
                                            <td><a href="/admin/appointments/show/{{ $appointment->id }}"><button class="manage">View</button></a></td>
                                        </tr>
                                        
                                        <?php
                                        $i++;
                                        ?>
                                        @endforeach --}}

                                    </tbody>
                                </table>
                                
                                {{-- @if($appointments->count() == 0)

                                <div class="card w m-auto h-auto" style="min-height: auto">
                                    <div class="box h-auto">
                                        <div class="n-w">
                                            <span>
                                                <h4 style="margin-top:10px; margin-bottom:-15px; font-size: 16px">No Appointments!</h4> 
                                                <br/>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section> 
@endsection