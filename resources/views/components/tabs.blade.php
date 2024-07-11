<div class="w-2/3 py-10" style="margin-left: 200px">
    <div class="relative right-0">
        <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60" data-tabs="tabs"
            role="list">
            <li class="z-30 flex-auto text-center">
                <a href="{{ route('Transaction.Perbulan') }}"
                    class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit {{ request()->routeIs('Transaction.Perbulan') ? 'active' : '' }}"
                    data-tab-target="" role="tab" aria-selected="{{ request()->routeIs('Transaction.Perbulan') ? 'true' : 'false' }}">
                   <i class="fas fa-house-user"></i>
                    <span class="ml-1">Bulanan</span>
                </a>
            </li>
            <li class="z-30 flex-auto text-center">
                <a href="{{ route('Transaction.Pertahun') }}"
                    class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit {{ request()->routeIs('Transaction.Pertahun') ? 'active' : '' }}"
                    data-tab-target="" role="tab" aria-selected="{{ request()->routeIs('Transaction.Pertahun') ? 'true' : 'false' }}">
                    <i class="fas fa-house-user"></i>
                    <span class="ml-1">Tahunan</span>
                </a>
            </li>
        </ul>
    </div>
</div>