    {{--
     SIDEBAR MENU SENJA POS

     * Setiap menu dibuat menggunakan component button

     * class active digunakan untuk component button.icon-text ini berfungsi untuk membuat menu tersebut menjadi active
     * class inner-menu-active digunakan untuk component button.text-only ini berfungsi untuk membuat inner menu menjadi active
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
                <x-button.text-only @class('inner-menu-active') id="menu-pos-btn" variant="text" text="Menu" link="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="category-pos-btn" variant="text" text="Category" link="" method=""></x-button.text-only>
            </x-button.icon-text>


            {{-- Ingridients Menu --}}
            <x-button.icon-text class="ingredients-btn" icon="ingredients-icon" text="Ingredients" toggle="collapse" idTarget="ingridientsCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.text-only @class('inner-menu-active') id="library-ingredients-btn" variant="text" text="Library" link="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="category-ingredients-btn" variant="text" text="Category" link="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="recipes-ingredients-btn" variant="text" text="Recipes" link="" method=""></x-button.text-only>
            </x-button.icon-text>


            {{-- Inventory Kitchen Menu --}}
            <x-button.icon-text class="inventory-btn" icon="inventory-icon" text="Inventory" toggle="collapse" idTarget="inventoryCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.text-only @class('inner-menu-active') id="summary-inventory-btn" variant="text" text="Summary" link="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="stock-opname-inventory-btn" variant="text" text="Stock Opname" link="" method=""></x-button.text-only>
            </x-button.icon-text>

            {{-- Central Kitchen Menu --}}
            <x-button.icon-text class="central-kitchen-btn" icon="central-kitchen-icon" text="Central Kitchen" toggle="collapse" idTarget="centralKitchenCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.text-only @class('inner-menu-active') id="library-central-kitchen-btn" variant="text" text="Library" link="" method="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="category-central-kitchen-btn" variant="text" text="Category" link="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="recipes-central-kitchen-btn" variant="text" text="Recipes" link="" method=""></x-button.text-only>
            </x-button.icon-text>

            {{-- Purchasing Menu --}}
            <x-button.icon-text class="purchasing-btn" icon="purchasing-icon" text="Purchasing" toggle="collapse" idTarget="purchasingCollapse" link="http://127.0.0.1:8000/test3" method="GET">
                <x-button.text-only @class('') id="supplier-purchasing-btn" variant="text" text="Supplier" link="" method=""></x-button.text-only>
                <x-button.text-only @class('') id="purchase-order-purchasing-btn" variant="text" text="Purchase Order" link="" method=""></x-button.text-only>
            </x-button.icon-text>

            {{-- Accounting Menu --}}
            <x-button.icon-text class="accounting-btn" icon="accounting-icon" text="Accounting" toggle="collapse" idTarget="accountingCollapse" link="" method="GET">

            </x-button.icon-text>


            {{-- Finance Menu --}}
            <x-button.icon-text class="finance-btn" icon="finance-icon" text="Finance" toggle="collapse" idTarget="financeCollapse" link="" method="GET">

            </x-button.icon-text>

            {{-- Report Menu --}}
            <x-button.icon-text class="report-btn" icon="report-icon" text="Report" toggle="collapse" idTarget="reportCollapse" link="" method="GET">

            </x-button.icon-text>





        </div>
    </nav>
