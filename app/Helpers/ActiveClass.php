<?php

  if(!function_exists('isActive')){
    /**
     * Devuelve la clase 'active' si la ruta coincide para un <li>.
     *
     * @param string $route
     * @return string La clase 'active' si coincide, de lo contrario una cadena vacía.
     */
    function isActive($route){
      return request()->routeIs($route) ? 'active' : '';
    }
  }

  if(!function_exists('isSelected')){
    /**
     * Devuelve la clase 'is-selected' si la ruta coincide para un <a>.
     *
     * @param string $route
     * @param array $params
     * @return string La clase 'is-selected' si coincide, de lo contrario una cadena vacía.
     */
    function isSelected($route,$params = []){
      return request()->routeIs($route) && request()->route()->parameters() == $params ? 'is-selected' : '';
    }
  }
