<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazcho Sound System | Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 8px;
        }
        
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="kolom animated">
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
        
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
