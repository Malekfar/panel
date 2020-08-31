<!-- MultiStep Form -->
<div class="row multistep-form">
    <div class="col-md-12">
        <form id="msform">
            {{$slot}}
        </form>
    </div>
</div>
<!-- /.MultiStep Form -->

@push('scripts')
    <script>

        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var right, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

       /* $(".next").click(function(){
            if(animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(current_fs)).addClass("active");
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("pre-active");



            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    right = (now * 50)+"%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale('+scale+')',
                        'position': 'absolute'
                    });
                    next_fs.css({'right': right, 'opacity': opacity, 'position': 'relative'});
                },
                duration: 800,
                complete: function(){
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function(){
            if(animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(previous_fs)).removeClass("active");
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("pre-active");
            //show the previous fieldset
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    right = ((1-now) * 50)+"%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'right': right
                    });
                    previous_fs.show();
                    previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                },
                duration: 800,
                complete: function(){
                    current_fs.hide();
                    animating = false;
                    previous_fs.css({'position': 'relative'});
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });*/

        $("body").on('click', '#progressbar li', function (){
            var curentClassId = $('#progressbar li.active').attr('class-id');
            var nextClassId = $(this).attr('class-id');
            $("#store-category-form input[name='class_id']").val(nextClassId);
            $("#action-edit-class").attr("onclick",`editClass('${nextClassId}')`);
            $("#action-delete-class").attr("onclick",`deleteClass('${nextClassId}')`);

            if(curentClassId < nextClassId) {
                next(
                    $(`fieldset[class-id='${curentClassId}']`),
                    $(`fieldset[class-id='${nextClassId}']`)
                );

            }

            if(curentClassId > nextClassId) {
                previus(
                    $(`fieldset[class-id='${curentClassId}']`),
                    $(`fieldset[class-id='${nextClassId}']`)
                );
            }

        });

        function next(current, next){
            current_fs = current;
            next_fs = next;

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    right = (now * 50)+"%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale('+scale+')',
                        'position': 'absolute'
                    });
                    next_fs.css({'right': right, 'opacity': opacity, 'position': 'relative'});
                },
                duration: 800,
                complete: function(){
                    current_fs.css({'transform': 'scale(1)'});
                    current_fs.hide();
                    animating = false;
                    next_fs.css({'right': 0});
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        }

        function previus(current, next){

            current_fs = current;
            previous_fs = next;
            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");



            //show the previous fieldset
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    right = ((1-now) * 50)+"%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'right': right
                    });
                    previous_fs.show();
                    previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                },
                duration: 800,
                complete: function(){
                    current_fs.hide();
                    animating = false;
                    previous_fs.css({'position': 'relative', 'transform': 'scale(1)'});
                    current_fs.css({
                        'right': 0
                    });
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        }

        $(".submit").click(function(){
            return false;
        })

    </script>
@endpush

@push('styles')
    <style>
        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            font-family: Vazir;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input, #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform input:focus, #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #ee0979;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #ee0979;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }

        /*headings*/
        .multistep-form .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .multistep-form .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        .multistep-form #progressbar {
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        .multistep-form #progressbar li {
            list-style-type: none;
            color: black;
            text-transform: uppercase;
            font-size: 9px;
            width: 17.33%;
            float: right;
            position: relative;
            cursor: pointer;
        }

        .multistep-form #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
            z-index: 1;
        }

        /*!*progressbar connectors*!
        .multistep-form #progressbar li:after {
            content: '';
            width: 85%;
            height: 2px;
            background: white;
            position: absolute;
            left: -46%;
            top: 11px;
            z-index: 100; !*put it behind the numbers*!
        }*/

        #progressbar li:last-child:after {
            content: none;
        }


        #progressbar li.pre-active:before {
            background: #ee0979;
            color: white;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        .multistep-form #progressbar li.active:before, #progressbar li.active:after {
            background: #ee0979;
            color: white;
        }
    </style>
@endpush
