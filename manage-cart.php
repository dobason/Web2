<?php 

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['Add_To_Cart']))
        {
            $myItem=array_column($_SESSION['cart'],'Ten_Sach');
            if(in_array($_POST['Ten_Sach'],$myItem))
            {
                echo"<script>
                    alert('Sản phẩm đã được thêm vào giỏ hàng');
                    window.location.href='index.php';
                    </script>";
            }
            else{

            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Ten_Sach'=>$_POST['Ten_Sach'],'Gia'=>$_POST['Gia'],'So_Luong'=>1);
            echo"<script>
                alert('Sản phẩm đã thêm vào giỏ hàng');
                window.location.href='index.php';
            </script>";
            }
        }
        else
        {
            $_SESSION['cart'][0]= array('Ten_Sach'=>$_POST['Ten_Sach'],'Gia'=>$_POST['Gia'],'So_Luong'=>1);
            echo"<script>
                alert('Sản phẩm đã thêm vào giỏ hàng');
                window.location.href='index.php';
            </script>";
        }
    }
}
if(isset($_POST['Remove_Item']))
{
    foreach($_SESSION['cart'] as $key => $value){
        if($value['Ten_Sach'] == $_POST['Ten_Sach']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
                alert('Sản phẩm đã được xóa');
                window.location.href='cart.php';
            </script>";
        }
        
    }
}

?>