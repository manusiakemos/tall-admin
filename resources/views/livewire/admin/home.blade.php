<x-slot name="htmlTitle">
    <title>Dashboard</title>
</x-slot>

<main class="w-full flex-grow px-3 pb-5">
    <section class="content mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <h4 class="heading">Dashboard</h4>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @for($i=0; $i<4; $i++)
                <x-ui.widget-card title="Lorem ipsum" :number="2000000">
                    <span class="fi-rr-stats text-danger-500 text-lg"></span>
                </x-ui.widget-card>
            @endfor
        </div>

        {{-- dummy stats --}}
        {{-- <livewire:admin.user-stats/> --}}

        {{-- dummy text editor --}}
        {{--<livewire:admin.editor/> --}}

        {{-- component tester --}}
        {{--<livewire:admin.tester/>--}}
    </section>
</main>
