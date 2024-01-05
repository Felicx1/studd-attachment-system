<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
        @if (Auth::user()->role == 'admin')
        <div class="sidebar-brand-text mx-3">SA-System </div>     
       @endif
        
       @if (Auth::user()->role == 'user')
        <div class="sidebar-brand-text mx-3">SA-System </div>

        @endif


    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
  

    <!-- Nav Item - Utilities Collapse Menu -->
    @if (Auth::user()->role == 'admin'  || Auth::user()->role == 'user')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Internship Details</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                @if (Auth::user()->role !== 'admin')
                <a class="collapse-item" href="{{route('internships.create')}}">Add New</a>
                @endif
            
                
                <a class="collapse-item" href="{{route('internships.index')}}">Show All</a>
              
                {{-- <a class="collapse-item" href="{{route('user.tune')}}">Tunes</a>
                <a class="collapse-item" href="{{route('user.content_marketing')}}">Content Marketing</a> --}}
            </div>
        </div>
    </li>

    @endif

    @if (Auth::user()->role !== 'admin')
        
   
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Daily Report</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (Auth::user()->role !== 'internal_supervisor')
                <a class="collapse-item" href="{{route('daily-reports.create')}}">Write New</a>
                @endif

                <a class="collapse-item" href="{{route('daily-reports.index')}}">Show All</a>
            </div>
        </div> 
    </li>
    @endif




    <!-- Divider -->

   {{-- <hr class="sidebar-divider">
    @if (Auth::user()->role == 'admin')


    <li class="nav-item">
        <a class="nav-link collapsed" href="#"
            aria-expanded="true" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Assessment Schedule</span>
        </a>
        {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div> --}}
    {{--</li>--}}

    {{--@endif --}}
    

    {{-- <!-- Nav Item - Charts -->
    @if (Auth::user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="#_">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Partners</span></a>
    </li>
    @endif --}}
    

    <!-- Nav Item - Tables -->
    @if (Auth::user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="#_">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  

</ul>