@extends('layouts.dashboard')

@section('content')

<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>booking data</h3>

    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <th>room</th>
                    <th>name</th>
                    <th>check-in</th>
                    <th>chekout</th>
                    <th>email</th>
                    <th>phone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $booking -> room -> number}}</td>
                    <td>{{ $booking -> name }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking -> checkin)-> format('m/d/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking -> checkout)-> format('m/d/Y') }}</td>
                    <td>{{ $booking -> email }}</td>
                    <td>{{ $booking -> phone }}</td>
                    <td>
                        <div class="table-data-feature">
                            <a href="/bookings/{{ $booking -> id }}/edit">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="user-data__footer">
        <a href="/bookings">
            <button class="au-btn au-btn-load">index</button>
        </a>
    </div>
</div>

@endsection