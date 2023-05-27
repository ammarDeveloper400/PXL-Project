<script type="text/javascript">
$(function(){
  $(document).on('submit', '.myForm', function(e) {
    // $('form').on("submit", function(e) {
        e.preventDefault();
        var data = {};
        var errors = [];
        var errors_ar = [];
        $(".english").find( '[name]' ).each( function( i , v ){
                var input = $( this ), // resolves to current input element.
                type = input.attr('type');
                if(type!="file"){
                    name = input.attr('name');
                    value = input.val();
                    if(value == "" ){
                        var title_display = input.parent().parent().find('label').html();
                        var message = '<p>(English) please fill '+title_display+' value</p>';
                        errors.push(message);
                    }
                }
       });

        $(".french").find( '[name]' ).each( function( i , v ){
                var input = $( this ), // resolves to current input element.
                type = input.attr('type');
                if(type!="file"){
                    name = input.attr('name');
                    value = input.val();
                    if(value == "" ){
                        var title_display = input.parent().parent().find('label').html();
                        var message = '<p>(French) please fill '+title_display+' value</p>';
                        errors_ar.push(message);
                    }
                }
       });

        if(errors.length > 0){
            $(".lang-tabslisting").removeClass('active_tab_lang');
            $(".lang-tabslisting span").removeClass('active_span_lang');
            $("#lang-tab-2listing").addClass('active_tab_lang');
            $("#lang-tab-2listing span").addClass('active_span_lang');
            $(".english").show();
            $(".french").hide();
            $(".show_errors_english").html(errors);
            $('html, body').animate({
                    scrollTop: $("#lang-tab-2listing").offset().top
                }, 500);
        } else {
            errors = [];
            $(".show_errors_english").html("");
        }

        if(errors.length == 0){
            if(errors_ar.length > 0){
                $(".lang-tabslisting").removeClass('active_tab_lang');
                $(".lang-tabslisting span").removeClass('active_span_lang');
                $("#lang-tab-1listing").addClass('active_tab_lang');
                $("#lang-tab-1listing span").addClass('active_span_lang');
                $(".english").hide();
                $(".french").show();
                $(".show_errors_french").html(errors_ar);
                $('html, body').animate({
                        scrollTop: $("#lang-tab-2listing").offset().top
                    }, 500);
            }
            else {
                errors_ar = [];
                $(".show_errors_french").html("");
            }
        }
        
        if(errors.length == 0 && errors_ar.length == 0){
            $(".myForm")[0].submit();
        }
    });
});
</script>