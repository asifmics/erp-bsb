@extends('layouts.admin')
@section('content')
<div class="kt-portlet">
  <div class="kt-portlet__body  kt-portlet__body--fit">
    <div class="row row-no-padding row-col-separator-lg">
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">Total Users</h4>
                  <span class="kt-widget24__desc">Joined New User</span>
            </div>
            <span class="kt-widget24__stats kt-font-brand">10</span>
          </div>
            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="kt-widget24__action">
            <span class="kt-widget24__change">Change</span>
            <span class="kt-widget24__number">78%</span>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">Total Employee</h4>
                  <span class="kt-widget24__desc">Employee Information</span>
            </div>
            <span class="kt-widget24__stats kt-font-warning">20</span>
          </div>
            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <div class="kt-widget24__action">
            <span class="kt-widget24__change">Change</span>
            <span class="kt-widget24__number">84%</span>
          </div>
      </div>
    </div>
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">Total Guest</h4>
                  <span class="kt-widget24__desc">Guest Information</span>
            </div>
            <span class="kt-widget24__stats kt-font-danger">100</span>
          </div>
          <div class="progress progress--sm">
            <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="kt-widget24__action">
            <span class="kt-widget24__change">Change</span>
            <span class="kt-widget24__number">69%</span>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">Total Student</h4>
                  <span class="kt-widget24__desc"> Student Information</span>
            </div>
            <span class="kt-widget24__stats kt-font-success">75</span>
          </div>
          <div class="progress progress--sm">
            <div class="progress-bar kt-bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="kt-widget24__action">
            <span class="kt-widget24__change">Change</span>
            <span class="kt-widget24__number">90%</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
