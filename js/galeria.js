$(document).ready(function(){
    $(".center.container-fluid").find('tr').find('td').find('img').each(function(i){
      $(this).delay(400*i).fadeIn();
    });

  });


/*$(document).ready(function(){
    $(".center").find('tr').find('td').children().each(function(i){
      $(this).delay(400*i).fadeIn();
    });

  }); */



function onBorder(img)
{
    img.style.border='5px solid red';


}
function offBorder(img)
{
    img.style.border='none' ;


}