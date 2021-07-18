<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <nav class="navbar navbar-light mb-3">

        <div class="container-fluid ">
            <span class="navbar-brand mb-0 h1">Logged in as {{ Cookie::get('usernameCookie') }}</span>
            <div class="row">
                <div class="col-sm">
                <a href="/login" style="text-decoration: none">
                    <button type="button" class="btn btn-primary">Login</button>
                </a>
                </div>
                <div class="col-sm">
                    <form action="/logout" method='post'>
                    @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>