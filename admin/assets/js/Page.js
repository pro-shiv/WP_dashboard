$(document).ready(function(){
    loadData();
    $("#btn_addPage").click(function(){
        $(".pageListingDiv").hide();
        $(".addPageDiv").hide();
        $(".formContainer").show();
        $(".backTopage").show();
        setTimeout(() => {
            $(".navPage").hide(); 
          }, "100");
        });
        //live image thumbnail
      $("#pageFeatured").on('change', function () {

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
    //page creation ajax
    $('#pageForm').on('submit', function (e) {
  
    
        e.preventDefault();    
        var formData = new FormData(this);
        formData.append('action', 'addPage');

        $.ajax({
            url: "process.php",
            type: 'POST',
            data:formData,
            success: function (data) {
             
             console.log(data);
             if(data == "inserted"){
                window.location.href = "../admin/page.php";
            }
        
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    //autoload page listing
    function loadData(){
      $(".formContainer").hide();
      $(".backTopage").hide();
      $.ajax({
          type:"POST",
          url:"page/viewPage.php",
          data:$(this).serialize(),
          success:function(response){
            jQuery('#table_result').html(response);
               jQuery('#table-data').DataTable({processing: true});
          }
       });
    }

      //Edit ajax
      $('#EditpageForm').on('submit', function (e) {
  
    
        e.preventDefault();    
        var formData = new FormData(this);
        formData.append('action', 'editPage');
         
        $.ajax({
            url: "../process.php",
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
                if(data == "updated"){
                    window.location.href = "../page.php";
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});