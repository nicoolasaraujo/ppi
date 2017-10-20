
        /* $(document).ready (function(){
            $('.showornot').click(function(){
                $(this).parent().find('.content:visible').fadeOut("slow").animate({
                height:"50%",
               width:"100%"

            }, "slow" );

            })

        }) 


        

        $(document).ready (function(){
            $('.showornot').click(function(){
                $(this).parent().find('div[style*="display: none"]').fadeIn("slow").animate({
                    backgroundColor:'#000000',
                    opacity :0.5,
                    textSize: "1.5em",
                    
                    
                

            }, "slow" );

            })

        })
 */


$(document).ready (function(){
    $('.showornot').click(function(){
        $(this).parent().find('div').delay("normal").fadeToggle("slow").animate({
            backgroundColor:'#000000',
            opacity :0.5,
            textSize: "2em",
            
            
        

    }, "slow" );

    })

})