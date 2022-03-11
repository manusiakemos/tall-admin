<div>
   <x-ui.modal id="modal_form" wire:model="showModalForm" size="md" :title="$updateMode ? 'Edit' : 'Create'">
       <form action="#" wire:submit.prevent="save" class="p-3">
            <x-kit::form-group text-label="Title" input-id="slider_title" error-name="slider.slider_title">
                    <x-kit::input id="slider_title" wire:model.defer="slider.slider_title"/>
                </x-kit::form-group>

    <x-kit::form-group text-label="Desc" input-id="slider_desc" error-name="slider.slider_desc">
                    <x-kit::input id="slider_desc" wire:model.defer="slider.slider_desc"/>
                </x-kit::form-group>

    <x-kit::form-group text-label="Image" input-id="slider_image" error-name="slider.slider_image">
                    <x-kit::file-upload id="slider_image" wire:model="myFile"/>
                </x-kit::form-group>

    <x-kit::form-group text-label="Status" input-id="slider_active" error-name="slider.slider_active">
                    <x-kit::radio  wire:model.defer="slider.slider_active"
                             :options="$options['slider_active']"
                             option-value="value"
                             option-text="text"/>
                </x-kit::form-group>



           <div class="md:flex place-content-end py-4">
               <x-ui.button
                   x-on:click="$wire.showModalForm = false"
                   class="bg-danger-500 hover:bg-danger-400 text-white">
                   Tutup
               </x-ui.button>
               <x-ui.button type="submit" class="bg-primary-500 hover:bg-primary-400 text-white"
                           >
                   {{$updateMode ? "Simpan Perubahan" : "Simpan"}}
               </x-ui.button>
           </div>
       </form>
   </x-ui.modal>
</div>

