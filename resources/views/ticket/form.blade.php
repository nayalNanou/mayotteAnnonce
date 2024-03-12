<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Demande d\'assistance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="form-request-for-assistance" method="post" action="http://localhost:8000/ticket/save" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                        <input type="hidden" name="user_id" id="user_id" value="{{ $idLoggedInUser }}" />
                        <div>
                            <label for="subject">Objet</label>
                            <input placeholder="Problème d'impression..." type="text" name="subject" id="subject" />
                        </div>
                        <div>
                            <label for="message">Message</label>
                            <textarea name="message" id="message"></textarea>
                        </div>
                        <div>
                            <label for="attachment">Pièce jointe</label>
                            <input type="file" id="attachment" name="attachment" />
                        </div>

                        <input type="submit" value="Envoyer" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
