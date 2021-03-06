<?php

namespace App\Http\Core;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public static $urlApi = "https://portal.kumalagroup.co.id/kmg/api/tHLxW586aIi1YXsQeEKBwhPOJzqfjFokybGmCgRN0M4cnlvduTrVAU2pZS9D37/";
    public static $baseImg = "https://kumalagroup.id/assets/img_marketing/";
    // public static $urlApi = "http://localhost:6424/kmg/api/tHLxW586aIi1YXsQeEKBwhPOJzqfjFokybGmCgRN0M4cnlvduTrVAU2pZS9D37/";
    // public static $baseImg = "http://localhost:6424/kumalagroup/assets/img_marketing/";
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
