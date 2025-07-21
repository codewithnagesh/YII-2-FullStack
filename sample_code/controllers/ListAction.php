<?php

namespace global\translate\controllers;

use Yii;
use global\translate\models\searches\LanguageSearch;
use global\translate\bundles\LanguageAsset;
use global\translate\bundles\LanguagePluginAsset;

/**
 * Class that creates a list of languages.
 *
 * @author Author <author@example.com>
 *
 * @since 1.0
 */
class ListAction extends \yii\base\Action
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        LanguageAsset::register($this->controller->view);
        LanguagePluginAsset::register($this->controller->view);
        parent::init();
    }

    /**
     * List of languages
     *
     * @return string
     */
    public function run()
    {
        $searchModel = new LanguageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        $dataProvider->sort = ['defaultOrder' => ['status' => SORT_DESC]];

        return $this->controller->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}
