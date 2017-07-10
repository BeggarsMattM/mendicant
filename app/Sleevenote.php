<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sleevenote extends Model
{
    public function getSrcAttribute() {
      return "https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/fourad/site/images/sleevenotes/desktop/"
        . $this->desktop_image_path;
    }
}
