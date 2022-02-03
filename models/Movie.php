<?php

namespace app\models;

use Codeception\Lib\Interfaces\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model Movie for the table movie
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property User $created_by
 */

class Movie extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'movie';
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ],
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'name'
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['description', 'name'], 'required'],
            [['description','name'], 'string'],
            [['created_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 1024],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * Gets query for [[CreatedBy]]
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy(){
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

}