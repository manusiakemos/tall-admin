<div>
    <div
        x-data="editor(@entangle($attributes->wire('model')))"
        wire:ignore
{{--        wire:poll.visible.1000ms--}}
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    >
        <div class="bg-gray-100 dark:bg-gray-800 py-3 px-6 w-full">
            <div class="flex flex-wrap mb-3">
                {{-- heading --}}
                <template x-for="i in 4">
                    <button
                        class="p-3 m-1 text-black"
                        type="button"
                        :class="isActive('h'+i) + ''"
                        x-on:click="toggleHeading(i)"
                    >
                        <span x-text="'h'+i" class="text-lg font-bold"></span>
                    </button>
                </template>

                {{-- bold --}}
                <button
                    type="button"
                    class="p-3 m-1 text-gray-700 dark:text-gray-300"
                    :class="isActive('bold')"
                    x-on:click="toggleBold"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M8 11h4.5a2.5 2.5 0 1 0 0-5H8v5zm10 4.5a4.5 4.5 0 0 1-4.5 4.5H6V4h6.5a4.5 4.5 0 0 1 3.256 7.606A4.498 4.498 0 0 1 18 15.5zM8 13v5h5.5a2.5 2.5 0 1 0 0-5H8z"/></svg>
                </button>

                {{-- italic --}}
                <button
                    type="button"
                    class="p-3 m-1 text-gray-700 dark:text-gray-300"
                    :class="isActive('italic')"
                    x-on:click="toggleItalic"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15 20H7v-2h2.927l2.116-12H9V4h8v2h-2.927l-2.116 12H15z"/></svg>
                </button>

                {{-- underline --}}
                <button
                    type="button"
                    class="p-3 m-1 text-gray-700 dark:text-gray-300"
                    :class="isActive('underline')"
                    x-on:click="toggleUnderline"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M8 3v9a4 4 0 1 0 8 0V3h2v9a6 6 0 1 1-12 0V3h2zM4 20h16v2H4v-2z"/></svg>
                </button>

                {{-- highlight --}}
                <button
                    type="button"
                    class="p-3 m-1 text-gray-700 dark:text-gray-300"
                    :class="isActive('highlight')"
                    x-on:click="toggleHighlight"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.243 4.515l-6.738 6.737-.707 2.121-1.04 1.041 2.828 2.829 1.04-1.041 2.122-.707 6.737-6.738-4.242-4.242zm6.364 3.535a1 1 0 0 1 0 1.414l-7.779 7.779-2.12.707-1.415 1.414a1 1 0 0 1-1.414 0l-4.243-4.243a1 1 0 0 1 0-1.414l1.414-1.414.707-2.121 7.779-7.779a1 1 0 0 1 1.414 0l5.657 5.657zm-6.364-.707l1.414 1.414-4.95 4.95-1.414-1.414 4.95-4.95zM4.283 16.89l2.828 2.829-1.414 1.414-4.243-1.414 2.828-2.829z"/></svg>
                </button>

                {{-- paragraph --}}
                <button
                    type="button"
                    class="bg-gray-400 p-3 m-1 text-gray-700 dark:text-gray-300"
                    x-on:click="toggleParagraph"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 6v15h-2v-5a6 6 0 1 1 0-12h10v2h-3v15h-2V6h-3zm-2 0a4 4 0 1 0 0 8V6z"/></svg>
                </button>

                {{-- orderded list --}}
                <button
                    type="button"
                    class="p-3 m-1 text-gray-700 dark:text-gray-300"
                    :class="isActive('number')"
                    x-on:click="toggleList('number')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M8 4h13v2H8V4zM5 3v3h1v1H3V6h1V4H3V3h2zM3 14v-2.5h2V11H3v-1h3v2.5H4v.5h2v1H3zm2 5.5H3v-1h2V18H3v-1h3v4H3v-1h2v-.5zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"/></svg>
                </button>

                {{-- unorderded list --}}
                <button
                    type="button"
                    class="bg-gray-400 p-3 m-1 text-gray-700 dark:text-gray-300"
                    x-on:click="toggleList('bullet')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"/></svg>
                </button>

                {{-- insert image --}}
                <button
                    type="button"
                    class="bg-gray-400 p-3 m-1 text-gray-700 dark:text-gray-300"
                    x-on:click="uploadImage('{{ route('unisharp.lfm.show')}}')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                </button>

                {{-- insert link --}}
                <button
                    type="button"
                    class="bg-gray-400 p-3 m-1 text-gray-700 dark:text-gray-300"
                    x-on:click="addLink"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13.06 8.11l1.415 1.415a7 7 0 0 1 0 9.9l-.354.353a7 7 0 0 1-9.9-9.9l1.415 1.415a5 5 0 1 0 7.071 7.071l.354-.354a5 5 0 0 0 0-7.07l-1.415-1.415 1.415-1.414zm6.718 6.011l-1.414-1.414a5 5 0 1 0-7.071-7.071l-.354.354a5 5 0 0 0 0 7.07l1.415 1.415-1.415 1.414-1.414-1.414a7 7 0 0 1 0-9.9l.354-.353a7 7 0 0 1 9.9 9.9z"/></svg>
                </button>

                {{-- strike through --}}
                <button
                    type="button"
                    class="bg-gray-400 p-3 m-1 text-gray-700 dark:text-gray-300"
                    x-on:click="toggleStrikeThrough"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17.154 14c.23.516.346 1.09.346 1.72 0 1.342-.524 2.392-1.571 3.147C14.88 19.622 13.433 20 11.586 20c-1.64 0-3.263-.381-4.87-1.144V16.6c1.52.877 3.075 1.316 4.666 1.316 2.551 0 3.83-.732 3.839-2.197a2.21 2.21 0 0 0-.648-1.603l-.12-.117H3v-2h18v2h-3.846zm-4.078-3H7.629a4.086 4.086 0 0 1-.481-.522C6.716 9.92 6.5 9.246 6.5 8.452c0-1.236.466-2.287 1.397-3.153C8.83 4.433 10.271 4 12.222 4c1.471 0 2.879.328 4.222.984v2.152c-1.2-.687-2.515-1.03-3.946-1.03-2.48 0-3.719.782-3.719 2.346 0 .42.218.786.654 1.099.436.313.974.562 1.613.75.62.18 1.297.414 2.03.699z"/></svg>
                </button>

                {{-- blockquote --}}
                <button
                    type="button"
                    class="bg-gray-400 p-3 m-1 text-gray-700 dark:text-gray-300"
                    x-on:click="toggleBlockquote"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"/></svg>
                </button>

            </div>

            <div class="flex flex-wrap mb-3">
                {{-- insert table --}}
                <x-kit::button variant="rounded"
                               class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="addTable(3, 3)"
                >
                    insert table
                </x-kit::button>

                {{-- add column before --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="addTable(3, 3)"
                >
                    add column before
                </x-kit::button>

                {{-- add column after --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="addColumnAfter"
                >
                    add column after
                </x-kit::button>

                {{-- delete column --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="deleteColumn"
                >
                    delete column
                </x-kit::button>

                {{-- add row before --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="addRowBefore"
                >
                    add row before
                </x-kit::button>

                {{-- add row after --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="addRowAfter"
                >
                    add row after
                </x-kit::button>

                {{-- delete row --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="deleteRow"
                >
                    delete row
                </x-kit::button>

                {{-- delete table --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="deleteTable"
                >
                    delete table
                </x-kit::button>

                {{-- merge cell --}}
                <x-kit::button variant="rounded" class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                               x-on:click="mergeCells"
                >
                    merge cells
                </x-kit::button>

                {{-- split cell --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="splitCells"
                >
                    split cells
                </x-kit::button>

                {{-- toggle header column --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="toggleHeaderColumn"
                >
                    toggle header column
                </x-kit::button>

                {{-- toggle header row --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="toggleHeaderRow"
                >
                    toggle header row
                </x-kit::button>

                {{-- toggle header cell --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="toggleHeaderCell"
                >
                    toggle header cell
                </x-kit::button>

                {{-- merge or split --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click=mergeOrSplit
                >
                    merge or split
                </x-kit::button>

                {{-- fix tables --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="fixTable"
                >
                    fix table
                </x-kit::button>

                {{-- go to next cell --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="goToNextCell"
                >
                    go to next cell
                </x-kit::button>

                {{-- go to previous cell --}}
                <x-kit::button
                    variant="rounded"
                    class="bg-gray-800 dark:bg-gray-600 text-white text-sm"
                    x-on:click="goToPreviousCell"
                >
                    go to previous cell
                </x-kit::button>
            </div>

        </div>

        <div x-ref="editorReference"
             class="prose prose-sm max-w-none dark:prose-invert w-full bg-white dark:bg-gray-900"></div>
    </div>
</div>
