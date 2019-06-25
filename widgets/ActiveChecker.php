<?php
namespace app\widgets;

use Yii;
use yii\helpers\Url;

class ActiveChecker {
    private $request;

    public function __construct() {
        $this->request = Yii::$app->request;
    }

    public function isActive($item) {
        if (isset($item['active'])) {
            return $this->isExplicitActive($item['active']);
        }

        if (isset($item['submenu'])) {
            return $this->containsActive($item['submenu']);
        }

        if (isset($item['href'])) {
            return $this->checkExactOrSub($item['href']);
        }

        // Support URL for backwards compatibility
        if (isset($item['url'])) {
            return $this->checkExactOrSub($item['url']);
        }

        return false;
    }

    protected function checkExactOrSub($url) {
        return $this->checkExact($url) || $this->checkSub($url);
    }

    protected function checkExact($url) {
        return $this->checkPattern($url);
    }

    // Untested in Yii
    protected function checkSub($url) {
        // return $this->checkPattern($url.'/*') || $this->checkPattern($url.'?*');
        return false;
    }

    protected function checkPattern($pattern) {
        $fullUrlPattern = Url::to($pattern);
        $fullUrl = $this->request->url;
        return strcasecmp($fullUrlPattern, $fullUrl) === 0;
    }

    protected function containsActive($items) {
        foreach ($items as $item) {
            if ($this->isActive($item)) {
                return true;
            }
        }
        return false;
    }

    private function isExplicitActive($active) {
        foreach ($active as $url) {
            if ($this->checkExact($url)) {
                return true;
            }
        }
        return false;
    }
}