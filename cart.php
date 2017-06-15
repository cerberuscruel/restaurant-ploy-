<?php
error_reporting(E_ALL);
ob_start();
session_start();
require 'connectDB/connectdata.php';
include "header.php" ;
include "include/modal.php";
include "include/function.php";
include "navigation.php";
include "check_session.php";


if(isset($_POST["add_product"])){
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
            'item_id'               =>     $_GET["id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_quantity'          =>     $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            // echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
            // echo '<script>window.location="cart.php"</script>';
            // $item_array = array(
            // 'item_quantity' => 'item_quantity' +  $_POST["quantity"]
            // );
            foreach ($_SESSION["shopping_cart"] as $key => $val) {
                if ($val["item_id"] == $_GET["id"]) {
                    //$val["product_qty"] += $val["product_qty"];
                    $_SESSION["shopping_cart"][$key]['item_quantity'] +=  $_POST["quantity"]; // Add this
                }
            }
        }
    }
    else
    {
        $item_array = array(
        'item_id'               =>     $_GET["id"],
        'item_name'               =>     $_POST["hidden_name"],
        'item_price'          =>     $_POST["hidden_price"],
        'item_quantity'          =>     $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET['action'])){
    if($_GET['action']=="delete"){
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if($value['item_id']==$_GET['id']){
                unset($_SESSION['shopping_cart'][$key]);
                echo '<script>alert("ลบเรียบร้อย")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}
?>
  <div class="container">
    <div class="table-responsive">
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <?php if(isset($_SESSION['booking']) && !empty($_SESSION['booking']) == "table"){ ?>
          <tr>
            <th>รหัสอาหาร</th>
            <th>ชื่ออาหาร</th>
            <th>โต๊ะ</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>รวม</th>
            <th>การดำเนินการ</th>
          </tr>
          <?php }else{ ?>
            <tr>
              <th>รหัสอาหาร</th>
              <th>ชื่ออาหาร</th>
              <th>ห้อง</th>
              <th>จำนวน</th>
              <th>ราคา</th>
              <th>รวม</th>
              <th>การดำเนินการ</th>
            </tr>
            <?php
}

$items = array();
if(!empty($_SESSION["shopping_cart"])){
    $total=0;
    foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
              <form id="cart-submit" method="post" action="cart-add.php">
                <tr>
                  <td>
                    <?php echo $value['item_id'];?>
                  </td>
                  <td>
                    <?php echo $value['item_name'];?>
                  </td>
                  <td>
                    <?php echo $_SESSION['des'];?>
                  </td>
                  <td>
                    <?php echo $value['item_quantity'];?>
                  </td>
                  <td>
                    <?php echo number_format($value['item_price'],2);?>
                  </td>
                  <td>
                    <?php echo number_format($value['item_price']*$value['item_quantity'],2);?>
                  </td>
                  <td class="hidden">
                    <input type="hidden" name="submit-form" value="">
                  </td>
                  <!--<td><input type="text" name="shopping_cart" value="<?php $value['item_id'] ; ?>"></td>-->
                  <td><a href="cart.php?action=delete&id=<?php echo $value['item_id'];?>" class="btn btn-danger">ลบสินค้า</td>
        </tr>
        
        <?php
        $total=$total+($value['item_price']*$value['item_quantity']);
    }
    
    
    
    
    ?>
    <tr>
    <td colspan="3" align="right">ราคารวม</td>
    <td align="right">฿ <?php echo number_format($total, 2); ?></td>
    <td align="center"><button type="submit" id="submit-cart" class="btn btn-success">สั่งอาหาร</button></td>
    </tr>
    
    
    </form>
    <?php
}
?>
</table>
<!--<?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>   -->
</div>
</div>



<!--cart-submit-->
<!--<script>
$(function () {
    $("#cart-submit").submit(function (event) {
        event.preventDefault();
        // alert("alert"); return 1;
        // var msg = $('#loginsuccess').trigger("click");
        // var value = $($value['item_id']).val();
        
        var qtyVal =0;
        $( "#menu_id" ).each(function() {
            qtyVal = $(this).val();
            
        });
        console.log(qtyVal);
        
        
        
        return 1 ;
        
        $.post("cart-add.php", {
            Username: usrname,
            Password: psw,
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                // location.reload();
                // alert(usrname + psw);
                // msg.show();
            } else {
                alert("Error !");
            }
        });
    });
});
</script>-->
<!--cart-submit-->