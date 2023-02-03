<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet"> 
    <title>Login | Admin PDAM Web Portal</title>
</head>
<body class="max-h-screen">
    <div class="sm:flex gap-8 bg-white px-4 sm:px-0 sm:pr-8 md:pr-18 ">
        <div class="w-full bg-no-repeat bg-center bg-cover object-fit overflow-hidden sm:flex md:pl-4 lg:pl-32" style="background-image: url({{ asset("/images/PDAM.jpg") }})">
            
        </div>
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <p class="text-center mt-8 mb-4">
                please login below to start your work
            </p>
            <div class="w-full sm:max-w-md mt-6 py-4 overflow-hidden sm:rounded-lg">
                <div class="text-center">
                    <a href="/" class="text-blue1 text-xl text-center w-full mb-4">
                        <span class="text-sea font-medium">Admin</span> Web Portal PDAM Surya Sembada 
                    </a>
                </div>
                <form action="{{ route("login.authenticate") }}" method="POST" >
                    @csrf
                    <div class="mt-4">
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <div class="flex flex-col items-start">
                            <input type="text" id="email" name="email" class="mt-1 block w-full border-2 border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-1 text-sm outline-none"/>
                        </div>
                        @error('email')
                            <p class='text-sm text-red-600 mt-2'>{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    <div class="mt-4">
                        <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full border-2 border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-1 text-sm outline-none"/>
                        @error('password')
                            <p class='text-sm text-red-600 mt-2'>{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="py-2 mt-4 bg-sea text-white font-medium w-full rounded-md">Log in</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>