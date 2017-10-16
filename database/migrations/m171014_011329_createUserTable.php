<?php

class m171014_011329_createUserTable extends CDbMigration
{
    /**
     * @var string
     */
    protected $tableName = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => 'pk',
            'email' => 'string NOT NULL unique',
            'username' => 'string',
            'auth_key' => 'string NOT NULL',
        ]);

        $this->createIndex('idx-email', $this->tableName, 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
