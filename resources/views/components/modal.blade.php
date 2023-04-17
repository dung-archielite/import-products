<div id="modal" class="transition relative z-10 ease-out duration-300 opacity-0 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div id="content-modal" class="transition flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ease-out duration-300 translate-y-4 sm:translate-y-0 sm:scale-95 opacity-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                <div>
                    {{ $slot }}
                </div>
                <div class="mt-5 sm:mt-6">
                    <button id="modal-back" type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('Go back to dashboard') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
