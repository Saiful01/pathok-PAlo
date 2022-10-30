@extends("layouts.admin")
@section('title', 'Admin Panel')
@section("content")

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <a class="block block-bordered block-rounded block-link-shadow text-start"
               href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-3 fw-semibold">{{$guest}}</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Guests</div>
                    </div>
                    <div>
                        <i class="si si-bag fa-2x opacity-25"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-bordered block-rounded block-link-shadow text-start"
               href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-3 fw-semibold">{{$confirmed}}</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Check-in Count</div>
                    </div>
                    <div>
                        <i class="si si-wallet fa-2x opacity-25"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-bordered block-rounded block-link-shadow text-start"
               href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-3 fw-semibold">{{$mail_sent}}</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Mail sent</div>
                    </div>
                    <div>
                        <i class="si si-globe fa-2x opacity-25"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-bordered block-rounded block-link-shadow text-start"
               href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-3 fw-semibold">7</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Login</div>
                    </div>
                    <div>
                        <i class="si si-briefcase fa-2x opacity-25"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a class="block block-bordered block-rounded" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <i class="si si-game-controller fa-2x text-body-bg-dark"></i>
                    <div class="row pt-2 pb-4 text-center">
                        <div class="col-6 border-end">
                            <div class="fs-3 fw-semibold">190</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Games</div>
                        </div>
                        <div class="col-6">
                            <div class="fs-3 fw-semibold">870</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Subscriptions</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a class="block block-bordered block-rounded" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="text-end">
                        <i class="si si-wallet fa-2x text-body-bg-dark"></i>
                    </div>
                    <div class="row pt-2 pb-4 text-center">
                        <div class="col-6 border-end">
                            <div class="fs-3 fw-semibold">$840</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Today</div>
                        </div>
                        <div class="col-6">
                            <div class="fs-3 fw-semibold">$4,490</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Last Week</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
