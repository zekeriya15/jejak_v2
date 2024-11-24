{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Jejak Style CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            position: relative;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 16px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 5px 15px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .link-secondary {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        .link-secondary:hover {
            text-decoration: underline;
        }

        .update-btn-container {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .cancel-btn-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .cancel-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 15px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Edit Profile</h2>

        <form action="php/edit.php" method="post">
            
            <!-- Full Name -->
            <div class="form-group">
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter full name" required>
            </div>
            
            <!-- Username -->
            <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter username" required>
            </div>
            
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            
            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password (leave blank to keep current)">
            </div>
            
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter phone number" required>
            </div>

            <!-- Update Button (Bottom Left) -->
            <div class="update-btn-container">
                <button type="submit" class="btn">Update</button>
            </div>
        </form>

        <!-- Cancel Button (Bottom Right) -->
        <div class="cancel-btn-container">
            <button class="cancel-btn" onclick="window.location.href='home.php'">Cancel</button>
        </div>
    </div>
</div>

</body>
</html>  --}}



<x-layout>
    <section>
    <div class="container">
        <h2>Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('PATCH')

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Username -->
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan username" value="{{ old('name', $user->name) }}" required>
            </div>
            
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email', $user->email) }}" required>
            </div>
            
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter phone number" value="{{ old('phone', $user->phone) }}">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password (leave blank to keep current)">
            </div>

            <!-- Password Confirmation -->
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password">
            </div>


            <!-- Update Button -->
            <div class="update-btn-container">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>

        {{-- <!-- Cancel Button -->
        <div class="cancel-btn-container">
            <button class="cancel-btn" onclick="window.location.href='home.php'">Cancel</button>
        </div> --}}
    </div>
    </section>
</x-layout>
