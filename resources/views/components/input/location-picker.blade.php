<div wire:ignore>
    <x-input.form-group label="Temukan Lokasi" key="address" model="location.address">
        <x-input.text type="text" id="us3-address" placeholder="Masukkan Nama Lokasi"></x-input.text>
    </x-input.form-group>

    <x-input.form-group class="form-group" label="Radius" key="radius" model="location.radius">
        <x-input.text wire:model="location.radius" type="text" id="us3-radius"></x-input.text>
    </x-input.form-group>

    <div id="us3" class="w-full rounded-xl border-2 border-danger-400 h-72"></div>

    <x-input.form-group label="Lat" key="lat" model="location.lat">
        <x-input.text wire:model="location.lat" type="text" class="w-auto" id="us3-lat"></x-input.text>
    </x-input.form-group>

    <x-input.form-group label="Lng" key="lng" model="location.lng">
        <x-input.text wire:model="location.lng" type="text" class="w-auto" id="us3-lng"></x-input.text>
    </x-input.form-group>
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
            $('#us3').locationpicker({
                location: {
                    latitude: event.location.lat,
                    longitude: event.location.lng
                },
                radius: event.location.radius,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lng'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    @this.set("location.lat", currentLocation.latitude);
                    @this.set("location.lng", currentLocation.longitude);
                    @this.set("location.radius", radius);
                    console.log(`Current Location = ${currentLocation}`);
                }
            });
        });
    </script>
@endpush
