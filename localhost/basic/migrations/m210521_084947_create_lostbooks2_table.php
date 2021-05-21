<?php

use yii\db\Migration;

/**
* Handles the creation of table `{{%lostbooks2}}`.
*/
class m210521_084947_create_lostbooks2_table extends Migration
{
  /**
  * {@inheritdoc}
  */
  public function safeUp()
  {
    $this->createTable('{{%lostbooks2}}', [
      'id' => $this->primaryKey(),
      'book_id' => $this->integer(100)->notNull(),
      'reader_id' => $this->integer(11)->notNull(),
      'room_id' => $this->integer(11)->notNull(),
      'lost_date' => $this->date(255)->notNull(),
      'reimbursed' => $this->double(255)
    ]);

    $this->createIndex(
      'idx-lostbooks2-id',
      'lostbooks2',
      'id'
    );

    $this->createIndex(
      'idx-lostbooks2-book_id',
      'lostbooks2',
      'book_id'
    );

    $this->addForeignKey(
      'fk-lostbooks2-book_id',
      'lostbooks2',
      'book_id',
      'book',
      'id',
      'RESTRICT',
      'CASCADE'
    );

    $this->createIndex(
      'idx-lostbooks2-reader_id',
      'lostbooks2',
      'reader_id'
    );

    $this->addForeignKey(
      'fk-lostbooks2-reader_id',
      'lostbooks2',
      'reader_id',
      'reader',
      'id',
      'RESTRICT',
      'CASCADE'
    );

    $this->createIndex(
      'idx-lostbooks2-room_id',
      'lostbooks2',
      'room_id'
    );

    $this->addForeignKey(
      'fk-lostbooks2-room_id',
      'lostbooks2',
      'room_id',
      'room',
      'id',
      'RESTRICT',
      'CASCADE'
    );
  }

  /**
  * {@inheritdoc}
  */
  public function safeDown()
  {
    $this->dropIndex('idx-lostbooks2-id', 'lostbooks2');

    $this->dropForeignKey('fk-lostbooks2-book_id', 'lostbooks2');
    $this->dropIndex('idx-lostbooks2-book_id', 'lostbooks2');

    $this->dropForeignKey('fk-lostbooks2-reader_id', 'lostbooks2');
    $this->dropIndex('idx-lostbooks2-reader_id', 'lostbooks2');

    $this->dropForeignKey('fk-lostbooks2-room_id', 'lostbooks2');
    $this->dropIndex('idx-lostbooks2-room_id', 'lostbooks2');

    $this->dropTable('{{%lostbooks2}}');
  }
}
