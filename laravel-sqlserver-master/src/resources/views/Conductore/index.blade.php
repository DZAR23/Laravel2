<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Conductores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('Conductore.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear Conductore</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">id</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">name</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">movil</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">categoria</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">email</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conductore as $conductores)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $conductore->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $conductore->name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $conductore->movil }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $conductore->categoria }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $conductore->email }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $conductore->telefono }}</td>

                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('Conductore.edit', $conductore->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $conductore->id }}')">Delete</button>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // forma 1
    function confirmDelete(id) {
        alertify.confirm("¿Confirm delete record?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/conductore/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
            alertify.success('Ok');
        },
        function(){
            alertify.error('Cancel');
        });
    }

// forma 2
/* function confirmDelete(id) {
    alertify.confirm("¿Confirm delete record?", function (e) {
        if (e) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/conductore/' + id;
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
        } else {
            alertify.error('Cancel');
            return false;
        }
    });
} */
</script>
