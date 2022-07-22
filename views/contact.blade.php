@extends('layouts.app')
@section('content')
<div class="uk-container uk-flex-auto uk-container uk-margin" id="contact">
	<h4 class="uk-heading-line"><span>Contact Us</span></h4>
	<form method="POST" @submit.prevent='onSubmitSend'>
		<fieldset class="uk-fieldset">
			<div class="uk-margin">
				<label for="">Name</label>
				<input v-model="name" name="name" class="uk-input" type="text" placeholder="Write your name here.."
					required>
			</div>

			<div class="uk-margin">
				<label for="">Email</label>
				<input v-model="email" name="email" class="uk-input" type="email"
					placeholder="Let us know how to contact you back.." required>
			</div>

			<div class="uk-margin">
				<label for="">Message</label>
				<textarea v-model="message" name="message" class="uk-textarea" rows="5"
					placeholder="What would you like to tell us.."></textarea>
			</div>
			<button :disabled="loading" type="submit" class="uk-button uk-button-primary uk-width-1-1">Send Message
				<div v-if="loading" uk-spinner></div>
			</button>
			</button>
		</fieldset>
	</form>
</div>
@endsection
@push('js')
<script>
	var app = new Vue({
            el: '#contact',
			data:{
				name:'',
				email:'',
				message:'',
				loading: false,
			},
			methods:{
				reset(){
					this.name = '';
					this.email = '';
					this.message = '';
					this.loading = false;
				},
				onSubmitSend(event){
					console.log(this.email);
					if (this.name !== "" || this.email !== "" || this.message !== "") {
						const form = new FormData();
						form.append('name', this.name);
						form.append('email', this.email);
						form.append('message', this.message);
						axios({
                                method: 'post',
                                url: "{{ $router->route('contact.store') }}",
                                data: form
                            })
                            .then(response => {
                                this.loading =! true;
                                if (response.data.status === 201) {
									this.reset();
                                    if (response.data.message) {
                                        Toast.fire({
                                            icon: 'success',
                                            title: response.data.message,
                                        })
                                    }
                                } else {
									this.loading =! true;
									// back-end validations errors 
                                    if (response.data.errors) {
                                        var errors = response.data.errors
                                        let text = ''
                                        for (let i in errors) {
                                            text += errors[i] + '\n';

                                        }
                                        Toast.fire({
                                            icon: 'error',
                                            title: text,
                                        })
                                    }
									// post error  
                                    if (response.data.message) {
                                        Toast.fire({
                                            icon: 'error',
                                            title: response.data.message,
                                        })
                                    }

                                }
                            })
                            .catch(error => {
								this.loading =! true;
                                console.log(error)
                            })
					} else {
						this.loading = false;
						Toast.fire({
								icon: 'error',
								title: 'All fields are required',
							})
					}

				}
			},
		});
</script>
@endpush