$(document).ready(function() {
	/* $(".mask-decimal").mask("000.000.000.000.000,00"); */
	$(".mask-cellphone").mask("(99) 9 9999-9999");
	$(".mask-telephone").mask("(99) 9999-9999");
	$(".mask-cpf").mask("999.999.999-99");
	$(".mask-cnpj").mask("99.999.999/9999-99");
	$(".mask-postal-code").mask("99999-999");
	$(".mask-time").mask("99:99");
	$(".mask-date").mask("99/99/9999");

	let MoneyOpts = {
		reverse:true,
		maxlength: false,
		placeholder: '0,00',
		onKeyPress: function(v, ev, curField, opts) {
			let mask = curField.data('mask').mask;
			  decimalSep = (/0(.)00/gi).exec(mask)[1] || ',';
		  if (curField.data('mask-isZero') && curField.data('mask-keycode') == 8)
			$(curField).val('');
		  else if (v) {
			// remove previously added stuff at start of string
			v = v.replace(new RegExp('^0*\\'+decimalSep+'?0*'), ''); //v = v.replace(/^0*,?0*/, '');
			v = v.length == 0 ? '0'+decimalSep+'00' : (v.length == 1 ? '0'+decimalSep+'0'+v : (v.length == 2 ? '0'+decimalSep+v : v));
			$(curField).val(v).data('mask-isZero', (v=='0'+decimalSep+'00'));
		  }
		}
	  };
	  
	$(".mask-decimal").mask("#0,00", MoneyOpts);

	var options = {
		onKeyPress: function (cpf, ev, el, op) {
			var masks = ['000.000.000-000', '00.000.000/0000-00'];
			$('.mask-cpf_cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
		}
	}
	
	$('.mask-cpf_cnpj').length > 11 ? $('.mask-cpf_cnpj').mask('00.000.000/0000-00', options) : $('.mask-cpf_cnpj').mask('000.000.000-00#', options);
});
