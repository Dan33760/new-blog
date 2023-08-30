<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 text-gray-900">
                    {{-- contenu de notre page --}}

                    <form method="POST" action="{{ route('category-store') }}">
                        @csrf
                        {{-- Input --}}
                        <div class="mb-6">
                            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Nom Categorie</label>
                            <input type="text" id="nom"
                                name="nom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5">
                                @error('nom')
                                    {{ $message }}
                                @enderror
                        </div>

                        {{-- Textarea --}}
                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                                Description</label>
                            <textarea id="description" rows="4"
                                name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Write your thoughts here..."></textarea>
                                @error('description')
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