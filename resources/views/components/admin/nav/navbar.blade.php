<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Hotel Manager</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <span class="navbar-text h5 my-auto @if (Session::has('text-class'))
    {{Session::get('text-class')}}
    @endif">
        @if (Session::has('message'))
            {{Session::get('message')}}
        @endif</span>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <!--<div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>-->
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <x-admin.nav.setup-navbar/>
        <x-admin.nav.profile/>
    </ul>
</nav>
