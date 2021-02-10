<?php

namespace app\models;

use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class UserIdentity extends ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    {
        throw new NotSupportedException();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    public function getId()
    {
        throw new NotSupportedException();
    }

    public function getAuthKey()
    {
        throw new NotSupportedException();
    }

    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException();
    }
}
