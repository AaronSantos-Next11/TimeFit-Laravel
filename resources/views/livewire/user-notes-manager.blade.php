<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Gestión de Notas de Usuario</h2>
<button wire:click="openModal" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                            Nueva Nota
                        </button>
                    </div>

                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($notes as $note)
                            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $note->titulo }}</h3>
                                    <div class="flex space-x-1">
<button wire:click="edit({{ $note->id }})" 
        class="text-indigo-600 hover:text-indigo-900 p-1 cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
<button wire:click="delete({{ $note->id }})" 
        onclick="return confirm('¿Estás seguro de eliminar esta nota?')"
        class="text-red-600 hover:text-red-900 p-1 cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ $note->descripcion }}</p>
                                
                                <div class="flex justify-between items-center text-xs text-gray-500 mb-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                        @if($note->categoria === 'recordatorio') bg-yellow-100 text-yellow-800
                                        @elseif($note->categoria === 'nota') bg-blue-100 text-blue-800
                                        @elseif($note->categoria === 'sugerencia') bg-green-100 text-green-800
                                        @elseif($note->categoria === 'importante') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst($note->categoria) }}
                                    </span>
                                    <span>{{ $note->created_at->format('d/m/Y') }}</span>
                                </div>
                                
                                <div class="text-xs text-gray-500">
                                    <strong>Rol:</strong> {{ $note->role->nombre_rol ?? 'Sin rol' }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($notes->isEmpty())
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No hay notas</h3>
                            <p class="mt-1 text-sm text-gray-500">Comienza creando una nueva nota.</p>
                        </div>
                    @endif

                    <div class="mt-6">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div class="relative w-full max-w-lg mx-auto p-8 border shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex justify-between items-center pb-4 mb-4 border-b">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $editMode ? 'Editar Nota' : 'Crear Nueva Nota' }}
                        </h3>
<button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 cursor-pointer">
                            <span class="sr-only">Cerrar</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="save">
                        <div class="mb-6">
                            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                                Título
                            </label>
                            <input type="text" 
                                   wire:model="titulo" 
                                   id="titulo"
                                   maxlength="180"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Ingrese el título de la nota">
                            @error('titulo') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                                Descripción
                            </label>
                            <textarea wire:model="descripcion" 
                                      id="descripcion"
                                      rows="4"
                                      maxlength="600"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                      placeholder="Ingrese la descripción de la nota"></textarea>
                            @error('descripcion') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">
                                {{ strlen($descripcion ?? '') }}/600 caracteres
                            </p>
                        </div>

                        <div class="mb-6">
                            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">
                                Categoría
                            </label>
                            <select wire:model="categoria" 
                                    id="categoria"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categorias as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('categoria') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="rol_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Rol
                            </label>
                            <select wire:model="rol_id" 
                                    id="rol_id"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Seleccione un rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->nombre_rol }}</option>
                                @endforeach
                            </select>
                            @error('rol_id') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
<button type="button" 
        wire:click="closeModal"
        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 cursor-pointer">
                                Cancelar
                            </button>
<button type="submit" 
        class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 cursor-pointer">
                                {{ $editMode ? 'Actualizar' : 'Crear' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>