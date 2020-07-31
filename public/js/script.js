//Custome Script Page


//		Searh DropDown Scrolling
(function($){
    $(window).on("load",function(){
        $(".searchBarSec .serFormArea .fleetDropDown .locaListFix").delegate("a[href='top']","click",function(e){
            e.preventDefault();
            $(".searchBarSec .serFormArea .fleetDropDown .locaListFix").mCustomScrollbar("scrollTo",$(this).attr("href"));
        });
    });
})(jQuery);

$(function(){
	$('#formOne, #formTwo').slideUp();
	
	$('#checkbox1').click(function(e) {
		if($(this).is(":checked")) {
			$('#formOne').slideDown('slow');
		}else{
			$('#formOne').slideUp('slow');
		}
		
	});
	$('#checkbox2').click(function(e) {
		if($(this).is(":checked")) {
			$('#formTwo').slideDown('slow');
		}else{
			$('#formTwo').slideUp('slow');
		}
		
	});
	
	$('#checkbox1, #checkbox2').click(function(e) {
		var ck1 = $('#checkbox1').is(":checked");
		var ck2 = $('#checkbox2').is(":checked");
		
		if(ck1 || ck2) {
			$('#btn-submit').attr('disabled', false).removeClass('grayishButton').addClass('redishButtonRound');
		}else{
			$('#btn-submit').attr('disabled', true).removeClass('redishButtonRound').addClass('grayishButton');
		}
	});
});


// Custom Drop Down Function
$('.hasDropEd').click(function () {
    $('.hasDropEd').removeClass('open');
    $(this).addClass('open');
});

// Custom Drop Down Function
$('.hasDropEdSecondary').click(function () {
    $(this).parent().next('.hasDropEd').addClass('open');
});

$(document).mouseup(function (e)
{
    var container = $(".hasDropEd");
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $('.hasDropEd').removeClass('open');
    }
});/*=======  END  ======*/



//      menu Close function
$(document).on("click","#closeTopMenu",function() {
    $('header .logoMenuTop .hasDropEd').removeClass('open');
});


// Latest News Read More Button function
/*
 function readMoreText(item){
 $(item).prev('readMrText').show();
 // alert(item);
 }*/
$('.latestNewsSec .edBtnRM input[type="button"]').click(function () {
    if($(this).parent().parent().hasClass('active') ) {
        $('.latestNewsSec .textSec').removeClass('active');
        $('.latestNewsSec .textSec .readMrText').slideUp(1000);
        $('.latestNewsSec .edBtnRM input[type="button"]').val('Read More');
        $('.latestNewsSec .edBtnRM input[type="button"]').removeClass('readLess')

    } else {
        $('.latestNewsSec .edBtnRM input[type="button"]').val('Read More');
        $('.latestNewsSec .edBtnRM input[type="button"]').removeClass('readLess');
        $('.latestNewsSec .textSec').removeClass('active');
        $('.latestNewsSec .textSec .readMrText').slideUp(1000);

        $(this).parents('.edBtnRM').siblings('.readMrText').slideDown(1000);
        $(this).parent().parent().addClass('active');
        $(this).val('Read Less');
        $(this).addClass('readLess')
    }
});


//		Upload type file function
$('.fileUploader .showFileType').click(function(e) {
    $(this).siblings('input.attachFile[type=file]').click();
    return false;
});
$('input.attachFile[type=file]').change(function(evt) {
    var valueIs = $(this).val();
    $(this).siblings('.fileUploader .showFileName').val(valueIs)
});	/*=======		END		======*/


//  Register New User Page new Check Box
$('.regFromTwo').slideUp();
$('#subReq').change(function () {
    if ($(this).is(":checked")) {
        $('.regFromTwo').slideDown();
        $('#oldRegister').attr('disabled','disabled');
        $('#oldRegister').addClass('disable');
    } else {
        $('.regFromTwo').slideUp();
        $('#oldRegister').prop('disabled', false);
        $('#oldRegister').removeClass('disable');
    }
})


// Summary and Registration check box Function
$('#checkOne input[type="checkbox"]').change(function () {
    if ($(this).is(":checked")) {
        $('#formOne').removeClass('grayScale');
		$('.sumRegFrmSec .btnsSec .edBtn.redishButtonRound').addClass('posRelZin3');

    } else {
        $('#formOne').addClass('grayScale');
		$('.sumRegFrmSec .btnsSec .edBtn.redishButtonRound').removeClass('posRelZin3');

    }
})
$('#checkTwo input[type="checkbox"]').change(function () {
    if ($(this).is(":checked")) {
        $('#formTwo').removeClass('grayScale');
    } else {
        $('#formTwo').addClass('grayScale');
    }
})

//      Equal Height JS Function
equalheight = function(container){

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function() {

        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

$(window).load(function() {
    equalheight('.makeEqlheight, .bookingDetailSec .sixBoxStr .col, .locationBoxes ul.boxes li, .myBookingRow .mBookingDTL > .col, section.bookingSec .singleRow .bookDtlSec .bookPSec .col');
});


$(window).resize(function(){
    equalheight('.makeEqlheight, .bookingDetailSec .sixBoxStr .col, .locationBoxes ul.boxes li, .myBookingRow .mBookingDTL > .col, section.bookingSec .singleRow .bookDtlSec .bookPSec .col');
});
