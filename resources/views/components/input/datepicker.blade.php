<div>
    <input
        class="datepicker mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent focus:border-secondary-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0 text-sm text-gray-700 dark:text-gray-200"
        x-data="{ value: @entangle($attributes->wire('model')), picker: undefined }"
        x-ref="input"
        x-model="value"
        x-init="new Pikaday(
           {
              field: $refs.input,
              format: 'YYYY-MM-DD',
              onSelect: (date) => {
                let dt = moment(date).format('YYYY-MM-DD');
                $dispatch('input', dt);
              }
           }
        )"
        autocomplete="off"
        type="text"
        {{ $attributes }}
    >
</div>
