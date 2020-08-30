<?php

namespace Malekfar\Panel;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        return view('malekfar.panel.index');
    }
}
