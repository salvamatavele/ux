@extends('layouts.app')
@section('content')
<div class="uk-container uk-flex-auto uk-container uk-margin">
	<h4 class="uk-heading-line"><span>Contact Messages</span></h4>
	<div class="uk-box-shadow-xlarge uk-padding">
		<ul class="uk-list uk-list-divider" uk-accordion>
			@foreach ($contacts as $contact)
			<li class="uk-open">
				<a class="uk-accordion-title" href="#">
					{{ $contact->name }}
					<br>
					<i class="uk-text-italic uk-text-default">{{ $contact->email }}</i>
					<i class="uk-text-meta uk-text-italic uk-text-small">on {{ $contact->created_at }}</i>
				</a>
				<div class="uk-accordion-content">
					<p>{{ $contact->message }}</p>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>
@endsection