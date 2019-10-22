<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staff_data".
 *
 * @property int $id
 * @property string $staff_no
 * @property string $password
 * @property string $email
 * @property int $is_academic
 * @property string $title
 * @property string $fullname
 * @property int $faculty_id
 */
class StaffData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_academic', 'faculty_id'], 'integer'],
            [['staff_no'], 'string', 'max' => 6],
            [['password'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 31],
            [['title'], 'string', 'max' => 15],
            [['fullname'], 'string', 'max' => 37],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_no' => 'Staff No',
            'password' => 'Password',
            'email' => 'Email',
            'is_academic' => 'Is Academic',
            'title' => 'Title',
            'fullname' => 'Fullname',
            'faculty_id' => 'Faculty ID',
        ];
    }
}
