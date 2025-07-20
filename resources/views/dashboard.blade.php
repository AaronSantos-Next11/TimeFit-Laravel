<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">¡Bienvenido al Sistema de Gestión de Time Fit!</h3>
                        <p class="text-gray-600">Gestiona roles, permisos y notas de usuario desde este panel de control.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Card Roles -->
                        <div class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg shadow-lg p-6 text-blue-900">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-xl font-semibold mb-2">Roles</h4>
                                    <p class="text-blue-700">Gestionar roles del sistema</p>
                                </div>
                                <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20c0-2.21 3.58-4 8-4s8 1.79 8 4" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('roles.index') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-200 hover:bg-blue-300 rounded-md text-sm font-medium text-blue-900 transition-all duration-200">
                                    Ver Roles
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card Permisos -->
                        <div class="bg-gradient-to-br from-green-100 to-green-200 rounded-lg shadow-lg p-6 text-green-900">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-xl font-semibold mb-2">Permisos</h4>
                                    <p class="text-green-700">Controlar permisos y accesos</p>
                                </div>
                                <svg class="w-12 h-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('permisos.index') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-green-200 hover:bg-green-300 rounded-md text-sm font-medium text-green-900 transition-all duration-200">
                                    Ver Permisos
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card Notas -->
                        <div class="bg-gradient-to-br from-purple-100 to-purple-200 rounded-lg shadow-lg p-6 text-purple-900">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-xl font-semibold mb-2">Notas</h4>
                                    <p class="text-purple-700">Gestionar notas de usuario</p>
                                </div>
                                <svg class="w-12 h-12 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('user-notes.index') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-purple-200 hover:bg-purple-300 rounded-md text-sm font-medium text-purple-900 transition-all duration-200">
                                    Ver Notas
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Estadísticas rápidas -->
                    <div class="mt-8 bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Estadísticas del Sistema</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">{{ \App\Models\Role::count() }}</div>
                                <div class="text-sm text-gray-600">Roles Registrados</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">{{ \App\Models\Permiso::count() }}</div>
                                <div class="text-sm text-gray-600">Permisos Configurados</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600">{{ \App\Models\UserNote::count() }}</div>
                                <div class="text-sm text-gray-600">Notas Creadas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>