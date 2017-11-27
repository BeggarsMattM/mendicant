<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Artist;
use View;
use GeoIP;

class FourADController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      $artists = Artist::current()->viewable()
                       ->orderBy('name')->get();

      $this->location = GeoIP::getLocation();

      if ($this->location['continent'] == 'SA')
      {
          $terr = 5;
      }
      elseif ($this->location['continent'] == 'OC')
      {
          $terr = 9;
      }
      else {

          switch ($this->location['isoCode'])
          {
              case 'GB': $terr = 1; break;
              case 'FR': $terr = 2; break;
              case 'DE': $terr = 3; break;
              case 'JP': $terr = 4; break;
              case 'US': $terr = 6; break;
              case 'CA': $terr = 7; break;
              case 'NO':
              case 'SE':
              case 'FI':
              case 'IS':
              case 'LT':
              case 'LV':
              case 'EE':
              case 'DK': $terr = 8; break;
              default  : $terr = 1;
          }

      }

      $this->uses_us_store = in_array($this->location['isoCode'],
          ['US','CA','MX','PE','PY','MY','MA','KZ','ID','DZ']);

      $this->territory = $terr;

      View::share('artists_for_layout', $artists);
    }
}
