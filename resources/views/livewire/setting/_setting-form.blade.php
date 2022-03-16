<div>
    <x-kit::modal id="modal_form" wire:model="showModalForm" size="md" :title="$updateMode ? 'Edit' : 'Create'">
        <form action="#" wire:submit.prevent="save" class="p-3">
            <x-kit::form-group text-label="Name" input-id="setting_name" error-name="setting.setting_name">
                <x-kit::input id="setting_name" wire:model.defer="setting.setting_name"/>
            </x-kit::form-group>

            <x-kit::form-group text-label="Setting Input type" input-id="setting_input"
                               error-name="setting.setting_input">
                <x-kit::select-search wire:model="setting.setting_input"
                                      :options="$options['input_types']"
                                      placeholder="select an input type"
                                      option-value="value"
                                      option-text="text"/>
            </x-kit::form-group>


            @if($updateMode)
                <x-kit::form-group text-label="Value" input-id="setting_value" error-name="setting.setting_value">
                    @if($setting['setting_input'] == 'text')
                        <x-kit::input type="text" id="setting_value" wire:model="setting.setting_value"/>
                    @elseif($setting['setting_input'] == 'file')
                        <x-kit::file-upload id="image" wire:model="image"></x-kit::file-upload>
                    @elseif($setting['setting_input'] == 'textarea')
                        <x-kit::textarea id="setting_value" wire:model="setting.setting_value"></x-kit::textarea>
                    @elseif($setting['setting_input'] == 'switch')
                        <x-kit::toggle wire:model="setting.setting_value"/>
                    @endif
                </x-kit::form-group>
            @endif

            @role('super-admin')
            <x-kit::form-group text-label="Removable" input-id="setting_removable"
                               error-name="setting.setting_removable">
                <x-kit::toggle id="setting_removable" wire:model="setting.setting_removable"/>
            </x-kit::form-group>
            @endrole


            <div class="md:flex place-content-end py-4">
                <x-kit::button variant="rounded"
                               x-on:click="$wire.showModalForm = false"
                               class="bg-danger-500 hover:bg-danger-400 text-white">
                    {{ __('messages.close') }}
                </x-kit::button>
                <x-kit::button variant="rounded" type="submit" class="bg-primary-500 hover:bg-primary-400 text-white">
                    {{$updateMode ? __('messages.save_changes') : __('messages.save')}}
                </x-kit::button>
            </div>
        </form>
    </x-kit::modal>
</div>

