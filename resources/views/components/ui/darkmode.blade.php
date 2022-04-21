<div class="rounded-full p-3 h-12 w-12 flex items-center justify-center"
     x-data="{showDarkMode:false}">
    <div class="relative flex flex-col items-center justify-center mr-3">
        <button x-on:click="showDarkMode = !showDarkMode" class="cursor-pointer">
            <div x-show="theme_icon === 'light'">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path class="dark:fill-white"
                          d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"/>
                </svg>
            </div>
            <div x-show="theme_icon === 'dark'">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path class="dark:fill-white"
                          d="M10 7a7 7 0 0 0 12 4.9v.1c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2h.1A6.979 6.979 0 0 0 10 7zm-6 5a8 8 0 0 0 15.062 3.762A9 9 0 0 1 8.238 4.938 7.999 7.999 0 0 0 4 12z"/>
                </svg>
            </div>
            <div x-show="theme_icon === 'system'">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path class="dark:fill-white"
                          d="M4 16h16V5H4v11zm9 2v2h4v2H7v-2h4v-2H2.992A.998.998 0 0 1 2 16.993V4.007C2 3.451 2.455 3 2.992 3h18.016c.548 0 .992.449.992 1.007v12.986c0 .556-.455 1.007-.992 1.007H13z"/>
                </svg>
            </div>
        </button>

        <div x-show="showDarkMode"
             style="display: none"
             x-on:click.away="showDarkMode = !showDarkMode"
             class="absolute top-10 left-0 md:-left-12
                   rounded-xl px-6 py-3
                   h-auto w-auto shadow-xl
                   text-gray-700 dark:text-gray-100
                   bg-gray-100 dark:bg-gray-900 z-50">
            <ul class="w-full h-full">
                <li x-on:click="theme = 'light'; theme_icon = 'light' ;showDarkMode = !showDarkMode"
                    class="flex items-center justify-start cursor-pointer hover:text-primary-400 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path class="dark:fill-white"
                              d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"/>
                    </svg>
                    <span class="ml-1">Light</span>
                </li>
                <li x-on:click="theme = 'dark'; theme_icon = 'dark' ;showDarkMode = !showDarkMode"
                    class="flex items-center justify-start cursor-pointer hover:text-primary-400 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path class="dark:fill-white"
                              d="M10 7a7 7 0 0 0 12 4.9v.1c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2h.1A6.979 6.979 0 0 0 10 7zm-6 5a8 8 0 0 0 15.062 3.762A9 9 0 0 1 8.238 4.938 7.999 7.999 0 0 0 4 12z"/>
                    </svg>
                    <span class="ml-1">Dark</span>
                </li>
                <li x-on:click="theme = 'system'; theme_icon = 'system' ;showDarkMode = !showDarkMode"
                    class="flex items-center justify-start cursor-pointer hover:text-primary-400 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path class="dark:fill-white"
                              d="M4 16h16V5H4v11zm9 2v2h4v2H7v-2h4v-2H2.992A.998.998 0 0 1 2 16.993V4.007C2 3.451 2.455 3 2.992 3h18.016c.548 0 .992.449.992 1.007v12.986c0 .556-.455 1.007-.992 1.007H13z"/>
                    </svg>
                    <span class="ml-1">System</span>
                </li>
            </ul>
        </div>
    </div>
</div>
