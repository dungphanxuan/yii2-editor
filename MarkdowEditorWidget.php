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
        //$this->initClientOptions();

        $asset = MarkDownEditorAsset::register($view);

        //$this->updateAsset();

        $view ->registerCssFile('http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css');

        $id = $this->options['id'];
        $varName = self::PLUGIN_NAME . '_' . str_replace('-', '_', $id);
        $js = "
          console.log('Hello');
        ";
        $view->registerJs($js);
    }
    /*
     *
     * */
    public function updateAsset(){
//Replace jquery 2
        Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
            'sourcePath' => null,
            'js' => ['jquery.js' => 'http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js'],
        ];
    }
    /**
     * client options init
     */
    protected function initClientOptions()
    {
        // KindEditor optional parameters
        $params = [
            'rows',
            'theme',
            'data-provide',
        ];
        $options = [];
        $options['rows'] = '10';
        $options['data-provide'] = 'markdown';
        foreach ($params as $key) {
            if (isset($this->clientOptions[$key])) {
                $options[$key] = $this->clientOptions[$key];
            }
        }
        $this->clientOptions = $options;
    }

}
