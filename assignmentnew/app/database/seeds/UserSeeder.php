<?php

class UserSeeder extends Seeder {
    function run() {
        $password='1234';
 		$encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Bob@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Bob';
 		$user->dob = '02/03/1996';
 		$user->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
 		$user->save();

        $password='1234';
 		$encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'John@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'John';
 		$user->dob = '02/03/1996';
 		$user->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
 		$user->save();

        $password='1234';
 		$encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Tom@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Tom';
 		$user->dob = '02/03/1996';
 		$user->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
 		$user->save();
    }
}