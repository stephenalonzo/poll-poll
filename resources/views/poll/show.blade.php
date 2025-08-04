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
                                <input type="radio" class="radio radio-primary" name="option"
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
    <section class="p-6">
        <div class="mx-auto flex items-center justify-center">
            <div class="text-start space-y-4">
                <h3 class="font-bold text-xl">Share</h3>
                <div class="space-y-2">
                    <p class="text-sm">Share the link</p>
                    <div class="flex items-start" x-data="{
                        link: '{{ url('/') . '/poll/' . $poll->poll_uid }}',
                        copied: false,
                        timeout: null,
                        copy() {
                            $clipboard(this.link)
                    
                            this.copied = true
                    
                            clearTimeout(this.timeout)
                    
                            this.timeout = setTimeout(() => {
                                this.copied = false
                            }, 3000)
                        }
                    }">
                        <div class="flex w-full gap-x-3">
                            <input id="clipboard-input" type="text" name="url" class="input"
                                value="{{ url('/') . '/poll/' . $poll->poll_uid }}" aria-label="Text to copy" />
                            <button type="button" class="js-clipboard btn btn-primary"
                                data-clipboard-target="#clipboard-input" data-clipboard-action="copy"
                                data-clipboard-success-text="Copied!" x-on:click="copy"
                                x-text="copied ? `Copied!` : `Copy`">
                                <span class="js-clipboard-success-text">Copy</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
