<div class="rounded-full p-3 h-12 w-12 flex items-center justify-center"
     x-data="{showDarkMode:false}">
    <div class="relative flex flex-col items-center justify-center">
        <button x-on:click="showDarkMode = !showDarkMode" class="cursor-pointer">
            <span :class="{'fi-rr-moon' : theme_icon == 'dark',
                            'fi-rr-sun' : theme_icon == 'light',
                            'fi-rr-computer' : theme_icon == 'system' || !theme_icon
                           }"
                class="text-3xl flex items-center hover:text-warning-400"></span>
        </button>

        <div x-show="showDarkMode"
             x-on:click.away="showDarkMode = !showDarkMode"
            class="absolute top-10 left-0 md:-left-12
                   rounded-xl px-6 py-3
                   h-auto w-auto shadow-xl
                   text-gray-700 dark:text-gray-100
                   bg-gray-100 dark:bg-gray-900 z-50">
            <ul class="w-full h-full">
                <li x-on:click="theme = 'light'; theme_icon = 'light' ;showDarkMode = !showDarkMode"
                    class="flex items-center justify-start cursor-pointer hover:text-primary-400">
                    <span class="fi-rr-sun text-2xl mr-3"></span> Light
                </li>
                <li x-on:click="theme = 'dark'; theme_icon = 'dark' ;showDarkMode = !showDarkMode"
                    class="flex items-center justify-start cursor-pointer hover:text-primary-400">
                    <span class="fi-rr-moon text-2xl mr-3"></span> Dark
                </li>
                <li x-on:click="theme = 'system'; theme_icon = 'system' ;showDarkMode = !showDarkMode"
                    class="flex items-center justify-start cursor-pointer hover:text-primary-400">
                    <span class="fi-rr-computer text-2xl mr-3"></span> System
                </li>
            </ul>
        </div>
    </div>
</div>
