<div>
    <x-kit::modal id="modal_form" wire:model="showModalForm" size="md">
        <form action="#" wire:submit.prevent="save" class="p-3">
            <x-kit::form-group text-label="Title" input-id="slider_title" error-name="slider.slider_title">
                <x-kit::input id="slider_title" wire:model.defer="slider.slider_title"/>
            </x-kit::form-group>

            <x-kit::form-group text-label="Desc" input-id="slider_desc" error-name="slider.slider_desc">
                <x-kit::textarea id="slider_desc" wire:model.defer="slider.slider_desc"/>
            </x-kit::form-group>

            <x-kit::form-group text-label="Image" input-id="slider_image" error-name="slider.slider_image">
                <x-kit::file-upload id="slider_image" wire:model="myFile"/>
            </x-kit::form-group>

            <x-kit::form-group text-label="Status" input-id="slider_active" error-name="slider.slider_active">
                <x-kit::radio wire:model.defer="slider.slider_active"
                              :options="$options['slider_active']"
                              option-value="value"
                              option-text="text"/>
            </x-kit::form-group>


            <div class="md:flex place-content-end py-4">
                <x-kit::button
                    variant="rounded"
                    x-on:click="$wire.showModalForm = false"
                    class="bg-danger-500 hover:bg-danger-400 text-white">
                    {{ __('messages.close') }}
                </x-kit::button>
                <x-kit::button variant="rounded"
                               type="submit"
                               class="bg-primary-500 hover:bg-primary-400 text-white">
                    {{$updateMode ? __('messages.save_changes') : __('messages.save')}}
                </x-kit::button>
            </div>
        </form>
    </x-kit::modal>
</div>

