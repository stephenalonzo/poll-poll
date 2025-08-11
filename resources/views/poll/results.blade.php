<x-layout>
    <section class="p-6">
        <div class="mx-auto flex items-center justify-center">
            <div class="text-center">
                <h3 class="font-bold text-3xl">{{ $poll->poll_question }}</h3>
                <p class="mb-4">
                    by Author
                </p>
                <div class="w-full space-y-4">
                    @foreach ($optionCounts as $data)
                        <div class="mb-1 flex items-end justify-between">
                            <p class="text-base-content font-medium">{{ $data['option'] }}</p>
                            <span class="text-base-content font-light">{{ $data['percentage'] . '%' }}</span>
                        </div>
                        <div class="progress" role="progressbar" aria-label="75% Progressbar" aria-valuenow="15"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar w-[calc(100%)]"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="p-6">
        <div class="mx-auto flex items-center justify-center">
            <div id="chart"></div>
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
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            let chartLabels = @json(collect($optionCounts)->pluck('option'));
            let chartSeries = @json(collect($optionCounts)->pluck('count'));

            var options = {
                series: chartSeries,
                chart: {
                    type: 'pie',
                    height: 350
                },
                colors: ['#794dff', '#76717f', '#3b82f6'],
                labels: chartLabels,
                responsive: [{
                    breakpoint: 768,
                    options: {
                        chart: {
                            width: 375
                        },
                        legend: {
                            position: 'right'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    </section>
</x-layout>
