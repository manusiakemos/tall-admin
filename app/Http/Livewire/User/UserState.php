<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

trait UserState
{
    use WithFileUploads;

    public $previous;

    public $image;

    public $type;

    public $showModalForm = false;

    public array $user = [
        "user_id" => "",
        "village_id" => "",
        "name" => "",
        "username" => "",
        "birthplace" => "",
        "birthdate" => "",
        "address" => "",
        "email" => "",
        "role" => "",
        "avatar" => "",
        "about" => "",
        "active" => 1,
        "lat" => -2.1746617,
        "lng" => 115.39786,
    ];

    public $updateMode = false;

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "User Management"],
    ];

    public $options = [
        'role' => [
            [
                'text' => 'Admin',
                'value' => 'admin',
            ],
            [
                'text' => 'Super Admin',
                'value' => 'super-admin'
            ]
        ],
    ];

    public function render()
    {
        return view('livewire.user.user-form')
            ->layout('layouts.admin');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->reset();
        $this->showModalForm = true;
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::find($id)->first();
        $this->user = $user->toArray();
        $this->showModalForm = true;
    }

    public function store()
    {
        $rules = [
            'user.name' => 'required',
            'user.username' => 'required',
            'user.role' => 'required',
            'user.email'=> [
                'email',
                Rule::unique('users', 'email')
            ]
        ];

        $this->validate($rules);

        $this->updateMode = false;

        $save = $this->handleFormRequest(new User);
        $this->reset("user");

        if ($save) {
            $this->showModalForm = false;
            $this->reset("user");
            $this->emit('showToast', ["message" => "User berhasil diupdate", "type" => "success", "reload"=>false]);
            $this->emit( 'refreshDt');
        }else{
            abort('403', 'User gagal ditambahkan');
        }
    }

    public function update()
    {
        $rules = [
            'user.name' => 'required',
            'user.username' => 'required',
            'user.role' => 'required',
            'user.email' => [
                'nullable',
                Rule::unique('users', 'email')
                    ->ignore($this->user['user_id'], 'user_id'),
            ]
        ];

        $this->validate($rules);

        $save = false;

        if ($this->user["user_id"]) {
            $db = User::find($this->user["user_id"]);
            $save = $this->handleFormRequest($db);
        } else {
            abort('403', 'User Not Found');
        }

        if ($save) {
            $this->showModalForm = false;
            $this->reset("user");
            $this->emit('showToast', ["message" => "User berhasil diupdate", "type" => "success", "reload"=>false]);
            $this->emit( 'refreshDt');
        }
    }

    private function handleFormRequest(User $db): bool
    {
        $db->username = $this->user['username'];
//        $db->email = $this->user['email'];
        $db->name = $this->user['name'];
        $db->role = $this->user['role'];
        $db->active = $this->user['active'];
//        $db->address = $this->user['address'];
//        $db->birthdate = $this->user['birthdate'];
//        $db->birthplace = $this->user['birthplace'];
//        $db->about = $this->user['about'];
//        $db->village_id = $this->user['village_id'];
        if (!$this->updateMode) {
            $db->password = bcrypt("password");
            $db->api_token = Str::random(100);
        }
        return $db->save();
    }


    public function save()
    {
        $this->updateMode ? $this->update() : $this->store();
    }

    public function destroy($id)
    {
        $delete = User::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Users berhasil dihapus", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "User gagal dihapus", "type" => "success"]);
        }
        $this->reset();
    }

    public function back()
    {
        redirect($this->previous);
    }


}
