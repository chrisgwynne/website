<?php
 Kirby::plugin('my/seo', [
  'tags' => [
    'seo' => [
      'fields' => [
        'title' => ['type' => 'text'],
        'description' => ['type' => 'textarea'],
        'image' => ['type' => 'files']
      ]
    ]
  ]
]);
