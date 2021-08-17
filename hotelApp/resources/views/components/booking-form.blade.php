@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Booking</h3>
            </div>
            <hr>
            <form action="{{$route}}" method="post">
                @csrf
                @method($type)
                <div class="form-group has-success">
                    <label for="name" class="control-label mb-1">Name</label>
                    <input id="name" name="name" value="{{$name}}" type="text" class="form-control name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="name" aria-required="true" aria-invalid="false" aria-describedby="name-error">
                    <span class="help-block field-validation-valid" data-valmsg-for="name" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2" class="px-1  form-control-label">Email</label>
                    <input type="email" id="exampleInputEmail2" name="email" value="{{$email}}" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="px-1  form-control-label">Phone</label>
                    <input type="phone" id="phone" name="phone" value="{{$phone}}" required="" class="form-control">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="checkin" class="control-label mb-1">Checkin</label>
                            <input id="checkin" name="checkin" type="date" value="{{ \Carbon\Carbon::parse($checkin)->format('Y-m-d') }}" class="form-control checkin" data-val="true" data-val-required="Please select the date for your checkin" data-val-checkin="Please enter a valid date" placeholder="MM / YY" autocomplete="checkin">
                            <span class="help-block" data-valmsg-for="checkin" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="checkout" class="control-label mb-1">Checkout</label>
                            <input id="checkout" name="checkout" value="{{ \Carbon\Carbon::parse($checkout)->format('Y-m-d') }}" type="date" class="form-control checkout" data-val="true" data-val-required="Please select the date for your checkout" data-val-checkout="Please enter a valid date" placeholder="MM / YY" autocomplete="checkout">
                            <span class="help-block" data-valmsg-for="checkout" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="row form-group my-4">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Room</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="room" class="form-control">
                            <option value="0">Please select a room</option>
                            @if ($selectedRoom)

                                @foreach( $rooms as $room)
                                    @if ($room->number == $selectedRoom->number)
                                    <option selected>{{$selectedRoom->number}}</option>
                                    @else
                                        @if (is_null($room->booking_id))
                                        <option value="{{ $room -> number }}">{{ $room -> number }}</option>
                                        @endif
                                    @endif
                                @endforeach

                            @else

                                @foreach( $rooms as $room)
                                    <!-- we only want to show the available rooms -->
                                    @if (is_null($room->booking_id))
                                     <option value="{{ $room -> number }}">{{ $room -> number }}</option>
                                    @endif
                                @endforeach

                            @endif

                        </select>
                    </div>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                        <i class="fa fa-edit fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">{{ $slot }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="user-data__footer">
        <a href="/bookings">
        <button type="button" class="btn btn-primary">
            <i class="fa fa-book"></i>&nbsp; Index</button>
        </a>
    </div>
</div>