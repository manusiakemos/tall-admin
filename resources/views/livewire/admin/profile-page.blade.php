<main class="w-full flex-grow px-3 pb-5" xmlns:wire="http://www.w3.org/1999/xhtml" wire:ignore.self>
    <section class="content py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-ui.breadcrumb :breadcrumbs="$breadcrumbs"></x-ui.breadcrumb>
        </div>
        <div class="mb-3">
            <div class="mb-5 lg:flex lg:items-start lg:justify-between">
                <h4 class="heading">Profile</h4>
            </div>
        </div>
        <x-ui.tabs class="tabs" :headers="$tabHeaders">

            <x-slot name="edit">
                <form action="#" wire:submit.prevent="updateProfile">
                    <x-input.form-group label="Name" key="id" model="user.name">
                        <x-input.text type="text" id="name" placeholder="enter name"
                                      wire:model.defer="user.name"></x-input.text>
                    </x-input.form-group>

                    <x-input.form-group label="Username" key="username" model="user.username">
                        <x-input.text type="text" id="username" placeholder="enter username"
                                      wire:model.defer="user.username"></x-input.text>
                    </x-input.form-group>

                    <x-input.form-group label="Email" key="email" model="user.email">
                        <x-input.text type="email" id="email" placeholder="enter email"
                                      wire:model.defer="user.email"></x-input.text>
                    </x-input.form-group>

                    <div class="py-3 flex">
                        <button class="btn bg-indigo-500 text-white ml-auto hover:bg-indigo-600 dark:bg-yellow-400 dark:text-gray-700"
                                type="submit">
                            Save Changes
                        </button>
                    </div>
                </form>
            </x-slot>

            <x-slot name="avatar">
                <form wire:submit.prevent="updateAvatar">
                    <x-input.form-group label="" key="id" model="model.id">
                        <x-input.filepond wire:model="image"></x-input.filepond>
                    </x-input.form-group>
                    <div class="py-3 flex">
                        <button class="btn bg-indigo-500 text-white ml-auto hover:bg-indigo-600 dark:bg-yellow-400 dark:text-gray-700"
                                type="submit">
                            Save
                            Changes
                        </button>
                    </div>
                </form>
            </x-slot>

            <x-slot name="password">
                <form action="#" wire:submit.prevent="updatePassword">
                    <x-input.form-group label="Password" key="password" model="password">
                        <x-input.text type="password" id="password"
                                      placeholder="enter password"
                                      wire:model="password"></x-input.text>
                    </x-input.form-group>
                    <x-input.form-group label="Password Confirmation" key="password_confirmation"
                                        model="password_confirmation">
                        <x-input.text type="password" id="password_confirmation"
                                      placeholder="enter password again"
                                      wire:model="password_confirmation"></x-input.text>
                    </x-input.form-group>

                    <div class="py-3 flex">
                        <button class="btn bg-indigo-500 text-white ml-auto hover:bg-indigo-600 dark:bg-yellow-400 dark:text-gray-700"
                                type="submit">
                            Save Changes</button>
                    </div>
                </form>
            </x-slot>
        </x-ui.tabs>
    </section>
</main>

@push("scripts")
    @include("includes._toast-scripts")
@endpush
