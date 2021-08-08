<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <nav class="navbar navbar-light mb-3">

        <div class="container-fluid ">

        @if (Auth::user())
            <span class="navbar-brand mb-0 h1">Logged in as {{ Cookie::get('usernameCookie') }}</span>
            <div class="row">
                <!-- <div class="col-sm">
                <a href="/login" style="text-decoration: none">
                    <button type="button" class="btn btn-primary">Login</button>
                </a>
                </div> -->
                <div class="col-sm">
                    <form action="/logout" method='post'>
                    @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm">
                    <a href="/login" style="text-decoration: none">
                        <button type="button" class="btn btn-primary">Login</button>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="/register" style="text-decoration: none">
                        <button type="button" class="btn btn-primary">Register</button>
                    </a>
                </div>
            </div>
        @endif

        </div>
    </nav>
</div>