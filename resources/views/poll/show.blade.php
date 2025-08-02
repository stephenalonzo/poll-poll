<x-layout>
    <section class="p-6">
        <div class="mx-auto flex items-center justify-center">
            <div class="text-center">
                <h3 class="font-bold text-3xl">{{ $poll->poll_question }}</h3>
                <p class="mb-4">
                    by Author
                </p>
                <form action="/poll/{{ $poll->poll_uid }}/vote" method="post" class="space-y-4">
                    @csrf
                    @if ($poll->poll_multipleOptions == 1)
                        @foreach ($poll->poll_option as $option)
                            <div class="flex items-center gap-1">
                                <input type="checkbox" class="checkbox" name="option[]" value="{{ $option }}"
                                    id="option_{{ str_replace(' ', '', $option) }}" />
                                <label class="label-text text-base"
                                    for="option_{{ str_replace(' ', '', $option) }}">{{ $option }}</label>
                            </div>
                        @endforeach
                    @else
                        @foreach ($poll->poll_option as $option)
                            <div class="flex items-center gap-1">
                                <input type="radio" class="radio radio-primary" name="option[]"
                                    value="{{ $option }}" id="option_{{ str_replace(' ', '', $option) }}" />
                                <label class="label-text text-base"
                                    for="option_{{ str_replace(' ', '', $option) }}">{{ $option }}</label>
                            </div>
                        @endforeach
                    @endif
                    <div class="flex flex-col items-end space-y-3">
                        <button type="submit" class="w-full btn btn-primary">
                            Submit Vote
                        </button>
                        <a href="" class="text-sm font-medium text-primary">View Results</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
