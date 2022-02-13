<div>
    <x-ui.modal id="modal_form" wire:model="showModalForm" size="md" :title="$updateMode ? 'Edit' : 'Create'">
        <form action="#" wire:submit.prevent="save" class="p-3">
            <x-input.validation-error/>

            <x-input.form-group label="Title" key="slider_title" model="slider.slider_title">
                <x-input.text id="Title" wire:model.defer="slider.slider_title"/>
            </x-input.form-group>

            <x-input.form-group label="Desc" key="slider_desc" model="slider.slider_desc">
                <x-input.textarea id="Desc" wire:model.defer="slider.slider_desc"/>
            </x-input.form-group>

            <x-input.form-group label="Image" key="image" model="image">
                <x-input.file id="image" wire:model="image"/>
            </x-input.form-group>

            <x-input.form-group label="Status" key="slider_active" model="slider.slider_active">
                <x-input.custom-select2
                    placeholder="Pilih status"
                    id="slider_active"
                    wire:model="slider.slider_active"
                    :options="$options['slider_active']"
                    text="text"
                    value="value"/>
            </x-input.form-group>


            <div class="md:flex place-content-end py-4">
                <x-ui.button
                    x-on:click="$wire.showModalForm = false"
                    class="bg-danger-500 hover:bg-danger-400 text-white hover:bg-primary-400">
                    Tutup
                </x-ui.button>
                <x-ui.button type="submit" class="bg-secondary-500 hover:bg-secondary-400 text-white hover:bg-primary-400"
                            >
                    {{$updateMode ? "Simpan Perubahan" : "Simpan"}}
                </x-ui.button>
            </div>
        </form>
    </x-ui.modal>
</div>

