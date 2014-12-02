<?php

namespace Way\Artisan;

use User;
use Hash;

class UserCreator {
    
    public function __construct(User $user) {
        $this->user = $user;
    }
    
    
    public function create(array $fields) {
        $this->user->email = $fields['email'];
        $this->user->password = Hash::make($fields['password']);
        
        return $this->user->save();
        
        //return $this->user->create($this->fields);
    }

}
