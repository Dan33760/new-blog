<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-between p-6 text-gray-900">
                    <div>
                        @if(session('status'))
                            {{ session('status') }}
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('post-add') }}"
                            style="background-color: blue; margin:5px 10px; padding:5px 10px; color:white"
                            class="m-5">Ajouter</a>
                    </div>
                </div>

                <div class="flex justify-center p-6 text-gray-900">
                    {{-- contenu de notre page --}}
                    <div class="relative overflow-x-auto">
                        {{-- Lien --}}

                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Categorie
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Titre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Contenu
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($articles) --}}
                                @foreach ($articles as $item)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $item->category->nom }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->titre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->contenu }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ Storage::url($item->image) }}" width="50px" height="50px" alt="">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('post-edit', $item->id) }}">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('post-delete', $item->id) }}">Suprimmer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Fin contenu --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>