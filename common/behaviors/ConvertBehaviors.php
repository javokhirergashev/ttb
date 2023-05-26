<?php

namespace common\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class ConvertBehaviors extends AttributeBehavior
{
    public $attributes = ['title'];


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'save',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'save',
            ActiveRecord::EVENT_AFTER_FIND => 'getData'
        ];
    }

    public function save()
    {
        foreach ($this->attributes as $attribute) {
            $temp = $this->owner->{$attribute};
            $this->owner->{$attribute} = json_encode($temp, JSON_UNESCAPED_SLASHES);
        }
    }

    public function getData()
    {
        foreach ($this->attributes as $attribute) {
            $temp = $this->owner->{$attribute};
            $this->owner->{$attribute} = json_dencode($temp, JSON_UNESCAPED_SLASHES);
        }

    }


}