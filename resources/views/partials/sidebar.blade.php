    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-logo">
            <img src="{{asset('img/cahaya_senja_logo.png')}}" alt="logo cahaya senja" class="logo-sidebar">
        </div>

        <div class="button-menu")>

            {{-- Dashboard Menu --}}
            <x-button.icon-text class="dashboard-btn" icon="dashboard-icon" text="Dashboard" toggle="none" idTarget="dashboardCollapse" link="http://127.0.0.1:8000/test" method="GET">
            </x-button.icon-text>

            {{-- Pos Menu --}}
            <x-button.icon-text class="pos-btn" icon="pos-icon" text="Point of Sales" toggle="collapse" idTarget="posCollapse" link="" method="GET">
                <h1>test</h1>
            </x-button.icon-text>

        </div>
    </nav>
