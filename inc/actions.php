<?php
$message='';
$error='';
if(isset($_POST["register"])){
    mysqli_set_charset($db,"utf8");
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password_conf=md5($_POST["password-conf"]);
    $password=md5($_POST["password"]);
    if($password!=$password_conf){
        $error = 'کلمه عبور و تکرار کلمه عبور با هم برابر نیست.';
    }else{
        if(register_user($name,$email,$password)){
            $message= 'ثبت نام با موفقیت انجام شد. وارد حساب کاربری خود شوید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
}
if(isset($_POST["login"])){
    mysqli_set_charset($db,"utf8");
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    if(login_user($email,$password)){
        $_SESSION['user_email']=$email;
        $message= 'ورود با موفقیت انجام شد. وارد حساب کاربری خود شوید.';
    }else{
        $error='اطلاعات ورودی صحیح نمی‌باشد.';
    }
}
if(isset($_GET["logout"])){
    is_logout();
    redirect('../../');
}
if(isset($_POST["admin-login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    if(admin_login($username,$password)){
        $_SESSION['admin-login']=$username;
        redirect('index.php');
    }else{
        $error='اطلاعات ورودی صحیح نمی‌باشد.';
    }
}
if(isset($_GET["admin-logout"])){
    is_admin_logout();
    redirect('login.php');
}
if(isset($_POST["add-product"])){
    mysqli_set_charset($db,"utf8");
    $name=$_POST["product-name"];
    $price=$_POST["product-price"];
    $cat=$_POST["product-cat"];
    $image=$_FILES["product-image"]['name'];
    $tmp=$_FILES["product-image"]['tmp_name'];
    $desc=$_POST["product-desc"];
        if(adding_product($name,$price,$cat,$image,$tmp,$desc)){
            $message= 'محصول اضافه گردید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
    if(isset($_GET["delete-product-id"])){
        $id=$_GET["delete-product-id"];
        if(delete_product($id)){
            $message = 'محصول با موفقیت حذف گردید.';
    }else{
        $error= 'مشکلی به وجود آمده است.';
    }
}
if(isset($_POST["add-cat"])){
    mysqli_set_charset($db,"utf8");
    $name=$_POST["cat-name"];
        if(adding_cat($name)){
            $message= 'محصول اضافه گردید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
    if(isset($_GET["delete-cat-id"])){
        $id=$_GET["delete-cat-id"];
        if(delete_cat($id)){
            $message = 'دسته بندی با موفقیت حذف گردید.';
    }else{
        $error= 'مشکلی به وجود آمده است.';
    }
}
if(isset($_GET["delete-user-id"])){
    $id=$_GET["delete-user-id"];
    if(delete_user($id)){
        $message = 'کاربر با موفقیت حذف گردید.';
}else{
    $error= 'مشکلی به وجود آمده است.';
}
}
if(isset($_POST["add-comment"])){
    mysqli_set_charset($db,"utf8");
    $username=$_POST["username"];
    $email=$_POST["email"];
    $content=$_POST["comment_text"];
    $id=$_POST["product-id"];
        if(add_comment($username,$email,$content,$id)){
            $message= 'نظر با موفقیت ثبت گردید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
    if(isset($_GET["approve-id"])){
        $id=$_GET["approve-id"];
        mysqli_set_charset($db,"utf8");
            if(approve_comment($id)){
                $message= 'نظر با موفقیت تأیید گردید.';
            }else{
                $error= 'مشکلی به وجود آمده است.';
            }
        }
        if(isset($_GET["delete-id"])){
            $id=$_GET["delete-id"];
            if(delete_comment($id)){
                $message = 'نظر با موفقیت حذف گردید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
        }
        if(isset($_POST["add-answer"])){
            mysqli_set_charset($db,"utf8");
            $id=$_POST["comment-id"];
            $answer=$_POST["comment-answer"];
            if(answer_comment($id,$answer)){
                $message= 'نظر با موفقیت تأیید گردید.';
            }else{
                $error= 'مشکلی به وجود آمده است.';
            }
        }
        if(isset($_POST["update-product"])){
            mysqli_set_charset($db,"utf8");
            $name=$_POST["product-name"];
            $price=$_POST["product-price"];
            $cat=$_POST["product-cat"];
            $desc=$_POST["product-desc"];
            $id=$_POST["product-id"];
            if(!empty($_FILES['new-product-image']['name'])){
            $image=$_FILES["new-product-image"]['name'];
            $tmp=$_FILES["new-product-image"]['tmp_name'];
            $update_product=update_product($name,$price,$cat,$desc,$id,$image,$tmp);
            }else{
            $p_image=$_POST["product-image"];
            $update_product=update_product($name,$price,$cat,$desc,$id,$p_image);
            }
                if($update_product){
                    $message= 'محصول بروزرسانی گردید.';
                }else{
                    $error= 'مشکلی به وجود آمده است.';
                }
            }
            if(isset($_POST["update-profile"])){
                mysqli_set_charset($db,"utf8");
                $name=$_POST["display-name"];
                $address=$_POST["user-address"];
                $num=$_POST["user-number"];
                $email=$_POST["user-email"];
                if(!empty($_FILES['new-user-image']['name'])){
                    $image_user=$_FILES["new-user-image"]['name'];
                    $tmp_user=$_FILES["new-user-image"]['tmp_name'];
                    $update_user=update_user($name,$address,$num,$email,$image_user,$tmp_user);
                    }else{
                    $image_user2=$_POST["user-image"];
                    $update_user=update_user($name,$address,$num,$email,$image_user2);
                }
                if($update_user){
                    $message= 'مشخصات بروزرسانی گردید.';
                }else{
                    $error= 'مشکلی به وجود آمده است.';
                }
            }
            if(isset($_GET["add-to-cart"])){
                $id=$_GET["add-to-cart"];
                $ip=$_SERVER['REMOTE_ADDR'];
                if(add_to_cart($ip,$id)){
                    redirect('cart.php');
                }
            }
        ?>