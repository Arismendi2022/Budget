<?php

  if(!function_exists('isActive')){
    /**
     * Devuelve la clase 'active' si la ruta coincide.
     *
     * @param string $route .
     * @return string La clase 'active' si coincide, de lo contrario una cadena vacía.
     */

    function isActive($route){
      return request()->routeIs($route) ? 'active' : '';
    }

  }

