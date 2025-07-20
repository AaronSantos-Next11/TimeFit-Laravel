<?php

namespace App\Livewire;

use App\Models\permiso;
use App\Models\role;
use Livewire\Component;
use Livewire\WithPagination;

class PermisosManager extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $permisoId;
    public $rol_id;
    public $permiso;

    protected $rules = [
        'rol_id' => 'required|exists:roles,id',
        'permiso' => 'required|string|max:100'
    ];

    public function render()
    {
        return view('livewire.permisos-manager', [
            'permisos' => Permiso::with('role')->paginate(10),
            'roles' => Role::all()
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
        $this->permisoId = null;
        $this->rol_id = '';
        $this->permiso = '';
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate();

        if ($this->editMode) {
            $permiso = Permiso::find($this->permisoId);
            $permiso->update([
                'rol_id' => $this->rol_id,
                'permiso' => $this->permiso
            ]);
            session()->flash('message', 'Permiso actualizado exitosamente.');
        } else {
            Permiso::create([
                'rol_id' => $this->rol_id,
                'permiso' => $this->permiso
            ]);
            session()->flash('message', 'Permiso creado exitosamente.');
        }

        $this->closeModal();
    }

    public function edit($permisoId)
    {
        $permiso = Permiso::find($permisoId);
        $this->editMode = true;
        $this->permisoId = $permisoId;
        $this->rol_id = $permiso->rol_id;
        $this->permiso = $permiso->permiso;
        $this->showModal = true;
    }

    public function delete($permisoId)
    {
        Permiso::find($permisoId)->delete();
        session()->flash('message', 'Permiso eliminado exitosamente.');
    }
}
