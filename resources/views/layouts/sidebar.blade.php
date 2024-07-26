<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    {{-- <a href="" class="logo logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo.png" alt="small logo">
        </span>
    </a> --}}

    <!-- Brand Logo Dark -->
    <a href="/" class="logo logo-dark pt-3 d-flex flex-column align-items-center">
        <span class="logo-lg">
            <img src="{{asset('assets/images/logo.png')}}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('assets/images/logo.png')}}" alt="small logo">
        </span>
    </a>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="/" class="side-nav-link">
                    <i class="ri-dashboard-2-fill"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Pages</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#members" aria-expanded="false" aria-controls="members"
                    class="side-nav-link">
                    <i class="ri-group-fill"></i>
                    <span> Members </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="members">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('members.create') }}">New Member(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('members.index') }}">All Members</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#groups" aria-expanded="false" aria-controls="groups"
                    class="side-nav-link">
                    <i class="ri-team-fill"></i>
                    <span> Groups </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="groups">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('groups.create') }}">New Group(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('groups.index') }}">All Groups</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#leaders" aria-expanded="false" aria-controls="leaders"
                    class="side-nav-link">
                    <i class="ri-user-fill"></i>
                    <span> Leaders </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="leaders">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('leaders.create') }}">New Leader(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('leaders.index') }}">All Leaders</a>
                        </li>
                    </ul>
                </div>
            </li>


          <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#events" aria-expanded="false" aria-controls="events"
                    class="side-nav-link">
                    <i class="ri-calendar-event-fill"></i>
                    <span> Events </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="events">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('events.create') }}">New Event(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('events.index') }}">All Events</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#contributions" aria-expanded="false" aria-controls="contributions"
                    class="side-nav-link">
                    <i class="ri-hand-heart-fill"></i>
                    <span> Contributions </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="contributions">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('contributionTypes.create') }}">New Contribution Type(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('contributionTypes.index') }}">All Contribution Type(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('contributions.create') }}">New Contribution(s)</a>
                        </li>
                        <li>
                            <a href="{{ route('contributions.index') }}">All Contributions</a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
