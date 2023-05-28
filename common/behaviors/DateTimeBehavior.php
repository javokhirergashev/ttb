<?php


namespace common\behaviors;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class DateTimeBehavior extends AttributeBehavior
{
    /**
     * @var
     */
    public $attribute;
    /**
     * @var string
     */
    public $format = 'short';
    /**
     * @var null
     */
    public $disableScenarios = [];
    /**
     * @var null
     */
    public $old_value = null;
    /**
     * @var null
     */
    public $default = null;

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'visibleDate',
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'dbDate',
            ActiveRecord::EVENT_AFTER_VALIDATE => 'after',
            ActiveRecord::EVENT_BEFORE_INSERT => 'dbDate',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'dbDate',
        ];
    }

    /**
     * @return mixed
     */
    public function visibleDate()
    {
        $this->owner->{$this->attribute} = Yii::$app->formatter->asDatetime($this->owner->{$this->attribute}, $this->format);
    }

    /**
     * @return mixed|void
     */
    public function dbDate()
    {
        $this->initial();
        if ($this->owner->hasErrors()) {
            return;
        }
        $this->old_value = $this->owner->{$this->attribute};
        $this->owner->{$this->attribute} = strtotime($this->owner->{$this->attribute});
    }

    /**
     * @return void
     */
    public function initial()
    {

        if ((strlen($this->owner->{$this->attribute}))) {
            return;
        }
        if ($this->default !== null) {
            $this->owner->{$this->attribute} = $this->default;
        }
        if ($this->default == 'today') {
            $this->owner->{$this->attribute} = Yii::$app->formatter->asDatetime(time(), $this->format);
        }
    }

    /**
     * @return mixed|void
     */
    public function after()
    {
        $this->owner->{$this->attribute} = $this->old_value;
    }

}