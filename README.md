# TALL Admin

> Admin Page With Tailwind Alpine Laravel Livewire  + Reusable components

### Light Mode

![](https://tva1.sinaimg.cn/large/008i3skNgy1gwdd7d76rgj31gk0u0q5w.jpg)

### Dark Mode

![](https://tva1.sinaimg.cn/large/008i3skNgy1gwddceyzauj31kh0u0div.jpg)

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

## Commands

```bash
#Generate crud from database to crudgen.json file

php artisan generate:crud

```

## Libraries

### Backend 

- https://manusiakemos.my.id/kit/installation
- https://github.com/asantibanez/livewire-charts
- https://github.com/garygreen/pretty-routes
- https://image.intervention.io/v2
- https://laravel-excel.com/
- https://github.com/rappasoft/laravel-livewire-tables
- https://spatie.be/docs/laravel-medialibrary/v10/introduction
- https://github.com/UniSharp/laravel-filemanager

### Frontend

- https://select2.org/
- https://alpinejs.dev/
- https://tailwindcss.com
- [laravel livewire]()

## Todo List

- [x] Crud Generator
- [x] Datatable
- [x] Form Modal
- [x] Privacy Policy
- [x] Laravel Breeze Auth



