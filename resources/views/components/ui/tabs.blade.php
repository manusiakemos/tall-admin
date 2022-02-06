<div class="z-0 text-gray-700">
    <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : '{{$headers[0]['key']}}' }">
        <!-- The tabs navigation -->
        <div class="flex justify-center items-center overflow-auto whitespace-nowrap border-collapse">
            @foreach($headers as $header)

                @php
                    $classDisabled = "";
                    $disabledTabs = false;
                    if(isset($header['disabled'])){
                        $disabledTabs = boolval($header['disabled']);
                    }
                @endphp

                @if($loop->first)
                    {{--start--}}
                    <button
                        id="tabBtn{{$header['key']}}"
                        {{$disabledTabs ? "disabled" : ""}}
                        class="uppercase font-semibold whitespace-nowrap
                                flex flex-1 justify-center
                                rounded-tl-xl border-gray-300 border-l-2 border-b-2 border-t-2 p-3 border-collapse"
                        :class="tab === '{{$header['key']}}'
                            ? 'bg-secondary-500 dark:bg-primary-400 hover:bg-secondary-400 text-gray-100 dark:text-gray-700'
                            : 'bg-white dark:bg-gray-800 text-primary-700 dark:text-primary-100 hover:bg-secondary-100 text-gray-800'"
                        @click.prevent="tab = '{{$header['key']}}'; window.location.hash = '{{$header['key']}}'">
                        <span class="hidden md:block">{{$header['title']}}</span>
                        @isset($header['icon'])
                            <span class="block sm:hidden">{!! $header['title'] !!}</span>
                        @endisset
                    </button>

                @elseif($loop->last)
                    {{--end--}}
                    <button
                        id="tabBtn{{$header['key']}}"
                        {{$disabledTabs ? "disabled" : ""}}
                        class="uppercase font-semibold whitespace-nowrap
                                flex flex-1 justify-center
                                rounded-tr-xl border-gray-300 border-r-2 border-b-2 border-t-2 p-3 border-collapse"
                        :class="tab === '{{$header['key']}}'
                            ? 'bg-secondary-500 dark:bg-primary-400 hover:bg-secondary-400 text-gray-100 dark:text-gray-700'
                            : 'bg-white dark:bg-gray-800 text-primary-700 dark:text-primary-100 hover:bg-secondary-100 text-gray-800'"
                        @click.prevent="tab = '{{$header['key']}}'; window.location.hash = '{{$header['key']}}'">
                        <span class="hidden md:block">{{$header['title']}}</span>
                        @isset($header['icon'])
                            <span class="block sm:hidden">{!! $header['title'] !!}</span>
                        @endisset
                    </button>
                @else
                    {{--center--}}
                    <button
                        id="tabBtn{{$header['key']}}"
                        class="uppercase font-semibold"
                        {{$disabledTabs ? "disabled" : ""}}
                        :class=" tab === '{{$header['key']}}'
                            ? 'flex flex-1 justify-center border-top border-r-2 border-t-2 border-gray-300 bg-secondary-500 dark:bg-primary-400 text-white p-3 hover:bg-secondary-600 text-white dark:text-gray-900'
                            : 'flex flex-1 justify-center border-top border-r-2 border-t-2 p-3 border-gray-300 hover:text-secondary-500 text-gray-700 dark:text-gray-500'"
                        @click.prevent="tab = '{{$header['key']}}'; window.location.hash = '{{$header['key']}}'">
                        <span class="hidden md:block">{{$header['title']}}</span>
                        @isset($header['icon'])
                            <span class="block sm:hidden">{!! $header['title'] !!}</span>
                        @endisset
                    </button>

                @endif
            @endforeach
        </div>

        <!-- The tabs content -->
        <div
            class="p-3 bg-white dark:bg-gray-700 rounded-b-xl border-l-2 border-r-2 border-b-2 border-collapse border-gray-300 relative">
            @foreach($headers as $header)
                <div x-transition x-show="tab === '{{$header['key']}}'">
                    <h4 class="block sm:hidden heading text-center">{!! $header['title'] !!}</h4>
                    <div>
                        {{ ${$header["key"]} }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
