<?php

namespace App\Livewire;

use App\Models\userNote;
use App\Models\role;
use Livewire\Component;
use Livewire\WithPagination;

class UserNotesManager extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $noteId;
    public $titulo;
    public $descripcion;
    public $categoria;
    public $rol_id;

    public $categorias = [
        'recordatorio' => 'Recordatorio',
        'nota' => 'Nota',
        'sugerencia' => 'Sugerencia',
        'importante' => 'Importante',
        'pendiente' => 'Pendiente'
    ];

    protected $rules = [
        'titulo' => 'required|string|max:180',
        'descripcion' => 'required|string|max:600',
        'categoria' => 'required|string|max:250',
        'rol_id' => 'required|exists:roles,id'
    ];

    public function render()
    {
        return view('livewire.user-notes-manager', [
            'notes' => UserNote::with('role')->paginate(10),
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
        $this->noteId = null;
        $this->titulo = '';
        $this->descripcion = '';
        $this->categoria = '';
        $this->rol_id = '';
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate();

        if ($this->editMode) {
            $note = UserNote::find($this->noteId);
            $note->update([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'categoria' => $this->categoria,
                'rol_id' => $this->rol_id
            ]);
            session()->flash('message', 'Nota actualizada exitosamente.');
        } else {
            UserNote::create([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'categoria' => $this->categoria,
                'rol_id' => $this->rol_id
            ]);
            session()->flash('message', 'Nota creada exitosamente.');
        }

        $this->closeModal();
    }

    public function edit($noteId)
    {
        $note = UserNote::find($noteId);
        $this->editMode = true;
        $this->noteId = $noteId;
        $this->titulo = $note->titulo;
        $this->descripcion = $note->descripcion;
        $this->categoria = $note->categoria;
        $this->rol_id = $note->rol_id;
        $this->showModal = true;
    }

    public function delete($noteId)
    {
        UserNote::find($noteId)->delete();
        session()->flash('message', 'Nota eliminada exitosamente.');
    }
}