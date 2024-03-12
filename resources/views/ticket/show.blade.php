<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier la demande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (!empty($ticket))
                        <form class="form-request-for-assistance" method="post" action="{{ route('ticket_update') }}" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->id }}" />
                            <div>
                                <label for="subject">Objet</label>
                                <input placeholder="Problème d'impression..." type="text" name="subject" id="subject" value="{{ $ticket->subject }}" />
                            </div>
                            <div>
                                <label for="message">Message</label>
                                <textarea name="message" id="message">{{ $ticket->message }}</textarea>
                            </div>
                            <div><a class="attachment-link" href="http://localhost:8000/upload/{{ $ticket->attachment }}">{{ $ticket->attachment }}</a></div>
                            <div>
                                <label for="attachment">Remplacer la pièce jointe</label>
                                <input type="file" id="attachment" name="attachment" />
                            </div>

                            <input type="submit" value="Modifier" />
                        </form>
                    @endif

                    <div>
                        <form method="post" action="{{ route('message_store') }}">
                            @csrf <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->id }}" />
                            <div>
                                <label for="new-message">Nouveau message</label>
                                <input type="text" name="new_message" id="new_message" />
                            </div>

                            <input type="submit" value="Envoyer" />
                        </form>

                        <div class="message-list">
                            @if (isset($messages) && !empty($messages))
                                @foreach ($messages as $message)
                                    <p>{{ $message->message }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
