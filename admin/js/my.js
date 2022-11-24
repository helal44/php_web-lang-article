

$(document).ready(function(){
   
    $('#checkbox').click(function(event){
        if(this.checked){
            $('.checkbox1').each(function(){
                this.checked=true; 
            });
        }
        else{
            $('.checkbox1').each(function(){
                this.checked=false; 
            });
        }
    });
});