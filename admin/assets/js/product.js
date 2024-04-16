$(document).ready(function(){
    loadData();
    $("#btn_addPage").click(function(){
        $(".formContainer").show();
        $(".productListingDiv").hide(); 
        setTimeout(() => {
            $(".navProduct").hide(); 
          }, "100");
      })
     //live uload image preview
      $("#productImg").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $(".image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) { 
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "style":"width:100px;height:100px"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
     //create product
    $('#productPageForm').on('submit', function (e) {
  
    
        e.preventDefault();    
        var formData = new FormData(this);
        formData.append('action','addProduct');
    
        $.ajax({
            url: "process.php",
            type: 'POST',
            data: formData,
            success: function (data) {
                // alert(data);

                console.log(data);
                if(data == "Product_inserted"){
                    window.location.href = "../admin/product.php";
                }
                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    // product listing ajax
    function loadData(){
      $(".formContainer").hide();
      $.ajax({
          type:"POST",
          url:"product/viewProduct.php",
          data:$(this).serialize(),
          success:function(response){
            jQuery('#table_result_product').html(response);
               jQuery('#table-data_product').DataTable({processing: true});
          }
       });
    }

    
    //     $("#btn_addPage").click(function(){
    //     $(".formContainer").show();
    //     $(".pageListingDiv").hide(); 
    //   })
      //edit ajax
      $('#editProductForm').on('submit', function (e) {
  
    
        e.preventDefault();    
        var formData = new FormData(this);
        formData.append('action','editProduct');
        $.ajax({
            url: "../process.php",
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
                
                if(data == "updated"){
                    window.location.href = "../product.php";
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

       
    });
    
});