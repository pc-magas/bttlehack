<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
<body>	

<form id="checkout" method="post" action="./donate_to">
  <div id="payment-form"></div>
  <input type="hidden" value="12">
  <input type="submit" value="Pay $10">
</form>

<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
<script>
// We generated a client token for you so you can copy and paste this code
// and try it out right away. See the section below to generate your
// own client token.
var clientToken = "<?=$client_token?>";

braintree.setup(clientToken, "dropin", {
  container: "payment-form"
});
</script>
</body>
</html>