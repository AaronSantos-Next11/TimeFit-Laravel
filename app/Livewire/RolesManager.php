<?php

namespace App\Livewire;

use App\Models\role;
use Livewire\Component;
use Livewire\WithPagination;

class RolesManager extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $roleId;
    public $nombre_rol;
    public $selectedPermisos = [];
    
    public $availablePermisos = [
        1 => 'crear_usuarios',
        2 => 'editar_usuarios', 
        3 => 'eliminar_usuarios',
        4 => 'ver_reportes',
        5 => 'crear_notas',
        6 => 'editar_notas',
        7 => 'acceso_codigo',
        8 => 'deploy_aplicacion'
    ];

    protected $rules = [
        'nombre_rol' => 'required|string|max:100',
        'selectedPermisos' => 'required|array|min:1'
    ];

    public function render()
    {
        return view('livewire.roles-manager', [
            'roles' => Role::paginate(10)
        ]);
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->editMode = false;
        $this->roleId = null;
        $this->nombre_rol = '';
        $this->selectedPermisos = [];
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate();

        if ($this->editMode) {
            $role = Role::find($this->roleId);
            $role->update([
                'nombre_rol' => $this->nombre_rol,
                'permiso_id' => json_encode($this->selectedPermisos)
            ]);
            session()->flash('message', 'Rol actualizado exitosamente.');
        } else {
            Role::create([
                'nombre_rol' => $this->nombre_rol,
                'permiso_id' => json_encode($this->selectedPermisos)
            ]);
            session()->flash('message', 'Rol creado exitosamente.');
        }

        $this->closeModal();
    }

    public function edit($roleId)
    {
        $role = Role::find($roleId);
        $this->editMode = true;
        $this->roleId = $roleId;
        $this->nombre_rol = $role->nombre_rol;
        $this->selectedPermisos = json_decode($role->permiso_id, true) ?? [];
        $this->showModal = true;
    }

    public function delete($roleId)
    {
        Role::find($roleId)->delete();
        session()->flash('message', 'Rol eliminado exitosamente.');
    }
}