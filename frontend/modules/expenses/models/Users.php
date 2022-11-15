<?php

namespace frontend\modules\expenses\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $language_code
 * @property int|null $is_bot
 *
 * @property UsersChat[] $usersChats
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_bot'], 'integer'],
            [['username', 'first_name', 'last_name', 'language_code'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'language_code' => 'Language Code',
            'is_bot' => 'Is Bot',
        ];
    }

    /**
     * Gets query for [[UsersChats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersChats()
    {
        return $this->hasMany(UsersChat::class, ['users_id' => 'id']);
    }
}
