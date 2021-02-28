<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'access_dashboard',
            'description' => 'Acceder al dashboard' // Permiso para acceder al dashboard
        ]);

        // Módulo Permisos
        Permission::create([
            'name' => 'access_permission',
            'description' => 'Gestionar Roles y Permisos' // Permiso para gestionar roles y permisos
        ]);
        // Módulo Tiendas
        Permission::create([
            'name' => 'create_store',
            'description' => 'Visualizar formulario de creación' // Permiso para ver el formulario y ver el listado
        ]);
        Permission::create([
            'name' => 'save_store',
            'description' => 'Guardar información de tienda' // Permiso para guardar una tienda
        ]);

        Permission::create([
            'name' => 'edit_store',
            'description' => 'Visualizar formulario de edición'
        ]);

        Permission::create([
            'name' => 'update_store',
            'description' => 'Actualizar datos de la tienda'
        ]);

        Permission::create([
            'name' => 'destroy_store',
            'description' => 'Eliminar tiendas'
        ]);

        Permission::create([
            'name' => 'restore_store',
            'description' => 'Restaurar tiendas' // Ver el formulario de restaurado
                                                 // Restaurar la tienda
        ]);

         // Módulo metodos de pago

        Permission::create([
            'name' => 'view_payments',
            'description' => 'Visualizar lista de metodos de pagos'
        ]);

        Permission::create([
            'name' => 'store_payments',
            'description' => 'Guardar metodos de pagos'
        ]);

        Permission::create([
            'name' => 'delete_payments',
            'description' => 'Eliminar metodos de pagos'
        ]);

        Permission::create([
            'name' => 'update_payments',
            'description' => 'Actualizar metodos de pagos' 
        ]);

        // Módulo Categorías
        // Módulo Productos
        // Módulo Clientes
        // Módulo Pedidos
        // Módulo Método Pago
        // Módulo Método Envío

    }
}
