<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import ProfessionalForm from '@/Components/ProfessionalForm.vue';
import {reactive} from 'vue';
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia'

const state = reactive({form: {}, errors: {}});

async function submit() {
    axios.post(route('professional.store'), await state.form)
        .then((response) => {
            if(response.status == 200) {
                alert("Salvou -> " + route('professional.index'));
                // this.$route.push(route('professional.index'));
                Inertia.get(route('professional.index'));
            }
        })
        .catch((error) => {
            if(error.response && error.response.status == 422) {
                state.errors = error.response.data.errors;
                console.log(error.response.data.errors);
            }
        });
}
</script>
<template>
    <Head title="Novo Médico" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Novo Médico > Novo
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="post" :action="route('professional.store')" @submit.prevent="submit">
                            <ProfessionalForm v-model="state.form" :errors="state.errors" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>