<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    public function name()
    {
        return __(parent::name());
    }

    public function cards()
    {
        return [
        ];
    }
}
