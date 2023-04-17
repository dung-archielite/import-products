<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Products') }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ __('A list of all the products') }}</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button id="add-products" type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('Add products') }}</button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 h-[600px]">
                @if(! empty($products) )
                <table class="min-w-full divide-y divide-gray-300 ">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">{{ __('Name') }}</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('SKU') }}</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Price') }}</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Stock') }}</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Status') }}</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Type') }}</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white max-h-[600px] overflow-y-auto">
                        @foreach($products as $product)
                            <x-products.item :$product/>
                        @endforeach
                    </tbody>
                </table>
                    {{ $products->links() ?: '' }}
                @else
                    <div class="py-12 text-center lg:col-span-4 mb-5">{{ __('No products found.') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@if(isset($listError))
    @foreach($listError as $error)
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $error }}</h5>
        </div>
    @endforeach
@endif
