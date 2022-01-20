<div>
   <x-ui.modal id="modal_form" wire:model="showModalForm" size="md" :title="$updateMode ? 'Edit' : 'Create'">
       <form action="#" wire:submit.prevent="save" class="p-3">
            <x-input.validation-error/>
           <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
               <x-input.form-group class="form-group" label="Nama" key="nama" model="user.name">
                   <x-input.text id="nama" wire:model.defer="user.name"></x-input.text>
               </x-input.form-group>

               <x-input.form-group class="form-group" label="Username" key="username" model="user.username">
                   <x-input.text id="username" wire:model.defer="user.username"></x-input.text>
               </x-input.form-group>

               <x-input.form-group class="form-group" label="Email" key="email" model="user.email">
                   <x-input.text id="email" wire:model.defer="user.email" type="email"></x-input.text>
               </x-input.form-group>

               <x-input.form-group class="form-group" label="Role" key="role" model="user.role">
                   <x-input.custom-select2
                       id="role"
                       wire:model="user.role"
                       :options="$options['role']"
                       text="text"
                       value="value"/>
               </x-input.form-group>

<!--               <x-input.form-group class="form-group" label="birthplace" key="birthplace"
                                   model="user.birthplace">
                   <x-input.text id="birthplace" wire:model.defer="user.birthplace"/>
               </x-input.form-group>

               <x-input.form-group class="form-group" label="birthdate" key="birthdate"
                                   model="user.birthdate">
                   <x-input.text type="date" id="birthdate" wire:model.defer="user.birthdate"/>
               </x-input.form-group>-->
           </div>

<!--           <x-input.form-group class="form-group" label="address" key="address" model="user.address">
               <x-input.textarea id="address"
                                 wire:key="userAddress"
                                 wire:model.defer="user.address"></x-input.textarea>
           </x-input.form-group>

           <x-input.form-group class="form-group" label="About" key="about" model="user.about">
               <x-input.textarea id="about"
                                 wire:key="userAbout"
                                 wire:model.defer="user.about"></x-input.textarea>
           </x-input.form-group>

           <x-input.form-group class="form-group" label="Active" key="role" model="user.active">
               <x-input.radio method="bool" wire:model.defer="user.active"></x-input.radio>
           </x-input.form-group>-->

<!--           <x-input.form-group class="form-group" label="Avatar" key="avatar" model="image">
               <x-input.filepond data-event-name="setAvatar" wire:key="setAvatar"
                                 wire:model="image"></x-input.filepond>
           </x-input.form-group>-->

           <div class="md:flex place-content-end py-4">
               <x-ui.button
                   x-on:click="$wire.showModalForm = false"
                   class="bg-red-500 hover:bg-red-400 text-white hover:bg-blue-400">
                   Tutup
               </x-ui.button>
               <x-ui.button type="submit" class="bg-indigo-500 hover:bg-indigo-400 text-white hover:bg-blue-400">
                   {{$updateMode ? "Simpan Perubahan" : "Simpan"}}
               </x-ui.button>
           </div>
       </form>
   </x-ui.modal>
</div>

