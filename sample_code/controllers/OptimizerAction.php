<?php

namespace global\translate\controllers;

use global\translate\services\Optimizer;

/**
 * Class for optimizing language database.
 *
 * @author Author <author@example.com>
 *
 * @since 1.0
 */
class OptimizerAction extends \yii\base\Action
{
    /**
     * Removing unused language elements.
     *
     * @return string
     */
    public function run()
    {
        $optimizer = new Optimizer();
        $optimizer->run();

        $removedLanguageElements = $optimizer->getRemovedLanguageElements();

        return $this->controller->render('optimizer', [
            'newDataProvider' => $this->controller->createLanguageSourceDataProvider($removedLanguageElements),
        ]);
    }
}
