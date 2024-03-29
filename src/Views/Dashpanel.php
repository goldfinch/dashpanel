<?php

namespace Goldfinch\Dashpanel\Views;

use SilverStripe\Core\Environment;
use SilverStripe\View\ViewableData;
use SilverStripe\Security\Permission;
use Goldfinch\Dashcore\Services\DashService;

class Dashpanel extends ViewableData
{
    public function forTemplate()
    {
        if (!$this->authorized()) {
            return;
        }

        $data = DashService::getPanelInitialData();

        return $this->customise([
            'jsonData' => $data ? json_encode($data) : null,
            'dashpanelState' => Environment::getEnv('SS_DASHPANEL'),
        ])->renderWith('Goldfinch/Dashpanel/Views/Dashpanel');
    }

    private function authorized()
    {
        return Permission::check('ADMIN');
    }
}
