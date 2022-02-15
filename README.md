# TALL Admin

> Admin Page With Tailwind Alpine Laravel Livewire  + Reusable components

## Features

### Crud Generator

​	![screencapture-127-0-0-1-8000-crud-2021-11-15-01_11_46](https://tva1.sinaimg.cn/large/008i3skNgy1gwf6mg48daj317d0u0wh9.jpg)![]()

### Chart

![](https://tva1.sinaimg.cn/large/008i3skNgy1gwe04iakuvj31fb0u00vo.jpg)

### Data Table

![](https://tva1.sinaimg.cn/large/008i3skNgy1gwdd7d76rgj31gk0u0q5w.jpg)

### Dark Mode

![](https://tva1.sinaimg.cn/large/008i3skNgy1gwddceyzauj31kh0u0div.jpg)

### Form

![](https://tva1.sinaimg.cn/large/008i3skNgy1gwddeu8yawj30w10u0q4w.jpg)

## Installation

### Clone Repo

```bash
git clone https://github.com/manusiakemos/tall-admin.git
```

### Run Command

```bash
cd tall-admin

composer i

cp .env.example .env
#configure .env variables

php artisan key:generate

npm i

npm run prod 
#or npm run dev for development

php artisan migrate

php artisan storage:link

php artisan db:seed
```

> make sure to upload to your hosting to make sure it works

## Seeder

```bash
#to seed user data
php artisan db:seed --class=UserSeeder

#to seed laravolt data
php artisan laravolt:indonesia:seed
```

## 3rd party plugins

#### Laravel & Livewire  Packages

[Livewire Modal](https://github.com/wire-elements/modal)

[Livewire Charts](https://github.com/asantibanez/livewire-charts)

[Laravel Schematics](https://github.com/mtolhuys/laravel-schematics)

[Laravolt Indonesia](https://github.com/laravolt/indonesia)

[Livewire](https://github.com/livewire/livewire)

[Rappasoft Datatables](https://github.com/rappasoft/laravel-livewire-tables)

[Spatie Media Library](https://github.com/spatie/laravel-medialibrary)

[Pretty Routes](https://github.com/garygreen/pretty-routes)

[IDE Helper](https://github.com/barryvdh/laravel-ide-helper)

[Debugbar](https://github.com/barryvdh/laravel-debugbar)

[Web Tinker](https://github.com/spatie/laravel-web-tinker)

[Livewire Sortable](https://github.com/livewire/sortable)

#### Js Libraries

[Filepond](https://pqina.nl/filepond/docs/)

[Noty JS](https://ned.im/noty/#/confirm)

[Alpine JS](https://alpinejs.dev/) v3.2.2

[jQuery](https://jquery.com/)

[Select2](https://select2.org/)

[Metismenu](https://github.com/onokumus/metismenu)

[Axios](https://github.com/axios/axios)

[Lodash](https://lodash.com/)

[Apex Charts](https://apexcharts.com/)

[jQuery Mask Plugin](https://igorescobar.github.io/jQuery-Mask-Plugin/)

#### CSS Libraries

[LineIcons](https://lineicons.com/docs/)

[uicons](https://www.flaticon.com/uicons)

[Tailwind CSS](https://tailwindcss.com/docs)

## Events & Listener

#### Toast

```php
$this->emit("showToast", ["message" => "", "type" => "success", "reload"=>false]); 
```

## Reusable Components

### Inputs

#### Form Group

```vue
<x-input.form-group label="YourLabel" key="yourid" model="yourmodel">
	
</x-input.form-group>
```

#### Filepond && File Input

##### Filepond

```vue
<x-input.filepond remove-file-event="removeFile" wire:model="image"></x-input.filepond>
```

##### File Input

```vue
<x-input.file wire:model=""></x-input.filepond>
```



in php add this

```php
use WithFileUploads;

use Intervention\Image\Facades\Image;

public $image;

//with image intervention
if ($this->image){
	$basename = Str::random();
	$image = $this->image;
	 $original = $basename . '.' . $image->getClientOriginalExtension();
	 $thumbnail = 'thumb_'. $basename . '.'.$image->getClientOriginalExtension();
  $folderName = "uploads";
  
	$image->storeAs($folderName, $original,"public");

	Image::make($image)
		->resize(null, 100, function ($constraint){
				$constraint->aspectRatio();
		})
		->save(public_path("/storage/$folderName/" . $thumbnail));

	$this->dispatchBrowserEvent('removeFile');
  
  $db->filename = $original;

}

```

or you can upload the image use this code below

```php
use WithFileUploads;

public $photo;

// Store in the "photos" directory with the filename "avatar.png".
$this->photo->storeAs('photos', 'avatar');

//or
$filename = Str::random() . "." . $this->photo->getClientOriginalExtension();
$this->photo->storeAs('uploads', $filename, 'public');

//or with spatie media library
$user = User::find($id);
$user->addMedia($this->image->getRealPath())->toMediaCollection('collectionName');

//reset filepond
 $this->dispatchBrowserEvent('resetFilePond');
```

More info

 https://laravel-livewire.com/docs/2.x/file-uploads#basic-upload

[https://github.com/spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary)



#### Pikaday Datepicker

```vue
<x-input.datepicker wire:model.defer="invitation.place"></x-input.text>
```

#### Text

```vue
<x-input.text type="text" wire:model.defer="invitation.place"></x-input.text>
```

#### Mask Input

```vue
<x-input.mask id="" data-mask="" wire:model.lazy="" 
              data-options="{placeholder: '__/__/____'}"/>
```

#### Textarea

```vue
<x-input.textarea wire:model.defer="invitation.place"></x-input.text>
```

#### Datepicker

```vue
<!--datepicker-->
<x-input.datepicker wire:model=""></x-input.datepicker>
```

#### Radio, Checkbox and Switch

```vue
<!--switch-->
<x-input.toggle-switch  method="" id="" wire:model=""></x-input.toggle-switch>

<!--radio-->
<x-input.radio method="" wire:model.defer="model.nested"></x-input.radio>

<!--checkbox-->
<x-input.checkbox method="" wire:model.defer="model.nested"></x-input.checkbox>

```

#### Select

```vue
<x-input.select method="" wire:model.defer="" ></x-input.select>
```

#### Summernote (WYSIWG)

to set data you should emit from backend (usually on create and update method)

```php
$this->emit("set_summernote_value");
```

Or in your blade if code above doesnt work

```js
@push("scripts")

    <script>
        document.addEventListener("DOMContentLoaded", function (){
            Livewire.emit("set_summernote_value");
        });
    </script>

@endpush
```

add this to your form blade

```vue

<x-input.summernote data-event-name="set_summernote_value" id="about" wire:model="user.about"></x-input.summernote>

```

#### Location Picker Google Maps

On your livewire class add property

```php
public $location = [
        "search" => "",
        "lat" => -2.1746617,
        "lng" => 115.39786,
        "radius" => 50
];


//on create and edit
 $this->location['lat'] = $db->lat;
 $this->location['lng'] = $db->lng;
 $this->location['radius'] = $db->radius;

$this->emit("set_map", ['location' => $this->location]);
```

and on your blade add this

```vue
<x-input.location-picker :location="$location" class="location-picker"></x-input.location-picker>
```

#### Laravolt Indonesia

Provinces,cities,distritcs, and villages picker

on your blade use this



```vue
 <livewire:input.laravolt :value="$user['village_id']" 
                          :level="4"
                          parent-name="user.user-form"
                          parent-value-listener="setVillageId"/>


<!--
level 1 province,
level 2 province and city
level 3 province, city and district,
level 4 province, city, district and village,
-->
```

on your parent livewire add listener

```php
protected $listeners = [
        'setLaravoltValue'
]; 

public function setLaravoltValue($value)
 {
    $this->user['village_id'] = $value;
 }
```



### Layouts & UI Component

### Render View

```vue
view('')
->layout('layouts.admin');
```



#### Navigation

```vue
<x-ui.navigation selector="foo"></x-ui.navigation>
```

##### Navigation Item

```vue
<x-ui.navigation-item class="ml-5" session-active="user" link="{{route('user')}}">
	Menu Item
</x-ui.navigation-item>
```

##### Navigation Dropdown

```vue
<x-ui.navigation-dropdown session-expanded="admin">
	<x-slot name="drop">
			<i class="text-xl flex items-center fi-rr-settings"></i>
			<span class="ml-3"> Admin </span>
	</x-slot>
  
  <!-- slot for nav item -->
</x-ui.navigation-dropdown>
```



#### Blank Page

```vue
<main class="w-full flex-grow px-3 pb-5" xmlns:wire="http://www.w3.org/1999/xhtml">
    <section class="content mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <h4 class="heading">Title</h4>
        </div>
        <div class="grid md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-12 gap-4">
           
        </div>
    </section>
</main>
```

#### Breadcrumbs

```php
//breadcrumbs
public array $breadcrumbs = [
      ["link" => "#", "title" => "Admin"],
      ["link" => "#", "title" => "User Management"],
];
```

```vue
<x-ui.breadcrumb :breadcrumbs="$breadcrumbs"></x-ui.breadcrumb>
```

#### Widget card

```vue
<x-ui.widget-card title="Lorem ipsum" :number="2000000">
	<div class="fa fa-line-chart"></div>
</x-ui.widget-card>
```

#### Tabs

```vue
<!--
public array $tabHeaders = [
        ['key' => 'foo', 'disabled' => 'false', 'title' => 'Foo', 'icon' => '<i class="fi-rr-pencil"></i>'],
        ['key' => 'bar', 'disabled'=>'true', 'title' => 'Bar', 'icon'=> '<i class="fi-rr-pencil"></i>'],
    ];
--> 
<x-ui.tabs class="tabs" :headers="$tabHeaders">
		<x-slot name="foo">
			Foo
		</x-slot>
		<x-slot name="bar">
			Bar
		</x-slot>
 </x-ui.tabs>
```

#### Modal

```vue	
<!--size sm, md, lg, xl, fullscreen-->
<x-ui.modal id="modal_form" wire:model="showModalForm" size="md" 
               :title="$updateMode ? 'Edit' : 'Create'">
</x-ui.modal>

```

#### Button

```vue
<!--variant text, circle, normal, link -->
<x-ui.button class="bg-blue-500 text-white hover:bg-blue-400"
								variant="circle"
								data-bs-toggle="" data-bs-placement="" title="">
 </x-ui.button>
```

#### Alert

```vue
<x-ui.alert :auto-close="false" class="bg-red-500">
  <x-slot name="icon">
		<span class="flex items-center fi-rr-exclamation"></span>
	</x-slot>
	Lorem Ipsum
</x-ui.alert>
```



#### Wizard Form

```php
public array $headers = [
        ['key' => 'step_1', 'step' => 1, 'title' => 'First', 'icon' => '<i class="fi-rr-pencil"></i>'],
        ['key' => 'step_2', 'step'=> 2, 'title' => 'Mid', 'icon'=> '<i class="fi-rr-pencil"></i>'],
        ['key' => 'step_3', 'step'=> 3, 'title' => 'Last', 'icon'=> '<i class="fi-rr-pencil"></i>'],
    ];
```



```vue
<x-ui.wizard-form class="tabs" :headers="$headers">
	<x-slot name="step_1">
		First
	</x-slot>
	<x-slot name="step_2">
		Mid
	</x-slot>
	<x-slot name="step_3">
		Last
	</x-slot>
</x-ui.wizard-form>
```



## Config

to use setting table config change config/app enabled_setting to true

```php
#config/app.php
'enabled_setting' => false,
```

Use config from setting table like this

```php
#for example if you want to get setting App Name value
config('setting.app_name.value') ?? ''
#name, and value
```

tailwind css purge

```
purge: {
        content: [
            './resources/**/*.blade.php',
            './resources/**/*.js',
            './resources/**/*.vue',
            './vendor/wire-elements/modal/resources/views/*.blade.php',
            './storage/framework/views/*.php',
        ],
        options: {
            safelist: [
                'sm:max-w-sm',
                'sm:max-w-md',
                'sm:max-w-lg',
                'sm:max-w-xl',
                'sm:max-w-2xl',
                'sm:max-w-3xl',
                'sm:max-w-4xl',
                'sm:max-w-5xl',
                'sm:max-w-6xl',
                'sm:max-w-7xl'
            ]
        }
    }
```

## Turbolinks

Include the CDN asset after `@livewireScripts` or `<livewire:scripts>` in your app's HTML:

```html
		...
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>
```

> Note: You MUST have either the `data-turbolinks-eval="false"`  `data-turbo-eval="false"` attributes added to the script tag (having both won't hurt).	

```html
<script data-turbolinks-eval="false"  data-turbo-eval="false">
```
