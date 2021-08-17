@extends('layouts.dashboard')


@section('content')

<x-booking-form route="/bookings" type="post" :rooms="$allRooms">
    Create
</x-booking-form>

@endsection