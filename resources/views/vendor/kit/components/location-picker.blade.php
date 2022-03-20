@props(['lat' => 'lat' , 'lng' => 'lng','radius' => 'radius'])
<div wire:ignore>
    {{--    change to alpine and entangle--}}
    <x-kit::input type="text" id="{{  $attributes->get('id') }}-address" placeholder="Location Name"></x-kit::input>

    <div wire:ignore id="{{  $attributes->get('id') }}-map" class="w-full rounded-xl border-2 border-red-400 h-72 z-50 mt-4"></div>

    <div class="grid md:grid-cols-3 gap-4 mt-4">

        <x-kit::input placeholder="radius" wire:model="{{$radius}}" class="w-full" type="text" id="{{  $attributes->get('id') }}-radius"></x-kit::input>

        <x-kit::input placeholder="latitude" wire:model="{{$lat}}" type="text" class="w-full" id="{{  $attributes->get('id') }}-lat"></x-kit::input>

        <x-kit::input placeholder="longitude" wire:model="{{$lng}}" type="text" class="w-full" id="{{  $attributes->get('id') }}-lng"></x-kit::input>

    </div>
</div>

@push("scripts")
    <script type="text/javascript"
            data-turbolinks-eval="false"  data-turbo-eval="false"
            src="https://maps.google.com/maps/api/js?v=47&libraries=places&key={{config('tall-stack-kit.googlemap_api_key')}}"></script>
    <script  data-turbolinks-eval="false"  data-turbo-eval="false"
             src="{{ asset("vendor/location-picker/location-picker.js") }}"></script>
    <script  data-turbolinks-eval="false"  data-turbo-eval="false">
        Livewire.on("set_map", function (event) {
            var customStyles = [{
                "elementType": "geometry",
                "stylers": [{"hue": "#ff4400"}, {"saturation": -68}, {"lightness": -4}, {"gamma": 0.72}]
            }, {"featureType": "road", "elementType": "labels.icon"}, {
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [{"hue": "#0077ff"}, {"gamma": 3.1}]
            }, {
                "featureType": "water",
                "stylers": [{"hue": "#00ccff"}, {"gamma": 0.44}, {"saturation": -33}]
            }, {
                "featureType": "poi.park",
                "stylers": [{"hue": "#44ff00"}, {"saturation": -23}]
            }, {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [{"hue": "#007fff"}, {"gamma": 0.77}, {"saturation": 65}, {"lightness": 99}]
            }, {
                "featureType": "water",
                "elementType": "labels.text.stroke",
                "stylers": [{"gamma": 0.11}, {"weight": 5.6}, {"saturation": 99}, {"hue": "#0091ff"}, {"lightness": -86}]
            }, {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [{"lightness": -48}, {"hue": "#ff5e00"}, {"gamma": 1.2}, {"saturation": -23}]
            }, {
                "featureType": "transit",
                "elementType": "labels.text.stroke",
                "stylers": [{"saturation": -64}, {"hue": "#ff9100"}, {"lightness": 16}, {"gamma": 0.47}, {"weight": 2.7}]
            }];
            $('#{{  $attributes->get('id') }}-map').locationpicker({
                location: {
                    latitude: parseFloat(event.latitude),
                    longitude: parseFloat(event.longitude),
                },
                radius: event.radius,
                inputBinding: {
                    latitudeInput: $('#{{  $attributes->get('id') }}-lat'),
                    longitudeInput: $('#{{  $attributes->get('id') }}-lng'),
                    radiusInput: $('#{{  $attributes->get('id') }}-radius'),
                    locationNameInput: $('#{{  $attributes->get('id') }}-address')
                },
                enableAutocomplete: true,
                styles: customStyles,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    @this.set("{{$lat}}", currentLocation.latitude);
                    @this.set("{{$lng}}", currentLocation.longitude);
                    @this.set("{{$radius}}", radius);
                    console.log(`Current Location lat = ${currentLocation.latitude}`);
                    console.log(`Current Location lng = ${currentLocation.longitude}`);
                }
            });
        });
    </script>
@endpush
