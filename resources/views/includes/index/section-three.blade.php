<div class="three__waves-up">
    <img src="{{ asset('assets/img/svg/two-wave-up.svg') }}" alt="{{ trans('index.sections.Wave background') }}">
</div>

<section class="main__section-three">
    <div class="main__section-header">
        <span class="section__title">{{ trans('index.sections.Section three title') }}</span>
        <span class="section__subtitle">{{ trans('index.sections.Section three subtitle') }}</span>
    </div>

    <div class="section__three-content">
        <div class="section__three-right">
            <div class="nav flex-column gap-2 nav-pills p-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <input type="search" class="form-control"
                    placeholder="{{ trans('index.sections.Search placeholder') }}">

                <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                    role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <div class="d-flex justify-content-between">
                        <span>التكنولوجيا الحديثة</span>
                        <span class="nav__link-badge">5</span>
                    </div>
                </a>

                <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                    role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>الثقافة والفنون</span>
                        <span class="nav__link-badge">0</span>
                    </div>
                </a>

                <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages"
                    role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>العلوم والاكتشافات</span>
                        <span class="nav__link-badge">0</span>
                    </div>
                </a>

                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                    role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>السفر والمغامرة</span>
                        <span class="nav__link-badge">1</span>
                    </div>
                </a>

                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                    role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>الصحة والعافية</span>
                        <span class="nav__link-badge">14</span>
                    </div>
                </a>

                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                    role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>الأدب والثقافة العامة</span>
                        <span class="nav__link-badge">0</span>
                    </div>
                </a>

                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                    role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>عرض الكل</span>
                        <span class="nav__link-badge">57</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="section__three-left tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="post__category">
                    <img src="{{ asset('assets/img/others/Sustainable Style.jpg') }}" alt="">
                    <div class="overlay-text"></div>
                    <div class="post__category-title">
                        <span>
                            كيف يمكن للذكاء الاصطناعي تحسين خدمات الرعاية الصحية؟
                        </span>
                    </div>
                    <div class="post__category-link">
                        <a href="#" class="text-white">{{ trans('index.sections.View article') }}</a>
                    </div>
                </div>

                <div class="post__category">
                    <img src="{{ asset('assets/img/others/Sustainable Style.jpg') }}" alt="">
                    <div class="overlay-text"></div>
                    <div class="post__category-title">
                        <span>
                            كيف يمكن للذكاء الاصطناعي تحسين خدمات الرعاية الصحية؟
                        </span>
                    </div>
                    <div class="post__category-link">
                        <a href="#" class="text-white">{{ trans('index.sections.View article') }}</a>
                    </div>
                </div>

                <div class="post__category">
                    <img src="{{ asset('assets/img/others/Sustainable Style.jpg') }}" alt="">
                    <div class="overlay-text"></div>
                    <div class="post__category-title">
                        <span>
                            كيف يمكن للذكاء الاصطناعي تحسين خدمات الرعاية الصحية؟
                        </span>
                    </div>
                    <div class="post__category-link">
                        <a href="#" class="text-white">{{ trans('index.sections.View article') }}</a>
                    </div>
                </div>

                <div class="post__category">
                    <img src="{{ asset('assets/img/others/Sustainable Style.jpg') }}" alt="">
                    <div class="overlay-text"></div>
                    <div class="post__category-title">
                        <span>
                            كيف يمكن للذكاء الاصطناعي تحسين خدمات الرعاية الصحية؟
                        </span>
                    </div>
                    <div class="post__category-link">
                        <a href="#" class="text-white">{{ trans('index.sections.View article') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="three__waves-down">
    <img src="{{ asset('assets/img/svg/three-wave-down.svg') }}"
        alt="{{ trans('index.sections.Wave background') }}">
</div>
