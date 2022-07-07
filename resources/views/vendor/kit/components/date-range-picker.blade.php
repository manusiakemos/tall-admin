<div class="py-6" wire:ignore
     x-data="{
        selected : @entangle($attributes->wire('model')),
        value: [moment().subtract(30, 'days'), moment()],
        init() {
            if(Array.isArray(this.selected)){
                this.value = [
                   moment(this.selected[0]), moment(this.selected[1])
                ];
            }
            $(this.$refs.input).daterangepicker({
                startDate: this.value[0],
                endDate: this.value[1],
                locale: {
                    format: '{!! $attributes->get("date-format") ?? "YYYY-MM-DD" !!}'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
            }, (start, end) => {
                this.value[0] = start.format('{!! $attributes->get("date-format") ?? "YYYY-MM-DD" !!}')
                this.value[1] = end.format('{!! $attributes->get("date-format") ?? "YYYY-MM-DD" !!}')
            })
            this.$watch('value', () => {
                $(this.$refs.input).data('daterangepicker').setStartDate(this.value[0])
                $(this.$refs.input).data('daterangepicker').setEndDate(this.value[1])
                $dispatch('input', this.value);
                this.selected = [this.value[0], this.value[1]];
            })
        },
    }"
>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                        class="dark:fill-white"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <x-kit::input type="text" x-ref="input" class="pl-12 w-full"/>
    </div>
</div>

@push("scripts")
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endpush
