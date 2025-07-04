$(function () {
    "use strict";
    $(function () {
        $(".preloader").fadeOut();
    });
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    });
    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  
    var set = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 55;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".sidebartoggler i").addClass("ti-menu");
        }
        else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
         var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);
    // ============================================================== 
    // Theme options
    // ==============================================================     
    $(".sidebartoggler").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
        else {
            $("body").trigger("resize");
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
        }
    });
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
    });
    // ============================================================== 
    // Right sidebar options
    // ============================================================== 
    $(".right-side-toggle").click(function () {
        $(".right-sidebar").slideDown(50);
        $(".right-sidebar").toggleClass("shw-rside");
    });
    // ============================================================== 
    // This is for the floating labels
    // ============================================================== 
    $('.floating-labels .form-control').on('focus blur', function (e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');
    
    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function () {
         $('[data-toggle="popover"]').popover()
    })
       
    // ============================================================== 
    // Perfact scrollbar
    // ============================================================== 
    $('.scroll-sidebar, .right-side-panel, .message-center, .right-sidebar').perfectScrollbar();
    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize");
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label").click(function () {
        $(this).toggleClass("task-done");
    });
    // ============================================================== 
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="collapse"] i').toggleClass('ti-minus ti-plus');
        $(this).closest('.card').children('.card-body').collapse('toggle');
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="expand"] i').toggleClass('mdi-arrow-expand mdi-arrow-compress');
        $(this).closest('.card').toggleClass('card-fullscreen');
    });
    // Close Card
    $('a[data-action="close"]').on('click', function () {
        $(this).closest('.card').removeClass().slideUp('fast');
    });
    // ============================================================== 
    // ecommerce sidebar 
    // ==============================================================
    var sparklineLogin = function () {
            $('#eco-spark').sparkline([6, 10, 9, 11, 9, 10, 12, 11, 10, 7, 11, 9, 8, 10, 9, 12], {
                type: 'bar',
                height: '50',
                barWidth: '4',
                resize: true,
                barSpacing: '7',
                barColor: '#01c0c8'
            });
        },
        sparkResize;
    $(window).on("resize", function (e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineLogin, 500);
    });
    sparklineLogin(); 
    
    // ============================================================== 
    // Color variation
    // ==============================================================
    
    var mySkins = [
        "skin-default",
        "skin-green",
        "skin-red",
        "skin-blue",
        "skin-purple",
        "skin-megna",
        "skin-default-dark",
        "skin-green-dark",
        "skin-red-dark",
        "skin-blue-dark",
        "skin-purple-dark",
        "skin-megna-dark"
    ]
        /**
         * Get a prestored setting
         *
         * @param String name Name of of the setting
         * @returns String The value of the setting | null
         */
    function get(name) {
        if (typeof (Storage) !== 'undefined') {
            return localStorage.getItem(name)
        }
        else {
            window.alert('Please use a modern browser to properly view this template!')
        }
    }
    /**
     * Store a new settings in the browser
     *
     * @param String name Name of the setting
     * @param String val Value of the setting
     * @returns void
     */
    function store(name, val) {
        if (typeof (Storage) !== 'undefined') {
            localStorage.setItem(name, val)
        }
        else {
            window.alert('Please use a modern browser to properly view this template!')
        }
    }
    
    /**
     * Replaces the old skin with the new skin
     * @param String cls the new skin class
     * @returns Boolean false to prevent link's default action
     */
    function changeSkin(cls) {
        $.each(mySkins, function (i) {
            $('body').removeClass(mySkins[i])
        })
        $('body').addClass(cls)
        store('skin', cls)
        return false
    }

    function setup() {
        var tmp = get('skin')
        if (tmp && $.inArray(tmp, mySkins)) changeSkin(tmp)
            // Add the change skin listener
        $('[data-skin]').on('click', function (e) {
            if ($(this).hasClass('knob')) return
            e.preventDefault()
            changeSkin($(this).data('skin'))
        })
    }
    setup()
    $("#themecolors").on("click", "a", function () {
        $("#themecolors li a").removeClass("working"), 
        $(this).addClass("working")
    })


// $('td').on('click',function(){
        
//          if($(this).hasAttr('data-redirct')) {
//             var redirection = $(this).attr('data-redirct');
//              if(redirection == 1){
//                  var url = $(this).attr('data-url');
//                  var id = $(this).attr('data-id');
//                  window.location = base_url+url+'/'+id;
//              }else{
//                  return false;
//              }
//         } 
        
//     });
        
   $(document).on('click','.push-close',function () {
       $(this).parent().fadeOut('slow');
   }) ;
    if ($("#mymce").length > 0) {
        tinymce.init({
            selector: "textarea#mymce",
            theme: "modern",
            height: 300,
            // inline: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

        });
    }

    //Warning Message

    $(document).on('click','.deleted',function (e) {
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm) {
                window.location = url;
            }
        });
    });
    $(document).on('click','.archive',function (e) {
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "You will be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm) {
                window.location = url;
            }
        });
    });
    $(".select2").select2();
    $('.publish').bootstrapMaterialDatePicker({ weekStart : 0, time: false,minDate : new Date(new Date().getTime() + 24 * 60 * 60 * 1000) });
    $('.publish2').bootstrapMaterialDatePicker({ weekStart : 0, time: false,maxDate : new Date(new Date().getTime() + 24 * 60 * 60 * 1000) });
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
       var elem =  new Switchery($(this)[0], $(this).data());
    });
});
$(document).on("click",".onclick-follow",function(){
    var link = $(this).attr("data-url");
    window.location=link;
});
$('body').tooltip({
   selector: '[data-toggle="tooltip"]',
   trigger : 'hover'
});