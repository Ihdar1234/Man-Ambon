<!DOCTYPE html>
<html lang="id" data-theme="light"
      x-data="dashboard()"
      x-init="init()">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Operator</title>

    <!-- LIBRARY -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- PREMIUM STYLE -->
    <style>
        /* SIDEBAR */
        .sidebar-premium {
            background: linear-gradient(180deg, #1e2a78 0%, #27338f 40%, #3240aa 100%);
            color: white;
            transition: width .3s ease;
        }

        .sidebar-premium nav a {
            transition: all .3s ease;
        }

        .sidebar-premium nav a:hover {
            background: linear-gradient(90deg, rgba(255,255,255,.12), rgba(255,255,255,.05));
            border-left: 4px solid #FFD700;
            transform: translateX(5px);
            backdrop-filter: blur(6px);
        }

        .sidebar-premium nav a:hover i {
            color: #FFD700;
        }

        /* HEADER */
        .header-premium {
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(12px) saturate(180%);
            border-bottom: 1px solid rgba(0,0,0,.06);
        }

        /* CARD */
        .card-premium {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
            transition: .3s;
        }

        .card-premium:hover {
            transform: translateY(-4px);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    @include('dashboard.operator.sidebar')

    <!-- OVERLAY MOBILE -->
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 lg:hidden"
         x-show="sidebar && !isDesktop"
         x-transition.opacity
         @click="sidebar = false"
         style="display:none"></div>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- HEADER -->
        @include('dashboard.operator.header')

        <!-- CONTENT -->
        <main class="p-6 overflow-y-auto h-[calc(100vh-80px)]">
            @yield('content')
        </main>

    </div>

    <!-- SCRIPT -->


</body>
</html>
