<?php
require('fpdf17/fpdf.php');

include 'dataconnection.php';
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        $select_query = "SELECT orders.order_id, orders.order_timestamp,order_details.user_quantity ,receipts.received_name, receipts.address, receipts.town_city, receipts.state_province, receipts.zip_postalcode, receipts.phone
        FROM orders
        INNER JOIN order_details ON orders.order_id = order_details.order_id 
        INNER JOIN receipts ON orders.order_id = receipts.order_id
        WHERE orders.username = '$username' AND orders.order_id = '$order_id'";
    $result = mysqli_query($connect, $select_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Existing code here
        } else {
            echo "No rows found.";
        }
    } else {
        echo "Query Error: " . mysqli_error($connect);
    }
    
      
        
        

        if ($result && mysqli_num_rows($result) > 0) {
            $invoice = mysqli_fetch_assoc($result);

            // Generate the PDF
            $pdf = new FPDF('P', 'mm', 'A4');
            $pdf->AddPage();

            // Set font to Arial, bold, 14pt
            $pdf->SetFont('Arial', 'B', 14);

            // Add title
            $pdf->Cell(130	,5,'4M Online Sport Shoe Store',0,0);
            $pdf->Cell(59	,5,'Receipt',0,1);//end of line

            // Add details
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(130	,5,'[Jalan Bukit Beruang]',0,0);
            $pdf->Cell(59	,5,'',0,1);//end of line

           $pdf->Cell(130	,5,'[Melaka,Malaysia, 75450]',0,0);
        
           

          
           $pdf->Cell(25	,5,'Order ID #'.$invoice['order_id'],0,0);
           $pdf->Cell(34, 5, $invoice['order_timestamp'], 0, 1);


          
          //make a dummy empty cell as a vertical spacer
          $pdf->Cell(189	,10,'',0,1);//end of line

          //billing address
          $pdf->Cell(100	,5,'Received to',0,1);//end of line
          $pdf->Cell(0, 10, 'Received name: ' . $invoice['received_name'], 0, 1);
          // Combine address parts
          $fullAddress = $invoice['address'] . ', ' . $invoice['town_city'] . ', ' . $invoice['state_province'] . ', ' . $invoice['zip_postalcode'];

          // Display full address
          $pdf->Cell(0, 10, 'Address: ' . $fullAddress, 0, 1);


          $pdf->Cell(0, 10, 'Phone: ' . $invoice['phone'], 0, 1);

            // Add invoice contents
          $pdf->SetFont('Arial', 'B', 12);
          $pdf->Cell(130	,5,'Product name',1,0);
          $pdf->Cell(25	,5,'Quantity',1,0);
          $pdf->Cell(34	,5,'Amount',1,1);//end of line


            $pdf->SetFont('Arial', '', 12);
            // Fetch and display items

            $select_query_items = "SELECT DISTINCT orders.order_id, orders.order_status,product.product_name, product_details.product_price, order_details.user_quantity, receipts.received_name, receipts.address, receipts.phone
            FROM orders
            INNER JOIN order_details ON orders.order_id = order_details.order_id 
            INNER JOIN receipts ON orders.order_id = receipts.order_id 
            INNER JOIN product ON order_details.product_id = product.product_id
            INNER JOIN product_details ON order_details.product_id = product_details.product_id
            WHERE orders.order_id = '$order_id' AND orders.username = '$username'";
        
        
            $result_items = mysqli_query($connect, $select_query_items);
            
            $subtotal = 0;
            while ($item = mysqli_fetch_assoc($result_items)) {
                $pdf->Cell(130, 5, $item['product_name'], 1, 0);
                $pdf->Cell(25, 5, $item['user_quantity'], 1, 0);
                $pdf->Cell(34, 5, 'RM ' . number_format($item['product_price'] * $item['user_quantity']), 1, 1, 'R');
                
            
                $subtotal += $item['product_price'] * $item['user_quantity'];
            }
            
        
$result_items = mysqli_query($connect, $select_query_items);

if ($result_items) {
    if (mysqli_num_rows($result_items) > 0) {
        // Existing code here
    } else {
        echo "No rows found.";
    }
} else {
    echo "Query Error: " . mysqli_error($connect);
}

            // Add summary
            $pdf->Cell(130	,5,'',0,0);
            $pdf->Cell(25	,5,'Subtotal',0,0);
            $pdf->Cell(34	,5,'RM'.number_format($subtotal),1,1,'R');//end of line
            

            
            $pdf->Cell(130	,5,'',0,0);
            $pdf->Cell(25	,5,'Delivery Fee',0,0);
            $pdf->Cell(34	,5,'Free Delivery',1,1,'R');//end of line
            
            $pdf->Cell(130	,5,'',0,0);
            $pdf->Cell(25	,5,'Total Fee',0,0);
            $pdf->Cell(34	,5,'RM'.number_format($subtotal),1,1,'R');//end of line

            // Output the PDF
            $pdf->Output();
            exit(); // Exit the script after generating the PDF
        } else {
            echo "No results found.";
        }
    } else {
        echo "Order ID is not provided.";
    }
} else {
    echo "User is not logged in.";
}
?>
