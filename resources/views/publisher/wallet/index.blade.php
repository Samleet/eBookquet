@extends('publisher.layouts.section')
@section('app')

        <section class="mainbar">
            <section id="wallet">
                <div class="trailer">
                    <h2><i class="ion-ios-wallet"></i> Wallet <br/> <span></span> <a href="javascript:"><button><i class="ion-ios-cash"></i> Withdraw</button></a></h2>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats">
                                <h5>Wallet Balance</h5>
                                <h2>{{ '₦'.number_format(publisher()->wallet->balance, 2) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats" style="overflow: hidden">
                                <h5>Revenue</h5>
                                <h2>{{ '₦'.number_format($summary['revenue'], 2) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card shadow-light">
                            <div class="stats" style="overflow: hidden">
                                <h5>Withdrawals</h5>
                                <h2>{{ '₦'.number_format($summary['withdraws'], 2) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title"><i class="ion-ios-list"></i> Transactions <a href="javascript:">Total (0)</a></h2>
                            <div class="card t">
                                <table>
                                    <thead>
                                        <th>S/N</th>
                                        <th>Channel</th>
                                        <th>Amount</th>
                                        <th>User</th>
                                        <th>Balance</th>
                                        <th>Token</th>
                                        <th>Reference</th>
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