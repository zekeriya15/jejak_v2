<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Drop foreign key constraint
    // Schema::table('model_has_roles', function (Blueprint $table) {
    //     $table->dropForeign(['role_id']); // Drop the foreign key constraint
    // });

    // Drop the related tables
    Schema::dropIfExists('roles');
    Schema::dropIfExists('permissions');
    Schema::dropIfExists('role_has_permissions');
    Schema::dropIfExists('model_has_roles');
    // Schema::dropIfExists('model_has_permissions');
    Schema::dropIfExists('model_has_permissions');
    // Schema::dropIfExists('role_has_permissions');

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {
            //
        });
    }
};
