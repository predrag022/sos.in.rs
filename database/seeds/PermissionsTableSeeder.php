<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'contact_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'contact_company_create',
            ],
            [
                'id'    => '19',
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => '20',
                'title' => 'contact_company_show',
            ],
            [
                'id'    => '21',
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => '22',
                'title' => 'contact_company_access',
            ],
            [
                'id'    => '23',
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => '24',
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => '25',
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => '26',
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => '27',
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => '28',
                'title' => 'faq_management_access',
            ],
            [
                'id'    => '29',
                'title' => 'faq_category_create',
            ],
            [
                'id'    => '30',
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => '31',
                'title' => 'faq_category_show',
            ],
            [
                'id'    => '32',
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => '33',
                'title' => 'faq_category_access',
            ],
            [
                'id'    => '34',
                'title' => 'faq_question_create',
            ],
            [
                'id'    => '35',
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => '36',
                'title' => 'faq_question_show',
            ],
            [
                'id'    => '37',
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => '38',
                'title' => 'faq_question_access',
            ],
            [
                'id'    => '39',
                'title' => 'block_create',
            ],
            [
                'id'    => '40',
                'title' => 'block_edit',
            ],
            [
                'id'    => '41',
                'title' => 'block_show',
            ],
            [
                'id'    => '42',
                'title' => 'block_delete',
            ],
            [
                'id'    => '43',
                'title' => 'block_access',
            ],
            [
                'id'    => '44',
                'title' => 'dostave_create',
            ],
            [
                'id'    => '45',
                'title' => 'dostave_edit',
            ],
            [
                'id'    => '46',
                'title' => 'dostave_show',
            ],
            [
                'id'    => '47',
                'title' => 'dostave_delete',
            ],
            [
                'id'    => '48',
                'title' => 'dostave_access',
            ],
        ];

        Permission::insert($permissions);

    }
}
