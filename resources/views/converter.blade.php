<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Currency Converter Prototype">
    <meta name="keywords" content="Euro, Dollar, Bitcoin, Currency Converter, Prototype">
    <meta name="author" content="Rafael Simionato">
    <meta name="robots" content="index, follow">

    <title>Currency Converter (Prototype)</title>

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
            margin-bottom: 10px;
            color: #fff;
        }

        .prototype-warning {
            background: rgba(255, 165, 0, 0.15);
            border: 1px solid #ffa500;
            color: #ffa500;
            padding: 12px 16px;
            border-radius: 6px;
            max-width: 520px;
            text-align: center;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        input[type="text"] {
            width: 200px;
            padding: 6px;
            border-radius: 4px;
            border: none;
        }

        select {
            padding: 6px;
            border-radius: 4px;
            border: none;
        }

        button {
            padding: 8px 18px;
            background-color: #3490dc;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #2266a9;
        }

        .bitcoin-symbol {
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        }

        .result-box {
            margin-bottom: 15px;
            padding: 10px 14px;
            background: rgba(52, 144, 220, 0.15);
            border: 1px solid #3490dc;
            border-radius: 5px;
            color: #fff;
        }
    </style>
</head>

<body>

<h1>Currency Converter</h1>

<div class="prototype-warning">
    ⚠️ This is a beta prototype created for experimentation and learning purposes only.  
    It is not production-ready and must not be used for real financial or investment decisions.
</div>

@if(isset($convertedAmount))
<div class="result-box">
    Converted Amount: {{ $symbol }} {{ $convertedAmount }}
</div>
@endif

<form method="POST" action="{{ route('converter.convert') }}">
    @csrf

    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" required>

    <br><br>

    <label for="from">From:</label>
    <select id="from" name="from" required>
        <option value="USD">$ USD – American Dollar</option>
        <option value="EUR">€ EUR – Euro</option>
        <option value="BTC" class="bitcoin-symbol">&#8383; BTC – Bitcoin</option>
        <option value="BRL">R$ BRL – Brazilian Real</option>
        <option value="GBP">£ GBP – Great British Pound</option>
        <option value="ARS">$ ARS – Argentine Peso</option>
        <option value="CAD">$ CAD – Canadian Dollar</option>
        <option value="AUD">$ AUD – Australian Dollar</option>
        <option value="JPY">¥ JPY – Japanese Yen</option>
    </select>

    <br><br>

    <label for="to">To:</label>
    <select id="to" name="to" required>
        <option value="EUR">€ EUR – Euro</option>
        <option value="USD">$ USD – American Dollar</option>
        <option value="BTC" class="bitcoin-symbol">&#8383; BTC – Bitcoin</option>
        <option value="BRL">R$ BRL – Brazilian Real</option>
        <option value="GBP">£ GBP – Great British Pound</option>
        <option value="ARS">$ ARS – Argentine Peso</option>
        <option value="CAD">$ CAD – Canadian Dollar</option>
        <option value="AUD">$ AUD – Australian Dollar</option>
        <option value="JPY">¥ JPY – Japanese Yen</option>
    </select>

    <br><br>

    <button type="submit">Convert</button>
</form>

</body>
</html>
