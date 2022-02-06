<div {{$attributes->merge(['class'=>'bg-gradient-to-br from-gray-500 to-gray-700 text-gray-500 rounded-lg p-5 shadow-l'])}}>
   <div class="flex justify-between items-center">
       <div>
           <span class="text-sm capitalize text-warning-400">{{$title}}</span>
           <div class="mt-5">
               <span class="font-display text-gray-100 font-bold">{{$number}}</span>
           </div>
       </div>

       <div class="bg-danger-100 h-12 w-12 ring-4 ring-danger-400 p-5 rounded-xl flex items-center justify-center ml-5">
            {{$slot}}
       </div>
   </div>
</div>
