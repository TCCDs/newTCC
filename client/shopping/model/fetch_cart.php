<?php
    session_start();
    $total_price = 0;

    $output = '
        <div "overflow-auto mt-2 tb-carrinho"id="order_table">
            <table class="table table-borderless text-center">
            <thead class="">
            <tr>
              <th scope="col">Check</th>
              <th scope="col">Nome do Produto</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Preço Unt</th>
              <th scope="col">Preço Total</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
    ';

    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $keys => $values) {
            $output .= '
            <tbody>
                <tr class="tr-carrinho"> 
                    <td ><input type="checkbox" id="" name=""></td>
                    <td >'.$values["product_name"].'</td>
                    <td >'.$values["product_quantity"].'</td>
                    <td align="right">$ '.$values["product_price"].'</td>
                    <td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
                    <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'"><i class="mdi mdi-trash-can-outline"></i>
                    </button></td>
                </tr>
            ';

            $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
        }

        $output .= '
            <tr>  
                <td colspan="4" align="right">Total</td>  
                <td align="right">$ '.number_format($total_price, 2).'</td>  
                <td></td>  
            </tr>
        ';
    } else {

        $output .= '
            <tr>
                <td colspan="5" align="center">                
                    Seu carrinho está vazio!
                </td>
            </tr>
        ';
    }

    $output .= ' </tbody></table></div>';

    $data = array(
        'cart_details'  => $output,
        'total_price'  => '$' . number_format($total_price, 2),
    );

    echo json_encode($data);

?>