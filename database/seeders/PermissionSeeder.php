<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create(['description'=>'Super Admin Can Access Everything','name'=> 'Super Admin']);
        $adminRole = Role::create(['description'=>'Admin Can Access Everything','name'=> 'Admin']);

        $permissionGroup = [
            'dashboard' => [
                'dashboard',
            ],
            'brand' => [
                'brand.index',
                'brand.create',
                'brand.edit',
                'brand.delete',
            ],
            'category' => [
                'category.index',
                'category.create',
                'category.edit',
                'category.delete',
            ],
            'catalogue' => [
                'catalogue.index',
                'catalogue.create',
                'catalogue.edit',
                'catalogue.delete',
            ],
            'product' => [
                'product.index',
                'product.create',
                'product.edit',
                'product.delete',
            ],
            'supplier' => [
                'supplier.index',
                'supplier.create',
                'supplier.edit',
                'supplier.delete',
                'supplier.show',
                'advance_supplier.index',
                'payable_supplier.index',
            ],
            'client' => [
                'client.index',
                'client.create',
                'client.edit',
                'client.delete',
                'client.show',
                'advance_client.index',
                'payable_client.index',
            ],
            'stock' => [
                'stock.index',
                'stock.edit',
                'stock.show',
            ],
            'all_invoice' => [
                'all_invoice.index',
                'all_invoice.show',
            ],
            'purchase_invoice' => [
                'purchase_invoice.index',
                'purchase_invoice.create',
                'purchase_invoice.edit',
                'purchase_invoice.payment_history',
                'purchase_invoice.show',
            ],
            'sale_invoice' => [
                'sale_invoice.index',
                'sale_invoice.create',
                'sale_invoice.edit',
                'sale_invoice.payment_history',
                'sale_invoice.show',
            ],
            'project_invoice' => [
                'project_invoice.index',
                'project_invoice.create',
                'project_invoice.edit',
                'project_invoice.show',
            ],
            'product_return_client' => [
                'product_return_client.index',
                'product_return_client.create',
                'product_return_client.show',
            ],
            'product_return_supplier' => [
                'product_return_supplier.index',
                'product_return_supplier.create',
                'product_return_supplier.show',
            ],
            'team' => [
                'team.index',
                'team.create',
                'team.edit',
                'team.delete',
            ],
            'team_member' => [
                'team_member.index',
                'team_member.create',
                'team_member.edit',
                'team_member.delete',
            ],
            'project' => [
                'project.index',
                'project.create',
                'project.edit',
                'project.show',
            ],
            'estimate_project' => [
                'estimate_project.index',
                'estimate_project.create',
                'estimate_project.delete',
                'estimate_project.show',
            ],
            'start_project' => [
                'start_project.create'
            ],
            'machine_project' => [
                'machine_project.index',
                'machine_project.create',
                'machine_project.edit',
            ],
            'expense_project' => [
                'expense_project.index',
                'expense_project.create',
                'expense_project.edit',
            ],
            'payment_project' => [
                'payment_project.index',
                'payment_project.create',
            ],
            'accounts_group' => [
                'accounts_group.index',
                'accounts_group.create',
                'accounts_group.edit',
                'accounts_group.delete',
            ],
            'chart_of_account' => [
                'chart_of_account.index',
                'chart_of_account.create',
                'chart_of_account.edit',
                'chart_of_account.delete',
            ],
            'general_ledger' => [
                'general_ledger.index',
                'general_ledger.create',
            ],
            'cash_flow' => [
                'cash_flow.index',
            ],
            'designation' => [
                'designation.index',
                'designation.create',
                'designation.edit',
                'designation.delete',
            ],
            'benefit' => [
                'benefit.index',
                'benefit.create',
                'benefit.edit',
                'benefit.delete',
            ],
            'user' => [
                'user.index',
                'user.create',
                'user.edit',
                'user.delete',
                'user.show',
            ],
            'user_role' => [
                'user_role.index',
                'user_role.create',
                'user_role.edit',
                'user_role.delete',
                'user_role.show',
            ],
            'unit' => [
                'unit.index',
                'unit.create',
                'unit.edit',
                'unit.delete',
            ],
            'payment_method' => [
                'payment_method.index',
                'payment_method.create',
                'payment_method.edit',
                'payment_method.delete',
            ],
            'transfer_balance' => [
                'transfer_balance.index',
                'transfer_balance.create',
            ],
            'salary_sheet' => [
                'salary_sheet.index',
                'salary_sheet.create',
            ],
        ];
        foreach ( $permissionGroup as $permissionGroupKey => $permissions){
            foreach ($permissions as $permissionName){
                $permission = Permission::create([
                    'name'=>$permissionName,
                    'group_name' => $permissionGroupKey
                ]);
                
                $superAdminRole->givePermissionTo($permission);
                $permission->assignRole($superAdminRole);
                $adminRole->givePermissionTo($permission);
                $permission->assignRole($adminRole);
            }
        }
    }
}
