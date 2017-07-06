<?php

namespace App\Http\Middleware;

use Closure;

use GeoIP;

class SetLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (session('territory')) return $next($request);

      if (env('APP_ENV') === 'local') {
        $this->location = GeoIP::getLocation('83.244.145.245');
      } else {
        $this->location = GeoIP::getLocation();
      }

      if ($this->location['continent'] === 'SA') {
        $terr = 5;
      } elseif ($this->location['continent'] === 'OC') {
        $terr = 9;
      } else {
        switch ($this->location['isoCode']) {
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

        session([
          'uses_us_store' => in_array($this->location['isoCode'],
            ['US','CA','MX','PE','PY','MY','MA','KZ','ID','DZ']
          ),
          'territory' => $terr
        ]);

        return $next($request);
      }
}
