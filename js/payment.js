$(document).ready(function() {
	if($('#creditcard').is(':checked')){
		$('#enter-form').empty();
		$("#enter-form").append('<label class="ccjs-num">Card number<input name="card-number" placeholder="**** **** **** ****"><label>');	
		$("#enter-form").append('<label class="ccjs-csc">Security Code<input class="ccjs-csc" name="csc" placeholder="***" inputmode="numeric" pattern="\d*" ></label></br>');
		$("#enter-form").append('<label class="csjs-name">Name on Card<input class="ccjs-name" name="name"></label>');
		$("#enter-form").append('<fieldset class="ccjs-month"><legend>Expiration</legend><select><option selected="" disabled="">MM</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option></select><select class="ccjs-year name="year""><option selected="" disabled="">YY<option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select></fieldset>');
	} else if ($('#paypal').is(':checked')) {
		$('#enter-form').empty();
	}
});
