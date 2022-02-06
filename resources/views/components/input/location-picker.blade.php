<div wire:ignore>
    {{--    change to alpine and entangle--}}
    <x-input.text type="text" id="{{  $attributes->get('id') }}-address" placeholder="Masukkan Nama Lokasi"></x-input.text>

    <div wire:ignore id="{{  $attributes->get('id') }}-map" class="w-full rounded-xl border-2 border-red-400 h-72 z-50 mt-4"></div>

    <div class="grid md:grid-cols-3 gap-4 mt-4">

        <x-input.text wire:model="{{$radius}}" class="w-full" type="text" id="{{  $attributes->get('id') }}-radius"></x-input.text>

        <x-input.text wire:model="{{$lat}}" type="text" class="w-full" id="{{  $attributes->get('id') }}-lat"></x-input.text>

        <x-input.text wire:model="{{$lng}}" type="text" class="w-full" id="{{  $attributes->get('id') }}-lng"></x-input.text>

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
            src="https://maps.google.com/maps/api/js?libraries=places&key={{config('app.googlemap_api_key')}}"></script>
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
