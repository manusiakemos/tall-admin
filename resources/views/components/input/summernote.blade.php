<div wire:ignore class="text-gray-700 dark:text-gray-300">
    <textarea
        @refresh.window="initSummerNote{!! $attributes->get('id') !!}()"
        x-init="initSummerNote{!! $attributes->get('id') !!}"
        x-on:click.outside="setValue"
        x-data="{
                content : @entangle($attributes->wire('model'))
            }"
       {!! $attributes->whedangeroesntStartWith('wire:model') !!}
    ></textarea>
</div>


@once
    @push("styles")
        <link href="{{asset('vendor/summernote/summernote-lite.css')}}" rel="stylesheet">
    @endpush

    @push("scripts")
        <script data-turbolinks-eval="false"  data-turbo-eval="false" src="{{asset('vendor/summernote/summernote-lite.js')}}"></script>
    @endpush
@endonce



@push("scripts")
    <!-- summernote script -->
    <script data-turbolinks-eval="false"  data-turbo-eval="false">
        let lfm{{$attributes->get('id')}} = function (options, cb) {
            let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        /*  let LFMButtonImage{{$attributes->get('id')}} = function (context) {
            let ui = $.summernote.ui;
            let button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                container: context.layoutInfo.editor,
                click: function () {
                    lfm{{$attributes->get('id')}}({type: 'image', prefix: '/laravel-filemanager'}, function (lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });
                }
            });
            return button.render();
        };

        let LFMButtonFile{{$attributes->get('id')}} = function (context) {
            let ui = $.summernote.ui;
            let button = ui.button({
                contents: '<i class="fi fi-rr-file-add flex items-center" style="height:20px;"></i> ',
                tooltip: 'Insert file with filemanager',
                container: context.layoutInfo.editor,
                click: function () {
                    context.invoke('saveRange');
                    lfm{{$attributes->get('id')}}({type: 'file', prefix: '/laravel-filemanager'}, function (lfmItems, path) {
                        context.invoke('restoreRange');
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('pasteHTML', `<iframe height="500" width="100%" src="${lfmItem.url}"></iframe>`);
                        });
                    });
                }
            });
            return button.render();
        };*/

        function initSummerNote{!! $attributes->get('id') !!}() {
            this.sn = $('#{!! $attributes->get('id') !!}').summernote({
                callbacks: {
                    onChange: function (contents) {
                        this.content = contents
                    @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', contents);
                    },
                },
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'lfm_file', 'lfm_image', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                /* buttons: {
                     lfm_image: LFMButtonImage{{$attributes->get('id')}},
                    lfm_file: LFMButtonFile{{$attributes->get('id')}}
                }*/
            });

            /* this.$watch('content', (value) => {
                 @this.set("{!! $attributes->wire('model') !!}", value);
            });*/
        }

        window.Livewire.on("{{$attributes['data-event-name']}}", () => {
            console.log('emit summernote {{$attributes['data-event-name']}}')
            $('#{{$attributes->get('id')}}').summernote('code', @this.get('{!! $attributes->wire('model') !!}'));
        });
    </script>
@endpush
