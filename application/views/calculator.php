<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="mt-5 col-md-4">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th colspan="4"><input type="number" name="number1" id="number1" class="form-control"></th>
			</tr>
			<tr>
				<th><button class="btn btn-sm btn-default w-100" onclick="clearInput()">C</button></th>
				<th colspan="2"><div class="text-right">Output</div></th>
				<th width="150px"><span id="output">0</span></th>
			</tr>
			<tr>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(7)">7</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(8)">8</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(9)">9</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="calculate('/')">/</button></th>
			</tr>
			<tr>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(4)">4</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(5)">5</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(6)">6</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="calculate('*')">*</button></th>
			</tr>
			<tr>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(1)">1</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(2)">2</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="inputNumber(3)">3</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="calculate('-')">-</button></th>
			</tr>
			<tr>
				<th colspan="2"><button class="btn btn-sm btn-default w-100" onclick="inputNumber(0)">0</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="calculateTotal()">=</button></th>
				<th><button class="btn btn-sm btn-default w-100" onclick="calculate('+')">+</button></th>
			</tr>
			</thead>
		</table>
	</div>
</div>

<script>
	var newNumber = '';
	var oldNumber = '';
	var action = '';

	function clearInput() {
		$('#number1').val('');
		newNumber = '';
		oldNumber = '';
		action = '';
		$('#output').text("");
	}

	function inputNumber(number) {
		newNumber += String(number);
		$('#number1').val(newNumber);
	}

	function calculate(act) {
		oldNumber = newNumber;
		$('#number1').val('');
		$('#output').text(oldNumber + " " + act);
		action = act;
		newNumber = '';
	}

	function calculateTotal() {
		let result = 0;
		if (action === '+') {
			result = parseFloat(oldNumber) + parseFloat(newNumber);
		}

		if (action === '-') {
			result = parseFloat(oldNumber) - parseFloat(newNumber);
		}

		if (action === '*') {
			result = parseFloat(oldNumber) * parseFloat(newNumber);
		}

		if (action === '/') {
			result = parseFloat(oldNumber) / parseFloat(newNumber);
		}

		$('#output').text(oldNumber + " " + action + " " + newNumber + " = " + parseFloat(result));

		$.post('welcome/store_logs', {first_number: oldNumber, sec_number: newNumber, result: result, action: action});

		action = "";
		oldNumber = 0;
		newNumber = 0;

	}
</script>
</body>
</html>
