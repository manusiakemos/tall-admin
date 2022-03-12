<div wire:ignore>
    {{--    change to alpine and entangle--}}
    <x-kit::input type="text" id="{{  $attributes->get('id') }}-address" placeholder="Location Name"></x-kit::input>

    <div wire:ignore id="{{  $attributes->get('id') }}-map" class="w-full rounded-xl border-2 border-red-400 h-72 z-50 mt-4"></div>

    <div class="grid md:grid-cols-3 gap-4 mt-4">

        <x-kit::input wire:model="{{$radius}}" class="w-full" type="text" id="{{  $attributes->get('id') }}-radius"></x-kit::input>

        <x-kit::input wire:model="{{$lat}}" type="text" class="w-full" id="{{  $attributes->get('id') }}-lat"></x-kit::input>

        <x-kit::input wire:model="{{$lng}}" type="text" class="w-full" id="{{  $attributes->get('id') }}-lng"></x-kit::input>

    </div>
</div>

@push('styles')
    <style>
        .pac-container {
            z-index: 999999999999999;
        }
    </style>
@endpush

@push("scripts")
    <script type="text/javascript"
            data-turbolinks-eval="false"  data-turbo-eval="false"
            src="https://maps.google.com/maps/api/js?libraries=places&key={{config('tall-stack-kit.googlemap_api_key')}}"></script>
    <script  data-turbolinks-eval="false"  data-turbo-eval="false"
             src="{{ asset("vendor/location-picker/location-picker.js") }}"></script>
    <script  data-turbolinks-eval="false"  data-turbo-eval="false">
        Livewire.on("set_map", function (event) {
            // console.log('emit set map')
            $('#{{  $attributes->get('id') }}-map').locationpicker({
                location: {
                    latitude: event.lat,
                    longitude: event.lng
                },
                radius: event.radius,
                inputBinding: {
                    latitudeInput: $('#{{  $attributes->get('id') }}-lat'),
                    longitudeInput: $('#{{  $attributes->get('id') }}-lng'),
                    radiusInput: $('#{{  $attributes->get('id') }}-radius'),
                    locationNameInput: $('#{{  $attributes->get('id') }}-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                @this.set("{{$lat}}", currentLocation.latitude);
                @this.set("{{$lng}}", currentLocation.longitude);
                @this.set("{{$radius}}", radius);
                    // console.log(`Current Location = ${currentLocation}`);
                }
            });
        });
    </script>
@endpush
