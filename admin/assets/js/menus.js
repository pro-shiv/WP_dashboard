
$(document).ready(function(){
    restoreSelectedOption() ;
$("#saveListBtn").click(function (e) {
    e.preventDefault();
    });
//jquery insertion to drop box
var listItemCounter = 1; 
$("#submitBtnPage").on("click", function() {
var selectedValues = $("input[name='pageMenu[]']:checked").map(function(){
    return this.value;
}).get();

var checkboxes = document.querySelectorAll('.pages:checked');
//  console.log(checkboxes);
var checkedIds = [];

checkboxes.forEach(function(checkbox) {
  checkedIds.push(checkbox.id);
});

 

var propertyValues=Object.values(selectedValues);
var pageMenuIds=Object.values(checkedIds);

const menu = document.querySelector('#menu');
// add menu item
for(let i=0; i<propertyValues.length; i++){
    let li = document.createElement("li");
    // li.id = listItemCounter++;
    li.textContent =  propertyValues[i];
    li.classList.add('ui-state-default');
    li.setAttribute("data-type", "page");
    li.setAttribute("data-number", pageMenuIds[i]);
    menu.appendChild(li);

}
document.getElementById("MenuCreationDiv").appendChild(menu);

$('input[type="checkbox"]').prop('checked', false);

});

$("#submitBtnCategory").on("click", function() {
    var selectedValues = $("input[name='categoryMenu[]']:checked").map(function(){
        return this.value;
    }).get();
    var checkbox = document.querySelectorAll('.catgory:checked');
    var checkedId = [];

    checkbox.forEach(function(checkbox) {
    checkedId.push(checkbox.id);
    });

    var propertyValues=Object.values(selectedValues);
    var pageMenuId=Object.values(checkedId);
    console.log(pageMenuId);
    const menu = document.querySelector('#menu');
    // add menu item
    for(let i=0; i<propertyValues.length; i++){
        let li = document.createElement("li");
        li.textContent =  propertyValues[i];
        // li.id = listItemCounter++;
        li.classList.add('ui-state-default');
        li.setAttribute("data-type", "category");
        li.setAttribute("data-number", pageMenuId[i]);
        menu.appendChild(li);
    
    }
    document.getElementById("MenuCreationDiv").appendChild(menu);
    $('input[type="checkbox"]').prop('checked', false);
    
    });

//saving menus element to db
function insertMenu(){
    setTimeout(function(){
       
        $('.saveListBtn').click(function(e) {
            e.preventDefault();
            
            
            var listData = [];
            var menuIds =   [];
            var dataTypeArray = [];
            var dataNumberArray = [];
            
            var selectedmenu = document.querySelector('#menuSelection').value;
            // alert(selectedmenu)
            // return;
            
            $('#menu li').each(function() {
                listData.push($(this).text().trim());
                menuIds.push($(this).attr('id')); 
                dataTypeArray.push($(this).data("type"));
                dataNumberArray.push($(this).data("number"));
            });
        
            var listMenuName=  JSON.stringify(listData)
            var menuList = JSON.stringify(menuIds);
            var menuType = JSON.stringify(dataTypeArray);
            var menuItemId = JSON.stringify(dataNumberArray);
            
            
            $.ajax({
                type: 'POST',
                url: 'process.php',
                data: { listData: listMenuName ,ids : menuList ,itemId : menuItemId ,itemType : menuType,action : 'saveMenu',menuName: selectedmenu },
                success: function(response) {
                    // $("#saveListBtn").removeClass("saveListBtn");
                    // menuSelection(selectedmenu);
                    console.log(response);
                    alert(response)
                    window.location.reload();
        
                },
                error: function(error) {
                    console.log(error);
                }
            });
        
        });
        

    },100)
}

//menu selection btn
$('#selectMenu-btn').click(function(e){ 
    e.preventDefault();
    var btnMenuSelection = document.querySelector('#menuSelection').value;
    localStorage.setItem('selectedOption', btnMenuSelection);
    menuSelection(btnMenuSelection);
    UpdateDelay();
    insertMenu();
});

// $('#selectMenu-btn').trigger('click');

insideUpdate = UpdateDelay();
//update menu function
function UpdateDelay(){
    setTimeout(function(){
      
        $('.UpdateListBtn').click(function(e) {
            // alert("update");
            e.preventDefault();
            
            var listDataUpdate = [];
            var menuIdsUpdate =   [];
            var dataTypeArrayUpdate = [];
            var dataNumberArrayUpdate = [];
            var updatedArr = [];
            var updateDisplay = [];
            
            
            var selectedmenuUpdate = document.querySelector('#menuSelection').value;
            
            
            $('#menu li').each(function() {
                listDataUpdate.push($(this).text().trim());
                dataTypeArrayUpdate.push($(this).data("type"));
                dataNumberArrayUpdate.push($(this).data("number"));
            });
        
            var firstListItemId = document.getElementById("menu").getElementsByTagName('li');
            
            
            for (i = 0; i < firstListItemId.length; i++) {
                updatedArr.push(firstListItemId[i].id);
                updateDisplay.push(firstListItemId[i].dataset.number);
                   
            }
           
           
            var listMenuNameUpdate=  JSON.stringify(listDataUpdate)
            var menuListUpdate = JSON.stringify(menuIdsUpdate);
            var menuTypeUpdate = JSON.stringify(dataTypeArrayUpdate);
            var menuItemIdUpdate = JSON.stringify(dataNumberArrayUpdate);
           
            var ul    = document.getElementById("menu");
           
            const numOfLis = ul.getElementsByTagName("li").length;
            
            
            
            
            $.ajax({
                type: 'POST',
                url: 'process.php',
                data: { listData: listMenuNameUpdate ,itemId : menuItemIdUpdate ,itemType : menuTypeUpdate,action : 'upDateMenu',menuName: selectedmenuUpdate ,updateId:updatedArr,updateDisplayCounter:updateDisplay,totalLi:numOfLis},
                success: function(response) {
                    console.log(response);
                    alert(response);
                    // localStorage.setItem('selectedOption', btnMenuSelection);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        
        });
    
    },100)

}



// create menu
$('#menuCreationForm').on('submit',function(e){
    e.preventDefault();
    var inputMenuData = document.querySelector('.menuName').value;
    localStorage.setItem('selectedOption', inputMenuData);
    // alert(inputMenuData)
    menuSelection(inputMenuData);
    // return;
    $('#menu').empty();
    $.ajax({
        url: "process.php" ,
        type: "POST",
        data:{menuInput :inputMenuData,action:"saveMenuCreation"} ,
        success:function(response){
            console.log(response)
            var selectedOption = $('#menuSelection option:selected');
            selectedOption.text(response);
            $('#menuNameId').val('');
            setTimeout(function(){
                insertMenu();
            },500)
           
        }
    })

});



});
$( function() {
    $("#menu").sortable({
        // stop: function(event,ui){
        //     $('#saveListBtn').removeClass("saveListBtn");
        //     $("#saveListBtn").addClass("UpdateListBtn");
        // }
    });
    
   
  
  } );

function menuSelection(option){
    
    var selectedMenuData = option;
    
    $.ajax({
        type:"POST",
        url:"menu/menuView.php",
        data:{selectedOption :selectedMenuData},
        success:function(response){
        //    alert(response)
           if(response){
            // alert(response);
            $('#menu').html(response);
            // $(".updateBtn").show(); 
            $('#saveListBtn').addClass("UpdateListBtn");
            $("#saveListBtn").removeClass("saveListBtn");
            // localStorage.setItem('selectedOption', selectedMenuData);
            

           }else{
            
            $('#saveListBtn').addClass("saveListBtn");
            $("#saveListBtn").removeClass("UpdateListBtn");
            $("#menu").empty();
           }
             
      
        }
     });
}
var insideUpdate;
function restoreSelectedOption() {
    var storedOption = localStorage.getItem('selectedOption');
   
    
    if (storedOption) {
        $('#menuSelection').val(storedOption);
        
        menuSelection(storedOption);
    }
}