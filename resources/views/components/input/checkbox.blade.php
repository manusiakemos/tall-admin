<div x-data="{
                    selected : @entangle($attributes->wire('model')),
                    options : {{$options}}
    }">
    <template x-for="i in options">
        <div>
            <input class="focus:border-secondary-400 rounded text-danger-500" type="checkbox" :id="i.value" :value="i.value" x-model="selected">
            <label :for="i.value" x-text="i.text"></label>
        </div>
    </template>

</div>
