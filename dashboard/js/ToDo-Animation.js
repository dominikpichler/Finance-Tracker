// Check Off Specific Todos By Clicking
$("ul").on("click", "li", function(){
  $(this).toggleClass("completed");
});

//Click on X to delete Todo
$("ul").on("click", "span", function(event){
  $(this).parent().fadeOut(500,function(){
    $(this).remove();
  });
  event.stopPropagation(); // To avoid "Inheritance"
});

$("input[type='text']").keypress(function(event){
  if(event.which === 13){
    //grabbing new todo text from input
    var todoText = $(this).val();
    $(this).val("");
    //create a new li and add to ul


    var node = document.getElementById("todo");
    //TODO: UMBAU: Neues Element wird direkt in die DB eingefügt und die Seite refreshed danach automatisch
    $(node).append("<li class=\"list-group-item\"><span><i class='fa fa-trash'></i></span> " + todoText + "</li>")
  }
});

// + Button
$(".fa-plus").click(function(){
  $("input[type='text']").fadeToggle();
});