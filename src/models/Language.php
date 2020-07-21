<?php

namespace afashio\language;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 *
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @return \common\models\Language[]
     */
    public static function languageList(): array
    {
        return self::find()->all();
    }

    public static function languageIdsList()
    {
        return ArrayHelper::getColumn(self::find()->select('id')->orderBy('id')->asArray()->all(), 'slug');
    }

    public static function languageNameArray()
    {
        return ArrayHelper::getColumn(self::find()->select('slug')->orderBy('id')->asArray()->all(), 'slug');
    }

    public static function getLanguagesAsArray()
    {
        return ArrayHelper::map(self::languageList(), 'name', 'slug');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'name'], 'required'],
            [['slug'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 50],
            [['slug'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'   => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

}
