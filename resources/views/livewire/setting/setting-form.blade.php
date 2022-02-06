<main class="w-full flex-grow px-3">
    <section class="content overflow-x-scroll rounded-lg overflow-y-scroll h-full mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-ui.breadcrumb :breadcrumbs="$breadcrumbs"></x-ui.breadcrumb>
        </div>
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg">
            <div class="mb-5 flex items-center justify-between md:justify-between">
                <h4 class="heading mb-3 md:mb-0">
                    {{$updateMode ? "Edit Setting" : "Tambah Setting"}}
                </h4>

                <x-ui.button class="bg-danger-500 text-white hover:bg-danger-400"
                                wire:click="back"
                                variant="circle">
                    <span class="flex justify-center items-center fi-rr-cross"></span>
                </x-ui.button>
            </div>

            <div>
                <form wire:submit.prevent="save" class="p-3">

                    <div>
                        <x-input.form-group label="Nama" key="setting_name" model="setting.setting_name">
                            <x-input.text id="Nama" wire:model.defer="setting.setting_name"></x-input.text>
                        </x-input.form-group>

                        <x-input.form-group label="Type" key="setting_input" model="setting.setting_input">
                            <x-input.select method="select_setting_input" wire:model="setting.setting_input"
                                            :select2="false"></x-input.select>
                        </x-input.form-group>

                        @if($this->updateMode)
                            @if($setting['setting_input'] === 'text')
                                <x-input.form-group label="{{$setting['setting_name']}}" key="setting_value"
                                                    model="setting.setting_value">
                                    <x-input.text id="value"
                                                  wire:key="settingInputText"
                                                  wire:model.defer="setting.setting_value"></x-input.text>
                                </x-input.form-group>
                            @elseif($setting['setting_input'] === 'textarea')
                                <x-input.form-group label="{{$setting['setting_name']}}" key="setting_value"
                                                    model="setting.setting_value">
                                    <x-input.textarea id="value"
                                                      wire:key="settingInputTextarea"
                                                      wire:model.defer="setting.setting_value"></x-input.textarea>
                                </x-input.form-group>
                            @elseif($setting['setting_input'] === 'file')
                                <x-input.form-group label="{{$setting['setting_name']}}" key="setting_value"
                                                    model="setting.setting_value">
                                    <x-input.filepond
                                        data-event-name="eventName"
                                        wire:key="settingImage"
                                        wire:model="image"></x-input.filepond>
                                </x-input.form-group>
                            @elseif($setting['setting_input'] === 'switch')
                                <x-input.form-group label="{{$setting['setting_name']}}" key="setting_value"
                                                    model="setting.setting_value">
                                    <x-input.toggle-switch method="bool"
                                                           id="value"
                                                           wire:key="settingInputSwitch"
                                                           wire:model="setting.setting_value"></x-input.toggle-switch>
                                </x-input.form-group>
                            @elseif($setting['setting_input'] === 'radio')
                                <x-input.form-group label="{{$setting['setting_name']}}" key="setting_value"
                                                    model="setting.setting_value">
                                    <x-input.radio method="bool" id="Value"
                                                   wire:key="setValueRadio"
                                                   wire:model.defer="setting.setting_value"></x-input.radio>
                                </x-input.form-group>
                            @endif
                        @endif

                        @if(auth()->user()->role == 'super-admin')

                            <x-input.form-group label="Removable" key="setting_removable"
                                                model="setting.setting_removable">
                                <x-input.radio method="select_setting_removable"
                                               wire:key="setRemovable"
                                               wire:model.defer="setting.setting_removable"
                                               :select2="false"></x-input.radio>
                            </x-input.form-group>

                        @endif

                    </div>

                    <div class="flex place-content-end py-4">
                        <x-ui.button
                            wire:click="back"
                            class="bg-danger-500 hover:bg-danger-400 text-white hover:bg-primary-400">
                            Kembali
                        </x-ui.button>
                        <x-ui.button type="submit" class="bg-secondary-500 hover:bg-secondary-400 text-white hover:bg-primary-400"
                                       >
                            {{$updateMode ? "Simpan Perubahan" : "Simpan"}}
                        </x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@push("scripts")

    @include("includes._toast-scripts")

@endpush
