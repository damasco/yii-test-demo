<?php

class m171015_121253_createTempUserTable extends CDbMigration
{
	/**
     * @var string
     */
    protected $tableName = 'temp_users';

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => 'pk',
            'email' => 'string NOT NULL',
            'auth_key' => 'string NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}