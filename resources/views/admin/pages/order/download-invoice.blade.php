<Html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
    <h1 style="text-align: center">Super Market</h1>
    <div style="text-align: center; margin-top: -20px;">
        863,Mehdibag,chittagong.
    </div>
       <h3>Billing Info</h3>
        <table border="1">
           <tr>
               <th>Customer Name</th>
               <td>{{$customer->first_name.' '.$customer->last_name}}</td>
           </tr>

           <tr>
               <th>Phone Number</th>
               <td>{{$customer->phone_number}}</td>
           </tr>

            <tr>
                <th>Email Address</th>
                <td>{{$customer->email_address}}</td>
            </tr>
        </table>

       <h3>Shipping Info</h3>
       <Table border="1">
           <tr>
               <td>Full name</td>
               <td>{{$shipping->full_name}}</td>
           </tr>
           <tr>
               <td>Phone Number</td>
               <td>{{$shipping->phone_number}}</td>
           </tr>
           <tr>
               <td>Email Address</td>
               <td>{{$shipping->email_address}}</td>
           </tr>
           <tr>
               <td>Address</td>
               <td>{{$shipping->address}}</td>
           </tr>

       </Table>

       <h3>Product Info</h3>
       <Table border="1">
           <tr class="bg-info text-center">
               <th>Sl.</th>
               <th>Product Id</th>
               <th>Product Name</th>
               <th>Product Price</th>
               <th>Product Quantity</th>
               <th>Total Price</th>
           </tr>
           @if($orderDetails)
               @foreach($orderDetails as $sl=>$orderDetail)
                   <tr>
                       <td>{{++$sl}}</td>
                       <td>{{$orderDetail->product_id}}</td>
                       <td>{{$pName->product_name}}</td>
                       <td>Tk.{{$orderDetail->product_price}}</td>
                       <td>{{$orderDetail->product_quantity}}</td>
                       <td>Tk.{{$orderDetail->product_quantity*$orderDetail->product_price}}</td>
                   </tr>
               @endforeach
           @endif
           <tr>
               <th colspan="5">Total Amount = </th>
               <td>Tk. {{$total}} </td>
           </tr>
       </Table>
    </body>
</Html>
