<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Company;

class ModifyCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('company_slug')->after('slug');
            $table->text('description')->after('service');
        });

        $companies= Company::all();
        foreach ($companies as $company) {
            $company->company_slug = str_slug($company->company , '-');

            $company->description = $company->service;

            $company->save();
            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('company_slug');
            $table->dropColumn('description');
        });
    }
}
