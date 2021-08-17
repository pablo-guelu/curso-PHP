@extends('layouts.dashboard')




@section('content')

<h3>{{$booking->user_id}}</h3>
<h3>{{Auth::user()->id}}</h3>

<!-- {{$booking->name}} -->

<x-booking-form
route="/bookings/{{$booking->id}}" 
type="PUT"
:rooms="$allRooms" 
:name="$booking->name"
:email="$booking->email"
:phone="$booking->phone"
:checkin="$booking->checkin"
:checkout="$booking->checkout"
:selectedRoom="$booking->room">
    Update
</x-booking-form>

@endsection