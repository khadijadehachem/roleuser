<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Phone')->nullable();
            $table->string('Cin')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('restrict')
                ->onUpdate('restrict');
             $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->double('plafond')->nullable();;
            
            $table->boolean('active')->nullable()->default(true);

            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();

            /*

                -id :int
- Name :String
- Email :String
- Phone :int
- Photo :string
- Cin :String
- Password :String
- company_id :int
- category_id:int
-active : boolean
-plafond :float


            */


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
