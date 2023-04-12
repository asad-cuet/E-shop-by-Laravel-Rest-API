<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SslController extends Controller
{
    public function payment($price)
    {

        /* PHP */
            $post_data = array();
            $post_data['store_id'] = "none628d1335c3921";
            $post_data['store_passwd'] = "none628d1335c3921@ssl";
            $post_data['total_amount'] = $price;
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
            $post_data['success_url'] = "/ssl-paid";
            $post_data['fail_url'] = "http://localhost/new_sslcz_gw/fail.php";
            $post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";
            # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

            # EMI INFO
            $post_data['emi_option'] = "1";
            $post_data['emi_max_inst_option'] = "9";
            $post_data['emi_selected_inst'] = "9";

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = Auth::user()->name;
            $post_data['cus_email'] = Auth::user()->email;
            $post_data['cus_add1'] = $request->input('address1');
            $post_data['cus_add2'] = $request->input('address1');
            $post_data['cus_city'] = $request->input('city');
            $post_data['cus_state'] = $request->input('state');
            $post_data['cus_postcode'] = $request->input('pincode');
            $post_data['cus_country'] = $request->input('country');
            $post_data['cus_phone'] = $request->input('phone');
            

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "Store Test";
            $post_data['ship_add1 '] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_country'] = "Bangladesh";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = "ref001";
            $post_data['value_b '] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";

            # CART PARAMETERS
            $post_data['cart'] = json_encode(array(
                array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
                array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
                array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
                array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
            ));
            $post_data['product_amount'] = "100";
            $post_data['vat'] = "5";
            $post_data['discount_amount'] = "5";
            $post_data['convenience_fee'] = "3";

    }
}
