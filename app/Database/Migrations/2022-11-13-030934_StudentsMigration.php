<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"					=> ["type" => "int", "constraint" => 11, "auto_increment" => true],
            "name"					=> ["type" => "varchar", "constraint" => 100],
            "number"				=> ["type" => "varchar", "constraint" => 20],
            "nik"					=> ["type" => "varchar", "constraint" => 50],
            "no_kk"					=> ["type" => "varchar", "constraint" => 50],
            "date_of_birth"			=> ["type" => "date"],
            "place_of_birth"		=> ["type" => "varchar", "constraint" => 100],
            "date"					=> ["type" => "date"],
            "father_name"			=> ["type" => "varchar", "constraint" => 100],
            "father_date_of_birth"	=> ["type" => "date", "null" => true],
            "father_place_of_birth"	=> ["type" => "varchar", "constraint" => 100, "null" => true],
            "mother_name"			=> ["type" => "varchar", "constraint" => 100],
            "mother_date_of_birth"	=> ["type" => "date", "null" => true],
            "mother_place_of_birth"	=> ["type" => "varchar", "constraint" => 100, "null" => true],
            "parents_job"			=> ["type" => "varchar", "constraint" => 100, "null" => true],
            "graduated"				=> ["type" => "enum", "constraint" => ["0", "1"], "default" => "0"],
            "graduation_year"		=> ["type" => "varchar", "constraint" => 15],
            "created_at"			=> ["type" => "timestamp"],
            "updated_at"			=> ["type" => "timestamp"],
        ]);

        $this->forge->addKey("id", true);
        $this->forge->createTable("students");
    }

    public function down()
    {
        $this->forge->dropTable("students");
    }
}
