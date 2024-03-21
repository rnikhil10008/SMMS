<?php


include('../config/function.php');
 if(isset($_POST['saveAdmin'])){

$name = validate($_POST['name']);
$email = validate($_POST['email']);
$password = validate($_POST['password']);
$phone =validate($_POST['phone']);


if($name != '' && $email !='' && $password != ''){


    $emailcheck = mysqli_query($con,"SELECT * FROM admins WHERE email= '$email'");
    if($emailcheck){
        if(mysqli_num_rows($emailcheck)> 0){
            redirect('employee-create.php','Email Already used by another user.');
        }
    }

    $bcrypt_password = password_hash($password,PASSWORD_BCRYPT);
    $data = [ 
        'name'=> $name,
        'email'=> $email,
        'password' => $bcrypt_password,
        'phone' => $phone,
        
        ];
        $result=insert('admins',$data);
        if($result){
            redirect('employee.php','Employee added Successfully!');
        }else{
            redirect('employees-create.php', 'Somethings Went Wrong!');
        }

}else{
    redirect('admins-create.php','Please fill required fields.');}
}
        
?>