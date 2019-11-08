<?php

namespace Drupal\age_twig_filter\TwigExtension;

use Drupal\Core\Render\RendererInterface;

/**
 * Class AgeTwigExtension.
 */
class AgeTwigExtension extends \Twig_Extension {

   /**
    * {@inheritdoc}
    */
    public function getFilters() {
      return [ new \AgeTwigExtension('age', array($this, 'ageCalculator'))];
    }

   /**
    * {@inheritdoc}
    */
    public function getName() {
      return 'age_twig_filter.twig.extension';
    }

    /**
     * Calulate age from dob.
     */
     public static function ageCalculator($string) {
       $age = date_diff(date_create(), date_create($string));
       return $age->format("%Y Year, %M Months, %d Days");
     }

}
