<div class="grid lg:grid-cols-1 gap-4">
    <x-ui.card class="w-full p-3 mt-3 bg-gray-100 dark:bg-gray-300"  style="height: 400px;">
        <div class="z-50">
            <ul class="flex">
                @foreach($rolesOptions as $role)
                    <div>
                        <input class="focus:border-secondary-400 rounded text-danger-500" type="checkbox" value="{{$role}}"
                               wire:model="roles"/>
                        <span class="text-gray-700">{{$role}}</span>
                    </div>
                @endforeach
            </ul>
        </div>
        <livewire:livewire-pie-chart
            key="{{ $pieChartModel->reactiveKey() }}"
            :pie-chart-model="$pieChartModel"
        />
    </x-ui.card>
</div>

@once
    @push("scripts")
        @livewireChartsScripts
    @endpush
@endonce
