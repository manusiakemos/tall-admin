<div>
   <x-kit::modal id="modalForm" max-width="4xl" wire:model="showModalForm">
       <h4 class="heading mx-3 my-3">{{$updateMode ? 'Edit User' : 'Tambah User'}}</h4>
       <form action="#" wire:submit.prevent="save" class="p-3">

           <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
               <x-kit::form-group input-id="name" text-label="name" error-name="user.name">
                   <x-kit::input id="name" wire:model.lazy="user.name" placeholder="your name"/>
               </x-kit::form-group>

               <x-kit::form-group input-id="username" text-label="username" error-name="user.username">
                   <x-kit::input id="username" wire:model.lazy="user.username" placeholder="your name"/>
               </x-kit::form-group>

               <x-kit::form-group input-id="email" text-label="email" error-name="user.email">
                   <x-kit::input id="email" wire:model.lazy="user.email" placeholder="your email"/>
               </x-kit::form-group>
           </div>
           <div class="flex justify-end py-4">
               <x-kit::button
                   variant="rounded"
                   x-on:click="$wire.showModalForm = false"
                   class="bg-danger-500 hover:bg-danger-400 text-white hover:bg-primary-400">
                  {{ __('messages.close') }}
               </x-kit::button>
               <x-kit::button
                   variant="rounded"
                   type="submit" class="bg-primary-500 hover:bg-secondary-400 text-white hover:bg-primary-400">
                   {{$updateMode ? __('messages.save_changes') : __('messages.save')}}
               </x-kit::button>
           </div>
       </form>
   </x-kit::modal>
</div>

