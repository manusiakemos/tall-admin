<x-slot name="htmlTitle">
    <title>Profile Page</title>
</x-slot>

<main class="w-full flex-grow px-3 pb-5" xmlns:wire="http://www.w3.org/1999/xhtml" wire:ignore.self>
    <section class="content py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-kit::breadcrumb :items="$breadcrumbs"/>
        </div>
        <div class="mb-3">
            <div class="mb-5 lg:flex lg:items-start lg:justify-between">
                <h4 class="heading">Profile</h4>
            </div>
        </div>
        <x-kit::tabs class="tabs" :tab-headers="$tabHeaders" wire:model="tabActive">

            <x-slot name="edit">
                <form action="#" wire:submit.prevent="updateProfile">
                    <x-kit::form-group input-id="name" text-label="name" error-name="user.name">
                        <x-kit::input id="name" wire:model.lazy="user.name" placeholder="your name"/>
                    </x-kit::form-group>

                    <x-kit::form-group input-id="username" text-label="username" error-name="user.username">
                        <x-kit::input id="username" wire:model.lazy="user.username" placeholder="your username"/>
                    </x-kit::form-group>

                    <x-kit::form-group input-id="email" text-label="email" error-name="user.email">
                        <x-kit::input id="email" wire:model.lazy="user.email" placeholder="your email"/>
                    </x-kit::form-group>

                    <div class="py-3 flex">
                        <x-kit::button variant="rounded" class="bg-primary-500 text-white"
                            type="submit">
                            Save Changes
                        </x-kit::button>
                    </div>
                </form>
            </x-slot>

            <x-slot name="avatar">
                <form wire:submit.prevent="updateAvatar">
                    <x-kit::form-group input-id="image" text-label="" error-name="image">
                        <x-kit::file-upload id="image" wire:model.lazy="image"/>
                    </x-kit::form-group>
                    <div class="py-3 flex">
                        <x-kit::button variant="rounded" class="bg-primary-500 text-white"
                                       type="submit">
                            Save Changes
                        </x-kit::button>
                    </div>
                </form>
            </x-slot>

            <x-slot name="password">
                <form action="#" wire:submit.prevent="updatePassword">

                    <x-kit::form-group input-id="password" text-label="password" error-name="password">
                        <x-kit::input type="password" id="password" wire:model.lazy="password" placeholder="password"/>
                    </x-kit::form-group>

                    <x-kit::form-group input-id="password_confirmation" text-label="password confirmation" error-name="password_confirmation">
                        <x-kit::input type="password" id="password_confirmation" wire:model.lazy="password_confirmation" placeholder="password confirmation"/>
                    </x-kit::form-group>

                    <div class="py-3 flex">
                        <x-kit::button variant="rounded" class="bg-primary-500 text-white"
                                       type="submit">
                            Save Changes
                        </x-kit::button>
                    </div>
                </form>
            </x-slot>

        </x-kit::tabs>
    </section>
</main>

@push("scripts")
    @include("includes._toast-scripts")
@endpush
