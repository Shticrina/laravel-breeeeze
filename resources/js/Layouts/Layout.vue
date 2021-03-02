<template>
	<nav class="bg-white shadow">
	    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex items-center justify-between h-16">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<inertia-link :href="route('home')" class="">
							<img class="h-8 w-8" src="/img/logo.svg" alt="Logo Cristina Dinca">
						</inertia-link>
					</div>

					<div class="hidden md:block text-cyan-500">
            			<div class="ml-10 flex items-baseline space-x-4">
            				<inertia-link :href="route('about')" class="font-medium hover:text-gray-400">About</inertia-link>
					        <inertia-link :href="route('projects')" class="font-medium hover:text-gray-400">Projects</inertia-link>
					        <inertia-link :href="route('contact')" class="font-medium hover:text-gray-400">Contact</inertia-link>
        				</div>
          			</div>
        		</div>

        		<div class="hidden md:block">
					<div class="ml-4 flex items-center md:ml-6">
			            <!-- Profile dropdown -->
			            <div class="ml-3 relative">
			              	<div v-on:click="isActive = !isActive">
				                <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white transition duration-150 ease-in-out" id="user-menu" aria-haspopup="true">
				                  	<!-- <span class="sr-only">Open user menu</span> -->
				                  	<img class="h-8 w-8 rounded-full" src="/img/cristina_dinca.jpg" alt="Cristina Dinca">
				                </button>
			              	</div>
		              		
							<div v-show="isActive" class="origin-top-right absolute right-0 mt-2 w-48 py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
								<div v-if="$page.props.auth.user">
									<inertia-link href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
						                Dashboard
						            </inertia-link>

									<inertia-link :href="route('logout')" method="post" as="button" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
					                    Sign out
					                </inertia-link>
				                </div>

					            <template v-else>
					                <inertia-link :href="route('login')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
					                    Log in
					                </inertia-link>

					                <inertia-link :href="route('register')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
					                    Register
					                </inertia-link>
					            </template>
							</div>
						</div>
					</div>
				</div>

				<div v-on:click="isActive = !isActive" class="-mr-2 flex md:hidden">
					<!-- Mobile menu button -->
					<button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
						<span class="sr-only">Open main menu</span>

						<svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
						
						<svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
		</div>

    	<!-- Mobile menu, show/hide based on menu state. -->
	    <div v-show="isActive" class="md:hidden" id="mobile-menu">
			<div class="mt-3 px-2 space-y-1">
				<inertia-link :href="route('about')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About</inertia-link>
		        <inertia-link :href="route('projects')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Projects</inertia-link>
		        <inertia-link :href="route('contact')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact</inertia-link>
			</div>

			<div class="pt-4 pb-3 border-t border-gray-700">
				<div class="flex items-center px-5">
					<div class="flex-shrink-0">
						<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
					</div>

					<div class="ml-3">
						<div class="text-base font-medium leading-none text-white">{{ user ? user.name : 'friri' }}</div>
						<div class="text-sm font-medium leading-none text-gray-400">{{ user ? user.email : 'friri' }}</div>
					</div>
				</div>

				<div class="mt-3 px-2 space-y-1">
					<div v-if="$page.props.auth.user">
						<inertia-link href="/dashboard" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">
			                Dashboard
			            </inertia-link>

			            <inertia-link :href="route('logout')" method="post" as="button" class="block px-3 py-2 text-gray-400 hover:text-white hover:bg-gray-700">
		                    Sign out
		                </inertia-link>
		            </div>

		            <template v-else>
		                <inertia-link :href="route('login')" class="block px-3 py-2 text-gray-400 hover:text-white hover:bg-gray-700">
		                    Log in
		                </inertia-link>

		                <inertia-link :href="route('register')" class="block px-3 py-2 text-gray-400 hover:text-white hover:bg-gray-700">
		                    Register
		                </inertia-link>
		            </template>
				</div>
			</div>
    	</div>
  	</nav>

	<main>
		<header class="">
			<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
				<h1 class="text-3xl font-bold text-gray-900">{{ title }}</h1>
			</div>
		</header>

		<div class="max-w-7xl mx-auto">
			<div class="border-2 border-red-200 h-96 sm:px-6 lg:px-8 py-6">
				<slot />
			</div>
		</div>
	</main>

	<footer class="bg-cyan-700">
		<div class="max-w-7xl mx-auto text-center py-6 px-4 sm:px-6 lg:px-8">
			<h1 class="text-2xl text-white">Footer</h1>
		</div>
	</footer>
</template>

<script>
	import { computed } from 'vue';
  	import { usePage } from '@inertiajs/inertia-vue3';

  	export default {
  		setup() {
			const user = computed(() => usePage().props.value.auth.user);
			// console.log(user);
			return { user };
    	},
	    props: {
	      	title: String,
	      	// canLogin: Boolean,
            // canRegister: Boolean,
            // laravelVersion: String,
            // phpVersion: String,
            isActive: false
	    },
	    watch: {
	      	title: {
		        immediate: true,
		        handler(title) {
		          document.title = title
		        },
	      	},
	    },
  	}
</script>