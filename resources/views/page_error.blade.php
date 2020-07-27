<div class="relative resource-index" dusk="nova-xtra-page">
    <h1 class="mb-3 text-90 font-normal text-2xl">
        Page Not Found
    </h1>
    <div class="card">
        <div class="relative">
            <div class="flex justify-center items-center px-6 py-8" style="">
                <div class="text-center">
                    <svg class="text-60" fill="none" width="65" fill="none" height="65" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-base text-80 font-normal mb-6">
                        Any idea why?
                    </h3>
                    @if($exception and config('app.debug'))
                        <div class="text-60">
                            <p class="mb-4">More info for developer</p>
                            <p class="mb-1">{{ $exception->getMessage() }}</p>
                            <p>{{ $exception->getFile() }}</p>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
