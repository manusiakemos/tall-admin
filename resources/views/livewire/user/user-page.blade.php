<x-slot name="htmlTitle">
    <title>User Management</title>
</x-slot>

<main class="w-full flex-grow px-3">
    <section class="content overflow-x-scroll rounded-lg overflow-y-scroll h-full mx-auto py-5 px-5">
        <div class="pb-3">
            <x-kit::breadcrumb :items="$breadcrumbs"/>
        </div>
        <div class="mb-3">
            <div class="mb-5 flex flex-grow flex-col md:flex-row items-center justify-center md:justify-between">
                <h4 class="heading mb-3 md:mb-0">User Management</h4>

                <div class="flex flex-wrap">
                    <x-kit::button wire:click="create"
                                   variant="rounded"
                                   class="font-semibold uppercase bg-primary-500 hover:bg-primary-400 text-white">
                        {{__('messages.add')}} User
                    </x-kit::button>
                    <x-kit::button variant="rounded"
                                   class="font-semibold uppercase bg-primary-500 hover:bg-primary-400 text-white"
                                   wire:click="$emit('refreshDt', true)">
                        {{__('messages.refresh_table')}}
                    </x-kit::button>
                </div>
            </div>

            <div>
                <x-kit::alert class="text-white bg-primary-500 mb-3 border-2 border-white" duration="3000"
                              wire:model="showAlert">{{$alertMessage}}
                </x-kit::alert>

                <x-kit::toast class="text-white bg-primary-500 mb-3 border-2 border-white" duration="3000"
                              wire:model="showToast">{{$toastMessage}}
                </x-kit::toast>

                <livewire:user.user-table/>

                @include('livewire.user._user-form')

                @include('livewire.user._user-confirm')
            </div>

        </div>
    </section>
</main>

@push("scripts")
    <script>
        Livewire.on("confirmDestroy", (id) => {
            @this.set('showModalConfirm', true);
            @this.set('user.user_id', id);
        });
        Livewire.on("refreshDt", (showNoty = false) => {
            Livewire.components.getComponentsByName('user.user-table')[0].$wire.$refresh();
            if (showNoty) {
                @this.set('showToast', true);
                @this.set('toastMessage', 'Data berhasil di refresh');
            }
        });
    </script>
@endpush

