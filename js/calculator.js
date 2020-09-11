$(document).ready(function(){
    
  var DOMAIN = "http://dearlifebd.com/airlines";
  //var DOMAIN = "https://localhost/inv_project/public_html";
//var DOMAIN = "https://inventory247.000webhostapp.com/";
 //var DOMAIN = "https://localhost/";
     addNewRow();
     $("#add").click(function(){
      addNewRow();
     })

     function addNewRow(){
      $.ajax({
     url : "includes/process3.php",
        method : "POST",
        data : {getNewOrderItem:1},
        success : function(data){
          $("#invoice_item").append(data);
          var n = 0;
          $(".number").each(function(){
            $(this).html(++n);
          })
        }
      })
     }


     //@azom fetch order

       fetch_Order_data();
        function fetch_Order_data(){
        $.ajax({
              url : "includes/process3.php",
                method : "POST",
                data : {'#get_order_data':1},
                
                  success : function(data){
                   $("#get_order_data").append(data);
                    
                  $("#fetch_order_data").append(data);
               var choose = "";
                $("#select").html(choose+data);
               //alert(data);
            }
        })
     }



     $("#remove").click(function(){
      $("#invoice_item").children("tr:last").remove();
          calculate(0,0);
     })
     $("#invoice_item").delegate(".pid","change",function(){
     //var tax =$(this).val();
      var pid =$(this).val();
      var tr = $(this).parent().parent();
      $(".overlay").hide();
      $.ajax({
     url : "includes/process3.php",
        method : "POST",
        dataType : "Json",
        data : {getPriceAndQty:1,id:pid},
        success : function(data){
                   // alert(data);
          tr.find(".tqty").val(data["product_stock"]);
          tr.find(".pro_name").val(data["product_name"]);
                    tr.find(".coustomer_name").val(data["coustomer_name"]);
                    tr.find(".vendor_paid").val(data["vendor_paid"]);
                    tr.find(".grosse_f").val(data["grosse_f"]);


                   // vendor_paid = sub_total - gst + 100 + tax;
          //tr.find(".sub_total").val() + tr.find(".tax").val() ;
                   // calculate(0,0);
                 

                    tr.find(".fly_d").val(data["fly_d"]);
                      tr.find(".country").val(data["country"]);
                    tr.find(".air").val(data["air"]);
          tr.find(".qty").val(1);
        tr.find(".tax").val(data["tax"]);
          tr.find(".gst").val(data["gst"]);
          tr.find(".gst2").val(data["gst2"]);
          tr.find(".price").val(data["Product_price"]);
          tr.find(".amt").html(tr.find(".qty").val() * tr.find(".price").val());
                    calculate(0,0);
          tr.find(".qty").html(tr.find(".amt").val() * tr.find(".qty").val());
                    calculate(0,0);
                    
                  
        }
      })
     })

     //@azom qty
     
     $("#invoice_item").delegate(".qty","keyup",function(){
          var qty = $(this);
          var tr = $(this).parent().parent();
         // alert(tr.find(".tqty").val());
          if (isNaN(qty.val())){
               alert("Please enter a valid quantity");
               qty.val(1);
          }else{
               if ((qty.val() - 0) > (tr.find(".qty").val() -0)){
                    alert("Sorry This much of quantity is not available");
                    aty.val(1);
                    
               }else{
                 
                   var bprice = parseInt(tr.find(".price").val());
                    var ttax = bprice * ( 1- tr.find(".gst").val()/100);
                   var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
                   // var ttax = bprice * tr.find(".gst").val();
                   //var ttax2 = bprice * tr.find(".gst2").val();
               //  var price = (bprice + ( - ttax2 + ttax)) +100 ;
                   //console.log('price:'+price);
                   var amt = parseInt(qty.val() * bprice) + parseInt(tr.find(".tax").val());
                   //console.log('total:'+amt);
                    tr.find(".amt").html(amt);
                   //calculate(0,0);
               }
          }
     })
     
     //@azom price

      $("#invoice_item").delegate(".price","keyup",function(){
          var price = $(this);
          var tr = $(this).parent().parent();
         // alert(tr.find(".tqty").val());
          if (isNaN(price.val())){
               alert("Please enter a valid quantity");
             price.val();
          }
  
        else{
                  var bprice = parseInt(tr.find(".price").val());
                   var bqty = parseInt(tr.find(".qty").val());
                   var ttax = bprice * ( 1- tr.find(".gst").val()/100);
                   var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
                   // var ttax = bprice * tr.find(".gst").val();
                   //var ttax2 = bprice * tr.find(".gst2").val();
                  // var price = (bprice + ( - ttax2 + ttax)) +100 ;
                  //  var qty = bqty;
                 // console.log('price:'+price);
 var amt = parseInt(bprice * tr.find(".qty").val()) + parseInt(tr.find(".tax").val());
                   //console.log('total:'+amt);
                    tr.find(".amt").html(amt);

               }
          
     })

////@azom air tax

        $("#invoice_item").delegate(".gst","keyup",function(){
          var gst = $(this);
          var tr = $(this).parent().parent();
          if (isNaN(gst.val())){
               alert("Please enter a floting number");
               gst.val();
          }

        else{
                   var bprice = parseInt(tr.find(".price").val());
                   var bqty = parseInt(tr.find(".qty").val());
                   var taxaa =parseInt( tr.find(".amt").html(tax.val()));
                   var gstaa = parseInt(tr.find(".amt").html(gst.val()));
                     var ttax = bprice * ( 1- tr.find(".gst").val()/100);
                   var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
                   // var ttax = bprice * tr.find(".gst").val();
                   //var ttax2 = bprice * tr.find(".gst2").val();
                  var price = (bprice + ( - ttax2 + ttax)) +100 ;
                //  var gst = gstaa;
       var amt = parseInt(price) + parseInt(tr.find(".tax").val());
                 // console.log('total:'+amt);
                    tr.find(".amt").html(amt);
            
               }
          
     })

        //@azom Dis cus 
           $("#invoice_item").delegate(".gst2","keyup",function(){
          var gst2 = $(this);
          var tr = $(this).parent().parent();
          if (isNaN(gst2.val())){
               alert("Please enter a floting number");
               gst2.val();
          }

        else{
                  var bprice = parseInt(tr.find(".price").val());
                   var bqty = parseInt(tr.find(".qty").val());
                   var taxaa = tr.find(".vendor_paid").html(tax.val());
                   var gstaa = parseInt(tr.find(".amt").html(gst.val()));
                     var ttax = bprice * ( 1- tr.find(".gst").val()/100);
                   var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
                   // var ttax = bprice * tr.find(".gst").val();
                   //var ttax2 = bprice * tr.find(".gst2").val();
                 //  var price = (bprice + ( - ttax2 + ttax)) +100 ;
                   var gst = gstaa;
                   
       var vendor_paid = parseInt(tr.find(".tax").val()) / parseInt(bprice*.01);
                 // console.log('total:'+amt);
                    tr.find(".vendor_paid").html(vendor_paid);
                    var vp= vendor_paid;
              
        }
     })


           //@azom govment tax 6000
    $("#invoice_item").delegate(".tax","keyup",function(){
          var tax = $(this);
          var tr = $(this).parent().parent();
       // alert(tr.find(".tqty").val());
          if (isNaN(tax.val())){
               alert("Please enter a valid quantity");
             tax.val();
          }

        else{

              var bprice = parseInt(tr.find(".price").val());
                   var bqty = parseInt(tr.find(".qty").val());
                   var taxaa = tr.find(".amt").html(tax.val());
                     var ttax = bprice * ( 1- tr.find(".gst").val()/100);
                   var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
                   // var ttax = bprice * tr.find(".gst").val();
                   //var ttax2 = bprice * tr.find(".gst2").val();
                   // var price = (bprice + ( - ttax2 + ttax)) +100 ;
                   //var tax = taxaa;
                 // console.log('price:'+price);
            var vendor_paid = parseInt(tr.find(".tax").val()) / parseInt(bprice*.01);
                 // console.log('total:'+amt);
                    tr.find(".vendor_paid").html(vendor_paid);
//var tax=taxaa;
               }
          
     })

           //@azomgovment tax 6000
        //govment tax 6000
    // $("#invoice_item").delegate(".tax","keyup",function(){
    //       var tax = $(this);
    //       var tr = $(this).parent().parent();
    //   // alert(tr.find(".tqty").val());
    //       if (isNaN(tax.val())){
    //           alert("Please enter a valid quantity");
    //          tax.val();
    //       }else{
    //           if (tr.find(".gst").val()){
    //               // gst.val(0);
    //             // aty.val(0);
    //               var bprice = parseInt(tr.find(".price").val());
    //               var bqty = parseInt(tr.find(".qty").val());
    //               var taxaa = tr.find(".amt").html(tax.val());
    //             var ttax = bprice * ( 1- tr.find(".gst").val()/100);
    //               var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
    //               // var ttax = bprice * tr.find(".gst").val();
    //               //var ttax2 = bprice * tr.find(".gst2").val();
    //               // var price = (bprice + ( - ttax2 + ttax)) +100 ;
    //               //var tax = taxaa;
    //              // console.log('price:'+price);
    //         var grosse_f =  parseInt(bprice * tr.find(".qty").val()) + parseInt(tr.find(".tax").val());
    //          tr.find(".grosse_f").html(grosse_f);
             
    //         var amt = parseInt(ttax) + parseInt(tr.find(".tax").val())+ (bprice + parseInt(tr.find(".tax").val()))*0.003 + 100 ;
    //              // console.log('total:'+amt);
    //                 tr.find(".amt").html(amt);
                    
    //           }else{

    //           var bprice = parseInt(tr.find(".price").val());
    //               var bqty = parseInt(tr.find(".qty").val());
    //               var taxaa = tr.find(".amt").html(tax.val());
    //             var ttax = bprice * ( 1- tr.find(".gst").val()/100);
    //               var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
    //               // var ttax = bprice * tr.find(".gst").val();
    //               //var ttax2 = bprice * tr.find(".gst2").val();
    //               // var price = (bprice + ( - ttax2 + ttax)) +100 ;
    //               //var tax = taxaa;
    //              // console.log('price:'+price);
    //         var grosse_f =  parseInt(bprice * 0.001)  parseInt(tr.find(".tax").val());
    //          tr.find(".grosse_f").html(grosse_f);
             
    //         var amt = parseInt(bprice * tr.find(".qty").val()) + parseInt(tr.find(".tax").val());
    //              // console.log('total:'+amt);
    //                 tr.find(".amt").html(amt);

    //          }  
    //       }
    //  })
    //  //var grosse_f
     
    //          $("#invoice_item").delegate(".grosse_f","keyup",function(){
    //       var grosse_f = $(this);
    //       var tr = $(this).parent().parent();
    //       if (isNaN(grosse_f.val())){
    //           alert("Please enter a floting number");
    //           grosse_f.val();
    //       }
// if (gst.val()=0){
            
//               var ttax = bprice * ( 1- tr.find(".gst").val(0)/100);
//             var amt = parseInt(ttax) + parseInt(tr.find(".tax").val());
//                  // console.log('total:'+amt);
//                     tr.find(".amt").html(amt);
//              var r= tr.find(".amt").html(amt);
//               }
    //     else{ sobuz 
    //               var bprice = parseInt(tr.find(".price").val());
    //               var bqty = parseInt(tr.find(".qty").val());
    //               var taxaa =parseInt( tr.find(".amt").html(tax.val()));
    //               var gstaa = parseInt(tr.find(".amt").html(gst.val()));
    //                  var ttax = bprice * ( 1- tr.find(".gst").val()/100);
    //               var ttax2 = bprice * (1 - tr.find(".gst2").val()/100);
    //               // var ttax = bprice * tr.find(".gst").val();
    //               //var ttax2 = bprice * tr.find(".gst2").val();
    //              //  var price = (bprice + ( - ttax2 + ttax)) +100 ;
    //             //  var gst = gstaa;
    //   var grosse_f =  parseInt(bprice * tr.find(".qty").val()) + parseInt(tr.find(".tax").val());
    //              // console.log('total:'+amt);
    //                 tr.find(".grosse_f").html(grosse_f);
            
    //           }
          
    // @azom })
     
     
     
      function calculate(dis,paid,tax,gst,gst2,vendor_paid,grosse_f){
          var vendor_paid= 0; 
          var grosse_f= 0;
          var sub_total = 0;
          var gst = 0;
          var gst2 = 0;
          var tax= 0;
          var net_total = 0;
          var price = 0;
          var discount = 0;
          var paid_amt = paid;
          var due =0;
            $(".vendor_paid").each(function(){
        vendor_paid = vendor_paid + ($(this).html() * 1) ;
       //vendor_paid = vendor_paid;   
       
          })
     
        vendor_paid = vendor_paid ; 
        
          $(".amt").each(function(){
        sub_total = sub_total + ($(this).html() * 1);
       //vendor_paid = vendor_paid;    
          })
          
    
           net_total = sub_total - gst2 + tax;
           
           grosse_f = sub_total;
           
    //     $(".vendor_paid").each(function(){
    //     vendor_paid = ($(this).html() * 1) ;
    //   //vendor_paid = vendor_paid;    
    //       })
     
    //     vendor_paid = vendor_paid+100;
        
        $(".grosse_f").each(function(){
          //  grosse_f =  sub_total - gst2 + tax;
       // grosse_f = sub_total + ($(this).html() * 1)  ;
       //vendor_paid = vendor_paid;    
          })
     
       // grosse_f = grosse_f;
        
        
          due = net_total - paid_amt;
         // $("#ttax2").val(ttax2)
          //$("#price").val(price);
          $("#tax").val(tax);
          $("#gst").val(gst);
          $("#gst2").val(gst2);
          $("#sub_total").val(sub_total);
          $("#vendor_paid").val(vendor_paid);
           $("#grosse_f").val(grosse_f);
          $("#discount").val(discount);
          $("#net_total").val(net_total);
          $("#due").val(due);

     }

          
  $("#gst").keyup(function(){

       var gst = $(this).val();
      
         calculate(0,gst); 
       })
    $("#gst2").keyup(function(){

       var gst2 = $(this).val();
      
         calculate(0,gst2); 
       })


       $("#tax").keyup(function(){

       var tax = $(this).val();
      
         calculate(0,tax); 
       })

    $("#vendor_paid").keyup(function(){

       var vendor_paid = $(this).val();
      
         calculate(0,vendor_paid); 
       })
      
       $("#grosse_f").keyup(function(){

       var grosse_f = $(this).val();
      
         calculate(0,grosse_f); 
       })

     $("#paid").keyup(function(){
          var paid = $(this).val();
     //var discount =$(this).val();
          calculate(0,paid);
     })
  
     // // order accepting........
     // $("#order_form").one(.click(function(){
     //      var invoice = $("#get_order_data").serialize();
     //      if ($("#coun_name").val() === ""){
     //           alert("please enter Customer Cell");
     //      }
         
     //    else{
     //        $.ajax({
     //           url : "includes/process.php",
     //           method : "POST",
     //           data : $("#get_order_data").serialize(),
     //           success : function(data){
     //                 $("#get_order_data").trigger("reset");
                    
                       
     //                 if (confirm("DO u want to print invoice ?")){
     //                     window.location.href = "includes/invoice_bill.php?"+invoice;
     //                }
     //               if (data === "ORDER_COMPLETED") {
                         
                    
                    
     //                }else{
     //                     //alert(data);
     //                }
     //             }
               
     //         })
     //     }

     // @azom}))

     $("#order_form").one("click", function(){
 
       var invoice = $("#get_order_data").serialize();
          if ($("#coun_name").val() === ""){
               alert("please enter Customer Cell");
          }
          if ($("#coustomer_name").val() === ""){
               alert("please enter Customer Name");
          }
          if ($("#paid").val() === ""){
               alert("Please Reload Browser And Enter Paid Amount Atlist 0");
          }
        else{
            $.ajax({
               url : "includes/process3.php",
               method : "POST",
               data : $("#get_order_data").serialize(),
               success : function(data){
                     $("#get_order_data").trigger("reset");
                    
                       
                     if (confirm("DO u want to print invoice ?")){
                         window.location.href = "includes/invoice_bill.php?"+invoice;
                    }
                   if (data === "ORDER_COMPLETED") {
                         
                    
                    
                    }else{
                         //alert(data)@azom;
                    }
                 }
               
             })
         }


  })
  
  
  
  

   
})
