<div
    class=" mb-2 md:mb-0 absolute opacity-0 md:opacity-100 flex md:flex-col lg:max-h-full max-h-10  bottom-0 row-span-1 md:static md:row-span-3 md:p-6 bg-white border border-gray-200 rounded-[25px] shadow dark:bg-white">
    @if (isset($nav) === 'admin' || (isset($data['nav']) && $data['nav'] === 'admin'))
        @include('partials.navlist.admin')
    @else
        @include('partials.navlist.customer')
    @endif
</div>
