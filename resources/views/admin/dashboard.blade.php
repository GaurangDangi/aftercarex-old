@extends('admin.layouts.app')
@push('style-datatable')
@endpush
@section('panel')
<div class="row">
	<!-- New Visitors & Activity -->
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="card-body row g-4">
				<div class="col-md-6 pe-md-4 card-separator">
					<a href="{{ route('institution') }}">
						<div class="card-title d-flex align-items-start justify-content-between">
							<h5 class="mb-0">Total Institutions</h5>
						</div>
						<div class="d-flex justify-content-between">
							<div class="mt-auto">
								<h2 class="text-success mb-2">{{ $total_institution }}</h2>
							</div>
							<div id="visitorsChart"></div>
						</div>
					</a>
				</div>

				<div class="col-md-6 ps-md-4">
					<a href="{{ route('client') }}">
						<div class="card-title d-flex align-items-start justify-content-between">
							<h5 class="mb-0">Total Clients</h5>
						</div>
						<div class="d-flex justify-content-between">
							<div class="mt-auto">
								<h2 class="text-success mb-2">{{ $total_client }}</h2>
							</div>
							<div id="activityChart"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--/ New Visitors & Activity -->
	@endsection
	@push('script')
	@endpush