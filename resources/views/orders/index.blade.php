<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pedidos</title>
</head>

<body class="bg-gray-100">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
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
                    <p class="dark:text-gray-800 text-xl">Meus Pedidos</p>
                </div>
                <div class="mt-3 flex justify-end">
                    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300
                                font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
                                dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="add_button">
                        + Adicionar
                    </button>
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
                                <th>
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->client_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->order_date ? Carbon\Carbon::parse($order->order_date)->format('d/m/Y') :
                                    '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->delivery_date ?
                                    Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y') : '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->statusName }}
                                </td>
                                <td>
                                    <button type="button"
                                        class="edit_button text-blue-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                        value="{{ $order->id }}">
                                        <i data-feather="edit"></i>
                                        <span class="sr-only">Editar</span>
                                    </button>
                                    <button type="button"
                                        class="delete_button text-red-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        value="{{ $order->id }}">
                                        <i data-feather="trash"></i>
                                        <span class="sr-only">Excluir</span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4" colspan="6">
                                    Nenhum pedido encontrado
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white title-crud-modal">
                        Cadastrando Pedido
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Fechar</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="POST">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="client_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do
                                cliente</label>
                            <input type="text" name="client_name" id="client_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="order_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data do
                                Pedido</label>
                            <input type="date" name="order_date" id="order_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="delivery_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data da
                                Entrega</label>
                            <input type="date" name="delivery_date" id="delivery_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach($orderStatus as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="button"
                        class="submit_button text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Criar Pedido
                    </button>
                    <button type="button"
                        class="update_button text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        hidden>
                        Editar Pedido
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            const token = "{{ csrf_token() }}";

            $('.submit_button').click(function (e) {

                $('.submit_button').text('Salvando...')

                const clientName = $('#client_name').val();
                const orderDate = $('#order_date').val();
                const deliveryDate = $('#delivery_date').val();
                const status = $('#status').val();

                $.ajax({
                    url: 'api/orders/store',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        client_name: clientName,
                        order_date: orderDate,
                        delivery_date: deliveryDate,
                        status: status
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Sucesso!",
                            text: response.message,
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "Ok",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    },
                    error: function (error) {
                        $('.submit_button').text('Criar Pedido')

                        Swal.fire({
                            title: "Erro!",
                            text: error.responseJSON.message,
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "Ok",
                            icon: "error"
                        });
                    }
                });
            });

            $('.delete_button').click(function () {
                const orderId = $(this).val();

                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você não poderá reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sim, excluir!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `api/orders/${orderId}/destroy`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: "Sucesso!",
                                    text: response.message,
                                    showConfirmButton: true,
                                    confirmButtonText: "Ok",
                                    confirmButtonColor: '#3085d6',
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            }
                        });
                    }
                });
            });

            $('.edit_button').on('click', function () {
                $('.title-crud-modal').text('Editando Pedido');
                $('.submit_button').hide();
                $('.update_button').show();

                const orderId = $(this).val();

                $.ajax({
                    url: `/orders/${orderId}/edit`,
                    type: 'GET',
                    success: function (response) {
                        $('#client_name').val(response.client_name);
                        $('#order_date').val(response.order_date);
                        $('#delivery_date').val(response.delivery_date);
                        $('#status').val(response.status);
                        $('.update_button').val(orderId);

                    }
                });
            });

            $('#add_button').click(function () {
                $('.title-crud-modal').text('Cadastrando Pedido');
                $('#client_name').val('');
                $('#order_date').val('');
                $('#delivery_date').val('');
                $('#status').val('');
                $('.submit_button').show();
                $('.update_button').hide();
            });

            $('.update_button').on('click', function (e) {

                const orderId = $(this).val();
                const clientName = $('#client_name').val();
                const orderDate = $('#order_date').val();
                const deliveryDate = $('#delivery_date').val();
                const status = $('#status').val();

                $.ajax({
                    url: `api/orders/${orderId}/update`,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        client_name: clientName,
                        order_date: orderDate,
                        delivery_date: deliveryDate,
                        status: status
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Sucesso!",
                            text: response.message,
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "Ok",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                });
            });
        });

        feather.replace();
    </script>
</body>

</html>