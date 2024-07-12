<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{asset('/backend/dist/styles.css')}}">
        <link rel="stylesheet" href="{{asset('/backend/dist/all.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://tailwindcss.com"></script>        
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Sidebar -->
            
            <!-- Sidebar -->

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            
        </div>
        <script>
            function confirmation(ev)
            {
                ev.preventdefault();
                var urlToRedirect = evcurrentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                })
            }
        </script>
        <script src="{{asset('/backend/main.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    <!--Footer-->
    <footer class="bg-grey-darkest text-white p-2 mt-5">
        <div class="flex flex-1 mx-auto">&copy; Design by kelompok 3</div>
        <div class="flex flex-1 mx-auto">Distributed by:  <a href="https://github.com/FarhanRauf29/PBL_Kelompok_3" target=" _blank">Kelompok 3</a></div>
    </footer>
    <!--/footer-->
</html>
