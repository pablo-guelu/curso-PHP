@extends('layouts.dashboard')

@section('content')
    
        <h2 class="title-1 m-b-25" style="color:white">Bookings</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>room</th>
                        <th>name</th>
                        <th>check-in</th>
                        <th>chekout</th>
                        <th>email</th>
                        <th>phone</th>
                        <th class="text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        @if(isset($booking -> room -> number))
                            <td>{{ $booking -> room -> number }}</td>
                        @else
                            <td> - </td>
                        @endif
                        <td>{{ $booking -> name }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking -> checkin)-> format('m/d/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking -> checkout)-> format('m/d/Y') }}</td>
                        <td>{{ $booking -> email }}</td>
                        <td>{{ $booking -> phone }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="/bookings/{{ $booking -> id }}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                <a href="/bookings/{{ $booking -> id }}/edit">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <form method="post" action="/bookings/{{ $booking -> id }}">
                                    @csrf
                                    @method('delete')
                                    <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>     
                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button> -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            <a href="/bookings/create">
                <button id="booking-button" class="btn btn-lg btn-success btn-block">
                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                    <span id="">Add Booking</span>
                </button>
            </a>               
        </div>
    
@endsection