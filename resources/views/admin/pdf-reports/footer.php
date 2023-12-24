<?php if (is_active_sidebar('footer') || is_active_sidebar('footer_column_three') || is_active_sidebar('footer_column_tow') || is_active_sidebar('footer_column_four')) { ?>
  <section class="first-footer">
    <h3 class="hide"><?php echo esc_html__('Footer', 'backhoe'); ?></h3>
    <div class="row">
      <section class="block">
				<?php
				if (backhoe_get_option('footer_column', 'four_columns') == 'one_columns') {
					$column_one = 12;
					$column_tow = '';
					$column_three = '';
					$column_four = '';

				} elseif (backhoe_get_option('footer_column', 'four_columns') == 'tow_a_columns') {
					$column_one = 6;
					$column_tow = 6;
					$column_three = '';
					$column_four = '';
				} elseif (backhoe_get_option('footer_column', 'four_columns') == 'tow_b_columns') {
					$column_one = 4;
					$column_tow = 8;
					$column_three = '';
					$column_four = '';
				} elseif (backhoe_get_option('footer_column', 'four_columns') == 'tow_c_columns') {
					$column_one = 8;
					$column_tow = 4;
					$column_three = '';
					$column_four = '';

				} elseif (backhoe_get_option('footer_column', 'four_columns') == 'three_columns') {
					$column_one = 3;
					$column_tow = 3;
					$column_three = 6;
					$column_four = '';
				} else {
					$column_one = 3;
					$column_tow = 3;
					$column_three = 3;
					$column_four = 3;
				}
				?>
        <div class="large-<?php echo esc_attr($column_one) ?> medium-6 columns">
					<?php dynamic_sidebar('footer') ?>
        </div>
				<?php if (backhoe_get_option('footer_column', 'four_columns') == 'tow_a_columns' or backhoe_get_option('footer_column', 'four_columns') == 'four_columns' or backhoe_get_option('footer_column', 'four_columns') == 'three_columns' or backhoe_get_option('footer_column', 'four_columns') == 'tow_b_columns' or backhoe_get_option('footer_column', 'four_columns') == 'tow_c_columns') { ?>
          <div class="large-<?php echo esc_attr($column_tow) ?> medium-6 columns">
						<?php dynamic_sidebar('footer_columns_tow') ?>
          </div>
				<?php } ?>

				<?php if (backhoe_get_option('footer_column', 'four_columns') == 'three_columns' or backhoe_get_option('footer_column', 'four_columns') == 'four_columns') { ?>
          <div class="large-<?php echo esc_attr($column_three) ?> medium-6 columns">
						<?php dynamic_sidebar('footer_columns_three') ?>
          </div>
				<?php } ?>

				<?php if (backhoe_get_option('footer_column', 'four_columns') == 'four_columns') { ?>
          <div class="large-<?php echo esc_attr($column_four) ?> medium-6 columns">
						<?php dynamic_sidebar('footer_columns_four') ?>
          </div>
				<?php } ?>
      </section>
    </div>
  </section>
<?php } ?>

<footer class="second-footer">
  <div class="row">
    <div class="copyright medium-12 large-12 columns">
      <div class="block text-center">
				<?php
				$backhoe_copyright = html_entity_decode(backhoe_get_option('copyright_text', '&copy; 2021 Backhoe All rights reserved. '));
				echo esc_html($backhoe_copyright);
				?>
      </div>
    </div>
  </div>
</footer>
</div>

<?php
$backhoe_style = backhoe_get_option('wd_menu_style');
if ($backhoe_style == "offcanvas") { ?>
  <a class="exit-off-canvas"></a>
<?php } ?>

	<?php wp_footer(); ?>

	<script>
		jQuery(document).ready(function($){
			$(".close").click(function(){
				$(".pt-perspective").addClass("top_hide");
	  			$(".top-header").hide();
			}); 

			var slider = $(".slider"),
			  	slides = slider.find('li'),
			  	nav = slider.find('nav'),
	      		navA = nav.find('p'),
	      		cur = 0,
	      		slideInterval = setInterval(goNext,5000),
	      		playing = true;

			slides.eq(cur).addClass('current');
			nav.children('p').eq(cur).addClass('current_dot');
			nav.on('click', 'p', function(event) {
				event.preventDefault();
		    cur = $(this).index();
				$(this).addClass('current_dot').siblings().removeClass('current_dot');
				slides.eq($(this).index()).addClass('current').removeClass('prev').siblings().removeClass('current');
				slides.eq($(this).index()).prevAll().addClass('prev');
				slides.eq($(this).index()).nextAll().removeClass('prev');
			});

		  	function slideIndex(){
		    	cur = (cur+slides.length)%slides.length;
		  	}

		  	function goNext(){
			    // slideIndex()
			    cur = cur+1;
			    cur = (cur+slides.length)%slides.length;
			    // cur = cur+1;
			   	navA.eq(cur).addClass('current_dot').siblings().removeClass('current_dot');
				slides.eq(cur).addClass('current').removeClass('prev').siblings().removeClass('current');
				slides.eq(cur).prevAll().addClass('prev');
				slides.eq(cur).nextAll().removeClass('prev');
	  		}

		  	$('#next').click(function(e){
		    	e.preventDefault();
		   	 	goNext();
		  	})

		  	function goPrev(){
				cur = cur-1;
				cur = (cur+slides.length)%slides.length;
		   
				navA.eq(cur).addClass('current_dot').siblings().removeClass('current_dot');
				slides.eq(cur).addClass('current').removeClass('prev').siblings().removeClass('current');
				slides.eq(cur).prevAll().addClass('prev');
				slides.eq(cur).nextAll().removeClass('prev');
			}

		   	$('#prev').click(function(e){
		    	e.preventDefault();
		    	goPrev();
		  	})

			slider.mouseenter(pauseSlideshow);
			slider.mouseleave(pauseSlideshow);

		  	function pauseSlideshow(){
			    if(playing){
			      	playing = false;
			    	clearInterval(slideInterval);
		    	}else{
		      		playing = true;
			    	slideInterval = setInterval(goNext,5000);
		    	}
			}

			$('.more_btn').click(function() {
  				$('.more_text').slideToggle();
  				$(this).hide();
			  	// if ($('.more_btn').text() == "Read more") {
			   //  	$(this).text("Read less")
			  	// } else {
			   //  	$(this).text("Read more")
			  	// }
			});
			
			$(".ftr_cta_sec p a").click(function() {
				$('html, body').animate({
					scrollTop: $("#top_sec").offset().top
				}, 2000);
			});
		});
	</script>
	<script>
