<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Currency-Converter">
    <meta name="keywords" content="Euro, Dollar, Bitcoin">
    <meta name="author" content="Rafael Simionato">
    <meta name="robots" content="index, follow">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        padding: 20px;
        background-color: #000;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-image: linear-gradient(to bottom, #000, #333);
    }

    h1 {
        margin-bottom: 20px;
        color: #fff;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #fff;
    }

    input[type="text"] {
        width: 200px;
        padding: 5px;
    }

    select {
        padding: 5px;
    }

    button {
        padding: 8px 15px;
        background-color: #3490dc;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2266a9;
    }
    .bitcoin-symbol {
  font-family: 'segoe-UI';
}

</style>
    <title>Currency Converter</title>
</head>

<body>
<h1>Currency Converter</h1>

@if(isset($convertedAmount))
<div>Converted Amount: {{ $symbol }} {{ $convertedAmount }}</div>
@endif
<br><br>
<form method="POST" action="{{ route('converter.convert') }}">
    @csrf
    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" required><br><br>

    <label for="from">From:</label>
    <select id="from" name="from" required>
        <option value="USD">$ USD American Dollar </option>
        <option value="EUR">€ EUR Euro</option>
        <option value="BTC" class="bitcoin-symbol" >&#8383; BTC Bitcoin</option>
        <option value="BRL">R$ BRL Brazilian Real</option>
        <option value="GBP">£ GBP Great British Pound</option>
        <option value="ARS">$ ARS Argentinian Peso</option>
        <option value="CAD">$ CAD Canadian Dollar</option>
        <option value="AUD">$ AUD Australian Dollar</option>
        <option value="JPY">¥ JPY Japanese Yen</option>
        
        <!-- Add more currency options as needed -->
    </select>
        <br><br>
    <label for="to">To:</label>
    <select id="to" name="to" required>
        <option value="EUR">€ EUR Euro</option>
        <option value="USD">$ USD American Dollar </option>
        <option value="BTC" class="bitcoin-symbol" >&#8383; BTC Bitcoin</option>
        <option value="BRL">R$ BRL Brazilian Real</option>
        <option value="GBP">£ GBP Great British Pound</option>
        <option value="ARS">$ ARS Argentinian Peso</option>
        <option value="CAD">$ CAD Canadian Dollar</option>
        <option value="AUD">$ AUD Australian Dollar</option>
        <option value="JPY">¥ JPY Japanese Yen</option>
        
        <!-- Add more currency options as needed -->
    </select>

    <button type="submit">Convert</button>
</form>
</body>
</html>
