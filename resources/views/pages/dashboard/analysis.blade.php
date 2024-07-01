@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.analysis') }}">{{ trans('dashboard.analysis.Analysis') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('dashboard.analysis.Statistics') }}</a></li>
    </x-breadcrumb>
@endsection

<section class="analysis__wrapper">
    <div class="analysis__overview">
        <div class="overview__col">
            <div class="overview__col-1 text-bg-primary">
                <span class="material-icons-outlined">feed</span>
            </div>
            <div class="overview__col-2">
                <span>{{ trans('dashboard.analysis.Total articles') }}</span>
                <span>
                    {{ $totalArticles }}
                    <small class="text-muted">({{ Str::lower(trans('dashboard.analysis.Article')) }})</small>
                </span>
            </div>
        </div>

        <div class="overview__col">
            <div class="overview__col-1 text-bg-danger">
                <span class="material-icons-outlined">thumbs_up_down</span>
            </div>
            <div class="overview__col-2">
                <span>{{ trans('dashboard.analysis.Total reactions') }}</span>
                <span>
                    {{ $totalReactions }}
                    <small class="text-muted">({{ Str::lower(trans('dashboard.analysis.Reaction')) }})</small>
                </span>
            </div>
        </div>

        <div class="overview__col">
            <div class="overview__col-1 text-bg-success">
                <span class="material-icons-outlined">donut_small</span>
            </div>
            <div class="overview__col-2">
                <span>{{ trans('dashboard.analysis.Reaction rate') }}</span>
                <span>
                    {{ $averageReactionPerArticle }}
                    <small class="text-muted">({{ Str::lower(trans('dashboard.analysis.Reaction article')) }})</small>
                </span>
            </div>
        </div>
    </div>

    <div class="analysis__highest">
        <div class="d-flex gap-2">
            <span class="material-icons-outlined">equalizer</span>
            <span>{{ trans('dashboard.analysis.Articles highest') }}</span>
        </div>

        <div class="row row-cols-1 row-cols-md-2">
            <div class="col d-flex flex-column justify-content-center">
                <ul class="analysis__ul">
                    @forelse ($topFiveArticles as $topFive)
                        <li>
                            <a href="#">{{ $topFive->title }}</a>
                            <small class="text-muted ms-2">(#{{ $topFive->id }})</small>
                        </li>
                    @empty
                        <div class="d-flex flex-column align-items-center text-muted">
                            <span>{{ trans('dashboard.analysis.Empty line one') }}</span>
                            <span>{{ trans('dashboard.analysis.Empty line two') }}</span>
                        </div>
                    @endforelse
                </ul>
            </div>

            <div class="col d-flex justify-content-center">
                @if (!empty($topFiveArticlesChart['articleId'] && $topFiveArticlesChart['likeCounts']))
                    <div class="analysis__chart" id="highest-articles"></div>
                @endif
            </div>
        </div>
    </div>

    <div class="analysis__tracker">
        <div class="tracker__articles">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">insights</span>
                <span>{{ trans('dashboard.analysis.Track posting') }}</span>
            </div>
            <div class="d-flex justify-content-center mt-3">
                @if (empty($articlesPerDayChart->toArray()))
                    <div class="d-flex flex-column align-items-center text-muted">
                        <span>{{ trans('dashboard.analysis.Empty line one') }}</span>
                        <span>{{ trans('dashboard.analysis.Empty line two') }}</span>
                    </div>
                @else
                    <div class="analysis__chart" id="track-posting"></div>
                @endif
            </div>
        </div>

        <div class="tracker__reactions">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">donut_small</span>
                <span>{{ trans('dashboard.analysis.Reaction rate') }}</span>
            </div>
            <div class="d-flex justify-content-center mt-3">
                @if (empty($reactionsChart['totalLikes'] || $reactionsChart['totalDislikes']))
                    <div class="d-flex flex-column align-items-center text-muted">
                        <span>{{ trans('dashboard.analysis.Empty line one') }}</span>
                        <span>{{ trans('dashboard.analysis.Empty line two') }}</span>
                    </div>
                @else
                    <div class="analysis__chart" id="reaction-rate"></div>
                @endif
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
    <script>
        var highestArticlesChart = echarts.init(document.getElementById('highest-articles'));
        var highestArticlesOption = {
            tooltip: {},
            legend: {
                data: [@json(trans('dashboard.analysis.Number of likes'))]
            },
            xAxis: {
                data: @json($topFiveArticlesChart['articleId'])
            },
            yAxis: {},
            series: [{
                name: @json(trans('dashboard.analysis.Number of likes')),
                type: 'bar',
                data: @json($topFiveArticlesChart['likeCounts']),
                barWidth: '50%'
            }]
        };
        highestArticlesChart.setOption(highestArticlesOption);
    </script>

    <script>
        var trackPostingChart = echarts.init(document.getElementById('track-posting'));
        var trackPostingOption = {
            tooltip: {},
            legend: {
                data: [@json(trans('dashboard.analysis.Number of articles'))],
            },
            xAxis: {
                data: @json($articlesPerDayChart->pluck('date')),
            },
            yAxis: {},
            series: [{
                name: @json(trans('dashboard.analysis.Number of articles')),
                type: 'line',
                data: @json($articlesPerDayChart->pluck('count')),
                symbolSize: 10,
                smooth: true,
            }]
        };
        trackPostingChart.setOption(trackPostingOption);
    </script>

    <script>
        var reactionRateChart = echarts.init(document.getElementById('reaction-rate'));
        var reactionRateOption = {
            tooltip: {},
            legend: {
                data: [@json(trans('dashboard.analysis.Number of likes')), @json(trans('dashboard.analysis.Number of dislikes'))]
            },
            series: [{
                name: @json(trans('dashboard.analysis.Reactions')),
                type: 'pie',
                radius: '50%',
                data: [{
                        value: {{ $reactionsChart['totalLikes'] }},
                        name: @json(trans('dashboard.analysis.Number of likes')),
                    },
                    {
                        value: {{ $reactionsChart['totalDislikes'] }},
                        name: @json(trans('dashboard.analysis.Number of dislikes')),
                        itemStyle: {
                            color: 'orange'
                        }
                    }
                ]
            }]
        };
        reactionRateChart.setOption(reactionRateOption);
    </script>
@endpush
