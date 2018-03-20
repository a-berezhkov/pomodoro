<?php

namespace app\widgets;

use Yii;
use yii\bootstrap\Modal as BaseModal;

class CustomModal extends BaseModal
{
    /**
     * Header disable
     * @return string the rendering result
     */
    protected function renderHeader()
    {
        return null;
    }
}