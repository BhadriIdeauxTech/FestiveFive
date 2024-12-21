
<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('type')->default(false); //add type boolean Users: 0=>User, 1=>Admin, 2=>Manager
            $table->string('status')->default(1);
            $table->string('delete')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        $userData = [
            [
                'name' => 'ideaux',
                'email' => 'ideauxF5@superadmin.com',
                'type' => '1',
                'delete' => '1',
                'password' => Hash::make('98659865')
            ],
            [
                'name' => 'festive 5',
                'email' => 'festive5@superadmin.com',
                'type' => '1',
                'delete' => '1',
                'password' => Hash::make('123123123')
            ],

        ];
        DB::table('users')->insert($userData);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
