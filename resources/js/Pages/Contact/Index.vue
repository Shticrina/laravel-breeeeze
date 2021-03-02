<template>
	<layout title="Contact">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
           contact page content

           <Agenda />
        </div>
    </layout>
</template>

<style scoped>
</style>

<script>
    import Layout from './../../Layouts/Layout';
    import Agenda from '@/Components/Agenda';

	export default {
		components: {
			Layout,
			Agenda
		},
		props: {
			// user: Object,
		},
	}
</script>