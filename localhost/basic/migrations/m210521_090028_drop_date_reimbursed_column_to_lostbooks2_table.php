<?php

use yii\db\Migration;

/**
* Handles the dropping of table `{{%date_reimbursed_column_to_lostbooks2}}`.
*/
class m210521_090028_drop_date_reimbursed_column_to_lostbooks2_table extends Migration
{
  /**
  * {@inheritdoc}
  */
  public function safeUp()
  {
    $this->dropColumn('lostbooks2', 'date_reimbursed');
  }

  /**
  * {@inheritdoc}
  */
  public function safeDown()
  {
    $this->addColumn('lostbooks2', 'date_reimbursed',
    $this->date(4));
  }
}
