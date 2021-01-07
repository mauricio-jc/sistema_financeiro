(function($) {
	$(".data").on('focus', function() {
		$(".data").mask("99/99/9999");
	});

	$('.data').on('blur', function() {
		$(".data").unmask("99/99/9999");
	});

	$(".decimal").maskMoney({decimal:",", thousands:".", defaultZero: false, allowZero: true});

    //Campo apenas numeros
    $(".onlynumbers").on("keyup", function(e) {
        e.preventDefault();
        var expre = /[^\d]/g;
        $(this).val($(this).val().replace(expre,''));
   	});
    //Campo apenas numeros

    function number_format(number, decimals, decPoint, thousandsSep) {
  		number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  		var n = !isFinite(+number) ? 0 : +number
  		var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  		var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  		var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  		var s = ''

  		var toFixedFix = function (n, prec) {
    		var k = Math.pow(10, prec)
    		return '' + (Math.round(n * k) / k)
      		.toFixed(prec)
  		}

  		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
  		if (s[0].length > 3) {
    		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  		}
  		if ((s[1] || '').length < prec) {
    		s[1] = s[1] || ''
    		s[1] += new Array(prec - s[1].length + 1).join('0')
  		}

		return s.join(dec)
	}
})(jQuery);