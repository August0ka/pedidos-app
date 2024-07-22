<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pedidos</title>
</head>

<body class="bg-gray-100">

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i data-feather="box"></i>
                        <span class="ms-3">Pedidos</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="p-4 mb-4 rounded h-full">
                <div>
                    <p class="dark:text-gray-800 text-xl">Pedidos</p>
                </div>


                <div class="relative overflow-x-auto mt-8 rounded ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nome do cliente
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data do Pedido
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data da Entrega
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="px-6 py-4">
                                    Danilo
                                </td>
                                <td class="px-6 py-4">
                                    23/11/2024
                                </td>
                                <td class="px-6 py-4">
                                    11/56/4000
                                </td>
                                <td class="px-6 py-4">
                                    teste
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const darkMode = `
                <button class="flex items-center p-2 mb-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i data-feather="moon"></i>
                </button>
                <hr>`;
            const lightMode = `
                <button class="flex items-center p-2 mb-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i data-feather="sun"></i>
                </button>
                <hr>
            `
            $('#change_theme').append()
        });
        feather.replace();
    </script>
</body>

</html>