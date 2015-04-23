<?php

namespace dungphanxuan\yii2editor;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

class MarkDownEditorWidget extends InputWidget
{
    const PLUGIN_NAME = 'MarkDownEditor';

    /**
     * KindEditor Options
     * @var array
     */
    public $clientOptions = [];

    /**
     * csrf cookie param
     * @var string
     */
    public $csrfCookieParam = '_csrfCookie';

    /**
     * @var boolean
     */
    public $render = true;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->render) {
            if ($this->hasModel()) {
                echo Html::activeTextarea($this->model, $this->attribute, $this->options);
            } else {
                echo Html::textarea($this->name, $this->value, $this->options);
            }
        }
        $this->registerClientScript();
    }
    /**
     * register client scripts(css, javascript)
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        $this->initClientOptions();

        $asset = MarkDownEditorAsset::register($view);
        $view ->registerJsFile('http://google-code-prettify.googlecode.com/svn/loader/run_prettify.js');

    }
    /**
     * client options init
     */
    protected function initClientOptions()
    {
        // KindEditor optional parameters
        $params = [
            'language',
        ];
        $options['language'] = 'ja';
        foreach ($params as $key) {
            if (isset($this->clientOptions[$key])) {
                $options[$key] = $this->clientOptions[$key];
            }
        }
        $this->clientOptions = $options;
    }

}
