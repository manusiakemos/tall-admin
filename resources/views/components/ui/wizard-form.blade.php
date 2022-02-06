<div class="z-0 antialiased">
    <div
        x-data="{
                    step: window.location.hash ? window.location.hash.substring(1) : '{{$headers[0]['step']}}',
                    total : {{count($headers)}},
                    headers: {{json_encode($headers, true)}}
                 }">
        <!-- The tabs navigation -->
        <div class="flex justify-between items-center overflow-auto whitespace-nowrap rounded-t-xl border-t-2  border-r-2  border-l-2 border-gray-700">
            <h4 class="text-gray-700 font-bold dark:text-gray-300 ml-3" x-text="headers[step - 1]['title']"></h4>
            <div class="flex items-center justify-center w-1/2 md:w-2/3 p-5">
                <div class="w-full bg-gray-300 rounded-full mr-2">
                    <div class="rounded-full bg-success-500 text-xs leading-none h-2 text-center text-white"
                         :style="'width: '+ parseInt(step) / total * 100 +'%'"></div>
                </div>
                <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
            </div>
        </div>

        <!-- The tabs content -->
        <div class="p-3 bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 border-2 border-gray-700 relative">
            @foreach($headers as $header)
                <div x-show.transition="step == '{{$header['step']}}'">
                    <h4 class="block sm:hidden heading text-center">{!! $header['title'] !!}</h4>
                    <div>
                        {{ ${'step_'.$header["step"]} }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="p-3 dark:bg-gray-800 rounded-b-xl border-b-2 border-r-2 border-l-2 border-gray-700 relative">
            <div class="flex w-full px-1 justify-between">

                <x-ui.button class="mr-auto"
                                x-show.transition="parseInt(step) < total"
                                @click.prevent="step = parseInt(step) + 1">Next</x-ui.button>

                <x-ui.button class="ml-auto"
                                x-show.transition="parseInt(step) > 1"
                                @click.prevent="step = parseInt(step) - 1">Previous</x-ui.button>
            </div>
        </div>

        </div>
</div>
