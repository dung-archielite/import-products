<x-layouts.app>
    <div class="mb-10" id="product-list">
        @include('products.list')
    </div>

    <x-modal>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" id="form-upload">
            @csrf
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">{{ __('Upload file') }}</label>
            <input name="file" accept=".csv" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <div class="w-full bg-gray-200 rounded-full h-1 dark:bg-gray-700 hidden process_upload">
                <div class="bg-blue-600 h-1 rounded-full" style="width: 45%"></div>
            </div>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

            <div class="bg-white border rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-700 hidden" id="process-loading" role="alert">
                <div class="flex items-center p-4">
                    <div class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-blue-600 rounded-full" role="status" aria-label="loading">
                        <span class="sr-only">{{ __('Loading...') }}</span>
                    </div>
                    <p class="ml-3 text-sm text-gray-700 dark:text-gray-400">
                        {{ __('Action in progress') }}
                    </p>
                </div>
            </div>
            <div class="text-center">
                <button id="btn-submit" disabled class="px-4 py-3 bg-blue-700 rounded-md text-white outline-none focus:ring-4 shadow-lg transform active:scale-x-75 transition-transform mt-3 disabled:bg-gray-400 disabled:text-gray-500 disabled:active:scale-x-100">{{ __('Upload') }}</button>
            </div>
        </form>
    </x-modal>
</x-layouts.app>
