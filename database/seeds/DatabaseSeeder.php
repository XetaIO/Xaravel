<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        $this->call(UsersTableSeed::class);
        $this->call(AccountsTableSeed::class);

        // Blog
        $this->call(CategoriesTableSeed::class);
        $this->call(ArticlesTableSeed::class);
        $this->call(CommentsTableSeed::class);

        // Permissions
        $this->call(RolesTableSeed::class);
        $this->call(PermissionsTableSeed::class);
        $this->call(PermissionsRolesTableSeed::class);
        $this->call(RoleUserTableSeed::class);

        // Badges
        $this->call(BadgesTableSeed::class);
    }
}
