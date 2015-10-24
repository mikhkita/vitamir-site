<?php
return array (
  'createUser' => 
  array (
    'type' => 0,
    'description' => 'создание пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'changeRole' => 
  array (
    'type' => 0,
    'description' => 'изменение роли пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'changeState' => 
  array (
    'type' => 0,
    'description' => 'изменение статуса пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'seeAdminPanel' => 
  array (
    'type' => 0,
    'description' => 'наличие доступа в админку',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'manager' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'seeAdminPanel',
    ),
    'assignments' => 
    array (
      3 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'admin' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'manager',
      1 => 'changeState',
      2 => 'createUser',
      3 => 'changeRole',
    ),
  ),
  'root' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'admin',
    ),
    'assignments' => 
    array (
      1 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      4 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'client' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'assignments' => 
    array (
      5 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      6 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      7 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      8 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      9 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      10 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      11 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      12 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      13 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      14 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      15 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      16 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      17 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      18 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      19 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      20 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      21 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      22 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      23 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      24 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      25 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      26 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      27 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      28 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      29 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      30 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      31 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      32 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      33 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      34 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      35 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      36 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      37 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      38 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      39 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      40 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      41 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      42 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      43 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      44 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      45 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      46 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      47 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      48 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      49 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      50 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
