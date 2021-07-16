<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <nav class="navbar navbar-light bg-light">

        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Logged in as {{ Cookie::get('usernameCookie') }}</span>
            <a href="/login">
                <button type="button" class="btn btn-primary">Login</button>
            </a>
        </div>
    </nav>
</div>