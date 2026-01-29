<?php
return function ($page, $kirby) {
  $query = get('q');
  $results = null;

  if ($query) {
    $results = $kirby->collection('blog')->search($query);
  }

  return [
    'query'  => $query,
    'results' => $results,
  ];
};
