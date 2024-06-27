<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Home
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Tickets
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('ticket.list') }}">Senarai Ticket</a>
                    <a class="nav-link" href="{{ route('ticket.semak') }}">Semak Ticket</a>
                    <a class="nav-link" href="{{ route('ticket.baru') }}">Ticket Baru</a>
                    <a class="nav-link" href="{{ route('soalan.lazim') }}">Soalan Lazim</a>
                </nav>
            </div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Users
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('users.index') }}">Senarai Users</a>
                    <a class="nav-link" href="{{ route('users.create') }}">Tambah User</a>
                </nav>
            </div>



            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="/logout">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Log Out
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
