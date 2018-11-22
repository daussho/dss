<?php

# include all model class
foreach (glob("model/*.php") as $filename)
{
    include $filename;
}

# Handler for routing

function userHandler()
{
    $user = new UserModel('tes', '1/1/97', 'bandung');
    echo json_encode(array(
       'name' => $user->__get('name'),
       'birthday' => $user->__get('birthday'),
       'address' => $user->__get('address')
    ));
}

?>