(function($) {
    $(function()
    {
        
        $suburb = $('.suburb');
        $postcode = $('.postcode');
        $cost = $('#cost');
        $total = $('#total');
        $more = $('#more');
        $extra = $('.step3,.order');
        $responseField = $('#responseField');
        $gst = $('#gst');
        $sizeForForm = $('#sizeForForm');
        $price = $('#price');
        $notes = $('#notes');
        
        ajax = undefined;
        
        $('.postcode').on('input',function(e)
        {
            
            var $input = $(this);
            
            if($(this).val().length > 4) {
                $(this).val($(this).val().substr(0, 4));
            }
            if($(this).val().length == 4) {
            
                if(ajax) {
                    ajax.abort();
                }
                
                
                
                $input.addClass('loading');
            
                ajax = $.post('<?php echo admin_url('admin-ajax.php'); ?>',{'action':'get_suburbs', 'postcode':$(this).val(), 'dev': <?php echo (isset($_GET['testPrices']) ? 'true' : 'false' ); ?> }, function(response)
                {
                    
                    $input.removeClass('loading');
                    
                    if(response != 'Invalid')
                    {
                        $suburb.html(response);
                        $suburb.trigger('change');
                        $more.show();
                        
                    }
                    else
                    {
                        $responseField.html('Postcode '+$postcode.val()+' does not appear in our database. Please check and re-enter the postcode or contact our friendly staff on 1300 362 362 for assistance.');
                        $more.hide();
                    }
                });
            
            } else {
                $input.removeClass('loading');
                $more.hide();
                $responseField.html('');
            }
        });
        
        $suburb.on('change',function(e)
        {
                if(ajax) {
                    ajax.abort();
                }
            
            if($(this).val() != "Invalid Postcode Entered")
            {
                ajax = $.post('<?php echo admin_url('admin-ajax.php'); ?>',{'action':'get_sizes', 'location_id':$(this).find(':selected').data("price-sheet"), 'size':<?php echo isset($_GET['size']) ? $_GET['size'] : '2.0'; ?> , 'dev': <?php echo (isset($_GET['testPrices']) ? 'true' : 'false' ); ?>}, function(response)
                {
                	var skipOption = '';
                    $('#size').ddslick('destroy');
                    $('#size').html();
                    //$("#size").html(response);
                    console.log(response);
                    response.forEach(function(val, index){
                    	var skip 				= val.text;
                			
                			skipOption 	+= `<option value="${skip.split(' ')[0]}" data-value="${val.value}">${skip}</option>`;
                    });

                    $('#size').append(skipOption);
                    $('#size').ddslick({
                        data:response,
                        //truncateDescription:false,
                        //defaultSelectedIndex: 0,
                        onSelected:function(selectedOption)
                        {
                            console.log(selectedOption);
                            value = selectedOption.selectedData.value;                            
                            skipCost = parseFloat(value);                            
                            //skipCost = Math.ceil(skipCost * 20)/20; //round up to nearst 5c
                            
                            totalCost = skipCost;                         
                            gst = skipCost * 0.1;                          
                            
                            //gst = Math.round(gst * 20)/20; //round to nearst 5c                           
                            
                            totalCost = skipCost + gst;                           
                            
                            totalCost = Math.round(totalCost * 20)/20; //round to nearst 5c
                            
                            
                            $cost.html('$'+skipCost.toFixed(2));
                            $gst.html('$'+gst.toFixed(2));
                            $total.html('$'+totalCost.toFixed(2)+' AUD');
                            
                            $price.val(totalCost.toFixed(2));
                            
                            $sizeForForm.val(selectedOption.selectedData.text.split(' ')[0]);
                            //console.log(selectedOption.selectedData.notes);
                            //$notes.html(selectedOption.selectedData.notes);
                        }
                    });
                });
                
                $extra.show();
            } else {
                $extra.hide();
            }
        });
        
        $('.postcode').trigger('input');
        
        $('.postcode').keydown(function(e)
        {
            if(e.keyCode == 13) // enter key
            {
                e.preventDefault();
                return false;
            }
        });
        
    });
})(jQuery);
</script>
</body>
</html>