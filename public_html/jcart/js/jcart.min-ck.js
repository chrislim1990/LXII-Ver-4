// jCart v1.3
// http://conceptlogic.com/jcart/
$(function(){var e=function(){function u(e){var n=e.find("[name="+i.item.qty+"]"),s=e.find("[name="+i.item.add+"]");$.ajax({data:e.serialize()+"&"+i.item.add+"="+s.val(),success:function(e){n.val()>0&&r.css("display")==="none"&&r.fadeIn("100").delay("400").fadeOut("100");t.html(e);$("#jcart-buttons").remove()}})}function a(e){var t=e.parent().find('[name="jcartItemId[]"]').val(),r=e.val();if(r)var i=window.setTimeout(function(){$.ajax({data:{jcartUpdate:1,itemId:t,itemQty:r,jcartIsCheckout:o,jcartToken:n}})},1e3);e.keydown(function(e){e.which!==9&&window.clearTimeout(i)})}function f(e){var t=e.attr("href");t=t.split("=");var n=t[1];$.ajax({type:"GET",data:{jcartRemove:n,jcartIsCheckout:o}})}var e="jcart",t=$("#jcart"),n=$("[name=jcartToken]").val(),r=$("#jcart-tooltip"),i=function(){var t=null;$.ajax({url:e+"/config-loader.php",data:{ajax:"true"},dataType:"json",async:!1,success:function(e){t=e},error:function(){alert("Ajax error: Edit the path in jcart.js to fix.")}});return t}(),s=function(){if(i.tooltip===!0){r.text(i.text.itemAdded);$(".jcart [type=submit]").mouseenter(function(e){var t=e.pageY+25,n=e.pageX+ -10;$("body").append(r);r.css({top:n+"px",left:t+"px"})}).mousemove(function(e){var t=e.pageY+25,n=e.pageX+ -10;r.css({top:t+"px",left:n+"px"})}).mouseleave(function(){r.hide()})}$("#jcart-buttons").remove();$.ajaxSetup({type:"POST",url:e+"/relay.php",success:function(e){t.html(e);$("#jcart-buttons").remove()},error:function(e,t){var n=e.status,r="Ajax error: ";n===0&&(r+="Check your network connection.");if(n===404||n===500)r+=n;if(t==="parsererror"||t==="timeout")r+=t;alert(r)}})}(),o=$("#jcart-is-checkout").val();$(".jcart").submit(function(e){u($(this));e.preventDefault()});t.keydown(function(e){e.which===13&&e.preventDefault()});t.delegate('[name="jcartItemQty[]"]',"keyup",function(){a($(this))});t.delegate(".jcart-remove","click",function(e){f($(this));e.preventDefault()})}()});