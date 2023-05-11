<?php
spl_autoload_register(function ($className) {
  $path = __DIR__ . "/src/" . lcfirst(str_replace('pnhs\ParserNF\\', '', lcfirst($className))) . '.php';
  $path = str_replace('\\', '/', $path);
  // require $path;
  if (is_file($path)) {
    include $path;
    return true;
  }
  return false;
});
