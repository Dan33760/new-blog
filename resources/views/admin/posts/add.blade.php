<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 text-gray-900">
                    {{-- contenu de notre page --}}

                    <form method="POST" action="{{ route('post-store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- Select --}}
                        <div class="mb-6">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select an
                                option</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 ">
                                <option selected>Choisir la Categorie</option>

                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach

                            </select>
                            @error('category')
                            {{ $message }}
                            @enderror

                        </div>
                        {{-- Input --}}
                        <div class="mb-6">
                            <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Titre</label>
                            <input type="text" id="titre" name="titre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5">
                            @error('titre')
                            {{ $message }}
                            @enderror
                        </div>

                        {{-- Textarea --}}
                        <div class="mb-6">
                            <label for="contenu" class="block mb-2 text-sm font-medium text-gray-900">
                                Contenu</label>
                            <textarea id="contenu" rows="4"
                                name="contenu"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Write your thoughts here..."></textarea>
                            @error('contenu')
                            {{ $message }}
                            @enderror
                        </div>

                        {{-- File --}}
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Upload
                                file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="image" type="file" name="image">
                                @error('image')
                                {{ $message }}
                                @enderror
                        </div>

                        <button type="submit" class="btn">Submit</button>
                    </form>

                    {{-- Fin contenu --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>