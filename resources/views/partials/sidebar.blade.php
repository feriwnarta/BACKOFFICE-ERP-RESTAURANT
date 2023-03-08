    {{--
     SIDEBAR MENU SENJA POS

     * Setiap menu dibuat menggunakan component button

     * class active digunakan untuk component button.icon-text ini berfungsi untuk membuat menu tersebut menjadi active
     * class inner-menu-active digunakan untuk component button.sidebar-text-only ini berfungsi untuk membuat inner menu menjadi active
     --}}

    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-logo">
            <img src="{{asset('img/cahaya_senja_logo.png')}}" alt="logo cahaya senja" class="logo-sidebar">
        </div>

        <div class="button-menu")>

            {{-- Dashboard Menu --}}
            <x-button.icon-text class="dashboard-btn active" icon="dashboard-icon" text="Dashboard" toggle="none" idTarget="dashboardCollapse" link="http://127.0.0.1:8000/test1" method="GET">
            </x-button.icon-text>

            {{-- Pos Menu --}}
            <x-button.icon-text class="pos-btn" icon="pos-icon" text="Point of Sales" toggle="collapse" idTarget="posCollapse" link="http://127.0.0.1:8000/test2" method="GET">
                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn inner-menu-active') variant="text" text="Menu"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu category-pos-btn') variant="text" text="Category"></x-button.sidebar-text-only>
            </x-button.icon-text>


            {{-- Ingridients Menu --}}
            <x-button.icon-text class="ingredients-btn" icon="ingredients-icon" text="Ingredients" toggle="collapse" idTarget="ingridientsCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.sidebar-text-only @class('inner-menu library-ingredients-btn inner-menu-active') variant="text" text="Library"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu category-ingredients-btn') variant="text" text="Category"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu recipes-ingredients-btn') variant="text" text="Recipes"></x-button.sidebar-text-only>
            </x-button.icon-text>


            {{-- Inventory Kitchen Menu --}}
            <x-button.icon-text class="inventory-btn" icon="inventory-icon" text="Inventory" toggle="collapse" idTarget="inventoryCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.sidebar-text-only @class('inner-menu summary-inventory-btn inner-menu-active') variant="text" text="Summary"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu stock-opname-inventory-btn') variant="text" text="Stock Opname"></x-button.sidebar-text-only>
            </x-button.icon-text>

            {{-- Central Kitchen Menu --}}
            <x-button.icon-text class="central-kitchen-btn" icon="central-kitchen-icon" text="Central Kitchen" toggle="collapse" idTarget="centralKitchenCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn inner-menu-active') variant="text" text="Library"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Category"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Recipes"></x-button.sidebar-text-only>
            </x-button.icon-text>

            {{-- Purchasing Menu --}}
            <x-button.icon-text class="purchasing-btn" icon="purchasing-icon" text="Purchasing" toggle="collapse" idTarget="purchasingCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.sidebar-text-only @class('inner-menu supplier-purchasing-btn inner-menu-active') variant="text" text="Supplier"></x-button.sidebar-text-only>
                <x-button.sidebar-text-only @class('inner-menu purchase-order-purchasing-btn') variant="text" text="Purchase Order"></x-button.sidebar-text-only>
            </x-button.icon-text>

            {{-- Accounting Menu --}}
            <x-button.icon-text class="accounting-btn" icon="accounting-icon" text="Accounting" toggle="collapse" idTarget="accountingCollapse" link="" method="GET">
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn inner-menu-active') variant="text" text="Library"></x-button.sidebar-text-only>--}}
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Category"></x-button.sidebar-text-only>--}}
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Recipes"></x-button.sidebar-text-only>--}}
            </x-button.icon-text>


            {{-- Finance Menu --}}
            <x-button.icon-text class="finance-btn" icon="finance-icon" text="Finance" toggle="collapse" idTarget="financeCollapse" link="" method="GET">
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn inner-menu-active') variant="text" text="Library"></x-button.sidebar-text-only>--}}
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Category"></x-button.sidebar-text-only>--}}
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Recipes"></x-button.sidebar-text-only>--}}
            </x-button.icon-text>

            {{-- Report Menu --}}
            <x-button.icon-text class="report-btn" icon="report-icon" text="Report" toggle="collapse" idTarget="reportCollapse" link="" method="GET">
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn inner-menu-active') variant="text" text="Library"></x-button.sidebar-text-only>--}}
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Category"></x-button.sidebar-text-only>--}}
{{--                <x-button.sidebar-text-only @class('inner-menu menu-pos-btn') variant="text" text="Recipes"></x-button.sidebar-text-only>--}}
            </x-button.icon-text>





        </div>
    </nav>
