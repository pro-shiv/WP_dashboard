$(document).ready(function(){
    loadData();
    $("#btn_addcategory").click(function(){
        $(".formContainer").show();
        $(".categoryListingDiv").hide(); 
        setTimeout(() => {
            $(".navCategory").hide(); 
          }, "100");
      })
    //create category
    $('#categoryPageForm').on('submit', function (e) {
  
    
        e.preventDefault();    
        var formData = new FormData(this);
        formData.append('action','addCategory');
    
        $.ajax({
            url: "process.php",
            type: 'POST',
            data: formData,
            success: function (data) {
                
                console.log(data);
                if(data == "category_inserted"){
                    window.location.href = "../admin/category.php";
                }
                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    // category listing ajax
    function loadData(){
      $(".formContainer").hide();
      $(".categoryListingDiv").show();

      $.ajax({
          type:"POST",
          url:"category/viewCategory.php",
          data:$(this).serialize(),
          success:function(response){
            jQuery('#table_result_category').html(response);
               jQuery('#table-data_category').DataTable({processing: true});
          }
       });
    }

    
       
      //edit ajax
      $('#editCategoryForm').on('submit', function (e) {
  
    
        e.preventDefault();    
        var formData = new FormData(this);
        formData.append('action','editCategory');
        $.ajax({
            url: "../process.php",
            type: 'POST',
            data: formData,
            success: function (data) {
                // data = JSON.parse(data);
                console.log(data);
                
                if(data == "updated"){
                    window.location.href = "../category.php";
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

       
    });
    
});