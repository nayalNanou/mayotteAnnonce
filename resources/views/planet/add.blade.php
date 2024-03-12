<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une planète') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (!empty($ticket))
                        <form class="form-request-for-assistance" method="post" action="/planet/save" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->id }}" />
                            <div>
                                <label for="subject">Name</label>
                                <input type="text" name="subject" id="subject" value="{{ $ticket->subject }}" />
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!--

        $planet->name = $request->input('name');
        $planet->image = $request->Input('image');
        $planet->size = $request->input('size');
        $planet->speed = $request->input('speed');
        $planet->radius = $request->input('radius');
        $planet->origin_y = $request->input('origin_y');
        $planet->origin_x = $request->input('origin_y');
        $planet->is_moving_to_the_right = $request->input('is_moving_to_the_right');
-->
