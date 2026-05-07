<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
            @forelse ($chirps as $chirp)
                <div class="card bg-base-100 shadow mt-8">
                    <div class="card-body">
                        <div>
                            <div class="font-semibold">
                                {{ $chirp->user->name ?? 'Unknown User' }}
                            </div>
                            <p class="mt-1">
                                {{ $chirp->message->limit(244) }}
                            </p>
                            <p class="text-sm text-gray-500 mt-2">
                                {{ $chirp->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No chirps to display.</p>
            @endforelse
        </div>
</x-layout>