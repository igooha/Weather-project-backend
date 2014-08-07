<?php

class MainUrlRule extends CBaseUrlRule
{

    public $connectionID = 'db';

    public function createUrl($manager, $route, $params, $ampersand)
    {
        if (Yii::app()->params['way'] == 'control')
        {
            // remove "control/"
            $kuda = $route;
            $kuda = str_replace("control/",
                Yii::app()->params['controlKey'] . '/', $kuda
            ) . '?';

            foreach ($params as $key=>$value)
                $kuda .= $key . '=' . $value . $ampersand;

            $kuda = substr($kuda, 0, -1);
            return $kuda;
        }
        else if (Yii::app()->params['way'] == 'site')
        {
            // remove "site/"
            $kuda = $route;
            $kuda = str_replace("site/", "", $kuda) . '?';

            foreach ($params as $key=>$value)
                $kuda .= $key . '=' . $value . $ampersand;

            $kuda = substr($kuda, 0, -1);
            return $kuda;
        }
        return false;
    }

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
    {

        if (strpos($pathInfo,"gii") !== FALSE)
            return $pathInfo;
        else if (Yii::app()->params['way'] == 'control')
        {
            $pathInfo = preg_replace('#^' . Yii::app()->params['controlKey'] . '#Ui',
                'control', $pathInfo);
            return $pathInfo;
        }
        else if (Yii::app()->params['way'] == 'site')
            return 'site/' . $pathInfo;
        return false;
    }
}
