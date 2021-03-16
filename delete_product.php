<?php 
include 'db_connect.php';

if(isset($_POST['checkbox'])){

if(isset($_POST['delete22']))
{
    $checkbox = $_POST['checkbox'];
    
    for($i=0;$i<count($checkbox);$i++){

        $del_id = $checkbox[$i];
        $sql = "DELETE FROM product WHERE id='$del_id'";
        
        if (mysqli_query($connection, $sql)) {
            header('Location: index.php');

        } else {
            echo 'Query Error ' . mysqli_error($connection);
        }
    }
        
        }}
        
    // if($delete=='')
    // {
    //     echo "<script>alert('Nothing Selected to Delete!!');
    //     windows.location='dashboard_news.php'</script>";
    // }
    //     $sql="delete from product where id_Product IN ($delete)";
    //     $dbb->exec($sql);
    //     echo "<script>alert('Successfuly Delete');
    //     windows.location='dashboard_news.php'</script>";
    // $check=count($_POST['delete2']);
    // $i=0;
    // while($i<$check)
    // {
    //     $deleteItem=$_POST['delete2'][$i];
    //     $sql="delete from product where id_Product='$deleteItem'";
    //     $dbb->exec($sql);
    //     $i++;
    // }
    
?>