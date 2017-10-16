<?php

class m171016_085400_addTokenApiColumn extends CDbMigration
{
    /**
     * @var string
     */
    protected $tableName = 'users';
    /**
     * @var string
     */
    protected $columnName = 'token_api';

    /**
     * {@inheritdoc}
     */
	public function up()
	{
        $this->addColumn($this->tableName, $this->columnName, 'string NOT NULL');
	}

    /**
     * {@inheritdoc}
     */
	public function down()
	{
		$this->dropColumn($this->tableName, $this->columnName);
	}
}