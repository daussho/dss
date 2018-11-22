<?php

# include all model class
foreach (glob("model/*.php") as $filename)
{
    include $filename;
}

# Handler for routing

function loginHandler()
{
    $user = new UserModel('admin', 'admin', 0);
    echo json_encode(array(
       'username' => $user->__get('username'),
       'name' => $user->__get('name'),
       'type' => $user->__get('type')
    ));
}

?>