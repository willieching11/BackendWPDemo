
jQuery(function($){
    //Styling adjustements
    $('.acf-field.conditional').addClass('acf-hidden').removeClass('-c0');
    $('.acf-field[data-name="button_text"]').removeClass('-c0');
    var pageLinkHeight = $('.acf-field-page-link').first().css('min-height');    
    $('.acf-field-page-link').css('min-height', pageLinkHeight);
    
    //Create Conditional Logic TODO: figure out why the default data-conditional attribute doesn't work
    $(document).on('change', '.acf-field-button-type [type="radio"]', function(){
        acfConditionalLogic($(this));
   });
    
    $('.acf-field-button-type .selected [type="radio"]').each(function(){
        acfConditionalLogic($(this));
    });
    
    
    //Switch ACF show/hide classes
    function acfConditionalLogic($this){
        var acfParent = $this.closest('.acf-fields');
        var optionValue = $this.val().replace('_', '-');
        acfParent.find('.acf-field.conditional:not(.show-'+optionValue+')').addClass('acf-hidden');
        acfParent.find('.show-' + optionValue).removeClass('acf-hidden');        
        acfParent.find('.hide-' + optionValue).addClass('acf-hidden');        
    }  

        
});

