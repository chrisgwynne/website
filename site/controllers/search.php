<?php
return function ($page, $kirby) {
  $query = get('q');
  $results = null;

  if ($query) {
    $results = $kirby->collection('blog')->search($query, 'title|text');
  }

  return [
    'query'  => $query,
    'results' => $results,
  ];
};
