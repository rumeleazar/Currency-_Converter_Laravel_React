
<!-- THIS VIEW FILE IS ONLY USED FOR TESTING -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "{{ asset('css/app.css')}}" rel = "stylesheet">
    <title>Currency Converter</title>
</head>
<body class = "bg-gray-200">
    <nav class = "p-6 bg-white flex justify-center">
        
    </nav>

    <form action = "/controller" method = "POST"> 
        @csrf
        <div class="inline-block relative">
            <span class="text-gray-700">Amount</span>
            <input id ='value' name = 'value' class="form-input mt-1 block w-64 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" placeholder="1.00">
        </div>
        <div class="inline-block relative w-64 mt-10 ">
            <select name = "country" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value = "EUR">EURO</option>
                <option value = "INR">INR</option>
                <option value = "KRW">KRW</option>
                <option value = "INR">INR</option>
            </select>
        </div>
        <input type="submit" value = "Submit">
    </form>


</body>
</html>