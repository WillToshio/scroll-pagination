<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Article extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "contraint" => 5,
                "unsigned" => true, 
                "auto_increment" => true,
            ],
            "title" => [
                "type" => "VARCHAR",
                "constraint" => 64
            ],
            "text" => [
                "type" => "TEXT",
                "null" => true,
            ],
            "created_at" => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);

        $this->forge->addkey('id', true);
        $this->forge->createTable('article'); 
    }

    public function down()
    {
        //
        $this->forge->dropTable('article');
    }
}
